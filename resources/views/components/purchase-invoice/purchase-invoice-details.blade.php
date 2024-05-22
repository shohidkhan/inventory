<!-- Modal -->
<div class="modal animated zoomIn" id="details-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Invoice</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="purchaseInvoice" class="modal-body p-3">
                    <div class="container-fluid">
                        <br/>
                        <div class="row">
                            <div class="col-8">
                                <span class="text-bold text-dark">BILLED FROM </span>
                                <p class="text-xs mx-0 my-1"> Name:  <span id="SName"> </span> </p>
                                <p class="text-xs mx-0 my-1"> Phone:  <span id="CPhone"> </span> </p>
                                <p class="text-xs mx-0 my-1">Email:  <span id="SEmail"> </span></p>
                                <p class="text-xs mx-0 my-1">Address:  <span id="SAddress"> </span></p>
                                <p class="text-xs mx-0 my-1">Invoice no:  <span id="invoice_no"> </span> </p>
                            </div>
                            <div class="col-4">
                                <img class="w-40" src="{{"images/logo.png"}}">
                                <p class="text-bold mx-0 my-1 text-dark" >Invoice  <span id="invoiceNo"></span   </p>
                                <p class="text-xs mx-0 my-1">Date: {{ date('Y-m-d') }} </p>
                            </div>
                        </div>
                        <hr class="mx-0 my-2 p-0 bg-secondary"/>
                        <div class="row">
                            <div class="col-12">
                                <table class="table w-100 " id="invoiceTable">
                                    <thead class="w-100">
                                    <tr class="text-xs text-bold">
                                        <td>SL.</td>
                                        <td>Product Name</td>
                                        <td>Supplier Name</td>
                                        <td>Brand Name</td>
                                        <td>Quantity</td>
                                        <td>Purchase Price</td>
                                        <td>Total</td>
                                    </tr>
                                    </thead>
                                    <tbody  class="w-100" id="invoiceList">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr class="mx-0 my-2 p-0 bg-secondary"/>
                        <div class="row">
                            <div class="col-12">
                                <div class="float-right" style="float: right"> 
                                    <p class="text-bold float-right text-xs my-1 text-dark"> TOTAL: <i class="bi bi-currency-dollar"></i> <span id="total"></span></p>
                                    <p class="text-bold text-xs my-1 text-dark"> VAT(5%):  <i class="bi bi-currency-dollar"></i>  <span id="vat"></span></p>
                                    <p class="text-bold text-xs my-2 text-dark"> PAYABLE: <i class="bi bi-currency-dollar"></i>  <span id="payable"></span></p>
                                </div>
                                
                                
                            </div>

                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-primary" data-bs-dismiss="modal">Close</button>
                <button onclick="PrintPage()" class="btn bg-gradient-success">Print</button>
            </div>
        </div>
    </div>
</div>


<script>
    async function supplierInvoiceDetails(suplier_invoice_id,suplier_id){
        showLoader();
        // console.log(suplier_invoice_id,suplier_id);
        let res= await axios.post("/supplier-invoice-details",{suplier_invoice_id:suplier_invoice_id,suplier_id:suplier_id},HeaderToken());
        // console.log(res);
        // console.log(res.data);
        hideLoader();

        document.getElementById("SName").innerText = res.data["suplier"]["suplier_name"];
        document.getElementById("SEmail").innerText = res.data["suplier"]["suplier_email"];
        document.getElementById("CPhone").innerText = res.data["suplier"]["suplier_mobile"];
        document.getElementById("SAddress").innerText = res.data["suplier"]["suplier_address"];
        document.getElementById("invoice_no").innerText = res.data["suplier_invoice"]["supplier_invoice_no"];
        document.getElementById("total").innerText=res.data["suplier_invoice"]["total"];
        document.getElementById("payable").innerText=res.data["suplier_invoice"]["payable"];
        document.getElementById("vat").innerText=res.data["suplier_invoice"]["payable"] - res.data["suplier_invoice"]["total"];


        let invoiceList = $("#invoiceList");
        invoiceList.empty();

        res.data["suplier_invoice_products"].forEach((item,index) => {
            console.log(item);
            let row=`
                <tr>
                    <td>${index+1}</td>
                    <td>${item["product"]["name"]}</td>
                    <td>${item["product"]["suplier"]["suplier_name"]}</td>
                    <td>${item["brand"]["name"]}</td>
                    <td>${item["qty"]}</td>
                    <td>${item["purchase_price"]}</td>
                    <td>${item["qty"] * item["product"]["buying_price"]}</td>
                        
                </tr>
            `;
            invoiceList.append(row)
        });


    }

    function PrintPage(){
        let printContents=document.getElementById("purchaseInvoice").innerHTML;
        let originalContents=document.body.innerHTML;
        document.body.innerHTML=printContents;
        window.print();
        document.body.innerHTML=originalContents;
        setTimeout(() => {
            location.reload();
        }, 1000);
    }
</script>