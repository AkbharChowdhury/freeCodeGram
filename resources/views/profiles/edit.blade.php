


@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.breadcrumb', ['homeLink' =>  route('profiles.show', auth()->user()->id), 'title' =>'Edit Profile'])

        @include('includes/messages')
        <div class="col-8 offset-2">
            <div class="row">
                <h1>Edit Profile</h1>
                <hr>
            </div>
            <form autocomplete="off"  class="row g-3" action="{{ route('profiles.update', $user->id)  }}" method="post" novalidate enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="col-md-8">
                    <label for="title" class="form-label">title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                           value="{{ old('title') ?? $user->profile->title}}"

                           name="title" autofocus>
                   @include('includes.errors', ['key'=> 'title'])
                </div>



                <div class="col-md-8">
                    <label for="description" class="form-label">description</label>
                    <textarea class="form-control form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{ old('description') != '' ? old('description') :  $user->profile->description  }}</textarea>
                    @include('includes.errors', ['key'=> 'description'])
                </div>


                <div class="col-md-8">
                    <label for="url" class="form-label">URL</label>
                    <input type="url" class="form-control @error('url') is-invalid @enderror" id="url"
                           value="{{ old('url') ?? $user->profile->url}}"

                           name="url" >
                    @include('includes.errors', ['key'=> 'url'])
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
    </div>
        </form>

    </div>
@endsection

