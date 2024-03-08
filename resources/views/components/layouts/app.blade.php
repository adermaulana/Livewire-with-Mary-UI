<!DOCTYPE html>
<html lang="en" data-theme="cupcake">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- Make sure you have this  --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="https://mary-ui.com/favicon.ico" type="image/x-icon">
    <title>Mary UI Template</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    {{-- EasyMDE --}}
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
</head>
<body class="min-h-screen font-sans antialiased">

{{-- The navbar with `sticky` and `full-width` --}}
    <x-mary-nav sticky full-width class="bg-orange-50">
 
        <x-slot:brand>
            {{-- Drawer toggle for "main-drawer" --}}
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-mary-icon name="o-bars-3" class="cursor-pointer" />
            </label>
 
            {{-- Brand --}}
            <div>
                <a href="/dashboard" wire:navigate="">
                    <div class="flex flex-wrap items-baseline">
                        <span class="font-black text-3xl mr-3 bg-gradient-to-r from-amber-500 to-pink-500 bg-clip-text text-transparent ">
                            maryUI
                        </span>
                    </div>
                </a>
            </div>
        </x-slot:brand>
 
        {{-- Right side actions --}}
        <x-slot:actions>
            <x-mary-button label="Messages" icon="o-envelope" link="###" class="btn-ghost btn-sm" />
            <x-mary-button label="Notifications" icon="o-bell" link="###" class="btn-ghost btn-sm" />
        </x-slot:actions>
    </x-mary-nav>

    {{-- The main content with `full-width` --}}
    <x-mary-main with-nav full-width>
 
        {{-- This is a sidebar that works also as a drawer on small screens --}}
        {{-- Notice the `main-drawer` reference here --}}
        <x-slot:sidebar drawer="main-drawer" class="bg-orange-50">

        {{-- User --}}
                @if($user = auth()->user())
                    <x-mary-list-item :item="$user" sub-value="username" no-separator no-hover class="mx-2 mt-2 mb-5 border-y border-sky-x-200">
                        <x-slot:actions>
                            <x-mary-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" />
                        </x-slot:actions>
                    </x-mary-list-item>
                @endif
 
            {{-- Activates the menu item when a route matches the `link` property --}}
            <x-mary-menu activate-by-route>
                <x-mary-menu-item title="Dashboard" icon="o-home" link="dashboard" />
                <x-mary-menu-item title="Posts" icon="o-document-plus" link="posts" />
            </x-mary-menu>
        </x-slot:sidebar>
 
        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
 
        {{-- Footer area --}}
        <x-slot:footer>
            <hr />
            <div class="p-6 bg-orange-50">
                Footer
            </div>
        </x-slot:footer>
    </x-mary-main>
    
</body>
</html>