<?php

namespace App\Http\Controllers\admin;

use App\Admin\InstituteType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstituteTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = InstituteType::all();
        //echo '<pre>'; print_r($datas); echo '</pre>';exit;
        return view('admin.institute_type.view', ['datas'=>$datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.institute_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required'
        ]);
        $insert_data = new InstituteType;
        $insert_data->name = $request->name;
        $insert_data->code = $request->code;
        $insert_data->status = $request->status;
        $insert_data->created_by = Auth::user()->id;
        $insert_data->updated_by = Auth::user()->id;
        // dd($payment_type); exit;
        if( $insert_data->save() ){
            return redirect()->route('admin.institute_type.create')->with('success', 'Data Added successfully.');
        }else{
            return redirect()->route('admin.institute_type.create')->with('Warning', 'DB error.');
        }
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
        $detail = InstituteType::find($id);
        //echo '<pre>'; print_r($detail); echo '</pre>'; exit;
        return view('admin.institute_type.edit', ['detail'=>$detail]);
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
        $update_data = InstituteType::find($id);
        $request->validate([
            'name' => 'required',
            'code' => 'required'
        ]);
        $update_data->name = $request->name;
        $update_data->code = $request->code;
        $update_data->status = $request->status;
        $update_data->created_by = $update_data->created_by;
        $update_data->updated_by = Auth::user()->id;
        //dd($payment_type); exit;   
        if( $update_data->save() ){
            return redirect()->route('admin.institute_type.edit', $id)->with('success', 'Data Added successfully.');
        }else{
            return redirect()->route('admin.institute_type.edit', $id)->with('Warning', 'DB error.');
        }
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
