<?php

namespace App\Http\Controllers\Pages\Parkir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\LantaiParkir;
class LantaiParkirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $lantai = LantaiParkir::all();
         return view('pages.parkir.lantai_parkir' ,[
            'lantai' => $lantai,
            'title' => 'Zona Parkir'
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
        // dd($request->nama);

        LantaiParkir::where('nama','!=', $request->nama)->create([
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
        // dd($id);
        // dd($request->nama);
      
        LantaiParkir::where('id', $request->id_lantai)->update([
            'nama' => $request->editnama,
        ]);
        return response()->json(['success' => true]);
    }
    public function update_lantai(Request $request)
    {
        // code...
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = LantaiParkir::where('id',$id);
        $data->delete();
        return redirect('lantai-parkir');
    }
}
