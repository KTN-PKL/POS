<div class="p2">
    <div class="form-group">
        <label class="form-label">Akun</label>
        <input type="text" name="akun" id="akun" class="form-control" placeholder="Masukan Akun">
        <small style="display: none" class="text-danger" id="required1">Akun Harus Diisi!</small>
        <small style="display: none" class="text-danger" id="unique">Akun Sudah Ada!</small>
        <br>
        <label class="form-label">Jenis</label>
        <select class="form-select" id="jenis">
            <option  selected disabled>--Jenis--</option>
            <option  value="Pemasukan">Pemasukan</option>\
            <option  value="Pengeluaran">Pengeluaran</option>
        </select>
        <small style="display: none" class="text-danger" id="required2">Jenis Harus Dipilih!</small>
    </div>
    <div class="form-group mt-2">
        <button class="btn btn-success" onClick="store()">Create</button>
    </div>
</div>
