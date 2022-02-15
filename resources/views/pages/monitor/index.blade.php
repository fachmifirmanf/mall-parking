@extends('layouts.app')
@section('content')


         
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Weekly Top Products -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Daftar Parkir</h2>
                        <!-- <a href="javascript:;" data-toggle="modal" data-target="#add-data" class="button inline-block bg-theme-1 text-white">Tambah Blok Parkir</a> -->
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
                                    <th class="text-center whitespace-nowrap">Plat Nomor</th>
                                    <th class="text-center whitespace-nowrap">Lantai</th>
                                    <th class="text-center whitespace-nowrap">Blok Parkir</th>
                                    <th class="text-center whitespace-nowrap">Status</th>
                                    <th class="text-center whitespace-nowrap">Tanggal</th>
                                    <th class="text-center whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="data">
                                  
                              
                        
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


<!-- END: Modal List Kluters -->

<script type="text/javascript">


function ubahstatusparkir(e,id,sts) {
     e.preventDefault();
        $.ajax({

           type:'POST',

           url:"{{ url('update-monitor-parkir') }}",

           data:{ "_token": "{{ csrf_token() }}",id:id,},

           success:function(data){

              $('#success-modal-preview').modal('show');
                // $('#status-parkir').val(sts);  
             window.location="{{ url('monitor-parkir') }}";

           }

        });  
}

$(document).ready(function(){ 


     $.ajax({
        url: "{{ route('data-status-parkir')}}",
        type: 'post',  
        data:{"_token": "{{ csrf_token() }}",},
        dataType: 'json',
        success: function (data) {

            $.each(data, function () {
                $.each(this, function (index, value) {
                    var time = new Date(value.created_at);
                    var t = time.getFullYear() + '-' +('0' + (time.getMonth()+1)).slice(-2)+ '-' +  ('0' + time.getDate()).slice(-2) + ' '+time.getHours()+ ':'+('0' + (time.getMinutes())).slice(-2)+ ':'+time.getSeconds();
                   if (value.status == 1) {
                        $('#data').append('' +
                            '  <tr class="intro-x">' +
                             '<td class="w-40">' +
                                        (index + 1)+
                                        '</td>' +
                                        '<td class="text-center">' + 
                                        '<a href="" class="font-medium whitespace-nowrap">'+ value.kendaraan.plat_nomor + 
                                        '</a>' +
                                        '</td>' +
                                        '<td class="text-center">' + 
                                        '<a href="" class="font-medium whitespace-nowrap">'+ value.blok.lantai.nama +
                                        '</a>'+
                                        '</td>'+
                                        '<td class="text-center">' + 
                                        '<a href="" class="font-medium whitespace-nowrap">'+ value.blok.nama +
                                        '</a>'+
                                        '</td>'+
                                        '<td class="text-center">' + 
                                        '<a href="" class="font-medium whitespace-nowrap">'+ 
                                        (value.status != 1 ? 'keluar' : 'masuk') +
                                        '</a>'+
                                        '</td>'+                    
                                        '<td class="text-center">' + 
                                        '<a href="" class="font-medium whitespace-nowrap">'+ t +
                                        '</a>'+
                                        '</td>'+
                                        '<td class="table-report__action w-50">' +

                                        '<div class="flex justify-center items-center">'+
                                        '<button id="addbtn" class="button w-20 bg-theme-1 text-white btn-submit " onclick="ubahstatusparkir(event,'+ value.id +',\''+'masuk'+'\')">Ganti</button>' + 
                                            '</div>'+
                                        '</td>'+
                                        '</tr>');
                    }
                    else{
                        $('#data').append('' +
                            '  <tr class="intro-x">' +
                             '<td class="w-40">' +
                                        (index + 1)+
                                        '</td>' +
                                        '<td class="text-center">' + 
                                        '<a href="" class="font-medium whitespace-nowrap">'+ value.kendaraan.plat_nomor + 
                                        '</a>' +
                                        '</td>' +
                                        '<td class="text-center">' + 
                                        '<a href="" class="font-medium whitespace-nowrap">'+ value.blok.lantai.nama +
                                        '</a>'+
                                        '</td>'+
                                        '<td class="text-center">' + 
                                        '<a href="" class="font-medium whitespace-nowrap">'+ value.blok.nama +
                                        '</a>'+
                                        '</td>'+
                                        '<td class="text-center">' + 
                                        '<a href="" class="font-medium whitespace-nowrap">'+ 
                                        (value.status != 1 ? 'keluar' : 'masuk') +
                                        '</a>'+
                                        '</td>'+                    
                                        '<td class="text-center">' + 
                                        '<a href="" class="font-medium whitespace-nowrap">'+ t +
                                        '</a>'+
                                        '</td>'+
                                        '<td class="table-report__action w-50">' +

                                        '<div class="flex justify-center items-center">'+
                                        '-' + 
                                            '</div>'+
                                        '</td>'+
                                        '</tr>');
                    }

                            
                         
               
                });
            });
    }
});
});



</script>
@endsection


