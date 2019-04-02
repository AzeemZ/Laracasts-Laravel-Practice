@extends('projects.layout')

@section('title')
    Create Projects
@endsection

@section('content')
<h1 class="my-5">Create Projects</h1>

<form method="post" action="/projects">
    {{csrf_field()}}

    <div class="w-50">
        <div class="form-group">
            <label class="col-form-label-lg" for="title">Title:</label>
            <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}"
                   id="title" name="title" placeholder="Project Title" value="{{old('title')}}">
        </div>
        <div class="form-group">
            <label class="col-form-label-lg" for="description">Description:</label>
            <textarea class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" id="description"
                      name="description" placeholder="Project Description Here...">{{old('description')}}</textarea>
        </div>
        <input type="submit" class="btn btn-primary" name="Submit">
    </div>
</form>

@if($errors->any())
    <div class="alert alert-danger mt-4 w-50">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
