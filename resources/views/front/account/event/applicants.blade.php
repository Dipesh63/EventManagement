@extends('front.layouts.app')

@section('main')
<section class="bg-gray-200 py-10">
    <div class="container mx-auto px-4">
        <div class="row mb-8">
            <div class="w-full">
                <nav aria-label="breadcrumb" class="bg-white rounded-md p-4 shadow-sm">
                    <ol class="flex space-x-2 text-gray-600">
                        <li><a href="#" class="text-blue-600 hover:underline">Home</a></li>
                        <li><span>/</span></li>
                        <li class="text-gray-500">Account Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="flex flex-wrap">
            <div class="w-full lg:w-1/4 mb-8 lg:mb-0">
                @include('front.account.sidebar')
            </div>
            <div class="w-full lg:w-3/4">
                <div class="bg-white rounded-md shadow-sm p-5">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold">Applicants Info</h3>
                        <a href="{{ route('account.createEvent') }}" class="btn bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Post an Event</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead class="bg-gray-100 border-b">
                                <tr>
                                    <th class="py-3 px-5 text-left font-medium text-gray-700">Name</th>
                                    <th class="py-3 px-5 text-left font-medium text-gray-700">Email</th>
                                    <th class="py-3 px-5 text-left font-medium text-gray-700">Mobile</th>
                                    <th class="py-3 px-5 text-left font-medium text-gray-700">Event Name</th>
                                    <th class="py-3 px-5 text-left font-medium text-gray-700">Payment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($applicants->isNotEmpty())
                                    @foreach($applicants as $applicant)
                                        <tr class="border-b hover:bg-gray-100">
                                            <td class="py-4 px-5">{{ $applicant->user->name }}</td>
                                            <td class="py-4 px-5">{{ $applicant->user->email }}</td>
                                            <td class="py-4 px-5">{{ $applicant->user->mobile }}</td>
                                            <td class="py-4 px-5">{{ $applicant->event->title }}</td>
                                            <td class="py-4 px-5">{{ $applicant->payment_status }}</td>  <!-- Display payment status -->
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
