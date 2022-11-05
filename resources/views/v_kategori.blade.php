@extends('layout.template')
@section('content')

<h2 style="margin-left: 1em" ><b>Kategori</h2>
<br>
<button style="margin-left: 2em" type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
    <i class="fa fa-plus"></i>  Tambah Kategori
</button>

@endsection

<div class="modal fade" id="tambah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <div>
            <h4 class="modal-title" id="exampleModalLabel"><b>Tambah Perusahaan</b></h4>
          </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <form enctype="multipart/form-data" method="POST" action="#">
            @csrf
          <div class="modal-body">
            <div id="alert"></div>
            <div class="mb-3">
              <label class="form-label">Nama Perusahaan</label>
              <input type="text" class="form-control" name="name" placeholder="Masukan Nama Perusahaan">
            </div>
            <div class="row">
              <div class="col">
              <label for="industri" class="form-label">Industri</label>
                <input name="industri"  type="text" class="form-control" placeholder="Industri" aria-label="industri">
              </div>
              <div class="col">
                <label for="ukuran" class="form-label">Ukuran</label>
                <input name="ukuran" type="text" class="form-control" placeholder="Ukuran" aria-label="ukuran">
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="text" class="form-control" name="email" placeholder="Masukan Email">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input name="password" type="password" class="form-control" pattern="(?=.*\d)(?=.).{8,}" id="formGroupExampleInput3" placeholder="Masukkan Password" >
              <p id="invalid-passowrd" style="display:none;color:red">Panjang password minimal 8 kareter, dan harus mengandung huruf kapital, angka, dan simbol</p>
            </div>
            <div class="mb-3">
              <label for="password-confirm" class="form-label">Konfirmasi Password</label>
              <input name="password_confirmation" type="password" class="form-control" id="formGroupExampleInput4" placeholder="Masukkan Password">
            </div>
            <div class="mb-3">
              <label class="form-label">Website</label>
              <input name="website" type="text" class="form-control" placeholder="Masukkan Website">
            </div>
            <div class="row mb-3">                       
              <label class="form-label">Deskripsi</label>
              <div class="col-md-16">
               <textarea name="deskripsi" class="my-editor form-control" id="my-editor" cols="30" rows="10"></textarea>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Alamat</label>
              <input type="test" class="form-control" name="alamat" placeholder="Masukan Alamat">
          </div>
          <div class="mb-3">
                  <!-- Upload image input-->
                  <label class="form-label">Logo</label>
                      <input type="file" onchange="readURL(this);" class="form-control"  name="logo" placeholder="Logo ...">
                  <!-- Uploaded image area-->
                  <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>                            
          </div>
          </div>
          <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <div id="tombol_login">
              <input class="btn btn-primary" type="submit" value="Tambah">
            </div>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
  </div>