<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\usuarios;
use App\vales;

class loginController extends Controller
{
    public function login(){
        return view ('login');
    }
 
    public function iniciasesion(Request $request){

        $usuario  = $request->Nomina;
        $pass    = $request->contraseña;

        $consulta = usuarios::withTrashed()->where('Nomina','=',$usuario)
                        ->where ('Password','=',$pass)
                            ->get();
          $dep=\DB::select("SELECT d.Nombre,u.ID_DEPT as Departamento
          FROM usuarios AS u
          INNER JOIN departamentos AS d ON u.`ID_DEPT`=d.ID_DEPT WHERE u.nomina= $usuario" );
         
//     dd($dep[0]->Departamento);

             if(count($consulta)==0){
            Session::flash('error', 'El usuario no existe o la contraseña no es correcta');
                     return redirect()->route('login');
            }
           else{
              $desactivado = $consulta[0]->deleted_at;
                   if ($desactivado!=""){
                    Session::flash('error', 'El usuario esta deshabilitado pase con su administrador');
                             return redirect()->route('login');
                   }
                   else{
// _____________________________________________________________
Session::put('sesionname',$consulta[0]->Nombre);
Session::put('sesionidu',$consulta[0]->Nomina);
Session::put('sesiontipo',$consulta[0]->Tipo);
Session::put('sesionmail',$consulta[0]->Correo);
// _____________________________________________________________
Session::put('sesiondept',$dep[0]->Nombre);
Session::put('sesionId_dept',$dep[0]->Departamento);
// _____________________________________________________________
$sname = Session::get('sesionname');
$sidu = Session::get('sesionidu');
$stipo = Session::get('sesiontipo');
$smail=Session::get('sesionmail');
// _____________________________________________________________
$sdept=Session::get('sesiondept');
$siddept=Session::get('sesionId_dept');
// _____________________________________________________________
$vales=\DB::Select("SELECT v.ID_VAL,v.Folio,mot.Motivo,v.Monto,dep.Nombre AS Departamento,v.Tipo,v.Fecha_Comprobar
FROM vales AS v
INNER JOIN departamentos AS dep ON v.`ID_DEPT`=dep.`ID_DEPT`
INNER JOIN motivos AS mot ON v.`ID_MOT`=mot.`ID_MOT`
where dep.ID_DEPT like $siddept and v.Estado='Comprobado'
ORDER BY v.Folio ");

Session::put('Contador',$contar=count($vales));
$contador = Session::get('Contador');


// _____________________________________________________________

            
                        return redirect()->route('Index');
                   }
           }   
     }
     
   public function principal(){
      if( Session::get('sesionidu')!="")
           return view ('administrador');
      else{
                Session::flash('error', 'Favor de loguearse antes de continuar');
                     return redirect()->route('login');
           }
         }
         
   public function cerrarsesion(){
        Session::forget('sesionname');
        Session::forget('sesionidu');
        Session::forget('sesiontipo');
        Session::flush();
        Session::flash('error', 'Sesión Cerrada Correctamente');
        return redirect()->route('login');
   }
}
