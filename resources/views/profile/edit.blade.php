@extends('template')
@section('title', 'Edit Profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            {{-- Display Image Upload Success Message --}}
            @if(session('image_upload_success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('image_upload_success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Profile Update Form (Existing) --}}
            <div class="card mb-4"> 
                {{-- ... existing form for name, email, avatar ... --}}
            </div>

            {{-- Travel Image Upload Form (New) --}}
            <div class="card">
                <div class="card-header">Upload Travel Images</div>
                <div class="card-body">
                    {{-- Point this form to the new route --}}
                    <form method="POST" action="{{ route('profile.images.upload') }}" enctype="multipart/form-data">
                        @csrf {{-- CSRF protection token --}}
                        <div class="mb-3">
                            <label for="images" class="form-label">Select Images</label>
                            {{-- Note: name="images[]" makes PHP treat this as an array --}}
                            {{-- The @error directive checks the 'imageUpload' bag --}}
                            <input id="images" type="file" 
                                   class="form-control @error('images.*', 'imageUpload') is-invalid @enderror" 
                                   name="images[]" multiple required> 
                            <small class="form-text text-muted">You can upload multiple images. Max file size per image: 2MB. Allowed types: jpg, png, gif.</small>
                            
                            {{-- Display validation errors from the 'imageUpload' bag --}}
                            @error('images.*', 'imageUpload')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                            {{-- Display general errors for the 'images' field itself (e.g., if it's missing) --}}
                             @error('images', 'imageUpload')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">
                                Upload Selected Images
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection