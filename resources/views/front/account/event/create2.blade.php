@extends('front.layouts.app')

@section('main')

<section class="bg-gray-100">
    <div class="container mx-auto py-10">
        <div class="flex flex-col lg:flex-row lg:space-x-8">
            <!-- Sidebar with 25% width on the left side -->
            <div class="w-full lg:w-1/4 mb-8 lg:mb-0">
                @include('front.account.sidebar')
            </div>

            <!-- Main content with 75% width on the right side -->
            <div class="w-full lg:w-3/4">
                <form action="" method="post" id="createEventForm" name="createEventForm">
                    @csrf

                    <!-- Event Details Card -->
                    <div class="bg-white rounded-lg shadow-md mb-6">
                        <div class="p-6">
                            <h3 class="text-2xl font-semibold mb-4">Event Details</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">


                                <div class="mb-4">
                                    <label for="title" class="block text-gray-700 mb-2">Title*</label>
                                    <input type="text" name="title" id="title" placeholder="Event Title" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:border-blue-500">
                                    <p class="text-red-500"></p>
                                </div>


                                <div class="mb-4">
                                    <label for="category" class="block text-gray-700 mb-2">Category*</label>
                                    <select name="category" id="category" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:border-blue-500">
                                        <option value="">Select a Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-red-500"></p>
                                </div>


                                <div class="mb-4">
                                    <label for="deptType"  class="block text-gray-700 mb-2">Dept Type</label>
                                    <select name="deptType" id="deptType" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:border-blue-500">
                                        <option value="">Select Department Type</option>
                                        @if ($deptTypes->isNotEmpty())
                                            @foreach ($deptTypes as $deptType)
                                                <option value="{{ $deptType->id }}">{{ $deptType->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p class="text-red-500"></p>
                                </div>

                                
                                <div class="mb-4">
                                    <label for="vacancy" class="block text-gray-700 mb-2">Vacancy<span class="text-red-500">*</span></label>
                                    <input type="number" min="1" placeholder="Vacancy" id="vacancy" name="vacancy" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:border-blue-500">
                                    <p class="text-red-500"></p>
                                </div>


                                <div class="mb-4">
                                    <label for="registrationfees" class="block text-gray-700 mb-2">RegistrationFees</label>
                                    <input type="text" placeholder="Reg. Fees" id="registrationfees" name="registrationfees" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:border-blue-500">
                                </div>



                                <div class="mb-4">
                                    <label for="Loc" class="block text-gray-700 mb-2">Location<span class="text-red-500">*</span></label>
                                    <select name="Loc" id="Loc" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:border-blue-500">
                                        <option value="">Select Location</option>
                                        @if ($locations->isNotEmpty())
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->id }}">{{ $location->versity_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p class="text-red-500"></p>
                                </div>



                                <div class="mb-4">
                                    <label for="description" class="block text-gray-700 mb-2">Description<span class="text-red-500">*</span></label>
                                    <textarea class="textarea mt-2 block w-full p-2 border border-gray-300 rounded-md" name="description" id="description" cols="5" rows="5" placeholder="Description"></textarea>
                                    <p class="text-red-500"></p>
                                </div>

                                <div class="mb-4">
                                    <label for="benefits" class="block text-sm font-medium text-gray-700">Benefits</label>
                                    <textarea class="textarea mt-2 block w-full p-2 border border-gray-300 rounded-md" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits"></textarea>
                                </div>
    
                                <div class="mb-4">
                                    <label for="responsibility" class="block text-sm font-medium text-gray-700">Responsibility</label>
                                    <textarea class="textarea mt-2 block w-full p-2 border border-gray-300 rounded-md" name="responsibility" id="responsibility" cols="5" rows="5" placeholder="Responsibility"></textarea>
                                </div>
    
                                <div class="mb-4">
                                    <label for="qualifications" class="block text-sm font-medium text-gray-700">Qualifications</label>
                                    <textarea class="textarea mt-2 block w-full p-2 border border-gray-300 rounded-md" name="qualifications" id="qualifications" cols="5" rows="5" placeholder="Qualifications"></textarea>
                                </div>


                                <div class="mb-4">
                                    <label for="duration" class="block text-sm font-medium text-gray-700">Duration <span class="text-red-500">*</span></label>
                                    <select name="duration" id="duration" class="form-control mt-2 block w-full p-2 border border-gray-300 rounded-md">
                                        <option value="1">1 day</option>
                                        <option value="2">2 day</option>
                                        <option value="3">3 dayy</option>
                                        <option value="4">4 day</option>
                                        <option value="5">5 day</option>
                                        <option value="6">6 day</option>
                                        <option value="7">7 Day</option>
                                        <option value="8">8 Day</option>
                                        <option value="9">9 Day</option>
                                        <option value="10">10 Day</option>
                                        <option value="10_plus">10+ Day</option>
                                    </select>
                                    <p class="text-red-500"></p>
                                </div>


                                <div class="mb-4">
                                    <label for="keywords" class="block text-sm font-medium text-gray-700">Keywords</label>
                                    <input type="text" placeholder="keywords" id="keywords" name="keywords" class="form-control mt-2 block w-full p-2 border border-gray-300 rounded-md">
                                </div>


                            </div>

                            <!-- Other Fields (similar structure) -->
                            <!-- Add the remaining fields here with similar styling as in profile.blade.php -->
                            <!-- For example: Job Type, Vacancy, Salary, Location, Description, etc. -->

                            <!-- Submit Button -->
                            {{-- <div class="p-6 bg-gray-50 text-right">
                                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Submit</button>
                            </div> --}}
                        </div>



                         <!-- Club Details Card -->
                        <div class="bg-white rounded-lg shadow-md">
                            <div class="p-6">
                                <h3 class="text-2xl font-semibold mb-4">Club Details</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="mb-4">
                                        <label for="club_name" class="block text-gray-700 mb-2">Name*</label>
                                        <input type="text" name="club_name" id="club_name" placeholder="Club Name" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:border-blue-500">
                                        <p class="text-red-500"></p>
                                    </div>
                                    <div class="mb-4">
                                        <label for="club_location" class="block text-gray-700 mb-2">Location*</label>
                                        <input type="text" name="club_location" id="club_location" placeholder="Club Location" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:border-blue-500">
                                    </div>
                                </div>
    
                                <div class="mb-4">
                                    <label for="club_website" class="block text-gray-700 mb-2">Website*</label>
                                    <input type="text" name="website" id="website" placeholder="Club Website" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:border-blue-500">
                                </div>
    
                                <div class="p-6 bg-gray-50 text-right">
                                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Submit</button>
                                </div>
                            </div>
                        </div>

                    </div>

                   
                   
                </form>
            </div>
        </div>
    </div>
