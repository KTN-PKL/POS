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
<table id="keuangan" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Akun</th>
            <th>Jenis</th>
            <th>Pengeluaran</th>
            <th>Pemasukan</th>
            <th>Waktu</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
        $i = 0;
    @endphp
    @foreach ($keuangan as $item)
        <tr>
            <td>@php
                $i = $i+1;
                echo $i;
            @endphp</td>
            <td>{{ $item->akun }}</td>
            <td>{{ $item->jenis }}</td>
            @php $isi = number_format($item->uang,0,",","."); @endphp
            <td>@if ($item->jenis == "Pengeluaran")Rp.{{ $isi}},-@else Rp.0,- @endif</td>
            <td>@if ($item->jenis == "Pengeluaran") Rp.0,- @else Rp.{{ $isi}},- @endif</td>
            <td>{{ $item->waktu }}</td>
            <td>
                <button style="background-color: #0c4e68" class="btn text-white" onClick="edit({{ $item->id_keuangan }})">Edit</button>
                <button class="btn btn-danger" onClick="hapus({{ $item->id_keuangan }})">Delete</button>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td></td>
            <td></td>
            <td><b>Total</b></td>
            @php $isi1 = number_format($pengeluaran,0,",","."); @endphp
            <td>Rp.{{ $isi1 }},-</td>
            @php $isi2 = number_format($pemasukan,0,",","."); @endphp
            <td>Rp.{{ $isi2 }},-</td>
            <td>#</td>
            <td>#</td>
        </tr>
    </tfoot>
</table>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#keuangan').DataTable();
            document.getElementById("keuangan_filter").style.display = "none";
    });
</script>