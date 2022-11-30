<table class="table table-bordered table-hover">
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
    @php
        $i = 0;
    @endphp
    @foreach ($transaksi as $laporan)
        <tr>
            @if($laporan->dikirim <> null)
            <td>@php
                $i = $i+1;
                echo $i;
            @endphp</td>
            <td>{{ $laporan->id_transaksi }}</td>
            <td>{{ $laporan->atasnama }}</td>
            <td>Admin</td>
            <td>Admin</td>
            <td>{{$laporan->waktut}}</td>
            <td>{{$laporan->order}}</td>
            <td>{{$laporan->status}}</td>
            <td>{{$laporan->grandtotal}}</td>
            <td>
                <a href="#" class="btn btn-outline-primary"><i class="fa fa-eye" ></i></a>
            </td>
            @endif
                {{-- <button style="background-color: #0c4e68" class="btn text-white" onClick="edit({{ $item->id_kategori }})">Edit</button>
                <button class="btn btn-danger" onClick="hapus({{ $item->id_kategori }})">Delete</button> --}}
            </td>
        </tr>
    @endforeach
</table>