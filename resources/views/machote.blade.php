@extends('welcome')
@section('root')

<style>

[class*=" bmd-label"], [class^=bmd-label] {
    color: rgba(0, 0, 0, 0.98);
    font-size:110%;
}
.bmd-form-group .bmd-label-static{
  font-size: .85rem;
  font-weight: bold;
}
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Caja Chica</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalCenter">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalCenter">Creacion de Vale</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('comprobacion')}}">Comprabacion de Vale</a>
            </li>
          </ul>
        </div>
    <a href="{{route('cerrarsesion')}}">
      <button class="btn btn-outline-success my-2 my-sm-0 mr-5" type="submit">Cerrar Sesión</button>
    </a>
</nav>

@yield('template')
@stop