


@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes/messages')
        <div class="col-8 offset-2">
            <div class="row">
                <h1>Edit Profile</h1>
                <hr>
            </div>
            <form  class="row g-3" action="{{ route('profile.update', $user->id)  }}" method="post" novalidate enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="col-md-8">
                    <label for="title" class="form-label">title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') ?? $user->profile->title}}"
                           name="title" autofocus>
                   @include('includes.errors', ['key'=> 'title'])
                </div>



                <div class="col-md-8">
                    <label for="description" class="form-label">description</label>
                    <textarea class="form-control form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{ old('description') ?? $user->profile->title }}</textarea>
                    @include('includes.errors', ['key'=> 'description'])
                </div>







                <div class="row mt-3">

                    <div class="col-md-8">
                        <label for="image" class="form-label">Image</label>
                        <input accept="image/*"
                               class="form-control @error('image') is-invalid @enderror"
                               type="file"
                               id="image"
                               name="image">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="col-12">
                    <button type="submit" class="btn btn-success">Update Profile</button>
                </div>

        </div>
        </form>

    </div>
@endsection

