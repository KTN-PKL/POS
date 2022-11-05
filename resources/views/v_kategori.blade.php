@extends('layout.template')
@section('content')
<br>
<br>
<div class="container">
<h2 style="margin-left: 1em" ><b>Kategori</h2>
<button style="margin-left: 2em" type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
    <i class="fa fa-plus"></i>  Tambah Kategori
</button>
</div>
@endsection

<div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <div>
            <h4 class="modal-title" id="exampleModalLabel"><b>Tambah Kategori</b></h4>
          </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
            <div id="alert"></div>
            <div class="mb-3">
              <label class="form-label">Kategori</label>
              <input type="text" class="form-control" name="kategori" placeholder="Masukan Kategori">
            </div>
            
          </div>
          <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <div id="tombol_login">
              <input class="btn btn-primary" type="submit" value="Tambah">
            </div>
          </div>
        </div>
        <!-- /.modal-content -->
    </div>
  </div>