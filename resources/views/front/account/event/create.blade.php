@extends('front.layouts.app')

@section('main')
<section class="bg-blue-50 py-10">
    <div class="container mx-auto py-6">
        <div class="flex justify-between mb-6">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-lg p-4 bg-white shadow-md hover:shadow-lg transition-shadow duration-300">
                    <ol class="breadcrumb flex text-gray-500 space-x-2">
                        <li class="breadcrumb-item"><a href="#" class="text-blue-600 hover:text-blue-800 transition-colors duration-200">Home</a></li>
                        <li class="breadcrumb-item text-gray-700">Account Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
        
        <div class="flex flex-wrap">
            <div class="w-full lg:w-1/4 mb-6 lg:mb-0">
                @include('front.account.sidebar')
            </div>
            
            <div class="w-full lg:w-3/4">
                {{-- <form action="{{ route('account.saveJob') }}" method="post" id="createEventForm" name="createEventForm"> --}}
                    <form action="{{ route('account.saveJob') }}" method="POST" id="createEventForm" name="createEventForm">


                    @csrf
                    <div class="bg-white shadow-md rounded-lg mb-6 hover:shadow-lg transition-shadow duration-300">
                        <div class="p-8">
                            <h3 class="text-2xl font-semibold text-gray-800 mb-6">Event Details</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-800 mb-1">Title<span class="text-red-500">*</span></label>
                                    <input type="text" placeholder="Event Title" id="title" name="title" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                    <p></p>
                                </div>
                                
                                <div>
                                    <label for="category" class="block text-sm font-medium text-gray-800 mb-1">Category<span class="text-red-500">*</span></label>
                                    <select name="category" id="category" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                        <option value="">Select a Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <p></p>
                                </div>

                                <div>
                                    <label for="depttypes" class="block text-sm font-medium text-gray-800 mb-1">Dept Types<span class="text-red-500">*</span></label>
                                    <select name="depttypes" id="depttypes" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                        <option value="">Select a Dept</option>
                                        @foreach ($deptTypes as $dept)
                                            <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                        @endforeach
                                    </select>
                                    <p></p>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                                <div>
                                    <label for="vacancy" class="block text-sm font-medium text-gray-800 mb-1">Vacancy<span class="text-red-500">*</span></label>
                                    <input type="number" min="1" placeholder="Vacancy" id="vacancy" name="vacancy" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                    <p></p>
                                </div>
                                
                                <div>
                                    <label for="registrationfees" class="block text-sm font-medium text-gray-800 mb-1">Registration Fees</label>
                                    <input type="text" placeholder="Registration Fees" id="registrationfees" name="registrationfees" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                </div>

                                <div>
                                    <label for="location" class="block text-sm font-medium text-gray-800 mb-1">Location<span class="text-red-500">*</span></label>
                                    <select name="location" id="location" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                        <option value="">Select a Location</option>
                                        @foreach ($locations as $loc)
                                            <option value="{{ $loc->id }}">{{ $loc->versity_name }}</option>
                                        @endforeach
                                    </select>
                                    <p></p>
                                </div>
                            </div>
                            
                            <div class="mt-6">
                                <label for="description" class="block text-sm font-medium text-gray-800 mb-1">Description<span class="text-red-500">*</span></label>
                                <textarea class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200" name="description" id="description" cols="5" rows="5" placeholder="Description"></textarea>
                                <p></p>
                            </div>
                            
                            <div class="mt-6">
                                <label for="benefits" class="block text-sm font-medium text-gray-800 mb-1">Benefits</label>
                                <textarea class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits"></textarea>
                            </div>
                            
                            <div class="mt-6">
                                <label for="responsibility" class="block text-sm font-medium text-gray-800 mb-1">Responsibility</label>
                                <textarea class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200" name="responsibility" id="responsibility" cols="5" rows="5" placeholder="Responsibility"></textarea>
                            </div>

                            <div class="mt-6">
                                <label for="qualifications" class="block text-sm font-medium text-gray-800 mb-1">Qualifications</label>
                                <textarea class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200" name="qualifications" id="qualifications" cols="5" rows="5" placeholder="Qualifications"></textarea>
                            </div>
                            
                            <div class="mt-6">
                                <label for="keywords" class="block text-sm font-medium text-gray-800 mb-1">Keywords</label>
                                <input type="text" placeholder="Event Keywords" id="keywords" name="keywords" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                            </div>
                            
                            <div class="mt-6">
                                <label for="duration" class="block text-sm font-medium text-gray-800 mb-1">Event Duration</label>
                                <input type="text" placeholder="Event Duration" id="duration" name="duration" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                            </div>

                            <div class="mt-6">
                                <label for="club_name" class="block text-sm font-medium text-gray-800 mb-1">Club Name</label>
                                <input type="text" placeholder="Club Name" id="club_name" name="club_name" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                            </div>

                            <div class="mt-6">
                                <label for="club_location" class="block text-sm font-medium text-gray-800 mb-1">Club Location</label>
                                <input type="text" placeholder="Club Location" id="club_location" name="club_location" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                            </div>

                            <div class="mt-6">
                                <label for="website" class="block text-sm font-medium text-gray-800 mb-1">Club Website</label>
                                <input type="text" placeholder="Club Website" id="website" name="website" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                            </div>
                            
                            <div class="mt-6">
                                <button type="submit" class="py-3 px-6 bg-blue-500 text-white text-lg rounded-lg hover:bg-blue-700">Save Event</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection







