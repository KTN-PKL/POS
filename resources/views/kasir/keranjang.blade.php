<div class="card card-rounded mb-4 ">
                <div style="background-color:#0c4e68" class="card-header text-white">
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
                                      <button style="background-color: #0c4e68" class="btn text-white" type="button" onclick="customer()"><i class="fa fa-search"></i></button>
                                      <button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                                    </div>
                                  </div>
                                  <small class="text-danger">*Khusus Member</small>
                            </td> 
                        </tr>
                        <tr> 
                            <td>
                            <label for="FirstName">ATAS NAMA</label>
                            </td> 
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Recipient's username" id="nama1" aria-describedby="basic-addon2">
                                  </div>
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
                  
                       <button class="btn btn-xl" style="background-color: #0c4e68; border:none;width:100%"> <i class="fa fa-save text-white" style="font-size: 18px" onclick="menyimpan()"> <b>Simpan Transaksi</b></i></button>
                   </div>    
                    </div>    
            </div>
<script>
     $(document).ready(function() {
           barang(),
           hitung()
       });
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
                total(),
                Swal.fire(
                    {
                        type: 'success',
                        title: 'Berhasil',
                        text: 'Item Berhasil Ditambahkan!'
                        }
                    )
                
                }
            });
       }
    
</script>