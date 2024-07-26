<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h5>Customer Due List</h5>
                </div>
                <div class="align-items-center col">
                    <a    href="{{url("/sale")}}" class="float-end btn m-0 bg-gradient-primary">Create Sale</a>
                </div>
            </div>
            <hr class="bg-dark "/>
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-light">
                    <th>No</th>
                    <th>Invoice No</th>
                    <th>Customer Name</th>
                    <th>Mobile</th>
                    <th>Payable</th>
                    <th>Total Paid</th>
                    <th>Total Due</th>
                    <th>Action</th>
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
    let res=await axios.get("/due-list",HeaderToken());
    console.log(res);
    hideLoader();

    let tableList=$("#tableList");
    let tableData=$("#tableData");
    tableData.DataTable().destroy();
    tableList.empty();


    res.data.forEach((item,index) => {

        let row=`
            <tr>
                <td>
                    ${index+1}
                </td>
                <td>
                    ${item["invoice"]["invoice_no"]}
                </td>
                <td>
                    ${item["customer"]["name"]}
                </td>
                <td>
                    ${item["customer"]["mobile"]}
                </td>
                <td>
                    ${item["total_payable"]}
                </td>
                <td>
                    ${item["total_paid"]}
                </td>
                <td>
                    ${item["total_due"]}
                </td>
                <td>
                    <button data-id="${item['id']}" data-cus="${item['customer']['id']}" class="editBtn btn btn-outline-success text-sm px-3 py-1 btn-sm m-0">
                        <i class="fas text-sm fa-edit text-success"></i>
                    </button>
                </td>
            </tr>
        `;
        tableList.append(row);
    });

    $(".editBtn").on("click",async function(){
        let due_id=$(this).data("id");
        let customer_id=$(this).data("cus");
        await fillUpUpdateForm(due_id);
        $("#update-modal").modal("show");
    });
    new DataTable('#tableData',{
        order:[[0,'desc']],
        lengthMenu:[5,10,15,20,30]
    });

    }catch(e){
        unauthorized(e.response.status);
    }
}


</script>

