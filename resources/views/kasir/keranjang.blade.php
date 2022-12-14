<div class="card card-rounded mb-4 ">
                <div  class="card-header text-white">
                    <h4> <i class="fa fa-shopping-cart"></i> Keranjang</h4>
                </div>
                    <div class="card-body">
                       {{-- Nama Customer --}}
                       <table border="0" cellpadding="5" cellspacing="2" width="100%">
                           
                        <tr> 
                            <td style="width:30%">
                            <label for="FirstName">NO BON</label>
                            </td> 
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="id" value="{{ $id->id_transaksi }}" readonly>
                                  </div>
                            </td> 
                        </tr>
                        <tr> 
                            <td>
                            <label for="FirstName">CUSTOMER</label>
                            <small class="text-danger"></small>
                            </td> 
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Recipient's username" aria-describedby="basic-addon2" id="nama" readonly>
                                    <input type="text" id="id_customer" hidden>
                                    <div class="input-group-append">
                                      <button style="background-color: #00642d" class="btn text-white" type="button" onclick="customer()"><i class="fa fa-search"></i></button>
                                      <button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                                    </div>
                                  </div>
                                  
                            </td> 
                        </tr>
                        <tr> 
                            <td>
                            <label for="FirstName">ATAS NAMA</label>
                            </td> 
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Recipient's username" id="nama1" aria-describedby="basic-addon2" onchange="noeror()" required>
                                  </div>
                                  <small style="display: none" class="text-danger" id="erorr1">Atas Nama Harus Diisi!</small>
                            </td> 
                        </tr>  
                        </table>
                        <br>
                        {{-- table pemesanan    --}}
                        <div id="barang"></div>
    
                    </div>
                     {{-- Pembayaran --}}
                     <div class="card-footer">
                       
                       <div id="hitung"></div>
                  
                       <button class="btn btn-xl" style="background-color: #00642d; border:none;width:100%"> <i class="fa fa-save text-white" style="font-size: 18px" onclick="menyimpan()"> <b>Simpan Transaksi</b></i></button>
                   </div>    
                    </div>    
            </div>
<script>
     $(document).ready(function() {
           barang(),
           hitung()
       });
    function noeror(){
        document.getElementById("erorr1").style.display = "none";
    }
    function barang(){
        var id = $("#id").val();
        $.get("{{ url('kasir/keranjang') }}/" + id, {}, function(data, status) {
               $("#barang").html(data);  
        });
    }
    function hitung(){
        $.get("{{ url('kasir/hitung') }}", {}, function(data, status) {
               $("#hitung").html(data);  
        });
    }
    function tambahbarang(id){
        var id_transaksi = $("#id").val();
        $.ajax({
                type: "get",
                url: "{{ url('kasir/tambahbarang') }}",
                data: {
                "id_item": id,
                "id_transaksi": id_transaksi,
                },
                success: function(data, status) {
                barang(),
                table(),
                total()
                if (data == 1) {
                Swal.fire(
                    {
                        type: 'success',
                        title: 'Berhasil',
                        text: 'Item Berhasil Ditambahkan!'
                        }
                    )
                } else {
                    Swal.fire(
                    {
                        type: 'error',
                        title: 'Gagal',
                        text: 'Stok Sudah Habis!'
                        }
                    )
                }
                }
               
            });
       }
    
</script>