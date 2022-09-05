@extends('layout')

@section('content')


    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif



    <div class="col-12 col-sm-7 col-lg-6 mx-auto">

        <form class="bg-white shadow rounded py-3 px-4" method="POST" enctype="multipart/form-data"
            action="{{ route('productos.editarRegistro', $producto) }}">

            @csrf @method('PATCH')
            <h1 class="display-4">editar producto</h1>

            <div class="mb-3">
                <label for="formFile" class="form-label">selecciona archivo</label>
                <input name="image" class="form-control" type="file" id="formFile">
            </div>


            <div class="form-group">
                <label for="categoria_id">categoria del proyecto</label>
                <select name="categoria_id" id=categoria_id>

                    <option value="">seleccione</option>

                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $categoria->id == $producto->categoria_id ? 'selected' : '' }}>

                            {{ $categoria->nombre }}: {{ $categoria->id }}
                        </option>
                    @endforeach

                </select>
            </div>



            <div class="form-group">
                <label> nombre: </label>
                <input class="form-control" type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}">
            </div>

            <div class="form-group">
                <label> descripcion</label>
                <textarea class="form-control" name="descripcion">{{ old('descripcion', $producto->descripcion) }}</textarea>
            </div>

            <div class="form-group">

                <label>
                    cantidad: </label>
                <input class="form-control" type="number" name="cantidad">

            </div>

            <div class="form-group">

                <label>
                    codigo: </label>
                <input class="form-control" type="text" name="codigo">

            </div>



            <div class="form-group">

                <label>
                    precio: </label>
                <input class="form-control" type="number" name="precio">

            </div><br>

            <div class="form-group">
                <input class="btn btn-primary mt-2" type="submit" value="guardar">
            </div>
        </form>
    </div>

@endsection
