@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')

    <h1 class="title">Edit project</h1>

    <form method="post" action="/projects/{{ $project->id }}" style="margin-bottom: 1em;">
        @method('PATCH')
        @csrf

        <div class="field">
            <label class="label" for="title">Title</label>

            <div class="control">
                <input type="text" class="input" name="title" id="title" placeholder="Title"
                       value="{{ $project->title }}">
            </div>

        </div>

        <div class="field">
            <label class="label" for="description">Description</label>

            <div class="control">
                <input type="text" class="input" name="description" id="description" placeholder="Description"
                       value="{{ $project->description }}">
            </div>

        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Edit project</button>
            </div>
        </div>
    </form>

    <form method="post" action="/projects/{{ $project->id }}">
        @method('DELETE')
        @csrf

        <div class="field">
            <div class="control">
                <button type="submit" class="button">Delete project</button>
            </div>
        </div>
    </form>

@endsection