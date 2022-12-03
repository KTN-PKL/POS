<div class="p2">
    <div class="form-group">
        <label class="form-label">Grandtotal</label>
        @php
            $grandtotal = number_format($transaksi->grandtotal,0,",",".");
            $kode = $transaksi->id_transaksi;
                $urutan = (int) substr($kode, 3, 3);
        @endphp
        <input type="text" id="grandtotal" class="form-control" placeholder="Masukan Akun" value="{{ $grandtotal }}" readonly>
        <label class="form-label">Bayar</label>
        <input type="text" class="form-control" id="bayar" value="0" aria-describedby="basic-addon2" onkeyup="bayar()">
        <label class="form-label">Kembali</label>
        <input type="text" id="kembalian" class="form-control" value="0" readonly>
        <small style="display: none" class="text-danger" id="kurang">Pembayaran Kurang!</small>
    </div>
    <div class="form-group mt-2">
        <button class="btn btn-success" onClick="updated({{ $urutan }})">Bayar</button>
    </div>
</div>

