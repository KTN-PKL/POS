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
                <input type="text" id="cek" value="{{ $view }}" hidden>
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
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="page1" class="p-2"></div>
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
            $.get("{{ url('order/read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }

        // Untuk modal halaman edit show
        function edit(id) {
            $(".btn-close").click();
            $.get("{{ url('order/edit') }}/" + id, {}, function(data, status) {
                $("#exampleModalLabel").html('Edit Product')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }
        function show(id) {
            $.get("{{ url('order/show') }}/" + id, {}, function(data, status) {
                $("#exampleModalLabel1").html('Detail Penjualan')
                $("#page1").html(data);
                $("#exampleModal1").modal('show');
            });
        }

        function hapus(id) {
            Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Anda Ingin Menghapus Transaksi? ",
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
                text: "Anda Telah Menghapus Transaksi ",
                type: 'success'
                })}
                })
        }

        function rupiah()
        {
            var bayar = $("#bayar").val();
            var number_string = bayar.replace(/[^,\d]/g, '').toString(),
	        split = number_string.split(','),
	        sisa  = split[0].length % 3,
	        rupiah  = split[0].substr(0, sisa),
	        ribuan  = split[0].substr(sisa).match(/\d{3}/gi);
            if(ribuan){
	    	separator = sisa ? '.' : '';
		    rupiah += separator + ribuan.join('.');
	        }
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            $("#bayar").val(rupiah)
        }

        function bayar(){
        var gt = $("#grandtotal").val();
        var bayar = $("#bayar").val();
        $.ajax({
                type: "get",
                url: "{{ url('kasir/kembalian') }}",
                data: {
                "gt": gt,
                "bayar": bayar,
                },
                success: function(data) {
                    $("#kembalian").val(data); 
                }
            });
            rupiah()
    }

    function updated(id) {
        var bayar = $("#bayar").val();
        var kembalian = $("#kembalian").val(); 
        $.ajax({
                type: "get",
                url: "{{ url('order/update') }}/" + id,
                data: {
                "kembalian": kembalian,
                "bayar": bayar,
                },
                success: function(data) {
                    if (data == 1) {
                        document.getElementById("kurang").style.display = "block";
                    } else {
                        $(".btn-close").click();
                        var id =  $("#cek").val();
                            table(id)
                            Swal.fire({
                            title: 'Berhasil',
                            text: "Anda Telah Berhasil Melakukan Pembayaran",
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
                url: "{{ url('order/destroy') }}/" + id,
                success: function(data) {
                    read()
                }
            });
        }
    </script>
</body>

@endsection
