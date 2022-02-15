@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    <!-- General Report -->
                                </h2>
                                <a href="" class="ml-auto flex text-theme-1"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-ccw w-4 h-4 mr-3"><polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path></svg> Reload Data </a>
                            </div>
                <div class="card-body">
                    <div class="grid grid-cols-12 gap-6 mt-5">
                    @forelse($parkir as $index => $p)

                 <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                    <i data-feather="server"></i> 
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $p->nama }}</div>
                                    <div class="text-base text-gray-600 mt-1">{{$p->kendaraan}} Units</div>
                                </div>
                            </div>
                        </div>
                           @empty
                        @endforelse
                    </div>
                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
