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
                @php
                    date_default_timezone_set("Asia/Jakarta");
                    $d = date("Y-m");
                @endphp
                <div id="testing"></div>
                <input type="month" id="cekws" class="form-control col-md-3"  value="{{ $d }}" onchange="read()">
                <div class="mt-3">
                    <div class="card" style="width: 1100px">
                        <div class="card-header">
                            <h5 class="text-white" > <i class="fa fa-tag"></i> <b id="pala"></b></h5>
                        </div>
                        <div class="card-body">
                            <h4 style="text-align: center">Cash Flow Usaha</h4>
                            <h4 style="text-align: center" id="bulan"></h4>
                        <div id="table"></div>
                        </div>
                    </div>
                </div> 
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
    
        function read() {
            const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            var tanggal = $("#cekws").val();
            var hasil = tanggal.split("-");
            var bulan = months[hasil[1]-1];
            $("#pala").html('Cash Flow Periode '+bulan+' '+hasil[0]);
            $("#bulan").html('Periode '+bulan+' '+hasil[0]);
            $.ajax({
                type: "get",
                url: "{{ url('cashflow/read') }}",
                data: {
                "tanggal": tanggal,
                },
            success: function(data, status) {
                $("#table").html(data);
                $("#untung").html('Keuntungan Bersih Periode '+bulan+' '+hasil[0]);
                $("#rugi").html('Kerugian Bersih Periode '+bulan+' '+hasil[0]);
                }
            });
        }
    </script>
</body>

@endsection
