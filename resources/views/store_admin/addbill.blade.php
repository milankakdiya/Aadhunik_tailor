
@extends('store_admin.index')
@section('content')

{{-- mobile flage and country code selected script --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Bootstrap JS with Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>



<meta name="csrf-token" content="{{ csrf_token() }}">
 
<style>
    .employee {
        border-radius: 13px 5px;
        background: #2b2c30;
        color: white;
        border: none;
        height: 38px;
        width: 8%;
        position: relative;
        margin-bottom: 10px;
    }
    .additem{
        width: max-content;
        color: #fff !important;
        position: unset;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #000 !important;
        padding: 8px !important;
    }
    .additem i{
        margin-right: 10px;
    }
    .dataTables_wrapper{
        padding: 20px;
    }
    #front{
        width: 42%;
    }
    #back{
        width: 42%
    }
    #side{
        width: 42%
    }
    .modal {
         z-index: 1050; /* or a higher value depending on your layout */
    }
    @media (min-width: 768px) and (max-width: 991px){
        .employee {
            width: 13%; 
        }
        .modal-dialog{
            max-width: 500px;
        }
        #image{
            width: 44%;
        }
    }
    @media only screen and (max-width: 768px) {
        .employee {
            width: 18%; 
        }
        .modal-dialog{
            max-width: 500px;
        }
        #image{
            width: 44%;
        }
    }
    .profile_pic input{
        width: 70%;

    }
    .profile_pic{
        flex-direction: row;
    }
    #image_notes_container{
        display: flex;
        align-items: center;
        margin-bottom: 50px;
        margin-top: -5px;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    .uplode_pic_view{
        margin-top: 20px;
    } 
    #image_notes_container .card.flex-row{
        padding: 1%;
        margin-bottom: 0;
        height: 100px;
        width: 85%;
        align-items: center;
        margin-top: 20px;
    }
    .edit_input_img{
        width: 100px;
        height: 100px;
    }
    .input-container > div {
      width: 70%;
      margin-right: 10px; /* Add spacing between labels */
      font-weight: bold;
    }

    /* Remove margin-right from the last label to avoid unnecessary spacing */
    .input-container > div:last-child {
      margin-right: 0;
    }

    /* Add styles to the container div */
    .input-container {
      display: flex;
      margin-bottom: 10px; /* Add some spacing between input sets */
    }

    /* Apply styles to each input */
    .input-container span {
        width: 25%;
        margin-right: 10px;
    }   

    .input-container .uplode_pic_view{
        margin: 0;
        margin-right: 10px;
        height: 35px;             
    }
    .input-container input {
      width: 70%;
      margin-right: 10px; /* Add spacing between inputs */
      text-align: center;
    }

    /* Remove margin-right from the last input to avoid unnecessary spacing */
    .input-container input:last-child {
      margin-right: 0;
    }

    #text {
      border: none;
      outline: none;
      box-shadow: none;
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
    .profil_pic{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .profil_cont{
        display: flex;
        justify-content: center;
        align-items: start;
        flex-direction: column;
    }
    
    .nestedpopup a{
            font-size: 18px;
    }
    @media only screen and (max-width: 768px){
        .modal-dialog {
            max-width: 730px;
        }
        .nestedpopup a{
            width: 25%;
            font-size: 14px;
            padding: 12px !important;
            height: 40px;
        }
    }
    .tabel_dis table { font-size: medium; table-layout: fixed; width: 100%; }
    .tabel_dis table { border-collapse: separate; border-spacing: 2px; }
    .tabel_dis th, .tabel_dis td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; }
    .tabel_dis th { background: #EEE; border-color: #BBB; }
    .tabel_dis td { border-color: #DDD; }

    .text_box{
        text-align: center;
        border: 1px solid #000;
        padding: 10px;
        display: inline-block;
    }
    .name_box{
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: space-around;
        padding: 0 50px;
    }
</style>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eJqV9zdL8BPOld5+648jsl9IX7IScQ8mWwr7IzL0fEN1Rx6CK+BZ/GwOxiHwDUpz" crossorigin="anonymous"></script> -->
<div style="display: flex; justify-content: space-between;">
    <h4 style="color: black">Customer List</h4>
    <button class="employee"><i class="fa fa-plus" aria-hidden="true"></i>  Create New Bill</button>
</div>

<div class="card">
    <div class="table-responsive text-nowrap">
        <table id="example" class="display nowrap" style="width:100%;background-color:#bdbfcb">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Customer ID</th>
                    <th>Invoice No</th>
                    <th>NAME</th>
                    <th>Trail Date</th>
                    <th>Delicery Date</th>
                    <th>Total Amount</th>
                    <th>Paid</th>
                    <th>Unpaid</th>
                    <th>Discount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{$loop->index + 1 }}</td>
                        <td>{{$item->customer_id}}</td>
                        <td>{{$item->invoice_id}} </td>
                        <td>{{$item->customer_name}}</td>
                        <td>{{\Carbon\Carbon::parse($item->trial_date)->format('d-m-Y') }}</td>
                        <td>{{\Carbon\Carbon::parse($item->delivery_date)->format('d-m-Y') }}</td>
                        <td>{{$item->total}}</td>
                        <td>{{$item->paid}}</td>
                        <td>{{$item->total - $item->paid - $item->discount }}</td> <!-- Calculate Unpaid amount -->
                        <td>{{$item->discount}}</td>
                        <td><a href="#viewEmployeeModal" class="m-1 view" data-toggle="modal" style="font-size: 22px;"
                                onclick="viewEmployee('{{ $item->invoice_id }}')"><i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i> 
                            </a>

                        </td>
                    </tr>   
                @endforeach              
            </tbody>
        </table>
    </div>
</div>

 <!-- View Modal HTML -->
<div id="viewEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #bdbfcb">
                    <h4 class="modal-title">Bill And Order View</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="main_viwe_box d-flex">
                    <div class="name_box w-50">
                        <div class="w-100 d-flex mt-2 mb-2">
                            <h3 class="w-50" style="font-size: medium;padding: 8px;">Customer ID</h3>
                            <span id="view_customer_id" class="w-50 text_box" ></span>
                        </div>
                        <div class="w-100 d-flex mt-2 mb-2">
                            <h3 class="w-50" style="font-size: medium;padding: 8px;">Customer Name</h3>
                            <span id="view_customer_name" class="w-50 text_box"></span>
                        </div>
                        <div class="w-100 d-flex mt-2 mb-2">
                            <h3 class="w-50" style="font-size: medium;padding: 8px;">Invoice Id</h3>
                            <span id="view_invoice_id" class="w-50 text_box"></span>
                        </div>
                        <div class="w-100 d-flex mt-2 mb-2">
                            <h3 class="w-50" style="font-size: medium;padding: 8px;">Phonee Number</h3>
                            <span id="view_phone_number" class="w-50 text_box"></span>
                        </div>
                    </div>
                    <div class="w-50 name_box">
                        <div class="w-100 d-flex mt-2 mb-2">
                            <h3 class="w-50" style="font-size: medium;padding: 8px;">Invoice Date</h3>
                            <span id="view_invoice_date" class="w-50 text_box"></span>
                        </div>
                        <div class="w-100 d-flex mt-2 mb-2">
                            <h3 class="w-50" style="font-size: medium;padding: 8px;">Trial Date</h3>
                            <span id="view_trial_date" class="w-50 text_box"></span>
                        </div>
                        <div class="w-100 d-flex mt-2 mb-2">
                            <h3 class="w-50" style="font-size: medium;padding: 8px;">Delivery Date</h3>
                            <span id="view_delivery_date" class="w-50 text_box"></span>
                        </div>
                       
                    </div>
                </div>
                <div class="tabel_dis" style="padding: 1%;">
                  <input type="hidden" id="base_url" value="{{ asset('/image') }}">
                    <table class="inventory">
                        <thead>
                            <tr>
                                <th><span>Item Name</span></th>
                                <th><span>Order Id</span></th>
                                <th><span>Delivery Date</span></th>
                                <th><span>Image</span></th>
                                <th><span>Rate</span></th>
                            </tr>
                        </thead>
                        <tbody id="inventorytbody">  
                        </tbody>
                    </table>
                    <table class="balance">
                        <tr>
                            <th style="background: #fff; border-color: #fff;"></th>     
                            <th style="background: #fff; border-color: #fff;"></th>     
                            <th style="background: #fff; border-color: #fff;"></th>
                            <th><span >Total</span></th>
                            <td><span data-prefix>₹</span><span id="customer_total"></span></td>
                        </tr>
                        <tr>
                            <th style="background: #fff; border-color: #fff;"></th>     
                            <th style="background: #fff; border-color: #fff;"></th>     
                            <th style="background: #fff; border-color: #fff;"></th>
                            <th><span>Paid</span></th>
                            <td><span data-prefix>₹</span><span id="customer_paid"></span></td>
                        </tr>
                        <tr>
                            <th style="background: #fff; border-color: #fff;"></th>     
                            <th style="background: #fff; border-color: #fff;"></th>     
                            <th style="background: #fff; border-color: #fff;"></th>
                            <th><span>UnPaid</span></th>
                            <td><span data-prefix>₹</span><span id="customer_unpaid"></span></td>
                        </tr>
                        <tr>
                            <th style="background: #fff; border-color: #fff;"></th>     
                            <th style="background: #fff; border-color: #fff;"></th>     
                            <th style="background: #fff; border-color: #fff;"></th>
                            <th><span>Discount</span></th>
                            <td><span data-prefix>₹</span><span id="customer_discount"></span></td>
                        </tr>
                    </table>
                </div>
             
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
                </div>
            </div>
        </div>
</div>
<!-- add customer  -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #bdbfcb">
                <h5 class="modal-title" id="myModalLabel">Add New Invoice</h5>
               <button type="button" class="close invoice_close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
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
                                    @foreach($customers as $customer)
                                    <option value="{{$customer->customer_name}}">{{$customer->customer_name}}</option>
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
                    
                        <div class="d-flex w-50 justify-content-between"  style="flex-direction: column;">
                        <div class="profil_pic">
                            <img src="images/avatar.jpg" alt="avatar" width="45px" height="45px" class="rounded-circle">
                            <div class="profil_cont ml-3">
                                <span>Name :  Yash</span>
                                <span>ID : 000001</span>
                            </div>
                        </div>
                            <div class="profile_pic w-100 justify-content-around">
                                <label for="img">Invoice Date<span class="text-danger">*</span></label>
                                <input type="date" name="invoice_date" id="invoice_date"  class="form-control" required>
                            </div>
                            <div class="profile_pic w-100 justify-content-around">
                                <label for="img">Trial Date<span class="text-danger">*</span></label>
                                <input type="date" name="trial_date" id="trial_date"  class="form-control" required>
                            </div>
                            <div class="profile_pic w-100 justify-content-around">
                                <label for="img">Delivery Date<span class="text-danger">*</span></label>
                                <input type="date" name="delivery_date" id="delivery_date"  class="form-control" required>
                            </div>
                        </div>
                    </div>
                </form>

                 <hr size="8" width="100%" color="green">  

                <form action="" id="update_amont_form" style="overflow: scroll;height: 500px;">
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
              
                   
                  <div style="overflow-x:scroll">
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
                        <td class="text-center p-2" style="border:1px solid black">₹</td>
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
                        <button type="submit"
                            class="text-white p-2 border-0 rounded px-3 fw-bold send_inquiry_btn" style="background-color: #5ac1b0;width: 15%;">Submit</button>
                    </div>
                    <br><br>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- add customer  -->
<div class="modal fade" id="opationModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="width:30%;margin-left: auto;margin-right: auto;">
            <div class="modal-header" style="background-color: #bdbfcb">
                <h5 class="modal-title" id="myModalLabel">Choose Invoice Type</h5>
               <button type="button" class="close type_close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            </div>
            <div class="modal-body">
                <input type="radio" id="New_Invoice" name="opation"  value="New_Invoice">
                <label for="New_Invoice">New Invoice</label><br>
                <input type="radio" id="Alteration_Invoice" name="opation"  value="Alteration_Invoice">
                <label for="Alteration_Invoice">Alteration Invoice</label><br>
            </div>
        </div>
    </div>
</div>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
    function viewEmployee(id) {
        console.log(id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: "{{ url('view_table') }}",
            data: {
                invoice_id: id,

            },

            success: function(response) {
                console.log('response', response);

                var invoiceDate = new Date(response.invoice_date);
                var formattedInvoiceDate = formatDate(invoiceDate);
                $('#invoice_date').text(formattedInvoiceDate);

                var trialDate = new Date(response.trial_date);
                var formattedTrialDate = formatDate(trialDate);
                $('#trial_date').text(formattedTrialDate);

                var deliveryDate = new Date(response.delivery_date);
                var formattedDeliveryDate = formatDate(deliveryDate);
                $('#delivery_date').text(formattedDeliveryDate);

                function formatDate(date) {
                    var day = date.getDate();
                    var month = date.getMonth() + 1;
                    var year = date.getFullYear().toString().slice(-2);
                    return `${day}-${month}-${year}`;
                }

                var total = parseFloat(response.total) || 0;
                var paid = parseFloat(response.paid) || 0;
                var discount = parseFloat(response.discount) || 0;

                var unpaid = total - paid - discount;
                $('#view_customer_id').text(response.customer_id);
                $('#view_customer_name').text(response.customer_name);
                $('#view_invoice_id').text(response.invoice_id);
                $('#view_phone_number').text(response.phone_number);
                $('#view_invoice_date').text(response.invoice_date);
                $('#view_trial_date').text(response.trial_date);
                $('#view_delivery_date').text(response.delivery_date);
                $('#customer_total').text(response.total);
                $('#customer_paid').text(response.paid);
                $('#customer_unpaid').text(unpaid);
                $('#customer_discount').text(response.discount);

                $('#inventorytbody').empty();
                response.data_order.forEach(function(item) {
                    var baseUrl = $('#base_url').val();
                    var final_image = baseUrl + '/' + item.image;
                    var newRow = $('<tr></tr>');
                    newRow.append('<td class="customer_item_name">' + item.product_name + '</td>');
                    newRow.append('<td class="customer_order_id">' + item.id + '</td>');
                    newRow.append('<td class="customer_delivery_date">' + item.trial_delivery_date + '</td>');
                    newRow.append(`<td style="padding: 18px;">
                            <a data-bs-toggle="modal" data-bs-target="#modal${item.id}">
                                <img src="${final_image}" style="height: 50px; width: 80px; cursor: pointer;">
                            </a>
                            <div class="modal fade" id="modal${item.id}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="input-group mb-3" style="justify-content: center;">
                                                <img src="${final_image}" style="height:auto; width:100%;">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>`);
                    newRow.append('<td class="customer_rate"><span>₹</span>' + item.rate + '</td>');
                    $('#inventorytbody').append(newRow);
                });
                
            },


            error: function(err) {
                console.log(err);
            }
        });
    }
