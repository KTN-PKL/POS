
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
            <select style="background-color: rgb(212, 211, 211)" class="form-select form-select-sm" aria-label=".form-select-sm example" id="kategori" onchange="kategori()">
                <option  selected value="0">Semua Kategori</option>
                @foreach ($kategori as $kategoris)
                <option value="{{ $kategoris->id_kategori }}">{{ $kategoris->kategori }}</option>
                @endforeach
            </select>
            </div>
        <div class="col-md-4 offset-4">
            <input onkeyup="cari()" id="cari" type="search" class="form-control input-sm" placeholder="Search Item" aria-label="Search" aria-describedby="search-addon" />     
            {{-- <button type="button" class="btn btn-outline-primary">Search</button> --}}
          </div>
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
        function kategori() {
            var id = $("#kategori").val();
            if (id == 0) {
                table()
            } else {
                $.get("{{ url('kasir/kategori') }}/" + id, {}, function(data, status) {
                $("#table").html(data);
            });
            }
        }
    function cari() {
            var cari = $("#cari").val();
            var id = $("#kategori").val();
            $.ajax({
                type: "get",
                url: "{{ url('kasir/cari') }}",
                data: {
                "id": id,
                "cari": cari,
                },
            success: function(data, status) {
                $("#table").html(data);
                }
            });
        }
</script>