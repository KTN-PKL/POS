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
<body>
    <table id="tablekategori" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Action</th>
            </tr>
        </thead>
       <tbody>
        @php
        $i = 0;
    @endphp
    @foreach ($kategori as $item)
        <tr>
            <td>@php
                $i = $i+1;
                echo $i;
            @endphp</td>
            <td>{{ $item->kategori }}</td>
            <td>
                <button style="background-color: #0c4e68" class="btn text-white" onClick="edit({{ $item->id_kategori }})">Edit</button>
                <button class="btn btn-danger" onClick="hapus({{ $item->id_kategori }})">Delete</button>
            </td>
        </tr>
    @endforeach
       </tbody>
    </table>
</body>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#tablekategori').DataTable();
            document.getElementById("tablekategori_filter").style.display = "none";
    });
</script>