<div class="p2">
    <div class="form-group">
        <label for="username">Username</label><br>
        <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{$pengguna->username}}" readonly>
    @error('username')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="form-group">
        <label for="username">Nama Pengguna</label><br>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$pengguna->name}}" >
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>

    <div class="form-group">
        <label for="telepon">Telepon</label><br>
        <input type="number" name="telepon" id="telepon" class="form-control @error('telepon') is-invalid @enderror " value="{{$pengguna->telepon}}" >
    @error('telepon')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>

    <div class="form-group">
        <label for="alamatuser">Alamat</label><br>
        <input type="text" name="alamatuser" id="alamatuser" class="form-control @error('alamat') is-invalid @enderror" value="{{$pengguna->alamatuser}}" >
    @error('alamat')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>

    <div class="mb-3">
        <!-- Upload image input-->
        <label class="form-label">Upload Foto <i style="font-size: 10px" class="text-danger">Opsional</i></label>
            <input type="file" onchange="editgambar()" class="form-control @error('foto') is-invalid @enderror"  name="foto" id="foto" placeholder="foto ...">
            @error('foto')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
      </div>

    <div class="form-group mt-2">
        <button class="btn btn-warning" onClick="update({{ $pengguna->id }})">Simpan</button>
    </div>

    
</div>
