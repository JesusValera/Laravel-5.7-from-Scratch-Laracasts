@extends('layout')

@section('content')
    <form method="post" action="/projects">
        {{ csrf_field() }}
        <div class="field">
            <label class="label" for="title">Title</label>

            <div class="control">
                <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" id="title"
                       placeholder="Title" value="{{ old('title') }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="description">Description</label>

            <div class="control">
                <input type="text" class="input {{ $errors->has('description') ? 'is-danger' : '' }}" name="description"
                       id="description" placeholder="Description" value="{{ old('description') }}">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create project</button>
            </div>
        </div>
    </form>

    @if($errors->any())
        <div class="notification is-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
