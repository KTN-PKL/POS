<h4>Apakah Anda Ingin Menghapus Pengguna Dengan Username {{ $pengguna->username }} ?</h4>
<div class="row">
<div class="col-md-1">
    <button class="btn btn-danger" onClick="destroy({{ $pengguna->id }})">Iya</button>
</div>
<div class="col-md-1 offset-md-8">
    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Tidak</button>
</div>
</div>


