<div class="card" style="width: 1000px">
    <br>
    <div class="row">
        <div style="width: 2%"></div>
        <div style="width: 96%">
            <div class="row">
            <div class="col-md-4">
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="kategori" onchange="kategori()">
                <option selected value="0">Semua Kategori</option>
                @foreach ($kategori as $kategoris)
                <option value="{{ $kategoris->id_kategori }}">{{ $kategoris->kategori }}</option>
                @endforeach
            </select>
            </div>
            <div class="col-md-4 offset-4">
            <input onkeyup="cari()" id="cari" type="search" class="form-control input-sm" placeholder="Search Item" aria-label="Search" aria-describedby="search-addon" />
            </div>
            </div>
            <br>
            <div id="table"></div>
        </div>
        <div style="width: 2%"></div>
    </div>
</div>

<script>
    $(document).ready(function() {
        table()
    });
    function table() {
            $.get("{{ url('item/table') }}", {}, function(data, status) {
                $("#table").html(data);
            });
        }
    function kategori() {
            var id = $("#kategori").val();
            if (id == 0) {
                table()
            } else {
                $.get("{{ url('item/kategori') }}/" + id, {}, function(data, status) {
                $("#table").html(data);
            });
            }
        }
    function cari() {
            var cari = $("#cari").val();
            var id = $("#kategori").val();
            $.ajax({
                type: "get",
                url: "{{ url('item/cari') }}",
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