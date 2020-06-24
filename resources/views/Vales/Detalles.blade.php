@extends('index')
@section('machote')

<div class="container" >
<form action="{{route('GDetalles')}}" method="post">
{{csrf_field()}}
<strong >Folio&nbsp;&nbsp; </strong><span class="badge badge-pill badge-success">&nbsp;# {{$Historial->ID_VAL}}&nbsp;</span>
<br>
<hr>
<input type="hidden" value="{{$Historial->ID_VAL}}" name="folio">

<div class="row col-md-12">
    <div class="form-group col-md-6">
      <label for="formGroupExampleInput2">Empelado que Solicito</label>
      <input type="text" class="form-control" name="monto" value="{{$Historial->Solicitud}}" readonly>
    </div>

    <div class="form-group col-md-6">
      <label for="formGroupExampleInput2">Jefe que Aprueba</label>
      <input type="text" class="form-control" name="monto" value="{{$Historial->Aprobacion}}" readonly>
      </div>
</div>


<div class="row col-md-12">
    <div class="form-group col-md-6">
      <label>Departamento </label>
        <select class="form-control" name="departamento" disabled="true">
        <option value="{{$dept}}">{{$depart[0]->Nombre}}</option>
        @foreach($departs as $depto)
          <option value="{{$depto->ID_DEPT}}">{{$depto->Nombre}}</option>
          @endforeach
        </select>
    </div>

    <div class="form-group col-md-6">
      <label>Motivo </label>
        <select class="form-control"name="motivo" disabled="true">
       @foreach($motivos as $mot)
          <option value="{{$mot->ID_MOT}}">{{$mot->Motivo}}</option>
        @endforeach
        </select>
    </div>
  </div>

  <div class="row col-md-12">
    <div class="form-group col-md-6">
      <label for="formGroupExampleInput2">Monto</label>
      <input type="number" class="form-control" name="monto" value="{{$Historial->Monto}}">
    </div>

    <div class="form-group col-md-6">
      <label>Tipo</label>
      <select class="form-control" name="tipo">
      @if($Historial->Tipo==1)
        <option value="1" >Solicitud</option>
        @else
        <option value="2" >Reembolso</option>
        @endif
      </select>
    </div>
  </div>
<hr>
<h4>Desglose de Gastos <button type="button" class="btn btn-outline-info" id="btn1"> <i class="fa fa-plus" aria-hidden="true"></i> </button> </h4>

<div class="row col-md-12" id="invic">
    
    </div>
    <div class="modal-footer">
      <button type="reset" class="btn btn-outline-danger">Cancelar</button> &nbsp;&nbsp;&nbsp;
      <button type="submit" class="btn btn-outline-success">Guardar Vale</button>      
    </div>
</form>

</div>
<script>
$(document).ready(function(){

  $("#btn1").click(function(){

    $("#invic").append("<div class='form-group col-md-3'><label for='formGroupExampleInput2'>Concepto</label><input type='text' class='form-control' name='Concept[]' value=''></div>");
    $("#invic").append("<div class='form-group col-md-3'><label for='formGroupExampleInput2'>Monto</label><input type='number' class='form-control' name='Mont[]' value=''></div>");
    $("#invic").append("<div class='form-group col-md-3'><label for='formGroupExampleInput2'>Factura</label><input type='file' class='form-control' name='Fact[]' value=''></div>");
    $("#invic").append("<div class='form-group col-md-3'><label for='formGroupExampleInput2'>UUID</label><input type='text' class='form-control' name='UUID[]' value=''></div>");

  });

});
</script>

@stop
