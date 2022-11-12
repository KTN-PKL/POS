<h4>Apakah Anda Ingin Menghapus Item {{ $item->item }} ?</h4>
<div class="row">
<div class="col-md-1">
    @php
    $urutan = (int) substr($item->id_item, 3, 3);
@endphp
    <button class="btn btn-danger" onClick="destroy({{ $urutan }})">Iya</button>
</div>
<div class="col-md-1 offset-md-9">
    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Tidak</button>
</div>
</div>


