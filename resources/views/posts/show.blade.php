@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{ $post }}</h1>
       <div class="row">
           <div class="col-8">
               <img src="/storage/{{ $post->image }}" alt="{{ $post->caption }}">
           </div>
       </div>

    </div>
@endsection
