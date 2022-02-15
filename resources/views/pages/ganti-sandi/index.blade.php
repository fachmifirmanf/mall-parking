@extends('layouts.app')
@section('content')
<form action="{{ route('update-ganti-sandi',Auth::user()->id) }}" method="post">
    @csrf
   <div> <div class="mt-3"> <label>Password</label> <input type="password" class="input w-full border mt-2" placeholder="secret" name="password"> </div> <div class="flex items-center text-gray-700 mt-5"> <input type="checkbox" class="input border mr-2" id="vertical-remember-me">  </div> <button type="submit" class="button bg-theme-1 text-white mt-5">Ganti</button>   
</form>


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


