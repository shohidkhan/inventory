@extends('layout.sidenav-layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Purchase Report</h4>
                        <label class="form-label mt-2">Date From</label>
                        <input id="FormDate" type="date" class="form-control"/>
                        <label class="form-label mt-2">Date To</label>
                        <input id="ToDate" type="date" class="form-control"/>
                        <button onclick="SalesReport()" class="btn mt-3 bg-gradient-primary">Download</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        async function SalesReport() {
            try{
                let FormDate = document.getElementById('FormDate').value;
                let ToDate = document.getElementById('ToDate').value;

                if(FormDate.length === 0 || ToDate.length === 0){
                    errorToast("Date Range Required !")
                }else{
                    let res=await axios.get(`/purchase-report/${FormDate}/${ToDate}`,HeaderTokenWithBolb());
                    console.log(res.data);
                    const url=window.URL.createObjectURL(new Blob([res.data]));

                    const link=document.createElement('a');
                    link.href=url;
                    
                    link.setAttribute('download','purchase-report.pdf');
                    document.body.appendChild(link);
                    link.click();
                    link.remove();
                }
                
            }catch(e){
                unauthorized(e.response.status);
            }
        }
    </script>
@endsection

