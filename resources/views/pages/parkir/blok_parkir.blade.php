@extends('layouts.app')
@section('content')
         
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Weekly Top Products -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Daftar Blok Parkir</h2>
                        <a href="javascript:;" data-toggle="modal" data-target="#add-data" class="button inline-block bg-theme-1 text-white">Tambah Blok Parkir</a>
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
                                 <!--    <th class="text-center whitespace-nowrap">Tanggal</th>
                                    <th class="text-center whitespace-nowrap">Nama Bon-Kas</th> -->
                                    <th class="text-center whitespace-nowrap">Nama Blok Parkir</th>
                                    <th class="text-center whitespace-nowrap">Lantai</th>
                                   <!--  <th class="text-center whitespace-nowrap">Nominal</th>
                                    <th class="text-center whitespace-nowrap">Keterangan</th> -->
                                    <th class="text-center whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blok as $index => $item)
                                    <tr class="intro-x">
                                        <td class="w-40">
                                        {{ $index + 1}}
                                        </td>
                                        <td class="text-center">
                                            <a href="" class="font-medium whitespace-nowrap">{{ $item->nama }}</a>
                                        </td>
                                        <td class="text-center">
                                            <a href="" class="font-medium whitespace-nowrap">{{ $item->lantai->nama }}</a>
                                        </td>
                                        <td class="table-report__action w-50">
                                            <div class="flex justify-center items-center">
                                            
                                                <a class="flex items-center mr-2 bon-kas-edit" href="javascript:void(0)" data-toggle="modal" 
                                                data-target="#edit-data{{ $item->id }}"
                                                >
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit 
                                                </a>
                                                <a class="flex items-center text-theme-6" href="/delete-blok-parkir/{{$item->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');">
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
      <h2 class="font-medium text-base mr-auto">Tambah Blok Parkir</h2>
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
           <div class="col-span-12 sm:col-span-6 p-5">
             <label>Pilih Lantai</label>
              <select id="lantai_id" name="lantai_id" class="input w-full border mt-2 flex-1">
                @forelse($lantai as $index => $lantaiz)
               <option value="{{$lantaiz->id}}">{{$lantaiz->nama}}</option>
                @empty
                @endforelse
              </select>
            </div>

        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
            <div class="col-span-12 sm:col-span-6">
              <label>Nama Blok Parkir</label>
               <input type="text" name="nama" class="input w-full border mt-2 flex-1">
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
@foreach ($blok as $index => $item2)

<form>
<div class="modal" id="edit-data{{ $item2->id }}">
    <div class="modal__content">
     <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
      <h2 class="font-medium text-base mr-auto">Edit Blok Parkir {{ $item2->id }}</h2>
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
            <div class="col-span-12 sm:col-span-6 p-5">
             <label>Pilih Lantai</label>
              <select id="edit_lantai_id{{$item2->id}}" name="edit_lantai_id{{$item2->id}}" class="input w-full border mt-2 flex-1">
                @forelse($lantai as $index => $lantais)
               <option value="{{$lantais->id}}">{{$lantais->nama}}</option>
                @empty
                @endforelse
              </select>
            </div>
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">

            <div class="col-span-12 sm:col-span-6">
              <label>Nama Blok Parkir</label>
               <input type="text" value="{{ $item2->nama }}" name="editnama{{$item2->id}}" class="input w-full border mt-2 flex-1">
               <input type="hidden" value="{{ $item2->id }}" name="block_id{{$item2->id}}" class="input w-full border mt-2 flex-1">
            </div>
        </div>
            <div class="px-5 py-3 text-right border-t border-gray-200">
             <button id="ubahbtn" onclick="ubahlantai(event,'{{$item2->id}}')" class="button w-20 bg-theme-1 text-white btn-submit">Send</button>
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
        var nama = $("input[name=nama]").val();
        var lantai_id = document.getElementById("lantai_id").selectedIndex + 1;

        $.ajax({

           type:'POST',

           url:"{{ url('add-blok-parkir') }}",

           data:{ "_token": "{{ csrf_token() }}",lantai_id:lantai_id,nama:nama,},

           success:function(data){

              $('#success-modal-preview').modal('show');
             window.location="{{ url('blok-parkir') }}";

           }

        });  

    });

});

function ubahlantai(e,ids) {
// alert('ubah');
        e.preventDefault();
        var block_id = $("input[name=block_id"+ids+"]").val();
        var editnama = $("input[name=editnama"+ids+"]").val();
        // var lantai_id = $("input[name=lantai_id"+ids+"]").selectedIndex + 1;
        var edit_lantai_id = document.getElementById("edit_lantai_id"+ids+"").selectedIndex + 1;

        // alert(block_id);
        $.ajax({

           type:'POST',

           url:"{{ url('update-blok-parkir/{block_id}') }}",

           data:{ "_token": "{{ csrf_token() }}",edit_lantai_id:edit_lantai_id,block_id:block_id,editnama:editnama},

           success:function(data){

              $('#success-modal-preview').modal('show');
             window.location="{{ url('blok-parkir') }}";

           }

        });  

    };


</script>
@endsection


