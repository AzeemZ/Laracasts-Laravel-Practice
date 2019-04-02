@extends('projects.layout')

@section('title')
    Edit Project
@endsection

@section('content')
    <h1 class="my-5">Edit Project</h1>

    <form method="post" action="/projects/{{$project->id}}">
        {{method_field('PATCH')}}
        {{csrf_field()}}

        <div class="w-50">
            <div class="form-group">
                <label class="col-form-label-lg" for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$project->title}}">
            </div>
            <div class="form-group">
                <label class="col-form-label-lg" for="description">Description:</label>
                <textarea class="form-control" id="description" name="description">{{$project->description}}</textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Update Project">
        </div>
    </form>

    <form method="post" action="/projects/{{$project->id}}">
        @method('DELETE')
        @csrf
        <input type="submit" class="btn btn-danger mt-3" value="Delete">
    </form>
@endsection
