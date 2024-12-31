


@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes/messages')
        <div class="col-8 offset-2">
            <div class="row">
                <h1>Edit Profile</h1>
                <hr>
            </div>
            <form  class="row g-3" action="{{ route('posts.store') }}" method="post" novalidate enctype="multipart/form-data">
                @csrf
                <div class="col-md-8">
                    <label for="caption" class="form-label">Post Caption</label>
                    <input type="text" class="form-control @error('caption') is-invalid @enderror" id="caption" value="{{ old('caption') }}"
                           name="caption" autofocus>
                   @include('includes.errors', ['key'=> ''])
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
                    <button type="submit" class="btn btn-success">Add Post</button>
                </div>

        </div>
        </form>

    </div>
@endsection

