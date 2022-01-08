@extends('layouts.app')
@section('content')

 <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
                        <!-- BEGIN: General Report -->
                        <div class="col-span-12 mt-8">
                            <div class="intro-y flex items-center h-10">
                       <h2 class="text-lg font-medium truncate mr-5">
                                    General Report
                                </h2>
                                <a href="" class="ml-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                            </div>
                            <div class="mt-5">
                            <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="button inline-block bg-theme-1 text-white">Tambah Kluster</a>
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
         
                            <div class="grid grid-cols-12 gap-6 mt-5">
                           @forelse($kluster as $index => $kluster)    
                            <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                                <div class="mini-report-chart box p-5 zoom-in">
                                    <div class="flex items-center">
                                        <div class="w-2/4 flex-none">
                                            <div class="text-lg font-medium truncate">{{$kluster->nama_kluster}}</div>
                                            <div class="text-gray-600 mt-1">{{$kluster->type}}</div>
                                        </div>
                                        <div class="flex-none ml-auto relative"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <div class="py-1 px-2 rounded-full text-xs bg-gray-200 text-gray-600 cursor-pointer ml-auto truncate">{{$kluster->waktu_pengerjaan}} menit</div>
                                            <!-- <canvas id="report-donut-chart" style="display: block;" class="chartjs-render-monitor" width="90" height="90"></canvas> -->
                                            <!-- <div class="font-medium absolute w-full h-full flex items-center justify-center top-0 left-0">20%</div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        
                            </div>
                        </div>
                        <!-- END: General Report -->                     
                        </div>
                    </div>
                </div>






<!-- BEGIN: Modal List Kluters -->
<form>
<div class="modal" id="header-footer-modal-preview">
    <div class="modal__content">
     <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
      <h2 class="font-medium text-base mr-auto">Tambah Kluster</h2>
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
     <!--            <a href="javascript:;" class="flex items-center p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                 <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Docs 
                </a>  -->
              </div> 
             </div> 
            </div> 
     </div> 
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
            <div class="col-span-12 sm:col-span-6">
             <label>Tipe Kluster</label>
              <select id="tipe-kluster" name="tipe" class="input w-full border mt-2 flex-1">
               <option value="SAINTEK">SAINTEK</option>
               <option value="SOSHUM">SOSHUM</option>
              </select>
            </div>
            <div class="col-span-12 sm:col-span-6">
              <label>Nama Kluster</label>
               <input type="text" name="nama_kluster" class="input w-full border mt-2 flex-1">
            </div>
            <div class="col-span-12 sm:col-span-6">
              <label>Waktu Pengerjaan</label>
               <input type="number" min="0" name="waktu_pengerjaan" class="input w-full border mt-2 flex-1">
            </div>
        <!--     <div class="col-span-12 sm:col-span-6">
             <label>To</label>
              <input type="text" class="input w-full border mt-2 flex-1" placeholder="example@gmail.com">
            </div>
            <div class="col-span-12 sm:col-span-6">
             <label>Subject</label>
              <input type="text" class="input w-full border mt-2 flex-1" placeholder="Important Meeting">
            </div>
            <div class="col-span-12 sm:col-span-6">
             <label>Has the Words</label>
              <input type="text" class="input w-full border mt-2 flex-1" placeholder="Job, Work, Documentation">
            </div>
            <div class="col-span-12 sm:col-span-6">
             <label>Doesn't Have</label>
              <input type="text" class="input w-full border mt-2 flex-1" placeholder="Job, Work, Documentation">
            </div>
            <div class="col-span-12 sm:col-span-6">
             <label>Size</label>
              <select class="input w-full border mt-2 flex-1">
               <option>10</option>
               <option>25</option>
               <option>35</option>
               <option>50</option>
              </select>
            </div> -->
        </div>
            <div class="px-5 py-3 text-right border-t border-gray-200">
             <button class="button w-20 bg-theme-1 text-white btn-submit">Send</button>
            </div>
    </div>
</div> 
</form>
<!-- END: Modal List Kluters -->

<script type="text/javascript">
 

    $(".btn-submit").click(function(e){

        e.preventDefault();
        var nama_kluster = $("input[name=nama_kluster]").val();
        var e = document.getElementById("tipe-kluster");
        var tipe = e.options[e.selectedIndex].text;
        // var tipe = $("input[name=tipe]").val();
        var waktu_pengerjaan = $("input[name=waktu_pengerjaan]").val();

        $.ajax({

           type:'POST',

           url:"{{ route('addkluster') }}",

           data:{ "_token": "{{ csrf_token() }}",nama_kluster:nama_kluster, tipe:tipe, waktu_pengerjaan:waktu_pengerjaan},

           success:function(data){

                       // $('#alert-text-success').text("User Berhasil Di Tambahkan");
              $('#header-footer-modal-preview').modal('hide');
              $('#success-modal-preview').modal('show');
             window.location="{{ route('kluster') }}";

           }

        });  

    });

</script>
@endsection


