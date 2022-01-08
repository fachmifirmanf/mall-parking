@extends('layouts.app')
@section('content')
<div class="intro-y flex items-center h-10 mt-5">
    <h2 class="text-lg font-medium truncate mr-5">
        General Report
    </h2>
    <a href="" class="ml-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
</div>
<div class="mt-5 mb-5">
    <a href="javascript:;" data-toggle="modal" data-target="#add-soal" class="button inline-block bg-theme-1 text-white">Tambah Soal</a>
</div>
<div class="modal" id="success-modal-preview">
 <div class="modal__content">
     <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
         <div class="text-3xl mt-5">Data Berhasil Disimpan</div>
         <!-- <div class="text-gray-600 mt-2">Data Berhasil Disimpan</div> -->
    </div>
    <div class="px-5 pb-8 text-center"> </div>
 </div>
</div>
<table class="table table-report -mt-2">
    <thead>
        <tr>
            <th class="whitespace-no-wrap">NO</th>
            <th class="whitespace-no-wrap">SOAL</th>
            <th class="text-center whitespace-no-wrap">SKOR</th>
            <!-- <th class="text-center whitespace-no-wrap">JAWABAN</th> -->
            <th class="text-center whitespace-no-wrap">ACTIONS</th>
        </tr>
    </thead>
    <tbody>
        <tr class="intro-x">
        @forelse($soal as $index => $soals)    
            <td class="w-40">
                {{ $index +1 }}
            </td>
            <td>
                <a href="" class="font-medium whitespace-no-wrap">{{$soals->soal}}</a> 
            <!--     <div class="text-gray-600 text-xs whitespace-no-wrap"></div> -->
            </td>
            <td class="text-center">{{$soals->skor}}</td>
<!--             <td class="w-40">
                <div class="flex items-center justify-center text-theme-9"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> 
              
                </div>
            </td> -->
            <td class="table-report__action w-56">
                <div class="flex justify-center items-center">
                    <a data-toggle="modal" data-target="#edit-soal{{$soals->id}}" class="flex items-center mr-3" href="javascript:;"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Edit </a>
                    <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal{{$soals->id}}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete </a>
                </div>
            </td>
        </tr>

        @empty
        @endforelse
    </tbody>
</table>




<!-- BEGIN: Modal Add Soal -->
<form>
<div class="modal" id="add-soal">
    <div class="modal__content">
     <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
      <h2 class="font-medium text-base mr-auto">Tambah Kluster</h2>
       <button id="addMore" class="button border items-center text-gray-700 hidden sm:flex">
        <i data-feather="plus-circle" class="w-4 h-4 mr-2"></i>
         Tambah Soal
         </button>
          <div class="dropdown relative sm:hidden">
           <a class="dropdown-toggle w-5 h-5 block" href="javascript:;">
            <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i>
             </a>
              <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
               <div class="dropdown-box__content box p-2">
     <!--            <a href="javascript:;" class="flex items-center p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                 <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Docs 
                </a>  -->
              </div> 
             </div> 
            </div> 
     </div>
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3" id="fieldList">
            <div class="col-span-12 sm:col-span-6">
              <label>Soal</label>
               <input type="text" name="soal[]" class="input w-full border mt-2 flex-1">
            </div>
            <div class="col-span-12 sm:col-span-6">
              <label>Jawaban Benar</label>
               <input type="text" name="jawaban_benar[]" class="input w-full border mt-2 flex-1">
            </div>
            <div class="col-span-12 sm:col-span-6">
              <label>Jawaban Salah 1</label>
               <input type="text" name="jawaban_salah1[]" class="input w-full border mt-2 flex-1">
            </div>
            <div class="col-span-12 sm:col-span-6">
              <label>Jawaban Salah 2</label>
               <input type="text" name="jawaban_salah2[]" class="input w-full border mt-2 flex-1">
            </div>
            <div class="col-span-12 sm:col-span-6">
              <label>Jawaban Salah 3</label>
               <input type="text" name="jawaban_salah3[]" class="input w-full border mt-2 flex-1">
            </div>
            <div class="col-span-12 sm:col-span-6">
              <label>Jawaban Salah 4</label>
               <input type="text" name="jawaban_salah4[]" class="input w-full border mt-2 flex-1">
            </div>
            <div class="col-span-12 sm:col-span-6">
              <label>Jawaban Salah 5</label>
               <input type="text" name="jawaban_salah5[]" class="input w-full border mt-2 flex-1">
            </div>
            <div class="col-span-12 sm:col-span-6">
              <label>Skor</label>
               <input type="number" min="0" name="skor[]" class="input w-full border mt-2 flex-1">
            </div>
        </div>
            



            <div class="px-5 py-3 text-right border-t border-gray-200">
             <button id="btnadd" class="button w-20 bg-theme-1 text-white btn-submit">Send</button>
            </div>
    </div>
</div>

