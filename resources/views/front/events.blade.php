@extends('front.layouts.app')

@section('main')
<section class="py-5 bg-gray">
    <div class="container mx-auto">     
        <div class="flex flex-wrap items-center">
            <div class="w-full md:w-5/6">
                <h2 class="text-2xl font-bold">Find Events</h2>  
            </div>
            <div class="w-full md:w-1/6 mt-4 md:mt-0">
                <div class="flex justify-end">
                    <select name="sort" id="sort" class="form-control">
                        <option value="1" {{ (Request::get('sort') == '1') ? 'selected' : '' }}>Latest</option>
                        <option value="0" {{ (Request::get('sort') == '0') ? 'selected' : '' }}>Oldest</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap pt-5">
            <div class="w-full md:w-1/3 mb-4">
                <form action="" name="searchForm" id="searchForm">
                    <div class="bg-white shadow-md p-6">
                        <div class="mb-4">
                            <h2 class="text-lg font-semibold">Keywords</h2>
                            <input value="{{ Request::get('keyword') }}" type="text" name="keyword" id="keyword" placeholder="Keywords" class="form-input mt-2 w-full border border-gray-300  p-2">
                        </div>

                        <div class="mb-4">
                            <h2 class="text-lg font-semibold">Location</h2>
                            <input value="{{ Request::get('location') }}" type="text" name="location" id="location" placeholder="Location" class="form-input mt-2 w-full border border-gray-300  p-2">
                        </div>

                        {{-- <div class="mb-4">
                            <h2 class="text-lg font-semibold">Category</h2>
                            <select name="category" id="category" class="form-select w-full border border-gray-300  p-2">
                                <option value="">Select a Category</option>
                                @if ($categories)
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>  
                                    @endforeach
                                @endif                            
                            </select>
                        </div> --}}

                        <div class="mb-4">
                            <h2 class="text-lg font-semibold mb-2">Category</h2>
                            <select name="category" id="category" class="border border-gray-300 rounded px-3 py-2 w-full">
                                <option value="">Select a Category</option>
                                @if ($categories)
                                    @foreach ($categories as $category)
                                        <option {{ (Request::get('category') == $category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>  
                                    @endforeach
                                @endif                            
                            </select>
                        </div>
                          


                        {{-- <div class="mb-4">
                            <h2>Dept Type</h2>
                            
                            @if ($deptTypes->isNotEmpty())
                                @foreach ($deptTypes as $deptType)
                                <div class="form-check mb-2"> 
                                    <input {{ (in_array($deptType->id,$deptTypeArray)) ? 'checked' : ''}} class="form-check-input " name="job_type" type="checkbox" value="{{ $deptType->id }}" id="job-type-{{ $deptType->id }}">    
                                    <label class="form-check-label " for="job-type-{{ $deptType->id }}">{{ $deptType->name }}</label>
                                </div>
                                @endforeach
                            @endif
                        </div> --}}

                        <div class="mb-4">
                            <h2 class="text-lg font-semibold">Dept Type</h2>
                            @if ($deptTypes->isNotEmpty())
                                @foreach ($deptTypes as $deptType)
                                <div class="flex items-center mb-2">
                                    <input {{ (in_array($deptType->id,$deptTypeArray)) ? 'checked' : '' }} class="form-check-input rounded mr-2" name="dept_type" type="checkbox" value="{{ $deptType->id }}" id="dept-type-{{ $deptType->id }}">
                                    <label class="form-check-label" for="dept-type-{{ $deptType->id }}">{{ $deptType->name }}</label>
                                </div>
                                @endforeach
                            @endif
                        </div>

                        {{-- <div class="mb-4">
                            <h2 class="text-lg font-semibold">Experience</h2>
                            <select name="experience" id="experience" class="form-select w-full border border-gray-300  p-2">
                                <option value="">Select Experience</option>
                                @foreach(range(1, 10) as $year)
                                    <option value="{{ $year }}" {{ (Request::get('experience') == $year) ? 'selected' : '' }}>{{ $year }} Year{{ $year > 1 ? 's' : '' }}</option>
                                @endforeach
                                <option value="10_plus" {{ (Request::get('experience') == '10_plus') ? 'selected' : '' }}>10+ Years</option>
                            </select>
                        </div>  --}}
                        <div class="mb-4">
                            <h2 class="text-lg font-semibold mb-2">Duration</h2>
                            <select name="duration" id="duration" class="border border-gray-300 rounded px-3 py-2 w-full">
                                <option value="">Select Duration</option>
                                <option value="1" {{ (Request::get('duration') == 1) ? 'selected' : '' }}>1 day</option>
                                <option value="2" {{ (Request::get('duration') == 2) ? 'selected' : '' }}>2 day</option>
                                <option value="3" {{ (Request::get('duration') == 3) ? 'selected' : '' }}>3 day</option>
                                <option value="4" {{ (Request::get('duration') == 4) ? 'selected' : '' }}>4 day</option>
                                <option value="5" {{ (Request::get('duration') == 5) ? 'selected' : '' }}>5 day</option>
                                <option value="6" {{ (Request::get('duration') == 6) ? 'selected' : '' }}>6 day</option>
                                <option value="7" {{ (Request::get('duration') == 7) ? 'selected' : '' }}>7 day</option>
                                <option value="8" {{ (Request::get('duration') == 8) ? 'selected' : '' }}>8 day</option>
                                <option value="9" {{ (Request::get('duration') == 9) ? 'selected' : '' }}>9 day</option>
                                <option value="10" {{ (Request::get('duration') == 10) ? 'selected' : '' }}>10 day</option>
                                <option value="10_plus" {{ (Request::get('duration') == '10_plus') ? 'selected' : '' }}>10+ Days</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="w-full py-2 mt-4 text-white bg-gray-900">Search</button>
                        
                        <div class="flex justify-center">
                            <a href="{{ route('events') }}" class="btn bg-gray-900 text-white mt-3 px-4 py-2 ">
                                Reset
                            </a>
                        </div>
                        
                        
                    </div>
                </form>
            </div>
            
            <div class="w-full md:w-2/3">
                <div class="job_listing_area">                    
                    <div class="job_lists">
                        <div class="flex flex-wrap">
                            @if ($events->isNotEmpty())
                                @foreach ($events as $event)
                                <div class="w-full md:w-1/3 p-2">
                                    <div class="bg-white shadow-md p-4">
                                        <h3 class="text-lg font-semibold border-b pb-2 mb-2">{{ $event->title }}</h3>
                                        <p>{{ Str::words(strip_tags($event->description), $words=10, '...') }}</p>

                                        <div class="bg-gray-200 p-3 border mt-3">
                                            <p class="mb-2">
                                                <span class="font-semibold"><i class="fa fa-map-marker-alt"></i> {{ $event->location->versity_name }}</span>
                                            </p>
                                            <p class="mb-2">
                                                <span class="font-semibold"><i class="fa fa-clock"></i> {{ $event->deptType->name }}</span>
                                            </p>
                                            {{-- <p>Keywords: {{ $event->keywords }}</p> --}}
                                            <p>Category: {{ $event->category->name }}</p>
                                            <p>Duration: {{ $event->duration }}</p>
                                            @if (!is_null($event->salary))
                                            <p class="mb-2">
                                                <span class="font-semibold"><i class="fa fa-dollar-sign"></i> {{ $event->salary }}</span>
                                            </p> 
                                            @endif
                                        </div>

                                        <div class="flex justify-center mt-4">
                                            <a href="{{ route('eventsDetail',$event->id) }}" class="bg-gray-900 text-white font-bold py-2 px-4">Details</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="w-full mt-4">
                                    {{ $events->withQueryString()->links() }}
                                </div>
                            @else
                            <div class="w-full text-center">Events not found</div>                                
                            @endif                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('customJs')
<script>
    $("#searchForm").submit(function(e){
        e.preventDefault();

        var url = '{{ route("events") }}?';

        var keyword = $("#keyword").val();
        var location = $("#location").val();
        var category = $("#category").val();
        var duration = $("#duration").val();
        var sort = $("#sort").val();

        var checkedDeptTypes = $("input:checkbox[name='dept_type']:checked").map(function(){
            return $(this).val();
        }).get();

        if (keyword != "") {
            url += '&keyword='+keyword;
        }

        if (location != "") {
            url += '&location='+location;
        }

        if (category != "") {
            url += '&category='+category;
        }

        if (duration != "") {
            url += '&duration='+duration;
        }

        if (checkedDeptTypes.length > 0) {
            url += '&deptType='+checkedDeptTypes;
        }

        url += '&sort='+sort;

        window.location.href=url;
    });

    $("#sort").change(function(){
        $("#searchForm").submit();
    });
</script>
@endsection
