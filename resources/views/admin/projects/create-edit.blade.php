@extends('layouts.admin')

@section('content')
<section class="h-100 w-100 ">
    <div class="container pt-4">
        <h1>{{$title}}</h1>

       @if ($errors->any())
           <div class="alert alert-danger " role="alert">
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
           </div>
       @endif

       {{-- TODO: AGGIUNGERE ERRORI --}}

       @if(session('error'))
        <div class="alert alert-danger" role="alert">
        {{ session('error')}}
        </div>
        @endif

        <form action="{{$route}}" method="post">
            @csrf
            @method($method)
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input
                  type="text"
                  class="form-control @error('title') is-invalid @enderror"
                  id="title"
                  name="title"
                  value="{{old('title', $project?->title)}}">
                  @error('title')
                      <small class="text-danger">
                        {{$message}}
                      </small>
                  @enderror
            </div>

            <div class="mb-3">
                <label for="href" class="form-label">Link</label>
                <input
                  type="text"
                  class="form-control @error('href') is-invalid @enderror"
                  id="href"
                  name="href"
                  value="{{old('href',$project?->href)}}">
                  @error('href')
                      <small class="text-danger">
                        {{$message}}
                      </small>
                  @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                <select name="type_id"
                class="form-select "
                aria-label="Default select example"
                >

                <option value="">Seleziona un tipo</option>
                    @foreach ($types as $type )
                    <option
                    value="{{$type->id}}"
                    @if(old('type_id', $project?->type->id) == $type->id ) selected  @endif>
                    {{$type->name}}
                    </option>

                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea cols="30" rows="10" class="form-control" id="description" name="description" value="{{old('description',$project?->description)}}"></textarea>
            </div>
            <button type="submit" class="btn {{Route::currentRouteName() === 'admin.projects.create' ? 'btn-success' : 'btn-warning'}}">{{$button}}</button>
            <a class="btn btn-primary" href="{{route('admin.projects.index')}}">Torna ai Progetti</a>
        </form>

    </div>
</section>
@endsection
