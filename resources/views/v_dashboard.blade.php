<style type="text/css">
    .lihat{
        color: #0c4e68
    }
</style>
@extends('layout.template')
@section('content')
<div class="jumbotron p-5 rounded-3" style="background-color: rgb(240, 240, 240)">
<div class="container">
    <div class="row">
     <div style="background-color: rgb(240, 240, 240)  ;box-shadow:none; border:none;" class="card col-sm-3" >
        <div class="card card-rounded mb-4 ">
        <div style="background-color:#0c4e68" class="card-header text-white">
            <h4>Kategori</h4>
        </div>
            <div class="card-body">
                <h3 style="font-size:36px; text-align:center;" data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></h3>
            </div> 
            <div style="background-color: white" class="card-footer">
                <a style="text-decoration: none" href="#"><h5 class="lihat" >Lihat Selengkapnya
                    <i class="fa fa-arrow-right"></i></h5></a>
            </div>       
    </div>
    </div>

    <div style="background-color:rgb(240, 240, 240)  ;box-shadow:none; border:none;" class="card col-sm-3" >
        <div class="card card-rounded mb-4 ">
        <div style="background-color:#0c4e68" class="card-header  text-white">
            <h4>Menu</h4>
        </div>
            <div class="card-body">
                <h3 style="font-size:36px; text-align:center;" data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></h3>
            </div>    
            <div style="background-color: white" class="card-footer">
                <a style="text-decoration: none" href="#"><h5 class="lihat" >Lihat Selengkapnya
                    <i class="fa fa-arrow-right"></i></h5></a>
            </div>    
    </div>
    </div>

    <div style="background-color: rgb(240, 240, 240) ;box-shadow:none; border:none;" class="card col-sm-3" >
        <div class="card card-rounded mb-4 ">
        <div style="background-color: #0c4e68" class="card-header text-white">
            <h4>Customer</h4>
        </div>
            <div class="card-body">
                <h3 style="font-size:36px; text-align:center;" data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></h3>
            </div>    
             <div style="background-color: white" class="card-footer">
                <a style="text-decoration: none" href="#"><h5 class="lihat" >Lihat Selengkapnya
                    <i class="fa fa-arrow-right"></i></h5></a>
            </div>    
    </div>
    </div>

    <div style="background-color:rgb(240, 240, 240)  ;box-shadow:none; border:none;" class="card col-sm-3" >
        <div class="card card-rounded mb-4 ">
        <div style="background-color: #0c4e68" class="card-header  text-white">
            <h4>Transaksi Selesai</h4>
        </div>
            <div class="card-body">
                <h3 style="font-size:36px; text-align:center;" data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></h3>
            </div>   
            <div style="background-color: white" class="card-footer">
                <a style="text-decoration: none" href="#"><h5 class="lihat" >Lihat Selengkapnya
                    <i class="fa fa-arrow-right"></i></h5></a>
            </div>     
    </div>
    </div>
    <div style="background-color: rgb(240, 240, 240)  ;box-shadow:none; border:none;" class="card col-sm-12" >
        <div class="card card-rounded mb-4 ">
        <div style="background-color: #0c4e68" class="card-header text-white">
            <h4>Laporan Penjualan 2022</h4>
        </div>
            <div class="card-body">
                <h3 style="font-size:36px; text-align:center;" data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></h3>
            </div>
            <div style="background-color: white" class="card-footer">
                <a style="text-decoration: none" href="#"><h5 class="lihat" >Lihat Selengkapnya
                    <i class="fa fa-arrow-right"></i></h5></a>
            </div>    
    </div>
    </div>
</div>
</div>


</div>
<a href="{{route('user.logout')}}">Logoutt</a>
@endsection















