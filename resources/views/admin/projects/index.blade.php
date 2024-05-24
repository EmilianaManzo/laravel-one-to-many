@extends('layouts.admin')

@section('content')
<section class="h-100 flex-grow-1 sec-index ">
    <div class="container pt-4 w-100 ">
        <div class="mb-2">
            <a href="{{route('admin.projects.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
        </div>

        @if ($errors->any())
           <div class="alert alert-danger " role="alert">
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
           </div>

       @endif

        @if(session('success'))
        <div class="alert alert-success" role="alert">
        {{ session('success')}}
        </div>
        @endif

        @if(session('update'))
        <div class="alert alert-success" role="alert">
        {{ session('update')}}
        </div>
        @endif


        @if(session('deleted'))
        <div class="alert alert-success" role="alert">
        {{ session('deleted')}}
        </div>
        @endif

      <table class="table  w-100 ">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Link</th>
            <th scope="col">Tipo</th>
            <th scope="col">Descrizione</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project )
            <tr>
                <th scope="row">
                    {{$project->title}}
                </th>

                <td>
                    {{$project->href}}
                </td>

                <td>
                    {{$project->type}}
                </td>

                <td>
                    {{$project->description}}
                </td>

                <td>
                    <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-warning my-2"><i
                        class="fa-solid fa-pencil"></i></a>

                        <a href="{{route('admin.projects.show', $project)}}" class="btn btn-primary "><i
                        class="fa-solid fa-eye"></i></a>

                        @include('admin.partials.formdelete',[
                                'route'=> route('admin.projects.destroy', $project),
                                'message' => "Sei sicuro di voler eliminare   $project->title ?"
                        ])
                        {{-- normalmente il valore della chiave lo vuole con apici singoli , con backtik e i punti per concatenare non funziona, vuole le doppie virgolette e nessuna parentesi --}}
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="paginator">
          {{$projects->links()}}

      </div>
</div>
</section>
@endsection
