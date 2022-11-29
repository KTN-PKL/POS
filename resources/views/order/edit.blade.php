<div class="p2">
    <div class="form-group">
        <label class="form-label">Akun</label>
        <input type="text" name="akun" id="akun" class="form-control" placeholder="Masukan Akun" value="{{ $akuntansi->akun }}">
        <small style="display: none" class="text-danger" id="required1">Akun Harus Diisi!</small>
        <small style="display: none" class="text-danger" id="unique">Akun Sudah Ada!</small>
        <br>
        <label class="form-label">Jenis</label>
        <select class="form-select" id="jenis">
            <option @if ($akuntansi->jenis == "Pemasukan") selected @endif value="Pemasukan">Pemasukan</option>\
            <option @if ($akuntansi->jenis == "Pengeluaran") selected @endif value="Pengeluaran">Pengeluaran</option>
        </select>
    </div>
    <div class="form-group mt-2">
        <button class="btn btn-success" onClick="update({{ $akuntansi->id_akun }})">Edit</button>
    </div>
</div>

