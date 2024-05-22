@extends('layout.sidenav-layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 p-2">
                <div class="shadow-sm h-100 bg-white rounded-3 p-3">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 mt-3 mb-5">
                            
                            <img class="w-50" src="{{"images/logo.png"}}">
                        </div>
                        <div class="col-6">
                            <span class="text-bold text-dark">BILLED FROM </span>
                            <p class="text-xs mx-0 my-1"> Name:  <span id="SName"></span> </p>
                            
                            <p class="text-xs mx-0 my-1">Mobile:  <span id="SMobile"></span></p>
                            <p class="text-xs mx-0 my-1">User ID:  <span id="SId"></span> </p>
                            <p class="text-xs mx-0 my-1">Date: {{ date('Y-m-d') }} </p>
                        </div>
                        <div class="col-6">
                            <span class="text-bold text-dark">BILLED TO </span>

                            <p class="text-xs mx-0 my-1">Name: Company</p>
                            <p class="text-xs mx-0 my-1">Email:Alias@alias.com </p>
                            <p class="text-xs mx-0 my-1">Mobile: 01234567890</p>
                            <p class="text-xs mx-0 my-1">Address: Mohammadpur</p>
                            
                        </div>
                    </div>
                    <hr class="mx-0 my-2 p-0 bg-secondary"/>
                    <div class="row">
                        <div class="col-12">
                            <table class="table w-100" id="invoiceTable">
                                <thead class="w-100">
                                <tr class="text-xs">
                                    <td>Name</td>
                                    <td>Qty</td>
                                    <td>Price</td>
                                    <td>Remove</td>
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
                           <p class="text-bold text-xs my-2 text-dark"> PAYABLE: <i class="bi bi-currency-dollar"></i>  <span id="payable"></span></p>
                           
                           <p>
                              <button onclick="createInvoice()" class="btn  my-3 bg-gradient-primary w-40">Confirm</button>
                           </p>
                       </div>
                        <div class="col-12 p-2">

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-5 p-2">
                <div class="shadow-sm h-100 bg-white rounded-3 p-3">
                    <table class="table  w-100" id="productTable">
                        <thead class="w-100">
                        <tr class="text-xs text-bold">
                            <td>Product</td>
                            <td>Suplier</td>
                            <td>Stock</td>
                            <td>Pick</td>
                        </tr>
                        </thead>
                        <tbody  class="w-100" id="productList">

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-4 col-lg-3 p-2">
                <div class="shadow-sm h-100 bg-white rounded-3 p-3">
                    <table class="table table-sm w-100" id="supplierTable">
                        <thead class="w-100">
                        <tr class="text-xs text-bold">
                            <td>Supplier</td>
                            <td>Pick</td>
                        </tr>
                        </thead>
                        <tbody  class="w-100" id="supplierList">

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>




    <div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Add Product</h6>
                </div>
                <div class="modal-body">
                    <form id="add-form">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 p-1">
                                    <label class="form-label">Product ID *</label>
                                    <input type="text" readonly class="form-control" id="PId">
                                    <label class="form-label  mt-2" re>Product Name *</label>
                                    <input type="text" class="form-control" readonly id="PName">
                                    <label class="form-label mt-2">Product Price *</label>
                                    <input type="text"  class="form-control"  id="PPrice">
                                    <label class="form-label mt-2">Product Qty *</label>
                                    <input type="text" readonly class="form-control"  id="PQty">
                                    <input type="hidden" readonly class="form-control"  id="brand_id">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="add()" id="save-btn" class="btn bg-gradient-success" >Add</button>
                </div>
            </div>
        </div>
    </div>

    <script>
         (async ()=>{
          showLoader();
          await  suppliersList();
          await  productList();
          hideLoader();
        })()

        let InvoiceItemList=[];
        async function suppliersList(){
            showLoader();
            let res= await axios.get("/suplier-list",HeaderToken());
            hideLoader();

            let supplierTable=$("#supplierTable");
            let supplierList=$("#supplierList");

            supplierTable.DataTable().destroy();
            supplierList.empty();


            res.data.forEach((item,index) => {
                let row=`
                    <tr>
                        <td>${item['suplier_name']}</td>
                        <td>
                            <a data-email="${item['suplier_email']}" data-name="${item['suplier_name']}"  data-mobile="${item['suplier_mobile']}" data-id="${item['id']}" class="btn btn-outline-dark addSupplier  text-xxs px-2 py-1  btn-sm m-0">
                                Add</a>
                        </td>
                    </tr>
                `;

                supplierList.append(row)
            });

            new DataTable('#supplierTable',{
                order:[[0,'desc']],
                // scrollCollapse: false,
                // info: false,
                // lengthChange: false
                lengthMenu:[5,10,15,20,25]
            });


            $(".addSupplier").on("click",async function(){
                let SName=$(this).data("name");
                let SEmail=$(this).data("email");
                let SMobile=$(this).data("mobile");
                let SId=$(this).data("id");

                $("#SName").text(SName);
                $("#SEmail").text(SEmail);
                $("#SMobile").text(SMobile);
                $("#SId").text(SId);

            });


        }

        async function productList(){

            let res= await axios.get("/supplier-product-list",HeaderToken());

            let productTable=$("#productTable");
            let productList=$("#productList");

            productTable.DataTable().destroy();
            productList.empty();

            res.data.forEach((item,index) => {
               let row=`
                    <tr>
                        <td>${item['name']} (${[item['purchase_price']]})</td>
                        <td>${item['suplier']["suplier_name"]}</td>
                        <td>${item['stock']}</td>
                        <td>
                            <a data-id="${item['id']}" data-name="${item['name']}" data-stock="${item['stock']}" data-brand="${item['brand_id']}"  data-price="${item['purchase_price']}"  class="btn btn-outline-dark addProduct  text-xxs px-2 py-1  btn-sm m-0">Add</a>
                        </td>
                    </tr>
               `; 
               productList.append(row)
            });

            new DataTable('#productTable',{
                order:[[0,'desc']],
                // scrollCollapse: false,
                // info: false,
                // lengthChange: false
                lengthMenu:[5,10,15,20,25]
            });

            $(".addProduct").on("click",async function(){
                let PId=$(this).data("id");
                let PName=$(this).data("name");
                let PPrice=$(this).data("price");
                let PStock=$(this).data("stock");
                let PBrand=$(this).data("brand");

                addModal(PId,PName,PPrice,PStock,PBrand)
            });
        }


        function addModal(id,name,price,stock,brand){
            $("#PId").val(id);
            $("#PName").val(name);
            $("#PPrice").val(price);
            $("#PQty").val(stock);
            $("#brand_id").val(brand);
            $('#create-modal').modal('show')
        }
        function add(){
            let PId= document.getElementById("PId").value;
            let PName= document.getElementById("PName").value;
            let PPrice=document.getElementById("PPrice").value;
            let PQty=document.getElementById("PQty").value;
            let brand_id=document.getElementById("brand_id").value;

            if(PId.length===0){
                errorToast("Product Id Required !");
            }else if(PName.length===0){
                errorToast("Product Name Required !");
            }else if(PPrice.length===0){
                errorToast("Product Price Required !");
            }else if(PQty.length===0 ){
                errorToast("Product Quantity Required !");
            }else{

                if(PQty > 0){
                    let item={
                        suplier_product_id:PId,
                        suplier_product_name:PName,
                        purchase_price:PPrice,
                        qty:PQty,
                        brand_id:brand_id
                    }
                        InvoiceItemList.push(item);
                        $('#create-modal').modal('hide')
                        ShowInvoiceItem();
                }else{
                    errorToast("You did not added this product in Stock !");
                }
                
            }
        }

        function ShowInvoiceItem(){
            let invoiceList=$("#invoiceList");
            invoiceList.empty();

            console.log(InvoiceItemList);
            InvoiceItemList.forEach(function(item,index){
                let row=`
                    <tr>
                        <td>${item["suplier_product_name"]}</td>
                        <td>${item["qty"]}</td>
                        <td>${item["purchase_price"]}</td>
                        <td>
                            <a data-index="${index}" class="btn remove text-xxs px-2 py-1  btn-sm m-0">
                                Remove
                            </a>
                        </td>
                    </tr>
                `;
                invoiceList.append(row)
            });
            CalculateGrandTotal();
            $(".remove").on("click",function(){
                let index=$(this).data("index");
               removeItem(index);
            });
        }


        

        function removeItem(index){
            InvoiceItemList.splice(index,1);
            ShowInvoiceItem();
        }

        function CalculateGrandTotal(){
            let Total=0;
            let Vat=0;
            let Payable=0;

            InvoiceItemList.forEach(function (item){
                Total= parseFloat(Total)+parseFloat((item["purchase_price"] * item["qty"]).toFixed(2));
            });

            Vat= parseFloat(((Total*5)/100).toFixed(2));

            Payable=parseFloat((Total+Vat).toFixed(2));

            document.getElementById('total').innerText=Total;
            document.getElementById('vat').innerText=Vat;
            document.getElementById('payable').innerText=Payable;
        }

        async function createInvoice() {
            let total=document.getElementById("total").innerText;
            let vat=document.getElementById("vat").innerText;
            let payable=document.getElementById("payable").innerText;
            let suplier_id=document.getElementById("SId").innerText;

            let data={
                "total":total,
                "vat":vat,
                "payable":payable,
                "suplier_id":suplier_id,
                "products":InvoiceItemList
            }

            if(total.length===0){
                errorToast("Total Required !");
            }else if(payable.length===0){
                errorToast("Payable Required !");
            }else if(suplier_id.length===0){
                errorToast("Suplier Required !");
            }else{
                showLoader()
                let res=await axios.post("/create-supplier-invoice",data,HeaderToken());
                hideLoader();

                if(res.status===200 && res.data["status"]==='success'){
                    successToast(res.data["message"]);
                    window.location.href="/purchase-invoice";
                    productList();
                    
                }else{
                    errorToast(res.data["message"]);
                }
            }
        } 
    </script>

    @endsection