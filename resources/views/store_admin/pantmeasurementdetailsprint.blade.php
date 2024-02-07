@extends('store_admin.index')
@section('content')

<div class="card">
    <div class="modal-body">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
         <style>
            #customers {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
                margin: -38px auto;
            }

            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
                font-size: smaller;
            }
            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #04AA6D;
                color: white;
            }
            .pdf_card1 .pdf_card_con1{
                border: 1px solid #efefef;
                font-size:15px;
            }
            .w-40{
                width: 33.5%;
            }
            .w-60{
                width: 66.65%;
            }
            .bg-row{
                background: #efefef;
            }
        </style>
        <div class="hader-pants d-flex" style="flex-direction: column;">  
            <div class="w-100 p-3" style="text-align:center;font-size: 15px;font-weight:bold">
                Pants Measurement
            </div>
            <div style="display: flex;justify-content: space-around;">
                <div class="w-30">
                    <div style="font-size: 15px;">Customer Id:-  {{$data->customer_id}}</div>
                    <div style="font-size: 15px;">Name:- {{$data->customer_name}}</div>
                    <div style="font-size: 15px;">Date:- {{ \Carbon\Carbon::parse($data->today_date)->format('d-m-Y') }} </div>
                    
                </div>
                <div class="w-30">
                    <div style="font-size: 15px;">Store Code:- {{$data->store_id}} </div>
                    <div style="font-size: 15px;">Delivery Date:- {{ \Carbon\Carbon::parse($data->delivery_date)->format('d-m-Y') }}</div>
                </div>
            </div>
        </div>
        <div class="col-11 m-auto">
                <h6 style="text-align: center;font-size: 15px;margin: 20px 0;">Pants Quantity :- {{$data->pants_quantity}}</h6>
                <div class="d-flex pdf_card1">
                    <div class="w-50 d-flex align-items-baseline">
                        @if($data->cut_belt != null)
                            <label class="w-50 p-2 pdf_card_con1">Cut Belt</label>
                        @else
                        <label class="w-50 p-2 pdf_card_con1">Long Belt</label>
                        @endif
                        
                        @if($data->cut_belt != null)
                        <span class="w-50 p-2 pdf_card_con1">{{$data->cut_belt}}<span>
                        @else
                        <span class="w-50 p-2 pdf_card_con1">{{$data->long_belt}}<span>
                        @endif
                    </div>
                    <div class="w-50 d-flex align-items-baseline mx-1">
                        @if($data->side_pocket != null)
                            <label class="w-50 p-2 pdf_card_con1">Side pocket</label>
                        @else
                             <label class="w-50 p-2 pdf_card_con1">Side Cross Pocket</label>
                        @endif

                        @if($data->side_pocket != null)
                          <span class="w-50 p-2 pdf_card_con1">{{$data->side_pocket}}<span>
                        @else
                            <span class="w-50 p-2 pdf_card_con1">{{$data->side_cross_pocket}}<span>
                        @endif
                    </div>
                </div>  
                <div class="d-flex pdf_card1">
                    <div class="w-50 d-flex align-items-baseline">
                        @if($data->plit != null)
                            <label class="w-50 p-2 pdf_card_con1"> Plit</label>
                        @else
                              <label class="w-50 p-2 pdf_card_con1">Without Plit </label>
                        @endif

                        @if($data->plit != null)
                            <span class="w-50 p-2 pdf_card_con1">{{$data->plit}}</span>
                        @else
                            <span class="w-50 p-2 pdf_card_con1">{{$data->without_plit}}</span>
                        @endif
                    </div>
                    <div class="w-50 d-flex align-items-baseline mx-1">
                    </div>
                </div>  
                <div class="d-flex pdf_card1">
                    <div class="w-50 d-flex align-items-baseline">
                        <label class="w-50 p-2 pdf_card_con1">Back pocket</label>
                        <span class="w-50 p-2 pdf_card_con1">{{$data->back_pocket}}</span>
                    </div>
                    <div class="w-50 d-flex align-items-baseline mx-1">
                        <label class="w-50 p-2 pdf_card_con1">Watch pocket</label>
                        <span class="w-50 p-2 pdf_card_con1">{{$data->watch_pocket}}</span>
                    </div>
                </div>  
                
                <div class="mt-2">
                    <div class="d-flex pdf_card1">
                        <div class="w-100 d-flex align-items-center bg-row p-2">
                            <label class="w-25 pdf_card_con1"></label>
                            <span class="w-25 pdf_card_con1" style="font-size:15px;font-weight:bold">Measurement</span>
                            <label class="w-75 pdf_card_con1 mt-2" style="font-size:15px;font-weight:bold">Note</label>
                        </div>
                    </div>
                    <div class="pdf_card1 "> 
                    <div class="w-100 d-flex align-items-baseline">
                        <label class="w-25 p-2 pdf_card_con1">Length</label>
                        <span class="w-25 p-2 pdf_card_con1">{{$data->length_measurement}}</span>
                        <span class="w-75 p-2 pdf_card_con1">{{$data->length_notes}}</span>
                    </div>
                    <div class="w-100 d-flex align-items-baseline">
                        <label class="w-25 p-2 pdf_card_con1">Inside lengh</label>
                        <span class="w-25 p-2 pdf_card_con1">{{$data->inside_length_measurement}}</span>
                        <span class="w-75 p-2 pdf_card_con1">{{$data->inside_length_notes}}</span>
                    </div>
                    <div class="w-100 d-flex align-items-baseline">
                        <label class="w-25 p-2 pdf_card_con1">Waist</label>
                        <span class="w-25 p-2 pdf_card_con1">{{$data->waist_measurement}}</span>
                        <span class="w-75 p-2 pdf_card_con1">{{$data->waist_notes}}</span>
                    </div>
                    <div class="w-100 d-flex align-items-baseline">
                        <label class="w-25 p-2 pdf_card_con1">Hips</label>
                        <span class="w-25 p-2 pdf_card_con1">{{$data->hips_measurement}}</span>
                        <span class="w-75 p-2 pdf_card_con1">{{$data->hips_notes}}</span>
                    </div>
                    <div class="w-100 d-flex align-items-baseline">
                        <label class="w-25 p-2 pdf_card_con1">fly(crouch)</label>
                        <span class="w-25 p-2 pdf_card_con1">{{$data->fly_measurement}}</span>
                        <span class="w-75 p-2 pdf_card_con1">{{$data->fly_notes}}</span>
                    </div>
                    <div class="w-100 d-flex align-items-baseline">
                        <label class="w-25 p-2 pdf_card_con1">Thai</label>
                        <span class="w-25 p-2 pdf_card_con1">{{$data->thai_measurement}}</span>
                        <span class="w-75 p-2 pdf_card_con1">{{$data->thai_notes}}</span>
                    </div>
                    <div class="w-100 d-flex align-items-baseline">
                        <label class="w-25 p-2 pdf_card_con1">Lower Thai</label>
                        <span class="w-25 p-2 pdf_card_con1">{{$data->lower_thai_measurement}}</span>
                        <span class="w-75 p-2 pdf_card_con1">{{$data->lower_thai_notes}}</span>
                    </div>
                    <div class="w-100 d-flex align-items-baseline">
                        <label class="w-25 p-2 pdf_card_con1">Knee</label>
                        <span class="w-25 p-2 pdf_card_con1">{{$data->knee_measurement}}</span>
                        <span class="w-75 p-2 pdf_card_con1">{{$data->knee_notes}}</span>
                    </div>
                    <div class="w-100 d-flex align-items-baseline">
                        <label class="w-25 p-2 pdf_card_con1">Calfs</label>
                        <span class="w-25 p-2 pdf_card_con1">{{$data->calfs_measurement}}</span>
                        <span class="w-75 p-2 pdf_card_con1">{{$data->calfs_notes}}</span>
                    </div>
                    <div class="w-100 d-flex align-items-baseline">
                        <label class="w-25 p-2 pdf_card_con1">Bottom</label>
                        <span class="w-25 p-2 pdf_card_con1">{{$data->bottom_measurement}}</span>
                        <span class="w-75 p-2 pdf_card_con1">{{$data->bottom_notes}}</span>
                    </div>
                    <div class="w-100 d-flex align-items-baseline">
                        <label class="w-25 p-2 pdf_card_con1">note</label>
                        <span class="w-75 p-2 pdf_card_con1">{{$data->add_notes}}</span>
                    </div>
                </div>
                
        </div>
    </div>
