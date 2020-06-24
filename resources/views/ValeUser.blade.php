<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comprobante de vale</title>
</head>
<style>
body{
  font-family:Helvetica;
}
</style>
<body>
  <table width="100%">
  <thead>
  <tr>
  <th width="20%"><img src="../public/recursos/Logo.jpg" alt="Logo Duna" width="80"height="100" ></th>
  <th><h2>Solicitud de Vale</h></th>
  </tr>
  </thead>
  </table>

 
 <br><br><hr>
  <table width="100%" height="20%">
  <tbody>

 <tr>
  <td width="33%" height="4%">Folio:&nbsp;&nbsp;&nbsp;{{$data[0]->Folio}}</td>
  <td width="33%" height="4%">Estado: &nbsp;&nbsp;&nbsp;{{$data[0]->Estado}}</td>
  <td width="33%" height="4%">Fecha: &nbsp;&nbsp;&nbsp;<?php $date=date('d/M/Y'); echo $date; ?></td>
 </tr>
  </tbody>
</table>
 <br>
  <table   width="100%" height="20%">
  <tbody>
 <tr>
  <td width="20%" height="4%"> <b>Solicitado por:</b> </td>
  <td width="30%" height="4%">{{$data[0]->Solicitud}}</td>
  <td width="20%" height="4%"><b>Aprobado por:</b> </td>
  <td width="30%" height="4%">{{$data[0]->Aprobacion}}</td>
 </tr>
  </tbody>
</table>
<br>
<hr>

<table width="80%" height="20%" >
<tbody>
<tr>
<td width="20%" height="4%"> <b>Departamento:</b> </td>
  <td width="10%" height="4%">{{$data[0]->Departamento}}</td>
  <td width="20%" height="4%"><b>Motivo:</b> </td>
  <td width="10%" height="4%">{{$data[0]->Motivo}}</td>
</tr>

<tr>
<td width="30%" height="4%"></td>
</tr>

<tr>
<td width="20%" height="4%"> <b>Monto:</b> </td>
  <td width="30%" height="4%">{{$data[0]->Monto}}</td>
  <td width="20%" height="4%"><b>Tipo:</b> </td>
  @if($data[0]->Solicitud==1)
<td width="30%" height="4%">Solicitud</td>
  @else
  <td width="30%" height="4%">Reembolso</td>
  @endif
</tr>

<tr>
<td width="30%" height="4%"></td> 
</tr>

<tr>
<td width="50%" height="4%"> <b>Fecha A comprobar:</b> </td>
  <td width="20%" height="4%">{{$data[0]->Fecha_Comprobar}}</td>
</tr>

</tbody>
</table>
<br><br><br><br><br>
<br><br><br><br><br>
<br><br>


<table height="10%" align="center">
<tr>
<th height="10%">Firma del Solicitante <br><br><br><br><br><hr><br>
{{$data[0]->Solicitud}}
</th>
<th height="10%" width="30%"> &nbsp;&nbsp;&nbsp;</th>
<th height="10%">Firma de quien lo aprueba <br><br><br><br><br><><hr><br>
{{$data[0]->Aprobacion}}
</th>
<th height="10%" width="30%">&nbsp;&nbsp;&nbsp;</th>
<th height="10%">Firma del encargado <br><br><br><br><br><hr><br>
{{Session::get('sesionname')}}
</th>
</tr>
</table>
</body>
</html>