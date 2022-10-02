<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Parking Area Apps</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- Invoice styling -->
        <style>
            body {
                /* font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; */
                text-align: center;
                color: #000;
                /*color: #777;*/
                font-weight: 900;
            }

            body h1 {
                font-weight: 150;
                margin-bottom: 0px;
                padding-bottom: 0px;
                color: #000;
            }

            body h3 {
                font-weight: 150;
                margin-top: 5px;
                margin-bottom: 10px;
                font-style: italic;
                color: #555;
            }

            body a {
                color: #06f;
            }

            .invoice-box {
                max-width: 400px;
                margin: auto;
                padding: 15px;
                margin-top: 15em;
                border: 1px solid #eee;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
                font-size: 8px;
                line-height: 12px;
                /* font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; */
                color: #555;
            }

            .invoice-box table {
                width: 100%;
                line-height: inherit;
                text-align: left;
                border-collapse: collapse;
            }

            .invoice-box table td {
                padding: 3px;
                vertical-align: top;
            }

            .invoice-box table tr td:nth-child(2) {
                text-align: right;
            }

            .invoice-box table tr.top table td {
                padding-bottom: 10px;
            }

            .invoice-box table tr.top table td.title {
                font-size: 25px;
                line-height: 25px;
                color: #333;
            }

            .invoice-box table tr.information table td {
                padding-bottom: 20px;
            }

            .invoice-box table tr.heading td {
                background: #eee;
                border-bottom: 1px solid #ddd;
                font-weight: bold;
            }

            .invoice-box table tr.details td {
                padding-bottom: 10px;
            }

            .invoice-box table tr.item td {
                border-bottom: 1px solid #eee;
            }

            .invoice-box table tr.item.last td {
                border-bottom: none;
            }

            .invoice-box table tr.total td:nth-child(2) {
                border-top: 2px solid #eee;
                font-weight: bold;
            }

            .invoice-box table tr.titlettd td {
                font-weight: bold;
                text-align: center;
                padding-top: 30px;
            }

            .invoice-box table tr.ttd td {
                font-weight: bold;
                text-align: center;
                padding-top: 60px;
            }

            @media only screen and (max-width: 300px) {
                .invoice-box table tr.top table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }

                .invoice-box table tr.information table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }
            }
            h2{
                padding-bottom: 1em;
                font-size: 20px;
            }
            .col-span-12{
                padding-bottom: 1em;
                font-size: 14px;
            }
            .col-span-12 label{
                padding-bottom: 1em;
                    text-align: left;
                    float: left;
                    /*background-color: blue;*/
                    width: 150px;
                    /*height: 150px;*/

            }
            .input{
                padding-bottom: 1em;
                margin-left: -2em;
                text-align: center;
                  

            }
          
        </style>
    </head>

    <body>
        <div class="invoice-box">
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
  <h2 class="font-medium text-base mr-auto">Karcis Parkir</h2>
<!--       <button class="button border items-center text-gray-700 hidden sm:flex">
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

    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
        <div class="col-span-12 sm:col-span-6">
          <label>Nomor Parkir</label>
           <input disabled type="text" value="{{ $item2->id}}" name="id_parkir" class="input w-full border mt-2 flex-1">
        </div>
        <div class="col-span-12 sm:col-span-6">
          <label>Nama Blok Parkir</label>
           <input disabled type="text" value="{{ $item2->blok->nama}}" name="blok_parkir" class="input w-full border mt-2 flex-1">
        </div>
        <div class="col-span-12 sm:col-span-6">
          <label>Zona Parkir</label>
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
        
        <div class="col-span-12 sm:col-span-6">
                <label>Tanggal & Jam Masuk</label>

           <input disabled type="text" value="{{ $item2->created_at}}" name="lantai_parkir" class="input w-full border mt-2 flex-1">
        </div>
     
        <div class="col-span-12">
      <!--   <img style="width:420px;height:100px" src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($data_barcode, $generatorPNG::TYPE_CODE_128)) }}"> -->
   
       <center> {!! QrCode::size(150)->generate($item2->id); !!}
       </center>
        </div>
    </div>
</div>
</div> 
@endforeach

        </div>
    </body>
</html>