</form>
<!-- END: Modal Add Soal -->

<!-- BEGIN: Modal Add Soal -->
@forelse($soal as $index => $soalz)    

<form>
<div class="modal" id="edit-soal{{$soalz->id}}">
    <div class="modal__content">
     <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
      <h2 class="font-medium text-base mr-auto">Edit Kluster {{$soalz->id}}</h2>
       <!-- <button id="addMore" class="button border items-center text-gray-700 hidden sm:flex">
        <i data-feather="plus-circle" class="w-4 h-4 mr-2"></i>
         Tambah Soal
         </button> -->
          <div class="dropdown relative sm:hidden">
           <a class="dropdown-toggle w-5 h-5 block" href="javascript:;">
            <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i>
             </a>
              <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
               <div class="dropdown-box__content box p-2">
     <!--            <a href="javascript:;" class="flex items-center p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                 <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Docs 
                </a>  -->
              </div> 
             </div> 
            </div> 
     </div>

        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3" id="fieldList">
            <div class="col-span-12 sm:col-span-6">
              <label>Soal</label>
               <input type="text" value="{{ $soalz->soal }}" name="edit_soal{{ $soalz->id }}" class="input w-full border mt-2 flex-1">
                <input type="hidden" value="{{ $soalz->id }}" name="id_soal{{ $soalz->id }}" class="input w-full border mt-2 flex-1">
            </div>
    @forelse($jawab as $index2 => $jawab2)  
    @if($jawab2->soal_id == $soalz->id) 
         @if($jawab2->id == $soalz->kunci_jawaban)

                <div class="col-span-12 sm:col-span-6">
                  <label>Jawaban Benar</label>
                   <input type="text" value="{{ $jawab2->jawaban }}" name="edit_jawaban_benar{{ $soalz->id }}" class="input w-full border mt-2 flex-1">
                    <input type="hidden" value="{{ $jawab2->id }}" name="edit_id_jawaban_benar{{ $soalz->id }}" class="input w-full border mt-2 flex-1">
                </div>
                @else
        
                <div class="col-span-12 sm:col-span-6">
                  <label>Jawaban Salah {{ $index2 + 1 }}</label>
                   <input type="text" value="{{ $jawab2->jawaban }}" name="edit_jawaban_salah{{  $index2 + 1 }}" class="input w-full border mt-2 flex-1">
                    <input type="hidden" value="{{ $jawab2->id }}" name="edit_id_jawaban_salah{{  $index2 + 1 }}" class="input w-full border mt-2 flex-1">
                    <input type="hidden" value="{{  $index2 + 1 }}" name="index[]" class="input w-full border mt-2 flex-1">
                </div>
            @endif
    @else
    @endif
        @empty
        @endforelse
            <div class="col-span-12 sm:col-span-6">
              <label>Skor</label>
               <input type="number" value="{{ $soalz->skor }}" min="0" name="edit_skor{{ $soalz->id }}" class="input w-full border mt-2 flex-1">
            </div>
        </div>
          

            <div class="px-5 py-3 text-right border-t border-gray-200">
             <button id="btnedit" onclick="editsoal(event,'{{$soalz->id}}')" class="button w-20 bg-theme-1 text-white btn-submit">Send</button>
            </div>
    </div>
</div>
</form>
        @empty
        @endforelse
<!-- END: Modal Add Soal -->


<script type="text/javascript">
 



    $("#btnadd").click(function(e){

        // alert('btn add');

        e.preventDefault();
        var soal = $("input[name='soal[]']")
              .map(function(){return $(this).val();}).get();
        var jawaban_benar = $("input[name='jawaban_benar[]']")
              .map(function(){return $(this).val();}).get();
        var jawaban_salah1 = $("input[name='jawaban_salah1[]']")
              .map(function(){return $(this).val();}).get();
        var jawaban_salah2 = $("input[name='jawaban_salah2[]']")
              .map(function(){return $(this).val();}).get();
        var jawaban_salah3 = $("input[name='jawaban_salah3[]']")
              .map(function(){return $(this).val();}).get();
        var jawaban_salah4 = $("input[name='jawaban_salah4[]']")
              .map(function(){return $(this).val();}).get();
        var jawaban_salah5 = $("input[name='jawaban_salah5[]']")
              .map(function(){return $(this).val();}).get();
        var skor = $("input[name='skor[]']")
              .map(function(){return $(this).val();}).get();
        $.ajax({

           type:'POST',

           url:"{{ route('addsoal') }}",

           data:{"_token": "{{ csrf_token() }}",soal:soal,jawaban_benar:jawaban_benar,jawaban_salah1:jawaban_salah1,jawaban_salah2:jawaban_salah2,jawaban_salah3:jawaban_salah3,jawaban_salah4:jawaban_salah4,jawaban_salah5:jawaban_salah5,skor:skor,
         },

           success:function(data){

                       // $('#alert-text-success').text("User Berhasil Di Tambahkan");
              // $('#add-soal').modal('hide');
              $('#success-modal-preview').modal('show');
             window.location="{{ route('soal') }}";

           },

            error:function(){
              $('#success-modal-preview').modal('show');
             window.location="{{ route('soal') }}";
            }

        });  

    });



