@extends('front.layouts.app')

@section('main')


<section class="bg-gray-100">
    <div class="container mx-auto py-10">
        <div class="flex flex-col lg:flex-row lg:space-x-8">
            <div class="w-full lg:w-1/4 mb-8 lg:mb-0">
                @include('front.account.sidebar')
            </div>
            <div class="w-full lg:w-3/4">
                <div class="bg-white rounded-lg shadow-md mb-6">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold mb-4">My Profile</h3>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Name*</label>
                            <input type="text"  name="name"  id="name"  placeholder="Enter Name" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:border-blue-500"  value="{{ $user->name }}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Email*</label>
                            <input type="text"  name="email"  id="email"   placeholder="Enter Email" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:border-blue-500"  value="{{ $user->email }}" >
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Designation*</label>
                            <input type="text" name="designation"  id="designation"   placeholder="Designation" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:border-blue-500"   value="{{ $user->designation }}" >
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Mobile*</label>
                            <input type="text"   name="mobile"  id="mobile"  placeholder="Mobile" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:border-blue-500" value="{{ $user->mobile }}">
                        </div>
                    </div>
                    <div class="p-6 bg-gray-50 text-right">
                        <button type="button" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Update</button>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold mb-4">Change Password</h3>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Old Password*</label>
                            <input type="password" placeholder="Old Password" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">New Password*</label>
                            <input type="password" placeholder="New Password" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Confirm Password*</label>
                            <input type="password" placeholder="Confirm Password" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:border-blue-500">
                        </div>
                    </div>
                    <div class="p-6 bg-gray-50 text-right">
                        <button type="button" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
