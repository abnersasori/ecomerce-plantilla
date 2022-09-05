@extends('layout')

@section('content')
    <div class="container">

        <div class="bg-white p-5 shadow rounded">

            <h1 class="display-4">nombre: {{ $producto->nombre }}<h1>


                    <img src="/storage/{{ $producto->image }}" class="imgShow" alt="no amigo">

                    @if ($producto->categoria_id)
                        <a href="{{ route('categorias.show', $producto->categoria) }}"
                            class="btn btn-primary">{{ $producto->categoria->nombre }}</a>
                    @endif

                    <h1 class="text-secondary">direccion: {{ $producto->direccion }}</h1>
                    <p class="text-secondary">{{ $producto->created_at->diffForHumans() }}</p>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('productos.index') }}">regresar</a>
                        @auth
                            <div class="btn-group btn-group-sm">

                                <a class="btn btn-primary"
                                    href="{{ route('productos.renderEditarRegistro', $producto) }}">editar</a>

                                <a class="btn btn-danger" href="#"
                                    onclick="document.getElementById('delete-producto').submit()">eliminar</a>
                            </div>
                        @endauth
                        <form class="d-none" id="delete-producto" method="POST"
                            action="{{ route('productos.eliminarRegistro', $producto) }}">
                            @csrf @method('DELETE')

                        </form>

                    </div>

        </div>


    </div>
@endsection
