<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Laravel 8</title>
        <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<!-- Jquery DataTables -->
<script type="text/javascript" language="javascript" src="http:////cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap dataTables Javascript -->
<script type="text/javascript" language="javascript" src="http://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>
</head>
<body>

<table class="table table-striped table-bordered data" width="1200px" cellspacing="0">
  <thead>
    <tr>
        <th>No</th>
        <th>No BON</th>
        <th>Atas Nama</th>
        <th>Customer</th>
        <th>Kasir</th>
        <th>Tanggal</th>
        <th>Jenis Order</th>
        <th>Status</th>
        <th>Grand Total</th>
        <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @php
        $i = 0;
    @endphp
    @foreach ($transaksi as $laporan)
    @php
                $i = $i+1;
            @endphp
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $laporan->id_transaksi }}</td>
            <td>{{ $laporan->atasnama }}</td>
            <td>{{$laporan->atasnama}}</td>
            <td>{{$laporan->kasir}}</td>
           
            <td>
                @php
                $waktu = strtotime($laporan->waktut);
                @endphp
                {{ date("d-m-Y", $waktu) }}</td>
            <td>
                @if($laporan->order == "Ditempat")
                <span class="badge badge-primary"><i class="fa fa-home"></i> {{$laporan->order}}</span>
                @elseif($laporan->order == "Booking")
                <span class="badge badge-warning"><i class="fa fa-ticket-alt"></i> {{$laporan->order}}</span>
                @else
                <span class="badge badge-success"><i class="fa fa-motorcycle"></i> {{$laporan->order}}</span>
                @endif
            </td>
            <td>
                @if($laporan->status == "Lunas")
                <span class="badge badge-success"><i class="fa fa-check"></i> {{$laporan->status}}</span>
                @else
                <span class="badge badge-danger"><i class="fa fa-info-circle"></i> {{$laporan->status}}</span>  
                @endif
            </td>
            <td>
            @php
            $grandtotal = number_format($laporan->grandtotal,0,",",".");
                echo "Rp.".$grandtotal.",-";
            @endphp    
            </td>
            <td>
                @php
                     $urutan = (int) substr($laporan->id_transaksi, 3, 3);
                @endphp
                <a onClick="edit({{ $urutan }})" class="btn btn-outline-primary"><i class="fa fa-eye" ></i></a>
            </td>
        </tr>
    
    @endforeach
</tbody>
    <tfoot>
        <th colspan="8" rowspan="1">Total</th>
        <th>
            @php
            $grandtotal = number_format($total,0,",",".");
                echo "Rp.".$grandtotal.",-";
            @endphp    
        </th>
    </tfoot>

</table>
</body>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('.data').DataTable();
            document.getElementById("DataTables_Table_0_filter").style.display = "none";
    });
</script>