@extends('layouts.app')

@section('content')

        <h1 class="title">Projects</h1>
        <div class="box">
            @foreach($projects as $project)
                <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
                <br>
            @endforeach

        </div>

        <a href="{{ URL::route('projects.create') }}" class="button is-link">Create Project</a>
        <br><br><br>
        <span>Laravel version: {{ app()->version() }}</span>
@endsection