<div class="p2">
    <div class="form-group">
        <input type="text" class="form-control" value="{{ $stok->item }}" readonly>
        <br>
        <input type="text" name="stok" id="stok" class="form-control" placeholder="Mauskan stok">
    </div>
    <div class="form-group mt-2">
        <button class="btn btn-success" onClick="update({{ $stok->id_stok }})">Tambah</button>
    </div>
</div>
