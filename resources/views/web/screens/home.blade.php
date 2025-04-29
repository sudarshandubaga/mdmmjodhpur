@extends('web.layouts.app')

@section('main_section')
    {{-- Banner Slider --}}
    <section>
        <div class="swiper" id="main carousel">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide">
                        <img src="{{ asset($slider->image) }}" alt="{{ $slider->title }}"
                            class="w-full aspect-[3/1] object-cover">
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
                                    @foreach ($newss as $news)
                                        <div class="py-3 border-b">
                                            <div class="bg-blue-900 inline-block px-3 text-white rounded">New</div>
                                            <a href="#" class="text-black block hover:text-orange-400">
                                                {{ $news->title }}
                                            </a>
                                            <div class="text-gray-400">
                                                {{ $news->created_at->format('F d, Y') }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </marquee>
                        </div>
                    </div>
                </div>
                <div class="col-span-3">
                    <img src="{{ asset($about->image) }}" alt="Welcome Image"
                        class="rounded-lg object-cover aspect-[3/1] w-full mb-5">

                    <h3 class="heading">Welcome to {{ $site->title }}</h3>
                    <p>
                        {{ Str::limit(strip_tags($about->description), 300) }} <a
                            href="{{ route('page.show', 'about-us') }}" class="text-blue-900 font-bold">Read More
                            &raquo;</a>
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
                @foreach ($infrastructures as $infrastructure)
                    <div class="bg-white overflow-hidden rounded-lg shadow">
                        <img src="{{ asset($infrastructure->image) }}" alt="{{ $infrastructure->title }}"
                            class="w-full aspect-video object-cover">
                        <div class="p-3">
                            <a class="subheading">{{ $infrastructure->title }}</a>
                            <p>
                                {{ Str::limit(strip_tags($infrastructure->description), 150) }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                <a href="#" class="button primary">Read More&hellip;</a>
            </div>
        </div>
    </section>

    {{-- Photo Gallery Section --}}
    <section class="md:py-16 py-5 bg-white">
        <h3 class="heading text-center">Photo Gallery</h3>
        <div class="container mx-auto">
            <div class="swiper photo-gallery-slider">
                <div class="swiper-wrapper">
                    @foreach ($galleries as $gallery)
                        <div class="swiper-slide">
                            <a href="{{ asset($gallery->image) }}" data-lightbox="gallery">
                                <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title }}"
                                    class="rounded-lg object-cover aspect-video w-full">
                            </a>
                        </div>
                    @endforeach
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
                    <img src="{{ asset('principal.webp') }}" alt="Principal's Photo" class="object-cover w-full bg-white">
                </div>
                <div class="col-span-2 flex flex-col gap-3">
                    <div class="editor">
                        {!! $principalMessage->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
