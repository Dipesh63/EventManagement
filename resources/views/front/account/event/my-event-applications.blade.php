@extends('front.layouts.app')

@section('main')
<section class="bg-gray-200 py-10">
    <div class="container mx-auto px-4">
        <div class="row mb-8">
            <div class="w-full">
                <nav aria-label="breadcrumb" class="bg-white rounded-md p-4 shadow-sm">
                    <ol class="flex space-x-2 text-gray-600">
                        <li><a href="#" class="text-blue-600 hover:underline">Home</a></li>
                        <li><span>/</span></li>
                        <li class="text-gray-500">Account Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="flex flex-wrap">
            <div class="w-full lg:w-1/4 mb-8 lg:mb-0">
                @include('front.account.sidebar')
            </div>
            <div class="w-full lg:w-3/4">
                {{-- @include('front.message') --}}
                <div class="bg-white rounded-md shadow-sm p-5">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold">Events Applied</h3>
                        {{-- <a href="{{ route('account.createEvent') }}" class="btn bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Post an Event</a> --}}
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead class="bg-gray-100 border-b">
                                <tr>
                                    <th class="py-3 px-5 text-left font-medium text-gray-700">Title</th>
                                    <th class="py-3 px-5 text-left font-medium text-gray-700">Applied Date</th>
                                    <th class="py-3 px-5 text-left font-medium text-gray-700">Applicants</th>
                                    <th class="py-3 px-5 text-left font-medium text-gray-700">Status</th>
                                    <th class="py-3 px-5 text-left font-medium text-gray-700">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($eventApplications->isNotEmpty())
                                    @foreach ($eventApplications as $eventApplication)
                                    <tr class="border-b hover:bg-gray-100">
                                        <td class="py-4 px-5">
                                            <div class="font-semibold text-gray-800">{{ $eventApplication->event->title }}</div>
                                                <div class="text-gray-500 text-sm">{{ $eventApplication->event->deptType->name }} . {{ $eventApplication->event->location->versity_name }}</div>

                                            {{-- <div class="text-gray-500 text-sm">{{ $event->deptType->name }} • {{ $event->location }}</div> --}}
                                        </td>
                                        <td class="py-4 px-5">{{ \Carbon\Carbon::parse($eventApplication->applied_date)->format('d M, Y') }}</td>
                                        <td class="py-4 px-5 text-gray-700">0 Applications</td>
                                        <td class="py-4 px-5">
                                            <span class="px-3 py-1 rounded-full text-sm {{ $eventApplication->event->status == 1 ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                                {{ $eventApplication->status == 1 ? 'Active' : 'Applied' }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-5">
                                            <div class="relative">
                                                <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="#" onclick="cancelEvent({{ $eventApplication->id }})"><i class="fa fa-trash mr-2" aria-hidden="true"></i> Cancel</a>
                                                {{-- <button class="btn p-2" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v text-gray-600" aria-hidden="true"></i>
                                                </button> --}}
                                                {{-- <ul class="absolute right-0 mt-2 w-40 bg-white shadow-lg rounded-md overflow-hidden z-10">
                                                    <li><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="{{ route('jobDetail', $event->id) }}"> <i class="fa fa-eye mr-2" aria-hidden="true"></i> View</a></li>
                                                    <li><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="{{ route('account.editJob', $event->id) }}"><i class="fa fa-edit mr-2" aria-hidden="true"></i> Edit</a></li>
                                                    <li><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="#" onclick="deleteEvent({{ $event->id }})"><i class="fa fa-trash mr-2" aria-hidden="true"></i> Delete</a></li>
                                                </ul> --}}
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $eventApplications->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('customJs')
<script type="text/javascript">   
function cancelEvent(id) {
    if (confirm("Are you sure you want to cancel?")) {
        $.ajax({
            url : '{{ route("account.cancelEvents") }}',
            type: 'post',
            data: {id: id},
            dataType: 'json',
            success: function(response) {
                window.location.href='{{ route("account.myEventApplication") }}';
            }
        });
    } 
}
</script>
@endsection