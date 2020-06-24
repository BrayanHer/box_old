
<!DOCTYPE html>
<html lang="en">

<head>
<style>
#fhead{
  color:red
}
</style>
   <table border="1">
   <thead>
      <tr>
      <td colspan="2" align="center">Folio:<b id="fhead">&nbsp;&nbsp;{{$vales[0]->Folio}}&nbsp;</b></td>
      </tr>
      <tr>
      <td>Departamento:<b>&nbsp;&nbsp;{{$vales[0]->Departamento}} </b> &nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>Empleado:<b> &nbsp;&nbsp;{{Session::get('sesionname')}}</b></td>
      </tr>
</thead>
<tbody>
<tr>
<td>Motivo:<b>&nbsp;&nbsp;{{$vales[0]->Motivo}}</b> &nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Tipo:<b>&nbsp;&nbsp;@if($vales[0]->Tipo==1)
    Solicitud
    @else
    Reembolso
    @endif</b> &nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
<td>Monto:<b>&nbsp;&nbsp;$ {{$vales[0]->Monto}}</b> &nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Fecha de Comprobación:<b>&nbsp;&nbsp;{{date('d-M-Y', strtotime($vales[0]->Fecha_Comprobar))}}</b> &nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
</tbody>
   </table>    
   <p>Este Correo es solo para fines de notificacion, si usted es el jefe del area por favor de continuar con el proceso de aceptación</p>

</body>
</html>