<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>Product</h4>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0  bg-gradient-primary">Create</button>
                </div>
            </div>
            <hr class="bg-dark "/>
            <table class="table" id="tableData">
                <thead >
                    <tr class="bg-light text-center">
                        <th class="text-center">No.</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Supplier</th>
                        <th class="text-center">Brand</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Stock</th>
                        <th class="text-center">Unit</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="tableList" class="text-center">

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>

getList();

 async function getList() {
    try{
    showLoader();
    let res=await axios.get("/product-list",HeaderToken());
    
    hideLoader();
   

    let tableList=$("#tableList");
    let tableData=$("#tableData");
    tableData.DataTable().destroy();
    tableList.empty();

    res.data.forEach((item, index) => {
        let row=`

            <tr>
                <td>${index+1}</td>
                <td>
                    <img src="${item['img_url']}" alt="" width="50px" height="50px">
                </td>
                <td>
                    ${item['name']}
                </td>
                <td>
                    ${  item['suplier']["suplier_name"]}
                </td>
                <td>
                    ${  item['brand']["name"]}
                </td>
                <td>
                    ${  item['category']["name"]}
                </td>
                <td>
                    ${item['price']}
                </td>
                <td>
                    ${item['stock']!=0?item['stock']:"<span class='text-danger'>Out of Stock</span>"}
                </td>
                <td>
                    ${item['unit']}
                </td>
                <td>
                    <button data-id="${item['id']}"  class="btn editBtn btn-sm btn-outline-success text-sm px-3 py-1 btn-sm m-0">
                        <i class="fas text-sm fa-edit text-success"></i>
                    </button>
                    <button data-id="${item['id']}"  class="btn deletetBtn btn-sm btn-outline-danger text-sm px-3 py-1 btn-sm m-0">
                        <i class="fa text-sm text-danger  fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        
        `;

        tableList.append(row);

        
    });

    $(".editBtn").on("click",  async function () {
        let id=$(this).data("id");
        await fillUpUpdateForm(id);
        $("#update-modal").modal("show");
        // $("#edit-modal").modal("show");
    });

    $(".deletetBtn").on("click",  function () {
        let id=$(this).data("id");
        $("#deleteID").val(id);
        $("#delete-modal").modal("show");
    })
    new DataTable("#tableData",{
            order:[[0,"desc"]],
            lengthMenu:[5,10,15,20,25]
        });
    }catch(e){
            unauthorized(e.response.status);
        }
 }


</script>

