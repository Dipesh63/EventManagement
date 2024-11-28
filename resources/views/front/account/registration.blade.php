@extends('front.layouts.app')

@section('main')
<section class="section-5">
    <div class="container mx-auto my-10">
        <div class="py-2">&nbsp;</div>
        <div class="flex justify-center">
            <div class="w-full md:w-2/5">
                <div class="bg-white shadow-lg rounded-lg p-8">
                    <h1 class="text-2xl font-semibold mb-6">Register</h1>
                    <form action="" name="UserRegistrationForm" id="UserRegistrationForm">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium mb-2">Name*</label>
                            <input type="text" name="name" id="name" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Name">
                            <p class="text-red-500"></p>
                        </div> 
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium mb-2">Email*</label>
                            <input type="text" name="email" id="email" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Email">
                            <p class="text-red-500"></p>
                        </div> 
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium mb-2">Password*</label>
                            <input type="password" name="password" id="password" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Password">
                            <p class="text-red-500"></p>
                        </div> 
                        <div class="mb-4">
                            <label for="confirm_password" class="block text-sm font-medium mb-2">Confirm Password*</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Password">
                            <p class="text-red-500"></p>
                        </div> 
                        <button class="w-full bg-blue-600 text-white py-3 rounded-md hover:bg-blue-700 transition mt-2">Register</button>
                    </form>                    
                </div>
                <div class="mt-6 text-center">
                    <p>Have an account? <a href="login.html" class="text-blue-600 hover:underline">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('customJs')
<script>
$("#UserRegistrationForm").submit(function(e){
    e.preventDefault();

    $.ajax({
        url: '{{ route("account.processRegistration") }}',
        type: 'post',
        data: $("#UserRegistrationForm").serializeArray(),
        dataType: 'json',
        success: function(response) {
            if (response.status == false) {
                var errors = response.errors;
                
                if (errors.name) {
                    $("#name").addClass('is-invalid')
                    .siblings('p')
                    .addClass('text-red-500')
                    .html(errors.name);
                } else {
                    $("#name").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('text-red-500')
                    .html('');
                }

                if (errors.email) {
                    $("#email").addClass('is-invalid')
                    .siblings('p')
                    .addClass('text-red-500')
                    .html(errors.email);
                } else {
                    $("#email").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('text-red-500')
                    .html('');
                }

                if (errors.password) {
                    $("#password").addClass('is-invalid')
                    .siblings('p')
                    .addClass('text-red-500')
                    .html(errors.password);
                } else {
                    $("#password").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('text-red-500')
                    .html('');
                }

                if (errors.confirm_password) {
                    $("#confirm_password").addClass('is-invalid')
                    .siblings('p')
                    .addClass('text-red-500')
                    .html(errors.confirm_password);
                } else {
                    $("#confirm_password").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('text-red-500')
                    .html('');
                }
            } else {
                $("#name, #email, #password, #confirm_password").removeClass('is-invalid')
                .siblings('p')
                .removeClass('text-red-500')
                .html('');

                window.location.href='{{ route("account.login") }}';
            }
        }
    });

});
</script>
@endsection
