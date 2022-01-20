<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
        $soal = DB::table('soals')
        // ->join('jawaban_soals','jawaban_soals.id','soals.kunci_jawaban')
        // ->join('list_soals','list_soals.soal_id','soals.id')
        // ->join('klusters','klusters.id','list_soals.kluster_id')
        // ->orderBy('type')
        ->get();
       $jawab = DB::table('jawaban_soals')
        // ->join('jawaban_soals','jawaban_soals.id','soals.kunci_jawaban')
        // ->join('list_soals','list_soals.soal_id','soals.id')
        // ->join('klusters','klusters.id','list_soals.kluster_id')
        // ->orderBy('type')
        ->get();
        // dd($jawab);
        $kluster = DB::table('klusters')
        // ->join('klusters','klusters.id','list_soals.kluster_id')
        // ->join('soals','soals.id','list_soals.soal_id')
        ->orderBy('type')
        ->get();
         return view('pages.admin.soal',['kluster' => $kluster,'soal' => $soal,'jawab' => $jawab,'title' => 'Soal']);
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

        // dd($request->id_kluster);

        for ($i=0; $i <= count($request->soal); $i++) { 

        DB::table('soals')->insert([

        'soal' => $request->soal[$i],
        'kunci_jawaban' => $request->jawaban_benar[$i],
        'skor' => $request->skor[$i],

     ]);   

        $soal_id = DB::table('soals')->where('soal',$request->soal[$i])->first();


          $add = [
                'jawaban0' => $request->jawaban_benar[$i],
                'jawaban1' => $request->jawaban_salah1[$i],
                'jawaban2' => $request->jawaban_salah2[$i],
                'jawaban3' => $request->jawaban_salah3[$i],
                'jawaban4' => $request->jawaban_salah4[$i],
                'jawaban5' => $request->jawaban_salah5[$i],

            ];
       
        foreach ($add as $key => $value) {

                DB::table('jawaban_soals')->insert([
                'soal_id' => $soal_id->id,
                'jawaban' => $value,

            ]);

        }

        $jawaban = DB::table('jawaban_soals')->where('jawaban',$request->jawaban_benar[$i])->first();


       DB::table('soals')->where('kunci_jawaban',$request->jawaban_benar[$i])->update([

        'kunci_jawaban' => $jawaban->id,

     ]);
            
        DB::table('list_soals')->insert([
                'soal_id' => $soal_id->id,
                'kluster_id' => $request->id_kluster,

            ]);

        }

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
        // dd($request);
          DB::table('soals')->where('id',$request->id_soal)->update([

        'kunci_jawaban' => $request->id_jawaban_benar,
        'soal' => $request->soal,
        'skor' => $request->skor,

     ]);

        DB::table('jawaban_soals')->where('id',$request->id_jawaban_benar)->update([
        'jawaban' => $request->jawaban_benar,
        'soal_id' => $request->id_soal,
     ]);

 
            $req_jawaban = [
                0 => $request->jawaban_salah1,
                1 => $request->jawaban_salah2,
                2 => $request->jawaban_salah3,
                3 => $request->jawaban_salah4,
                4 => $request->jawaban_salah5,
            ];
            $req_id_jawaban = [
                0 => $request->id_jawaban_salah1,
                1 => $request->id_jawaban_salah2,
                2 => $request->id_jawaban_salah3,
                3 => $request->id_jawaban_salah4,
                4 => $request->id_jawaban_salah5,
            ];


        for ($i=0; $i < 5; $i++) { 
             DB::table('jawaban_soals')->where('id',$req_id_jawaban[$i])->update([
                        'jawaban' => $req_jawaban[$i],
                        'soal_id' => $request->id_soal,

                    ]);
        }
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
