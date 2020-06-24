<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vales;
use App\departamentos;
use App\motivos;
use App\usuarios;
use Session;

class UserController extends Controller
{
    public function Usuarios(){
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

$vales2=\DB::Select("SELECT v.ID_VAL,v.Folio,mot.Motivo,v.Monto,dep.Nombre AS Departamento,v.Tipo,v.Fecha_Comprobar
FROM vales AS v
INNER JOIN departamentos AS dep ON v.`ID_DEPT`=dep.`ID_DEPT`
INNER JOIN motivos AS mot ON v.`ID_MOT`=mot.`ID_MOT`
where dep.ID_DEPT like $dept and v.Estado='Comprobado'
ORDER BY v.Folio ");

$contador=count($vales2);

/*______________________________________________________*/
    $usuarios=usuarios::withTrashed()->orderBy('ID_US', 'asc')->where('ID_DEPT','=',$dept) //withTrashed -> todos ->eliminados (lógico) o no
    ->get();

        return view('Usuarios.User')
        ->with('contador',$contador)
        ->with('usuarios',$usuarios)
        ->with('dept',$dept)
        ->with('depart',$depart)
        ->with('departs',$departs)
        ->with('motivos',$motivos)
        ->with('IdVale',$IdVale);
    }

    public function Guser(Request $request){

        $Nombre=$request->NameUs;
        $Nomina=$request->NominaUs;
        $Tipo=$request->TipoUs;
        $Contraseña=$request->PassUs;
        $Correo=$request->MailUs;
        $dept=$request->DeptUs;
        // dd($dept);

        $Aluser= new usuarios;
        $Aluser->Nombre=$Nombre;
        $Aluser->Nomina=$Nomina;
        $Aluser->Password=$Contraseña;
        $Aluser->Correo=$Correo;
        $Aluser->Tipo=$Tipo;
        $Aluser->ID_DEPT=$dept;
        $Aluser->save();

        return redirect()->back();
    }

}
