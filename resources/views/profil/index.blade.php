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
        <div class="container">
            <div class="row">
             <div style="background-color: rgb(240, 240, 240)  ;box-shadow:none; border:none;" class="card col-sm-8" >
                <div class="alert" style="display:none" id="message">
                    <strong>Sukses!</strong> Akun Berhasil di update
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card card-rounded ">
                   
                <div style="background-color:#0c4e68" class="card-header text-white">
                    <h4 style="width:200px" > <i class="fa fa-edit"></i> Edit Akun</h4>
                </div>
                    <div class="card-body">
                        <div id="page">



                        </div> 
                            
                          
                    </div> 
                
                  
            </div>
            </div>
            <div style="background-color: rgb(240, 240, 240)  ;box-shadow:none; border:none;" class="card col-sm-4" >
                <div class="card card-rounded mb-4 ">
                <div style="background-color:#0c4e68" class="card-header text-white">
                    <h4>Foto Profil</h4>
                </div>
                    <div class="card-body">
                        {{-- <span id="uploaded_image"></span> --}}
                       <img style="display:none; margin:auto;" width="300px" height="300" src="{{asset('/fotouser/'. $pengguna->foto)}}" alt="">
                    </div>    
            </div>
            </div>
        
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
           edit()
      
       });
       // edit form
       function edit() {
           $.get("{{ url('profil/edit') }}", {}, function(data, status) {
               $("#page").html(data);  
           });
       }
       // edit gambar
       function editgambar(){
           var files = $("#foto")[0].files;
           datas.append('foto',files[0]);
       }

       // update data
       function update(id) {
           var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
           var name = $("#name").val();
           var name = $("#username").val();
           var telepon = $("#telepon").val();
           var alamatuser = $("#alamatuser").val();
           datas.append('name',name);
           datas.append('username',username);
           datas.append('telepon',telepon);
           datas.append('alamatuser',alamatuser);
           datas.append('_token',CSRF_TOKEN);
           $.ajax({
                url: "{{ url('pengguna/update') }}/" + id,
                method: 'post',
                data: datas,
                contentType: false,
                processData: false,
                dataType: 'json',
               success: function(response) 
               {
               if(response.success == 1){ 
                   edit(),
                   document.getElementById("namacok").innerHTML = response.name,
                   $('#message').css('display', 'block');
                    $('#message').html(response.pesan);
                    $('#message').addClass(response.class_name);
                    $('#uploaded_image').html(response.uploaded_image);
                    window.setTimeout(function() {
                    $(".custom-alert").slideUp(2000, function() 
                    {
                    $(this).remove();
                    });
                    }, 2000);
    
               }    
               }
           });
           
       }

       
   </script>
</body>

@endsection
