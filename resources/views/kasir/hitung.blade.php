<table border="0" cellpadding="5" cellspacing="2" width="100%">
                          
    <tr> 
        <td style="width:30%">
        <label for="FirstName">STATUS</label>
        </td> 
        <td>
            <select type="text" id="#" class="form-select">
              <option selected disabled>-- Status Pembayaran --</option>
              <option value="">z</option>
              <option value="">a</option>
            </select>
        </td> 
    </tr>
    <tr> 
        <td style="width:30%">
        <label for="FirstName">ORDER</label>
        </td> 
        <td>
            <select type="text" id="#" class="form-select">
              <option selected disabled>-- Kategori Order --</option>
              <option value="">z</option>
              <option value="">a</option>
            </select>
        </td> 
    </tr>
    <tr id="total"></tr>
    <tr> 
        <td>
        <label for="FirstName">DISKON</label>
        <small class="text-danger"></small>
        </td> 
        <td>
            <div class="input-group">
               
                <input type="number" class="form-control" aria-describedby="basic-addon2" value="0">
                <div class="input-group-append">
                    <span class="input-group-text">%</span>
                </div>
              </div>
        </td> 
    </tr>
    <tr> 
        <td>
        <label for="FirstName">PAJAK</label>
        <small class="text-danger"></small>
        </td> 
        <td>
            <div class="input-group">
               
                <input type="number" class="form-control" aria-describedby="basic-addon2" value="0">
                <div class="input-group-append">
                    <span class="input-group-text">%</span>
                </div>
              </div>
        </td> 
    </tr>
    <tr> 
        <td>
        <label for="FirstName">DISKON</label>
        <small class="text-danger"></small>
        </td> 
        <td>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Recipient's username" aria-describedby="basic-addon2" value="0">
               
              </div>
        </td> 
    </tr>
    <tr> 
        <td>
        <label for="FirstName">PAJAK</label>
        <small class="text-danger"></small>
        </td> 
        <td>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Recipient's username" aria-describedby="basic-addon2" value="0">
               
              </div>
        </td> 
    </tr>
    <tr id="grandtotal"></tr>
</table>

<script>
     $(document).ready(function() {
           total()
       });
    function total()
    {
        var id = $("#id").val();
        $.get("{{ url('kasir/total') }}/" + id, {}, function(data, status) {
               $("#total").html(data);  
        });
    }
</script>