<div class="card card-rounded mb-4 ">
    <div style="background-color:#0c4e68" class="card-header text-white">
        <h4>Foto Profil</h4>
    </div>
        <div class="card-body">
            <span id="uploaded_image"></span>
           <img style="display:none; margin:auto;" width="300px" height="300" src="{{asset('/fotouser/'. $pengguna->foto)}}" alt="">
        </div>    
</div>


<script>
     $(document).ready(function() {
        table()
    });
    function table() {
            $.get("{{ url('kategori/table') }}", {}, function(data, status) {
                $("#table").html(data);
            });
        }
    function cari() {
            var cari = $("#cari").val();
            if (cari == "") {
                table()
            } else {
                $.get("{{ url('kategori/cari') }}/" + cari, {}, function(data, status) {
                $("#table").html(data);
            });
            }
        }
</script>