@extends('layout')

@section('content')

    <h1>{{ $project->title }}</h1>

    <div class="content">
        {{ $project->description }}
    </div>

    <a href="/projects/{{ $project->id }}/edit">Edit</a>

@endsection