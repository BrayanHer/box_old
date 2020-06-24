<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\departamentos;
use App\vales;
use App\motivos;
use Session;

class VistasController extends Controller
{
 // _________________________________________________________________________________________________________________________

    public function principal(){
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

$departamentos=departamentos::withTrashed()->orderBy('ID_DEPT', 'asc') //withTrashed -> todos ->eliminados (lógico) o no
->get();

    $vales=\DB::Select("SELECT v.ID_VAL,v.Folio,mot.Motivo,v.Monto,dep.Nombre AS Departamento,v.Tipo,v.Fecha_Comprobar
    FROM vales AS v
    INNER JOIN departamentos AS dep ON v.`ID_DEPT`=dep.`ID_DEPT`
    INNER JOIN motivos AS mot ON v.`ID_MOT`=mot.`ID_MOT`
    where dep.ID_DEPT like $dept and v.Estado='Comprobado'
    ORDER BY v.Folio ");

    $contador=count($vales);

        return view('index')
        ->with('contador',$contador)
        ->with('departamentos',$departamentos)
        ->with('motivos',$motivos)
        ->with('IdVale',$IdVale);
    }
// _________________________________________________________________________________________________________________________


// _________________________________________________________________________________________________________________________

    public function Index(){
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
/*________________IMPORTANTE_______________________________*/
$dept=Session::get('sesionId_dept');                    
$depart = departamentos::where('ID_DEPT','=', $dept)     /*_*/
->get();
$departs = departamentos::where('ID_DEPT','!=',$dept)   /*_*/
->get();
$vales=\DB::Select("SELECT v.ID_VAL,v.Folio,mot.Motivo,v.Monto,dep.Nombre AS Departamento,v.Tipo,v.Fecha_Comprobar
FROM vales AS v
INNER JOIN departamentos AS dep ON v.`ID_DEPT`=dep.`ID_DEPT`
INNER JOIN motivos AS mot ON v.`ID_MOT`=mot.`ID_MOT`
where dep.ID_DEPT like $dept and v.Estado='Comprobado'
ORDER BY v.Folio ");

$contador=count($vales);
/*______________________________________________________*/

        return view('App')
        ->with('contador',$contador)
        ->with('dept',$dept)
        ->with('depart',$depart)
        ->with('departs',$departs)
        ->with('motivos',$motivos)
        ->with('IdVale',$IdVale);
    }
// _________________________________________________________________________________________________________________________

}
