@extends('web.layouts.app')

@section('main_section')
    {{-- Banner Slider --}}
    <section>
        <div class="swiper" id="main carousel">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide">
                        <img src="{{ $slider->image }}" alt={{ $slider->title }}" class="w-full aspect-[3/1] object-cover">
                    </div>
                @endforeach
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
                        <a href="https://sgktc.org/wp-content/uploads/2021/07/college-library.png" data-lightbox="gallery">
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
                        <a href="https://sgktc.org/wp-content/uploads/2021/07/computer-lab.png" data-lightbox="gallery">
                            <img src="https://sgktc.org/wp-content/uploads/2021/07/computer-lab.png" alt="Computer Lab"
                                class="rounded-lg object-cover aspect-video w-full">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="https://sgktc.org/wp-content/uploads/2021/07/college-library.png" data-lightbox="gallery">
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
                        <a href="https://sgktc.org/wp-content/uploads/2021/07/computer-lab.png" data-lightbox="gallery">
                            <img src="https://sgktc.org/wp-content/uploads/2021/07/computer-lab.png" alt="Computer Lab"
                                class="rounded-lg object-cover aspect-video w-full">
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
@endsection
