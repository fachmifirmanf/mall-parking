@extends('layouts.app')
@section('content')


         
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Weekly Top Products -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Daftar Jenis Kendaraan</h2>
                        <a href="javascript:;" data-toggle="modal" data-target="#add-data" class="button inline-block bg-theme-1 text-white">Tambah Jenis Kendaraan</a>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                             <div class="modal" id="success-modal-preview">
                                 <div class="modal__content">
                                     <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                                         <div class="text-3xl mt-5">Data Berhasil Disimpan</div>
                                         <!-- <div class="text-gray-600 mt-2">Data Berhasil Disimpan</div> -->
                                    </div>
                                    <div class="px-5 pb-8 text-center"> </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">No</th>
                                    
                                    <th class="text-center whitespace-nowrap">Nama Petugas</th>
                                    <th class="text-center whitespace-nowrap">Username</th>
                                    <th class="text-center whitespace-nowrap">Password</th>
                                    <th class="text-center whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $index => $item)
                                    <tr class="intro-x">
                                        <td class="w-40">
                                        {{ $index + 1}}
                                        </td>
                                        <td class="text-center">
                                            <a href="" class="font-medium whitespace-nowrap">{{ $item->name }}</a>
                                        </td>
                                        <td class="text-center">
                                            <a href="" class="font-medium whitespace-nowrap">{{ $item->username }}</a>
                                        </td>
                                        <td class="text-center">
                                            <a href="" class="font-medium whitespace-nowrap">********</a>
                                        </td>
                                        <td class="table-report__action w-50">
                                            <div class="flex justify-center items-center">
                                            
                                                <a class="flex items-center mr-2 bon-kas-edit" href="javascript:void(0)" data-toggle="modal" 
                                                data-target="#edit-data{{ $item->id }}"
                                                >
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit 
                                                </a>
                                                <a class="flex items-center text-theme-6" href="/delete-list-user/{{$item->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-3">
                        <div class="pagination">
                        </div>
                    </div>
                </div>
                <!-- END: Weekly Top Products -->
            </div>
        </div>
    </div>
<!-- BEGIN: Modal List Kluters -->
<form>
<div class="modal" id="add-data">
    <div class="modal__content">
     <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
      <h2 class="font-medium text-base mr-auto">Tambah User Petugas</h2>
<!--        <button class="button border items-center text-gray-700 hidden sm:flex">
        <i data-feather="file" class="w-4 h-4 mr-2"></i>
         Download Docs
         </button> -->
          <div class="dropdown relative sm:hidden">
           <a class="dropdown-toggle w-5 h-5 block" href="javascript:;">
            <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i>
             </a>
              <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
               <div class="dropdown-box__content box p-2">
              </div> 
             </div> 
            </div> 
     </div> 
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
            <div class="col-span-12 sm:col-span-6">
              <label>Nama</label>
               <input type="text" value="" name="name" class="input w-full border mt-2 flex-1">
            </div>
            <div class="col-span-12 sm:col-span-6">
              <label>Username</label>
               <input type="text" value="" name="username" class="input w-full border mt-2 flex-1">
            </div>
            <div class="col-span-12 sm:col-span-6">
              <label>Password</label>
               <input type="text" value="" name="password" class="input w-full border mt-2 flex-1">
            </div>
        </div>
            <div class="px-5 py-3 text-right border-t border-gray-200">
             <button id="addbtn" class="button w-20 bg-theme-1 text-white btn-submit">Send</button>
            </div>
    </div>
</div> 
</form>
<!-- END: Modal List Kluters -->
<!-- BEGIN: Modal List Kluters -->
@foreach ($user as $index => $item2)

<form>
<div class="modal" id="edit-data{{ $item2->id }}">
    <div class="modal__content">
     <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
      <h2 class="font-medium text-base mr-auto">Edit User Petugas {{ $index + 1 }}</h2>
<!--        <button class="button border items-center text-gray-700 hidden sm:flex">
        <i data-feather="file" class="w-4 h-4 mr-2"></i>
         Download Docs
         </button> -->
          <div class="dropdown relative sm:hidden">
           <a class="dropdown-toggle w-5 h-5 block" href="javascript:;">
            <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i>
             </a>
              <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
               <div class="dropdown-box__content box p-2">
              </div> 
             </div> 
            </div> 
     </div> 
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
            <div class="col-span-12 sm:col-span-6">
              <label>Nama</label>
               <input type="text" value="{{ $item2->name }}" name="name{{ $item2->id }}" class="input w-full border mt-2 flex-1">
            </div>
            <div class="col-span-12 sm:col-span-6">
              <label>Username</label>
               <input type="text" value="{{ $item2->username }}" name="username{{ $item2->id }}" class="input w-full border mt-2 flex-1">
            </div>
            <div class="col-span-12 sm:col-span-6">
              <label>Password</label>
               <input type="text" value="" name="password{{ $item2->id }}" class="input w-full border mt-2 flex-1">
            </div>
             <input type="hidden" value="{{ $item2->id }}" name="id_user{{$item2->id}}" class="input w-full border mt-2 flex-1">
        </div>
            <div class="px-5 py-3 text-right border-t border-gray-200">
             <button id="ubahbtn" onclick="ubahuser(event,'{{$item2->id}}')" class="button w-20 bg-theme-1 text-white btn-submit">Send</button>
            </div>
    </div>
</div> 

</form>
@endforeach

<!-- END: Modal List Kluters -->

<script type="text/javascript">
 
$(document).ready(function(){ 
    $("#addbtn").click(function(e){

        e.preventDefault();
        var name = $("input[name=name]").val();
        var username = $("input[name=username]").val();
        var password = $("input[name=password]").val();
// alert(name);
        $.ajax({

           type:'POST',

           url:"{{ url('add-list-user') }}",

            data:{ "_token": "{{ csrf_token() }}",name:name,username:username,password:password},

           success:function(data){

              $('#success-modal-preview').modal('show');
             window.location="{{ url('list-user') }}";

           }

        });  

    });

});

function ubahuser(e,ids) {
        e.preventDefault();
        var name = $("input[name=name"+ids+"]").val();
        var username = $("input[name=username"+ids+"]").val();
        var password = $("input[name=password"+ids+"]").val();
        var id_user = $("input[name=id_user"+ids+"]").val();

        // alert(name);
        $.ajax({

           type:'POST',

           url:"{{ url('update-list-user/{id_user}') }}",

           data:{ "_token": "{{ csrf_token() }}",id:ids,name:name,username:username,password:password},

           success:function(data){

              $('#success-modal-preview').modal('show');
             window.location="{{ url('list-user') }}";

           }

        });  

    };


</script>
@endsection


