<div class="card">
    <div  class="card-header">
        <h5 id="heads" class="text-white" > <i class="fa fa-tag"></i> <b id="pala"></b></h5>
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
        table(),
        $('.data').DataTable();
            document.getElementById("DataTables_Table_0_filter").style.display = "none";
    });
    function table() {
            const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            var tanggal = $("#cekws").val();
            var hasil = tanggal.split("-");
            var bulan = months[hasil[1]-1];
            $("#pala").html('Laporan Transaksi Periode '+bulan+' '+hasil[0]);
            $.get("{{ url('laporan/table') }}/"+ tanggal, {}, function(data, status) {
                $("#table").html(data);
            });
        }
    function cari() {
            var cari = $("#cari").val();
       
            if (cari == "") {
                table()
            } else {
                $.get("{{ url('laporan/cari') }}/" + cari, {}, function(data, status) {
                $("#table").html(data);
            });
            }
        }
        function carix() {
            var ex = $("#ex").val();
            var to = $("#to").val();
          
            $.ajax({
                type: "get",
                url: "{{ url('laporan/carix') }}",
                data: {
                    "ex": ex,
                    "to": to,
                },
                success: function(data) {
                    $(".btn-close").click();
                    $("#table").html(data);
                }
            })
        }

       
</script>

