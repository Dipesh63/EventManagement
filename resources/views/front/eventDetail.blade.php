@extends('front.layouts.app')

@section('main')
    <section class="bg-gray-100 py-10">
        <div class="container mx-auto pt-5">
            <div class="flex justify-start">
                <nav aria-label="breadcrumb" class="bg-gray-900  p-3 shadow">
                    <ol class="flex space-x-2 text-gray-700">
                        <li>
                            <a href="/events" class="flex items-center text-white hover:underline">
                                <i class="fa fa-arrow-left mr-2"></i> Back to Events
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>



        <div id="responseMessage" class="mt-4"></div>



        <div class="container mx-auto mt-8">
            <div class="flex flex-wrap pb-5">
                <div class="w-full lg:w-2/3 mb-6 lg:mb-0">
                    <div class="bg-white shadow-lg ">
                        <div class="p-5 border-b">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center space-x-4">
                                    <div>
                                        <a href="#">
                                            <h4 class="text-2xl font-semibold text-gray-800">{{ $event->title }}</h4>
                                        </a>
                                        <div class="flex items-center text-gray-600 space-x-4">
                                            <p class="flex items-center"><i
                                                    class="fa fa-map-marker mr-2"></i>{{ $event->location->versity_name }}
                                            </p>
                                            <p class="flex items-center"><i
                                                    class="fa fa-clock-o mr-2"></i>{{ $event->deptType->name }}</p>
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
                                <h4 class="text-lg font-semibold text-gray-800 mb-3">Event description</h4>
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
                                {{-- Payment Button --}}
                                @if (Auth::check())
                                    @if ($hasPaid)
                                        <button class="bg-gray-900 text-white py-2 px-4 " disabled>Paid</button>
                                    @else
                                        <a href="javascript:void(0)" id="paymentButton"
                                            class="bg-gray-900 hover:bg-gray-900 text-white py-2 px-4  mr-8">Payment</a>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}"
                                        class="bg-gray-900 text-white py-2 px-4">Log in to
                                        Pay</a>
                                @endif

                                {{-- Apply Button --}}
                                @if (Auth::check())
                                    @if ($hasApplied)
                                        <button class="bg-gray-900 text-white py-2 px-4 "
                                            disabled>Applied</button>
                                    @else
                                        <a id="applyButton" data-id="{{ $event->id }}"
                                            class="bg-gray-900 text-white py-2 px-4 cursor-pointer">Apply</a>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}"
                                        class="bg-gray-900 text-white py-2 px-4mr-8">Log in to
                                        Apply</a>
                                @endif

{{-- Upload Button --}}
@if (Auth::check())
@if ($hasCreated)
    {{-- <button class="bg-gray-900 text-white py-2 px-4 " disabled>Upload Materials</button> --}}
    <a href="{{ route('Materials_uploadRoute',  ['event_id' => $event->id] ) }}"><button class="bg-gray-900 text-white py-2 px-4 "  name="uploadbtn">Upload materilas</button></a>
@endif
@endif


                            </div>






                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/3">
                    <div class="bg-white shadow-lg  p-5 mb-4">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Event Summary</h3>
                        <ul class="text-gray-600 space-y-2">
                            <li>Vacancy: <span class="font-medium">{{ $event->vacancy }}</span></li>
                            <li>Salary: <span class="font-medium">{{ $event->registrationfees }}</span></li>
                            <li>Location: <span class="font-medium">{{ $event->location->versity_name }}</span></li>
                            <li>Department Type: <span class="font-medium">{{ $event->deptType->name }}</span></li>
                        </ul>
                    </div>
                    <div class="bg-white shadow-lg  p-5">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Club Details</h3>
                        <ul class="text-gray-600 space-y-2">
                            <li>Name: <span class="font-medium">{{ $event->club_name }}</span></li>
                            <li>Location: <span class="font-medium">{{ $event->club_location }}</span></li>
                            <li>Website: <a href="{{ (filter_var($event->club_website, FILTER_VALIDATE_URL)) ? $event->club_website : 'http://' . $event->club_website }}" class="font-medium cursor-pointer" target="_blank">{{ $event->club_website }}</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection









@section('customJs')
    {{-- <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        var applyButton = document.getElementById("applyButton");
        var messageContainer = document.getElementById("responseMessage");  // This is where the message will appear

        // Attach event listener to button click
        applyButton.addEventListener("click", function() {
            var eventId = this.getAttribute("data-id");
            applyjob(eventId);
        });

        function applyjob(id) {
            console.log("Apply button clicked with ID:", id);  // Debug message

            var confirmation = confirm("Are you sure you want to apply?");
            if (confirmation) {
                console.log("Confirmation received, proceeding with AJAX call");  // Debug message

                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                $.ajax({
                    url: '{{ route('event.applyevent') }}',
                    type: 'POST',
                    data: {
                        _token: csrfToken,
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
    if (response.status === 'success') {
    
        messageContainer.innerHTML = `<div class="p-4 mb-4 text-green-800 bg-green-100 border border-green-300 rounded-md">${response.message}</div>`;  // Show success message

    } else {
        messageContainer.innerHTML = `<div class="p-4 mb-4 text-red-800 bg-red-100 border border-red-300 rounded-md">${response.message}</div>`;  // Show error message
    }

    
}

                });

            } else {
                console.log("User canceled the application.");
            }
        }
    });
</script> --}}









    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {




            // Get the event ID from the payment button
            var paymentButton = document.getElementById("paymentButton");
            var eventId = "{{ $event->id }}"; // Access the event ID dynamically from Blade

            // Attach event listener to the payment button
            paymentButton.addEventListener("click", function() {
                // Redirect to the checkout route with the event ID
                window.location.href = `/checkout3/${eventId}`;
            });













            var applyButton = document.getElementById("applyButton");
            var messageContainer = document.getElementById(
                "responseMessage"); // This is where the message will appear

            // Attach event listener to button click
            applyButton.addEventListener("click", function() {
                var eventId = this.getAttribute("data-id");
                applyjob(eventId);
            });

            function applyjob(id) {
                console.log("Apply button clicked with ID:", id); // Debug message

                var confirmation = confirm("Are you sure you want to apply?");
                if (confirmation) {
                    console.log("Confirmation received, proceeding with AJAX call"); // Debug message

                    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    $.ajax({
                        url: '{{ route('event.applyevent') }}',
                        type: 'POST',
                        data: {
                            _token: csrfToken,
                            id: id
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'success') {

                                // Now send the event ID to the sendWelcomeEmail route
                                $.ajax({
                                    url: '{{ route('send-mail', ['event_id' => $event->id]) }}', // Pass event ID dynamically
                                    type: 'GET',
                                    data: {
                                        _token: csrfToken
                                    },
                                    success: function(mailResponse) {
                                        if (response.status === 'success') {
                                            messageContainer.innerHTML =
                                                `<div class="p-4 mb-4 text-green-800 bg-green-100 border border-green-300 rounded-md">${response.message}</div>`;


                                            // // Redirect to the hosted checkout route with event ID
                                            // window.location.href = `/checkout3?event_id=${id}`;

                                        }
                                        console.log('Email sent successfully:',
                                            mailResponse);
                                    },
                                    error: function(mailError) {
                                        console.log('Error sending email:', mailError);
                                    }
                                });

                            } else {
                                messageContainer.innerHTML =
                                    `<div class="p-4 mb-4 text-red-800 bg-red-100 border border-red-300 rounded-md">${response.message}</div>`; // Show error message
                            }
                        }
                    });

                } else {
                    console.log("User canceled the application.");
                }
            }
        });
    </script>
@endsection
