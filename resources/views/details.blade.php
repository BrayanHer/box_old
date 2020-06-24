<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-body">
<table class="table table-bordered">

<thead class="thead-dark" align="center">
  <tr>
  <th>Concepto</th>
 <th>Monto</th>
 <th>UUID</th>
 <th>Factura</th>
 <th>Diferencia</th>
  </tr>
</thead>

<tbody align="center">
 @foreach($fin as $det)
 <tr>

 <td>{{$det->Concepto}}</td>
 <td>{{$det->Monto}}</td>
 <td>{{$det->FUID}}</td>
 <td>{{$det->Diferencia}}</td>
 <td>{{$det->created_at}}</td>

 </tr>
  @endforeach
</tbody>
</table>
</div>
           <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>  
