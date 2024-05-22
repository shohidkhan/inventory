<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6 center-screen">
            <div class="card animated fadeIn w-90  p-4">
                <div class="card-body">
                    <h4>EMAIL ADDRESS</h4>
                    <br/>
                    <label>Your email address</label>
                    <input id="email" placeholder="User Email" class="form-control" type="email"/>
                    <br/>
                    <button onclick="SentOTP()"  class="btn w-100 float-end bg-gradient-primary">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   async function SentOTP() {
        let email= document.getElementById("email").value;
       let postBody={"email":email}
       if(email.length===0){
           errorToast("Email is required");
       }else{
            showLoader();
            let res=await axios.post("/sendOtp",postBody);
            hideLoader();

            if(res.status===200 && res.data['status']==='success'){
                sessionStorage.setItem("email",email);
                successToast(res.data['message']);
                setTimeout(() => {
                    window.location.href="/verify-otp";
                }, 1000);
                
            }
            else{
                errorToast(res.data['message']);
            }
       }
       
    }
</script>
