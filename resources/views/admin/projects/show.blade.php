@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex gap-4">
        <div class="details">
            <h1>{{$project->title}}</h1>
            <p>{{$project->slug}}</p>
            <div class="meta">
                <div class="difficulty">
                    price: {{$project->difficulty}}
                </div>

                <div class="cover_image">
                    @if($project->cover_image)
                    <img src="{{asset('storage/' . $project->cover_image )}}" alt="">

                    @else
                    <div class="placeholder placeholder-md bg-black p-5">
                        Immagine di default
                    </div>
                @endif
                </div>
                <div class="languages">
                    language:{{$project->languages}}
                </div>
                <div class="type">
                    <strong>type:</strong>
                    {{ $project->type ? $project->type->name : 'Without Type'}}
                </div>

                <div class="technologies">
                    <strong>Technologies:</strong>
                    @if(count($project->technologies) > 0)
                    
                
                    @foreach ($project->technologies as $technology )
                    <span> #{{$technology->name}}</span>
                    @endforeach
                
                    @else
                    <span> No technology</span>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection