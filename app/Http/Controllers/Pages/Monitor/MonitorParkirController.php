<?php

namespace App\Http\Controllers\Pages\Monitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Parkir;

class MonitorParkirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.monitor.index' ,[
            'title' => 'Monitoring Parkir'
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
    public function dataparkir()
    {
         $parkir = Parkir::with(['kendaraan','blok','blok.lantai'])->get();

         return response()->json(['return' => $parkir]);
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