</div>
<br>
<div style="text-align: center">
    <button class="btn justify save-progress print-btn" data-target="pent_measurment_print" style="background-color: #5ac1b0;">
        Print Details
    </button>
</div>
<br>
<hr size="8" width="100%" color="green">  
<div>
    <div class="modal-body" id="pent_measurment_print" style="display:none">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
         <style>
            #customers {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
                margin: -38px auto;
            }

            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
                font-size: smaller;
            }
            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #04AA6D;
                color: white;
            }
            .pdf_card .pdf_card_con{
                border: 1px solid #efefef;
                font-size:10px;
            }
            .w-40{
                width: 33.5%;
            }
            .w-60{
                width: 66.65%;
            }
            .bg-row{
                background: #efefef;
            }
        </style>
        <div class="hader-pants d-flex" style="flex-direction: column;">  
            <div class="w-100" style="text-align:center;font-size: 12px; font-weight:bold">
                Pants Measurement
            </div>
            <div style="display: flex;justify-content: space-around;">
                <div class="w-30">
                    <div style="font-size: 15px;font-weight:bold">Customer Id:-  {{$data->customer_id}}</div>
                    <div style="font-size: 15px;font-weight:bold">Name:- {{$data->customer_name}}</div>
                    <div style="font-size: 15px;font-weight:bold">Date:- {{ \Carbon\Carbon::parse($data->today)->format('d-m-Y') }} </div>
                    
                </div>
                <div class="w-30">
                    <div style="font-size: 15px;font-weight:bold">Store Code:- {{$data->store_id}} </div>
                    <div style="font-size: 15px;font-weight:bold">Delivery Date:- {{ \Carbon\Carbon::parse($data->delivery_date)->format('d-m-Y') }} </div> 
                </div>
            </div>
        </div>
        <div class="col-11 m-auto">
                <h6 style="text-align: center;font-size: 15px;font-weight:bold;margin-top: 0;">Pants Quantity :- {{$data->pants_quantity}}</h6>
                <div class="d-flex pdf_card">
                    <div class="w-50 d-flex">
                        @if($data->cut_belt != null)
                            <label class="w-50 p-2 pdf_card_con" style="font-weight:bold;font-size: 13px;">Cut Belt</label>
                        @else
                        <label class="w-50 p-2 pdf_card_con" style="font-weight:bold;font-size: 13px;">Long Belt</label>
                        @endif
                        
                        @if($data->cut_belt != null)
                        <span class="w-50 p-2 pdf_card_con" style="font-weight:bold;font-size: 13px;">{{$data->cut_belt}}<span>
                        @else
                        <span class="w-50 p-2 pdf_card_con" style="font-weight:bold;font-size: 13px;">{{$data->long_belt}}<span>
                        @endif
                    </div>
                    <div class="w-50 d-flex mx-1">
                        @if($data->side_pocket != null)
                            <label class="w-50 p-2 pdf_card_con" style="font-weight:bold;;font-size: 13px;">Side pocket</label>
                        @else
                             <label class="w-50 p-2 pdf_card_con" style="font-weight:bold;font-size: 13px;">Side Cross Pocket</label>
                        @endif

                        @if($data->side_pocket != null)
                          <span class="w-50 p-2 pdf_card_con" style="font-weight:bold;font-size: 13px;">{{$data->side_pocket}}<span>
                        @else
                            <span class="w-50 p-2 pdf_card_con" style="font-weight:bold;font-size: 13px;">{{$data->side_cross_pocket}}<span>
                        @endif
                    </div>
                </div>  
                <div class="d-flex pdf_card">
                    <div class="w-50 d-flex align-items-baseline">
                        @if($data->plit != null)
                            <label class="w-50 p-2 pdf_card_con" style="font-weight:bold;font-size: 13px;"> Plit</label>
                        @else
                              <label class="w-50 p-2 pdf_card_con" style="font-weight:bold;font-size: 13px;">Without Plit </label>
                        @endif

                        @if($data->plit != null)
                            <span class="w-50 p-2 pdf_card_con" style="font-weight:bold;font-size: 13px;">{{$data->plit}}</span>
                        @else
                            <span class="w-50 p-2 pdf_card_con" style="font-weight:bold;font-size: 13px;">{{$data->without_plit}}</span>
                        @endif
                    </div>
                    <div class="w-50 d-flex align-items-baseline mx-1">
                    </div>
                </div>  
                <div class="d-flex pdf_card">
                    <div class="w-50 d-flex align-items-baseline">
                        <label class="w-50 p-2 pdf_card_con" style="font-weight:bold;font-size: 13px;">Back pocket</label>
                        <span class="w-50 p-2 pdf_card_con" style="font-weight:bold;font-size: 13px;">{{$data->back_pocket}}</span>
                    </div>
                    <div class="w-50 d-flex align-items-baseline mx-1">
                        <label class="w-50 p-2 pdf_card_con" style="font-weight:bold;font-size: 13px;">Watch pocket</label>
                        <span class="w-50 p-2 pdf_card_con" style="font-weight:bold;font-size: 13px;">{{$data->watch_pocket}}</span>
                    </div>
                </div>  
                
                <div class="mt-2">
                    <div class="pdf_card"> 
                    <div class="w-100 d-flex">
                        <label class="w-25 p-1 pdf_card_con" style="font-weight:bold;font-size: 15px;">Length</label>
                        <span class="w-25 p-1 pdf_card_con" style="font-weight:bold;font-size: 15px;">{{$data->length_measurement}}</span>
                        <span class="w-75 p-1 pdf_card_con">{{$data->length_notes}}</span>
                    </div>
                    <div class="w-100 d-flex">
                        <label class="w-25 p-1 pdf_card_con" style="font-weight:bold;font-size: 15px;">I.L.</label>
                        <span class="w-25 p-1 pdf_card_con" style="font-weight:bold;font-size: 15px;">{{$data->inside_length_measurement}}</span>
                        <span class="w-75 p-1 pdf_card_con">{{$data->inside_length_notes}}</span>
                    </div>
                    <div class="w-100 d-flex">
                        <label class="w-25 p-1 pdf_card_con" style="font-weight:bold;font-size: 15px;">Waist</label>
                        <span class="w-25 p-1 pdf_card_con" style="font-weight:bold;font-size: 15px;">{{$data->waist_measurement}}</span>
                        <span class="w-75 p-1 pdf_card_con">{{$data->waist_notes}}</span>
                    </div>
                    <div class="w-100 d-flex">
                        <label class="w-25 p-1 pdf_card_con" style="font-weight:bold;font-size: 15px;">Hips</label>
                        <span class="w-25 p-1 pdf_card_con" style="font-weight:bold;font-size: 15px;">{{$data->hips_measurement}}</span>
                        <span class="w-75 p-1 pdf_card_con">{{$data->hips_notes}}</span>
                    </div>
                    <div class="w-100 d-flex">
                        <label class="w-25 p-1 pdf_card_con" style="font-weight:bold;font-size: 15px;">fly(crouch)</label>
                        <span class="w-25 p-1 pdf_card_con" style="font-weight:bold;font-size: 15px;">{{$data->fly_measurement}}</span>
                        <span class="w-75 p-1 pdf_card_con">{{$data->fly_notes}}</span>
                    </div>
                    <div class="w-100 d-flex">
                        <label class="w-25 p-1 pdf_card_con" style="font-weight:bold;font-size: 15px;">Thai</label>
                        <span class="w-25 p-1 pdf_card_con" style="font-weight:bold;font-size: 15px;">{{$data->thai_measurement}}</span>
                        <span class="w-75 p-1 pdf_card_con">{{$data->thai_notes}}</span>
                    </div>
                    <div class="w-100 d-flex">
                        <label class="w-25 p-1 pdf_card_con" style="font-weight:bold;font-size: 15px;">Lower Thai</label>
                        <span class="w-25 p-1 pdf_card_con" style="font-weight:bold;font-size: 15px;">{{$data->lower_thai_measurement}}</span>
                        <span class="w-75 p-1 pdf_card_con">{{$data->lower_thai_notes}}</span>
                    </div>
                    <div class="w-100 d-flex">
                        <label class="w-25 p-1 pdf_card_con" style="font-weight:bold;font-size: 15px;">Knee</label>
                        <span class="w-25 p-1 pdf_card_con" style="font-weight:bold;font-size: 15px;">{{$data->knee_measurement}}</span>
                        <span class="w-75 p-1 pdf_card_con">{{$data->knee_notes}}</span>
                    </div>
                    <div class="w-100 d-flex">
                        <label class="w-25 p-1 pdf_card_con" style="font-weight:bold;font-size: 15px;">Calfs</label>
                        <span class="w-25 p-1 pdf_card_con" style="font-weight:bold;font-size: 15px;">{{$data->calfs_measurement}}</span>
                        <span class="w-75 p-1 pdf_card_con">{{$data->calfs_notes}}</span>
                    </div>
                    <div class="w-100 d-flex">
                        <label class="w-25 p-1 pdf_card_con" style="font-weight:bold;font-size: 15px;">Bottom</label>
                        <span class="w-25 p-1 pdf_card_con" style="font-weight:bold;font-size: 15px;">{{$data->bottom_measurement}}</span>
                        <span class="w-75 p-1 pdf_card_con">{{$data->bottom_notes}}</span>
                    </div>
                    <div class="w-100 d-flex">
                        <label class="w-25 p-1 pdf_card_con" style="font-weight:bold;font-size: 15px;">note</label>
                        <span class="w-75 p-1 pdf_card_con">{{$data->add_notes}}</span>
                    </div>
                </div>
                
        </div>
    </div>
