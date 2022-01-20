<?php

namespace App\Http\Controllers\Pages\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BlokParkir;
use App\Model\LantaiParkir;
use App\Model\JenisKendaraan;
use App\Model\Kendaraan;
use App\Model\Parkir;
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
         $lantai = LantaiParkir::all();
         $jenis_kendaraan = JenisKendaraan::all();
         $parkir = Parkir::all();

         return view('pages.petugas.index' ,[
            'blok' => $blok,
            'lantai' => $lantai,
            'parkir' => $parkir,
            'jenis_kendaraan' => $jenis_kendaraan,
            'title' => 'Blok Parkir'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datablock(Request $request)
    {
         $blok = BlokParkir::with(['lantai','parkir'])->where('lantai_id',$request->lantai_id)->get();
         // dd($blok);
         return response()->json(['return' => $blok]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kendaraan::where('plat_nomor','!=', $request->plat)->where('id_jenis_kendaraan','!=',$request->jenis_kendaraan)->create([
            'plat_nomor' => $request->plat,
            'id_jenis_kendaraan' => $request->jenis_kendaraan,
        ]);
          $id_kendaraan = Kendaraan::where('plat_nomor',$request->plat)->where('id_jenis_kendaraan',$request->jenis_kendaraan)->first();


        Parkir::where('blok_parkir_id','!=',$request->blok)->where('kendaraan_id','!=',$id_kendaraan->id)->create([
            'blok_parkir_id' => $request->blok,
            'kendaraan_id' => $id_kendaraan->id,
            'status' => 1,
        ]);
        // ['id','blok_parkir_id','kendaraan_id','status'];
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
