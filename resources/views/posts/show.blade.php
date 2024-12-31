@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.breadcrumb', ['homeLink' =>  route('profile.show', $post->user->id), 'title' =>  $post->user->username.' - '. $post->caption])

        <div class="row">
           <div class="col-8">
               <img src="/storage/{{ $post->image }}" alt="{{ $post->caption }}" class="w-100">
           </div>
           <div class="col-4">
               <div>
                   <h3>{{ $post->user->username }}</h3>
                   <p>{{ $post->caption }}</p>
               </div>
           </div>
       </div>

    </div>
@endsection
