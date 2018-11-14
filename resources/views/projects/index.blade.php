@extends('layout')

@section('content')

    @foreach($projects as $project)
        <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
        <br>
    @endforeach

@endsection