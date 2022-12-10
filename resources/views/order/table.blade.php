<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Laravel 8</title>

    <!-- Jquery DataTables -->
<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" language="javascript" src="http:////cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" href="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

</head>

<table id="order" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>No Bon</th>
            <th>Atas Nama</th>
            <th>Customer</th>
            <th>Kasir</th>
            <th>Grandtotal</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Order</th>
            <th>Action</th>
        </tr>
    </thead>
    
    <tbody>
        @php
        $i = 0;
    @endphp
    @foreach ($transaksi as $item)
        <tr>
            <td>@php
                $i = $i+1;
                echo $i;
            @endphp</td>
            <td>{{ $item->id_transaksi }}</td>
            <td>{{ $item->atasnama }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->kasir }}</td>
            <td>@php
                $grandtotal = number_format($item->grandtotal,0,",",".");
                echo "Rp.".$grandtotal.",-";
                $d = strtotime($item->waktut);
            @endphp</td>
            <td>{{ date("d-m-Y", $d) }}</td>
            <td> @if($item->status == "Lunas")
                <span class="badge badge-success"><i class="fa fa-check"></i> {{$item->status}}</span>
                @else
                <span class="badge badge-danger"><i class="fa fa-info-circle"></i> {{$item->status}}</span>  
                @endif</td>
            <td> @if($item->order == "Ditempat")
                <span class="badge badge-primary"><i class="fa fa-home"></i> {{$item->order}}</span>
                @elseif($item->order == "Booking")
                <span class="badge badge-warning"><i class="fa fa-ticket-alt"></i> {{$item->order}}</span>
                @else
                <span class="badge badge-success"><i class="fa fa-motorcycle"></i> {{$item->order}}</span>
                @endif</td>
            <td>
                @php
                $kode = $item->id_transaksi;
                $urutan = (int) substr($kode, 3, 3);
            @endphp
                <span class="btn btn-outline-primary btn-sm" onclick="show({{ $urutan }})"><i class="fa fa-eye"></i></span>
                @if ($item->status == "Bayar Nanti")
                <span class="btn btn-outline-success btn-sm" onclick="edit({{ $urutan }})"><i class="fa fa-money"></i></span>
                @endif
                <span class="btn btn-outline-danger btn-sm" onclick="hapus({{ $urutan }})"><i class="fa fa-trash"></i></span>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#order').DataTable();
            document.getElementById("order_filter").style.display = "none";
    });
</script>