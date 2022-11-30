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
            <td>@php
                $i = $i+1;
                echo $i;
            @endphp</td>
            <td>{{ $laporan->id_transaksi }}</td>
            <td>{{ $laporan->atasnama }}</td>
            <td>{{$laporan->atasnama}}</td>
            <td>{{$laporan->kasir}}</td>
            <td>{{$laporan->waktut}}</td>
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
            <td>Rp. {{$laporan->grandtotal}}</td>
            <td>
                @php
                     $urutan = (int) substr($laporan->id_transaksi, 3, 3);
                @endphp
                <a onClick="edit({{ $urutan }})" class="btn btn-outline-primary"><i class="fa fa-eye" ></i></a>
            </td>
        </tr>
    @endforeach
</table>