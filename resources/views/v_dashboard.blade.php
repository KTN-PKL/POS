@extends('layout.template')
@section('content')
<div class="jumbotron p-5 rounded-3" style="background-color: rgb(240, 240, 240)">
<div class="container">
    <div class="row">
     <div style="background-color: rgb(240, 240, 240)  ;box-shadow:none; border:none;" class="card col-sm-3" >
        <div class="card card-rounded mb-4 ">
        <div id="warna" class="card-header text-white">
            <h4>Kategori</h4>
        </div>
            <div class="card-body">
                <h3 style="font-size:36px; text-align:center;" data-purecounter-start="0" data-purecounter-end="{{$kategori}}" data-purecounter-duration="1" class="purecounter"></h3>
            </div> 
            <div style="background-color: white" class="card-footer">
                <a style="text-decoration: none" href="#"><h5 class="lihat" >Lihat Selengkapnya
                    <i class="fa fa-arrow-right"></i></h5></a>
            </div>       
    </div>
    </div>

    <div style="background-color:rgb(240, 240, 240)  ;box-shadow:none; border:none;" class="card col-sm-3" >
        <div class="card card-rounded mb-4 ">
        <div class="card-header  text-white">
            <h4>Item</h4>
        </div>
            <div class="card-body">
                <h3 style="font-size:36px; text-align:center;" data-purecounter-start="0" data-purecounter-end="{{$item}}" data-purecounter-duration="1" class="purecounter"></h3>
            </div>    
            <div style="background-color: white" class="card-footer">
                <a style="text-decoration: none" href="#"><h5 class="lihat" >Lihat Selengkapnya
                    <i class="fa fa-arrow-right"></i></h5></a>
            </div>    
    </div>
    </div>

    <div style="background-color: rgb(240, 240, 240) ;box-shadow:none; border:none;" class="card col-sm-3" >
        <div class="card card-rounded mb-4 ">
        <div id="warna" class="card-header text-white">
            <h4>Customer</h4>
        </div>
            <div class="card-body">
                <h3 style="font-size:36px; text-align:center;" data-purecounter-start="0" data-purecounter-end="{{$customer}}" data-purecounter-duration="1" class="purecounter"></h3>
            </div>    
             <div style="background-color: white" class="card-footer">
                <a style="text-decoration: none" href="#"><h5 class="lihat" >Lihat Selengkapnya
                    <i class="fa fa-arrow-right"></i></h5></a>
            </div>    
    </div>
    </div>

    <div style="background-color:rgb(240, 240, 240)  ;box-shadow:none; border:none;" class="card col-sm-3" >
        <div class="card card-rounded mb-4 ">
        <div id="warna" class="card-header  text-white">
            <h4>Transaksi</h4>
        </div>
            <div class="card-body">
                <h3 style="font-size:36px; text-align:center;" data-purecounter-start="0" data-purecounter-end="{{$transaksi}}" data-purecounter-duration="1" class="purecounter"></h3>
            </div>   
            <div style="background-color: white" class="card-footer">
                <a style="text-decoration: none" href="#"><h5 class="lihat" >Lihat Selengkapnya
                    <i class="fa fa-arrow-right"></i></h5></a>
            </div>     
    </div>
    </div>
    {{-- <div style="background-color: rgb(240, 240, 240)  ;box-shadow:none; border:none;" class="card col-sm-12" >
        <div class="card card-rounded mb-4 ">
        <div id="warna" class="card-header text-white">
            <h4>Laporan Penjualan 2022</h4>
        </div>
            <div class="card-body">
                
               <div id="container">
                <script src="https://code.highcharts.com/highcharts.js"> </script> 
                <script> 
                    var customerphp echo json_encode($customer);
                    Highcharts.chart('container',{
                        chart:{
                            type:'column'
                        },
                        title :{
                            text:'Laporan Penjualan'
                        },
                        xAxis:{
                            categories: 
                            ['January', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus','September','Oktober','November','Desember']
                        },
                        yAxis:{
                            title:{
                                text:"Number"
                            }
                        },
                        series:[{
                            name:"New User",
                            data:['1','1','1','1','1','1','1','100','1','1','1','100'
                            ]
                        }],
                    });
                </script>

               </div>
            </div>
    </div>
    </div> --}}
</div>
</div>
</div>
<script src="{{ asset('template') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="{{ asset('template') }}/assets/vendor/aos/aos.js"></script>
<script src="{{ asset('template') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="{{ asset('template') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="{{ asset('template') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="{{ asset('template') }}/assets/vendor/php-email-form/validate.js"></script>

 <!-- Template Main JS File -->
 <script src="{{ asset('template') }}/assets/js/main.js"></script>
@endsection
















