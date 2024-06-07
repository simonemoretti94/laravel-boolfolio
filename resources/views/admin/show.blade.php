@extends('layouts.app')

@section('content')
<x-sub-head class="text-capitalize">{{$project->title}}</x-sub-head>

<div class="container">

    <h1 class="text-center text-white">{{$project->title}}</h1>
    <p class="text-center">
        @if(Str::startsWith($project->cover_image , 'https://'))
        <img width="150" height="200" src="{{$project->cover_image}}" alt="{{$project->title}}">
        @else
        <img width="150" height="200" src="{{asset('storage/' . $project->cover_image)}}" alt="{{$project->title}}">
        @endif
    </p>
    <p class="text-center text-dark border border-1">
        <span><b>Slug:</b> {{$project->slug}}</span><br>
        {{$project->description}}
    </p>

</div>
@endsection