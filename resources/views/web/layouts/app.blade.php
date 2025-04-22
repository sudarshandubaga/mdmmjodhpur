<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $page->seo_title ?: $site->title }}</title>

    <meta name="keywords" content="{{ $page->seo_keywords }}">
    <meta name="description" content="{{ $page->seo_description }}">
    <meta name="author" content="{{ $site->title }}">
    <meta name="robots" content="index, follow">

    <!-- Open Graph for Social Media -->
    <meta property="og:title" content="{{ $page->seo_title ?: $site->title }}">
    <meta property="og:description" content="{{ $page->seo_description }}">
    <meta property="og:image" content="{{ $page->image }}">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card for Better Twitter Sharing -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $page->seo_title ?: $site->title }}">
    <meta name="twitter:description" content="{{ $page->seo_description }}">
    <meta name="twitter:image" content="{{ $page->image }}">

    <!-- Canonical URL to Avoid Duplicate Content Issues -->
    <link rel="canonical" href="{{ request()->url() }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ $site->favicon }}" type="image/x-icon">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <header class="py-3 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap gap-3 items-center justify-center text-center sm:flex-nowrap sm:text-left">
                <img src="{{ $site->logo }}" alt="{{ $site->logo }}" class="size-24 mx-auto sm:mx-0">
                <div>
                    <div class="text-blue-900 text-base sm:text-4xl font-semibold">
                        {{ $site->title }}
                    </div>
                    <div class="text-xs sm:text-base">
                        Affiliated to Jai Narain Vyas University (JNVU), Jodhpur, recognized by NCTE (Delhi), <br />
                        and managed by (Madhuban Shikshan Seva evam Vikas Sansthan, Jodhpur)
                    </div>
                </div>
            </div>
        </div>
    </header>

    <nav class="bg-blue-900 text-sm sm:text-md">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between">
                <div class="md:hidden text-white">
                    MENU
                </div>
                <button id="menu-toggle" class="text-white sm:hidden">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
        <x-menu menuLocation="header" :params="[
            'id' => 'menu',
            'class' =>
                'fixed top-0 left-0 h-full w-64 bg-blue-900 text-white transform -translate-x-full transition-transform sm:translate-x-0 sm:relative sm:w-auto sm:h-auto sm:bg-transparent sm:flex sm:flex-wrap sm:justify-center [&>li>a]:block [&>li>a]:p-2 sm:[&>li>a]:p-4 [&>li:hover>a]:bg-orange-400 font-light z-50',
        ]" />
    </nav>

    @yield('main_section')

    {{-- Footer Section --}}
    <footer class="bg-gray-900 text-white py-10">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div>
                    <img src="{{ $site->logo }}" alt="{{ $site->title }}" class="mb-3 mx-auto sm:mx-0 size-24">
                    <h4 class="text-lg font-semibold mb-3 text-center sm:text-left">{{ $site->title }}</h4>

                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-3 text-center sm:text-left">Quick Links</h4>
                    <div class="grid grid-cols-2">
                        <x-menu menuLocation="Footer 1" :params="[
                            'id' => 'menu',
                            'class' => 'space-y-2 text-gray-400',
                        ]" />

                        <x-menu menuLocation="Footer 2" :params="[
                            'id' => 'menu',
                            'class' => 'space-y-2 text-gray-400',
                        ]" />
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-3 text-center sm:text-left">Contact Address</h4>
                    <p class="flex flex-col gap-3 text-center sm:text-left">
                        {{ $site->title }} <br />
                        {!! nl2br($site->address) !!}
                    </p>
                    <div class="my-3 border-t border-gray-600"></div>
                    <div class="space-y-3">
                        <a href="tel:{{ $site->phone }}"
                            class="flex items-center gap-3 justify-center sm:justify-start">
                            <span class="material-symbols-outlined text-orange-400">
                                call
                            </span>
                            {{ $site->phone }}
                        </a>
                        <a href="mailto:{{ $site->email }}"
                            class="flex items-center gap-3 justify-center sm:justify-start">
                            <span class="material-symbols-outlined text-orange-400">
                                mail
                            </span>
                            {{ $site->email }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-10 text-sm">
                &copy; {{ date('Y') }} {{ $site->title }}. All Rights Reserved.
            </div>
        </div>
    </footer>

    @vite('resources/js/app.js')
</body>

</html>
