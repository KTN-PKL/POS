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
                <br>
                <button class="btn btn-success" onClick="create()"> <i class="fa fa-plus"></i> <b>Tambah Pengguna</b></button>
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
        this.datas = new FormData();
        $(document).ready(function() {
            read()
        });
        // Read Database
        function read() {
            $.get("{{ url('pengguna/read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }
        // Untuk modal halaman create
        function create() {
            $.get("{{ route('pengguna.create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Tambah pengguna')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        // untuk proses create data
        function store() {
            var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            var name = $("#name").val();
            var username = $("#username").val();
            var password = $("#password").val();
            var telepon = $("#telepon").val();
            var alamatuser = $("#alamatuser").val();
            var files = $("#foto")[0].files;
            datas.append('foto',files[0]);
            datas.append('name',name);
            datas.append('username',username);
            datas.append('password',password);
            datas.append('telepon',telepon);
            datas.append('alamatuser',alamatuser);
            datas.append('_token',CSRF_TOKEN);
            $.ajax({
                 url: "{{route('pengguna.store')}}",
                 method: 'post',
                 data: datas,
                 contentType: false,
                 processData: false,
                 dataType: 'json',
            success: function(response) {
                if(response.success == 1){ 
                    $(".btn-close").click();
                    read();
                    Swal.fire({
                    title: 'Berhasil',
                    text: "Anda Telah Berhasil Menambahkan Pengguna",
                    type: 'success'
                    })
                }
                }
            });
        }

        // Untuk modal halaman edit show
        function edit(id) {
            $.get("{{ url('pengguna/edit') }}/" + id, {}, function(data, status) {
                $("#exampleModalLabel").html('Edit Product')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        function hapus(id) {
            // $.get("{{ url('pengguna/delete') }}/" + id, {}, function(data, status) {
            //     $("#exampleModalLabel").html('delete Product')
            //     $("#page").html(data);
            //     $("#exampleModal").modal('show');
            // });
            Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Anda Ingin Menghapus Pengguna ",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Iya Saya Yakin!',
            cancelButtonText: 'Tidak'
            }).then((result) => {
            if (result.value) {
                destroy(id)
                Swal.fire({
                title: 'Terhapus',
                text: "Anda Telah Menghapus Pengguna ",
                type: 'success'
                })}
                })
        }

        function show(id) {
            $.get("{{ url('pengguna/show') }}/" + id, {}, function(data, status) {
                $("#exampleModalLabel").html('Detail Product')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        function editgambar(){
            var files = $("#foto")[0].files;
            datas.append('foto',files[0]);
        }
        // untuk proses update data
        function update(id) {
            var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            var name = $("#name").val();
            var username = $("#username").val();
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
                success: function(response) {
                if(response.success == 1){ 
                    $(".btn-close").click();
                    read();
                    Swal.fire({
                    title: 'Berhasil',
                    text: "Anda Telah Berhasil Mengedit Pengguna",
                    type: 'success'
                    })
                }
                }
            });
        }

        // untuk delete atau destroy data
        function destroy(id) {
            $.ajax({
                type: "get",
                url: "{{ url('pengguna/destroy') }}/" + id,
                success: function(data) {
                    $(".btn-close").click();
                    read()
                }
            });
        }
    </script>
</body>

@endsection
