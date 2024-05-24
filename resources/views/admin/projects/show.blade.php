@extends('layouts.admin')

@section('content')

<section class="h-100 flex-grow-1 sec-index ">
    <div class="container pt-4 w-100 ">

        <div class="row">
            <div class="col"><h1 class="mb-5">Dettagli</h1></div>
        </div>

        <div class="row">
            {{-- <div class="col">
                <img src="{{$comic->thumb}}" class="card-img-top" alt="{{$comic->title}}">
            </div> --}}
            <div class="col">
                      <h5 class="card-title mb-2">{{$project->title}}</h5>
                      <p class="card-text">{{$project->href}}</p>
                      <p class="card-text">{{$project->type}}</p>
                      <p class="card-text">{{$project->description}}</p>

                    <div class="d-flex mb-3">

                        @include('admin.partials.formdelete',[
                            'route'=> route('admin.projects.destroy', $project),
                            'message' => 'Sei sicuro di voler eliminare {{$project->title}} ?'
                            ])

                        <a href="{{route('admin.projects.index')}}" class="btn btn-success mx-2">Torna ai projects</a>

                    </div>


            </div>
        </div>

    </div>
</section>
@endsection
