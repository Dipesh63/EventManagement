@extends('front.layouts.app')

@section('main')







<div id="default-carousel" class="relative w-full overflow-hidden">
    <!-- Carousel wrapper -->
    <div class="relative h-56 md:h-96 flex transition-transform duration-700 ease-in-out" id="carousel-wrapper">
        <!-- Item 1 -->
        <div class="w-full flex-shrink-0">
            <section class="h-56 md:h-96 bg-cover flex items-center" style="background-image: url({{ asset('assets/images/banner7.jpg') }}); background-position: 75% center;"></section>
        </div>
        <!-- Item 2 -->
        <div class="w-full flex-shrink-0">
            <section class="h-56 md:h-96 bg-cover flex items-center" style="background-image: url({{ asset('assets/images/banner7.jpg') }}); background-position: 75% center;"></section>
        </div>
        <!-- Item 3 -->
        <div class="w-full flex-shrink-0">
            <section class="h-56 md:h-96 bg-cover flex items-center" style="background-image: url({{ asset('assets/images/banner7.jpg') }}); background-position: 75% center;"></section>
        </div>
        <!-- Item 4 -->
        <div class="w-full flex-shrink-0">
            <section class="h-56 md:h-96 bg-cover flex items-center" style="background-image: url({{ asset('assets/images/banner7.jpg') }}); background-position: 75% center;"></section>
        </div>
        <!-- Item 5 -->
        <div class="w-full flex-shrink-0">
            <section class="h-56 md:h-96 bg-cover flex items-center" style="background-image: url({{ asset('assets/images/banner7.jpg') }}); background-position: 75% center;"></section>
        </div>
    </div>
    <!-- Slider indicators -->
    {{-- <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div> --}}
    <!-- Slider controls -->
    {{-- <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button> --}}
</div>

<!-- JavaScript for Auto-Sliding with Smooth Transition -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const carouselWrapper = document.getElementById('carousel-wrapper');
        const indicators = document.querySelectorAll('[data-carousel-slide-to]');
        const totalSlides = carouselWrapper.children.length;
        let currentIndex = 0;

        function showSlide(index) {
            // Calculate the translation value
            const translateX = -index * 100; // Move left by 100% of the container width
            carouselWrapper.style.transform = `translateX(${translateX}%)`;

            // Update active indicator
            indicators.forEach((indicator, i) => {
                indicator.setAttribute('aria-current', i === index ? 'true' : 'false');
            });
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides; // Loop back to the first slide
            showSlide(currentIndex);
        }

        // Auto-slide every 0.5 seconds
        setInterval(nextSlide, 3000);

        // Manual navigation with indicators
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                currentIndex = index;
                showSlide(currentIndex);
            });
        });
    });
