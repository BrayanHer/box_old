@extends('index')
@section('machote')
<body>
    <div class="container">
        <table  class="col-md-12">
            <thead>
                <tr>
                <!-- E n t r a d a   d e   F o m u l a r i o -->
                    <th rowspan="3">
 <div class="card" style="width: 25rem;">
  <div class="card-body">
    <h5 class="card-title">Creacion de Usuario</h5>
    <form action="{{route('Guser')}}" method="Post">
    {{csrf_field()}}
    <div class="form-group col-md-12">
      <label for="formGroupExampleInput2">Nombre Completo</label>
      <input type="text" class="form-control" name="NameUs" placeholder="Escriba el Nombre Completo">
    </div>
  
    <div class="form-group col-md-12">
      <label for="formGroupExampleInput2">Nomina</label>
      <input type="number" class="form-control" name="NominaUs" placeholder="Escriba su Nomina">
    </div>
    

    <div class="form-group col-md-12">
      <label>Tipo de Usuario </label>
        <select class="form-control" name="TipoUs"> 
        @if(Session::get('sesiontipo')=="SuperAd" )
        <option value="Administrador">Administrador</option>
          <option value="Jefe">Jefe</option>
          <option value="Empleado">Empleado</option>
          @endif
          @if(Session::get('sesiontipo')=="Admin" )
          <option value="Jefe">Jefe</option>
          <option value="Empleado">Empleado</option>
          @endif  
        @if(Session::get('sesiontipo')=="Jefe" )
        <option value="Empleado">Empleado</option>
    @endif

  
        </select>
    </div>
    
    <div class="form-group col-md-12">
      <label for="formGroupExampleInput2">Contraseña</label>
      <input type="password" class="form-control" name="PassUs" placeholder="Escriba su Correo">
    </div>

    <div class="form-group col-md-12">
      <label for="formGroupExampleInput2">Correo</label>
      <input type="mail" class="form-control" name="MailUs" placeholder="Escriba su Contraseña">
    </div>

    <div class="form-group col-md-12">
      <label>Departamento </label>
        <select class="form-control" name="DeptUs">
        <option value="{{$dept}}">{{$depart[0]->Nombre}}</option>
        @foreach($departs as $depto)
          <option value="{{$depto->ID_DEPT}}">{{$depto->Nombre}}</option>
          @endforeach
        </select>
    </div>

    <div class="modal-footer">
      <button type="reset" class="btn btn-outline-danger">Cancelar</button> &nbsp;&nbsp;&nbsp;
      <button type="submit" class="btn btn-outline-success">Guardar Usuario</button>      
    </div>

    </form>
  </div>
</div>

                    </th>
                <!-- F i n   d e   F o m u l a r i o --> 
                 <!-- E n t r a d a   d e   C o n s u l t a -->
                    <th>
<div class="card" style="width: 38rem;">
  <div class="card-body">
    <h5 class="card-title">Registro de Empleados Area: {{Session::get('sesiondept')}}</h5>
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Nomina</th>
      <th scope="col">Nombre</th>
      <th scope="col">Tipo</th>
    </tr>
  </thead>
  <tbody>
  @foreach($usuarios as $user)
    <tr>
      <th scope="row">{{$user->Nomina}}</th>
      <td>{{$user->Nombre}}</td>
      <td>{{$user->Tipo}}</td>
    </tr>
  </tbody>
  @endforeach
</table>

  </div>
</div>
                    </th>
                    <!-- F i n    d e   C o n s u l t a -->
                </tr>
            </thead>
        </table>
    </div>
</body>
@stop