<div class="p2">
    <div class="mb-3">
        <label class="form-label">Nama Pengguna</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Masukan Nama Pengguna" value="{{ $pengguna->name }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username" value="{{ $pengguna->username }}" readonly>
    </div>
    <div class="mb-3">
        <label class="form-label">Telepon</label>
        <input type="number" name="telepon" id="telepon" class="form-control" placeholder="Masukan Telepon" value="{{ $pengguna->telepon }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <input type="text" name="alamatuser" id="alamatuser" class="form-control" placeholder="Masukan Alamat" value="{{ $pengguna->alamatuser }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Pas Foto</label>
        <input type="file" name="foto" id="foto" class="form-control" placeholder="Masukan Pas Foto" onchange="editgambar()">
    </div>
    <div class="form-group mt-2">
        <button class="btn btn-warning" onClick="update({{ $pengguna->id }})">Edit</button>
    </div>
</div>
