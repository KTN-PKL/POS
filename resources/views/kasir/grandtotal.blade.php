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
                $isi = number_format($grandtotal,2,",",".");
            @endphp
            <input type="text" id="grandtotal" class="form-control" placeholder="Nama Customer" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ $isi }}" readonly>
          </div>
    </td> 