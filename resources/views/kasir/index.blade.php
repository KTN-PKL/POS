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
    <div class="jumbotron p-5 rounded-3" style="background-color: rgb(240, 240, 240)">
            <div class="row">
             <div style="background-color: rgb(240, 240, 240)  ;box-shadow:none; border:none;" class="card col-sm-8" >
                <div class="card card-rounded ">
                    {{-- <div id="message" style="display: none" class="alert-success"><b>Sukses!</b> Profil Berhasil di update
                    <button></button>
                    </div> --}}
                    <div style="display:none" id="message">
                        <strong>Sukses!</strong> Akun Berhasil di update
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div style="background-color:#0c4e68" class="card-header text-white">
                    <h4 style="width:200px" > <i class="fa fa-cubes"></i> Daftar Menu</h4>
                </div>
                    <div class="card-body">
                        <div id="read">



                        </div> 
                            
                          
                    </div> 
                
                  
            </div>
            </div>
            <div style="background-color: rgb(240, 240, 240)  ;box-shadow:none; border:none;" class="card col-sm-4" >
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
                                    <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Recipient's username" aria-describedby="basic-addon2" value="B01" readonly>
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
                                    <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                      <button style="background-color: #0c4e68" class="btn text-white" type="button"><i class="fa fa-search"></i></button>
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
                                    <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                  </div>
                            </td> 
                        </tr>  
                    </table>
                    <br>
                        {{-- table pemesanan    --}}
                        <table class="table table-striped" width="100%" id="barang" style="border: none">
                            <tr>
                                <th style="width:5%" >No</th>
                                <th style="width:25%">Nama</th>
                                <th style="width:15%">Qty</th>
                                <th style="width:20%">Harga</th>
                                <th style="width:5%">#</th>
                            </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Susu</td>
                                    <td>   
                                       <input style="width:40px" type="number">
                                    </td>
                                    <td>Rp100.000,-</td>
                                    <td>
                                    <button class="btn btn-danger btn-sm" onClick=""> <i class="fa fa-times"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Baygon
                                    <td>   
                                       <input style="width:40px" type="number">
                                    </td>
                                    <td>Rp100.000,-</td>
                                    <td>
                                    <button class="btn btn-danger btn-sm" onClick=""> <i class="fa fa-times"></i></button>
                                    </td>
                                </tr>
                            
                        </table>
                    </div>
                     {{-- Pembayaran --}}
                     <div class="card-footer">
                       
                        <table border="0" cellpadding="5" cellspacing="2" width="100%">
                          
                           <tr> 
                               <td style="width:30%">
                               <label for="FirstName">STATUS</label>
                               </td> 
                               <td>
                                   <select type="text" id="#" class="form-select">
                                     <option selected disabled>-- Status Pembayaran --</option>
                                     <option value="">z</option>
                                     <option value="">a</option>
                                   </select>
                               </td> 
                           </tr>
                           <tr> 
                               <td style="width:30%">
                               <label for="FirstName">ORDER</label>
                               </td> 
                               <td>
                                   <select type="text" id="#" class="form-select">
                                     <option selected disabled>-- Kategori Order --</option>
                                     <option value="">z</option>
                                     <option value="">a</option>
                                   </select>
                               </td> 
                           </tr>
                           <tr> 
                               <td>
                               <label for="FirstName">TOTAL BAYAR</label>
                               <small class="text-danger"></small>
                               </td> 
                               <td>
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text">Rp</span>
                                       </div>
                                       <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Recipient's username" aria-describedby="basic-addon2" value="100000" readonly>
                                      
                                     </div>
                               </td> 
                           </tr>
                           <tr> 
                               <td>
                               <label for="FirstName">DISKON</label>
                               <small class="text-danger"></small>
                               </td> 
                               <td>
                                   <div class="input-group">
                                      
                                       <input type="number" class="form-control" aria-describedby="basic-addon2" value="0">
                                       <div class="input-group-append">
                                           <span class="input-group-text">%</span>
                                       </div>
                                     </div>
                               </td> 
                           </tr>
                           <tr> 
                               <td>
                               <label for="FirstName">PAJAK</label>
                               <small class="text-danger"></small>
                               </td> 
                               <td>
                                   <div class="input-group">
                                      
                                       <input type="number" class="form-control" aria-describedby="basic-addon2" value="0">
                                       <div class="input-group-append">
                                           <span class="input-group-text">%</span>
                                       </div>
                                     </div>
                               </td> 
                           </tr>
                           <tr> 
                               <td>
                               <label for="FirstName">DISKON</label>
                               <small class="text-danger"></small>
                               </td> 
                               <td>
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text">Rp</span>
                                       </div>
                                       <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Recipient's username" aria-describedby="basic-addon2" value="100000" readonly>
                                      
                                     </div>
                               </td> 
                           </tr>
                           <tr> 
                               <td>
                               <label for="FirstName">GRAND TOTAL</label>
                               <small class="text-danger"></small>
                               </td> 
                               <td>
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text">Rp</span>
                                       </div>
                                       <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Recipient's username" aria-describedby="basic-addon2" value="100000" readonly>
                                      
                                     </div>
                               </td> 
                           </tr>
                       </table>
                  
                       <button class="btn btn-xl" style="background-color: #0c4e68; border:none;width:100%"> <i class="fa fa-save text-white" style="font-size: 18px"> <b>Simpan Transaksi</b></i></button>
                   </div>    
                    </div>    
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
       // edit form
       function read() {
           $.get("{{ url('kasir/read') }}", {}, function(data, status) {
               $("#read").html(data);  
           });
       }
       // edit gambar
       function editgambar(){
           var files = $("#foto")[0].files;
           datas.append('foto',files[0]);
       }

       // update data
       function update(id) {
           var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
           var name = $("#name").val();
           var telepon = $("#telepon").val();
           var alamatuser = $("#alamatuser").val();
           datas.append('name',name);
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
                   edit(),
                   document.getElementById("namacok").innerHTML = response.name,
                   $('#message').css('display', 'block');
                    $('#message').html(response.pesan);
                    $('#message').addClass(response.class_name);
    
               }
               }
           });
           
       }

       function barang()
       {
        var barang = $("#barang").html();
         document.getElementById("barang").innerHTML = barang+` <tr>
                                    <td>1</td>
                                    <td>Susu</td>
                                    <td>   
                                       <input style="width:40px" type="number">
                                    </td>
                                    <td>Rp100.000,-</td>
                                    <td>
                                    <button class="btn btn-danger btn-sm" onClick=""> <i class="fa fa-times"></i></button>
                                    </td>
                                </tr>`
       }

       
   </script>
</body>

@endsection