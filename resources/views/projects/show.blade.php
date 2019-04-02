@extends('projects.layout')

@section('title')
    Show Project
@endsection

@section('content')
    <h2 class="mt-5 mb-4">{{$project->title}}</h2>
    <p>{{$project->description}}</p>

    @if($project->tasks()->count())
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
    @endif

    <a style="text-decoration: none" href="/projects/{{$project->id}}/edit"> Edit </a>
@endsection