</section>

@endsection







@section('customJs')
<script>
// $("#createEventForm").submit(function(e){
//     e.preventDefault();

//     $.ajax({
//         url: '{{ route("account.saveEvent2") }}',
//         type: 'post',
//         data: $("#createEventForm").serializeArray(),
//         dataType: 'json',
//         success: function(response) {
//             if (response.status == false) {
//                 var errors = response.errors;
                
//                 if (errors.title) {
//                     $("#title").addClass('is-invalid')
//                     .siblings('p')
//                     .addClass('text-red-500')
//                     .html(errors.title);
//                 } else {
//                     $("#title").removeClass('is-invalid')
//                     .siblings('p')
//                     .removeClass('text-red-500')
//                     .html('');
//                 }

//                 if (errors.email) {
//                     $("#category").addClass('is-invalid')
//                     .siblings('p')
//                     .addClass('text-red-500')
//                     .html(errors.category);
//                 } else {
//                     $("#category").removeClass('is-invalid')
//                     .siblings('p')
//                     .removeClass('text-red-500')
//                     .html('');
//                 }

//                 if (errors.password) {
//                     $("#deptType").addClass('is-invalid')
//                     .siblings('p')
//                     .addClass('text-red-500')
//                     .html(errors.deptType);
//                 } else {
//                     $("#deptType").removeClass('is-invalid')
//                     .siblings('p')
//                     .removeClass('text-red-500')
//                     .html('');
//                 }

//                 if (errors.vacancy) {
//                     $("#confirm_password").addClass('is-invalid')
//                     .siblings('p')
//                     .addClass('text-red-500')
//                     .html(errors.vacancy);
//                 } else {
//                     $("#vacancy").removeClass('is-invalid')
//                     .siblings('p')
//                     .removeClass('text-red-500')
//                     .html('');
//                 }


