<div class="p2">
    <div class="mb-3">
        <label class="form-label">Nama Item</label>
        <input type="text" id="item" class="form-control" placeholder="Masukan Item" value="{{ $item->item }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select type="text" id="id_kategori" class="form-control">
            @foreach ($kategori as $items)
            <option value="{{ $items->id_kategori }}" @if ($items->id_kategori == $item->id_kategori)
                selected
            @endif>{{ $items->kategori }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Harga Beli</label>
        <input type="number" id="beli" class="form-control" placeholder="Masukan Harga Beli" value="{{ $item->beli }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Harga Jual</label>
        <input type="number" id="jual" class="form-control" placeholder="Masukan Harga Jual" value="{{ $item->jual }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Stok Minimal</label>
        <input type="number" id="minim" class="form-control" placeholder="Masukan Stok Minimal" value="{{ $item->minim }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Foto Item</label>
        <input type="file" id="foto" name="foto" class="form-control" placeholder="Masukan Foto Item" onchange="editgambar()">
    </div>
    <div class="form-group mt-2">
        @php
             $urutan = (int) substr($item->id_item, 3, 3);
        @endphp
        <button class="btn btn-warning" onClick="update({{ $urutan }})">Edit</button>
    </div>
</div>
