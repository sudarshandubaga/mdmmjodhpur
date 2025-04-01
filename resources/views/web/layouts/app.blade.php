<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <header class="py-3 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap gap-3 items-center justify-center text-center sm:flex-nowrap sm:text-left">
                <img src="{{ asset('images/logo.png') }}" alt="" class="size-24 mx-auto sm:mx-0">
                <div>
                    <div class="text-blue-900 text-base sm:text-4xl font-semibold">
                        {{ env('APP_NAME') }}
                    </div>
                    <div class="text-xs sm:text-base">
                        Affiliated to Jai Narain Vyas university, Jodhpur (Managed by Madhuvan Shikshan Sansthan)
                    </div>
                    {{-- <div class="text-orange-400 text-xs sm:text-base">
                        Affiliated to Jai Narain Vyas university, Jodhpur (Managed by Shri Mahesh Shikshan Sansthan)
                    </div> --}}
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
            'class' => 'fixed top-0 left-0 h-full w-64 bg-blue-900 text-white transform -translate-x-full
                                            transition-transform sm:translate-x-0 sm:relative sm:w-auto sm:h-auto sm:bg-transparent sm:flex sm:flex-wrap
                                            sm:justify-center [&>li>a]:block [&>li>a]:p-2 sm:[&>li>a]:p-4 [&>li:hover>a]:bg-orange-400 font-light z-50',
        ]" />
    </nav>

    @yield('main_section')

    {{-- Footer Section --}}
    <footer class="bg-gray-900 text-white py-10">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div>
                    <img src="https://sgktc.org/wp-content/themes/sgktc/sgktc/assets/images/logo.png" alt=""
                        class="mb-3 mx-auto sm:mx-0">
                    <h4 class="text-lg font-semibold mb-3 text-center sm:text-left">Shah Goverdhan Lal Kabra Teachers'
                        College (C.T.E), Jodhpur</h4>

                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-3 text-center sm:text-left">Quick Links</h4>
                    <div class="grid grid-cols-2">
                        {{-- <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-orange-400">Home</a></li>
                            <li><a href="#" class="hover:text-orange-400">About Us</a></li>
                            <li><a href="#" class="hover:text-orange-400">Documents</a></li>
                            <li><a href="#" class="hover:text-orange-400">Publications</a></li>
                            <li><a href="#" class="hover:text-orange-400">Members</a></li>
                            <li><a href="#" class="hover:text-orange-400">Gallery</a></li>
                        </ul> --}}
                        {{-- <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-orange-400">History</a></li>
                            <li><a href="#" class="hover:text-orange-400">Academics</a></li>
                            <li><a href="#" class="hover:text-orange-400">College Infrastructure</a></li>
                            <li><a href="#" class="hover:text-orange-400">Calendar</a></li>
                            <li><a href="#" class="hover:text-orange-400">News & Notice</a></li>
                            <li><a href="#" class="hover:text-orange-400">Contact</a></li>
                        </ul> --}}
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
                        Shah Goverdhan Lal Kabra Teachers' College (C.T.E.) <br />
                        Near Geeta Bhawan, Umaid Hospital
                        Road, <br /> Jodhpur &mdash; 342003
                    </p>
                    <div class="my-3 border-t border-gray-600"></div>
                    <div class="space-y-3">
                        <a href="tel:+91-1234567890" class="flex items-center gap-3 justify-center sm:justify-start">
                            <span class="material-symbols-outlined text-orange-400">
                                call
                            </span>
                            +91-1234567890
                        </a>
                        <a href="mailto:info@sgktc.org" class="flex items-center gap-3 justify-center sm:justify-start">
                            <span class="material-symbols-outlined text-orange-400">
                                mail
                            </span>
                            info@sgktc.org
                        </a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-10 text-sm">
                &copy; {{ date('Y') }} Shah Goverdhan Lal Kabra Teachers' College. All Rights Reserved.
            </div>
        </div>
    </footer>

    @vite('resources/js/app.js')
</body>

</html>
