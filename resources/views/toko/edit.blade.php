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
                        <input type="text" class="form-control" id="id" placeholder="Nama Customer" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ $id->id_transaksi }}" readonly>
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
        </div>
    <div class="mb-3">
        <!-- Upload image input-->
        <label class="form-label">Upload Foto <i style="font-size: 10px" class="text-danger">Opsional</i></label>
            <input type="file" onchange="editgambar()" class="form-control @error('foto') is-invalid @enderror"  name="foto" id="foto" placeholder="foto ...">
            @error('foto')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
      </div>

    <div class="form-group mt-2">
        <button class="btn btn-warning" onClick="update({{ $pengguna->id }})">Simpan</button>
    </div>

</div>
    

