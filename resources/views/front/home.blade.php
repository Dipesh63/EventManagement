@extends('front.layouts.app')

@section('main')



    <section class="h-screen bg-cover flex items-center"
        style="background-image: url({{ asset('assets/images/banner7.jpg') }}); background-position: 75% center;">
        <div class="container mx-auto">
            <div class="max-w-2xl text-white pl-12">
                {{-- <h1 class="text-4xl font-bold mb-4">Find your dream job</h1> --}}
                {{-- <p class="text-lg mb-6">Thousands of jobs available.</p> --}}
                {{-- <a href="#"
                    class="inline-block bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition">Explore
                    Now</a> --}}
            </div>
        </div>
    </section>






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
            <h2 class="text-2xl font-bold text-center">Popular Categories</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 pt-5">

                @if ($categories->isNotEmpty())
                    @foreach ($categories as $category)
                        <div class="single_category bg-white p-4 rounded shadow text-center">
                            <a href="{{route('events')}}">
                                <h4 class="text-lg font-semibold text-gray-800 pb-2">{{ $category->name }}</h4>
                            </a>
                            <p class="text-gray-600 mb-0"> <span>50</span> Available positions</p>
                        </div>
                    @endforeach
                @endif


            </div>
        </div>
    </section>








    <section class="py-5 bg-gray-100">
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
    </section>







    <section class="py-5 bg-gray-100">
        <div class="container mx-auto px-4 md:px-6"> <!-- Added horizontal padding -->
            <h2 class="text-2xl font-bold text-center mb-5">Latest Events</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @if ($latestevents->isNotEmpty())
                @foreach ($latestevents as $latestevent)

                <div class="bg-white p-5 rounded-lg shadow">
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2"> {{ $latestevent->title }}</h3>
                        <p class="text-gray-600">{{ Str::words(strip_tags($latestevent->description), 5) }}</p>
                    </div>
                    <div class="bg-gray-100 p-3 rounded border border-gray-200">
                        <p class="text-sm text-gray-700">
                            <span class="font-semibold"><i class="fa fa-map-marker"></i></span>
                            <span class="pl-2">{{ $latestevent->location->versity_name }}</span>
                        </p>
                        <p class="text-sm text-gray-700">
                            <span class="font-semibold"><i class="fa fa-clock-o"></i></span>
                            <span class="pl-2">{{ $latestevent->deptType->name }}</span>
                        </p>
                        @if (!is_null($latestevent->registrationfees))
                        <p class="text-sm text-gray-700">
                            <span class="font-semibold"><i class="fa fa-usd"></i></span>
                            <span class="pl-2">{{ $latestevent->registrationfees }}</span>
                        </p>
                        @endif
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('eventsDetail',$latestevent->id) }}"
                            class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Details</a>
                    </div>
                </div>
                <!-- Repeat the above div for each events listing -->
                @endforeach
                @endif
                
            </div>
        </div>
    </section>


@endsection
