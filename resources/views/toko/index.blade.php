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
             <div  class="col-sm-12" style="background-color: rgb(240, 240, 240)  ;box-shadow:none; border:none;" >
                {{-- Page Edit --}}
                <div id="page1" class="card card-rounded ">     
                </div>
                <div id="page2" class="card card-rounded ">     
                </div>
                  
            </div>
        </div>  
    </div>
   
      

        {{-- modal notifikasi --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div style="background-color: #0c4e68" class="modal-header">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Notifikasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="notifikasi" class="p-2"></div>
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
           edit(),
           editPengaturan()
      
       });
       // edit form
       function edit() {
           $.get("{{ url('toko/edit') }}", {}, function(data, status) {
               $("#page1").html(data); 
           });
       }

       function editPengaturan() {
           $.get("{{ url('toko/editPengaturan') }}", {}, function(data, status) {
               $("#page2").html(data); 
           });
       }
       // edit gambar
       function editgambar(){
           var files = $("#tgambar")[0].files;
           datas.append('tgambar',files[0]);
       }

    //    notifikasi
       function notif() {
            $.get("{{ url('notifikasi') }}" , {}, function(data, status) {
                $("#exampleModalLabel").html('Notifikasi')
                $("#notifikasi").html(data);
                $("#exampleModal").modal('show');
            });
        }

       // update data 1
       function update(id) {
           var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
           var tnama = $("#tnama").val();
           var talamat = $("#talamat").val();
           var thp = $("#thp").val();
           var temail = $("#temail").val();
           var tpemilik = $("#tpemilik").val();
           var twebsite = $("#twebsite").val();
           datas.append('tnama',tnama);
           datas.append('talamat',talamat);
           datas.append('thp',thp);
           datas.append('temail',temail);
           datas.append('tpemilik',tpemilik);
           datas.append('twebsite',twebsite);
           datas.append('_token',CSRF_TOKEN);
           $.ajax({
                url: "{{ url('toko/update') }}/" + id,
                method: 'post',
                data: datas,
                contentType: false,
                processData: false,
                dataType: 'json',
               success: function(response) 
               {
               if(response.success == 1){ 
                   edit()
                   notif()

               }    
               }
           });
           
       }

       function update2(id) {
           var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
           var tos = $("#tos").val();
        //    var tprintukuran = $("#tprintukuran").val();
        //    var tprintmodel = $("#tprintmodel").val();
        //    var tfooter = $("#tfooter").val();
        //    var tdiskonrp = $("#tdiskonrp").val();
        //    var tdiskonpersen = $("#tdiskonpersen").val();
        //    var tpajakpersen = $("#tpajakpersen").val();
        //    var tpajakrp = $("#tpajakrp").val();
           datas.append('tos',tos);
        //    datas.append('tprintukuran',tprintukuran);
        //    datas.append('tprintmodel',tprintmodel);
        //    datas.append('tfooter',tfooter);
        //    datas.append('tdiskonrp',tdiskonrp);
        //    datas.append('tdiskonpersen',tdiskonpersen);
        //    datas.append('tpajakrp',tpajakrp);
        //    datas.append('tpajakpersen',tpajakpersen);
           datas.append('_token',CSRF_TOKEN);
           $.ajax({
                url: "{{ url('toko/updatePengaturan') }}/" + id,
                method: 'post',
                data: datas,
                contentType: false,
                processData: false,
                dataType: 'json',
               success: function(response) 
               {
               if(response.success == 1){ 
                   edit2()
                   notif()

               }    
               }
           });
           
       }

       
   </script>
</body>

@endsection
