@extends('layouts.app')
@section('content')


         
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Weekly Top Products -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Nomor Parkir</h2>
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
    <form style="padding-bottom: 1em" action="{{url('monitor-parkir-pengunjung')}}" method="GET">
        <input type="text" name="cari" autofocus value="{{ old('cari') }}">
    </form>
<!--      <a  href="{{url('monitor-parkir-pengunjung')}}" >
        <button class="button w-20 bg-theme-1 text-white btn-submit ">Reset</button></a> -->
      
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <!-- <th class="whitespace-nowrap">No</th> -->
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


                    @forelse($parkir as $index => $p)
                    @php
                    $t = $p->created_at;
                    @endphp
                    <tr class="intro-x">
                <td class="text-center"> 
                <a href="" class="font-medium whitespace-nowrap">
                    {{ $p->kendaraan->plat_nomor }}
                </a>
                </td>
                <td class="text-center"> 
                <a href="" class="font-medium whitespace-nowrap">
                    {{ $p->blok->lantai->nama }}
                </a>
                </td>
                <td class="text-center"> 
                <a href="" class="font-medium whitespace-nowrap">
                    {{ $p->blok->nama }}
                </a>
                </td>
                <td class="text-center"> 
                <a href="" class="font-medium whitespace-nowrap">
                    {{ $p->status != 1 ? 'keluar' : 'masuk'}}
                </a>
                </td>                    
                <td class="text-center"> 
                <a href="" class="font-medium whitespace-nowrap">{{ $t }} 
                </a>
                </td>
                <td class="table-report__action w-50">
                    @if($p->status == 1)
                <div class="flex justify-center items-center">
                <button id="addbtn" class="button w-20 bg-theme-6 text-white btn-submit " onclick="ubahstatusparkir(event,'{{$p->id}}','masuk')">Keluar</button> 
                    </div>
                    @else
                                    <div class="flex justify-center items-center">
                -
                    </div>
                    @endif
                </td>
                </tr>
                        
                    @empty
                    @endforelse
                               
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



     



</script>
@endsection


