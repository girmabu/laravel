<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\descriptions;

class DescriptionController extends Controller
{
    public function _Construct()
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
        $arr['A'] = descriptions::all();
        return view('admin.description.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.description.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, descriptions $descriptions)
    {
        $descriptions->title = $request->title;
        $descriptions->remark = $request->remark;
        $descriptions->save();
        return redirect('admin/description');
        // echo $request->title;
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


        $id = descriptions::find($id);
       
        // return redirect()->route('admin.description.edit')->with($arr);
        return view('admin/description/edit')->with('description',$id);
        // return view ('admin.description.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $description)
    {
        $this->validate($request, [
            'title'   => 'required',
            'remark' => 'required',
        ]);

        descriptions::find($id)->update($request->all());

        $description->title = $request->title;
        $description->remark = $request->remark;
        $description->save();
        return redirect()->route('admin/description/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        descriptions::destroy($id);
        return redirect()->route('admin/description');

    }
}
