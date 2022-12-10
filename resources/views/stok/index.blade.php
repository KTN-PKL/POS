@extends('layout.template')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POS</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div id="cekstok"></div>
        <div class="row">
            <div class="col-lg-8">
                
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
            read(),
            cekstok()
        });
        // Read Database
        function read() {
            $.get("{{ url('stok/read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }
        function cekstok()
        {
            $.get("{{ url('stok/cekstok') }}", {}, function(data, status) {
                if (data > 0) {
                    $("#cekstok").html(`
                 <div class="alert alert-warning alert-block" id="alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Ada `+data+` Item dibawah Stok Minimal <a type="button" href="#" onclick="stokmin()" style="color: black; text-decoration: none;">Cek di Sini</a></strong>
                </div>
                `); 
                }
            });
        }
        
        function stokmin() {
            $.get("{{ url('stok/stokmin') }}", {}, function(data, status) {
                $("#table").html(data);
            });
        }

        // Untuk modal halaman edit show
        function edit(id) {
            $.get("{{ url('stok/edit') }}/" + id, {}, function(data, status) {
                jQuery.noConflict();
                $("#exampleModalLabel").html('Tambah Stok')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }


        // untuk proses update data
        function tambah(id) {
            var stok = $("#stok").val();
            $.ajax({
                type: "get",
                url: "{{ url('stok/tambah') }}/" + id,
                data: "stok=" + stok,
                success: function(data) {
                    $(".btn-close").click();
                    read()
                }
            });
        }
    </script>
</body>

@endsection
