<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $all = Artikel::count();
        $draft = Artikel::where('status','draft')->count();
        $publish = Artikel::where('status','publish')->count();
        $pending = Artikel::where('status','pending')->count();
        return view('superadmin.artikel.v_artikel')->with(compact('all','draft','publish','pending'));
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
            'judul' => 'required|max:191',
            'kategori' => 'required|max:191',
            'konten' => 'required',
            'status' => 'required|max:191',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,|max:2048'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=>$validator->getMessageBag()
            ]);
        }else{

            $artikel = New Artikel;
            $artikel->author = Auth::user()->id;
            $artikel->judul = $request->input('judul');
            $artikel->kategori = $request->input('kategori');
            $artikel->konten = $request->input('konten');
            $artikel->status = $request->input('status');

            if($request->hasFile('thumbnail')){
                $file = $request->file('thumbnail');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move('files/images/artikel', $filename);
                $artikel->thumbnail = $filename;
            }

            $artikel->save();

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
        $ar = Artikel::find($id);
        if($ar)
        {
            return response()->json([
                'status'=> 200,
                'artikel'=>$ar
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
            'judul' => 'required|max:191',
            'kategori' => 'required|max:191',
            'konten' => 'required',
            'status' => 'required|max:191',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=>$validator->getMessageBag()
            ]);
        }else{

            $artikel = Artikel::find($id);
            $artikel->author = Auth::user()->id;
            $artikel->judul = $request->input('judul');
            $artikel->kategori = $request->input('kategori');
            $artikel->konten = $request->input('konten');
            $artikel->status = $request->input('status');

            if($request->hasFile('thumbnail')){
                $file = $request->file('thumbnail');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move('files/images/artikel', $filename);
                $artikel->thumbnail = $filename;
            }

            $artikel->save();

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
        $del = Artikel::find($id);
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

    public function tambahArtikel(){

        return view('superadmin.artikel.t_artikel');
    }

    public function dataArtikel(Request $request){
        
        $artikel = Artikel::orderBy('created_at','DESC')->get();
        if($request->ajax()){
            return datatables()->of($artikel)
                ->addColumn('action',  function($data){
                    $button  = '<button type="button" name="edit" value="'.$data->id.'" class="editartikel btn btn-warning btn-sm"><i class="far fa-edit"></i> </button>';     
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" value="'.$data->id.'" class="deleteartikel btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> </button>';     
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }
}
