@extends('store_admin.index')
@section('content')
<style>
     @media (min-width: 768px) and (max-width: 991px){
        .teabes-content span{
            padding: 30px 50px;
        }
    }
    @media only screen and (max-width: 768px) {
        .teabes-content span{
            padding: 30px 50px;
        }
    }
    
    .vertical-middle-main{
        top: 50%;
        transform: translateY(50%);
    }
    
    @media screen and (max-width:992px){
        .vertical-middle-main{
        top: 25%;
        transform: translateY(25%);
    }
    }
    
    @media screen and (max-width:576px){
        .vertical-middle-main{
        top: 0%;
        transform: translateY(0%);
    }
    
    .header-fonts{
        font-size:10px;
    }
    }
    
</style>

<div class="container-fluid">
    <div class="row py-2" style="background-color: #d3d3d3;">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-5">
            <div class="w-100 header-fonts">
      Name:- {{$data->customer_name}}
    </div>
    <div class="w-100 pt-1 header-fonts">
      Store Code:- {{$data->store_id}}
    </div>
        </div>
        
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-7">
        <div class="row">
            @if($data->front_image != null)
            <div class="col-xl-1 col-lg-2 col-md-2 col-sm-2 col-3">
                <img src="{{ asset('public/image/' . $data->front_image) }}"    width="40px" height="40px" id="cu-image" class="rounded-circle" >
            </div>
            @endif
            <div class="col-xl-11 col-lg-10 col-md-10 col-sm-10 col-9">
                <div>
                    <div class="customer_name header-fonts">ID:- {{$data->customer_id}}</div>
                </div>
                <div class='pt-1'>
                   <div class="customer header-fonts">Mobile No.:- {{$data->customer_number}} </div>
                </div>
            </div>
        </div>    
        </div>
    </div>
</div>

<div class="card flex-row justify-content-center align-items-center">
    <input type="hidden" value="{{$data->customer_id}}" name="customer_id">

    <div class="form-check   flex-column  p-3">
        <div class="d-flex mb-2 input-custom">
            <label class="form-check-label" for="cut_belt">Today Date </label>
        </div>
        <div class="mobile-w-100">
            <input class="form-control cut-radio" value="{{$data->today_date}}" type="date" name="today_date" required>
        </div>
    </div>

    <div class="form-check form-check-inline  flex-column  p-3">
        <div class="d-flex mb-2 input-custom">
        
            <label class="form-check-label" for="long_belt">Delivery Date</label>
        </div>
        <div class="mobile-w-100">
            <input class="form-control cut-redio"  type="date" value="{{$data->delivery_date}}"  name="delivery_date" required>
        </div>
    </div>

    <div>
          <button type="submit" class="text-white p-2 border-0 rounded px-3 fw-bold send_inquiry_btn" style="background-color: #5ac1b0">Add Date</button>
    </div>
                    
</div> 
<div class="container mt-5">
    <div class="row d-flex justify-content-center vertical-middle-main">
        <a href="{{ route('storeadmin.pant_measurement', ['customer_id' => $data->customer_id]) }}" class="col-xl-3 col-lg-3 col-md-5 col-sm-5 text-center py-5 px-3 bg-light m-1">
        Pants
        </a>
        <a href="{{ route('storeadmin.shirt_measurement', ['customer_id' => $data->customer_id])}}" class="col-xl-3 col-lg-3 col-md-5 col-sm-5 text-center py-5 px-3 bg-light m-1">
            Shirt
        </a>
        <a href="{{ route('storeadmin.kurta_measurement', ['customer_id' => $data->customer_id])}}" class="col-xl-3 col-lg-3 col-md-5 col-sm-5 text-center py-5 px-3 bg-light m-1">
            Kurta
        </a>
        <a href="{{ route('storeadmin.vest_coat' , ['customer_id' => $data->customer_id])}}" class="col-xl-3 col-lg-3 col-md-5 col-sm-5 text-center py-5 px-3 bg-light m-1">
            Vest/ bandi
        </a>
        <a href="{{ route('storeadmin.blazer_jodhpuri', ['customer_id' => $data->customer_id])}}" class="col-xl-3 col-lg-3 col-md-5 col-sm-5 text-center py-5 px-3 bg-light m-1">
            Blazer/ Jodhpuri
        </a>
        <a href="{{ route('storeadmin.indo_servani' , ['customer_id' =>  $data->customer_id])}}" class="col-xl-3 col-lg-3 col-md-5 col-sm-5 text-center py-5 px-3 bg-light m-1">
            Indo servani
        </a>
    </div>
</div>



</div>


<div id="measurement-list-container"></div>
<script src="{{asset('https://code.jquery.com/jquery-3.6.4.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('.send_inquiry_btn').click(function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Get the values from the date inputs
        var todayDate = $('[name="today_date"]').val();
        var deliveryDate = $('[name="delivery_date"]').val();

        // Make an AJAX request to the server
        $.ajax({
            type: 'POST',
            url: '{{ route("storeadmin.measurement_add_date") }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'today_date': todayDate,
                'delivery_date': deliveryDate
            },
            success: function(response) {
                // Handle the success response
                console.log(response);
                alert('Dates added successfully!');
            },
            error: function(error) {
                // Handle the error response
                console.error(error);
                alert('Error adding dates.');
            }
        });
    });
});
</script>

@endsection