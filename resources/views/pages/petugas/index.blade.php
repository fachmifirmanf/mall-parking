@extends('layouts.app')
@section('content')
            <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
                    <!-- BEGIN: Post Content -->

                    <div class="intro-y col-span-12 lg:col-span-8">

                                <div class="col-span-12 sm:col-span-6">
          
              
            </div>
            <div class="col-span-12 lg:col-span-4">
                        <div class="intro-y box p-5">
             <label>Pilih Lantai: </label>
              <select id="tipe-lantai" name="tipe-lantais"  class="input border">
                @forelse($lantai as $index => $lantai)
               <option onclick="pilih_lantai(event,'{{$lantai->id}}')" value="{{$lantai->id}}">{{$lantai->nama}}</option>
                @empty
                @endforelse
              </select>
          </div>
      </div>
                        <div class="post intro-y overflow-hidden box mt-5 p-5">
                        <table class="table table-report -mt-2">
    <thead>
        <tr>
            <th>
                
            </th>
        </tr>
    </thead>

    <tbody>
       

@forelse($blok as $key => $number)

 
        <tr id="data"  class="intro-x">
         

  </tr>

@empty
@endforelse
       
    </tbody>

</table>

                        </div>
                    </div>
                    <!-- END: GET Content -->
                    <!-- BEGIN: GET Info -->

                    <div class="col-span-12 lg:col-span-4">
                        <div class="intro-y box p-5">
                            <form>
                            <div>
                                <label>Written By : Nabil Tamami</label>
                            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                                <div class="col-span-12 sm:col-span-6">
                                    <label>Pilih Jenis Kendaraan </label>
                                    <select id="jenis_kendaraan" required name="jenis_kendaraan"  class="input border">
                                    @forelse($jenis_kendaraan as $index => $jenis_kendaraan)
                                       <option value="{{$jenis_kendaraan->id}}">{{$jenis_kendaraan->nama}}</option>
                                    @empty
                                    @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                                <div class="col-span-12 sm:col-span-6">
                                    <label>Blok</label>
                                    <input required id="block_id" type="hidden" name="block_id" class="input w-full border mt-2 flex-1">
                                     <input  disabled id="block_name" type="text" class="input w-full border mt-2 flex-1">
                                </div>
                            </div>
                            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                                <div class="col-span-12 sm:col-span-6">
                                    <label>Plat Nomor Kendaraan</label>
                                    <input required type="text" name="plat_nomor_kendaraan" class="input w-full border mt-2 flex-1">
                                </div>
                            </div>
                            <div class="px-5 py-3 text-right border-t border-gray-200">
                                <button id="save" class="button w-20 bg-theme-1 text-white btn-submit">Simpan</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    <!-- END: GET Info -->
                </div>
@foreach ($parkir as $index => $item2)
@php

    $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
    $tanggal = date("Y-m-d");
    $data_barcode = $tanggal . $item2->blok->nama . $item2->blok->lantai->nama . $item2->kendaraan->jenis->nama . $item2->kendaraan->plat_nomor;

@endphp
<div class="modal" id="detail-blok{{ $item2->id }}">
    <div class="modal__content">
     <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
      <h2 class="font-medium text-base mr-auto">Tambah Blok Parkir</h2>
       <button class="button border items-center text-gray-700 hidden sm:flex">
        <i data-feather="file" class="w-4 h-4 mr-2"></i>
         Download Docs
         </button>
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
              <label>Nama Blok Parkir</label>
               <input disabled type="text" value="{{ $item2->blok->nama}}" name="blok_parkir" class="input w-full border mt-2 flex-1">
            </div>
            <div class="col-span-12 sm:col-span-6">
              <label>Lantai Parkir</label>
               <input disabled type="text" value="{{ $item2->blok->lantai->nama}}" name="lantai_parkir" class="input w-full border mt-2 flex-1">
            </div>
            <div class="col-span-12 sm:col-span-6">
              <label>Jenis Kendaraan</label>
               <input disabled type="text" value="{{ $item2->kendaraan->jenis->nama}}" name="lantai_parkir" class="input w-full border mt-2 flex-1">
            </div>
            <div class="col-span-12 sm:col-span-6">
              <label>Plat Nomor Kendaraan</label>
               <input disabled type="text" value="{{ $item2->kendaraan->plat_nomor}}" name="lantai_parkir" class="input w-full border mt-2 flex-1">
            </div>
            <div class="col-span-12">
            <img style="width:420px;height:100px" src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($data_barcode, $generatorPNG::TYPE_CODE_128)) }}">
            </div>
        </div>
            <div class="px-5 py-3 text-right border-t border-gray-200">
                <button type="button" data-dismiss="modal"
                        class="btn btn-outline-secondary w-20 mr-1">Close</button>
             <button id="addbtn" class="button w-20 bg-theme-1 text-white btn-submit">Export</button>
            </div>
    </div>
</div> 
@endforeach

<script type="text/javascript">
function pilih_lantai(e,id) {
    
    $('#data').remove();
    var status;
    e.preventDefault();
    $.ajax({
        url: "{{ route('data-block')}}",
        type: 'post',  
        data:{"_token": "{{ csrf_token() }}",lantai_id:id},
        dataType: 'json',
        success: function (data) {

            $.each(data, function () {
                $.each(this, function (index, value) {
                    if (value.parkir != null) {
                         status=value.parkir.status;
                    if (status == 1) {
                           $('#data').append('' +
                                '<td>'+
                                '<button type="submit" onclick="detail_blok(event,'+ value.parkir.id +')" class="button inline-block bg-theme-2 text-white">'+( value.id )+
                                '</button>' +
                                '</td>');

                    }
                    else{
                                                    $('#data').append('' +
                                '<td>'+
                                '<button type="submit" onclick="data_blok(event,'+ value.id +',\''+value.nama+'\')" class="button inline-block bg-theme-1 text-white">'+( value.nama )+
                                '</button>' +
                                '</td>');
                    }
                }
                    else{
       $('#data').append('' +
                                '<td>'+
                                '<button type="submit" onclick="data_blok(event,'+ value.id +',\''+value.nama+'\')" class="button inline-block bg-theme-1 text-white">'+( value.nama )+
                                '</button>' +
                                '</td>');
                    }                   
                         
               
                });
            });
    }
});
}
function detail_blok(e,id) {
    $('#detail-blok'+id+'').modal('show');
}
function data_blok(e,id,nama) {
    // alert(id);
    $('#block_id').val(id);  
    $('#block_name').val(nama);
}
$("#save").click(function() {
    event.preventDefault();
    var blok = $("input[name=block_id]").val();
    var plat = $("input[name=plat_nomor_kendaraan]").val();
    var k = document.getElementById("jenis_kendaraan");
    var jenis_kendaraan = k.value;
    // var jenis_kendaraan = $("input[name=jenis_kendaraan]").val();
    // alert(blok);
    $.ajax({
        url: "{{ route('add-blok-parkir-petugas')}}",
        type: 'post',  
        data:{"_token": "{{ csrf_token() }}",plat:plat,jenis_kendaraan:jenis_kendaraan,blok:blok},
        dataType: 'json',
        success: function (data) {
                console.log(data);  
                 $('#block_id').val("");  
                 $('#block_name').val("");
                pilih_lantai();        

    }
});
}); 


</script>
@endsection


