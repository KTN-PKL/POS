<table class="table table-bordered table-hover">
    <tr>
        <th>No</th>
        <th>Akun</th>
        <th>Jenis</th>
        <th>Pengeluaran</th>
        <th>Pemasukan</th>
        <th>Waktu</th>
        <th>Action</th>
    </tr>
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
            <td>@if ($item->jenis == "Pengeluaran"){{ $item->uang}}@else 0 @endif</td>
            <td>@if ($item->jenis == "Pengeluaran") 0 @else {{ $item->uang}} @endif</td>
            <td>{{ $item->waktu }}</td>
            <td>
                <button style="background-color: #0c4e68" class="btn text-white" onClick="edit({{ $item->id_keuangan }})">Edit</button>
                <button class="btn btn-danger" onClick="hapus({{ $item->id_keuangan }})">Delete</button>
            </td>
        </tr>
    @endforeach
</table>