</script>
<script>
    $(document).ready(function () {
        function calculateTotal() {
            var shirtRate = parseFloat($('#shirt_rate').val()) || 0;
            var pantRate = parseFloat($('#pant_rate').val()) || 0;
            var kurtaRate = parseFloat($('#kurta_rate').val()) || 0;
            var vestRate = parseFloat($('#vest_rate').val()) || 0;
            var blazerRate = parseFloat($('#blazer_rate').val()) || 0;
            var servaniRate = parseFloat($('#servani_rate').val()) || 0;
            var otherRate = parseFloat($('#other_rate').val()) || 0;

            // Calculate the total
            var total = shirtRate + pantRate + kurtaRate + vestRate + blazerRate + servaniRate + otherRate;

            // Subtract the discount amount
            var discountAmount = parseFloat($('#discount_amount').val()) || 0;
            total -= discountAmount;

            // Update the total display
            $('#total_amount').val(total.toFixed(2));

            // Update the UnPaid amount
            updateUnPaid();
        }

        function updateUnPaid() {
            var paidAmount = parseFloat($('#paid_amount').val()) || 0;
            var totalAmount = parseFloat($('#total_amount').val()) || 0;

            // Calculate the UnPaid amount
            var unPaidAmount = totalAmount - paidAmount;

            // Update the UnPaid amount display
            $('#unpaid_amount').val(unPaidAmount.toFixed(2));
        }

        $('.show_my_value').on('click', function () {
            setTimeout(function () {
                var shirtRate = parseFloat($('#shirt_rate').val()) || 0;
                var pantrate = parseFloat($('#pant_rate').val()) || 0;
                var kurta_rate = parseFloat($('#kurta_rate').val()) || 0;
                var vest_rate = parseFloat($('#vest_rate').val()) || 0;
                var blazer_rate = parseFloat($('#blazer_rate').val()) || 0;
                var servani_rate = parseFloat($('#servani_rate').val()) || 0;
                var other_rate = parseFloat($('#other_rate').val()) || 0;

                console.log("shirtRate", shirtRate);
                calculateTotal(shirtRate, pantrate, kurta_rate, vest_rate, blazer_rate, servani_rate, other_rate);
            }, 1000);
        });

        // Attach event handlers for input changes to update UnPaid amount
        $('#paid_amount, #discount_amount').on('input', function () {
            calculateTotal();
        });
    
    });

