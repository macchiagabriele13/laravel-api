@extends('layouts.app')

@section('content')

<div class="container mb-5">
    <h1 class="py-5"> Update project: {{$project->title}}</h1>
    @include('partials.error')

    <form action="{{route('admin.projects.update', $project->slug)}}" method="post" class="card p-3" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="batman" aria-describedby="titleHlper" value="{{$project->title}}">
            <small id="titleHlper" class="text-muted">Add the project title here</small>
        </div>
        <div class="mb-3">
            <label for="difficulty" class="form-label">difficulty</label>
            <input type="text" name="difficulty" id="difficulty" class="form-control @error('difficulty') is-invalid @enderror" placeholder="batman vol-2 (joker)" aria-describedby="difficultyHlper" value="{{$project->difficulty}}">
            <small id="difficultyHlper" class="text-muted">Add the project difficulty here</small>
        </div>
    
        <div class="mb-3">
            <label for="languages" class="form-label">languages</label>
            <input type="text" name="languages" id="languages" class="form-control @error('languages') is-invalid @enderror" placeholder="12.20" aria-describedby="languagesHlper" value="{{$project->languages}}">
            <small id="languagesHlper" class="text-muted">Add the project languages here</small>
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Types</label>
            <select class="form-select form-select-lg @error('type_id') 'is-invalid' @enderror" name="type_id" id="type_id">
                <option value="">Without Type</option>

                @forelse ($types as $type )
                <option value="{{$type->id}}" {{ $type->id == old('type_id',  $project->type ? $project->type->id : '') ? 'selected' : '' }}>
                    {{$type->name}}
                </option>
                @empty
                <option value="">Sorry, no types in the system.</option>
                @endforelse

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
                <option value='' disabled>Select a tech</option>
        
    
                @forelse ($technologies as $technology )
    
        @if($errors ->any())
        <option value="{{$technology->id}}" {{ in_array($technology->id, old('technologies', [])) ? 'selected' : '' }}>{{$technology->name}}</option>
        @else
                <option value="{{$technology->id}}" {{ $project ->technologies->contains($technology->id) ? 'selected' : '' }}>{{$technology->name}}</option>
        @endif
    
        @empty
        <option value='' disabled>Sorry no technologies</option>
                @endforelse
    
            </select>
        </div>


        <div class="form-group">
            <label for="cover_image"> Image</label>
            <img width="100" src="{{asset('storage/'. $project->cover_image)}}" alt="">
            <input type="file" class="form-control-file" name="cover_image" id="cover_image" placeholder="Add a cover image" aria-describedby="coverImgHelper">
            <small id="coverImgHelper" class="form-text text-muted">Add a cover image</small>
        </div>
        @error('cover_image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>

@endsection