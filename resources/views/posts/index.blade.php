{{--@extends('layouts.app')--}}
{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        {{ dd($posts)  }}--}}
{{--        @include('includes.breadcrumb', ['homeLink' =>  route('profile.show', $post->user->id), 'title' =>  $post->user->username.' - '. $post->caption])--}}

{{--        @foreach($posts as $post)--}}
{{--            <div class="row">--}}
{{--                <div class="col-8">--}}
{{--                    <img src="/storage/{{ $post->image }}" alt="{{ $post->caption }}" class="w-100">--}}
{{--                </div>--}}
{{--                <div class="col-4">--}}
{{--                    <div>--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <div class="pr-3">--}}
{{--                                <img--}}
{{--                                    src="{{ $post->user->profile->profileImage()  }}"--}}
{{--                                    alt="{{ $post->user->username }}'s profile image" class="w-100 rounded-circle"--}}
{{--                                    style="max-width: 40px">--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <div class="fw-bold">--}}
{{--                                    <a href="{{  route('profiles.show', $post->user->id) }}">{{ $post->user->username }}</a>--}}
{{--                                    |--}}
{{--                                    <a href="" class="pl-3">follow</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <hr>--}}


{{--                        <div>--}}
{{--                            <span class="fw-bold">{{ $post->user->username }}</span> <br>{{ $post->caption }}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--        @endforeach--}}
{{--        <div class="row">--}}
{{--            <div class="col-12 d-flex justify-content-center">--}}
{{--                {{ $posts->links() }}--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--@endsection--}}


@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($posts as $post)
            <div class="row">
                <div class="col-6 offset-3">
                    <a href="{{ route('profiles.show', $post->user->id) }}">
                        <img src="/storage/{{ $post->image }}" class="w-100" alt="post image">
                    </a>
                </div>
            </div>
            <div class="row pt-2 pb-4">
                <div class="col-6 offset-3">
                    <div>
                        <p>
                    <span class="font-weight-bold">
                        <a href="{{ route('profiles.show', $post->user->id) }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                    </span> {{ $post->caption }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
