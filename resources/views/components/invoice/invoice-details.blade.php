<!-- Modal -->
<div class="modal animated zoomIn" id="details-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Invoice</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="invoice" class="modal-body p-3">
                    <div class="container-fluid">
                        <br/>
                        <div class="row">
                            <div class="col-8">
                                <span class="text-bold text-dark">BILLED TO </span>
                                <p class="text-xs mx-0 my-1"> Name:  <span id="CName"></span> </p>
                                <p class="text-xs mx-0 my-1">Email:  <span id="CEmail"></span></p>
                                <p class="text-xs mx-0 my-1">User ID:  <span id="CId"></span> </p>
                            </div>
                            <div class="col-4">
                                <img class="w-40" src="{{"images/logo.png"}}">
                                <p class="text-bold mx-0 my-1 text-dark" >Invoice No: <span id="invoiceNo"></span   </p>
                                <p class="text-xs mx-0 my-1">Date: {{ date('Y-m-d') }} </p>
                            </div>
                        </div>
                        <hr class="mx-0 my-2 p-0 bg-secondary"/>
                        <div class="row">
                            <div class="col-12">
                                <table class="table w-100" id="invoiceTable">
                                    <thead class="w-100">
                                    <tr class="text-xs text-bold">
                                        <td>Product Name</td>
                                        <td>Sale Price</td>
                                        <td>Quantity</td>
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
                                <p class="text-bold text-xs my-1 text-dark"> TOTAL: <i class="bi bi-currency-dollar"></i> <span id="total"></span></p>
                                <p class="text-bold text-xs my-1 text-dark"> VAT(5%): <i class="bi bi-currency-dollar"></i>  <span id="vat"></span></p>
                                <p class="text-bold text-xs my-1 text-dark"> Discount: <i class="bi bi-currency-dollar"></i>  <span id="discount"></span></p>
                                <p class="text-bold text-xs my-2 text-dark"> PAYABLE: <i class="bi bi-currency-dollar"></i>  <span id="payable"></span></p>
                                <p class="text-bold text-xs my-2 text-dark"> Paid: <i class="bi bi-currency-dollar"></i>  <span id="paid"></span></p>
                                <p class="text-bold text-xs my-2 text-dark"> Due: <i class="bi bi-currency-dollar"></i>  <span id="Due"></span></p>
                                
                                
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


    async function InvoiceDetails(customer_id,invoice_id){
        showLoader();
        let res=await axios.post("/invoice-details",{customer_id:customer_id,invoice_id:invoice_id},HeaderToken());
            console.log(res.data);
        hideLoader();

        document.getElementById("CName").innerText=res.data["customer"]["name"];
        document.getElementById("CEmail").innerText=res.data["customer"]["email"];
        document.getElementById("CId").innerText=res.data["customer"]["id"];
        document.getElementById("total").innerText=res.data["invoice"]["total"];
        document.getElementById("discount").innerText=res.data["invoice"]["discount"];
        document.getElementById("vat").innerText=res.data["invoice"]["vat"];
        document.getElementById("payable").innerText=res.data["invoice"]["payable"];
        document.getElementById("invoiceNo").innerText=res.data["invoice"]["invoice_no"];
        document.getElementById("paid").innerText=res.data["invoice"]["due"] ? res.data["invoice"]["due"]["total_paid"]:res.data["invoice"]["paid"];
        document.getElementById("Due").innerText=res.data["invoice"]["due"] ? res.data["invoice"]["due"]["total_due"]:0;

        console.log(res);
        let invoiceList=$("#invoiceList");
        invoiceList.empty();

        res.data["product"].forEach(function (item,index) {
            console.log(item)
            let row=`<tr class="text-xs">
                        <td>${item["product"]["name"]}</td>
                        <td>${item["product"]["price"]}</td>
                        <td>${item["qty"]}</td>
                        <td>${item["sale_price"]}</td>
                     </tr>`
            invoiceList.append(row)
        });
        $("#details-modal").modal('show')
    }


    function PrintPage(){
        let printContents=document.getElementById("invoice").innerHTML;
        let originalContents=document.body.innerHTML;
        document.body.innerHTML=printContents;
        window.print();
        document.body.innerHTML=originalContents;
        setTimeout(() => {
            location.reload();
        }, 1000);
    }

</script>
