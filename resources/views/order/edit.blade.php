<div class="p2">
    <div class="form-group">
        <label class="form-label">Grandtotal</label>
        <input type="text" id="grantotal" class="form-control" placeholder="Masukan Akun" value="{{ $transaksi->grantotal }}" readonly>
        <label class="form-label">Bayar</label>
        <input type="text" id="bayar" class="form-control" placeholder="Masukan Akun" value="0">
        <label class="form-label">Kembali</label>
        <input type="text" id="bayar" class="form-control" placeholder="Masukan Akun" value="{{ $akuntansi->akun }}">
    </div>
    <div class="form-group mt-2">
        <button class="btn btn-success" onClick="update({{ $akuntansi->id_akun }})">Bayar</button>
    </div>
</div>

