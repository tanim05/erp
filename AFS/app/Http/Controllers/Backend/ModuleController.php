<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Models\Batch;
use App\Models\Module;
use App\Models\ModuleWiseCourse;
use App\Models\Subject;
use App\Models\participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moduleList = Module::get();
        $modulewiseList = ModuleWiseCourse::get();
        $batchList = Batch::get();
       // $subjectList = Subject::get();
        $subjectList = participant::get();
        return view('pages.module.index', compact('moduleList', 'modulewiseList','batchList', 'subjectList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $module = new Module();
        $module->name = $request->module_name;
        $module->batch_id = $request->batch;
        $module->month = $request->month;
        $module->save();
        
           
        // $i = 0;
        for ($i = 0; $i < sizeof($request->subject); $i++) {
            $subject = new ModuleWiseCourse();
            $subject->module_id = $module->id;
            $subject->subject_id = $request->subject[$i];
           // $subject->subject_name = $request->subject[$i];
            $subject->save();
        }


        $request->validate(['file' => 'required|mimes:csv,jpg,txt,xlx,xls,pdf|max:2048' ]);
        if($request->file()) {
           
            $module->name = $request->module_name;
            $module->batch_id = $request->batch;
            $module->month = $request->month;
            $fileName = time().'_'.$request->file->getClientOriginalName();
            // $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $filePath = $request->file('file')->move(public_path('images'), $fileName);
            $module->file_name = time().'_'.$request->file->getClientOriginalName();
            // $module->file_path = '/storage/' . $filePath;
            $module->file_path = $filePath;
            $module->save();            
        }
        return back()->with('success','Data has been saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $module = Module::find($id);
        $module->name = $request->module_name;
        // $module->subject_id = $request->subject_id;
        $module->month = $request->module_description;
        $module->save();
        return back()->with('success','Data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $module = Module::find($id);
        if (!is_null($module)) {
            foreach ($module->subjects as $subject) {
                $subject->delete();
            }
            $module->delete();
        }
        return back()->with('success','Data has been deleted.');
    }

    public function approve($id)
    {   
        $data['approvallist']=DB::table('module_wise_courses')
        ->select('module_wise_courses.module_id','module_wise_courses.subject_id','participants.name')
        ->join('participants', 'module_wise_courses.subject_id', '=', 'participants.id')
        ->where('module_wise_courses.module_id','=', $id)
        ->get();
        //print_r($data['approvallist']);
        //exit;
       return view('pages.module.edit', $data);


    }

    public function close()
    {   
        return Redirect()->route('module.index');

    }
}
