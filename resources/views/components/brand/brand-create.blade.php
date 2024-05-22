<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create Brand</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Brand Name *</label>
                                <input type="text" class="form-control" id="brandName">
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
    async function Save(){
        try{
            let name = document.getElementById('brandName').value;
            if(name.length===0){
                errorToast("Brand Name Required !");
            }else{
                showLoader();
                let res = await axios.post("/create-brand",{name:name},HeaderToken());
                hideLoader();
                if(res.status===200 && res.data["status"]==="success"){
                    document.getElementById("save-form").reset();
                    document.getElementById('modal-close').click();
                    await getList();
                    successToast(res.data["message"]);
                }else{
                    errorToast(res.data["message"]);
                }
            }
        }catch(e){
            errorToast(e.message);
        }
    }
</script>