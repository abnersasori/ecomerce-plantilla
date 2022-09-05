@extends('layout')

@section('content')
    <div class="container">

        @if (session('status'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">

                {{ session('status') }}
                

            </div>
        @endif


        <div class="row">

            <div class="col-12 col-sm-7 col-lg-6 mx-auto">

                <form class="bg-white shadow rounded py-3 px-4" method="POST" action="{{route('contacto.sendEmail')}}">

                    @csrf
                    <h1 class="display-4">Contacto</h1>
                    <div class="form-group">
                        <input class="form-control border-0" name="titulo" placeholder="Nombre" value={{ old('name') }}>
                    </div>

                    {!! $errors->first('name', '<div class="alert alert-danger"><small>:message</small></div><br>') !!}
                    
                    <div class="form-group mt-2">
                        <input class="form-control" type="text" name="email" placeholder="email"
                            value={{ old('email') }}>
                    </div>

                    
                    {!! $errors->first('email', '<small>:message</small><br>') !!}

                    <div class="form-group mt-2">
                        <input class="form-control" name="asunto" placeholder="asunto" value={{ old('subject') }}>
                    </div>
                    {!! $errors->first('subject', '<small>:message</small><br>') !!}

                    <div class="form-group mt-2">
                        <textarea style="height:500px, width:300px" class="form-control" name="contenido" placeholder="mensaje">{{ old('contenido') }}</textarea>
                    </div>
                    {!! $errors->first('content', '<small>:message</small><br>') !!}
                    <div class="form-group mt-2">

                        <input class="btn btn-primary" type="submit" value="enviar" />
                    </div>

                </form>
            </div>
        </div>





    </div>
@endsection
