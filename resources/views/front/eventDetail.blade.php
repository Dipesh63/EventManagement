@extends('front.layouts.app')

@section('main')
    <section class="bg-gray-100 py-10">
        <div class="container mx-auto pt-5">
            <div class="flex justify-start">
                <nav aria-label="breadcrumb" class="bg-white rounded-lg p-3 shadow">
                    <ol class="flex space-x-2 text-gray-700">
                        <li>
                            <a href="" class="flex items-center text-blue-600 hover:underline">
                                <i class="fa fa-arrow-left mr-2"></i> Back to Events
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container mx-auto mt-8">
            <div class="flex flex-wrap pb-5">
                <div class="w-full lg:w-2/3 mb-6 lg:mb-0">
                    <div class="bg-white shadow-lg rounded-lg">
                        <div class="p-5 border-b">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center space-x-4">
                                    <div>
                                        <a href="#">
                                            <h4 class="text-2xl font-semibold text-gray-800">{{ $event->title }}</h4>
                                        </a>
                                        <div class="flex items-center text-gray-600 space-x-4">
                                            <p class="flex items-center"><i class="fa fa-map-marker mr-2"></i>{{ $event->location->versity_name }}</p>
                                            <p class="flex items-center"><i class="fa fa-clock-o mr-2"></i>{{ $event->deptType->name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="text-gray-500 hover:text-red-500">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="mb-5">
                                <h4 class="text-lg font-semibold text-gray-800 mb-3">Job description</h4>
                                <p class="text-gray-600 mb-3">{{ $event->description }}</p>
                                
                            </div>
                            <div class="mb-5">
                                <h4 class="text-lg font-semibold text-gray-800 mb-3">Responsibility</h4>
                                <p class="text-gray-600 mb-3">{{ $event->responsibility }}</p>
                            </div>
                            <div class="mb-5">
                                <h4 class="text-lg font-semibold text-gray-800 mb-3">Qualifications</h4>
                                <p class="text-gray-600 mb-3">{{ $event->qualifications }}</p>
                            </div>
                            <div class="mb-5">
                                <h4 class="text-lg font-semibold text-gray-800 mb-3">Benefits</h4>
                                <p class="text-gray-600 mb-3">{{ $event->benefits }}</p>
                            </div>
                            <div class="border-t border-gray-300"></div>
                            <div class="pt-3 text-right">
                                <a href="#" class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-4 rounded-lg mr-2">Save</a>
                                <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">Apply</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/3">
                    <div class="bg-white shadow-lg rounded-lg p-5 mb-4">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Event Summary</h3>
                        <ul class="text-gray-600 space-y-2">
                            <li>Vacancy: <span class="font-medium">{{ $event->vacancy}}</span></li>
                            <li>Salary: <span class="font-medium">{{ $event->registrationfees}}</span></li>
                            <li>Location: <span class="font-medium">{{ $event->location->versity_name }}</span></li>
                            <li>Job Nature: <span class="font-medium">{{ $event->deptType->name }}</span></li>
                        </ul>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-5">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Club Details</h3>
                        <ul class="text-gray-600 space-y-2">
                            <li>Name: <span class="font-medium">{{ $event->club_name}}</span></li>
                            <li>Location: <span class="font-medium">{{ $event->club_location}}</span></li>
                            <li>Website: <span class="font-medium">{{ $event->club_website}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
@endsection
