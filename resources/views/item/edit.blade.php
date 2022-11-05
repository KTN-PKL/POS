<div class="p2">
    <div class="form-group">
        <input type="text" name="kategori" id="kategori" value="{{ $kategori->kategori }}" class="form-control"
            placeholder="Maskan Kategori">
    </div>
    <div class="form-group mt-2">
        <button class="btn btn-warning" onClick="update({{ $kategori->id_kategori }})">Edit</button>
    </div>
</div>
