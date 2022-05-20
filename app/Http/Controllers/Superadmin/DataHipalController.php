<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\DharianIPAL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class DataHipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('superadmin.ipal.v_hipal');
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
        //
        $validator = Validator::make($request->all(), [
            'kc' => 'required',
            'kaka' => 'required',
            'kaks' => 'required',
            'jfab' => 'required',
            'jsab' => 'required',
            'kmb' => 'required',
            'jbb' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=>$validator->getMessageBag()
            ]);
        }else{

            $dhipal = New DharianIPAL();
            $dhipal->author = Auth::user()->id;
            $dhipal->kc = $request->input('kc');
            $dhipal->kaka = $request->input('kaka');
            $dhipal->kaks = $request->input('kaks');
            $dhipal->jfab = $request->input('jfab');
            $dhipal->jsab = $request->input('jsab');
            $dhipal->kmb = $request->input('kmb');
            $dhipal->jbb = $request->input('jbb');

            if($request->hasFile('file')){
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move('files/dhipals/', $filename);
                $dhipal->file = $filename;
            }

            $dhipal->save();

            return response()->json([
                'status'=> 200,
            ]);
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
    public function dataDhipal(Request $request){
        
        $galleri = DharianIPAL::orderBy('created_at','DESC')->get();
        if($request->ajax()){
            return datatables()->of($galleri)
                ->addColumn('action',  function($data){
                    $button  = '<button type="button" name="show" value="'.$data->id.'" class="showgaleri btn btn-info btn-sm"><i class="far fa-eye"></i> </button>';     
                    $button .= '&nbsp;&nbsp;';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }
}
