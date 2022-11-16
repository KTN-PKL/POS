@extends('layout.template')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Laravel 8</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="jumbotron p-5 rounded-3" style="background-color: rgb(240, 240, 240)">
            <div class="row">
             <div style="background-color: rgb(240, 240, 240)  ;box-shadow:none; border:none;" class="card col-sm-8" >
                <div class="card card-rounded ">
                    {{-- <div id="message" style="display: none" class="alert-success"><b>Sukses!</b> Profil Berhasil di update
                    <button></button>
                    </div> --}}
                    <div style="display:none" id="message">
                        <strong>Sukses!</strong> Akun Berhasil di update
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div style="background-color:#0c4e68" class="card-header text-white">
                    <h4 style="width:200px" > <i class="fa fa-cubes"></i> Daftar Menu</h4>
                </div>
                    <div class="card-body">
                        <div id="read">



                        </div> 
                            
                          
                    </div> 
                
                  
            </div>
            </div>
            <div id="keranjang" style="background-color: rgb(240, 240, 240)  ;box-shadow:none; border:none;" class="card col-sm-4" >
                
            </div>
        
        </div>
        
        </div>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

   
    <script>
        this.datas = new FormData();
       $(document).ready(function() {
           read(),
           transaksi()
      
       });
       // edit form
       function read() {
           $.get("{{ url('kasir/read') }}", {}, function(data, status) {
               $("#read").html(data);  
           });
       }

       function transaksi() {
           $.get("{{ url('kasir/transaksi') }}", {}, function(data, status) {
               $("#keranjang").html(data);  
           });
       }
       // edit gambar
       function editgambar(){
           var files = $("#foto")[0].files;
           datas.append('foto',files[0]);
       }

       
   </script>
</body>

@endsection