 <nav class="navbar navbar-light navbar-expand-lg bg-light  shadow-sm">

     <div class="container">
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
             aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">

             <ul class="nav nav-pills">
                 <li class="nav-item ">
                     <a class="nav-link " href="{{ route('home') }}">@lang('home')</a>
                 </li>

                  <li class="nav-item ">
                     <a class="nav-link " href="{{ route('contacto') }}">@lang('contacto')</a>
                 </li>

                 <li class="nav-item ">
                     <a class="nav-link " href="{{ route('productos.index') }}">@lang('productos')</a>
                 </li>

                
                 <li class="nav-item ">
                     <a class="nav-link " href="{{ route('carrito.mostrar')}}">@lang('carrito')</a>
                 </li>

                

                 @guest
                     <li class="nav-item " >
                         <a class="nav-link  " href="{{ route('login') }}">Login</a>
                     </li>

                      <li class="nav-item " >
                         <a class="nav-link " href="{{ route('register') }}">registrar</a>
                     </li>
                     
                 @else
                     <li>
                         <a class="nav-link" href="#"
                             onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                             Cerrar sesion</a>
                     </li>

                 @endguest

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>

             </ul>
         </div>


     </div>
 </nav>