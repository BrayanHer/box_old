@extends('index')
@section('machote')
<style>
  body{
     background-color:#000000b3; 
  
  }
  p{
         color:#fff;
     }
</style>
<div class="container">
<body>
<div class="card">
  <div class="card-header">
  <h5>Detalles del Vale</h5>
    
  </div>
  <div class="card-body">
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Concepto</th>
      <th scope="col">Monto</th>
      <th scope="col">UUID</th> 
      <th scope="col">Fecha de Creación</th> 
    </tr>
  </thead>
  <tbody>
  @foreach($detalle as $deta)
    <tr>
      <th scope="row">{{$deta->ID_DVAL}}</th>
    <td>{{$deta->Concepto}}</td>
    <td>{{$deta->Monto}}</td>
    <td>{{$deta->FUID}}</td>
    <td>{{$deta->created_at}}</td>
    </tr>
    @endforeach

  </tbody>
</table>

Total de Gastos :
<br>
Comparacion de Gastos:
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-outline-danger"> <i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i> Descargar PDF</button> &nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-outline-info"> <i class="fa fa-reply fa-lg" aria-hidden="true"></i>  Regresar</button>      
  </div>
</div>
</body>
</div>

@stop