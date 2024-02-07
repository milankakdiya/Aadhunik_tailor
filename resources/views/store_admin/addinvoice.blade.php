@extends('store_admin.index')
@section('content')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- select opation jqury -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<style>
@media screen and (Max-width:768px) {
    .profile_pic input{
        width: 70%;

    }
    .profile_pic{
        flex-direction: row;
    }
}

.box{
    /* width: 15%; */
    height: 40px;
    padding: 10px;
    border: 1px solid gray;
    margin: 0;
    border-radius: 13px;
    cursor: pointer;
    }
</style>

<div class="modal-body">
    <form action="customer_store" id="invoiceForm" method="post" enctype="multipart/form-data">
        @csrf
        <div class="add_store_con justify-content-between">
            <input type="hidden" name="invoice_type" id="invoice_type" value="1">
            <div class="w-50">
                <div class="row mt-3">
                    <strong>Customer ID<span class="text-danger">*</span></strong>
                    <select id="customer_id" class="form-control"   name="customer_id" placeholder="Enter Customer ID">
                        <option value=""></option>
                        @foreach($customers as $customer)
                        <option value="{{$customer->customer_id}}">{{$customer->customer_id}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row mt-3">
                    <strong>Name<span class="text-danger">*</span></strong>
                    <select id="select_customer_name" class="form-control"  name="customer_name" placeholder="Enter Customer Name">
                        <option value=""></option>
                        @foreach($customers as $c)
                        <option value="{{$c->customer_name}}">{{$c->customer_name}}</option>
                        @endforeach
                    </select>    
                </div>
                <div class="row mt-3">
                    <strong>Invoice ID<span class="text-danger">*</span></strong>
                    <input type="tex" class="form-control"  name="invoice_id"  id="invoice_id" required/>        
                </div>
                <div class="row mt-3">
                    <strong>Phone Number<span class="text-danger">*</span></strong>
                        <select id="phone_number" class="form-control"  name="phone_number" placeholder="Enter Customer Number" required>
                            <option value=""></option> 
                            @foreach($customer_number as $number)
                            <option value="{{$number->customer_number}}">{{$number->customer_number}}</option>
                            @endforeach
                        </select>            
                </div>
            
            </div>
        
            <div class="d-flex w-50 margin-auto"  style="flex-direction: column;">
            <div class="profil_pic d-flex margin-auto justify-content-end">
                <img src="images/avatar.jpg" alt="avatar" width="45px" height="45px" class="rounded-circle">
                <div class="profil_cont ml-3 d-block">
                    <span class="d-block">Name :  Yash</span>
                    <span class="d-block">ID : 000001</span>
                </div>
            </div>
                <div class="profile_pic">
                    <div class="d-flex align-items-baseline">
                        <label for="img" class="w-auto">Invoice Date <span class="text-danger">*</span></label>
                        <input type="date" name="invoice_date" id="invoice_date"  class="form-control w-auto" required>
                    </div>
                </div>
                <div class="profile_pic">
                    <div class="d-flex align-items-baseline">
                        <label for="img" class="w-auto">Trial Date<span class="text-danger">*</span></label>
                        <input type="date" name="trial_date" id="trial_date"  class="form-control w-auto" required>
                    </div>
                </div>
                <div class="profile_pic">
                    <div class="d-flex align-items-baseline">
                        <label for="img" class="w-auto">Delivery Date<span class="text-danger">*</span></label>
                        <input type="date" name="delivery_date" id="delivery_date"  class="form-control w-auto" required>
                    </div>
                </div>
            </div>
        </div>
    </form>

        <hr size="8" width="100%" color="green">  

    <form action="" id="update_amont_form" style="overflow: auto;height: 500px;">
        <input type="hidden" id="form_invoice_id" name="form_invoice_id">
        <input type="hidden" id="base_url" value="{{ asset('/image') }}">
        

        <div class="d-flex mb-5">
            <div style="display: flex; margin-right: 10px; align-items: center; flex-wrap: wrap;">
                <div class="box m-1 shirt_show" id="shirt_show">Shirt</div>
                <div class="box m-1 pant_show" id="pant_show">Pant</div>
                <div class="box m-1 kurta_show" id="kurta_show">Kurta</div>
                <div class="box m-1 vest_show" id="vest_show">Vest[Waist Coat]</div>
                <div class="box m-1 blazer_show" id="blazer_show">Blazer/Jodhpuri</div>
                <div class="box m-1 servani_show" id="servani_show">Servani</div>
                <div class="box m-1 other_show" id="other_show">Other</div>
            </div>
        </div>
    
        
        <div style="overflow-x:auto">
            <table class="w-100" id="table1">
                <tr>
                    <th class="text-center p-2" style="border:1px solid black">Item Name</th>
                    <th class="text-center p-2" style="border:1px solid black">Order Id</th>
                    <th class="text-center p-2" style="border:1px solid black">Delivery/Trial Date</th>
                    <th class="text-center p-2" style="border:1px solid black">Image</th>
                    <th class="text-center p-2" style="border:1px solid black">Rate</th>
                    <th class="text-center p-2" style="border:1px solid black">Action</th>
                </tr>
                
                <tbody id="item_append_tbody">

                </tbody>
                <tr>
                    <td class="text-center p-2"></td>
                    <td class="text-center p-2"></td>
                    <td class="text-center p-2"></td>
                    <td class="text-center p-2"></td>
                    <th class="text-center p-2" style="border:1px solid black">Total</th>
                    <td class="text-center p-2 total" style="border:1px solid black">₹</td>
                </tr>
                <tr>
                    <td class="text-center p-2"></td>
                    <td class="text-center p-2"></td>
                    <td class="text-center p-2"></td>
                    <td class="text-center p-2"></td>
                    <td class="text-center p-2" style="border:1px solid black">Paid</th>
                    <td class="text-center p-2" style="border:1px solid black">₹</td>
                </tr>
                <tr>
                    <td class="text-center p-2"></td>
                    <td class="text-center p-2"></td>
                    <td class="text-center p-2"></td>
                    <td class="text-center p-2"></td>
                    <td class="text-center p-2" style="border:1px solid black">UnPaid</th>
                    <td class="text-center p-2" style="border:1px solid black">₹</td>
                </tr>
                <tr>
                    <td class="text-center p-2"></td>
                    <td class="text-center p-2"></td>
                    <td class="text-center p-2"></td>
                    <td class="text-center p-2"></td>
                    <td class="text-center p-2" style="border:1px solid black;text-align:left">Discount</th>
                    <td class="text-center p-2" style="border:1px solid black;text-align:left">₹</td>
                </tr>
            </table>
        </div>
        <div class="row mt-3"> 
            <strong>Notes</strong>
            <textarea name="notes" class="form-control"></textarea>
        </div>
    
        <div class="mt-3" style="text-align: center">
            <button type="submit" class="text-white p-2 border-0 rounded px-3 fw-bold send_inquiry_btn" style="background-color: #5ac1b0;width: 15%;">Submit</button>
        </div>
        <br><br>
    </form>
</div>


  <!-- add shirt store  -->
<div class="modal fade" id="shirtModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content w-50 m-auto">
            <div class="modal-header" style="background-color: #bdbfcb">
                <h5 class="modal-title" id="myModalLabel">Add New Shirt</h5>
                <div class="closed-it">
                    <span class="shirt_close"><i class="fa fa-close" style="font-size:24px;cursor: pointer;"></i></span>
                </div>
            </div>
            <div class="modal-body">
                <form action="store_store" method="post" id="shirt_store" enctype="multipart/form-data">
                    <input type="hidden" id="shirt_invoice_id" name="invoice_id" >
                    <input type="hidden" id="shirt_customer_id" name="customer_id">
                    <input type="hidden" id="shirt_customer_name" name="customer_name">

                    @csrf
                    <div class="add_store_con">
                        <div class="w-50">
                            <div class="row mt-3">
                                    <strong style="width: 30%;">Pair No<span class="text-danger">*</span></strong>
                                    <input type="text" class="form-control"  id="store_shit_pair_no" placeholder="Enter Pair Number" name="pair_no" required style="width: 70%;"/>
                            </div>
                            <div class="d-flex align-items-center">
                                    <input type="radio"  name="order_status" id="shirt_store_trial" value="1" class="mr-1">
                                    <label for="html" class="m-0">Trial</label><br>
                                    <input type="radio"  name="order_status" id="shirt_store_delivery" value="2" class="mr-1 ml-3">
                                    <label for="html2" class="m-0">Delivery</label><br>
                            </div>
                            <div class="row mt-3">
                                <strong style="width: 30%;">Trial Date/ Delivery<span class="text-danger">*</span></strong>
                                <input type="date" class="form-control" id="shirt_store_delivery_date"  placeholder="Enter Trial Date/ Delivery"  name="trial_delivery_date"  required style="width: 70%;"/>        
                            </div>
                            <div class="row mt-3">
                                <strong style="width: 30%;">Rate<span class="text-danger">*</span></strong>
                                <input type="tex" class="form-control" id="shirt_store_rate" placeholder="Enter Rate"  name="rate"  required style="width: 70%;"/>        
                            </div>
                        </div>
                        <div class="profile_pic w-50 align-items-center" style="flex-direction:column;">
                            <label for="img">Profile Image<span class="text-danger">*</span></label>
                            <span class="uplode_pic_view append_1 "></span>
                            <input type="file" name="image" id="append_1" accept="image/*" required>
                        </div>
                    </div>

                    <hr size="8" width="100%" color="green">  

                    <div class="row mt-3"> 
                            <strong>Notes</strong>
                            <textarea name="notes" id="shirt_store_notes"  class="form-control"></textarea>
                    </div>
                    
                    <div class="mt-3">
                        <button type="submit" class="text-white p-2 border-0 rounded px-3 fw-bold send_inquiry_btn show_my_value" style="background-color: #16ae71;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
  <!--  add pant store  -->
<div class="modal fade" id="pantModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content w-50 m-auto">
            <div class="modal-header" style="background-color: #bdbfcb">
                <h5 class="modal-title" id="myModalLabel">Add New Pant</h5>
                <div class="closed-it">
                    <span class="pant_close"><i class="fa fa-close" style="font-size:24px;cursor: pointer;"></i></span>
                </div>
            </div>
            <div class="modal-body">
                <form action="store_store" method="post" id="pant_store" enctype="multipart/form-data">
                    <input type="hidden" id="pant_invoice_id" name="invoice_id" >
                    <input type="hidden" id="pant_customer_id" name="customer_id">
                    <input type="hidden" id="pant_customer_name" name="customer_name">

                    @csrf
                    <div class="add_store_con">
                        <div class="w-50">

                            <div class="row mt-3">
                                    <strong style="width: 30%;">Pair No<span class="text-danger">*</span></strong>
                                    <input type="text" class="form-control" id="pant_pair_no"  placeholder="Enter Pair Number" name="pair_no" required style="width: 70%;"/>
                            </div>
                            <div class="d-flex align-items-center">
                                    <input type="radio"  name="order_status" value="1" id="pant_trail" class="mr-1">
                                    <label for="html" class="m-0">Trial</label><br>
                                    <input type="radio"  name="order_status" value="2" id="pant_delivery" class="mr-1 ml-3">
                                    <label for="html2" class="m-0">Delivery</label><br>
                            </div>
                            <div class="row mt-3">
                                <strong style="width: 30%;">Trial Date/ Delivery<span class="text-danger">*</span></strong>
                                <input type="date" class="form-control" id="pant_trail_date"  placeholder="Enter Trial Date/ Delivery"  name="trial_delivery_date"  required style="width: 70%;"/>        
                            </div>
                            <div class="row mt-3">
                                <strong style="width: 30%;">Rate<span class="text-danger">*</span></strong>
                                <input type="tex" class="form-control" id="pant_rate"  placeholder="Enter Rate"  name="rate"  required style="width: 70%;"/>        
                            </div>
                        </div>
                        <div class="profile_pic w-50 align-items-center" style="flex-direction:column;">
                            <label for="img">Profile Image<span class="text-danger">*</span></label>
                            <span class="uplode_pic_view append_2 "></span>
                            <input type="file" name="image" id="append_2" accept="image/*" required>
                        </div>
                    </div>

                    <hr size="8" width="100%" color="green">  

                    <div class="row mt-3"> 
                            <strong>Notes</strong>
                            <textarea name="notes" id="pant_notes"  class="form-control"></textarea>
                    </div>
                    
                    <div class="mt-3">
                        <button type="submit"
                            class="text-white p-2 border-0 rounded px-3 fw-bold send_inquiry_btn show_my_value" style="background-color: #16ae71;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
  <!-- add kurta store  -->
<div class="modal fade" id="kurtaModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content w-50 m-auto">
            <div class="modal-header" style="background-color: #bdbfcb">
                <h5 class="modal-title" id="myModalLabel">Add New Kurta</h5>
                <div class="closed-it">
                    <span class="kurta_close"><i class="fa fa-close" style="font-size:24px;cursor: pointer;"></i></span>
                </div>
            </div>
            <div class="modal-body">
                <form action="store_store" method="post" id="kurta_store" enctype="multipart/form-data">
                    <input type="hidden" id="kurta_invoice_id" name="invoice_id" >
                    <input type="hidden" id="kurta_customer_id" name="customer_id">
                    <input type="hidden" id="kurta_customer_name" name="customer_name">

                    @csrf
                    <div class="add_store_con">
                        <div class="w-50">

                            <div class="row mt-3">
                                    <strong style="width: 30%;">Pair No<span class="text-danger">*</span></strong>
                                    <input type="text" class="form-control" id="kurta_pair_no"  placeholder="Enter Pair Number" name="pair_no" required style="width: 70%;"/>
                            </div>
                            <div class="d-flex align-items-center">
                                    <input type="radio"  name="order_status" value="1" id="kurta_trail" class="mr-1">
                                    <label for="html" class="m-0">Trial</label><br>
                                    <input type="radio"  name="order_status" valuende="2" id="kurta_delivery" class="mr-1 ml-3">
                                    <label for="html2" class="m-0">Delivery</label><br>
                            </div>
                            <div class="row mt-3">
                                <strong style="width: 30%;">Trial Date/ Delivery<span class="text-danger">*</span></strong>
                                <input type="date" class="form-control"  placeholder="Enter Trial Date/ Delivery" id="kurta_trail_date"  name="trial_delivery_date"  required style="width: 70%;"/>        
                            </div>
                            <div class="row mt-3">
                                <strong style="width: 30%;">Rate<span class="text-danger">*</span></strong>
                                <input type="tex" class="form-control"  placeholder="Enter Rate" id="kurta_rate"  name="rate"  required style="width: 70%;"/>        
                            </div>
                        </div>
                        <div class="profile_pic w-50 align-items-center" style="flex-direction:column;">
                            <label for="img">Profile Image<span class="text-danger">*</span></label>
                            <span class="uplode_pic_view append_3 "></span>
                            <input type="file" name="image" id="append_3" accept="image/*" required>
                        </div>
                    </div>

                    <hr size="8" width="100%" color="green">  

                    <div class="row mt-3"> 
                            <strong>Notes</strong>
                            <textarea name="notes" id="kurta_notes"  class="form-control"></textarea>
                    </div>
                    
                    <div class="mt-3">
                        <button type="submit"
                            class="text-white p-2 border-0 rounded px-3 fw-bold send_inquiry_btn show_my_value" style="background-color: #16ae71;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
  <!-- add vest store  -->
<div class="modal fade" id="vestModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content w-50 m-auto">
            <div class="modal-header" style="background-color: #bdbfcb">
                <h5 class="modal-title" id="myModalLabel">Add New Vest[Waist Coat]</h5>
                <div class="closed-it">
                    <span class="vest_close"><i class="fa fa-close" style="font-size:24px;cursor: pointer;"></i></span>
                </div>
            </div>
            <div class="modal-body">
                <form action="store_store" method="post" id="vest_store" enctype="multipart/form-data">
                    <input type="hidden" id="vest_invoice_id" name="invoice_id" >
                    <input type="hidden" id="vest_customer_id" name="customer_id">
                    <input type="hidden" id="vest_customer_name" name="customer_name">

                    @csrf
                    <div class="add_store_con">
                        <div class="w-50">

                            <div class="row mt-3">
                                    <strong style="width: 30%;">Pair No<span class="text-danger">*</span></strong>
                                    <input type="text" class="form-control" id="vest_pair_no"  placeholder="Enter Pair Number" name="pair_no" required style="width: 70%;"/>
                            </div>
                            <div class="d-flex align-items-center">
                                    <input type="radio"  name="order_status" value="1" id="vest_trail" class="mr-1">
                                    <label for="html" class="m-0">Trial</label><br>
                                    <input type="radio"  name="order_status" value="2" id="vest_delivery" class="mr-1 ml-3">
                                    <label for="html2" class="m-0">Delivery</label><br>
                            </div>
                            <div class="row mt-3">
                                <strong style="width: 30%;">Trial Date/ Delivery<span class="text-danger">*</span></strong>
                                <input type="date" class="form-control" id="vest_trail_date"  placeholder="Enter Trial Date/ Delivery"  name="trial_delivery_date"  required style="width: 70%;"/>        
                            </div>
                            <div class="row mt-3">
                                <strong style="width: 30%;">Rate<span class="text-danger">*</span></strong>
                                <input type="tex" class="form-control" id="vest_rate" placeholder="Enter Rate"  name="rate"  required style="width: 70%;"/>        
                            </div>
                        </div>
                        <div class="profile_pic w-50 align-items-center" style="flex-direction:column;">
                            <label for="img">Profile Image<span class="text-danger">*</span></label>
                            <span class="uplode_pic_view append_4"></span>
                            <input type="file" name="image" id="append_4" accept="image/*" required>
                        </div>
                    </div>

                    <hr size="8" width="100%" color="green">  

                    <div class="row mt-3"> 
                            <strong>Notes</strong>
                            <textarea name="notes" id="vest_notes"  class="form-control"></textarea>
                    </div>
                    
                    <div class="mt-3">
                        <button type="submit"
                            class="text-white p-2 border-0 rounded px-3 fw-bold send_inquiry_btn show_my_value" style="background-color: #16ae71;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
  <!-- add blazer store  -->
<div class="modal fade" id="blazerModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content w-50 m-auto">
            <div class="modal-header" style="background-color: #bdbfcb">
                <h5 class="modal-title" id="myModalLabel">Add New Blazer/Jodhpuri</h5>
                <div class="closed-it">
                    <span class="blazer_close"><i class="fa fa-close" style="font-size:24px;cursor: pointer;"></i></span>
                </div>
            </div>
            <div class="modal-body">
                <form action="store_store" method="post" id="blazer_store" enctype="multipart/form-data">
                    <input type="hidden" id="blazer_invoice_id" name="invoice_id" >
                    <input type="hidden" id="blazer_customer_id" name="customer_id">
                    <input type="hidden" id="blazer_customer_name" name="customer_name">

                    @csrf
                    <div class="add_store_con">
                        <div class="w-50">

                            <div class="row mt-3">
                                    <strong style="width: 30%;">Pair No<span class="text-danger">*</span></strong>
                                    <input type="text" class="form-control" id="blazer_pair_no"  placeholder="Enter Pair Number" name="pair_no" required style="width: 70%;"/>
                            </div>
                            <div class="d-flex align-items-center">
                                    <input type="radio"  name="order_status" value="1" id="blazer_trail" class="mr-1">
                                    <label for="html" class="m-0">Trial</label><br>
                                    <input type="radio"  name="order_status" value="2" id="blazer_delivery" class="mr-1 ml-3">
                                    <label for="html2" class="m-0">Delivery</label><br>
                            </div>
                            <div class="row mt-3">
                                <strong style="width: 30%;">Trial Date/ Delivery<span class="text-danger">*</span></strong>
                                <input type="date" class="form-control" id="blazer_trail_date" placeholder="Enter Trial Date/ Delivery"  name="trial_delivery_date"  required style="width: 70%;"/>        
                            </div>
                            <div class="row mt-3">
                                <strong style="width: 30%;">Rate<span class="text-danger">*</span></strong>
                                <input type="tex" class="form-control" id="blazer_rate" placeholder="Enter Rate"  name="rate"  required style="width: 70%;"/>        
                            </div>
                        </div>
                        <div class="profile_pic w-50 align-items-center" style="flex-direction:column;">
                            <label for="img">Profile Image<span class="text-danger">*</span></label>
                            <span class="uplode_pic_view append_5"></span>
                            <input type="file" name="image" id="append_5" accept="image/*" required>
                        </div>
                    </div>

                    <hr size="8" width="100%" color="green">  

                    <div class="row mt-3"> 
                            <strong>Notes</strong>
                            <textarea name="notes" id="blazer_notes"  class="form-control"></textarea>
                    </div>
                    
                    <div class="mt-3">
                        <button type="submit"
                            class="text-white p-2 border-0 rounded px-3 fw-bold send_inquiry_btn show_my_value" style="background-color: #16ae71;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
  <!-- add servani store  -->
<div class="modal fade" id="servaniModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content w-50 m-auto">
            <div class="modal-header" style="background-color: #bdbfcb">
                <h5 class="modal-title" id="myModalLabel">Add New Servani</h5>
                <div class="closed-it">
                    <span class="servani_close"><i class="fa fa-close" style="font-size:24px;cursor: pointer;"></i></span>
                </div>
            </div>
            <div class="modal-body">
                <form action="store_store" method="post" id="servani_store" enctype="multipart/form-data">
                    <input type="hidden" id="servani_invoice_id" name="invoice_id" >
                    <input type="hidden" id="servani_customer_id" name="customer_id">
                    <input type="hidden" id="servani_customer_name" name="customer_name">

                    @csrf
                    <div class="add_store_con">
                        <div class="w-50">

                            <div class="row mt-3">
                                    <strong style="width: 30%;">Pair No<span class="text-danger">*</span></strong>
                                    <input type="text" class="form-control"  id="servani_pair_no" placeholder="Enter Pair Number" name="pair_no" required style="width: 70%;"/>
                            </div>
                            <div class="d-flex align-items-center">
                                    <input type="radio"  name="order_status" value="1" id="servani_trail" class="mr-1">
                                    <label for="html" class="m-0">Trial</label><br>
                                    <input type="radio"  name="order_status" value="2" id="servani_delivery" class="mr-1 ml-3">
                                    <label for="html2" class="m-0">Delivery</label><br>
                            </div>
                            <div class="row mt-3">
                                <strong style="width: 30%;">Trial Date/ Delivery<span class="text-danger">*</span></strong>
                                <input type="date" class="form-control" id="servani_trail_date"  placeholder="Enter Trial Date/ Delivery"  name="trial_delivery_date"  required style="width: 70%;"/>        
                            </div>
                            <div class="row mt-3">
                                <strong style="width: 30%;">Rate<span class="text-danger">*</span></strong>
                                <input type="tex" class="form-control"  placeholder="Enter Rate" id="servani_rate"  name="rate"  required style="width: 70%;"/>        
                            </div>
                        </div>
                        <div class="profile_pic w-50 align-items-center" style="flex-direction:column;">
                            <label for="img">Profile Image<span class="text-danger">*</span></label>
                            <span class="uplode_pic_view append_6"></span>
                            <input type="file" name="image" id="append_6" accept="image/*" required>
                        </div>
                    </div>

                    <hr size="8" width="100%" color="green">  

                    <div class="row mt-3"> 
                            <strong>Notes</strong>
                            <textarea name="notes" id="servani_notes"  class="form-control"></textarea>
                    </div>
                    
                    <div class="mt-3">
                        <button type="submit"
                            class="text-white p-2 border-0 rounded px-3 fw-bold send_inquiry_btn show_my_value" style="background-color: #16ae71;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
  <!-- add other store  -->
<div class="modal fade" id="otherModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content w-50 m-auto">
            <div class="modal-header" style="background-color: #bdbfcb">
                <h5 class="modal-title" id="myModalLabel">Add New Other</h5>
                <div class="closed-it">
                    <span class="other_close"><i class="fa fa-close" style="font-size:24px;cursor: pointer;"></i></span>
                </div>
            </div>
            <div class="modal-body">
                <form action="store_store" method="post" id="other_store" enctype="multipart/form-data">
                    <input type="hidden" id="other_invoice_id" name="invoice_id" >
                    <input type="hidden" id="other_customer_id" name="customer_id">
                    <input type="hidden" id="other_customer_name" name="customer_name">

                    @csrf
                    <div class="add_store_con">
                        <div class="w-50">

                            <div class="row mt-3">
                                    <strong style="width: 30%;">Pair No<span class="text-danger">*</span></strong>
                                    <input type="text" class="form-control" id="other_pair_no"  placeholder="Enter Pair Number" name="pair_no" required style="width: 70%;"/>
                            </div>
                            <div class="d-flex align-items-center">
                                    <input type="radio"  name="order_status" value="1" id="other_trail" class="mr-1">
                                    <label for="html" class="m-0">Trial</label><br>
                                    <input type="radio"  name="order_status" value="2" id="other_delivery" class="mr-1 ml-3">
                                    <label for="html2" class="m-0">Delivery</label><br>
                            </div>
                            <div class="row mt-3">
                                <strong style="width: 30%;">Trial Date/ Delivery<span class="text-danger">*</span></strong>
                                <input type="date" class="form-control" id="other_trail_date"  placeholder="Enter Trial Date/ Delivery"  name="trial_delivery_date"  required style="width: 70%;"/>        
                            </div>
                            <div class="row mt-3">
                                <strong style="width: 30%;">Rate<span class="text-danger">*</span></strong>
                                <input type="tex" class="form-control" id="other_rate"  placeholder="Enter Rate"  name="rate"  required style="width: 70%;"/>        
                            </div>
                        </div>
                        <div class="profile_pic w-50 align-items-center" style="flex-direction:column;">
                            <label for="img">Profile Image<span class="text-danger">*</span></label>
                            <span class="uplode_pic_view append_7"></span>
                            <input type="file" name="image" id="append_7" accept="image/*" required>
                        </div>
                    </div>

                    <hr size="8" width="100%" color="green">  

                    <div class="row mt-3"> 
                            <strong>Notes</strong>
                            <textarea name="notes" id="other_notes"  class="form-control"></textarea>
                    </div>
                    
                    <div class="mt-3">
                        <button type="submit"
                            class="text-white p-2 border-0 rounded px-3 fw-bold send_inquiry_btn show_my_value" style="background-color: #16ae71;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
  <!-- edit shirt store  -->
<div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content w-50 m-auto">
            <div class="modal-header" style="background-color: #bdbfcb">
                <h5 class="modal-title" id="myModalLabel">Edit Item</h5>
                <div class="closed-it">
                    <span class="shirt_edit_close"><i class="fa fa-close" style="font-size:24px;cursor: pointer;"></i></span>
                </div>
            </div>
            <div class="modal-body">
                <form action="order_item_edit" method="post" id="order_item_edit" enctype="multipart/form-data">
                    <input type="hidden" id="shirt_invoice_id" name="invoice_id" >
                    <input type="hidden" id="shirt_customer_id" name="customer_id">
                    <input type="hidden" id="shirt_customer_name" name="customer_name">
                    <input type="hidden" id="edit_shirt_id" name="id">

                    @csrf
                    <div class="add_store_con">
                        <div class="w-50">
                            <div class="row mt-3">
                                    <strong style="width: 30%;">Pair No<span class="text-danger">*</span></strong>
                                    <input type="text" class="form-control" id="shirt_pair_no"  placeholder="Enter Pair Number" name="pair_no" required style="width: 70%;"/>
                            </div>
                            <div class="d-flex align-items-center">
                                    <input type="radio"  name="order_status" id="edit_trial" value="1" class="mr-1">
                                    <label for="html" class="m-0">Trial</label><br>
                                    <input type="radio"  name="order_status" id="edit_delivery" value="2" class="mr-1 ml-3">
                                    <label for="html2" class="m-0">Delivery</label><br>
                            </div>
                            <div class="row mt-3">
                                <strong style="width: 30%;">Trial Date/ Delivery<span class="text-danger">*</span></strong>
                                <input type="date" class="form-control" id="shirt_trail_date"  placeholder="Enter Trial Date/ Delivery"  name="trial_delivery_date"  required style="width: 70%;"/>        
                            </div>
                            <div class="row mt-3">
                                <strong style="width: 30%;">Rate<span class="text-danger">*</span></strong>
                                <input type="tex" class="form-control" id="edit_shirt_rate"  placeholder="Enter Rate"  name="rate"  required style="width: 70%;"/>        
                            </div>
                        </div>
                        <div class="profile_pic w-50 align-items-center" style="flex-direction:column;">
                            <label for="img">Profile Image<span class="text-danger">*</span></label>
                            <span class="uplode_pic_view append_7" id="shirt_image_edit"></span>
                            <input type="file" name="image" id="append_7" accept="image/*">
                        </div>
                    </div>

                    <hr size="8" width="100%" color="green">  

                    <div class="row mt-3"> 
                            <strong>Notes</strong>
                            <textarea name="notes" id="shirt_notes"  class="form-control"></textarea>
                    </div>
                    
                    <div class="mt-3">
                        <button type="submit" class="text-white p-2 border-0 rounded px-3 fw-bold send_inquiry_btn show_my_value" style="background-color: #16ae71;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--customer Delete Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 30%;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #dfe8eb">
                <h5 class="modal-title" id="myModalLabel">Delete Item</h5>
            </div>
            <div class="modal-body">
                <h5 class="text-center" style="margin-right: 8%;">Are you sure you want to delete item?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    style="background-color:#356a7f " id="delete_close">Close</button>
                <button type="button"  id="deletemember" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {

    
        $(document).on('click', '.shirt_close', function(event){
            event.preventDefault();
            $('#shirtModalCenter'). modal('hide');
        });

        $(document).on('click', '.shirt_show', function(event){
            event.preventDefault(); 
            $('#shirtModalCenter').modal('show');
        });

        $(document).on('click', '.shirt_edit_close', function(event){
            event.preventDefault(); 
            $('#editModalCenter').modal('show');
        });
        
        $(document).on('click','.pant_show', function(event){
            event.preventDefault(); 
            $('#pantModalCenter').modal('show');
        });

        $(document). on('click','.pant_close', function(event){
            event.preventDefault(); 
            $('#pantModalCenter').modal('hide');
        });

        $(document).on('click', '.kurta_show', function(event){
            event.preventDefault(); 
            $('#kurtaModalCenter').modal('show');
        });

        $(document).on('click', '.kurta_close', function(event){
            event.preventDefault(); 
            $('#kurtaModalCenter').modal('hide');
        });

        $(document).on('click', '.vest_show', function(event){
            event.preventDefault(); 
            $('#vestModalCenter').modal('show');
        });

        $(document).on('click', '.vest_close', function(event){
            event.preventDefault(); 
            $('#vestModalCenter').modal('hide');
        });

        $(document).on('click', '.blazer_show', function(event){
            event.preventDefault(); 
            $('#blazerModalCenter').modal('show');
        })
        $(document).on('click', '.blazer_close', function(event){
            event.preventDefault(); 
            $('#blazerModalCenter').modal('hide');
        });
        $(document).on('click', '.servani_show', function(event){
            event.preventDefault(); 
            $('#servaniModalCenter').modal('show');
        });
        $(document).on('click', '.servani_close', function(event){
            event.preventDefault(); 
            $('#servaniModalCenter').modal('hide');
        });
        $(document).on('click', '.other_show', function(event){
            event.preventDefault(); 
            $('#otherModalCenter').modal('show');
        });
        $(document).on('click', '.other_close', function(event){
            event.preventDefault(); 
            $('#otherModalCenter').modal('hide');
        });
         
         $(document).on('click', '.invoice_close', function(event){
            event.preventDefault(); 
            $('#exampleModalCenter').modal('hide');
         });
         
        $(document).on('click', '.type_close', function(event){
           event.preventDefault();
           $('#opationModalCenter').modal('hide');
        });
        
        
        // ------ gey customer_id value -----------------
        $('#customer_id').on('change', function () {
            var customerID = $(this).val();
            $.ajax({
                type: 'GET',
                url: '/get_details', 
                data: {
                    customer_id: customerID 
                },
                success: function (response) {  
                    console.log(response, 'get_details');
                    console.log(response.customer_name, 'customer_name');

                    var selectCustomerName = $('#select_customer_name');

                    // Clear previous selection
                    selectCustomerName.val(null);

                    // Log all dropdown options for debugging
                    console.log('Dropdown Options:', selectCustomerName.find('option').map(function() { return $(this).text().trim(); }).get());

                    // Find and select the option (case-insensitive and trim whitespaces)
                    var matchingOption = selectCustomerName.find('option').filter(function() {
                        return $(this).text().trim().toLowerCase() === response.customer_name.trim().toLowerCase();
                    });

                    if (matchingOption.length > 0) {
                        matchingOption.prop('selected', true);
                    } else {
                        console.error('Option not found:', response.customer_name);
                    }
                },
                error: function (error) {
                    console.error('Error fetching customer details:', error);
                }
            });
        });
    
        // select opation        
        $(document).ready(function () {
            $('select').selectize({
                sortField: 'text'
            });
        });

         // Capture input events on form fields
        $('#customer_id, #customer_name, #invoice_type, #phone_number, #invoice_date, #trial_date, #delivery_date').on('input', function () {
            saveInvoice();
        });

        // Function to make the AJAX call
        function saveInvoice() {
            $.ajax({
                url: '{{ route("storeadmin.store_new_invoice") }}',
                method: 'POST',
                data: $('#invoiceForm').serialize(),
                success: function (response) {
                   
                    $('#invoice_id').val(response.invoice_id);    
                    $('#form_invoice_id').val(response.invoice_id);    
                    $('#shirt_invoice_id').val(response.invoice_id);  
                    $('#shirt_customer_id').val(response.customer_id);
                    $('#shirt_customer_name').val(response.customer_name);

                    $('#pant_invoice_id').val(response.invoice_id);  
                    $('#pant_customer_id').val(response.customer_id);
                    $('#pant_customer_name').val(response.customer_name);

                    $('#kurta_invoice_id').val(response.invoice_id);  
                    $('#kurta_customer_id').val(response.customer_id);
                    $('#kurta_customer_name').val(response.customer_name);

                    $('#vest_invoice_id').val(response.invoice_id);  
                    $('#vest_customer_id').val(response.customer_id);
                    $('#vest_customer_name').val(response.customer_name);

                    $('#blazer_invoice_id').val(response.invoice_id);  
                    $('#blazer_customer_id').val(response.customer_id);
                    $('#blazer_customer_name').val(response.customer_name);

                    $('#servani_invoice_id').val(response.invoice_id);  
                    $('#servani_customer_id').val(response.customer_id);
                    $('#servani_customer_name').val(response.customer_name);

                    $('#other_invoice_id').val(response.invoice_id);  
                    $('#other_customer_id').val(response.customer_id);
                    $('#other_customer_name').val(response.customer_name);

                },
                error: function (error) {
                    console.error('Error saving invoice:', error);
                }
            });
        }

        $('#update_amont_form').submit(function(event){
            event.preventDefault();
            var formData = new FormData($(this)[0]);


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('storeadmin.update_amont') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                
                    $('#exampleModalCenter'). modal('hide');
                },
                error: function (error) {
                    // Handle error response
                    console.log(error);
                }
            });

        });
      
    //  ----- shirt_store_show ------------------------
    $('#shirt_store').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($(this)[0]);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{ route('storeadmin.shirt_order') }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response, ':shirt');
                $('#shirtModalCenter').modal('hide');
                if (response.success) {
                    var baseUrl = $('#base_url').val();
                        var responseData = response.data;
                        var image = baseUrl + '/' + responseData.image;

                    
                            var row = '<tr data-id="' + responseData.id + '">';
                            row += '<td class="text-center p-2 text-start product_name" style="border:1px solid black">' + responseData.product_name + '</td>'; 
                            row += '<td class="text-center p-2 text-start id" style="border:1px solid black">' + responseData.id + '</td>'; 
                            row += '<td class="text-center p-2 text-start trial_delivery_date" style="border:1px solid black">' + responseData.trial_delivery_date + '</td>'; 
                            row += `<td class="text-center p-2 text-start image" style="border:1px solid black">
                                    <a data-bs-toggle="modal" data-bs-target="#modal${responseData.id}shirt">
                                        <img src="${image}" alt="Image" style="width:45px;height:35px">
                                    </a>
                                    <div class="modal fade" id="modal${responseData.id}shirt">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="margin-left: auto;margin-right: auto;width: 50%;">
                                                <div class="modal-body">
                                                    <div class="input-group mb-3" style="justify-content: center;">
                                                        <img src="${image}" alt="Image" style="height:50%;width:50%;">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>`;
                        
                            row += '<td class="text-center p-2 text-start rate" style="border:1px solid black">' + responseData.rate + '</td>'; 
                                     var baseUrl = $('#base_url').val();
                                    var responseData = response.data;
                                    var image = baseUrl + '/' + responseData.image;
                            row += `<td class="text-center p-2 text-start" style="border:1px solid black">
                                        <a href="#" class="shirt_delete" data-id="${responseData.id}" style="font-size: x-large;">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="#" class="shirt_edit" 
                                            data-id="${responseData.id}" 
                                            data-notes="${responseData.notes}"
                                            data-order_status="${responseData.order_status}"
                                            data-pair_no="${responseData.pair_no}"
                                            data-rate="${responseData.rate}"
                                            data-product_name="${responseData.product_name}" 
                                            data-trial_delivery_date="${responseData.trial_delivery_date}" 
                                            data-image="${responseData.image}" 
                                            style="font-size: x-large;">
                                                <i class="fa fa-edit"></i>
                                        </a>
                                    
                                
                                    

                                    <a data-bs-toggle="modal" data-bs-target="#modal${responseData.id}pent_image_measurment_print">
                                    <i class="fa fa-print" style="font-size: 30px;color:#564ec1;cursor:pointer;"></i>
                                    
                                    </a>
                                    <div class="modal fade" id="modal${responseData.id}pent_image_measurment_print">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="margin-left: auto;margin-right: auto;width: 50%;">
                                                <div class="modal-body">
                                                    <div class="input-group mb-3" style="justify-content: center;">
                                                
                 

              
                                                        <div class="add_store_con">
                                                            <div class="w-50">

                                                                <div class="row mt-3">
                                                                        <strong >Pair No</strong>
                                                                        <input  class="form-control" value="${responseData.pair_no}"/>
                                                                </div>
                                                                <div class="row mt-3">
                                                                        <strong >Order Stuts</strong>
                                                                        <input  class="form-control" value="${responseData.order_status}" />
                                                                </div>
                                                                <div class="row mt-3">
                                                                    <strong >Trial Date/ Delivery</strong>
                                                                    <input  class="form-control" value="${responseData.trial_delivery_date}" />        
                                                                </div>
                                                                <div class="row mt-3">
                                                                    <strong>Rate</strong>
                                                                    <input  class="form-control" value="${responseData.rate}"  />        
                                                                </div>
                                                            </div>
                                                            <div class="profile_pic w-50 align-items-center" style="flex-direction:column;">
                                                                <label for="img">Profile Image</label>
                                                                <div class="uplode_pic_view" style="display: inline-block; background-image: url('${image}'); background-size: cover; background-position: center;"></div>

                                                            
                                                            </div>
                                                        </div>

                                                        <hr size="8" width="100%" color="green">  

                                                        <div class="row mt-3" style="width: 100%;"> 
                                                                <strong>Notes</strong>
                                                                <textarea value="${responseData.notes}"  class="form-control"></textarea>
                                                        </div>
                    
                 
           
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Print</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                            

                                        
                            </td>`;

                          $(`#${responseData.id}pent_image_measurment_print`).prependTo("body");

                            row += '</tr>';
                            $('#item_append_tbody').append(row);

                            $('#store_shit_pair_no').val('');
                            $('#shirt_store_delivery_date').val('');
                            $('#shirt_store_rate').val('');
                            $('#append_1').val('');
                            $('#shirt_store_notes').val('');
                            
                            $("#shirt_store_trial").prop("checked", false);
                            $("#shirt_store_delivery").prop("checked", false);
                        
                }
            },
            error: function (error) {
                // Handle error response
                console.log(error);
            }
        });
    });
 

    $('#item_append_tbody tr').each(function () {
        var row = $(this);
        console.log(row);
        
        // Check if the row has the necessary data
        if (row.data('id') && row.find('.rate').text()) {
            // Get the rate and calculate the total
            var rate = parseFloat(row.find('.rate').text());
            var total = rate; // Use rate directly if no quantity is provided

            // Update the "Total" column in the current row
            row.find('.total').text('₹' + total.toFixed(2));
        }
    });

    $('#pant_store').submit(function (event) { 
        event.preventDefault();
        var formData = new FormData($(this)[0]);


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{ route('storeadmin.pant_order') }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#pantModalCenter'). modal('hide');
                if (response.success) {
                    var baseUrl = $('#base_url').val();
                        var responseData = response.data;
                        var image = baseUrl + '/' + responseData.image;

                            var row = '<tr data-id="' + responseData.id + '">';
                            row += '<td class="text-center p-2 text-start product_name" style="border:1px solid black">' + responseData.product_name + '</td>'; 
                            row += '<td class="text-center p-2 text-start id" style="border:1px solid black">' + responseData.id + '</td>'; 
                            row += '<td class="text-center p-2 text-start trial_delivery_date" style="border:1px solid black">' + responseData.trial_delivery_date + '</td>'; 
                            row += `<td class="text-center p-2 text-start image" style="border:1px solid black">
                                    <a data-bs-toggle="modal" data-bs-target="#modal${responseData.id}pant">
                                        <img src="${image}" alt="Image" style="width:45px;height:35px">
                                    </a>
                                    <div class="modal fade" id="modal${responseData.id}pant">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="margin-left: auto;margin-right: auto;width: 50%;">
                                                <div class="modal-body">
                                                    <div class="input-group mb-3" style="justify-content: center;">
                                                        <img src="${image}" alt="Image" style="height:50%;width:50%;">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>`;
                            row += '<td class="text-center p-2 text-start rate" style="border:1px solid black">' + responseData.rate + '</td>'; 
                            row += `<td class="text-center p-2 text-start" style="border:1px solid black">
                                        <a href="#" class="shirt_delete" data-id="${responseData.id}" style="font-size: x-large;">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="#" class="shirt_edit" 
                                            data-id="${responseData.id}" 
                                            data-notes="${responseData.notes}"
                                            data-order_status="${responseData.order_status}"
                                            data-pair_no="${responseData.pair_no}"
                                            data-rate="${responseData.rate}"
                                            data-product_name="${responseData.product_name}" 
                                            data-trial_delivery_date="${responseData.trial_delivery_date}" 
                                            data-image="${responseData.image}" style="font-size: x-large;">
                                                <i class="fa fa-edit"></i>
                                        </a>
                                      <a href="#" class="print" style="font-size: x-large;"><i class="fa fa-print"></i></a>
                                    </td>`;

                            row += '</tr>';
                            $('#item_append_tbody').append(row);

                            $('#pant_pair_no').val('');
                            $('#pant_trail_date').val('');
                            $('#pant_rate').val('');
                            $('#append_2').val('');
                            $('#pant_notes').val('');
                            
                            $("#pant_trail").prop("checked", false);
                            $("#pant_delivery").prop("checked", false);
                           
                }
            },
            error: function (error) {
                // Handle error response
                console.log(error);
            }
        });
    });
    $('#kurta_store').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($(this)[0]);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{ route('storeadmin.kurta_order') }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#kurtaModalCenter'). modal('hide');
                if (response.success) {
                    var baseUrl = $('#base_url').val();
                        var responseData = response.data;
                        var image = baseUrl + '/' + responseData.image;

                            var row = '<tr data-id="' + responseData.id + '">';
                            row += '<td class="text-center p-2 text-start product_name" style="border:1px solid black">' + responseData.product_name + '</td>'; 
                            row += '<td class="text-center p-2 text-start id" style="border:1px solid black">' + responseData.id + '</td>'; 
                            row += '<td class="text-center p-2 text-start trial_delivery_date" style="border:1px solid black">' + responseData.trial_delivery_date + '</td>'; 
                            row += `<td class="text-center p-2 text-start image" style="border:1px solid black">
                                    <a data-bs-toggle="modal" data-bs-target="#modal${responseData.id}kurta">
                                        <img src="${image}" alt="Image" style="width:45px;height:35px">
                                    </a>
                                    <div class="modal fade" id="modal${responseData.id}kurta">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="margin-left: auto;margin-right: auto;width: 50%;">
                                                <div class="modal-body">
                                                    <div class="input-group mb-3" style="justify-content: center;">
                                                        <img src="${image}" alt="Image" style="height:50%;width:50%;">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>`;
                            row += '<td class="text-center p-2 text-start rate" style="border:1px solid black">' + responseData.rate + '</td>'; 
                            row += `<td class="text-center p-2 text-start" style="border:1px solid black">
                                        <a href="#" class="shirt_delete" data-id="${responseData.id}" style="font-size: x-large;">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="#" class="shirt_edit" 
                                            data-id="${responseData.id}" 
                                            data-notes="${responseData.notes}"
                                            data-order_status="${responseData.order_status}"
                                            data-pair_no="${responseData.pair_no}"
                                            data-rate="${responseData.rate}"
                                            data-product_name="${responseData.product_name}" 
                                            data-trial_delivery_date="${responseData.trial_delivery_date}" 
                                            data-image="${responseData.image}" style="font-size: x-large;">
                                                <i class="fa fa-edit"></i>
                                        </a>
                                      <a href="#" class="print" style="font-size: x-large;"><i class="fa fa-print"></i></a>
                                    </td>`;

                            row += '</tr>';
                            $('#item_append_tbody').append(row);

                            $('#kurta_pair_no').val('');
                            $('#kurta_trail_date').val('');
                            $('#kurta_rate').val('');
                            $('#append_3').val('');
                            $('#kurta_notes').val('');
                            
                            $("#kurta_trail").prop("checked", false);
                            $("#kurta_delivery").prop("checked", false);
                           
                }
            },
            error: function (error) {
                // Handle error response
                console.log(error);
            }
        });
    });

    $('#vest_store').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($(this)[0]);


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{ route('storeadmin.vest_order') }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#vestModalCenter'). modal('hide');
                if (response.success) {
                    var baseUrl = $('#base_url').val();
                        var responseData = response.data;
                        var image = baseUrl + '/' + responseData.image;

                            var row = '<tr data-id="' + responseData.id + '">';
                            row += '<td class="text-center p-2 text-start product_name" style="border:1px solid black">' + responseData.product_name + '</td>'; 
                            row += '<td class="text-center p-2 text-start id" style="border:1px solid black">' + responseData.id + '</td>'; 
                            row += '<td class="text-center p-2 text-start trial_delivery_date" style="border:1px solid black">' + responseData.trial_delivery_date + '</td>'; 
                            row += `<td class="text-center p-2 text-start image" style="border:1px solid black">
                                    <a data-bs-toggle="modal" data-bs-target="#modal${responseData.id}vest">
                                        <img src="${image}" alt="Image" style="width:45px;height:35px">
                                    </a>
                                    <div class="modal fade" id="modal${responseData.id}vest">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="margin-left: auto;margin-right: auto;width: 50%;">
                                                <div class="modal-body">
                                                    <div class="input-group mb-3" style="justify-content: center;">
                                                        <img src="${image}" alt="Image" style="height:50%;width:50%;">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>`;
                            row += '<td class="text-center p-2 text-start rate" style="border:1px solid black">' + responseData.rate + '</td>'; 
                            row += `<td class="text-center p-2 text-start" style="border:1px solid black">
                                        <a href="#" class="shirt_delete" data-id="${responseData.id}" style="font-size: x-large;">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="#" class="shirt_edit" 
                                            data-id="${responseData.id}" 
                                            data-notes="${responseData.notes}"
                                            data-order_status="${responseData.order_status}"
                                            data-pair_no="${responseData.pair_no}"
                                            data-rate="${responseData.rate}"
                                            data-product_name="${responseData.product_name}" 
                                            data-trial_delivery_date="${responseData.trial_delivery_date}" 
                                            data-image="${responseData.image}" style="font-size: x-large;">
                                                <i class="fa fa-edit"></i>
                                        </a>
                                      <a href="#" class="print" style="font-size: x-large;"><i class="fa fa-print"></i></a>
                                    </td>`;

                            row += '</tr>';
                            $('#item_append_tbody').append(row);

                            $('#vest_pair_no').val('');
                            $('#vest_trail_date').val('');
                            $('#vest_rate').val('');
                            $('#append_4').val('');
                            $('#vest_notes').val('');
                            
                            $("#vest_trail").prop("checked", false);
                            $("#vest_delivery ").prop("checked", false);
                           
                }
            },
            error: function (error) {
                // Handle error response
                console.log(error);
            }
        });
    });

      
    $('#blazer_store').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($(this)[0]);


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{ route('storeadmin.blazer_order') }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#blazerModalCenter'). modal('hide');
                if (response.success) {
                    var baseUrl = $('#base_url').val();
                        var responseData = response.data;
                        var image = baseUrl + '/' + responseData.image;

                            var row = '<tr data-id="' + responseData.id + '">';
                            row += '<td class="text-center p-2 text-start product_name" style="border:1px solid black">' + responseData.product_name + '</td>'; 
                            row += '<td class="text-center p-2 text-start id" style="border:1px solid black">' + responseData.id + '</td>'; 
                            row += '<td class="text-center p-2 text-start trial_delivery_date" style="border:1px solid black">' + responseData.trial_delivery_date + '</td>'; 
                            row += `<td class="text-center p-2 text-start image" style="border:1px solid black">
                                    <a data-bs-toggle="modal" data-bs-target="#modal${responseData.id}blazer">
                                        <img src="${image}" alt="Image" style="width:45px;height:35px">
                                    </a>
                                    <div class="modal fade" id="modal${responseData.id}blazer">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="margin-left: auto;margin-right: auto;width: 50%;">
                                                <div class="modal-body">
                                                    <div class="input-group mb-3" style="justify-content: center;">
                                                        <img src="${image}" alt="Image" style="height:50%;width:50%;">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>`;
                            row += '<td class="text-center p-2 text-start rate" style="border:1px solid black">' + responseData.rate + '</td>'; 
                            row += `<td class="text-center p-2 text-start" style="border:1px solid black">
                                        <a href="#" class="shirt_delete" data-id="${responseData.id}" style="font-size: x-large;">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="#" class="shirt_edit" 
                                            data-id="${responseData.id}" 
                                            data-notes="${responseData.notes}"
                                            data-order_status="${responseData.order_status}"
                                            data-pair_no="${responseData.pair_no}"
                                            data-rate="${responseData.rate}"
                                            data-product_name="${responseData.product_name}" 
                                            data-trial_delivery_date="${responseData.trial_delivery_date}" 
                                            data-image="${responseData.image}" style="font-size: x-large;">
                                                <i class="fa fa-edit"></i>
                                        </a>
                                      <a href="#" class="print" style="font-size: x-large;"><i class="fa fa-print"></i></a>
                                    </td>`;

                            row += '</tr>';
                            $('#item_append_tbody').append(row);

                            $('#blazer_pair_no').val('');
                            $('#blazer_trail_date').val('');
                            $('#blazer_rate').val('');
                            $('#append_5').val('');
                            $('#blazer_notes').val('');
                            
                            $("#blazer_trail").prop("checked", false);
                            $("#blazer_delivery ").prop("checked", false);
                           
                }
            },
            error: function (error) {
                // Handle error response
                console.log(error);
            }
        });
    });

    $('#servani_store').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($(this)[0]);


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{ route('storeadmin.servani_order') }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#servaniModalCenter'). modal('hide');
                if (response.success) {
                    var baseUrl = $('#base_url').val();
                        var responseData = response.data;
                        var image = baseUrl + '/' + responseData.image;

                            var row = '<tr data-id="' + responseData.id + '">';
                            row += '<td class="text-center p-2 text-start product_name" style="border:1px solid black">' + responseData.product_name + '</td>'; 
                            row += '<td class="text-center p-2 text-start id" style="border:1px solid black">' + responseData.id + '</td>'; 
                            row += '<td class="text-center p-2 text-start trial_delivery_date" style="border:1px solid black">' + responseData.trial_delivery_date + '</td>'; 
                            row += `<td class="text-center p-2 text-start image" style="border:1px solid black">
                                    <a data-bs-toggle="modal" data-bs-target="#modal${responseData.id}servani">
                                        <img src="${image}" alt="Image" style="width:45px;height:35px">
                                    </a>
                                    <div class="modal fade" id="modal${responseData.id}servani">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="margin-left: auto;margin-right: auto;width: 50%;">
                                                <div class="modal-body">
                                                    <div class="input-group mb-3" style="justify-content: center;">
                                                        <img src="${image}" alt="Image" style="height:50%;width:50%;">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>`;
                            row += '<td class="text-center p-2 text-start rate" style="border:1px solid black">' + responseData.rate + '</td>'; 
                            row += `<td class="text-center p-2 text-start" style="border:1px solid black">
                                        <a href="#" class="shirt_delete" data-id="${responseData.id}" style="font-size: x-large;">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="#" class="shirt_edit" 
                                            data-id="${responseData.id}" 
                                            data-notes="${responseData.notes}"
                                            data-order_status="${responseData.order_status}"
                                            data-pair_no="${responseData.pair_no}"
                                            data-rate="${responseData.rate}"
                                            data-product_name="${responseData.product_name}" 
                                            data-trial_delivery_date="${responseData.trial_delivery_date}" 
                                            data-image="${responseData.image}" style="font-size: x-large;">
                                                <i class="fa fa-edit"></i>
                                        </a>
                                      <a href="#" class="print" style="font-size: x-large;"><i class="fa fa-print"></i></a>
                                    </td>`;

                            row += '</tr>';
                            $('#item_append_tbody').append(row);

                            $('#servani_pair_no').val('');
                            $('#servani_trail_date').val('');
                            $('#servani_rate').val('');
                            $('#append_6').val('');
                            $('#servani_notes').val('');
                            
                            $("#servani_trail").prop("checked", false);
                            $("#servani_delivery").prop("checked", false);
                           
                }
            },
            error: function (error) {
                // Handle error response
                console.log(error);
            }
        });
    });

    $('#other_store').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($(this)[0]);


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{ route('storeadmin.other_order') }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#otherModalCenter'). modal('hide');
                if (response.success) {
                    var baseUrl = $('#base_url').val();
                        var responseData = response.data;
                        var image = baseUrl + '/' + responseData.image;

                            var row = '<tr data-id="' + responseData.id + '">';
                            row += '<td class="text-center p-2 text-start product_name" style="border:1px solid black">' + responseData.product_name + '</td>'; 
                            row += '<td class="text-center p-2 text-start id" style="border:1px solid black">' + responseData.id + '</td>'; 
                            row += '<td class="text-center p-2 text-start trial_delivery_date" style="border:1px solid black">' + responseData.trial_delivery_date + '</td>'; 
                            row += `<td class="text-center p-2 text-start image" style="border:1px solid black">
                                    <a data-bs-toggle="modal" data-bs-target="#modal${responseData.id}other">
                                        <img src="${image}" alt="Image" style="width:45px;height:35px">
                                    </a>
                                    <div class="modal fade" id="modal${responseData.id}other">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="margin-left: auto;margin-right: auto;width: 50%;">
                                                <div class="modal-body">
                                                    <div class="input-group mb-3" style="justify-content: center;">
                                                        <img src="${image}" alt="Image" style="height:50%;width:50%;">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>`;
                            row += '<td class="text-center p-2 text-start rate" style="border:1px solid black">' + responseData.rate + '</td>'; 
                            row += `<td class="text-center p-2 text-start" style="border:1px solid black">
                                        <a href="#" class="shirt_delete" data-id="${responseData.id}" style="font-size: x-large;">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="#" class="shirt_edit" 
                                            data-id="${responseData.id}" 
                                            data-notes="${responseData.notes}"
                                            data-order_status="${responseData.order_status}"
                                            data-pair_no="${responseData.pair_no}"
                                            data-rate="${responseData.rate}"
                                            data-product_name="${responseData.product_name}" 
                                            data-trial_delivery_date="${responseData.trial_delivery_date}" 
                                            data-image="${responseData.image}" style="font-size: x-large;">
                                                <i class="fa fa-edit"></i>
                                        </a>
                                      <a href="#" class="print" style="font-size: x-large;"><i class="fa fa-print"></i></a>
                                    </td>`;

                            row += '</tr>';
                            $('#item_append_tbody').append(row);

                            $('#other_pair_no').val('');
                            $('#other_trail_date').val('');
                            $('#other_rate').val('');
                            $('#append_7').val('');
                            $('#other_notes').val('');
                            
                            $("#other_trail").prop("checked", false);
                            $("#other_delivery ").prop("checked", false);
                           
                }
            },
            error: function (error) {
                // Handle error response
                console.log(error);
            }
        });
    });
    
    //  -----------------  item_edit_show -------------------
    $(document).on('click', '.shirt_edit', function(event){
        console.log('heelo');
        event.preventDefault(); 
        var id = $(this).data('id');
        var product_name = $(this).data('product_name');
        var trial_delivery_date =  $(this).data('trial_delivery_date');
        var image = $(this).data('image');
        var pair_no = $(this).data('pair_no');
        var rate = $(this).data('rate');
        var notes = $(this).data('notes');
        var order_status = $(this).data('order_status');

        var baseUrl = $('#base_url').val();
        var shirt_edit_image = baseUrl + '/' + image;
        $('#editModalCenter').modal('show');
        $('#shirt_pair_no').val(pair_no);
        $('#shirt_edit_product_name').val(product_name); 
        $('#shirt_trail_date').val(trial_delivery_date);
        $('#edit_shirt_rate').val(rate);
        $('#shirt_notes').val(notes);
        $('#shirt_image_edit').attr('style', 'background-image: url(' + shirt_edit_image + '); background-size: cover; background-position: center center;'); 
        if (order_status == 1) {
            $("input[id=edit_trial]").prop("checked", true);
        }else if(order_status == 2){
            $("input[id=edit_delivery]").prop("checked", true);
        }
        $('#edit_shirt_id').val(id);

    });

    $('#order_item_edit').on('submit', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var form = $(this).serialize();
        var url = $(this).attr('action');
        console.log(url);
        $.post(url, form, function(response) {
            console.log('edit_shirt:',response);
            $('#editModalCenter').modal('hide');
            if (response.success) {

                var baseUrl = $('#base_url').val();
                 
                var responseData = response.data;
                var image = baseUrl + '/' + response.data.image;
                 console.log(image);

                $('#editModalCenter').modal('hide');

                var updatedRow = '<td class="text-center p-2 text-start product_name"  style="border:1px solid black">' + response.data.product_name + '</td>';
                updatedRow += '<td class="text-center p-2 text-start id"  style="border:1px solid black">' + response.data.id + '</td>';
                updatedRow += '<td class="text-center p-2 text-start trial_delivery_date"  style="border:1px solid black">' + response.data.trial_delivery_date + '</td>';
                updatedRow += `<td class="text-center p-2 text-start image" style="border:1px solid black">
                        <a data-bs-toggle="modal" data-bs-target="#modal${response.data.id}shirt_edit">
                            <img src="${image}" alt="Image" style="width:45px;height:35px">
                        </a>
                        <div class="modal fade" id="modal${response.data.id}shirt_edit">
                            <div class="modal-dialog">
                                <div class="modal-content" style="margin-left: auto;margin-right: auto;width: 50%;">
                                    <div class="modal-body">
                                        <div class="input-group mb-3" style="justify-content: center;">
                                            <img src="${image}" alt="Image" style="height:50%;width:50%;">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>`;
                
                updatedRow += '<td class="text-center p-2 text-start rate" style="border:1px solid black">' + response.data.rate + '</td>';
                updatedRow += `<td class="text-center p-2 text-start" style="border:1px solid black">
                                        <a href="#" class="shirt_delete" data-id="${responseData.id}" style="font-size: x-large;">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="#" class="shirt_edit"  
                                            data-id="${response.data.id}"    
                                            data-notes="${response.data.notes}"
                                            data-order_status="${response.data.order_status}"
                                            data-pair_no="${response.data.pair_no}"
                                            data-rate="${response.data.rate}"
                                            data-product_name="${response.data.product_name}" 
                                            data-trial_delivery_date="${response.data.trial_delivery_date}" 
                                            data-image="${response.image}" style="font-size: x-large;">
                                                <i class="fa fa-edit"></i>
                                        </a>
                                      <a href="#" class="print" style="font-size: x-large;"><i class="fa fa-print"></i></a>
                                </td>`;
            

                $('tr[data-id="' + response.data.id + '"]').html(updatedRow);
            }
           

        })

    });


    $(document).on('click','.print', function(event){
        event.preventDefault();
        var id = $(this).data('id');
            console.log(id);
        var product_name = $(this).data('product_name');
        var trial_delivery_date =  $(this).data('trial_delivery_date');
        var image = $(this).data('image');
        var pair_no = $(this).data('pair_no');
        var rate = $(this).data('rate');
        var notes = $(this).data('notes');
        var order_status = $(this).data('order_status');

        var baseUrl = $('#base_url').val();
        var image = baseUrl + '/' + image;
                 
        $('#print_pair_no').val(pair_no);
        $('#print_order_status').val(order_status);
        $('#print_trail_date').val(trial_delivery_date);
        $('#print_rate').val(rate);
        $('#pent_image_measurment_print .print_image').attr('style', 'background-image: url(' + image + '); background-size: cover; background-position: center center;');
    })
    // ------------- item_delete ----------------------
    $(document).on('click', '.shirt_delete', function(event){
        event.preventDefault();
        var id = $(this).data('id');
        console.log(id, 'delete_id');
        $('#deletemodal').modal('show');
        $('#deletemember').val(id);
    });
    

    $('#deletemember').click(function() {
        var id = $(this).val();
        console.log(id);
        $.post("{{ url('order_item_delete') }}", {
        id: id,
            _token: "{{ csrf_token() }}"
        }, function(response) {
        console.log(response);
            $('tr[data-id="' + id + '"]').remove();

            // Hide the delete modal
            $('#deletemodal').modal('hide');
        
    });
});

    
    function handleFileInputChange(inputId, previewClass) {
        var input = document.getElementById(inputId);
        var preview = document.querySelector(previewClass);
        var image_1 = $(this).data('image_1');

        input.addEventListener('change', function () {
                var file = input.files[0];

                if (file) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        console.log('File loaded:', file.name);
                        preview.style.backgroundImage = 'url(' + e.target.result + ')';
                        preview.style.backgroundSize = 'cover';  // Adjust this based on your requirements
                        preview.style.backgroundPosition = 'center center';  // Adjust this based on your requirements
                    };

                    reader.readAsDataURL(file);
                } else {
                    preview.style.backgroundImage = 'none';
                }
        });
    }

    // Call the function for each file input when the DOM is ready
    document.addEventListener('DOMContentLoaded', function () {
        handleFileInputChange('append_1', '.append_1');
        handleFileInputChange('append_2', '.append_2');
        handleFileInputChange('append_3', '.append_3');
        handleFileInputChange('append_4', '.append_4');
        handleFileInputChange('append_5', '.append_5');
        handleFileInputChange('append_6', '.append_6');
        handleFileInputChange('append_7', '.append_7');
        handleFileInputChange('append_8', '.append_8');
    }); 
});

    
</script>
<script>
    function printModalContent() {
        // Get the modal content
        const modalContent = document.getElementById('pent_image_measurment_print').innerHTML;

        // Create an iframe
        const printFrame = document.createElement('iframe');
        printFrame.style.display = 'none';
        document.body.appendChild(printFrame);

        // Write the modal content to the iframe
        printFrame.contentDocument.write('<html><head><title>Print</title></head><body>' + modalContent + '</body></html>');
        printFrame.contentDocument.close();

        // Print and remove the iframe after printing
        printFrame.contentWindow.print();
        printFrame.contentWindow.onafterprint = function () {
            document.body.removeChild(printFrame);
        };
    }
</script>

@endsection