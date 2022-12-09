@extends('layout.template')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <button class="btn btn-success" onClick="create()"> <i class="fa fa-plus"></i> <b>Tambah Aktivitas</b></button>
                <div id="read" class="mt-3"></div> 
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
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
            $.get("{{ url('keuangan/read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }
        // Untuk modal halaman create
        function create() {
            $.get("{{ route('keuangan.create') }}", {}, function(data, status) {
                jQuery.noConflict();
                $("#exampleModalLabel").html('Tambah keuangan')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        // untuk proses create data
        function store() {
            var jenis = $("#jenis").val();
            var uang = $("#uang").val();
            var keterangan = $("#keterangan").val();
            $.ajax({
                type: "get",
                url: "{{ url('keuangan/store') }}",
                data: {
                    "id_akun": jenis,
                    "uang": uang,
                    "keterangan": keterangan,
                },
                success: function(response) {
                    if (response.required1 == 2) {
                        document.getElementById("required1").style.display = "block";
                    } else {
                        document.getElementById("required1").style.display = "none";
                        if (response.required3 == 2) {
                        document.getElementById("required3").style.display = "block";}
                        else{
                            document.getElementById("required3").style.display = "none"; 
                        }
                    }
                    if (response.required2 == 2) {
                        document.getElementById("required2").style.display = "block";}
                        else {
                            document.getElementById("required2").style.display = "none";
                        }
                    if (response.required1 == 1) {
                        if (response.required3 == 1 && response.required2 == 1) {
                            $(".btn-close").click();
                            read()
                            Swal.fire({
                            title: 'Berhasil',
                            text: "Anda Telah Berhasil Menambah Akun",
                            type: 'success'
                    }) 
                }}
                }
            });
        }

        // Untuk modal halaman edit show
        function edit(id) {
            $.get("{{ url('keuangan/edit') }}/" + id, {}, function(data, status) {
                jQuery.noConflict();
                $("#exampleModalLabel").html('Edit Product')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        function uang() {
            var uang = $("#uang").val();
            var number_string = uang.replace(/[^,\d]/g, '').toString(),
	        split = number_string.split(','),
	        sisa  = split[0].length % 3,
	        rupiah  = split[0].substr(0, sisa),
	        ribuan  = split[0].substr(sisa).match(/\d{3}/gi);
            if(ribuan){
	    	separator = sisa ? '.' : '';
		    rupiah += separator + ribuan.join('.');
	        }
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            $("#uang").val(rupiah)
    }

        function hapus(id) {
            Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Anda Ingin Menghapus Aktivitas Keuangan? ",
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
                text: "Anda Telah Menghapus Aktivitas",
                type: 'success'
                })}
                })
        }

        // untuk proses update data
        function update(id) {
            var uang = $("#uang").val();
            var keterangan = $("#keterangan").val();
            $.ajax({
                type: "get",
                url: "{{ url('keuangan/update') }}/" + id,
                data: {
                    "uang": uang,
                    "keterangan": keterangan,
                },
                success: function(response) {
                    if (response.required1 == 2) {
                        document.getElementById("required1").style.display = "block";
                    } else {document.getElementById("required1").style.display = "none";}
                    if (response.required2 == 2) {
                        document.getElementById("required2").style.display = "block";}
                    else {  document.getElementById("required2").style.display = "none";}
                        if (response.required1 == 1 && response.required2 == 1) {
                            $(".btn-close").click();
                            read()
                            Swal.fire({
                            title: 'Berhasil',
                            text: "Anda Telah Berhasil Mengedit Akun",
                            type: 'success'
                    }) }} })
    }

        // untuk delete atau destroy data
        function destroy(id) {
            $.ajax({
                type: "get",
                url: "{{ url('keuangan/destroy') }}/" + id,
                success: function(data) {
                    $(".btn-close").click();
                    read()
                }
            });
        }
    </script>
</body>

@endsection
