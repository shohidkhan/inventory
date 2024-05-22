<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Supplier Name *</label>
                                <input type="text" class="form-control" id="supplierNameUpdate">
                                <input class="d-none" id="updateID">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Supplier Email *</label>
                                <input type="text" class="form-control" id="supplierEmailUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Supplier Phone *</label>
                                <input type="text" class="form-control" id="supplierMobileUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Supplier Address *</label>
                                <textarea class="form-control" id="supplierAddressUpdate" cols="30" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Update()" id="update-btn" class="btn bg-gradient-success" >Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function fillFormData(id){
        try {
            document.getElementById("updateID").value=id;
            showLoader();
            let res= await axios.post("/single-suplier",{id:id},HeaderToken());
            hideLoader();
            
            document.getElementById("supplierNameUpdate").value=res.data['suplier_name'];
            document.getElementById("supplierEmailUpdate").value=res.data['suplier_email'];
            document.getElementById("supplierMobileUpdate").value=res.data['suplier_mobile'];
            document.getElementById("supplierAddressUpdate").value=res.data['suplier_address'];
        }catch (e) {
            unauthorized(e.response.status);
        }
    }
    async function Update(){
        try {
            let supplierNameUpdate = document.getElementById("supplierNameUpdate");
            let supplierEmailUpdate = document.getElementById("supplierEmailUpdate");
            let supplierMobileUpdate= document.getElementById("supplierMobileUpdate");
            let supplierAddressUpdate=document.getElementById("supplierAddressUpdate");
            let id=document.getElementById("updateID").value;
            // showLoader();
            let res= await axios.put("/update-suplier",{id:id,suplier_name:supplierNameUpdate.value,suplier_email:supplierEmailUpdate.value,suplier_mobile:supplierMobileUpdate.value,suplier_address:supplierAddressUpdate.value},HeaderToken());


            hideLoader();

            if(res.status===200 && res.data["status"]==="success"){
                document.getElementById("update-form").reset();
                document.getElementById("update-modal-close").click();
                await getList();
                successToast(res.data["message"]);
            }else{
                errorToast(res.data["message"]);
            }
            
            
        }catch (e) {
            console.log(e);
            errorToast(e.message)
        }
    }
</script>