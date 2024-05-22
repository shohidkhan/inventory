<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create Supplier</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Supplier Name *</label>
                                <input type="text" class="form-control" id="supplierName">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Supplier Email *</label>
                                <input type="text" class="form-control" id="supplierEmail">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Supplier Phone *</label>
                                <input type="text" class="form-control" id="supplierMobile">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Supplier Address *</label>
                                <textarea class="form-control" id="supplierAddress" cols="30" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>

<script>
    async function Save() {
      
            let supplierName = document.getElementById('supplierName').value;
            let supplierEmail = document.getElementById('supplierEmail').value;
            let supplierMobile = document.getElementById('supplierMobile').value;
            let supplierAddress = document.getElementById('supplierAddress').value;
            if(supplierName.length===0){
                errorToast("Supplier Name Required !");
            }else if(supplierEmail.length===0){
                errorToast("Supplier Email Required !");
            }else if(supplierMobile.length===0){
                errorToast("Supplier Mobile Required !");
            }else if(supplierAddress.length===0){
                errorToast("Supplier Address Required !");
            }else{
                document.getElementById('modal-close').click();
                showLoader();
                let res= await axios.post("/create-suplier",{suplier_name:supplierName,suplier_email:supplierEmail,suplier_mobile:supplierMobile,suplier_address:supplierAddress},HeaderToken());

                hideLoader();

                if(res.status===200 && res.data["status"]==="success"){
                    document.getElementById("save-form").reset();
                    successToast(res.data["message"]);
                    await getList();
                }else{
                    errorToast(res.data["message"]);
                }
            }
       
    }
</script>