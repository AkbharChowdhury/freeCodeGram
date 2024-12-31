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
                    <div class="d-flex align-items-center pb-3">
                        <h4>{{ $user->username }} </h4>
                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}" followersCount="{{$followersCount}}"></follow-button>
                    </div>
                    @can('update', $user->profile)
                        <a href="{{ route('posts.create') }}" role="button"
                           class="btn btn-outline-success text-capitalize">add new post</a>
                    @endcan
                </div>
                @can('update', $user->profile)
                    <a href="{{ route('profiles.edit', $user->id)  }}">Edit Profile</a>
                @endcan


                <div class="d-flex">
                    <p class="m-2"><strong>{{ $postCount }}</strong> post{{ $plural }}</p>
                    <p class="m-2"><strong><span id="followersCountSpan">{{ $followersCount  }}</span></strong> followers</p>
                    <p class="m-2"><strong>{{ $followingCount  }}</strong> following</p>

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
        @section('scripts')
            <script>
                const followButton = document.getElementById('button');
                console.log({followButton});
                // document.getElementById('btnFollow').addEventListener('click',(e)=>{
                //     alert("clicked")
                //     // let followersCount = document.getElementById('followersCount')
                //     // console.log(followersCount.textContent + "....")
                //
                // });
            </script>
@endsection
