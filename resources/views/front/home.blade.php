@extends('front.layouts.app')

@section('main')



<section class="h-screen bg-cover flex items-center" style="background-image: url({{ asset('assets/images/banner5.jpg') }}); background-position: 75% center;">
    <div class="container mx-auto">
        <div class="max-w-2xl text-white pl-12">
            <h1 class="text-4xl font-bold mb-4">Find your dream job</h1>
            <p class="text-lg mb-6">Thousands of jobs available.</p>
            <a href="#" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition">Explore Now</a>
        </div>
    </div>
</section>






<section class="py-5">
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
                <a href="jobs.html" class="bg-blue-600 text-white text-center py-2 rounded hover:bg-blue-700 transition">Search</a>
            </div>
        </div>
    </div>
</section>









<section class="py-5 bg-gray-100">
    <div class="container mx-auto px-4 md:px-6">
        <h2 class="text-2xl font-bold text-center">Popular Categories</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 pt-5">
            <div class="single_category bg-white p-4 rounded shadow text-center">
                <a href="jobs.html">
                    <h4 class="text-lg font-semibold text-gray-800 pb-2">Design & Creative</h4>
                </a>
                <p class="text-gray-600 mb-0"> <span>50</span> Available positions</p>
            </div>
            <div class="single_category bg-white p-4 rounded shadow text-center">
                <a href="jobs.html">
                    <h4 class="text-lg font-semibold text-gray-800 pb-2">Finance</h4>
                </a>
                <p class="text-gray-600 mb-0"> <span>50</span> Available positions</p>
            </div>
            <div class="single_category bg-white p-4 rounded shadow text-center">
                <a href="jobs.html">
                    <h4 class="text-lg font-semibold text-gray-800 pb-2">Banking</h4>
                </a>
                <p class="text-gray-600 mb-0"> <span>50</span> Available positions</p>
            </div>
            <div class="single_category bg-white p-4 rounded shadow text-center">
                <a href="jobs.html">
                    <h4 class="text-lg font-semibold text-gray-800 pb-2">Data Science</h4>
                </a>
                <p class="text-gray-600 mb-0"> <span>50</span> Available positions</p>
            </div>
            <div class="single_category bg-white p-4 rounded shadow text-center">
                <a href="jobs.html">
                    <h4 class="text-lg font-semibold text-gray-800 pb-2">Marketing</h4>
                </a>
                <p class="text-gray-600 mb-0"> <span>50</span> Available positions</p>
            </div>
            <div class="single_category bg-white p-4 rounded shadow text-center">
                <a href="jobs.html">
                    <h4 class="text-lg font-semibold text-gray-800 pb-2">Digital Marketing</h4>
                </a>
                <p class="text-gray-600 mb-0"> <span>50</span> Available positions</p>
            </div>
            <div class="single_category bg-white p-4 rounded shadow text-center">
                <a href="jobs.html">
                    <h4 class="text-lg font-semibold text-gray-800 pb-2">Digital Marketing</h4>
                </a>
                <p class="text-gray-600 mb-0"> <span>50</span> Available positions</p>
            </div>
            <div class="single_category bg-white p-4 rounded shadow text-center">
                <a href="jobs.html">
                    <h4 class="text-lg font-semibold text-gray-800 pb-2">Digital Marketing</h4>
                </a>
                <p class="text-gray-600 mb-0"> <span>50</span> Available positions</p>
            </div>
        </div>
    </div>
</section>








<section class="py-5 bg-gray-100">
    <div class="container mx-auto px-4 md:px-6"> <!-- Added horizontal padding -->
        <h2 class="text-2xl font-bold text-center mb-5">Featured Jobs</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-5 rounded-lg shadow">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Web Developer</h3>
                    <p class="text-gray-600">We are in need of a Web Developer for our company.</p>
                </div>
                <div class="bg-gray-100 p-3 rounded border border-gray-200">
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-map-marker"></i></span>
                        <span class="pl-2">Noida</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-clock-o"></i></span>
                        <span class="pl-2">Remote</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-usd"></i></span>
                        <span class="pl-2">2-3 Lacs PA</span>
                    </p>
                </div>
                <div class="mt-4">
                    <a href="job-detail.html" class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Details</a>
                </div>
            </div>
            
            <!-- Repeat the above div for each job listing -->

            <div class="bg-white p-5 rounded-lg shadow">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Web Developer</h3>
                    <p class="text-gray-600">We are in need of a Web Developer for our company.</p>
                </div>
                <div class="bg-gray-100 p-3 rounded border border-gray-200">
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-map-marker"></i></span>
                        <span class="pl-2">Noida</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-clock-o"></i></span>
                        <span class="pl-2">Remote</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-usd"></i></span>
                        <span class="pl-2">2-3 Lacs PA</span>
                    </p>
                </div>
                <div class="mt-4">
                    <a href="job-detail.html" class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Details</a>
                </div>
            </div>

            <div class="bg-white p-5 rounded-lg shadow">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Web Developer</h3>
                    <p class="text-gray-600">We are in need of a Web Developer for our company.</p>
                </div>
                <div class="bg-gray-100 p-3 rounded border border-gray-200">
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-map-marker"></i></span>
                        <span class="pl-2">Noida</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-clock-o"></i></span>
                        <span class="pl-2">Remote</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-usd"></i></span>
                        <span class="pl-2">2-3 Lacs PA</span>
                    </p>
                </div>
                <div class="mt-4">
                    <a href="job-detail.html" class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Details</a>
                </div>
            </div>

            <div class="bg-white p-5 rounded-lg shadow">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Web Developer</h3>
                    <p class="text-gray-600">We are in need of a Web Developer for our company.</p>
                </div>
                <div class="bg-gray-100 p-3 rounded border border-gray-200">
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-map-marker"></i></span>
                        <span class="pl-2">Noida</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-clock-o"></i></span>
                        <span class="pl-2">Remote</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-usd"></i></span>
                        <span class="pl-2">2-3 Lacs PA</span>
                    </p>
                </div>
                <div class="mt-4">
                    <a href="job-detail.html" class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Details</a>
                </div>
            </div>

            <div class="bg-white p-5 rounded-lg shadow">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Web Developer</h3>
                    <p class="text-gray-600">We are in need of a Web Developer for our company.</p>
                </div>
                <div class="bg-gray-100 p-3 rounded border border-gray-200">
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-map-marker"></i></span>
                        <span class="pl-2">Noida</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-clock-o"></i></span>
                        <span class="pl-2">Remote</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-usd"></i></span>
                        <span class="pl-2">2-3 Lacs PA</span>
                    </p>
                </div>
                <div class="mt-4">
                    <a href="job-detail.html" class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Details</a>
                </div>
            </div>

            <div class="bg-white p-5 rounded-lg shadow">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Web Developer</h3>
                    <p class="text-gray-600">We are in need of a Web Developer for our company.</p>
                </div>
                <div class="bg-gray-100 p-3 rounded border border-gray-200">
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-map-marker"></i></span>
                        <span class="pl-2">Noida</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-clock-o"></i></span>
                        <span class="pl-2">Remote</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-usd"></i></span>
                        <span class="pl-2">2-3 Lacs PA</span>
                    </p>
                </div>
                <div class="mt-4">
                    <a href="job-detail.html" class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Details</a>
                </div>
            </div>

            
        </div>
    </div>
