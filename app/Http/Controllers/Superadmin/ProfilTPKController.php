<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProfileTPK;

class ProfilTPKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        return view('superadmin.profiltpk.v_profiltpk');
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
    public function store(Request $request){
        
        // 
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:191',
            'luas' => 'required|max:191',
            'kedalaman' => 'required|max:191',
            'volume' => 'required|max:191',
            'debit' => 'required|max:191',
            'waktu' => 'required|max:191',
            'deskripsi' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,|max:2048'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=>$validator->getMessageBag()
            ]);
        }else{
            $auto_kode = ProfileTPK::max('kode');
            $urutan = (int) substr($auto_kode, 4,4);
            $urutan++;
            $huruf = "KL";
            $auto_kode = $huruf . sprintf("%05s", $urutan);

            $profiltpk = New ProfileTPK;
            $profiltpk->kode = $auto_kode;
            $profiltpk->nama = $request->input('nama');
            $profiltpk->luas = $request->input('luas');
            $profiltpk->kedalaman = $request->input('kedalaman');
            $profiltpk->volume = $request->input('volume');
            $profiltpk->debit = $request->input('debit');
            $profiltpk->waktu = $request->input('waktu');
            $profiltpk->deskripsi = $request->input('deskripsi');

            if($request->hasFile('file')){
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move('files/images/profiltpk', $filename);
                $profiltpk->file = $filename;
            }

            $profiltpk->save();

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
        $ab = ProfileTPK::find($id);
        if($ab)
        {
            return response()->json([
                'status'=> 200,
                'profil'=>$ab
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:191',
            'luas' => 'required|max:191',
            'kedalaman' => 'required|max:191',
            'volume' => 'required|max:191',
            'debit' => 'required|max:191',
            'waktu' => 'required|max:191',
            'deskripsi' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=>$validator->getMessageBag()
            ]);
        }else{

            $profiltpk = ProfileTPK::find($id);

            if($profiltpk){

            $profiltpk->kode = $request->input('kode');
            $profiltpk->nama = $request->input('nama');
            $profiltpk->luas = $request->input('luas');
            $profiltpk->kedalaman = $request->input('kedalaman');
            $profiltpk->volume = $request->input('volume');
            $profiltpk->debit = $request->input('debit');
            $profiltpk->waktu = $request->input('waktu');
            $profiltpk->deskripsi = $request->input('deskripsi');

            if($request->hasFile('file')){                

                $path = 'files/images/profiltpk/'.$profiltpk->file;
               
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move('files/images/profiltpk', $filename);
                $profiltpk->file = $filename;
            }

            $profiltpk->save();

            return response()->json([
                'status'=> 200,
            ]);

            }else{
                return response()->json([
                    'status'=> 400,
                    'errors'=>$profiltpk->getMessageBag()
                ]);

            }
            
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
        $del = ProfileTPK::find($id);
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

    public function dataTable(Request $request)
    {
        $profil = ProfileTPK::all();
        if($request->ajax()){
            return datatables()->of($profil)
                ->addColumn('action', function($data){
                    $button  = '<button type="button" name="show" value="'.$data->id.'" class="showprofiltpk btn btn-info btn-sm"><i class="far fa-eye"></i> </button>';     
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="edit" value="'.$data->id.'" class="editprofiltpk btn btn-warning btn-sm"><i class="far fa-edit"></i> </button>';     
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" value="'.$data->id.'" class="deleteprofiltpk btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> </button>';     
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
            
    }
    
}
