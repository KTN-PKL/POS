<div class="p2">
    <div class="mb-3">
        <label class="form-label">Nama Customer</label>
        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Customer" value="{{ $customer->nama }}">
    </div>
    <div class="mb-3">
        <label class="form-label">No HP/WA</label>
        <input type="number" name="kontak" id="kontak" class="form-control" placeholder="Masukan No HP/WA" value="{{ $customer->kontak }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat" value="{{ $customer->alamat }}">
    </div>
    <div class="form-group mt-2">
        @php
             $urutan = (int) substr($customer->id_customer, 3, 3);
        @endphp
        <button class="btn btn-warning" onClick="update({{ $urutan }})">Edit</button>
    </div>
</div>
