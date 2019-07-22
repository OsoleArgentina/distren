@extends('adm.layouts.app')

@section('content')
    <div class="container p-4">
        <a href="{{ route('cierres.create') }}" class="btn btn-primary rounded-pill"><i class="fas fa-plus-circle mx-1"></i>Añadir</a>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($cierres as $item)
                        <tr>
                            <td style="width: 100px;">
                                @if($item->image)
                                    <img src="{{ asset($item->image) }}" class="img-fluid" style="height: 300px;" alt="smaple image">
                                @else
                                    <img src="{{ asset('uploads/no-img.png') }}" alt="" class="img-fluid">
                                @endif
                            </td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->price }}</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="{{ route('cierres.edit',$item->id) }}"><i class="fas fa-pen"></i></a>
                                <form action="{{ route('cierres.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('¿Realmente desea eliminar este registro?')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No hay registros</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
