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

                                        <div style="margin-right: -3em;" class="pt-2">
                                        <a href="{{ url('detail-soal-peserta',$kluster->id) }}">
                                        <button class="button inline-block bg-theme-1 text-white"><i style="width: 10px;height: 10px;" data-feather="send"></i>
                                        </button>
                                        </a>
                                        </div>
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

@endsection
