@extends('layouts.app')

@section('content')
    <div class="container">
        @include('includes.messages')
        <div class="row">
            <div class="col-3 p-5">
                <img src="{{ $user->profile->profileImage() }}" alt="User's profile image" class="rounded-circle w-100">
            </div>


            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>{{ $user->username }}</h1>
                    @can('update', $user->profile)
                        <a href="{{ route('posts.create') }}" role="button"
                           class="btn btn-outline-success text-capitalize">add new post</a>
                    @endcan
                </div>
                @can('update', $user->profile)
                    <a href="{{ route('profile.edit', $user->id)  }}">Edit Profile</a>
                @endcan


                <div class="d-flex">
                    <p class="m-2"><strong>{{ $postCount }}</strong> post{{ $plural }}</p>
                    <p class="m-2"><strong>170k</strong> followers</p>
                    <p class="m-2"><strong>424</strong> following</p>

                    {{--                                                            <p><strong>686</strong> posts | <strong>170k</strong> followers | <strong>423</strong> following</p>--}}
                </div>

                <div class="pt-4 fw-bold">
                    {{ $user->profile->title }}
                </div>
                <div>
                    {{ $user->profile->description }}

                </div>
                <div class="mt-3">
                    @if($user->profile->url)
                        <a href="{{ $user->profile->url }}" role="button"
                           class="btn btn-sm btn-secondary badge text-bg-secondary ">@ {{$user->username  }}</a>
                    @endif
                </div>
            </div>


        </div>
        <div class="row pt-5">
            @foreach($user->posts as $post)
                <div class="col-4 pb-4">
                    <a href="{{ route('posts.show', $post->id)  }}">
                        <img src="/storage/{{ $post->image  }}" class="w-100" alt="{{ $post->caption  }}">
                    </a>
                </div>
            @endforeach

        </div>
@endsection
