<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h5>Invoices</h5>
                </div>
                <div class="align-items-center col">
                    <a    href="{{url("/sale")}}" class="float-end btn m-0 bg-gradient-primary">Create Sale</a>
                </div>
            </div>
            <hr class="bg-dark "/>
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-light">
                    <th class="text-center">No</th>
                    <th class="text-center">Invoice No</th>
                    <th class="text-center">Supplier Name</th>
                    <th class="text-center">Created By</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">Vat(5%)</th>
                    <th class="text-center">Payable</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody id="tableList">

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>


<script>
    getList();
    async function getList(){
        try{
        
        showLoader();
        let res= await axios.get("/supplier-invoice-list",HeaderToken());
        console.log(res.data);
        hideLoader();

        let tableData = $("#tableData");
        let tableList = $("#tableList");
        tableData.DataTable().destroy();
        tableList.empty();

        res.data.forEach((item,index) => {
            let row=`
                <tr class="text-center">
                    <td>${index+1}</td>
                    <td>${item['supplier_invoice_no']}</td>
                    <td>${item['suplier']['suplier_name']}</td>
                    <td>${item['user']['firstName']} ${item['user']['lastName']}</td>
                    <td>${item['total']}</td>
                    <td>${item['payable'] - item['total']}</td>
                    <td>${item['payable']}</td>
                    <td>
                        <button data-id="${item['id']}" data-sup="${item['suplier_id']}" class="btn viewBtn btn-outline-success text-sm px-3 py-1 btn-sm m-0"><i class="fa fa-eye text-success  " aria-hidden="true"></i></button>

                        <button data-id="${item['id']}" data-sup="${item['suplier_id']}" class="deleteBtn btn btn-outline-danger text-sm px-3 py-1 btn-sm m-0"><i class="fa text-sm text-danger  fa-trash-alt"></i></button>
                    </td>
                </tr>
            `;

            tableList.append(row);
        });

        $(".viewBtn").on("click",async function(){
            let suplier_invoice_id = $(this).data("id");
            let suplier_id = $(this).data("sup");


            await supplierInvoiceDetails(suplier_invoice_id,suplier_id);

            $("#details-modal").modal("show");

        });

        $(".deleteBtn").on("click",function(){
            let id=$(this).data("id");
            $("#deleteID").val(id);
            $("#delete-modal").modal("show");

        });

        new DataTable("#tableData",{
                order:[[0,"desc"]],
                lengthMenu:[5,10,15,20,25]
            });
        }catch(e){
            unauthorized(e.response.status);
        }

    }
</script>