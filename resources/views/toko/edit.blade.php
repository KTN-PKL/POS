      
    <div class="card-header text-white" style="background-color:#0c4e68" >
        <h5> <i class="fa fa-edit"></i> Informasi Toko</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col col-sm-6">
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Nama Toko</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="tnama" aria-describedby="basic-addon2" value="{{$toko->tnama}}">
                </div>
                </div>    
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Alamat Toko</label>
                <div class="col-sm-9">
                    <textarea type="text" class="form-control" id="talamat" aria-describedby="basic-addon2" >{{$toko->talamat}}</textarea>
                </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Telepon Toko</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="thp" aria-describedby="basic-addon2" value="{{$toko->thp}}" >
                </div>
                </div>
            </div>
            <div class="col col-sm-6">
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Email Toko</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="temail" aria-describedby="basic-addon2" value="{{$toko->temail}}">
                </div>
                </div>    
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Pemilik Toko</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="tpemilik" aria-describedby="basic-addon2" value="{{$toko->tpemilik}}">
                </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Website Toko</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="twebsite" aria-describedby="basic-addon2" value="{{$toko->twebsite}}">
                </div>
                </div>
            </div>
        </div>
    </div>
<div class="card-footer text-muted">
    <button style="background-color:  #0c4e68" type="submit" class="btn btn-md text-white"  onClick="update({{ $toko->id_toko }})"><i class="fa fa-save text-white"></i> Save </button>

</div>

<br>
<br>
{{-- Nama Customer --}}
          
   
    {{-- <div class="mb-3">
        <!-- Upload image input-->
        <label class="form-label">Upload Foto <i style="font-size: 10px" class="text-danger">Opsional</i></label>
            <input type="file" onchange="editgambar()" class="form-control @error('foto') is-invalid @enderror"  name="foto" id="foto" placeholder="foto ...">
            @error('foto')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
      </div> --}}

    {{-- <div class="form-group mt-2">
        <button class="btn btn-warning" onClick="update({{ $toko->id }})">Simpan</button>
    </div> --}}


    

