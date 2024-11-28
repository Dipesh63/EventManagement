@extends('front.layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Account Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('front.account.sidebar')
            </div>
            <div class="col-lg-9">
                {{-- @include('front.message') --}}

                <form action="{{ route('account.saveJob2') }}" method="post" id="createEventForm" name="createEventForm">
                    @csrf
                    <div class="card border-0 shadow mb-4 ">
                        <div class="card-body card-form p-4">
                            <h3 class="fs-4 mb-1">Event Details</h3>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="" class="mb-2">Title<span class="req">*</span></label>
                                    <input type="text" placeholder="Job Title" id="title" name="title" class="form-control">
                                    <p></p>
                                </div>
                                <div class="col-md-6  mb-4">
                                    <label for="" class="mb-2">Category<span class="req">*</span></label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Select a Category</option>
                                        @if ($categories->isNotEmpty())
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p></p>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="" class="mb-2">Job Type<span class="req">*</span></label>
                                    <select name="deptType" id="deptType" class="form-select">
                                        <option value="">Select Job Type</option>
                                        @if ($deptTypes->isNotEmpty())
                                            @foreach ($deptTypes as $deptType)
                                            <option value="{{ $deptType->id }}">{{ $deptType->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p></p>
                                </div>
                                <div class="col-md-6  mb-4">
                                    <label for="" class="mb-2">Vacancy<span class="req">*</span></label>
                                    <input type="number" min="1" placeholder="Vacancy" id="vacancy" name="vacancy" class="form-control">
                                    <p></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Salary</label>
                                    <input type="text" placeholder="Salary" id="salary" name="salary" class="form-control">
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="" class="mb-2">Location<span class="req">*</span></label>
                                    <select name="Loc" id="Loc" class="form-select">
                                        <option value="">Select Job Type</option>
                                        @if ($locations->isNotEmpty())
                                            @foreach ($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p></p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="" class="mb-2">Description<span class="req">*</span></label>
                                <textarea class="textarea" name="description" id="description" cols="5" rows="5" placeholder="Description"></textarea>
                                <p></p>
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">Benefits</label>
                                <textarea class="textarea" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">Responsibility</label>
                                <textarea class="textarea" name="responsibility" id="responsibility" cols="5" rows="5" placeholder="Responsibility"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">Qualifications</label>
                                <textarea class="textarea" name="qualifications" id="qualifications" cols="5" rows="5" placeholder="Qualifications"></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="" class="mb-2">Experience <span class="req">*</span></label>
                                <select name="duration" id="duration" class="form-control">
                                    <option value="1">1 Year</option>
                                    <option value="2">2 Years</option>
                                    <option value="3">3 Years</option>
                                    <option value="4">4 Years</option>
                                    <option value="5">5 Years</option>
                                    <option value="6">6 Years</option>
                                    <option value="7">7 Years</option>
                                    <option value="8">8 Years</option>
                                    <option value="9">9 Years</option>
                                    <option value="10">10 Years</option>
                                    <option value="10_plus">10+ Years</option>
                                </select>
                                <p></p>
                            </div>
                            
                            

                            <div class="mb-4">
                                <label for="" class="mb-2">Keywords</label>
                                <input type="text" placeholder="keywords" id="keywords" name="keywords" class="form-control">
                            </div>

                            <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Name<span class="req">*</span></label>
                                    <input type="text" placeholder="Company Name" id="club_name" name="club_name" class="form-control">
                                    <p></p>
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Location</label>
                                    <input type="text" placeholder="Location" id="club_location" name="club_location" class="form-control">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="" class="mb-2">Website</label>
                                <input type="text" placeholder="Website" id="website" name="website" class="form-control">
                            </div>
                        </div> 
                        <div class="card-footer  p-4">
                            <button type="submit" class="btn btn-primary">Save Job</button>
                        </div>               
                    </div>
                </form>
                               
            </div>
        </div>
    </div>
</section>
@endsection







@section('customJs')
<script>
document.getElementById('createEventForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    let submitButton = e.target.querySelector("button[type='submit']");
    submitButton.disabled = true;

    try {
        clearPreviousErrors();
        let response = await fetch("{{ route('account.saveJob2') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        });

        let result = await response.json();
        submitButton.disabled = false;

        if (result.status === true) {
            window.location.href = "{{ route('account.profile') }}";
        } else {
            handleErrors(result.errors);
        }
    } catch (error) {
        console.error("Submission failed:", error);
        submitButton.disabled = false;
    }
});

function clearPreviousErrors() {
    document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
    document.querySelectorAll('.invalid-feedback').forEach(el => el.innerHTML = '');
}

function handleErrors(errors) {
    for (let field in errors) {
        let fieldElement = document.getElementById(field);
        if (fieldElement) {
            fieldElement.classList.add('is-invalid');
            let errorMessage = errors[field][0];
            fieldElement.nextElementSibling.classList.add('invalid-feedback');
            fieldElement.nextElementSibling.innerHTML = errorMessage;
        }
    }
}
</script>
@endsection