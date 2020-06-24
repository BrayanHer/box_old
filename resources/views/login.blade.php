@extends('welcome')
@section('root')
<style>
.bmd-label-static{
    color:white;
}
.bmd-form-group .form-control{
    color: #ccc;
}
.bmd-form-group input::placeholder{
    font-size:90%;
    color:#ccc;
}
.custom-file-control, .form-control, .is-focused .custom-file-control, .is-focused .form-control {
    background-image: linear-gradient(0deg,#63ceff 2px,rgba(0,150,136,0) 0),linear-gradient(0deg,rgba(0,0,0,.26) 1px,transparent 0);
}
.is-focused [class^=bmd-label] {
    color:#63ceff;
    }
    .form-group bmd-form-group is-filled {
    background:#424242;
    }
    #Concent{
      margin-top: 7em; 
    }
</style>

<div class="container col-md-12" id="Concent">
<div class="card text-white bg-dark text-center rounded mx-auto d-block" style="max-width: 35rem;">

  <div class="card-body">
  <img src="public/recursos/Logo.jpg" alt="Logo Duna" width="15%" height="15%" class="rounded mx-auto d-block"><br>
  
    <h5 class="card-title">Sistema Caja Chica</h5>
    
<form action="{{route('iniciasesion')}}" method="post">
{{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Ingrese numero de Nomina</label>
      <input type="text" class="form-control"  name="Nomina" placeholder="Nomina">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
      <input type="password" class="form-control" name="contraseña">
  </div>


    <button type="submit" class="btn btn-info">Ingresar</button>


</form>
<h6 style="color:#63ceff;">
@if(Session::has('error'))</h6>
    <div>
        <h6 style="color:#63ceff;">
            {{Session::get('error')}}
        </h6>
    </div>
        <script>
            alert("{{Session::get('error')}}");
        </script>
@endif
  </div>
</div>
</div>
@stop