<div class="card" style="width: 1100px">
    <div style="background-color:#0c4e68" class="card-header">
        <h5 class="text-white" > <i class="fa fa-tag"></i> <b>Daftar Order</b></h5>
    </div>
    <div class="card-body">
        <div class="input-group col-md-4 offset-8">
            <input onkeyup="cari()" id="cari" type="search" class="form-control input-sm" placeholder="Search Berdasarkan Nama" aria-label="Search" aria-describedby="search-addon" />     
            {{-- <button type="button" class="btn btn-outline-primary">Search</button> --}}
          </div>
          <br>
      
<div id="table"></div>
</div>
</div>

<script>
     $(document).ready(function() {
        var id =  $("#cek").val();
        table(id)
    });
    function table(id) {
            $.get("{{ url('order/table') }}/"+id, {}, function(data, status) {
                $("#table").html(data);
                $("#cek2").html(id);
            });
        }
    function cari() {
            var cari = $("#cari").val();
            var id =  $("#cek").val();
            $.ajax({
                type: "get",
                url: "{{ url('order/cari') }}",
                data: {
                "id": id,
                "cari": cari,
                },
            success: function(data, status) {
                $("#table").html(data);
                }
            });
        }
        function tanggal() {
            var ex = $("#ex").val();
            var to = $("#to").val();
            var id =  $("#cek").val();
            $.ajax({
                type: "get",
                url: "{{ url('order/tanggal') }}",
                data: {
                    "ex": ex,
                    "to": to,
                    "id": id,
                },
                success: function(data) {
                    $(".btn-close").click();
                    $("#table").html(data);
                }
            })
        }

        function modalSearch() {
                $("#exampleModalLabel").html('Pencarian Data')
                $("#page").html(`<div class="p2">
        <div class="form-group">
        <label for="tanggal1">Tanggal Awal</label>
        <input type="date" name="ex" id="ex" class="form-control" placeholder="Masukan fromData">
        </div>
        <div class="form-group">
        <label for="tanggal2">Tanggal Akhir</label>
        <input type="date" name="to" id="to" class="form-control" placeholder="Masukan toDate">
        </div>
        <div class="form-group mt-2">
        <button class="btn btn-success" onclick="tanggal()">Cari</button>
        </div>
        </div>`);
            $("#exampleModal").modal('show');
        }
</script>