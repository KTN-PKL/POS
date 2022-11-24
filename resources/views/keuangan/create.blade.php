<div class="p2">
    <div class="form-group">
        <label class="form-label">Akun</label>
        <select class="form-select" id="jenis" onchange="jenis()">
            <option  selected disabled>--Akun--</option>
            @foreach ($akun as $item)
            <option  value="{{ $item->id_akun }}">{{ $item->akun }}</option>
            @endforeach
        </select>
        <small style="display: none" class="text-danger" id="required1">Jenis Harus Dipilih!</small>
        <br>
        <label style="display: none" id="keluar" class="form-label">Masukan Pengeluaran</label>
        <label style="display: none" id="masuk" class="form-label">Masukan Pemasukan</label>
        <input style="display: none" type="text" name="uang" id="uang" class="form-control" placeholder="Masukan Uang">
        <small style="display: none" class="text-danger" id="required3">Harus Memasukan Uang!</small>
        <br>
        <label class="form-label">Keterangan</label>
        <small style="display: none" class="text-danger" id="required2">Keterangan Harus Diisi!</small>
        <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="3"></textarea>
    </div>
    <div class="form-group mt-2">
        <button class="btn btn-success" onClick="store()">Create</button>
    </div>
    
</div>

<script>
    function jenis()
    {
        var jenis = $("#jenis").val();
        $.get("{{ url('keuangan/jenis') }}/" + jenis, {}, function(data, status) {
            document.getElementById("uang").style.display = "block";
               if (data == "Pengeluaran") {
                document.getElementById("keluar").style.display = "block";
                document.getElementById("masuk").style.display = "none";
               } else {
                document.getElementById("keluar").style.display = "none";
                document.getElementById("masuk").style.display = "block";
               }
            });
    }
</script>