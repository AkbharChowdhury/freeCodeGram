@php use App\Models\ImageHandler; @endphp
@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.breadcrumb', ['homeLink' =>  route('profiles.show', $post->user->id), 'title' =>  $post->user->username.' - '. $post->caption])

        <div class="row">
            <div class="col-8">
                <img src="{{ ImageHandler::getImagePath($post->image) }}" alt="{{ $post->caption }}" class="w-100">
            </div>
            <div class="col-4">
                <div>
                    <div class="d-flex align-items-center">
                        <div class="pr-3">
                            <img
                                src="{{ $post->user->profile->profileImage()  }}"
                                alt="{{ $post->user->username }}'s profile image" class="w-100 rounded-circle"
                                style="max-width: 40px">
                        </div>
                        <div>
                            <div class="fw-bold">
                                <a href="{{  route('profiles.show', $post->user->id) }}">{{ $post->user->username }}</a>
                                |
                                <a href="" class="pl-3">follow</a>
                            </div>
                        </div>
                    </div>
                    <hr>


                    <div>
                        <span class="fw-bold">{{ $post->user->username }}</span> <br>{{ $post->caption }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
