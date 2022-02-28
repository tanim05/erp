<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Http\Request;
use App\Models\Intake;
use App\Models\User;
class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
       
        $intakes = Intake::get();
        return view('pages.participant.index', compact('intakes'));
      //  return view('pages.participant.index');
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
        //dd($request);
        $participant = new Participant();
        $participant->name = $request->name;
        $participant->email = $request->email;
        // $participant->father_name = $request->fname;
        // $participant->mother_name = $request->mname;
        $participant->phone_no = $request->phone_no;
        $participant->intake_id = $request->intake_id;
        $participant->desig_id = $request->desig_id;
        $participant->password=bcrypt($request->password);
        $participant->role = $request->type_id;
        // $participant->gender = '$request->gender';
        // $participant->country = '$request->country';
        // $participant->present_vill = $request->pre_vill;
        // $participant->present_post = $request->pre_po;
        // $participant->present_post_number = $request->pre_po_number;
        // $participant->present_upazilla = $request->pre_ps;
        // $participant->present_district = $request->pre_dist;
        // $participant->permanent_vill = $request->per_vill;
        // $participant->permanent_post = $request->per_po;
        // $participant->permanent_post_number = $request->per_po_number;
        // $participant->permanent_upazilla = $request->per_upazilla;
        // $participant->permanent_district = $request->per_district;
        

        $participant->save();

        $data=new user();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=bcrypt($request->password);
        $data->role=$request->type_id;
        $data->save();

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
