<?php

namespace App\Http\Controllers;
use App\Models\Models\Batch;
use App\Models\Module;
use App\Models\ModuleWiseCourse;
use App\Models\Subject;
use App\Models\participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class InboxController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //

    public function index()
    {
        
        $data['moduleList']=DB::table('modules')
        ->select('modules.id','modules.name','modules.month','modules.file_name','modules.batch_id','batches.name as filename','module_wise_courses.remarks')
        ->join('module_wise_courses', 'modules.id', '=', 'module_wise_courses.module_id')
        ->join('batches', 'modules.batch_id', '=', 'batches.id')
        ->where('module_wise_courses.flag','=', 0)
        ->where('module_wise_courses.subject_id','=', auth()->user()->id)
        ->get();
      

 //print_r($data['moduleList']);
 //exit;
return view('pages.inbox.index', $data);


    //     $moduleList = Module::get();
    // $modulewiseList = ModuleWiseCourse::get();
    //     $batchList = Batch::get();
    //    // $subjectList = Subject::get();
    //     $subjectList = participant::get();
  
    }
    public function EditNote($id)
    {   
        $data['module']=DB::table('modules')
        ->select('modules.id','modules.name','modules.month','modules.batch_id','batches.name as filename','module_wise_courses.remarks','participants.name as approval_name')
        ->join('module_wise_courses', 'modules.id', '=', 'module_wise_courses.module_id')
        ->join('batches', 'modules.batch_id', '=', 'batches.id')
        ->join('participants', 'module_wise_courses.subject_id', '=', 'participants.id')
        ->where('modules.id','=', $id)
        ->where('module_wise_courses.subject_id','!=', auth()->user()->id)
        ->first();
        // print_r($data['module']);
       // exit;

       $data1['remarklsit']=DB::table('module_wise_courses')
       ->select('module_wise_courses.subject_id','participants.name','module_wise_courses.remarks')
       ->join('participants', 'module_wise_courses.subject_id', '=', 'participants.id')
       ->where('module_wise_courses.module_id','=', $id)
       ->get();
       // print_r($data1['remarklsit']);
       // exit;
        return view('pages.inbox.edit', $data,$data1);



    }
    public function update(Request $request, $id)
    {
        //$module = ModuleWiseCourse::find($request->module_id);
    
        $module = ModuleWiseCourse::where('module_id','=',$id)
       ->where('subject_id','=',auth()->user()->id)
       ->first();

       //$module = ModuleWiseCourse::find(62);
        $module->flag = 1;
        $module->remarks = $request->remarks;
        $module->save();
        return Redirect()->route('inbox.index')->with('success','Forwarded.');
        
    }

}
