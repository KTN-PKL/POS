<div class="p2">
    <div class="form-group">
        <label class="form-label">Akun</label>
        <input type="text" class="form-control" value="{{ $keuangan->akun }}" readonly>
        <br>
        @if ($keuangan->jenis == "Pengeluaran")
        <label id="keluar" class="form-label">Masukan Pengeluaran</label> 
        @else
        <label id="masuk" class="form-label">Masukan Pemasukan</label>
        @endif
        <input type="text" name="uang" id="uang" class="form-control" placeholder="Masukan Uang" value="{{ $keuangan->uang }}">
        <br>
        <label class="form-label">Keterangan</label>
        <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="3">{{ $keuangan->keterangan }}</textarea>
    </div>
    <div class="form-group mt-2">
        <button class="btn btn-success" onClick="update({{ $keuangan->id_keuangan }})">Edit</button>
    </div>
</div>