//                 if (errors.Loc) {
//                     $("#Loc").addClass('is-invalid')
//                     .siblings('p')
//                     .addClass('text-red-500')
//                     .html(errors.Loc);
//                 } else {
//                     $("#Loc").removeClass('is-invalid')
//                     .siblings('p')
//                     .removeClass('text-red-500')
//                     .html('');
//                 }

//                 if (errors.description) {
//                     $("#description").addClass('is-invalid')
//                     .siblings('p')
//                     .addClass('text-red-500')
//                     .html(errors.description);
//                 } else {
//                     $("#description").removeClass('is-invalid')
//                     .siblings('p')
//                     .removeClass('text-red-500')
//                     .html('');
//                 }

//                 if (errors.duration) {
//                     $("#duration").addClass('is-invalid')
//                     .siblings('p')
//                     .addClass('text-red-500')
//                     .html(errors.duration);
//                 } else {
//                     $("#duration").removeClass('is-invalid')
//                     .siblings('p')
//                     .removeClass('text-red-500')
//                     .html('');
//                 }


//                 if (errors.club_name) {
//                     $("#duration").addClass('is-invalid')
//                     .siblings('p')
//                     .addClass('text-red-500')
//                     .html(errors.club_name);
//                 } else {
//                     $("#club_name").removeClass('is-invalid')
//                     .siblings('p')
//                     .removeClass('text-red-500')
//                     .html('');
//                 }



//             } else {
//                 $("#title, #category, #deptType, #vacancy, #Loc, #description, #duration, #club_name ").removeClass('is-invalid')
//                 .siblings('p')
//                 .removeClass('text-red-500')
//                 .html('');

//                 window.location.href='{{ route("account.login") }}';
//             }
//         }
//     });

// });
$("#createEventForm").submit(function(e){
    e.preventDefault();

    $.ajax({
        url: '{{ route("account.saveEvent2") }}', // Use a dedicated preview route
        type: 'post',
        data: $("#createEventForm").serializeArray(),
        dataType: 'json',
        success: function(response) {
            if (response.status == false) {
                var errors = response.errors;

                if (errors.title) {
                    $("#title").addClass('is-invalid')
                    .siblings('p')
                    .addClass('text-red-500')
                    .html(errors.title);
                } else {
                    $("#title").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('text-red-500')
                    .html('');
                }

                if (errors.category) {
                    $("#category").addClass('is-invalid')
                    .siblings('p')
                    .addClass('text-red-500')
                    .html(errors.category);
                } else {
                    $("#category").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('text-red-500')
                    .html('');
                }

                if (errors.deptType) {
                    $("#deptType").addClass('is-invalid')
                    .siblings('p')
                    .addClass('text-red-500')
                    .html(errors.deptType);
                } else {
                    $("#deptType").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('text-red-500')
                    .html('');
                }

                if (errors.vacancy) {
                    $("#vacancy").addClass('is-invalid')
                    .siblings('p')
                    .addClass('text-red-500')
                    .html(errors.vacancy);
                } else {
                    $("#vacancy").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('text-red-500')
                    .html('');
                }

                if (errors.Loc) {
                    $("#Loc").addClass('is-invalid')
                    .siblings('p')
                    .addClass('text-red-500')
                    .html(errors.Loc);
                } else {
                    $("#Loc").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('text-red-500')
                    .html('');
                }

                if (errors.description) {
                    $("#description").addClass('is-invalid')
                    .siblings('p')
                    .addClass('text-red-500')
                    .html(errors.description);
                } else {
                    $("#description").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('text-red-500')
                    .html('');
                }

                if (errors.duration) {
                    $("#duration").addClass('is-invalid')
                    .siblings('p')
                    .addClass('text-red-500')
                    .html(errors.duration);
                } else {
                    $("#duration").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('text-red-500')
                    .html('');
                }

                if (errors.club_name) {
                    $("#club_name").addClass('is-invalid')
                    .siblings('p')
                    .addClass('text-red-500')
                    .html(errors.club_name);
                } else {
                    $("#club_name").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('text-red-500')
                    .html('');
                }

            } else {
                // Display the collected form data in an alert for previewing
                // alert("Data to be saved:\n\n" + JSON.stringify(response.data, null, 4));
                alert("Data to be saved:\n\n");
                window.location.href='{{ route("account.profile") }}';
            }
        }
    });
});

</script>
@endsection
