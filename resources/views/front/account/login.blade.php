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
            <div class="w-full md:w-2/5">
                <div class="bg-white shadow-lg  p-8">
                    <h1 class="flex justify-center text-2xl font-semibold mb-6">Login</h1>
                    <form action="{{ route('account.authenticateUser') }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium mb-2">Email*</label>
                            <input type="text" name="email" id="email" placeholder="example@example.com" class="w-full p-3 border  focus:outline-none focus:border-blue-500 @error('email') border-red-500 @enderror">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium mb-2">Password*</label>
                            <input type="password" name="password" id="password" placeholder="Enter Password" class="w-full p-3 border  focus:outline-none focus:border-blue-500 @error('password') border-red-500 @enderror">
                            @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-center items-center w-full">
                            <button class="bg-gray-900 text-white font-semibold py-2 px-4 mt-2">Login</button>
                            {{-- <a href="forgot-password.html" class="text-blue-500 hover:underline mt-3">Forgot Password?</a> --}}
                        </div>
                    </form>
                </div>
                <div class="mt-6 text-center">
                    <p>Do not have an account? <a href="{{ route('account.registration') }}" class="text-blue-500 hover:underline">Register</a></p>
                </div>




                
<!-- Google Login button -->
<form action="{{ route('google-auth') }}" method="GET">
    @csrf
    <button type="submit" class="bg-gray-900 text-white px-4 py-2 w-full mt-2">Login Using Google</button>
</form>







            </div>
        </div>
        <div class="py-20"></div>
        
</section>
@endsection