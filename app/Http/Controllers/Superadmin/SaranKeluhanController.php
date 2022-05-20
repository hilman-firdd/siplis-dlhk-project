<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\SaranKeluhan;
use Illuminate\Http\Request;

class SaranKeluhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('superadmin.sarankeluhan.v_sarankeluhan');
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
        $sk = SaranKeluhan::find($id);
        if($sk)
        {
            return response()->json([
                'status'=> 200,
                'sarankeluhan'=>$sk
            ]);

        }else{
            return response()->json([
                'status'=> 400,
                'message'=>'Tidak Di Temukan'
            ]);
        }
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
        $del = SaranKeluhan::find($id);
        if($del)
        {   
            $del->delete();
            return response()->json([
                'status'=> 200,
                
            ]);

        }else{
            return response()->json([
                'status'=> 400,
                
            ]);
        }
    }

    public function DataSaranKeluhan(Request $request){
        $profil = SaranKeluhan::all();
        if($request->ajax()){
            return datatables()->of($profil)
                ->addColumn('action', function($data){
                    $button  = '<button type="button" name="show" value="'.$data->id.'" class="showsaran btn btn-info btn-sm"><i class="far fa-eye"></i> </button>';     
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" value="'.$data->id.'" class="deletesaran btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> </button>';     
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }
}
