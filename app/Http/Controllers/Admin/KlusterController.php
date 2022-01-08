<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class KlusterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $soal = DB::table('list_soals')
        //         ->join('klusters','klusters.id','list_soals.kluster_id')
        //         ->join('soals','soals.id','list_soals.soal_id')
        //         ->get();

        $kluster = DB::table('klusters')
        // ->join('klusters','klusters.id','list_soals.kluster_id')
        // ->join('soals','soals.id','list_soals.soal_id')
        ->orderBy('type')
        ->get();
         return view('pages.admin.kluster',['kluster' => $kluster,'title' => 'Kluster']);
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
           DB::table('klusters')->insert([
        'nama_kluster' => $request->nama_kluster,
        'waktu_pengerjaan' => $request->waktu_pengerjaan,
        'type' => $request->tipe,
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