</section>







<section class="py-5 bg-gray-100">
    <div class="container mx-auto px-4 md:px-6"> <!-- Added horizontal padding -->
        <h2 class="text-2xl font-bold text-center mb-5">Latest Jobs</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-5 rounded-lg shadow">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Web Developer</h3>
                    <p class="text-gray-600">We are in need of a Web Developer for our company.</p>
                </div>
                <div class="bg-gray-100 p-3 rounded border border-gray-200">
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-map-marker"></i></span>
                        <span class="pl-2">Noida</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-clock-o"></i></span>
                        <span class="pl-2">Remote</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-usd"></i></span>
                        <span class="pl-2">2-3 Lacs PA</span>
                    </p>
                </div>
                <div class="mt-4">
                    <a href="job-detail.html" class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Details</a>
                </div>
            </div>
            
            <!-- Repeat the above div for each job listing -->

            <div class="bg-white p-5 rounded-lg shadow">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Web Developer</h3>
                    <p class="text-gray-600">We are in need of a Web Developer for our company.</p>
                </div>
                <div class="bg-gray-100 p-3 rounded border border-gray-200">
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-map-marker"></i></span>
                        <span class="pl-2">Noida</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-clock-o"></i></span>
                        <span class="pl-2">Remote</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-usd"></i></span>
                        <span class="pl-2">2-3 Lacs PA</span>
                    </p>
                </div>
                <div class="mt-4">
                    <a href="job-detail.html" class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Details</a>
                </div>
            </div>

            <div class="bg-white p-5 rounded-lg shadow">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Web Developer</h3>
                    <p class="text-gray-600">We are in need of a Web Developer for our company.</p>
                </div>
                <div class="bg-gray-100 p-3 rounded border border-gray-200">
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-map-marker"></i></span>
                        <span class="pl-2">Noida</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-clock-o"></i></span>
                        <span class="pl-2">Remote</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-usd"></i></span>
                        <span class="pl-2">2-3 Lacs PA</span>
                    </p>
                </div>
                <div class="mt-4">
                    <a href="job-detail.html" class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Details</a>
                </div>
            </div>

            <div class="bg-white p-5 rounded-lg shadow">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Web Developer</h3>
                    <p class="text-gray-600">We are in need of a Web Developer for our company.</p>
                </div>
                <div class="bg-gray-100 p-3 rounded border border-gray-200">
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-map-marker"></i></span>
                        <span class="pl-2">Noida</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-clock-o"></i></span>
                        <span class="pl-2">Remote</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-usd"></i></span>
                        <span class="pl-2">2-3 Lacs PA</span>
                    </p>
                </div>
                <div class="mt-4">
                    <a href="job-detail.html" class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Details</a>
                </div>
            </div>

            <div class="bg-white p-5 rounded-lg shadow">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Web Developer</h3>
                    <p class="text-gray-600">We are in need of a Web Developer for our company.</p>
                </div>
                <div class="bg-gray-100 p-3 rounded border border-gray-200">
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-map-marker"></i></span>
                        <span class="pl-2">Noida</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-clock-o"></i></span>
                        <span class="pl-2">Remote</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-usd"></i></span>
                        <span class="pl-2">2-3 Lacs PA</span>
                    </p>
                </div>
                <div class="mt-4">
                    <a href="job-detail.html" class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Details</a>
                </div>
            </div>

            <div class="bg-white p-5 rounded-lg shadow">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Web Developer</h3>
                    <p class="text-gray-600">We are in need of a Web Developer for our company.</p>
                </div>
                <div class="bg-gray-100 p-3 rounded border border-gray-200">
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-map-marker"></i></span>
                        <span class="pl-2">Noida</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-clock-o"></i></span>
                        <span class="pl-2">Remote</span>
                    </p>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><i class="fa fa-usd"></i></span>
                        <span class="pl-2">2-3 Lacs PA</span>
                    </p>
                </div>
                <div class="mt-4">
                    <a href="job-detail.html" class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Details</a>
                </div>
            </div>

            
        </div>
    </div>
</section>


@endsection