<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeNavLayout extends Command
{
    protected $signature = 'make:nav-layout {name}';
    protected $description = 'Generate a navigation layout with basic UI using Tailwind CSS';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $name = ucfirst($this->argument('name')); // The name of the layout component

        $this->createNavLayout($name);

        $this->info("Navigation layout {$name} created successfully!");
    }

    private function createNavLayout($name)
    {
        $componentPath = app_path("View/Components/{$name}Layout.php");
        $bladePath = resource_path("views/layouts/{$name}.blade.php");

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
        File::put($componentPath, $componentContent);

        // Create the layout Blade file with Tailwind UI
        $bladeContent = "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{{ config('app.name') }}< q/title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class=\"font-sans antialiased bg-gray-100\">
    <div class=\"min-h-screen\">
        <header>
            <nav class=\"bg-blue-600 p-4\">
                <div class=\"container mx-auto\">
                    <ul class=\"flex space-x-4 text-white\">
                        <li><a href=\"#\">Home</a></li>
                        <li><a href=\"#\">About</a></li>
                        <li><a href=\"#\">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </header>

        <main>
            {{ \$slot }}
        </main>
    </div>
</body>
</html>";

        File::put($bladePath, $bladeContent);
    }
}
