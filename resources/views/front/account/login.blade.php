@extends('front.layouts.app')


@section('main')
<section class="py-10">
    <div class="container mx-auto my-5">
        <div class="py-6">&nbsp;</div>



        <!-- Notification messages -->
        @if(Session::has('success'))
        <div class="fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-100 text-green-700 border border-green-500 px-6 py-4 rounded shadow-lg max-w-md text-center z-50">
            <p class="font-semibold">{{ Session::get('success') }}</p>
        </div>
        @endif

        @if(Session::has('error'))
        <div class="fixed top-4 left-1/2 transform -translate-x-1/2 bg-red-100 text-red-700 border border-red-500 px-6 py-4 rounded shadow-lg max-w-md text-center z-50">
            <p class="font-semibold">{{ Session::get('error') }}</p>
        </div>
        @endif





        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="shadow-lg border-0 p-8 bg-white rounded-lg">
                    <h1 class="text-3xl font-semibold mb-6">Login</h1>
                    <form action="account.html" method="post">
                        <div class="mb-4">
                            <label for="email" class="block mb-2 text-gray-700">Email*</label>
                            <input type="text" name="email" id="email" class="w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="example@example.com">
                        </div> 
                        <div class="mb-4">
                            <label for="password" class="block mb-2 text-gray-700">Password*</label>
                            <input type="password" name="password" id="password" class="w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Password">
                        </div> 
                        <div class="flex justify-between items-center">
                            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition mt-2">Login</button>
                            <a href="forgot-password.html" class="text-blue-600 hover:underline mt-2">Forgot Password?</a>
                        </div>
                    </form>                    
                </div>
                <div class="mt-4 text-center">
                    <p>Do not have an account? <a href="register.html" class="text-blue-600 hover:underline">Register</a></p>
                </div>
            </div>
        </div>
        <div class="py-10">&nbsp;</div>
    </div>
</section>
@endsection