{{-- @section('customJs')
    <script type="text/javascript">
        $("#createEventForm").submit(function(e){
    e.preventDefault();
    $("button[type='submit']").prop('disabled',true);

    $.ajax({
        url: '{{ route("account.saveJob") }}',
        type: 'POST',
        dataType: 'json',
        data: $("#createEventForm").serializeArray(),
        success: function(response) {
            $("button[type='submit']").prop('disabled',false);

            if(response.status == true) {

                $("#title").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')

                $("#category").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')

                $("#depttypes").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')

                $("#vacancy").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')

                $("#location").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')


                $("#description").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')

                $("#club_name").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')

                window.location.href="{{ route('account.profile') }}";

            } else {
                var errors = response.errors;

                if (errors.title) {
                    $("#title").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback')
                    .html(errors.title)
                } else {
                    $("#title").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')
                }

                if (errors.category) {
                    $("#category").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback')
                    .html(errors.category)
                } else {
                    $("#category").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')
                }

                if (errors.depttypes) {
                    $("#depttypes").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback')
                    .html(errors.jobType)
                } else {
                    $("#depttypes").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')
                }

                if (errors.vacancy) {
                    $("#vacancy").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback')
                    .html(errors.vacancy)
                } else {
                    $("#vacancy").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')
                }

                if (errors.location) {
                    $("#location").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback')
                    .html(errors.location)
                } else {
                    $("#location").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')
                }

                if (errors.description) {
                    $("#description").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback')
                    .html(errors.description)
                } else {
                    $("#description").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')
                }

                if (errors.company_name) {
                    $("#club_name").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback')
                    .html(errors.company_name)
                } else {
                    $("#club_name").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')
                }
            }

        }
    });
});
    </script>
@endsection --}}


@section('customJs')
<script type="text/javascript">
    $("#createEventForm").submit(function(e){
        e.preventDefault();
        $("button[type='submit']").prop('disabled', true);

        $.ajax({
            url: '{{ route("account.saveJob") }}',
            type: 'POST',
            dataType: 'json',
            data: $("#createEventForm").serializeArray(),
            success: function(response) {
                $("button[type='submit']").prop('disabled', false);

                if(response.status == true) {
                    // Clear all error styles if submission is successful
                    $("input, select, textarea").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('');

                    window.location.href="{{ route('account.profile') }}";
                } else {
                    var errors = response.errors;

                    // Handle each form field validation error
                    if (errors.title) {
                        $("#title").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.title);
                    } else {
                        $("#title").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                    }

                    if (errors.category) {
                        $("#category").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.category);
                    } else {
                        $("#category").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                    }

                    if (errors.depttypes) {
                        $("#depttypes").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.depttypes); // Corrected the error field to depttypes
                    } else {
                        $("#depttypes").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                    }

                    if (errors.vacancy) {
                        $("#vacancy").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.vacancy);
                    } else {
                        $("#vacancy").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                    }

                    if (errors.location) {
                        $("#location").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.location);
                    } else {
                        $("#location").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                    }

                    if (errors.description) {
                        $("#description").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.description);
                    } else {
                        $("#description").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                    }

                    if (errors.club_name) {
                        $("#club_name").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.club_name);
                    } else {
                        $("#club_name").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                    }

                    if (errors.registrationfees) {
                        $("#registrationfees").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.registrationfees);
                    } else {
                        $("#registrationfees").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                    }

                    if (errors.duration) {
                        $("#duration").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.duration);
                    } else {
                        $("#duration").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                    }

                    if (errors.club_location) {
                        $("#club_location").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.club_location);
                    } else {
                        $("#club_location").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                    }

                    if (errors.website) {
                        $("#website").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.website);
                    } else {
                        $("#website").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                    }
                }
            }
        });
    });
</script>
@endsection
