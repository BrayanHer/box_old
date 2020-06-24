@extends('index')
@section('machote')
<body>

<br>
    <div class="container">
    <div class="row">

    <table class="table table-bordered">
  <thead class="thead-dark" align="center">
    <tr>
      <th scope="col">Folio</th>
      <th scope="col">Motivo</th>
      <th scope="col">Monto</th>
      <th scope="col">Departamento</th>
      <th scope="col">Tipo</th>
      <th scope="col">Fecha de Comprobación</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody align="center">
@foreach($vales as $val)
    <tr>
      <th scope="row">{{$val->Folio}}</th>
      <td>{{$val->Motivo}}</td>
      <td>${{$val->Monto}}</td>
      <td>{{$val->Departamento}}</td>
    @if($val->Tipo==1)
      <td>Solicitud</td>
    @else
    <td>Reembolso</td>
    @endif
    
      <td>{{date('d-M-Y', strtotime($val->Fecha_Comprobar))}}</td>

<td>
  <a href="{{URL::action('ValesController@detalles',['ID_VAL'=>$val->ID_VAL])}}">
    <button type="submit" class="btn btn-outline-success">
      <i class="fa fa-check-square-o" aria-hidden="true"></i>
        Validar Gastos
    </button>
  </a>  
  &nbsp;&nbsp;

  <a href="{{URL::action('ValesController@PDFVales',['ID_VAL'=>$val->ID_VAL])}}">
    <button type="submit" class="btn btn-outline-danger">
      <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
        PDF
    </button>
  </a>


</td>

    </tr>
@endforeach
  </tbody>
</table>
    </div>
    </div>
</body>


@stop