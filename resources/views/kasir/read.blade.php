
    <div class="card-body">
        <div class="input-group col-md-4 offset-8">
            <input onkeyup="cari()" id="cari" type="search" class="form-control input-sm" placeholder="Search Kategori" aria-label="Search" aria-describedby="search-addon" />     
            {{-- <button type="button" class="btn btn-outline-primary">Search</button> --}}
          </div>
          <br>
      
<div id="table">
</div>
</div>



<script>
     $(document).ready(function() {
        table()
    });
    function table() {
            $.get("{{ url('kasir/table') }}", {}, function(data, status) {
                $("#table").html(data);
            });
        }
    function cari() {
            var cari = $("#cari").val();
            if (cari == "") {
                table()
            } else {
                $.get("{{ url('kasir/cari') }}/" + cari, {}, function(data, status) {
                $("#table").html(data);
            });
            }
        }
</script>