<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vales;
use App\departamentos;
use App\motivos;
use App\detalle_vales;
use Session;
use Mail;
use PDF;
class ValesController extends Controller
{
    public function Gvales(Request $request){

        $Folio=$request->folio;
        $departamento=$request->departamento;
        $motivo=$request->motivo;
        $monto=$request->monto;
        $tipo=$request->tipo;
        $fechaCom=$request->fechaComp;
        $user=Session::get('sesionname');


        $Alvale= new vales;
        $Alvale->Folio=$Folio;
        $Alvale->ID_DEPT=$departamento;
        $Alvale->ID_MOT=$motivo;
        $Alvale->Monto=$monto;
        $Alvale->Tipo=$tipo;
        $Alvale->Estado='Solicitado';
        $Alvale->Fecha_Comprobar=$fechaCom;
        $Alvale->Solicitud=$user;
        $Alvale->Aprobacion='En espera';
        $Alvale->save();
// ______________________E N T R A D A   D E   C O R R E O __________________
       

$dept=Session::get('sesionId_dept');

    $correo=\DB::Select("SELECT u.`Correo`
    FROM departamentos AS d
    INNER JOIN usuarios AS u ON d.`ID_DEPT`=u.`ID_DEPT`
    WHERE d.`ID_DEPT` = $dept AND u.`Tipo` = 'Jefe'");


$vales=\DB::Select("SELECT v.Folio,mot.Motivo,v.Monto,dep.Nombre AS Departamento,v.Tipo,v.Fecha_Comprobar
FROM vales AS v
INNER JOIN departamentos AS dep ON v.`ID_DEPT`=dep.`ID_DEPT`
INNER JOIN motivos AS mot ON v.`ID_MOT`=mot.`ID_MOT`
WHERE dep.ID_DEPT LIKE $dept
     ORDER BY  v.Folio  DESC LIMIT  1");

        Mail::send('Notificacion',compact('vales',$vales),function($msj)use($correo){
            $msj->subject('Notificacion de Vale "Caja Chica"');
            $msj-> to($correo[0]->Correo);//Correo del destinatario  
        });

    return redirect()->back();
    }
// _________________________________________________________________________________________________________________________
    public function Comprobacion(){
        $folio = vales::withTrashed()->orderBy('ID_VAL', 'desc')
        ->take(1)
            ->get();
    
    
        if(count($folio)==0){
            $IdVale = 1;
           
    }
    
    else{
        $IdVale = $folio[0]->ID_VAL + 1;
    }

    $motivos=motivos::withTrashed()->orderBy('ID_MOT', 'asc') //withTrashed -> todos ->eliminados (lógico) o no
    ->get();

    $dept=Session::get('sesionId_dept');

    $depart = departamentos::where('ID_DEPT','=', $dept)
->get();

$departs = departamentos::where('ID_DEPT','!=',$dept)
->get();

$vales=\DB::Select("SELECT v.ID_VAL,v.Folio,mot.Motivo,v.Monto,dep.Nombre AS Departamento,v.Tipo,v.Fecha_Comprobar
FROM vales AS v
INNER JOIN departamentos AS dep ON v.`ID_DEPT`=dep.`ID_DEPT`
INNER JOIN motivos AS mot ON v.`ID_MOT`=mot.`ID_MOT`
where dep.ID_DEPT like $dept and v.Estado='Solicitado'
    ORDER BY v.Folio ");

$vales2=\DB::Select("SELECT v.ID_VAL,v.Folio,mot.Motivo,v.Monto,dep.Nombre AS Departamento,v.Tipo,v.Fecha_Comprobar
FROM vales AS v
INNER JOIN departamentos AS dep ON v.`ID_DEPT`=dep.`ID_DEPT`
INNER JOIN motivos AS mot ON v.`ID_MOT`=mot.`ID_MOT`
where dep.ID_DEPT like $dept and v.Estado='Comprobado'
ORDER BY v.Folio ");

$contador=count($vales2);
        return view ('Vales.comprobacion')
        ->with('contador',$contador)
        ->with('dept',$dept)
        ->with('depart',$depart)
        ->with('departs',$departs)
        ->with('motivos',$motivos)
        ->with('IdVale',$IdVale)
        ->with('vales',$vales);
    }
// _________________________________________________________________________________________________________________________
public function UpVales($ID_VAL){

$jefe=Session::get('sesionname');
$UPDATE=\DB::update("UPDATE vales SET Estado = 'Comprobado', Aprobacion = '$jefe' WHERE ID_VAL =$ID_VAL");
return redirect()->back();
// _________________________________________________________________________________________________________________________

}
public function Historial(){
    $folio = vales::withTrashed()->orderBy('ID_VAL', 'desc')
    ->take(1)
        ->get();


    if(count($folio)==0){
        $IdVale = 1;
       
}

else{
    $IdVale = $folio[0]->ID_VAL + 1;
}

$motivos=motivos::withTrashed()->orderBy('ID_MOT', 'asc') //withTrashed -> todos ->eliminados (lógico) o no
->get();

$dept=Session::get('sesionId_dept');

$depart = departamentos::where('ID_DEPT','=', $dept)
->get();

$departs = departamentos::where('ID_DEPT','!=',$dept)
->get();

$vales=\DB::Select("SELECT v.ID_VAL,v.Folio,mot.Motivo,v.Monto,dep.Nombre AS Departamento,v.Tipo,v.Fecha_Comprobar
FROM vales AS v
INNER JOIN departamentos AS dep ON v.`ID_DEPT`=dep.`ID_DEPT`
INNER JOIN motivos AS mot ON v.`ID_MOT`=mot.`ID_MOT`
where dep.ID_DEPT like $dept and v.Estado='Comprobado'
ORDER BY v.Folio ");

$contador=count($vales);

return view('Vales.Historial')
    ->with('contador',$contador)
    ->with('dept',$dept)
    ->with('depart',$depart)
    ->with('departs',$departs)
    ->with('motivos',$motivos)
    ->with('IdVale',$IdVale)
    ->with('vales',$vales);
    
}
// _________________________________________________________________________________________________________________________
    public function detalles($ID_VAL){
        $folio = vales::withTrashed()->orderBy('ID_VAL', 'desc')
        ->take(1)
            ->get();
    
    
        if(count($folio)==0){
            $IdVale = 1;
           
    }
    
    else{
        $IdVale = $folio[0]->ID_VAL + 1;
    }
    
    $motivos=motivos::withTrashed()->orderBy('ID_MOT', 'asc') //withTrashed -> todos ->eliminados (lógico) o no
    ->get();
    
    $dept=Session::get('sesionId_dept');
    
    $depart = departamentos::where('ID_DEPT','=', $dept)
    ->get();
    
    $departs = departamentos::where('ID_DEPT','!=',$dept)
    ->get();
// _________________________________________________________________________________________________________________________
$Historial=\DB::Select("SELECT v.ID_VAL,v.Folio,mot.Motivo,v.Monto,dep.Nombre AS Departamento,v.Tipo,v.Fecha_Comprobar,v.Solicitud,v.Aprobacion
FROM vales AS v
INNER JOIN departamentos AS dep ON v.`ID_DEPT`=dep.`ID_DEPT`
INNER JOIN motivos AS mot ON v.`ID_MOT`=mot.`ID_MOT`
WHERE v.`ID_VAL` LIKE $ID_VAL
ORDER BY v.Folio ");

$vales=\DB::Select("SELECT v.ID_VAL,v.Folio,mot.Motivo,v.Monto,dep.Nombre AS Departamento,v.Tipo,v.Fecha_Comprobar
FROM vales AS v
INNER JOIN departamentos AS dep ON v.`ID_DEPT`=dep.`ID_DEPT`
INNER JOIN motivos AS mot ON v.`ID_MOT`=mot.`ID_MOT`
where dep.ID_DEPT like $dept and v.Estado='Comprobado'
ORDER BY v.Folio ");


    return view('Vales.Detalles')

    ->with('Historial',$Historial[0])
    ->with('dept',$dept)
    ->with('depart',$depart)
    ->with('departs',$departs)
    ->with('motivos',$motivos)
    ->with('IdVale',$IdVale);
    
        
    }

    public function PDFVales($ID_VAL){
$data=\DB::select("SELECT v.ID_VAL,v.Folio,mot.Motivo,v.Monto,dep.Nombre AS Departamento,v.Tipo,v.Fecha_Comprobar,v.Solicitud,v.Aprobacion,v.Estado
FROM vales AS v
INNER JOIN departamentos AS dep ON v.`ID_DEPT`=dep.`ID_DEPT`
INNER JOIN motivos AS mot ON v.`ID_MOT`=mot.`ID_MOT`
WHERE v.`ID_VAL` LIKE $ID_VAL
ORDER BY v.Folio ");

$pdf = PDF::loadView('ValeUser',compact('data',$data));  
return $pdf->stream('Comprobante de vale -'.$data[0]->Solicitud.'.pdf');

        return redirect()->back();
    }

    public function GDetalles(Request $request){
        // $count = count($request->Concept);
        // echo $count;
        $folio=$request->folio; 
        for($i=0; $i<count($request->Concept); $i++) {
            
                    $Concepto=$request->Concept[$i]; 
                    $Monto=$request->Mont[$i]; 
                    $Fact=$request->Fact[$i]; 
                    $UUID=$request->UUID[$i];
        
         
                    $details= new detalle_vales;
                    $details->ID_VAL=$folio;
                    $details->Concepto=$Concepto;
                    $details->Monto=$Monto;
                    $details->FUID=$UUID;
                    $details->Diferencia=0;
                    $details->save(); 
        
            }
$UPDATE=\DB::update("UPDATE vales SET Estado = 'Finalizado'");
    

    
//return $request->Concept;
    return redirect()->back();

}

    public function ValeFinalizado(){
        $folio = vales::withTrashed()->orderBy('ID_VAL', 'desc')
        ->take(1)
            ->get();
    
    
        if(count($folio)==0){
            $IdVale = 1;
           
    }
    
    else{
        $IdVale = $folio[0]->ID_VAL + 1;
    }
    
    $motivos=motivos::withTrashed()->orderBy('ID_MOT', 'asc') //withTrashed -> todos ->eliminados (lógico) o no
    ->get();
    
    $dept=Session::get('sesionId_dept');
    
    $depart = departamentos::where('ID_DEPT','=', $dept)
    ->get();
    
    $departs = departamentos::where('ID_DEPT','!=',$dept)
    ->get();
// _________________________________________________________________________________________________________________________

        $vales=\DB::Select("SELECT v.ID_VAL,v.Folio,mot.Motivo,v.Monto,dep.Nombre AS Departamento,v.Tipo,v.Fecha_Comprobar
        FROM vales AS v
        INNER JOIN departamentos AS dep ON v.`ID_DEPT`=dep.`ID_DEPT`
        INNER JOIN motivos AS mot ON v.`ID_MOT`=mot.`ID_MOT`
        where dep.ID_DEPT like $dept and v.Estado='Finalizado'
        ORDER BY v.Folio ");   

$valor=$vales[0]->ID_VAL;

$detalle=\DB::SELECT("SELECT Concepto,Monto,FUID,Diferencia,created_at from detalle_vales where ID_VAL LIKE $valor");

    return view('Vales.Finalizados')
    ->with('detalle',$detalle)
    ->with('vales',$vales)
    ->with('dept',$dept)
    ->with('depart',$depart)
    ->with('departs',$departs)
    ->with('motivos',$motivos)
    ->with('IdVale',$IdVale);
    }

    public function detalle_fin($ID_VAL){

        $folio = vales::withTrashed()->orderBy('ID_VAL', 'desc')
        ->take(1)
            ->get();
    
    
        if(count($folio)==0){
            $IdVale = 1;
           
    }
    
    else{
        $IdVale = $folio[0]->ID_VAL + 1;
    }
    
    $motivos=motivos::withTrashed()->orderBy('ID_MOT', 'asc') //withTrashed -> todos ->eliminados (lógico) o no
    ->get();
    
    $dept=Session::get('sesionId_dept');
    
    $depart = departamentos::where('ID_DEPT','=', $dept)
    ->get();
    
    $departs = departamentos::where('ID_DEPT','!=',$dept)
    ->get();
//_________________________________________________________________________________________
$detalle=\DB::SELECT("SELECT ID_DVAL,Concepto,Monto,FUID,Diferencia,created_at from detalle_vales where ID_VAL LIKE $ID_VAL");

$suma=\DB::SELECT("SELECT (V.Monto - SUM(DV.Monto)) AS resultado
FROM detalle_vales AS dv 
LEFT JOIN vales AS v ON dv.ID_VAL=v.ID_VAL 
 WHERE v.ID_VAL LIKE 1 ");

dd($suma);
     
        return view('Vales.resultado')
        ->with('detalle',$detalle)
        ->with('dept',$dept)
        ->with('depart',$depart)
        ->with('departs',$departs)
        ->with('motivos',$motivos)
        ->with('IdVale',$IdVale);
    }
}
