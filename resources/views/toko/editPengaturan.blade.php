 
                    <div class="card-header text-white" style="background-color:#0c4e68" >
                        <h5> <i class="fa fa-edit"></i> Pengaturan Sistem Print dan Kasir</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col col-sm-6">
                                <div class="form-group row">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Struk Footer</label>
                                    <div class="col-sm-9">
                                        <textarea name="tfooter" type="text" class="form-control" id="tfooter">{{$pengaturan->tfooter}}</textarea>
                                    </div>
                                    </div>    
                                </div>  
                            </div>
                            <div class="col col-sm-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                    <input name="tgambar" type="file" onchange="editgambar()" class="form-control" id="tgambar">
                                </div>
                                </div>
                            </div> 
                          
                            <div class="col col-sm-12">
                                <h4>Pengaturan Kasir</h4>
                            </div>
                           
                            <div class="col col-sm-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Diskon (%) </label>
                                        <div class="col-sm-9">
                                            <select name="tdiskonpersen" type="text" class="form-select" id="tdiskonpersen">
                                                <option  disabled>-- Pilih --</option>
                                                @if($pengaturan->tdiskonpersen=='enable')
                                                <option selected  value="enable">Enable</option>
                                                <option value="disable">Disable</option>
                                                @else
                                                <option selected value="disable">Disable</option>
                                                <option value="enable">Enable</option>
                                                @endif
                                            </select>    
                                        </div>
                                </div>  
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Diskon (Rp) </label>
                                        <div class="col-sm-9">
                                            <select name="tdiskonrp" type="text" class="form-select" id="tdiskonrp">
                                                <option  disabled>-- Pilih --</option>
                                                @if($pengaturan->tdiskonrp=='enable')
                                                <option selected  value="enable">Enable</option>
                                                <option value="disable">Disable</option>
                                                @else
                                                <option selected value="disable">Disable</option>
                                                <option value="enable">Enable</option>
                                                @endif
                                            </select>    
                                        </div>
                                </div>  
                            </div>
                            <div class="col col-sm-6">
                               
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Pajak (%) </label>
                                        <div class="col-sm-9">
                                            <select name="tpajakpersen" type="text" class="form-select" id="tpajakpersen">
                                                <option  disabled>-- Pilih --</option>
                                                @if($pengaturan->tpajakpersen=='enable')
                                                <option selected  value="enable">Enable</option>
                                                <option value="disable">Disable</option>
                                                @else
                                                <option selected value="disable">Disable</option>
                                                <option value="enable">Enable</option>
                                                @endif
                                            </select>    
                                        </div>
                                </div>  
                              
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Pajak (Rp) </label>
                                        <div class="col-sm-9">
                                            <select name="tpajakrp" type="text" class="form-select" id="tpajakrp">
                                                <option  disabled>-- Pilih --</option>
                                                @if($pengaturan->tpajakrp=='enable')
                                                <option selected  value="enable">Enable</option>
                                                <option value="disable">Disable</option>
                                                @else
                                                <option selected value="disable">Disable</option>
                                                <option value="enable">Enable</option>
                                                @endif
                                            </select>    
                                        </div>
                                </div>  
                            </div>
                
                        </div>
                    </div>
                <div class="card-footer text-muted">
                    <button style="background-color:  #0c4e68" type="submit" class="btn btn-md text-white"  onClick="updatePengaturan({{$pengaturan->id_pengaturan}})"><i class="fa fa-save text-white"></i> Save </button>
                
                </div>
           
                </div>
                

                </div>
                  
            </div>
        </div>  
    </div>



<script>
this.datas = new FormData();

function editgambar(){
           var files = $("#tgambar")[0].files;
           datas.append('tgambar',files[0]);
       }

function updatePengaturan(id) {
    
            var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            var tdiskonrp = $("#tdiskonrp").val();
            var tdiskonpersen = $("#tdiskonpersen").val();
            var tpajakrp = $("#tpajakrp").val();
            var tpajakpersen = $("#tpajakpersen").val();
            var tfooter = $("#tfooter").val();
            datas.append('tdiskonrp',tdiskonrp);
            datas.append('tpajakrp',tpajakrp);
            datas.append('tdiskonpersen',tdiskonpersen);
            datas.append('tpajakpersen',tpajakpersen);
            datas.append('tfooter',tfooter);
            datas.append('_token',CSRF_TOKEN);
            $.ajax({
                 url: "{{ url('toko/updatepengaturan') }}/" + id,
                 method: 'post',
                 data: datas,
                 contentType: false,
                 processData: false,
                 dataType: 'json',
                success: function(response) {
                if(response.success == 1){ 
                    notif()
                }
                }
            });
        }
//   function updatePengaturan(id) {
//            var tos = $("#tos").val();
         
//             $.ajax({
//                 type: "get",
//                 url: "{{ url('toko/updatepengaturan') }}/" + id,
//                 data: {
//                 "tos": tos,
//                 },
//             success: function(data, response) {
//              notif()
//                 }
//             });
//         }



</script>



    

