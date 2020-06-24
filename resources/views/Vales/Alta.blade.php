@extends('index')
@section('machote')

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Creacion de Vale</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <!-- |____________________________________________________________________________________________________| -->
<form action="">
  <div class="modal-body">
  <div class="row col-md-12">
    <div class="form-group col-md-6">

      <label>Departamento </label>
        <select class="form-control" id="exampleFormControlSelect1">
          <option>Sistemas</option>
          <option>Compras</option>
          <option>Juridicos</option>
          <option>Ventas</option>
          <option>Transportes</option>
        </select>
</div>
<div class="form-group col-md-6">
    <label for="exampleFormControlSelect1">Motivo </label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
    </select>
  </div>
  </div>

  <div class="row col-md-12">

  <div class="form-group col-md-6">
    <label for="formGroupExampleInput2">Monto</label>
    <input type="number" class="form-control"  placeholder="Escriba el Monto">
  </div>
  <div class="form-group col-md-6">
    <label for="exampleFormControlSelect1">Tipo </label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option value="1" >Solicitud</option>
      <option value="2">Reembolso</option>
    </select>
  </div>
  </div> 
  <div class="row col-md-12">
  <div class="form-group col-md-6">
    <label for="formGroupExampleInput2">Fecha de Creacion </label>
    <input type="text" class="form-control" value="<?php $date=date('d/m/Y'); echo $date; ?>" readonly>
  </div>
  <div class="form-group col-md-6">
    <label for="formGroupExampleInput2">Fecha a Comprobar </label>
    <input type="date" class="form-control">
  </div>
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-outline-danger">Cancelar</button> &nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-outline-success">Guardar Vale</button>      
  </div>
</form>
  <!-- |____________________________________________________________________________________________________| -->

    </div>
  </div>
</div>
@stop