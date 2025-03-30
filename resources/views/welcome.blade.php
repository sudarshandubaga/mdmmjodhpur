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
                <img src="https://sgktc.org/wp-content/themes/sgktc/sgktc/assets/images/logo.png" alt=""
                    class="size-24 mx-auto sm:mx-0">
                <div>
                    <div class="text-blue-900 text-base sm:text-3xl font-semibold">
                        Shah Goverdhan Lal Kabra Teachers' College (C.T.E), Jodhpur
                    </div>
                    <div class="text-xs sm:text-base">
                        Upgrade as College for Teachers Education by the Ministry of Human Resources Development, Govt.
                        of India, New Delhi
                    </div>
                    <div class="text-orange-400 text-xs sm:text-base">
                        Affiliated to Jai Narain Vyas university, Jodhpur (Managed by Shri Mahesh Shikshan Sansthan)
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
        <ul id="menu"
            class="fixed top-0 left-0 h-full w-64 bg-blue-900 text-white transform -translate-x-full transition-transform sm:translate-x-0 sm:relative sm:w-auto sm:h-auto sm:bg-transparent sm:flex sm:flex-wrap sm:justify-center [&>li>a]:block [&>li>a]:p-2 sm:[&>li>a]:p-4 [&>li:hover>a]:bg-orange-400 font-light z-50">
            <li><a href="#">Home</a></li>
            <li><a href="#">History</a></li>
            <li><a href="#">Members</a></li>
            <li><a href="#">Publications</a></li>
            <li><a href="#">Infrastructure</a></li>
            <li><a href="#">Documents</a></li>
            <li><a href="#">Academics</a></li>
            <li><a href="#">News & Notice</a></li>
            <li><a href="#">Calendar</a></li>
        </ul>
    </nav>

    {{-- Banner Slider --}}
    <section>
        <div class="swiper" id="main carousel">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="https://sgktc.org/wp-content/uploads/2021/08/slide-2.jpg" alt="Slide 1"
                        class="w-full aspect-[3/1] object-cover">
                </div>
                <div class="swiper-slide">
                    <img src="https://sgktc.org/wp-content/uploads/2021/08/slide-2.jpg" alt="Slide 2"
                        class="w-full aspect-[3/1] object-cover">
                </div>
                <div class="swiper-slide">
                    <img src="https://sgktc.org/wp-content/uploads/2021/08/slide-2.jpg" alt="Slide 3"
                        class="w-full aspect-[3/1] object-cover">
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    {{-- About Us Section --}}
    <section class="md:py-16 py-5">
        <div class="container mx-auto px-4">
            <div class="flex flex-col sm:grid sm:grid-cols-5 gap-10 items-center">
                <div class="sm:col-span-2 h-full">
                    <div class="bg-white flex flex-col rounded overflow-hidden h-full">
                        <div class="bg-blue-900 text-white p-3 text-lg text-center uppercase">
                            News &amp; Notice
                        </div>
                        <div class="grow p-3">
                            <marquee direction="up" class="h-full" onmouseover="stop()" onmouseout="start()">
                                <div>
                                    <div class="py-3 border-b">
                                        <div class="bg-blue-900 inline-block px-3 text-white rounded">New</div>
                                        <a class="text-black block hover:text-orange-400">
                                            B.Ed Final Year Internship Marking Performa
                                        </a>
                                        <div class="text-gray-400">
                                            {{ date('F d, Y') }}
                                        </div>
                                    </div>

                                    <div class="py-3 border-b">
                                        <div class="bg-blue-900 inline-block px-3 text-white rounded">New</div>
                                        <a class="text-black block hover:text-orange-400">
                                            B.Ed Final Year Internship Marking Performa
                                        </a>
                                        <div class="text-gray-400">
                                            {{ date('F d, Y') }}
                                        </div>
                                    </div>

                                    <div class="py-3 border-b">
                                        <div class="bg-blue-900 inline-block px-3 text-white rounded">New</div>
                                        <a class="text-black block hover:text-orange-400">
                                            B.Ed Final Year Internship Marking Performa
                                        </a>
                                        <div class="text-gray-400">
                                            {{ date('F d, Y') }}
                                        </div>
                                    </div>

                                    <div class="py-3 border-b">
                                        <div class="bg-blue-900 inline-block px-3 text-white rounded">New</div>
                                        <a class="text-black block hover:text-orange-400">
                                            B.Ed Final Year Internship Marking Performa
                                        </a>
                                        <div class="text-gray-400">
                                            {{ date('F d, Y') }}
                                        </div>
                                    </div>
                                </div>
                            </marquee>
                        </div>
                    </div>
                </div>
                <div class="col-span-3">
                    <img src="https://sgktc.org/wp-content/uploads/2021/08/welcome-image.png" alt=""
                        class="rounded-lg object-cover aspect-[3/1] w-full mb-5">

                    <h3 class="heading">Welcome to our Website</h3>
                    <p>
                        Shah Goverdhan Lal Kabra Teachers' College (C.T.E.), Jodhpur (Formerly known as Shri Mahesh
                        Teachers College) is one of the oldest Teachers' Colleges of Rajasthan and was established in
                        1961. The College is recognized by the National Council for Teacher Education (N.C.T.E.) for
                        B.Ed. and M.Ed. Programs. It is affiliated to Jai Narain Vyas University, Jodhpur for B.Ed.,
                        M.Ed, and Ph.D. (Education) Programs. The College has also been registered under Sec. 2(f) and
                        12(B) of the U.G.C. Act for both Under Graduate Course (B.Ed.) and Post Graduate Course
                        (M.Ed.)... <a href="#" class="text-blue-900 font-bold">Read More &raquo;</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="container mx-auto">
        <hr class="border-gray-300">
    </div>

    {{-- Infrastructure Section --}}
    <section class="md:py-16 py-5">
        <div class="container mx-auto px-4">
            <h3 class="heading text-center">College Infrastructure</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-10">
                <div class="bg-white overflow-hidden rounded-lg shadow">
                    <img src="https://sgktc.org/wp-content/uploads/2021/07/college-library.png" alt=""
                        class="w-full aspect-video object-cover">
                    <div class="p-3">
                        <a class="subheading">College Library</a>
                        <p>
                            The College has a very big library having about 38,000 (Thirty-Eight Thousand) books
                            pertaining to the pedagogical and methodological areas of Teacher Education fulfilling the
                            requirements of B.Ed., M.Ed., and Ph.D. (Education) students.
                        </p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden rounded-lg shadow">
                    <img src="https://sgktc.org/wp-content/uploads/2021/07/auditorium.png" alt=""
                        class="w-full aspect-video object-cover">
                    <div class="p-3">
                        <a class="subheading">Auditorium</a>
                        <p>
                            The College has a very big library having about 38,000 (Thirty-Eight Thousand) books
                            pertaining to the pedagogical and methodological areas of Teacher Education fulfilling the
                            requirements of B.Ed., M.Ed., and Ph.D. (Education) students.
                        </p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden rounded-lg shadow">
                    <img src="https://sgktc.org/wp-content/uploads/2021/07/computer-lab.png" alt=""
                        class="w-full aspect-video object-cover">
                    <div class="p-3">
                        <a class="subheading">Computer Lab</a>
                        <p>
                            The College has a very big library having about 38,000 (Thirty-Eight Thousand) books
                            pertaining to the pedagogical and methodological areas of Teacher Education fulfilling the
                            requirements of B.Ed., M.Ed., and Ph.D. (Education) students.
                        </p>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="" class="button primary">Read More&hellip;</a>
            </div>
        </div>
    </section>

    {{-- Photo Gallery Section --}}
    <section class="md:py-16 py-5 bg-white">
        <h3 class="heading text-center">Photo Gallery</h3>
        <div class="container mx-auto">
            <div class="swiper photo-gallery-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="https://sgktc.org/wp-content/uploads/2021/07/college-library.png"
                            data-lightbox="gallery">
                            <img src="https://sgktc.org/wp-content/uploads/2021/07/college-library.png" alt="Library"
                                class="rounded-lg object-cover aspect-video w-full">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="https://sgktc.org/wp-content/uploads/2021/07/auditorium.png" data-lightbox="gallery">
                            <img src="https://sgktc.org/wp-content/uploads/2021/07/auditorium.png" alt="Auditorium"
                                class="rounded-lg object-cover aspect-video w-full">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="https://sgktc.org/wp-content/uploads/2021/07/computer-lab.png"
                            data-lightbox="gallery">
                            <img src="https://sgktc.org/wp-content/uploads/2021/07/computer-lab.png"
                                alt="Computer Lab" class="rounded-lg object-cover aspect-video w-full">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="https://sgktc.org/wp-content/uploads/2021/07/college-library.png"
                            data-lightbox="gallery">
                            <img src="https://sgktc.org/wp-content/uploads/2021/07/college-library.png" alt="Library"
                                class="rounded-lg object-cover aspect-video w-full">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="https://sgktc.org/wp-content/uploads/2021/07/auditorium.png" data-lightbox="gallery">
                            <img src="https://sgktc.org/wp-content/uploads/2021/07/auditorium.png" alt="Auditorium"
                                class="rounded-lg object-cover aspect-video w-full">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="https://sgktc.org/wp-content/uploads/2021/07/computer-lab.png"
                            data-lightbox="gallery">
                            <img src="https://sgktc.org/wp-content/uploads/2021/07/computer-lab.png"
                                alt="Computer Lab" class="rounded-lg object-cover aspect-video w-full">
                        </a>
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    {{-- Principal's Message --}}
    <section class="md:py-16 py-5 bg-gray-100">
        <div class="container mx-auto">
            <h3 class="heading text-center">Principal's Message</h3>
            <div class="flex flex-col md:grid md:grid-cols-3 gap-10 items-center">
                <div class="col-span-1">
                    <img src="{{ asset('principal.png') }}" alt="Principal's Photo"
                        class=" object-cover w-full bg-white">
                </div>
                <div class="col-span-2 flex flex-col gap-3">

                    <p>
                        The teacher is not a mere guide in the most conventional system. He is much more than a regular
                        counselor, a value developer & a torch bearer of change.
                    </p>
                    <p>
                        It is our endeavor in the Shri R. N. Memorial Mahila Teachers Training B.Ed. College to
                        provide
                        dynamic learning process to train, equip and mould the teacher trainees to cater to the
                        expectations of the modern society.
                    </p>
                    <p class="text-right font-bold !text-blue-900 mt-10">
                        Dr. Amita Swami<br />
                        (Principal)
                    </p>
                </div>
            </div>
        </div>
    </section>

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
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-orange-400">Home</a></li>
                            <li><a href="#" class="hover:text-orange-400">About Us</a></li>
                            <li><a href="#" class="hover:text-orange-400">Documents</a></li>
                            <li><a href="#" class="hover:text-orange-400">Publications</a></li>
                            <li><a href="#" class="hover:text-orange-400">Members</a></li>
                            <li><a href="#" class="hover:text-orange-400">Gallery</a></li>
                            <li><a href="#" class="hover:text-orange-400">Alumni</a></li>
                        </ul>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-orange-400">History</a></li>
                            <li><a href="#" class="hover:text-orange-400">Academics</a></li>
                            <li><a href="#" class="hover:text-orange-400">College Infrastructure</a></li>
                            <li><a href="#" class="hover:text-orange-400">Calendar</a></li>
                            <li><a href="#" class="hover:text-orange-400">News & Notice</a></li>
                            <li><a href="#" class="hover:text-orange-400">Contact</a></li>
                        </ul>
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
                        <a href="mailto:info@sgktc.org"
                            class="flex items-center gap-3 justify-center sm:justify-start">
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
