<br>
<table class="table">
    <tr>
        <th colspan="2">Arus Kas Berasal Dari Kegiatan Operasional</th>
    </tr>
    <tr>
        <td>Penjualan Produk</td>
        <td>@php
            $gt = number_format($gt,0,",",".");
            echo "Rp.".$gt.",-";
        @endphp </td>
    </tr>
    <tr>
        <td>Modal Produk</td>
        <td> @php
            $modal = number_format($modal,0,",",".");
            echo "Rp.".$modal.",-";
        @endphp </td>
    </tr>
    <tr>
        <th>Kas Bersih Opreasional</th>
        <th> @php
            $operasional = number_format($operasional,0,",",".");
            echo "Rp.".$operasional.",-";
        @endphp </th>
    </tr>
    <tr>
        <th>Pemasukan Aktivitas Keuangan Lainnya</th>
        <th>@php
            $pemasukan = number_format($pemasukan,0,",",".");
            echo "Rp.".$pemasukan.",-";
        @endphp </th>
    </tr>
    <tr>
        <th>Pengeluaran Aktivitas Keuangan Lainnya</th>
        <th>@php
            $pengeluaran = number_format($pengeluaran,0,",",".");
            echo "Rp.".$pengeluaran.",-";
        @endphp </th>
    </tr>
    <tr @if ($pendapatan > 0)
        style="background-color: lightgreen"
    @else
        style="background-color: red"
    @endif>
        @if ($pendapatan > 0)
        <th id="untung"></th>
        @else
        <th id="rugi"></th>
        @endif
        <th>@php
            if ($pendapatan > 0) {
               $hasil = $pendapatan;
            }else {
                $hasil = $pendapatan * -1;
            }
            $hasil = number_format($hasil,0,",",".");
            echo "Rp.".$hasil.",-";
        @endphp </th>
    </tr>
</table>

