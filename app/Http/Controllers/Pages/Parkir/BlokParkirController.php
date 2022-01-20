<?php

namespace App\Http\Controllers\Pages\Parkir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BlokParkir;
use App\Model\LantaiParkir;
class BlokParkirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $blok = BlokParkir::with('lantai')->get();
         // dd($blok);
         $lantai = LantaiParkir::all();
         return view('pages.parkir.blok_parkir' ,[
            'blok' => $blok,
            'lantai' => $lantai,
            'title' => 'Blok Parkir'
        ]);
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
          BlokParkir::where('nama','!=', $request->nama)->where('lantai_id','!=', $request->lantai_id)->create([
            'nama' => $request->nama,
            'lantai_id' => $request->lantai_id,
        ]);
        return response()->json(['success' => true]);
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

        // dd($request->block_id);
        BlokParkir::where('id', $request->block_id)->update([
            'nama' => $request->editnama,
            'lantai_id' => $request->edit_lantai_id,
        ]);
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = BlokParkir::where('id',$id);
        $data->delete();
        return redirect('blok-parkir');
    }
}
