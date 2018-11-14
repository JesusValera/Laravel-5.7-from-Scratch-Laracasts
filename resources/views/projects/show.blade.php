@extends('layout')

@section('content')

    <h1>{{ $project->title }}</h1>

    <div class="content">
        {{ $project->description }}
    </div>

    <a href="/projects/{{ $project->id }}/edit">Edit</a>

    @if($project->tasks->count())
        <div>
            @foreach($project->tasks as $task)
                <div>
                    <form method="POST" action="/tasks/{{ $task->id }}">
                        @method('PATCH')
                        @csrf
                        <label class="checkbox" for="completed" {{ $task->completed ? 'is-complete' : '' }}>
                            <input type="checkbox" name="completed"
                                   onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                            {{ $task->description }}
                        </label>
                    </form>
                </div>
            @endforeach
        </div>
    @endif

@endsection