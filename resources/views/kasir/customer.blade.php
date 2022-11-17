<table class="table table-bordered table-hover">
    <tr>
        <th>No</th>
        <th>Kode Customer</th>
        <th>Nama Customer</th>
        <th>Action</th>
    </tr>
    @php
        $i = 0;
    @endphp
    @foreach ($customer as $items)
        <tr>
            <td>@php
                $i = $i+1;
                echo $i;
            @endphp</td>
            <td>{{ $items->id_customer }}</td>
            <td>{{ $items->nama }}</td>
            <td>
                @php
                     $urutan = (int) substr($items->id_customer, 3, 3);
                @endphp
                <button style="background-color: #0c4e68" class="btn text-white" onClick="add({{ $urutan }})">Add</button>
            </td>
        </tr>
    @endforeach
</table>