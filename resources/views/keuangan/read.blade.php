<div class="card" style="width: 1000px">
    <div style="background-color:#0c4e68" class="card-header">
        <h5 class="text-white" > <i class="fa fa-tag"></i> <b>Daftar Akun</b></h5>
    </div>
    <div class="card-body">
        <div class="input-group col-md-4 offset-8">
            <input onkeyup="cari()" id="cari" type="search" class="form-control input-sm" placeholder="Search Akun" aria-label="Search" aria-describedby="search-addon" />     
            {{-- <button type="button" class="btn btn-outline-primary">Search</button> --}}
          </div>
          <br>
      
<div id="table"></div>
</div>
</div>


<script>
     $(document).ready(function() {
        table()
    });
    function table() {
            $.get("{{ url('keuangan/table') }}", {}, function(data, status) {
                $("#table").html(data);
            });
        }
    function cari() {
            var cari = $("#cari").val();
            if (cari == "") {
                table()
            } else {
                $.get("{{ url('keuangan/cari') }}/" + cari, {}, function(data, status) {
                $("#table").html(data);
            });
            }
        }
</script>