<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GenerateCrud extends Command
{
    protected $signature = 'make:crud {name}';
    protected $description = 'Generate a complete CRUD (Model, Controller, Views, etc.)';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $name = ucfirst($this->argument('name')); // The name of the resource
        $pluralName = Str::plural(strtolower($name));
        $viewsPath = resource_path("views/{$pluralName}");

        // Ask user if they want to use the x-layout
        $useLayout = $this->confirm('Would you like to use x-layout?', false);

        // Create Layout if user chose "yes"
        if ($useLayout) {
            $this->createLayoutFiles($name);
        }

        // Delete existing files (Model, Controller, Factory, Test)
        $this->deleteFile(app_path("Models/{$name}.php"));
        $this->deleteFile(app_path("Http/Controllers/{$name}Controller.php"));
        $this->deleteFile(database_path("factories/{$name}Factory.php"));
        $this->deleteFile(base_path("tests/Feature/{$name}Test.php"));

        // Generate CRUD components (Model, Controller, Resource)
        $this->info("Generating CRUD for {$name}...");

        // Model, Controller, Resource generation
        $this->call('make:model', ['name' => $name, '--controller' => true, '--resource' => true]);
        $this->call('make:factory', ['name' => "{$name}Factory"]);
        $this->call('make:test', ['name' => "{$name}Test"]);

        // Generate Views (create the blade files)
        $this->generateViews($viewsPath, $name);

        // If layout was used, wrap the views in the layout
        if ($useLayout) {
            $this->wrapViewsWithLayout($viewsPath, $name);
        } else {
            // If user said no, create blank .blade.php files
            $this->createBlankViews($viewsPath, $name);
        }

        $this->info("CRUD for {$name} generated successfully!");
    }

    private function createLayoutFiles($name)
    {
        $layoutComponentPath = app_path("View/Components/{$name}Layout.php");
        $layoutBladePath = resource_path("views/layouts/{$name}.blade.php");

        // Create the layout component file
        $componentContent = "<?php

    namespace App\View\Components;

    use Illuminate\View\Component;
    use Illuminate\View\View;

    class {$name}Layout extends Component
    {
        public function render(): View
        {
            return view('layouts.{$name}');
        }
    }";
        File::put($layoutComponentPath, $componentContent);

        // Create the layout Blade file
        $bladeContent = "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class=\"font-sans antialiased\">
    <div class=\"min-h-screen bg-gray-100\">
        <header>
            {{ \$header ?? '' }}
        </header>

        <main>
            {{ \$slot }}
        </main>
    </div>
</body>
</html>";

        File::put($layoutBladePath, $bladeContent);

        $this->info("Layout component and blade file for {$name} created successfully!");
    }

    private function wrapViewsWithLayout($viewsPath, $name)
    {
        $viewFiles = File::allFiles($viewsPath);

        foreach ($viewFiles as $viewFile) {
            $bladeContent = File::get($viewFile);

            // Layout name will be the lowercase version of the CRUD name
            $layoutName = strtolower($name);

            $wrappedContent = "<x-{$layoutName}-layout>\n";
            $wrappedContent .= "    <x-slot name=\"header\">\n";
            $wrappedContent .= "        <h2 class=\"font-semibold text-xl text-gray-800 leading-tight\">\n";
            $wrappedContent .= "            {{ __('{$name}') }}\n";
            $wrappedContent .= "        </h2>\n";
            $wrappedContent .= "    </x-slot>\n\n";
            $wrappedContent .= $bladeContent;
            $wrappedContent .= "\n</x-{$layoutName}-layout>";

            File::put($viewFile, $wrappedContent);

            $this->info("Wrapped {$viewFile} in x-{$layoutName}-layout.");
        }
    }

    private function createBlankViews($viewsPath, $name)
    {
        $viewFiles = ['index', 'create', 'edit', 'show']; // Common CRUD views

        foreach ($viewFiles as $view) {
            File::put("{$viewsPath}/{$view}.blade.php", "");

            $this->info("Created blank view: {$viewsPath}/{$view}.blade.php");
        }
    }

    private function deleteFile($filePath)
    {
        if (File::exists($filePath)) {
            File::delete($filePath);
            $this->info("Deleted: {$filePath}");
        }
    }

    private function generateViews($viewsPath, $name)
    {
        // Generate the views
        $views = ['index', 'create', 'edit', 'show'];

        foreach ($views as $view) {
            $viewContent = "<!-- Content for {$view} goes here -->";
            File::put("{$viewsPath}/{$view}.blade.php", $viewContent);
            $this->info("Generated view: {$viewsPath}/{$view}.blade.php");
        }
    }
}
