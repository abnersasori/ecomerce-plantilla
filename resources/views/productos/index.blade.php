@extends('layout')

@section('content')

 @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif


   

    <div class="container">

        <div class="d-flex justify-content-between align-items-center">



            <a class="btn btn-primary" href="{{ route('productos.renderCreate') }}">agregar nueva producto</a>



        </div>

        <hr>


        <div class="d-flex flex-wrap justify-content-between align-items-start">

            @forelse ($productos as $producto)
                <div class="card" style="width: 18rem;">

                    @if ($producto->image)
                        <img src="/storage/{{ $producto->image }}" class="card-img-top" alt="no amigo">
                    @endif


                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->codigo}}</p>


                        <a href="{{ route('productos.show', $producto) }}" class="btn btn-primary">ver producto</a>
                        <div class="d-flex justify-content-between align-items-center">
                            
                            <form method="POST" action="{{ route('carrito',['producto'=>$producto,'user'=>auth()->user()]) }}">
        
                                 @csrf
                                <div class="mb-3">
                                    <label for="cant">cantidad</label>
                                    <input type="number" name="cant" class="form-control"/>
                                </div>

                                <div class="mb-3">
                                    <input type="submit" class="btn btn-primary"value="agregar a carrito"/>
                                </div>
                            </form>

                        </div>


                    </div>

                </div>
            @empty
            @endforelse

        </div>


    </div>
@endsection
