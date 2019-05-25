@extends('projects.layout')

@section('title')
    Show Project
@endsection

@section('content')
    <h2 class="mt-5 mb-4">{{$project->title}}</h2>
    <p>{{$project->description}}</p>

    <a style="text-decoration: none" href="/projects/{{$project->id}}/edit"> Edit </a>

    @if($project->tasks()->count())
        <div class="col border border-secondary rounded mt-4 p-3">
            @foreach($project->tasks as $task)
                <form method="post" action="/tasks/{{$task->id}}">
                    @method('PATCH')
                    @csrf
                    <div>
                        <label class="checkbox {{$task->completed ? 'is-complete' : ''}}">
                            <input type="checkbox" name="completed" onchange="this.form.submit()"
                                {{$task->completed ? 'checked' : ''}}>

                            {{$task->description}}
                        </label>
                    </div>
                </form>
            @endforeach
        </div>
    @endif

    <div class="col border border-secondary rounded mt-4 p-3">
        <form method="POST" action="/projects/{{ $project->id }}/tasks">
            @csrf
            <div class="form-group">
                <label for="description"> New Task </label>
                <input type="text" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}"
                       name="description" id="description" placeholder="New Task">
            </div>
            <input type="submit" class="btn btn-primary" value="Add Task">
        </form>
    </div>

    @include('errors')
@endsection
