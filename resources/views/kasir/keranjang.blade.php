<div class="card card-rounded mb-4 ">
                <div style="background-color:#0c4e68" class="card-header text-white">
                    <h4> <i class="fa fa-shopping-cart"></i> Keranjang</h4>
                </div>
                    <div class="card-body">
                       {{-- Nama Customer --}}
                       <table border="0" cellpadding="5" cellspacing="2" width="100%">
                           
                        <tr> 
                            <td style="width:30%">
                            <label for="FirstName">NO BON</label>
                            </td> 
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Recipient's username" aria-describedby="basic-addon2" value="B01" readonly>
                                  </div>
                            </td> 
                        </tr>
                        <tr> 
                            <td>
                            <label for="FirstName">CUSTOMER</label>
                            <small class="text-danger"></small>
                            </td> 
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                      <button style="background-color: #0c4e68" class="btn text-white" type="button"><i class="fa fa-search"></i></button>
                                      <button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                                    </div>
                                  </div>
                                  <small class="text-danger">*Khusus Member</small>
                            </td> 
                        </tr>
                        <tr> 
                            <td>
                            <label for="FirstName">ATAS NAMA</label>
                            </td> 
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                  </div>
                            </td> 
                        </tr>  
                        </table>
                        <br>
                        {{-- table pemesanan    --}}
                        <div id="barang"></div>
    
                    </div>
                     {{-- Pembayaran --}}
                     <div class="card-footer">
                       
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
                           <tr> 
                               <td>
                               <label for="FirstName">TOTAL BAYAR</label>
                               <small class="text-danger"></small>
                               </td> 
                               <td>
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text">Rp</span>
                                       </div>
                                       <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Recipient's username" aria-describedby="basic-addon2" value="100000" readonly>
                                      
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
                                       <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Recipient's username" aria-describedby="basic-addon2" value="100000" readonly>
                                      
                                     </div>
                               </td> 
                           </tr>
                           <tr> 
                               <td>
                               <label for="FirstName">GRAND TOTAL</label>
                               <small class="text-danger"></small>
                               </td> 
                               <td>
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text">Rp</span>
                                       </div>
                                       <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Recipient's username" aria-describedby="basic-addon2" value="100000" readonly>
                                      
                                     </div>
                               </td> 
                           </tr>
                       </table>
                  
                       <button class="btn btn-xl" style="background-color: #0c4e68; border:none;width:100%"> <i class="fa fa-save text-white" style="font-size: 18px"> <b>Simpan Transaksi</b></i></button>
                   </div>    
                    </div>    
            </div>