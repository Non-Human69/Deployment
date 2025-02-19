<?php

    namespace App\View\Components;

    use Illuminate\View\Component;
    use Illuminate\View\View;

    class VoorraadsLayout extends Component
    {
        public function render(): View
        {
            return view('layouts.Voorraads');
        }
    }