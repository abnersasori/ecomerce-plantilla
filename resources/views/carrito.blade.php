@extends('layout')



@section('content')
    <div class="container">
        <h1>Carrito</h1>

        <div class="d-flex flex-wrap justify-content-between align-items-start">
            @forelse(auth()->user()->pedidos as $pedido)
                <div class="card" style="width: 18rem;">
                    @if ($pedido->image)
                        <img src="/storage/{{ $pedido->image }}" class="card-img-top" alt="no amigo">
                    @endif
                    <div class="card-body">

                        <h5 class="card-title">cantidad:{{ $pedido->cant }}</h5>
                        <p class="card-text">precio:{{ $pedido->precio }}Q</p>

                        <div class="d-flex justify-content-between align-items-center">

                            <form method="POST" action="{{ route('carrito.eliminar', $pedido) }}">
                                @csrf @method('DELETE')
                                <input class="btn btn-primary" type="submit" value="eliminar del carrito">
                            </form>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse


            <div class=d-none>
                {{ $total = 0 }}
                @forelse(auth()->user()->pedidos as $pedido)
                    {{ $total = $total + $pedido->precio }}
                @empty
                @endforelse
            </div>

            <div>
                <h1> total={{ $total }}Q</h1>
                <form>
                    <input type="submit" class="btn btn-primary" value="comprar">
                </form>
            </div>
        </div>
    </div>
@endsection
