<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">

                                <label class="form-label">Category</label>
                                <select type="text" class="form-control form-select" id="productCategory">
                                    <option value="">Select Category</option>
                                </select>

                                <label class="form-label">Brand</label>
                                <select type="text" class="form-control form-select" id="brand">
                                    <option value="">Select Brand</option>
                                </select>
                                <label class="form-label">Supplier</label>
                                <select type="text" class="form-control form-select" id="supplier">
                                    <option value="">Select Spplier</option>
                                </select>

                                <label class="form-label mt-2">Name</label>
                                <input type="text" class="form-control" id="productName">

                                <label class="form-label mt-2">Buying Price</label>
                                <input type="text" class="form-control" id="productBuyingPrice">
                                <label class="form-label mt-2">Selling Price</label>
                                <input type="text" class="form-control" id="productPrice">

                                <label class="form-label mt-2">Stock</label>
                                <input type="text" class="form-control" id="productStock">
                                <label class="form-label mt-2">Unit</label>
                                <input type="text" class="form-control" id="productUnit">

                                <br/>
                                <img class="w-15" id="newImg" src="{{asset('images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label">Image</label>
                                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="productImg">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary mx-2" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>


<script>


getAndFillCategory();
getAndFillBrand();
getAndFillSupplier();
  async function getAndFillCategory(){
      let res=await axios.get("/category-list",HeaderToken());

      res.data.forEach((item)=>{
          let option=`
              <option  value="${item["id"]}">${item["name"]}</option>`;
              $("#productCategory").append(option);
      });
      
  }

  async function getAndFillBrand(){
      let res=await axios.get("/brand-list",HeaderToken());
      res.data.forEach((item)=>{
          let option=`
              <option  value="${item["id"]}">${item["name"]}</option>`;
              $("#brand").append(option);
      });
  }

  async function getAndFillSupplier(){
      let res=await axios.get("/suplier-list",HeaderToken());
      res.data.forEach((item)=>{
          let option=`
              <option  value="${item["id"]}">${item["suplier_name"]}</option>`;
              $("#supplier").append(option);
      });
  }


    // async function Save(){
    //     try{
    //         let productName = document.getElementById('productName').value;
    //     let productPrice = document.getElementById('productPrice').value;
    //     let productUnit = document.getElementById('productUnit').value;
    //     let productCategory = document.getElementById('productCategory').value;
    //     let productImg = document.getElementById('productImg').files[0];
    //     console.log(productImg);
    //     if(productName.length===0){
    //         errorToast("Product Name Required !");
    //     }else if(productPrice.length===0){
    //         errorToast("Product Price Required !");
    //     }else if(productUnit.length===0){
    //         errorToast("Product Unit Required !");
    //     }else if(productCategory.length===0){
    //         errorToast("Product Category Required !");
    //     }else if(!productImg){
    //         errorToast("Product Image Required !");
    //     }else{

    //         document.getElementById("modal-close").click();

    //         let formData=new FormData();
    //         formData.append('img_url',productImg);
    //         formData.append("name",productName);
    //         formData.append("price",productPrice);
    //         formData.append("unit",productUnit);
    //         formData.append("category_id",productCategory);
    //         const config={

    //             headers: {
    //                 'content-type': 'multipart/form-data'
    //             }
    //         }

    //          console.log(formData);
    //         showLoader();
    //         let res=await axios.post("/create-category",formData,config,HeaderToken());
    //         hideLoader();

    //         if(res.status===200 && res.data["status"]==="success"){
    //             successToast(res.data["message"]);
    //             document.getElementById("save-form").reset();
    //             await getList();
    //         }else{
    //             errorToast(res.data["message"]);
    //         }
    //     }

    //     }catch(e){
    //         unauthorized(e.response.status)
    //     }
    // }





    async function Save(){
        let productName = document.getElementById('productName').value;
        let productBuyingPrice = document.getElementById('productBuyingPrice').value;
        let productPrice = document.getElementById('productPrice').value;
        let productUnit = document.getElementById('productUnit').value;
        let productCategory = document.getElementById('productCategory').value;
        let brand=document.getElementById('brand').value;
        let supplier=document.getElementById('supplier').value;
        let productStock = document.getElementById('productStock').value;
        let productImg = document.getElementById('productImg').files[0];
        if(productName.length===0){
            errorToast("Product Name Required !");
        }
        else if(productBuyingPrice.length===0){
            errorToast("Product Buying Price Required !");
        }
        else if(productPrice.length===0){
            errorToast("Product Price Required !");
        }
        else if(productUnit.length===0){
            errorToast("Product Unit Required !");
        }else if(productCategory.length===0){
            errorToast("Product Category Required !");
        }else if(brand.length===0){
            errorToast("Product Brand Required !");
        }else if(supplier.length===0){
            errorToast("Product Supplier Required !");
        }else if(productStock.length===0){
            errorToast("Product Stock Required !");
        }else if(!productImg){
            errorToast("Product Image Required !");
        }else{
            document.getElementById("modal-close").click();
          
            let formData = new FormData();

            formData.append('img_url',productImg)
            formData.append('name',productName)
            formData.append('buying_price',productBuyingPrice)
            formData.append('price',productPrice)
            formData.append('unit',productUnit)
            formData.append('category_id',productCategory)
            formData.append('brand_id',brand)
            formData.append('suplier_id',supplier)
            formData.append('stock',productStock)
            console.log(formData);
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    "Authorization":getToken()
                }
            }
            // showLoader();
            let res = await axios.post("/create-product",formData,config);
            console.log(res.data);
            // hideLoader();

            if(res.status===200 && res.data["status"]==='success'){
                document.getElementById("save-form").reset();
                await getList();
                successToast(res.data["message"]);
            }else{
                errorToast(res.data["message"]);
            }
        }
    }
</script>
