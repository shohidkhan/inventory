<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Due</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Customer Name</label>
                                <input type="text" class="form-control" id="customerName">
                                <label class="form-label mt-2">Customer Mobile</label>
                                <input type="text" class="form-control" id="customerMobile">
                                <label class="form-label mt-2">Payable</label>
                                <input type="text" class="form-control" id="payable">
                                <label class="form-label mt-2">Total Paid</label>
                                <input type="text" class="form-control" id="totalPaid">
                                <label class="form-label mt-2">Total Due</label>
                                <input type="text" class="form-control" id="totalDue">
                                <label class="form-label mt-2">Current Pay</label>
                                <input type="text" class="form-control" id="currentPay">
                                <input type="text" class="d-none" id="updateID">
                                <input type="text" readonly class="d-none"  id="oldImgFromDb">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="update()" id="update-btn" class="btn bg-gradient-success" >Update</button>
            </div>

        </div>
    </div>
</div>

<script>
     async function fillUpUpdateForm(id){
        document.getElementById("updateID").value=id;

        let res=await axios.post("/single-due",{id:id},HeaderToken());
        console.log(res.data);
        document.getElementById("customerName").value=res.data["customer"]["name"];
        document.getElementById("customerMobile").value=res.data["customer"]["mobile"];
        document.getElementById("payable").value=res.data["total_payable"];
        document.getElementById("totalPaid").value=res.data["total_paid"];
        document.getElementById("totalDue").value=res.data["total_due"];
     }

     async function update(){
        let customerName=document.getElementById("customerName").value;
        let customerMobile=document.getElementById("customerMobile").value;
        let totalPayable=document.getElementById("payable").value;
        let totalPaid=document.getElementById("totalPaid").value;
        let totalDue=document.getElementById("totalDue").value;
        let currentPay=document.getElementById("currentPay").value;
        let dueId=document.getElementById("updateID").value;
        if(customerName.length==0){
            errorToast("Customer Name Required !");
        }
        else if(customerMobile.length==0){
            errorToast("Customer Mobile Required !");
        }
        else if(totalPayable.length==0){
            errorToast("Total Payable Required !");
        }
        else if(totalPaid.length==0){
            errorToast("Total Paid amount Required !");
        }
        else if(totalDue.length==0){
            errorToast("Total Due amount Required !");
        }
        else if(currentPay.length==0){
            errorToast("Current amount Required !");
        }
        else{
            document.getElementById("update-modal-close").click();
            
            showLoader();
            let res= await axios.post("/update-due",{"id":dueId,"currentPay":currentPay},HeaderToken());
            hideLoader();

            if(res.status===200 && res.data["status"]==='success'){
                document.getElementById("update-form").reset();
                await getList();
                successToast(res.data["message"]);
            }else{
                errorToast(res.data["message"]);
            }
        }
        
    }
</script>