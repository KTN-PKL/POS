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
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <h1>Item</h1>
                <br>
                <button class="btn btn-primary" onClick="create()">+ Tambah Item</button>
                <div id="read" class="mt-3"></div> 
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="page" class="p-2"></div>
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
        $(document).ready(function() {
            read()
        });
        // Read Database
        function read() {
            $.get("{{ url('item/read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }
        // Untuk modal halaman create
        function create() {
            $.get("{{ route('item.create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Tambah Item')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        // untuk proses create data
        function store() {
            var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            var item = $("#item").val();
            var id_kategori = $("#id_kategori").val();
            var beli = $("#beli").val();
            var jual = $("#jual").val();
            var minim = $("#minim").val();
            var files = $("#foto")[0].files;
            var datas = new FormData();
            datas.append('foto',files[0]);
            datas.append('item',item);
            datas.append('id_kategori',id_kategori);
            datas.append('beli',beli);
            datas.append('jual',jual);
            datas.append('minim',minim);
            datas.append('_token',CSRF_TOKEN);
            $.ajax({
                 url: "{{route('item.store')}}",
                 method: 'post',
                 data: datas,
                 contentType: false,
                 processData: false,
                 dataType: 'json',
            success: function(response) {
                if(response.success == 1){ 
                    $(".btn-close").click();
                    read()
                }
                }
            });
        }

        // Untuk modal halaman edit show
        function show(id) {
            $.get("{{ url('kategori/show') }}/" + id, {}, function(data, status) {
                $("#exampleModalLabel").html('Edit Product')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        // untuk proses update data
        function update(id) {
            var kategori = $("#kategori").val();
            $.ajax({
                type: "get",
                url: "{{ url('kategori/update') }}/" + id,
                data: "kategori=" + kategori,
                success: function(data) {
                    $(".btn-close").click();
                    read()
                }
            });
        }

        // untuk delete atau destroy data
        function destroy(id) {
            $.ajax({
                type: "get",
                url: "{{ url('kategori/destroy') }}/" + id,
                
            });
            read();
        }
    </script>
</body>

@endsection