</div>
<br>


<br><br>
<div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
            
    <div class="row">
        <div class="col-4 p-3">
            <img src="{{ asset('image/' . $data->image_1) }}" alt="" class="w-75 d-flex mx-auto" style="height:300px">
            <div style="font-size:15px;margin-left:13%">{{$data->image_1_notes}}</div>
    </div>
    <div class="col-4 p-3">
    <img src="{{ asset('image/' . $data->image_1) }}" alt="" class="w-75 d-flex mx-auto" style="height:300px">
            <div style="font-size:15px;margin-left:13%">{{$data->image_1_notes}}</div>
        </div>
        <div class="col-4 p-3">
        <img src="{{ asset('image/' . $data->image_1) }}" alt="" class="w-75 d-flex mx-auto" style="height:300px">
            <div style="font-size:15px;margin-left:13%">{{$data->image_1_notes}}</div>
    </div>
    <div class="col-4 p-3">
    <img src="{{ asset('image/' . $data->image_1) }}" alt="" class="w-75 d-flex mx-auto" style="height:300px">
            <div style="font-size:15px;margin-left:13%">{{$data->image_1_notes}}</div>
        </div>
        <div class="col-4 p-3">
        <img src="{{ asset('image/' . $data->image_1) }}" alt="" class="w-75 d-flex mx-auto" style="height:300px">
            <div style="font-size:15px;margin-left:13%">{{$data->image_1_notes}}</div>
    </div>
    <div class="col-4 p-3">
    <img src="{{ asset('image/' . $data->image_1) }}" alt="" class="w-75 d-flex mx-auto" style="height:300px">
            <div style="font-size:15px;margin-left:13%">{{$data->image_1_notes}}</div>
        </div>
    </div>
