<div class="card shadow-lg mb-4 p-3 border-0">
    <div class="s-body text-center mt-3">
        {{-- <img src="assets/assets/images/avatar7.png" alt="avatar" class="rounded-full w-36 h-36 mx-auto"> --}}
        <h5 class="mt-3 pb-0 text-lg font-semibold">{{ Auth::user()->name }}</h5>
        <p class="text-gray-500 mb-1 text-sm">>{{ Auth::user()->designation }}</p>
        <div class="flex justify-center mb-2">
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn-primary px-4 py-2 rounded-md text-white bg-blue-600 hover:bg-blue-700">Change Profile Picture</button>
        </div>
    </div>
</div>

<div class="card account-nav shadow-lg mb-4 border-0">
    <div class="p-0">
        <ul class="list-none">
            <li class="border-b last:border-b-0">
                <a href="account.html" class="block py-3 px-4 hover:bg-gray-100">Account Settings</a>
            </li>
            <li class="border-b last:border-b-0">
                <a href="{{ route('account.createEvent2') }}" class="block py-3 px-4 hover:bg-gray-100">Post a Job</a>
            </li>
            <li class="border-b last:border-b-0">
                <a href="my-jobs.html" class="block py-3 px-4 hover:bg-gray-100">My Jobs</a>
            </li>
            <li class="border-b last:border-b-0">
                <a href="job-applied.html" class="block py-3 px-4 hover:bg-gray-100">Jobs Applied</a>
            </li>
            <li class="border-b last:border-b-0">
                <a href="saved-jobs.html" class="block py-3 px-4 hover:bg-gray-100">Saved Jobs</a>
            </li>
        </ul>
    </div>
</div>
