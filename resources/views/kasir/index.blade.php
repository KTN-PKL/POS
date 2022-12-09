
@extends('layout.template')
@section('content')

<style>
    @media print {
		body * {
			visibility: hidden;
		}
		.modal-content * {
			visibility: visible;
			overflow: visible;
		}
		.main-page * {
			display: none;
		}
		.modal {
			position: absolute;
			left: 0;
			top: 0;
			margin: 0;
			padding: 0;
			min-height: 550px;   
			visibility: visible;
			overflow: visible !important; 
		}
		.modal-dialog {
			visibility: visible !important;
			overflow: visible !important; 
            font-size:14px!important;
		}
        #print{
            visibility: hidden;
        }
	}
	</style>

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
                <div  class="card-header text-white">
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
       
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="page" class="p-2"></div>
                            <button id="print" onclick="printNota()">Print Nota</button>
                        </div>
                    </div>
                </div>
            </div>

<!-- Modal -->


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

       function ubah(id){
        var id_transaksi = $("#id").val();
        var qty = $("#qty").val();
        $.ajax({
                type: "get",
                url: "{{ url('kasir/ubahqty') }}",
                data: {
                "id_item": id,
                "id_transaksi": id_transaksi,
                "qty": qty,
                },
                success: function(response) {
                barang(),
                table(),
                total()
                }
            });
        }
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

       function customer() {
            $.get("{{ route('kasir.customer') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Daftar Customer')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }
        function add(id){
            $.get("{{ url('kasir/add') }}/" + id, {}, function(data, status) {
               $("#nama").val(data.nama);  
               $("#nama1").val(data.nama);
               $("#id_customer").val(data.id_customer);  
               $(".btn-close").click();
           });
        }
        function menyimpan(){
        var id_transaksi = $("#id").val();
        var total = $("#total1").val();
        var id_customer = $("#id_customer").val();
        var atasnama = $("#nama1").val();
        var grandtotal = $("#grandtotal1").val();
        var discountrate = $("#discountrate").val();
        var pajakrate = $("#pajakrate").val();
        var discount = $("#discount").val();
        var pajak = $("#pajak").val();
        var status = $("#status").val();
        var order = $("#order").val();
        var bayar = $("#bayaru").val();
        var kembali = $("#kembalian").val();
        $.ajax({
                type: "get",
                url: "{{ url('kasir/simpantransaksi') }}",
                data: {
                "id_transaksi": id_transaksi,
                "total": total,
                "id_customer": id_customer,
                "atasnama": atasnama,
                "grandtotal": grandtotal,
                "discountrate": discountrate,
                "pajakrate": pajakrate,
                "discount": discount,
                "pajak": pajak,
                "status": status,
                "order": order,
                "bayar": bayar,
                "kembali": kembali,
                },
                success: function(response) {
                    if (response.success == 1) {
                        document.getElementById("erorr1").style.display = "block";
                    }
                    if (response.success1 == 1) {
                        document.getElementById("erorr2").style.display = "block";
                    }
                    if (response.success2 == 1) {
                        document.getElementById("erorr3").style.display = "block";
                    }
                    if (response.success == 1 || response.success1 == 1 || response.success2 == 1) {}
                    else {
                    nota()
                    }
                }
            });
        }

        function nota(){
            var id = $("#id").val();
            $.get("{{ url('kasir/nota') }}/" + id, {}, function(data, status) {
                $("#exampleModalLabel").html('Struk Penjualan')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
            transaksi()
        }

        function printNota(){

        window.print();
        }
            
            
        
   </script>
</body>

@endsection