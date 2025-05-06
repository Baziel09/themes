@extends('template')
@section('title', 'My Profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Profile</div>

                <div class="card-body text-center">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}'s Avatar" class="rounded-circle img-thumbnail mb-3" width="150" height="150">
                    @else
                        <img src="{{ asset('images/default-avatar.png') }}" alt="Default Avatar" class="rounded-circle img-thumbnail mb-3" width="150" height="150">
                    @endif

                    <h4>{{ $user->name }}</h4>
                    <p class="text-muted">{{ $user->email }}</p>

                    @if($user->images->isNotEmpty()) 
                    <div class="card mt-4"> {{-- Add margin top for spacing --}}
                        <div class="card-header">My Travel Images</div>
                        <div class="card-body">
                            <div class="row">
                                {{-- Loop through the user's images --}}
                                @foreach($user->images as $image) 
                                    <div class="col-md-4 mb-3"> {{-- Bootstrap grid column --}}
                                        {{-- Use asset() helper to generate URL to the public storage --}}
                                        <img src="{{ asset('storage/' . $image->path) }}" 
                                            alt="User travel image" class="img-fluid img-thumbnail">
                                        {{-- Optional: Add delete button or other actions here --}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif 

                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