</script>






















    {{-- <section class="h-screen bg-cover flex items-center"
        style="background-image: url({{ asset('assets/images/banner7.jpg') }}); background-position: 75% center;">
        <div class="container mx-auto">
            <div class="max-w-2xl text-white pl-12">
            </div>
        </div>
    </section> --}}






    {{-- <section class="py-5">
        <div class="container mx-auto">
            <div class="bg-white shadow p-6 rounded-lg">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <input type="text" class="border border-gray-300 rounded px-4 py-2" placeholder="Keywords">
                    <input type="text" class="border border-gray-300 rounded px-4 py-2" placeholder="Location">
                    <select name="category" id="category" class="border border-gray-300 rounded px-4 py-2">
                        <option value="">Select a Category</option>
                        <option value="">Engineering</option>
                        <option value="">Accountant</option>
                        <option value="">Information Technology</option>
                        <option value="">Fashion designing</option>
                    </select>
                    <a href="jobs.html"
                        class="bg-blue-600 text-white text-center py-2 rounded hover:bg-blue-700 transition">Search</a>
                </div>
            </div>
        </div>
    </section> --}}









    <section class="py-5 bg-gray-100">
        <div class="container mx-auto px-4 md:px-6">
            <h2 class="text-2xl  font-bold text-center">Popular Categories</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 pt-5">

                @if ($categories->isNotEmpty())
                    @foreach ($categories as $category)
                        <div class="single_category bg-gray-800 p-5 shadow text-center">
                            <a href="{{route('events')}}">
                                <h4 class="text-lg font-semibold text-white pb-2">{{ $category->name }}</h4>
                            </a>
                            <p class="text-white mb-5 mt-5"> <span>50</span> Available positions</p>
                        </div>
                    @endforeach
                @endif


            </div>
        </div>
    </section>








    {{-- <section class="py-5 bg-gray-100">
        <div class="container mx-auto px-4 md:px-6"> <!-- Added horizontal padding -->
            <h2 class="text-2xl font-bold text-center mb-5">Featured Events</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @if ($featuredevents->isNotEmpty())
                @foreach ($featuredevents as $featuredevent)

                <div class="bg-white p-5 rounded-lg shadow">
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2"> {{ $featuredevent->title }}</h3>
                        <p class="text-gray-600">{{ Str::words(strip_tags($featuredevent->description), 5) }}</p>
                    </div>
                    <div class="bg-gray-100 p-3 rounded border border-gray-200">
                        <p class="text-sm text-gray-700">
                            <span class="font-semibold"><i class="fa fa-map-marker"></i></span>
                            <span class="pl-2">{{ $featuredevent->location->versity_name }}</span>
                        </p>
                        <p class="text-sm text-gray-700">
                            <span class="font-semibold"><i class="fa fa-clock-o"></i></span>
                            <span class="pl-2">{{ $featuredevent->deptType->name }}</span>
                        </p>
                        @if (!is_null($featuredevent->registrationfees))
                        <p class="text-sm text-gray-700">
                            <span class="font-semibold"><i class="fa fa-usd"></i></span>
                            <span class="pl-2">{{ $featuredevent->registrationfees }}</span>
                        </p>
                        @endif
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('eventsDetail',$featuredevent->id) }}"
                            class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Details</a>
                    </div>
                </div>
                <!-- Repeat the above div for each events listing -->

                @endforeach
                @endif


            </div>
        </div>
    </section> --}}


    <section class="py-5 bg-gray-100">
        <div class="container mx-auto px-4 md:px-6"> <!-- Added horizontal padding -->
            <h2 class="text-2xl font-bold text-center mb-5">Latest Events</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @if ($latestevents->isNotEmpty())
                @foreach ($latestevents as $latestevent)

                <div class="bg-gray-800 p-5 shadow">
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-white mb-2"> {{ $latestevent->title }}</h3>
                        <p class="text-white">{{ Str::words(strip_tags($latestevent->description), 5) }}</p>
                    </div>
                    <div class="bg-gray-100 rounded p-3 border border-gray-200">
                        <p class="text-sm text-gray-900">
                            <span class="font-semibold"><i class="fa fa-map-marker"></i></span>
                            <span class="pl-2">{{ $latestevent->location->versity_name }}</span>
                        </p>
                        <p class="text-sm text-gray-900">
                            <span class="font-semibold"><i class="fa fa-clock-o"></i></span>
                            <span class="pl-2">{{ $latestevent->deptType->name }}</span>
                        </p>
                        @if (!is_null($latestevent->registrationfees))
                        <p class="text-sm text-gray-900">
                            <span class="font-semibold"><i class="fa fa-usd"></i></span>
                            <span class="pl-2">{{ $latestevent->registrationfees }}</span>
                        </p>
                        @endif
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('eventsDetail',$latestevent->id) }}"
                            class="block w-full text-center bg-blue-600 text-white py-2">Details</a>
                    </div>
                </div>
                <!-- Repeat the above div for each events listing -->
                @endforeach
                @endif
                
            </div>
        </div>
    </section>


@endsection
