<div class="container-fluid">
    <div class="row">
        {{-- show sale history in chart --}}
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card my-3 mt-4  px-0">
                        <div class="card-header bg-dashbord-summary bg-dashbord-summary text-white py-2">
                            Purchase
                        </div>
                        <div class="card-body">
                            <canvas id="myPurchase"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card my-3 mt-4  px-0">
                        <div class="card-header bg-dashbord-summary bg-dashbord-summary text-white py-2">
                            Sales
                        </div>
                        <div class="card-body">
                            <canvas id="mySale"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-lg-6">
            <div class="card my-3 mt-4  px-0">
                <div class="py-2 card-header bg-dashbord-summary bg-dashbord-summary text-white">
                    Profit
                </div>
                <div class="card-body">
                    <canvas id="myProfit" ></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card my-3 mt-4  px-0">
            <h4 class="card-header bg-dashbord-summary bg-dashbord-summary text-white">Initial Summary</h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                <span id="product"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Product</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                <span id="category"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Category</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                <span id="brand"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Brand</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                <span id="supplier"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Supplier</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                <span id="customer"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Customer</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100  bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                <span id="sup_invoice"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Purchase
                                                 Invoice</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100  bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                <span id="invoice"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Sale Invoice</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card my-3  px-0">
            <h4 class="card-header bg-dashbord-summary text-white">Purchase History </h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="total_purchase"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Total Purchase</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="today_purchase"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Today Purchase</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="yesterday_purchase"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Yesterday Purchase</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="this_week_purchase"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">This week Purchase</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="last_week_purchase"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Last week Purchase</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="this_month_purchase"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">This Month Purchase</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="last_month_purchase"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Last Month Purchase</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="this_year_purchase"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">This Year Purchase</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="last_year_purchase"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Last Year Purchase</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card my-3  px-0">
            <h4 class="card-header bg-dashbord-summary text-white">Sale History </h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100  bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="payable"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Total sale</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="today_sale"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Today Sale</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="yesterday_sale"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Yesterday Sale</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="this_week_sale"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">This week Sale</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="last_week_sale"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Last week Sale</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="this_month_sale"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">This Month Sale</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="last_month_sale"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Last Month Sale</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
            
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="this_year_sale"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">This Year Sale</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="last_year_sale"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Last Year Sale</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card my-3 mb-4 px-0">
            <h4 class="card-header bg-dashbord-summary text-white">Profit History </h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100  bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="vat"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Vat Collection</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100  bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="total_profit"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Total Profit</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100  bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="today_profit"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Today Profit</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100  bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="yesterday_profit"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Yesterday Profit</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100  bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="this_week_profit"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">This week Profit</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100  bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="last_week_profit"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Last week Profit</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100  bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="this_month_profit"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">This month Profit</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100  bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="last_month_profit"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Last month Profit</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100  bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="this_year_profit"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">this year Profit</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                        <div class="card card-plain h-100  bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h5 class="mb-0 text-capitalize font-weight-bold">
                                                $ <span id="last_year_profit"></span>
                                            </h5>
                                            <p class="mb-0 text-sm">Last year Profit</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    getList();
    getSummaryChart();

    async function getList(){
        try{
        showLoader();
        let res=await axios.get("/summary",HeaderToken());
        console.log(res.data);
        hideLoader();


        document.getElementById("product").innerText=res.data["products"];
        document.getElementById("category").innerText=res.data["categories"];
        document.getElementById("customer").innerText=res.data["customers"];
        document.getElementById("supplier").innerText=res.data["suppliers"];
        document.getElementById("brand").innerText=res.data["brands"];
        document.getElementById("invoice").innerText=res.data["invoices"];
        document.getElementById("sup_invoice").innerText=res.data["supplier_invoices"];
        document.getElementById("total_purchase").innerText=res.data["total_purchase"];

        document.getElementById("today_sale").innerText=res.data["today_sale"];
        document.getElementById("yesterday_sale").innerText=res.data["yesterday_sale"]? res.data["yesterday_sale"]:0;
        document.getElementById("this_week_sale").innerText=res.data["this_week_sale"];
        document.getElementById("last_week_sale").innerText=res.data["last_week_sale"]? res.data["last_week_sale"]:0;
        document.getElementById("this_month_sale").innerText=res.data["this_month_sale"];
        document.getElementById("last_month_sale").innerText=res.data["last_month_sale"];;
        document.getElementById("this_year_sale").innerText=res.data["this_year_sale"];
        document.getElementById("last_year_sale").innerText=res.data["last_year_sale"];

        document.getElementById("total_profit").innerText=res.data["total_profit"] < 0 ? 0 : res.data["total_profit"];
        document.getElementById("today_profit").innerText=res.data["today_profit"] < 0 ? 0 : res.data["today_profit"];
        document.getElementById("yesterday_profit").innerText=res.data["yesterday_profit"] < 0 ? 0 : res.data["yesterday_profit"];
        document.getElementById("this_week_profit").innerText=res.data["this_week_profit"] < 0 ? 0 : res.data["this_week_profit"];
        document.getElementById("last_week_profit").innerText=res.data["last_week_profit"] < 0 ? 0 : res.data["last_week_profit"];
        document.getElementById("this_month_profit").innerText=res.data["this_month_profit"] < 0 ? 0 : res.data["this_month_profit"];
        document.getElementById("last_month_profit").innerText=res.data["last_month_profit"] < 0 ? 0 : res.data["last_month_profit"];
        document.getElementById("this_year_profit").innerText=res.data["this_year_profit"] < 0 ? 0 : res.data["this_year_profit"];
        document.getElementById("last_year_profit").innerText=res.data["last_year_profit"] < 0 ? 0 : res.data["last_year_profit"];
        
     
        document.getElementById("vat").innerText=res.data["vat"];
        document.getElementById("payable").innerText=res.data["payable"];


        document.getElementById("today_purchase").innerText=res.data["today_purchase"];
        document.getElementById("yesterday_purchase").innerText=res.data["yesterday_purchase"];
        document.getElementById("this_week_purchase").innerText=res.data["this_week_purchase"];
        document.getElementById("last_week_purchase").innerText=res.data["last_week_purchase"];
        document.getElementById("this_month_purchase").innerText=res.data["this_month_purchase"];
        document.getElementById("last_month_purchase").innerText=res.data["last_month_purchase"];
        document.getElementById("this_year_purchase").innerText=res.data["this_year_purchase"];
        document.getElementById("last_year_purchase").innerText=res.data["last_year_purchase"];
        }catch(e){
            unauthorized(e.response.status);
        }
    }
    
    async function getSummaryChart(){
        let resChart=await axios.get("/summary",HeaderToken());
        const mySale = document.getElementById('mySale');
        const myProfit = document.getElementById('myProfit');        
        const myPurchase = document.getElementById('myPurchase');        

        new Chart(myPurchase, {
            type: 'line',
            data: {
            labels: ['Total Purchase','Today Purchase', 'Yesterday Purchase', 'This week Purchase', 'Last week Purchase', 'This month Purchase', 'Last month Purchase', 'This year Purchase', 'Last year Purchase'],
            datasets: [{
                label: 'Purchase',
                data: [
                    resChart.data["total_purchase"]? resChart.data["total_purchase"]:0,
                    resChart.data["today_purchase"]? resChart.data["today_purchase"]:0,
                    resChart.data["yesterday_purchase"]? resChart.data["yesterday_purchase"]:0,
                    resChart.data["this_week_purchase"]? resChart.data["this_week_purchase"]:0,
                    resChart.data["last_week_purchase"]? resChart.data["last_week_purchase"]:0,
                    resChart.data["this_month_purchase"]? resChart.data["this_month_purchase"]:0,
                    resChart.data["last_month_purchase"]? resChart.data["last_month_purchase"]:0,
                    resChart.data["this_year_purchase"]? resChart.data["this_year_purchase"]:0,
                    resChart.data["last_year_purchase"]? resChart.data["last_year_purchase"]:0
                  
                ],
                backgroundColor: [
                    '#A87DFF',
                    '#7DD4FF',
                    '#7DA8FF',
                    '#C2F790',
                    '#A99EF6',
                    '#E2BCFB',
                    '#FBBCED',
                    '#FAA9A9',
                    '#AFFAA9',
                ]
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
        new Chart(mySale, {
            type: 'line',
            data: {
            labels: ['Total sale','Today sale', 'Yesterday sale', 'This week sale', 'Last week sale', 'This month sale', 'Last month sale', 'This year sale', 'Last year sale'],
            datasets: [{
                label: 'Sales',
                data: [
                    resChart.data["payable"]? resChart.data["payable"]:0,
                    resChart.data["today_sale"]? resChart.data["today_sale"]:0,
                    resChart.data["yesterday_sale"]? resChart.data["yesterday_sale"]:0,
                    resChart.data["this_week_sale"]? resChart.data["this_week_sale"]:0,
                    resChart.data["last_week_sale"]? resChart.data["last_week_sale"]:0,
                    resChart.data["this_month_sale"]? resChart.data["this_month_sale"]:0,
                    resChart.data["last_month_sale"]? resChart.data["last_month_sale"]:0,
                    resChart.data["this_year_sale"]? resChart.data["this_year_sale"]:0,
                    resChart.data["last_year_sale"]? resChart.data["last_year_sale"]:0
                ],
                backgroundColor: [
                    '#A87DFF',
                    '#7DD4FF',
                    '#7DA8FF',
                    '#C2F790',
                    '#A99EF6',
                    '#E2BCFB',
                    '#FBBCED',
                    '#FAA9A9',
                    '#AFFAA9',
                ]
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });

        
        new Chart(myProfit, {
            type: 'doughnut',
            data: {
            labels: ['Total Profit','Today Profit', 'Yesterday Profit', 'This week Profit', 'Last week Profit', 'This month Profit', 'Last month Profit', 'This year Profit', 'Last year Profit'],
            datasets: [{
                label: 'Profit',
                data: [
                    resChart.data["total_profit"]? resChart.data["total_profit"]:0,
                    resChart.data["today_profit"]? resChart.data["today_profit"]:0,	
                    resChart.data["yesterday_profit"]? resChart.data["yesterday_profit"]:0,
                    resChart.data["this_week_profit"]? resChart.data["this_week_profit"]:0,
                    resChart.data["last_week_profit"]? resChart.data["last_week_profit"]:0,
                    resChart.data["this_month_profit"]? resChart.data["this_month_profit"]:0,
                    resChart.data["last_month_profit"]? resChart.data["last_month_profit"]:0,
                    resChart.data["this_year_profit"]? resChart.data["this_year_profit"]:0,
                    resChart.data["last_year_profit"]? resChart.data["last_year_profit"]:0
                ],
                backgroundColor: [
                    '#A87DFF',
                    '#7DD4FF',
                    '#7DA8FF',
                    '#C2F790',
                    '#A99EF6',
                    '#E2BCFB',
                    '#FBBCED',
                    '#FAA9A9',
                    '#AFFAA9',
                ]
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
}
        
         

         

        
    
        
   
</script>
