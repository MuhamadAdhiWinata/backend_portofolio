<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class NathGenRelation extends Command
{
    protected $signature = 'nathgen:relation {from} {to} {--type=one-to-many} {--no-db-constraint}';
    protected $description = 'Generate Eloquent relationship + Controller, Resource & Route';

    public function handle()
    {
        $from = Str::studly($this->argument('from')); // contoh: Kategori
        $to   = Str::studly($this->argument('to'));   // contoh: Buku
        $type = $this->option('type');
        $noConstraint = $this->option('no-db-constraint');

        $this->info("🔗 Generating relation: {$from} <-> {$to} [{$type}]");

        // Path model
        $fromModel = app_path("Models/{$from}.php");
        $toModel   = app_path("Models/{$to}.php");

        if (!File::exists($fromModel) || !File::exists($toModel)) {
            return $this->error("❌ Salah satu model tidak ditemukan: {$from} atau {$to}");
        }

        // Inject relasi
        if ($type === 'one-to-many') {
            $this->injectOneToMany($fromModel, $toModel, $from, $to);
        }

        if (!$noConstraint) {
            $this->injectForeignKey($from, $to);
        }

        // Generate controller, resource, route
        $this->generateController($from, $to);
        $this->generateResource($from, $to);
        $this->generateRoute($from, $to);

        $this->info("✅ Relasi {$type} sukses ditambahkan!");
    }

    protected function injectOneToMany($fromModel, $toModel, $from, $to)
    {
        $fromRel = strtolower($to) . 's';
        $toRel   = strtolower($from);

        // From model
        $fromContent = File::get($fromModel);
        if (!Str::contains($fromContent, "public function {$fromRel}()")) {
            $relation = <<<EOT

    public function {$fromRel}()
    {
        return \$this->hasMany(\\App\\Models\\{$to}::class);
    }
EOT;
            $fromContent = str_replace("}", "    {$relation}\n}", $fromContent);
            File::put($fromModel, $fromContent);
            $this->info("🟢 Injected hasMany into {$from}");
        } else {
            $this->warn("⚠️ hasMany sudah ada di {$from}");
        }

        // To model
        $toContent = File::get($toModel);
        if (!Str::contains($toContent, "public function {$toRel}()")) {
            $relation = <<<EOT

    public function {$toRel}()
    {
        return \$this->belongsTo(\\App\\Models\\{$from}::class);
    }
EOT;
            $toContent = str_replace("}", "    {$relation}\n}", $toContent);
            File::put($toModel, $toContent);
            $this->info("🟢 Injected belongsTo into {$to}");
        } else {
            $this->warn("⚠️ belongsTo sudah ada di {$to}");
        }
    }

    protected function injectForeignKey($from, $to)
    {
        $migrationPath = database_path("migrations");
        $toTable = Str::snake(Str::pluralStudly($to));
        $fromTable = Str::snake(Str::pluralStudly($from));

        $files = File::files($migrationPath);
        foreach ($files as $file) {
            if (Str::contains($file->getFilename(), "create_{$toTable}_table")) {
                $content = File::get($file->getPathname());
                if (!Str::contains($content, "foreignId('" . Str::snake($from) . "_id'")) {
                    $injected = "            \$table->foreignId('" . Str::snake($from) . "_id')->constrained();";
                    $content = str_replace("\$table->id();", "\$table->id();\n{$injected}", $content);
                    File::put($file->getPathname(), $content);
                    $this->info("🟢 Injected FK into {$to} migration ({$from}_id)");
                } else {
                    $this->warn("⚠️ FK sudah ada di {$to}");
                }
            }
        }
    }

    protected function generateController($from, $to)
    {
        $controllerPath = app_path("Http/Controllers/Api/relations/{$from}{$to}Controller.php");
        if (File::exists($controllerPath)) {
            return $this->warn("⚠️ Controller sudah ada: {$controllerPath}");
        }

        $stub = File::get(base_path("stubs/relation/relation-controller.stub"));
        $content = str_replace(
            ['{{From}}', '{{To}}', '{{to_lower}}'],
            [$from, $to, strtolower($to)],
            $stub
        );
        File::ensureDirectoryExists(dirname($controllerPath));
        File::put($controllerPath, $content);

        $this->info("🟢 Generated Controller: {$from}{$to}Controller");
    }

    protected function generateResource($from, $to)
    {
        $resourcePath = app_path("Http/Resources/relations/{$from}RelasiResource.php");
        if (File::exists($resourcePath)) {
            return $this->warn("⚠️ Resource sudah ada: {$resourcePath}");
        }

        $stub = File::get(base_path("stubs/relation/relation-resource.stub"));
        $content = str_replace(
            ['{{From}}', '{{To}}'],
            [$from, $to],
            $stub
        );
        File::ensureDirectoryExists(dirname($resourcePath));
        File::put($resourcePath, $content);

        $this->info("🟢 Generated Resource: {$from}RelasiResource");
    }

    protected function generateRoute($from, $to)
    {
        $routePath = base_path("routes/api.php");
        $stub = File::get(base_path("stubs/relation/relation-route.stub"));

        $content = str_replace(
            ['{{From}}', '{{To}}', '{{from_lower}}'],
            [$from, $to, strtolower($from)],
            $stub
        );

        File::append($routePath, "\n" . $content);
        $this->info("✅ Route untuk relasi {$from} <-> {$to} ditambahkan");
    }
}