function editsoal(e,id) {

var indx = $("input[name='index[]']")
              .map(function(){return $(this).val();}).get();
var h = indx.slice(Math.max(indx.length - 5, 0));

        e.preventDefault();
        // alert('btn edit');
        var id_soal = $("input[name=id_soal"+id+"]").val();
        var soal = $("input[name=edit_soal"+id+"]").val();
        var id_jawaban_benar = $("input[name=edit_id_jawaban_benar"+id+"]").val();
        var jawaban_benar = $("input[name=edit_jawaban_benar"+id+"]").val();
        var id_jawaban_salah1 = $("input[name=edit_id_jawaban_salah"+h[0]+"]").val();
        var jawaban_salah1 = $("input[name=edit_jawaban_salah"+h[0]+"]").val();
        var id_jawaban_salah2 = $("input[name=edit_id_jawaban_salah"+h[1]+"]").val();
        var jawaban_salah2 = $("input[name=edit_jawaban_salah"+h[1]+"]").val();
        var id_jawaban_salah3 = $("input[name=edit_id_jawaban_salah"+h[2]+"]").val();
        var jawaban_salah3 = $("input[name=edit_jawaban_salah"+h[2]+"]").val();
        var id_jawaban_salah4 = $("input[name=edit_id_jawaban_salah"+h[3]+"]").val();
        var jawaban_salah4 = $("input[name=edit_jawaban_salah"+h[3]+"]").val();
        var id_jawaban_salah5 = $("input[name=edit_id_jawaban_salah"+h[4]+"]").val();
        var jawaban_salah5 = $("input[name=edit_jawaban_salah"+h[4]+"]").val();
        var skor = $("input[name=edit_skor"+id+"]").val();

        

        $.ajax({

           type:'POST',

           url:"{{ url('editsoal/{id_soal}') }}",

           data:{"_token": "{{ csrf_token() }}",id_soal:id_soal,soal:soal,id_jawaban_benar:id_jawaban_benar,jawaban_benar:jawaban_benar,id_jawaban_salah1:id_jawaban_salah1,jawaban_salah1:jawaban_salah1,id_jawaban_salah2:id_jawaban_salah2,jawaban_salah2:jawaban_salah2,id_jawaban_salah3:id_jawaban_salah3,jawaban_salah3:jawaban_salah3,id_jawaban_salah4:id_jawaban_salah4,jawaban_salah4:jawaban_salah4,id_jawaban_salah5:id_jawaban_salah5,jawaban_salah5:jawaban_salah5,skor:skor,
         },

           success:function(data){

          
             $('#success-modal-preview').modal('show');
            window.location="{{ route('soal') }}";

            },

            error:function(){
              $('#success-modal-preview').modal('show');
             window.location="{{ route('soal') }}";
            }

        });  

   

}


$(function() {
  $("#addMore").click(function(e) {
    e.preventDefault();
    $("#fieldList").append("<div class='col-span-12 sm:col-span-6'> <label>Soal</label><input type='text' name='soal[]' class='input w-full border mt-2 flex-1'>    </div>");
    $("#fieldList").append("<div class='col-span-12 sm:col-span-6'> <label>Jawaban Benar</label><input type='text' name='jawaban_benar[]' class='input w-full border mt-2 flex-1'>    </div>");
    $("#fieldList").append("<div class='col-span-12 sm:col-span-6'><label>Jawaban Salah 1</label><input type='text' name='jawaban_salah1[]' class='input w-full border mt-2 flex-1'></div>");
    $("#fieldList").append("<div class='col-span-12 sm:col-span-6'><label>Jawaban Salah 2</label><input type='text' name='jawaban_salah2[]' class='input w-full border mt-2 flex-1'></div>");
    $("#fieldList").append("<div class='col-span-12 sm:col-span-6'><label>Jawaban Salah 3</label><input type='text' name='jawaban_salah3[]' class='input w-full border mt-2 flex-1'></div>");
    $("#fieldList").append("<div class='col-span-12 sm:col-span-6'><label>Jawaban Salah 4</label><input type='text' name='jawaban_salah4[]' class='input w-full border mt-2 flex-1'></div>");
    $("#fieldList").append("<div class='col-span-12 sm:col-span-6'><label>Jawaban Salah 5</label><input type='text' name='jawaban_salah5[]' class='input w-full border mt-2 flex-1'></div>");
    $("#fieldList").append("<div class='col-span-12 sm:col-span-6'><label>Skor</label><input type='number' min='0' name='skor[]' class='input w-full border mt-2 flex-1'></div>");
  });
});
</script>
@endsection