</div>
<div id="pent_image_measurment_print" style="display:none">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
            
            <div class="row">
                <div class="col-6">
                 <img src="{{ asset('image/' . $data->image_1) }}" alt="" class="w-100 mt-3" style="height:180px">
                 <div style="font-size:13px;font-weight:bold">{{$data->image_1_notes}}</div>
            </div>
            <div class="col-6">
                 <img src="{{ asset('image/' . $data->image_2) }}" alt="" class="w-100 mt-3" style="height:180px">
                 <div style="font-size:13px;font-weight:bold">{{$data->image_2_notes}}</div>
                </div>
                <div class="col-6">
                <img src="{{ asset('image/' . $data->image_3) }}" alt="" class="w-100 mt-3" style="height:180px">
                <div style="font-size:13px;font-weight:bold">{{$data->image_3_notes}}</div>
            </div>
            <div class="col-6">
               <img src="{{ asset('image/' . $data->image_4) }}" alt="" class="w-100 mt-3" style="height:180px">
               <div style="font-size:13px;font-weight:bold">{{$data->image_4_notes}}</div>
                </div>
                <div class="col-6">
                <img src="{{ asset('image/' . $data->image_5) }}" alt="" class="w-100 mt-3" style="height:180px">
                <div style="font-size:13px;font-weight:bold">{{$data->image_5_notes}}</div>
            </div>
            <div class="col-6">
            <img src="{{ asset('image/' . $data->iamge_6) }}" alt="" class="w-100 mt-3" style="height:180px">
                <div style="font-size:13px;font-weight:bold">{{$data->image_6_notes}}</div>
                </div>
            </div>
