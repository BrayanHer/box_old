<?php
namespace App\Http\Controllers;
use App\Data;
use Excel;
use Illuminate\Http\Request;
class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadData($type)
    {
        $data = Data::get()->toArray();
        return Excel::create('excel_data', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importData(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();
        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = ['title' => $value->title, 'description' => $value->description];
            }
            if(!empty($arr)){
                Data::insert($arr);
            }
        }
        return back()->with('success', 'Insert Record successfully.');
    }
}