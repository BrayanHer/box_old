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
                  <a href="{{URL::action('ValesController@detalle_fin',['ID_VAL'=>$val->ID_VAL])}}">
                     <button  type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
                      <i class="fa fa-list" aria-hidden="true"></i>
                          Ver Detalles
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