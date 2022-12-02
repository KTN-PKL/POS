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
    <div style="margin-left: 1em;margin-right:1em;" class="mt-5">
        <div class="row">
            <div class="col-lg-12">
                <br>
                <button class="btn btn-secondary" onClick="modalSearch()"> <i class="fa fa-plus"></i> <b>Pencarian</b></button>
                <button class="btn btn-success" onclick="modalExcel()"> <i class="fa fa-plus"></i> <b>File Excel</b></button>
                {{-- <a href="{{route('laporan.export')}}" class="btn btn-success" > <i class="fa fa-download"></i> <b>Download Semua</b></a>
                <a href="{{route('laporan.export')}}" class="btn btn-success" > <i class="fa fa-download"></i> <b>Download Sebagian</b></a> --}}

                <div id="read" class="mt-3"></div> 
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
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
    
     <!-- Modal 2 -->
     <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="page2" class="p-2"></div>
                </div>
            </div>
        </div>
    </div>

    {{--  Start Modal Excel --}}
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">File Excel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center>
                        <a href="{{route('laporan.export')}}" class="btn btn-success" > <i class="fa fa-download"></i> <b>Download Semua</b></a>
                        <a id="btn2" href="#" onclick="downloadSebagian()" class="btn btn-success" > <i class="fa fa-download"></i> <b>Download Sebagian</b></a>
                    </center>
                    <div class="p2" id="p2" style="display: none">
                        <form action="/laporan/exportfilter" method="GET">
                        <div class="form-group">
                            <label for="tanggal1">Tanggal Awal</label>
                            <input type="date" name="ex" id="ex" class="form-control" placeholder="Masukan fromData">
                        </div>
                        <div class="form-group">
                            <label for="tanggal2">Tanggal Akhir</label>
                            <input type="date" name="to" id="to" class="form-control" placeholder="Masukan toDate">
                        </div>
                        <div class="form-group mt-2">
                            <center>
                            <button class="btn btn-success" type="submit">Download</button>
                            </center>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Excel --}}

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
            $.get("{{ url('laporan/read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }
        // Untuk modal halaman create
        function modalSearch() {
            $.get("{{ route('laporan.search') }}", {}, function(data, status) {
                $("#exampleModalLabel2").html('Pencarian Data')
                $("#page2").html(data);
                $("#exampleModal2").modal('show');
            });
        }

        // Untuk modal halaman Download Excel
        function modalExcel() {
            $.get("{{ route('laporan') }}", {}, function(data, status) {
                $("#exampleModalLabel3").html('File Excel')
                $("#page3").html(data);
                $("#exampleModal3").modal('show');
            });
        }
        
      

        

        // Untuk modal halaman edit show
        function edit(id) {
            $.get("{{ url('laporan/edit') }}/" + id, {}, function(data, status) {
                $("#exampleModalLabel").html('Detail Penjualan')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        function hapus(id) {
            Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Anda Ingin Menghapus laporan ",
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
                text: "Anda Telah Menghapus laporan ",
                type: 'success'
                })}
                })
        }

        // untuk proses update data
        function update(id) {
            var laporan = $("#laporan").val();
            $.ajax({
                type: "get",
                url: "{{ url('laporan/update') }}/" + id,
                data: "laporan=" + laporan,
                success: function(data) {
                    $(".btn-close").click();
                    read()
                }
            });
        }

        // Function download excel filter
        function downloadSebagian(){
            document.getElementById("p2").style.display = "block";
            document.getElementById("btn2").style.color = "grey";
        }

        // function downloadExcel(){
        //     var ex = $("#ex").val();
        //     var to = $("#to").val();
        //     $.ajax({
        //         type: "get",
        //         url: "{{ url('laporan/exportfilter') }}",
        //         data: {
        //             "ex": ex,
        //             "to": to,
        //         },
        //         success: function(data) {
        //             $(".btn-close").click();
        //         }
        //     })
        // }
        //end download filter excel

        


        // untuk delete atau destroy data
        function destroy(id) {
            $.ajax({
                type: "get",
                url: "{{ url('laporan/destroy') }}/" + id,
                success: function(data) {
                    $(".btn-close").click();
                    read()
                }
            });
        }
    </script>
</body>

@endsection
