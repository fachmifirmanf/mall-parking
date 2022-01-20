@extends('layouts.app')
@section('content')
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                     
                    </h2>
                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                        <div class="dropdown relative">
                            <button class="dropdown-toggle button text-white bg-theme-1 shadow-md flex items-center"> Save <i class="w-4 h-4 ml-2" data-feather="save"></i> </button>
                            <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
                    <!-- BEGIN: Post Content -->
                    <div class="intro-y col-span-12 lg:col-span-8">
                    
                        <div class="post intro-y overflow-hidden box mt-5 p-5">
                        <table class="table table-report -mt-2">
    <thead>
        <tr>
            <th class="whitespace-no-wrap">NO</th>
            <th class="whitespace-no-wrap">SOAL</th>
            <!-- <th class="text-center whitespace-no-wrap">SKOR</th> -->
            <!-- <th class="text-center whitespace-no-wrap">JAWABAN</th> -->
            <!-- <th class="text-center whitespace-no-wrap">ACTIONS</th> -->
        </tr>
    </thead>

    <tbody>
        <tr class="intro-x">
            @php
            session_start();
            if (isset($_GET['SubmitButton'])){
            $index_soal_muncul = $_GET['indx_php'];
            }
            else{
                $index_soal_muncul = 1;
            }
            @endphp
        @forelse($list as $index => $soals)  
        @if(($index + 1 ) == $index_soal_muncul)  
            <td>
                {{ $index +1 }}
            </td>
            <td>
                <a href="" class="font-medium whitespace-no-wrap">{{$soals->soal}}</a>

                @forelse($list_jawaban as $key => $jwb)
                @if($soals->soal_id == $jwb->soal_id)  

                <div class="text-gray-600 text-xs whitespace-no-wrap">
                    <input type="hidden" min="0" name="waktu_pengerjaan" class="input w-full border mt-2 flex-1">
                     {{ $jwb->jawaban }}
                </div>

                @else
                @endif
                @empty
                @endforelse
            </td>

        </tr>
        @else
        @endif
        @empty
        @endforelse
    </tbody>

</table>
@if($index_soal_muncul > 1)
            <div  class="p-3 float-left">
                <form>
                <input type="hidden" name="indx_php" value="{{$index_soal_muncul - 1}}">
                <button name="SubmitButton" type="submit" class="button inline-block bg-theme-1 text-white">Preveous</button>
                </form>
            </div>
@else
@endif
@if($index_soal_muncul < count($list))
            <div  class="p-3 float-right">
                <form>
                <input type="hidden" name="indx_php" value="{{$index_soal_muncul + 1}}">
                <button name="SubmitButton" type="submit" class="button inline-block bg-theme-1 text-white">NEXT</button>
                </form>
            </div>
@else
@endif
                        </div>
                    </div>
                    <!-- END: GET Content -->
                    <!-- BEGIN: GET Info -->
                    <div class="col-span-12 lg:col-span-4">
                        <div class="intro-y box p-5">
                            <div>
                                <label>Written By</label>
                           @forelse($list as $key => $number)
                            <a class="inline-block bg-theme-1 text-white">
                           <form>
                            <input type="hidden" name="indx_php" value="{{$key + 1}}">
                        <button name="SubmitButton" type="submit" class="button inline-block bg-theme-1 text-white">{{$key + 1}}</button>
                           </form>
                           </a>
                           @empty
                           @endforelse
                            </div>
                        </div>
                    </div>
                    <!-- END: GET Info -->
                </div>

@endsection


