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

{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}


</head>
<body class="px-4 md:px-6" data-instant-intensity="mousedown">
    <header>
        <nav class="bg-gray-900 shadow py-3 mb-2">
            <div class="container mx-auto flex items-center justify-between px-6">
                <div class="flex-grow text-center">
                <a class="text-2xl font-semibold text-white " href="/">Event Management</a>
        
                <!-- Mobile Menu Button -->
                <button id="menuToggle" class="lg:hidden text-white focus:outline-none" type="button">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                
            </div>
        </nav>
        
        <!-- Sidebar Menu -->
        <div id="sidebar" class="fixed top-0 left-0 w-64 h-full bg-gray-900 text-white transform -translate-x-full transition-transform duration-300 ease-in-out shadow-lg z-50">
            <div class="p-5 flex justify-between items-center border-b border-gray-700">
                <span class="text-lg font-semibold">Menu</span>
                <button id="closeMenu" class="text-white focus:outline-none">&times;</button>
            </div>
            <ul class="mt-4 space-y-4 px-5">
                <li>
                    <a class="block px-4 py-2 bg-gray-800 rounded hover:bg-gray-700" href="/">Home</a>
                </li>
                <li>
                    @if(!Auth::check())
                        <a class="block px-4 py-2 bg-gray-800 rounded hover:bg-gray-700" href="{{ route('account.login') }}">Login</a>
                    @else
                        <a class="block px-4 py-2 bg-gray-800 rounded hover:bg-gray-700" href="{{ route('account.profile') }}">Profile</a>
                    @endif
                </li>
                <li>
                    <a class="block px-4 py-2 bg-gray-800 rounded hover:bg-gray-700" href="{{ route('account.createEvent') }}">Post Event</a>
                </li>
            </ul>
        </div>
        
        <!-- Overlay (optional for closing sidebar by clicking outside) -->
        <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden"></div>
        
        <!-- JavaScript for Slide-in Sidebar -->
        <script>
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.remove('-translate-x-full');
            document.getElementById('overlay').classList.remove('hidden');
        });
        
        document.getElementById('closeMenu').addEventListener('click', function() {
            document.getElementById('sidebar').classList.add('-translate-x-full');
            document.getElementById('overlay').classList.add('hidden');
        });
        
        // Close sidebar when clicking outside
        document.getElementById('overlay').addEventListener('click', function() {
            document.getElementById('sidebar').classList.add('-translate-x-full');
            document.getElementById('overlay').classList.add('hidden');
        });
        </script>
        
        
        <!-- JavaScript for Toggle -->
        <script>
        document.getElementById('menuToggle').addEventListener('click', function() {
            var menu = document.getElementById('navbarSupportedContent');
            menu.classList.toggle('hidden');
        });
        </script>
        
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




{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}



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