<?php

namespace App\Http\Controllers\Pages\Akun;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('role',2)->get();
          return view('pages.list_user.index' ,[
            'title' => 'Daftar Petugas',
            'user' => $user
        ]);
    }

    public function changepassword()
    {
         return view('pages.ganti-sandi.index' ,[
                'title' => 'Ganti Kata Sandi'
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
    if(User::where('name','!=',$request->name)->where('username','!=',$request->username)->exists()) {
           // dd($request->password); 
            User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 2,
        ]);
                   return response()->json(['success' => true]);


        }
    else{
                 return response()->json(['success' => false]);

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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatechangepassword(Request $request, $id)
    {
        // dd($request->password);
           User::where('id',$id)->update([

            'password' => Hash::make($request->password),
        ]);
           return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        // dd($id);
      
         User::where('id',$request->id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 2,

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
        $data = User::where('id',$id);
        $data->delete();
        return redirect('list-user');
    }
}
