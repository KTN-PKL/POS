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

<table id="tableitem" class="table table-bordered table-hover" style="width: 100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Item</th>
            <th>Kategori</th>
            <th>Nama Item</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Gambar</th>
            <th>Action</th>
        </tr>
    </thead>
   
    <tbody>
        @php
        $i = 0;
    @endphp
    @foreach ($item as $items)
        <tr>
            <td>@php
                $i = $i+1;
                echo $i;
            @endphp</td>
            <td>{{ $items->id_item }}</td>
            <td>{{ $items->kategori }}</td>
            <td>{{ $items->item }}</td>
            <td>{{ $items->beli }}</td>
            <td>{{ $items->jual }}</td>
            <td><img src="{{asset('/foto/'. $items->foto)}}"  alt="Gambar" width="100px" height="100px"></td>
            <td>
                @php
                     $urutan = (int) substr($items->id_item, 3, 3);
                @endphp
                <button style="background-color:#0c4e68" class="btn text-white" onClick="show({{ $urutan }})">Detail</button>
                <button class="btn btn-warning" onClick="edit({{ $urutan }})">Edit</button>
                <button class="btn btn-danger" onClick="hapus({{ $urutan }})">Delete</button>
            </td>
        </tr>
    @endforeach
    </tbody>
   
</table>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#tableitem').DataTable();
            document.getElementById("tableitem_filter").style.display = "none";
    });
</script>