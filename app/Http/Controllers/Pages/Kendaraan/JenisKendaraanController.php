<?php

namespace App\Http\Controllers\Pages\Kendaraan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\JenisKendaraan;

class JenisKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $jenis_kendaraan = JenisKendaraan::all();
         return view('pages.kendaraan.jenis_kendaraan' ,[
            'jenis_kendaraan' => $jenis_kendaraan,
            'title' => 'Jenis Kendaraan'
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
         JenisKendaraan::where('nama','!=', $request->nama)->create([
            'nama' => $request->nama,
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
            JenisKendaraan::where('id', $request->id_jenis_kendaraan)->update([
            'nama' => $request->editnama,
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
             $data = JenisKendaraan::where('id',$id);
        $data->delete();
        return redirect('jenis_kendaraan');
    }
}
