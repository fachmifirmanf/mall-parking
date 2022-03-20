<?php

namespace App\Http\Controllers\Pages\Pengunjung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BlokParkir;
use App\Model\LantaiParkir;
use App\Model\JenisKendaraan;
use App\Model\Kendaraan;
use App\Model\Parkir;
use App\Model\Role;
use DB;
use PDF;
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
         $lantai = DB::table('blok_parkirs')
        // ->leftJoin('parkirs', 'parkirs.blok_parkir_id', '=', 'blok_parkirs.id')
        ->leftJoin('lantai_parkirs', 'blok_parkirs.lantai_id', '=', 'lantai_parkirs.id')
        ->select('blok_parkirs.*','lantai_parkirs.id as lantai_parkirs_id','lantai_parkirs.nama as lantai_parkirs_nama',DB::raw('COUNT(blok_parkirs.id) as id_blok_count'))
        // ->where('parkirs.hapus',0)
        ->orderBy('lantai_parkirs_id', 'asc')
        ->groupBy('lantai_parkirs_id')
        ->get();
        // dd($lantai);
         $jenis_kendaraan = JenisKendaraan::all();
         $parkir = Parkir::where('hapus',0)->get();

         return view('pages.pengunjung.index' ,[
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
         $blok = BlokParkir::with(['lantai','parkir'])->get();

   // $blok = DB::table('blok_parkirs')
   //      ->leftJoin('parkirs', 'parkirs.blok_parkir_id', '=', 'blok_parkirs.id')
   //      ->leftJoin('lantai_parkirs', 'blok_parkirs.lantai_id', '=', 'lantai_parkirs.id')
   //      ->select('parkirs.id as parkir_id','parkirs.status as parkir_status','parkirs.hapus' , 'blok_parkirs.*','lantai_parkirs.id as lantai_parkirs_id','lantai_parkirs.nama as lantai_parkirs_nama')
   //      ->where('parkirs.hapus',0)
   //      ->orderBy('parkir_status', 'asc')
   //      ->get();
        
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
           $waktu_keluar = date("Y-m-d H:i:s");
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
         // session()->regenerate();
        // ['id','blok_parkir_id','kendaraan_id','status'];
               return response()->json(['success' => true]);
        // return redirect('blok-parkir-petugas');

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

    public function pdf($id)
    { 
       
       $parkir = Parkir::where('id',$id)->get();
       $judul = DB::table('parkirs')
        ->leftJoin('kendaraans', 'parkirs.kendaraan_id', '=', 'kendaraans.id')
        ->leftJoin('blok_parkirs', 'parkirs.blok_parkir_id', '=', 'blok_parkirs.id')
        ->leftJoin('lantai_parkirs', 'blok_parkirs.lantai_id', '=', 'lantai_parkirs.id')
        ->select('kendaraans.*', 'parkirs.*' , 'blok_parkirs.nama as nama_blok','lantai_parkirs.nama as nama_lantai')
        ->where('parkirs.id',$id)
        ->first();
       // dd($judul->created_at .' - ' . $judul->plat_nomor .' - '. $judul->nama_lantai .' ( '.   $judul->nama_blok . ' ) ');
       $pdf = PDF::loadView('pages.petugas.pdf', [
                'parkir' => $parkir,
                  'title' => 'Blok Parkir'
        ])->setPaper('a4');
          // download PDF file with download method
          return $pdf->stream($judul->created_at .' - ' . $judul->plat_nomor .' - '. $judul->nama_lantai .' ( '.   $judul->nama_blok . ' ) ' . '.pdf');

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function index_monitor(Request $request)
    {    
    
        $cari = $request->cari;
        if ($cari ==null) {
                    $parkir = Parkir::with(['kendaraan','blok','blok.lantai'])->get();

        }
        else{
              $parkir = Parkir::with(['kendaraan','blok','blok.lantai'])->where('id',$cari)->get();
        }
          


          return view('pages.pengunjung.monitor' ,[
            'title' => 'Monitoring Parkir',
            'parkir' => $parkir,
        ]);
    }
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_monitor(Request $request)
    {
         // dd($request->id);
        $waktu_keluar = date("Y-m-d H:i:s");
        // dd($waktu_keluar);
         Parkir::where('id', $request->id)->update([

            'status' => 0,
            'hapus' => 1,
            'updated_at' => $waktu_keluar,
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
        //
    }
}