</script>
<script>
  
    
</script>
<script> 
   

 
</script>
<script>
     
        
       

        $(document).ready(function () {
            $('#example').DataTable();
        });

        $('input[name="opation"]').change(function() {
            if($(this).is(':checked') && $(this).val() == 'New_Invoice') {
                $('#exampleModalCenter').modal('show');
                $('#opationModalCenter').modal('hide');

            }
            $("#secondModalCenter").prependTo("body"); 
            if($(this).is(':checked') && $(this).val() == 'Alteration_Invoice') {
                    $('#secondModalCenter').modal('show');
                    $('#opationModalCenter').modal('hide');
            }
        });

        $("#opationModalCenter").prependTo("body"); 
        $(document).on('click', '.employee', function(event){
            event.preventDefault(); 
            $('#opationModalCenter').modal('show');
        });
    
        
        // start js                         
        $('body').on('click','#store_access', function(){
                $('.popup-window').css('display',"block");
        });
        $('body').on('click','.close-menu', function(){
            $('.popup-window').css('display',"none");
        });
        $('body').on('click','#stor_access', function(){
            $('.popup2').css('display',"block");
        });
        $('body').on('click','.close', function(){
            $('.popup2').css('display',"none");
        });

        function toggleBox(boxId) {
            var checkbox = document.getElementById(boxId);
            var box = document.getElementById(boxId + '_show');

            if (checkbox.checked) {
                    box.style.display = 'flex';
            } else {
                box.style.display = 'none';
            }
        }

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
    }); 
  
</script>






@endsection