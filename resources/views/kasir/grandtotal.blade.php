<td>
    <label for="FirstName">GRAND TOTAL</label>
    <small class="text-danger"></small>
    </td> 
    <td>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Rp</span>
            </div>
            @php
                $isi = number_format($grandtotal,0,",",".");
            @endphp
            <input type="text" id="grandtotal1" class="form-control" aria-describedby="basic-addon2" value="{{ $isi }}" readonly>
          </div>
    </td> 