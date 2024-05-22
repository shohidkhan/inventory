<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Brand</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Brand Name *</label>
                                <input type="text" class="form-control" id="brandNameUpdate">
                                <input class="d-none" id="updateID">
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
    async function fillUpFormData(id){
        try{
            document.getElementById("updateID").value=id;
            showLoader();
            let res= await axios.post("/single-brand",{id},HeaderToken());  
            hideLoader();
            document.getElementById("brandNameUpdate").value=res.data["name"];
        }catch (e) {
            errorToast(e.message)
        }
    }

    async function Update() {
        try{
            let id=document.getElementById("updateID").value;
            let brandName=document.getElementById("brandNameUpdate").value;

            if(brandName.length===0){
                errorToast("Brand Name Required !");
            }else{
                document.getElementById("update-modal-close").click();

                showLoader();
                let res=await axios.put("/update-brand",{id:id,name:brandName},HeaderToken());
                hideLoader();
                if(res.status===200 && res.data["status"]==="success"){
                    document.getElementById("update-form").reset();
                    await getList();
                    successToast(res.data["message"]);
                }else{
                    errorToast(res.data["message"]);
                }
            }
        }catch (e) {
            errorToast(e.message)
        }
    }
</script>