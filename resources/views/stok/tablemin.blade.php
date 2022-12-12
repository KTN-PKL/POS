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

<table id="tablestok" class="table table-bordered table-hover" style="width: 100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Item</th>
            <th>Kategori</th>
            <th>Nama Item</th>
            <th>Stok</th>
            <th>Stok Minimal</th>
            <th>Gambar</th>
            <th>Action</th>
        </tr>
    
    </thead>
    <tbody>
        @php
            $i = 0;
        @endphp

        @foreach ($stok as $items)
        @if ($items->stok < $items->minim)
        <tr>
            <td>@php
                $i = $i+1;
                echo $i;
            @endphp</td>
            <td>{{ $items->id_item }}</td>
            <td>{{ $items->kategori }}</td>
            <td>{{ $items->item }}</td>
            <td>{{ $items->stok }}</td>
            <td>{{ $items->minim }}</td>
            <td><img src="{{asset('/foto/'. $items->foto)}}"  alt="Gambar" width="100px" height="100px"></td>
            <td>
                <button class="btn btn-warning" onClick="edit({{ $items->id_stok }})">Tambah</button>
            </td>
        </tr> 
        @endif
    @endforeach
    </tbody>
</table>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#tablestok').DataTable();
            document.getElementById("tablestok_filter").style.display = "none";
    });
</script>