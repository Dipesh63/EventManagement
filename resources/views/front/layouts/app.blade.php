<!DOCTYPE html>
<html class="no-js" lang="en_AU" />
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	{{-- <title>Event management | Find Best events</title> --}}
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
	<meta name="HandheldFriendly" content="True" />
	<meta name="pinterest" content="nopin" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    {{-- <link rel="stylesheet" type="text/css" href="assets/css/style.css" />  --}}
	<!-- Fav Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="#" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="px-4 md:px-6" data-instant-intensity="mousedown">
    <header>
        <nav class="bg-white shadow py-3">
            <div class="container mx-auto flex items-center justify-between px-6"> <!-- Added px-6 for padding on both sides -->
                <a class="text-2xl font-semibold text-gray-800" href="/">Event management</a>
                <button class="lg:hidden text-gray-800 focus:outline-none" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                <div class="hidden lg:flex lg:items-center lg:space-x-6" id="navbarSupportedContent">
                    <ul class="flex items-center space-x-4">
                        <li>
                            <a class="text-gray-800 hover:text-gray-600" href="/">Home</a>
                        </li>
                        <li>
                            {{-- <a class="text-gray-800 hover:text-gray-600" href="jobs.html">Find Jobs</a> --}}
                        </li>
                    </ul>
                    <div class="flex items-center space-x-2">
                       @if(!Auth::check())
                        <a class="border border-blue-600 text-blue-600 px-3 py-1 rounded hover:bg-blue-600 hover:text-white transition" href="{{ route('account.login') }}">Login</a>
                        @else
                        <a class="border border-blue-600 text-blue-600 px-3 py-1 rounded hover:bg-blue-600 hover:text-white transition" href="{{ route('account.profile') }}">Profile</a>
                        @endif
                        <a class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition" href="{{ route('account.createEvent')}} ">Post Event</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    




@yield('main')



<!-- <div class="fixed inset-0 z-50 flex items-center justify-center" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
        <div class="modal-header p-4 border-b">
            <h5 class="text-lg font-semibold" id="exampleModalLabel">Change Profile Picture</h5>
            <button type="button" class="text-gray-600 hover:text-gray-800" data-bs-dismiss="modal" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="modal-body p-4">
            <form>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Profile Image</label>
                    <input type="file" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" id="image" name="image">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 mx-3">Update</button>
                    <button type="button" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-400" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div> -->





<footer class="bg-gray-900 py-3">
    <div class="container mx-auto">
        <p class="text-center text-white font-semibold">University Club management, all rights reserved</p>
    </div>
</footer>


<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
<script src="{{ asset('assets/js/instantpages.5.1.0.min.js') }}"></script>
<script src="{{ asset('assets/js/lazyload.17.6.0.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js" integrity="sha512-YJgZG+6o3xSc0k5wv774GS+W1gx0vuSI/kr0E0UylL/Qg/noNspPtYwHPN9q6n59CTR/uhgXfjDXLTRI+uIryg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script>
  $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
</script>


@yield('customJs')
</body>
</html>