</div>
<div style="text-align: center">
    <button class="btn justify save-progress print-btn" data-target="pent_image_measurment_print" style="background-color: #5ac1b0;">
            Print Details
    </button>
</div>
<br>
<script>
    document.body.addEventListener('click', function (event) {
        if (event.target.classList.contains('print-btn')) {
            var targetId = event.target.getAttribute('data-target');
            printContent(targetId);
        }
    });

    function printContent(targetId) {
        var modalContent = document.getElementById(targetId).cloneNode(true);

        // Include the styles inside the head of the new window
        var styles = modalContent.querySelectorAll('link[rel="stylesheet"]');
        styles.forEach(function(style) {
            document.head.appendChild(style.cloneNode(true));
        });

        // Remove scripts from the cloned content
        var scripts = modalContent.querySelectorAll('script');
        scripts.forEach(function(script) {
            script.parentNode.removeChild(script);
        });

        // Create a new hidden iframe and append the cloned content to it
        var printIframe = document.createElement('iframe');
        printIframe.style.display = 'none';
        document.body.appendChild(printIframe);
        printIframe.contentDocument.write('<html><head>');
        printIframe.contentDocument.write('</head><body>');
        printIframe.contentDocument.write(modalContent.innerHTML);
        printIframe.contentDocument.write('</body></html>');
        printIframe.contentDocument.close();

        // Wait for styles to be applied before printing
        setTimeout(function() {
            printIframe.contentWindow.print();
            document.body.removeChild(printIframe);
        }, 500); // You can adjust the delay if needed
    }
</script>

@endsection