@extends('layouts.app')
@section('content')


<h2>add project</h2>
@include('partials.error')
<form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="helpId" placeholder="" value="{{old('title')}}">
    </div>
    @error('title')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror


    <div class="form-group">
        <label for="cover_image">Cover Image</label>
        <input type="file" class="form-control-file" name="cover_image" id="cover_image" placeholder="Add a cover_image image" aria-describedby="coverImgHelper">
        <small id="coverImgHelper" class="form-text text-muted">Add a cover image</small>
    </div>
    @error('cover_image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror







    <div class="mb-3">
        <label for="difficulty" class="form-label">difficulty </label>
        <input type="text" class="form-control" name="difficulty" id="difficulty" aria-describedby="helpId" placeholder="" value="{{old('difficulty')}}">
    </div>
    @error('difficulty')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
    <div class="mb-3">
        <label for="languages" class="form-label">languages</label>
        <input type="text" class="form-control" name="languages" id="languages" aria-describedby="helpId" placeholder="" value="{{old('languages')}}">
    </div>
    @error('languages')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror

    <div class="mb-3">
        <label for="type_id" class="form-label">Types</label>
        <select class="form-select form-select-lg @error('type_id') 'is-invalid' @enderror" name="type_id" id="type_id">
            <option selected>Select one</option>

            @foreach ($types as $type )
            <option value="{{$type->id}}" {{ old('type_id') ? 'selected' : '' }}>{{$type->name}}</option>
            @endforeach

        </select>
    </div>
    @error('category_id')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror


    <div class="mb-3">
        <label for="technologies" class="form-label">technologies</label>
        <select multiple class="form-select form-select-lg @error('technologies') 'is-invalid' @enderror" name="technologies[]" id="technologies">
            <option value='' disabled>Select a tag</option>
	

            @forelse ($technologies as $technology )

	@if($errors ->any())
	<option value="{{$technology->id}}" {{ in_array($technology->id, old('technologies', [])) ? 'selected' : '' }}>{{$technology->name}}</option>
	@else
            <option value="{{$technology->id}}" {{ old('technologies') ? 'selected' : '' }}>{{$technology->name}}</option>
	@endif

	@empty
	<option value='' disabled>Sorry no technologies</option>
            @endforelse

        </select>
    </div>


    <button type="submit">add new project</button>
</form>
@endsection