{{-- <div class="card shadow-lg mb-4 p-3 border-0">
    <div class="s-body text-center mt-3">
        <img src="assets/assets/images/avatar7.png" alt="avatar" class="rounded-full w-36 h-36 mx-auto">
        <h5 class="mt-3 pb-0 text-lg font-semibold">{{ Auth::user()->name }}</h5>
        <p class="text-gray-500 mb-1 text-sm">>{{ Auth::user()->designation }}</p>
        <div class="flex justify-center mb-2">
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn-primary px-4 py-2 rounded-md text-white bg-blue-600 hover:bg-blue-700">Change Profile Picture</button>
        </div>
    </div>
</div> --}}
<div class="flex flex-col items-center justify-center mb-4">
    {{-- <!-- Display user avatar -->
    <img src="{{ asset('assets/images/avatar7.png') }}" alt="avatar" class="rounded-full w-36 h-36 mx-auto"> --}}
    <img src="{{ asset(Auth::user()->profile_picture ?? 'assets/images/avatar7.png') }}"  alt="avatar"  class="  w-68 h-52 mx-auto">
    

    
    <!-- Button to open modal -->
    <button 
        type="button" 
        class="btn-primary px-4 py-2 rounded-md text-white bg-blue-600 hover:bg-blue-700 mb-3" 
        onclick="toggleModal(true)">
        Change Profile Picture
    </button>

    <!-- User name and designation -->
    <h5 class="mt-2 text-lg font-semibold">{{ Auth::user()->name }}</h5>
    <p class="text-gray-500 mb-1 text-sm">{{ Auth::user()->designation }}</p>
</div>




<!-- Modal -->
<div id="profileModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg w-1/3">
        <div class="flex justify-between items-center px-4 py-2 border-b">
            <h5 class="text-lg font-semibold">Change Profile Picture</h5>
            <button class="text-gray-500 hover:text-gray-700" onclick="toggleModal(false)">
                &times;
            </button>
        </div>
        <form action="{{ route('account.updateProfilePicture') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="p-4">
                <input 
                    type="file" 
                    name="profile_picture" 
                    class="block w-full border rounded-md px-3 py-2" 
                    required>
            </div>
            <div class="flex justify-end gap-2 px-4 py-2 border-t">
                <button 
                    type="button" 
                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md"
                    onclick="toggleModal(false)">
                    Cancel
                </button>
                <button 
                    type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Script for Modal -->
<script>
    function toggleModal(show) {
        const modal = document.getElementById('profileModal');
        if (show) {
            modal.classList.remove('hidden');
        } else {
            modal.classList.add('hidden');
        }
    }
</script>






<div class="card account-nav shadow-lg mb-4 border-0">
    <div class="p-0">
        <ul class="list-none">
            <li class="border-b last:border-b-0">
                <a href="{{ route('account.profile') }}" class="block py-3 px-4 hover:bg-gray-100">Account Settings</a>
            </li>
            <li class="border-b last:border-b-0">
                <a href="{{ route('account.createEvent') }}" class="block py-3 px-4 hover:bg-gray-100">Post a Event</a>
            </li>
            <li class="border-b last:border-b-0">
                <a href="{{ route('account.myEvents') }}" class="block py-3 px-4 hover:bg-gray-100">MyCreated Events</a>
            </li>
            <li class="border-b last:border-b-0">
                <a href="/events" class="block py-3 px-4 hover:bg-gray-100">Show All Events</a>
            </li>
            <li class="border-b last:border-b-0">
                <a href="/account/my-event-applications" class="block py-3 px-4 hover:bg-gray-100">ShowEventsWhereIapplied</a>
            </li>
            <li class="border-b last:border-b-0">
                <a href="{{ route('account.showApplicants') }}" class="block py-3 px-4 hover:bg-gray-100">Applicants for My Events</a>
            </li>
            
            <li class="border-b last:border-b-0">
                <a href="{{ route('account.logout') }}" class="block py-3 px-4 hover:bg-gray-100">Logout</a>
            </li>
            {{-- <li class="border-b last:border-b-0">
                <a href="job-applied.html" class="block py-3 px-4 hover:bg-gray-100">Events Applied</a>
            </li>
            <li class="border-b last:border-b-0">
                <a href="saved-jobs.html" class="block py-3 px-4 hover:bg-gray-100">Saved Events</a>
            </li> --}}
        </ul>
    </div>
</div>
