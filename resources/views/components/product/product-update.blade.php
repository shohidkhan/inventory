<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Category</label>
                                <select type="text" class="form-control form-select" id="productCategoryUpdate">
                                    <option value="">Select Category</option>
                                </select>
                                <label class="form-label">Supplier</label>
                                <select type="text" class="form-control form-select" id="supplierUpdate">
                                    <option value="">Select Supplier</option>
                                </select>
                                <label class="form-label">Brand</label>
                                <select type="text" class="form-control form-select" id="brandUpdate">
                                    <option value="">Select Brand</option>
                                </select>

                                <label class="form-label mt-2">Name</label>
                                <input type="text" class="form-control" id="productNameUpdate">

                                <label class="form-label mt-2">Price</label>
                                <input type="text" class="form-control" id="productPriceUpdate">

                                <label class="form-label mt-2">stock</label>
                                <input type="text" class="form-control" id="stockUpdate">

                                <label class="form-label mt-2">Unit</label>
                                <input type="text" class="form-control" id="productUnitUpdate">
                                <br/>
                                <img class="w-15" id="oldImg" src="{{asset('images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label mt-2">Image</label>
                                <input oninput="oldImg.src=window.URL.createObjectURL(this.files[0])"  type="file" class="form-control" id="img_url">

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

    async function fillCategoryDropdown(){
        let res=await axios.get("/category-list",HeaderToken());
        res.data.forEach((item,index)=>{
            let option=`
                <option  value="${item["id"]}">${item["name"]}</option>
            `;
            $("#productCategoryUpdate").append(option);
        });
    }

    async function fillBrandDropdown(){
        let res=await axios.get("/brand-list",HeaderToken());
        res.data.forEach((item,index)=>{
            let option=`
                <option  value="${item["id"]}">${item["name"]}</option>
            `;
            $("#brandUpdate").append(option);
        });
    }

    async function fillSupplierDropdown(){
        let res=await axios.get("/suplier-list",HeaderToken());
        res.data.forEach((item,index)=>{
            let option=`
                <option  value="${item["id"]}">${item["suplier_name"]}</option>
            `;
            $("#supplierUpdate").append(option);
        });
    }

   async function fillUpUpdateForm(id){
        document.getElementById("updateID").value=id;

        showLoader();
        await fillCategoryDropdown();
        await fillBrandDropdown();
        await fillSupplierDropdown();
        let res= await axios.post("/single-product",{id:id},HeaderToken())
        hideLoader();

        document.getElementById("oldImgFromDb").value=res.data["img_url"];
        document.getElementById("productNameUpdate").value=res.data["name"];
        document.getElementById("productPriceUpdate").value=res.data["price"];
        document.getElementById("productUnitUpdate").value=res.data["unit"];
        document.getElementById("productCategoryUpdate").value=res.data["category_id"];
        document.getElementById("brandUpdate").value=res.data["brand_id"];
        document.getElementById("supplierUpdate").value=res.data["suplier_id"];
        document.getElementById("stockUpdate").value=res.data["stock"];
        document.getElementById("oldImg").src=res.data["img_url"];
   }

//    async function update(){
//         let productName = document.getElementById('productNameUpdate').value;
//         let productPrice = document.getElementById('productPriceUpdate').value;
//         let productUnit = document.getElementById('productUnitUpdate').value;
//         let productCategory = document.getElementById('productCategoryUpdate').value;
//         let updateID = document.getElementById('updateID').value;
//         let oldImgFromDb=document.getElementById('oldImgFromDb').value;
//         let img_url = document.getElementById('img_url').files[0];

//         console.log(updateID,productName,productPrice,productUnit,productCategory,img_url,oldImgFromDb);
//         if(productName.length===0){
//             errorToast("Product Name Required !");
//         }else if(productPrice.length===0){
//             errorToast("Product Price Required !");
//         }else if(productUnit.length===0){
//             errorToast("Product Unit Required !");
//         }else if(productCategory.length===0){
//             errorToast("Product Category Required !");
//         }else{
//             document.getElementById("update-modal-close").click();
//             let formData= new FormData();
//             formData.append('img_url',img_url)
//             formData.append("name",productName)
//             formData.append("price",productPrice)
//             formData.append("unit",productUnit)
//             formData.append("category_id",productCategory)
//             formData.append("oldImgFromDb",oldImgFromDb)
//             const config={
//                 headers:{
//                     "content-type" : "multipart/form-data"
//                 }
//             }

//             showLoader();
//             let res=await axios.post("/productUpdate",formData,config);
//             hideLoader();
//             if(res.status===200 && res.data["status"]==='success'){
//                 document.getElementById("save-form").reset();
//                 await getList();
//                 successToast(res.data["message"]);
//             }else{
//                 errorToast(res.data["message"]);
//             }
//         }
       

//    }


async function update(){
        let productName = document.getElementById('productNameUpdate').value;
        let productPrice = document.getElementById('productPriceUpdate').value;
        let productUnit = document.getElementById('productUnitUpdate').value;
        let productCategory = document.getElementById('productCategoryUpdate').value;
        let updateID = document.getElementById('updateID').value;
        let oldImgFromDb=document.getElementById('oldImgFromDb').value;
        let brand = document.getElementById('brandUpdate').value;
        let supplier = document.getElementById('supplierUpdate').value;
        let stock = document.getElementById('stockUpdate').value;
        let img_url = document.getElementById('img_url').files[0];


        if(productName.length===0){
            errorToast("Product Name Required !");
        }else if(productPrice.length===0){
            errorToast("Product Price Required !");
        }else if(productUnit.length===0){
            errorToast("Product Unit Required !");
        }else if(productCategory.length===0){
            errorToast("Product Category Required !");
        }else if(brand.length===0){
            errorToast("Product Brand Required !");
        }else if(supplier.length===0){
            errorToast("Product Supplier Required !");
        }else if(productStock.length===0){
            errorToast("Product Stock Required !");
        }else{
            document.getElementById("update-modal-close").click();
            let formData= new FormData();

            formData.append("name",productName)
            formData.append("price",productPrice)
            formData.append("unit",productUnit)
            formData.append("category_id",productCategory)
            formData.append("oldImgFromDb",oldImgFromDb)
            formData.append("img_url",img_url)
            formData.append("brand_id",brand)
            formData.append("suplier_id",supplier)
            formData.append("stock",stock)
            formData.append("id",updateID)

            const config={
                headers:{
                    "content-type" : "multipart/form-data",
                    "Authorization":getToken()
                }
            }


            showLoader();
            let res=await axios.post("/update-product",formData,config);
            console.log(res)
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
