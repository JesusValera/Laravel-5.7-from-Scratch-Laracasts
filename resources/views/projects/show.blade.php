@extends('layouts.app')

@section('content')

    <span class="title">{{ $project->title }}</span> <a href="/projects/{{ $project->id }}/edit">Edit</a>
    <br><br>

    <div class="content">
        {{ $project->description }}
    </div>

    @if($project->tasks->count())
        <div class="box">
            @foreach($project->tasks as $task)
                <div>
                    <form method="POST" action="/tasks/{{ $task->id }}">
                        @method('PATCH')
                        @csrf
                        <label class="checkbox {{ $task->completed ? 'is-complete' : '' }}" for="completed">
                            <input type="checkbox" name="completed"
                                   onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                            {{ $task->description }}
                        </label>
                    </form>
                </div>
            @endforeach
        </div>
    @endif

    {{-- Add a new task form --}}
    <form class="box" action="/projects/{{ $project->id }}/tasks" method="post">
        @csrf
        <div class="field">
            <label class="label" for="description">New Task</label>

            <div class="control">
                <input type="text" class="input" name="description" placeholder="New Task" required>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add Task</button>
            </div>
        </div>
    </form>

    @include('errors')
@endsection