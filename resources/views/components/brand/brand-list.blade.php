<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>Category</h4>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 bg-gradient-primary">Create</button>
                </div>
            </div>
            <hr class="bg-secondary"/>
            <div class="table-responsive">
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-light">
                    <th class="text-center">No</th>
                    <th class="text-center">Brand Name</th>
                    <th class="text-center">Added By</th>
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
</div>

<script>
    getList();
    async function getList() {
        try{
            showLoader();
            let res= await axios.get("/brand-list",HeaderToken());
            
            hideLoader();
            
            let tableData=$("#tableData");
            let tableList=$("#tableList");
            tableData.DataTable().destroy();
            tableList.empty();

            res.data.forEach((item, index) => {
                let row=`
                    <tr class="text-center">
                        <td>${index+1}</td>
                        <td>${item['name']}</td>
                        <td>${item["user"]["firstName"]}</td>
                        <td>
                            <button data-id="${item['id']}"  class="btn editBtn btn-sm btn-outline-success">Edit</button>
                            <button data-id="${item['id']}"  class="btn deletetBtn btn-sm btn-outline-danger">Delete</button>
                        </td>
                    </tr>
                `;
                tableList.append(row);
            });


            $(".editBtn").on("click", async function () {
                let id= $(this).data("id");
                await fillUpFormData(id);
                $("#update-modal").modal("show");
            });


            $(".deletetBtn").on("click",function(){
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