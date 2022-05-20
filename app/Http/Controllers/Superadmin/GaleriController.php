<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('superadmin.galeri.v_galeri');
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
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,|max:2048'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=>$validator->getMessageBag()
            ]);
        }else{
            $auto_kode = Gallery::max('id_file');
            $urutan = (int) substr($auto_kode, 4,4);
            $urutan++;
            $huruf = "GL";
            $auto_kode = $huruf . sprintf("%05s", $urutan);

            $galeri = New Gallery();
            $galeri->author = Auth::user()->id;
            $galeri->id_file = $auto_kode;
            $galeri->judul = $request->input('judul');
            $galeri->deskripsi = $request->input('deskripsi');
            $http = ('http://');
            if($galeri->link = $request->input('link') == null){
                $galeri->link = $http;
            }else{
                $galeri->link = $request->input('link');
            }

            if($galeri->liveyt = $request->input('liveyt') == null){
                $galeri->liveyt = $http;
            }else{
                $galeri->liveyt = $request->input('liveyt');
            }

            if($request->hasFile('file')){
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move('files/images/galeri', $filename);
                $galeri->file = $filename;
            }

            $galeri->save();

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
        $gl = Gallery::find($id);
        if($gl)
        {
            return response()->json([
                'status'=> 200,
                'galeri'=>$gl
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
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=>$validator->getMessageBag()
            ]);
        }else{

            $galeri = Gallery::find($id);
            $galeri->author = Auth::user()->id;
            $galeri->id_file = $request->input('id_file');
            $galeri->judul = $request->input('judul');
            $galeri->deskripsi = $request->input('deskripsi');
            $http = ('http://');
            if($galeri->link = $request->input('link') == null){
                $galeri->link = $http;
            }else{
                $galeri->link = $request->input('link');
            }

            if($galeri->liveyt = $request->input('liveyt') == null){
                $galeri->liveyt = $http;
            }else{
                $galeri->liveyt = $request->input('liveyt');
            }

            if($request->hasFile('file')){
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move('files/images/galeri', $filename);
                $galeri->file = $filename;
            }

            $galeri->save();

            return response()->json([
                'status'=> 200,
            ]);
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

        $del = Gallery::find($id);
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

    public function dataGaleri(Request $request){
        
        $galleri = Gallery::orderBy('created_at','DESC')->get();
        if($request->ajax()){
            return datatables()->of($galleri)
                ->addColumn('action',  function($data){
                    $button  = '<button type="button" name="show" value="'.$data->id.'" class="showgaleri btn btn-info btn-sm"><i class="far fa-eye"></i> </button>';     
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="edit" value="'.$data->id.'" class="editgaleri btn btn-warning btn-sm"><i class="far fa-edit"></i> </button>';     
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" value="'.$data->id.'" class="deletegaleri btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> </button>';     
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }
}
