
@extends('store_admin.index')
@section('content')
<style>
      .edit_input_img{
        width: 100px;
        height: 100px;
    }
    .profile_pic input{
        width: 70%;

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
    .image_notes_card{
        display: flex;
        flex-direction: column !important;
        height: auto !important;
        width: 33.33%;
    }
    .select_img{
        border: 1px solid #000;
    }
    #image_notes_container{
        width: 33.33%;
    }
</style>
    <div class="modal-body">
        <form method="post" id="pent_measurement" enctype="multipart/form-data" action="{{url('pant_measurement_update/'. $data->customer_id)}}">  
                            @csrf
                        <input type="hidden" id="customer_id" name="customer_id" value="{{$data->customer_id}}">
                    <div class="hader-pants d-flex"> 
                        <div class="w-50">
                            Pants
                        </div>
                        <div class="w-10">
                            <img src="{{ asset('image/' . $data->customer_image) }}"    width="40px" height="40px" id="cu-image" class="rounded-circle"  >

                        
                        </div>
                        <div class="w-30" style="margin-left: 10px;;">
                            <div class="customer_name">Name:- {{$data->customer_name}}</div>
                            <div class="customer">ID:-  {{$data->customer_id}} </div>
                        </div>
                    </div> 
                    <br>
                    <div class="d-flex align-items-center" width="50%">
                        <span class="pr-3">Pants Quantity</span>
                        <input type="text" name="pants_quantity" value="{{$data->pants_quantity}}" class="form-control in_qu" width="50%">
                    </div>
                    <br>
               
                    <div class="card flex-row">
                        <div class="form-check form-check-inline w-30 flex-column align-items-start p-3">
                            <div class="d-flex mb-2 input-custom">
                                @if($data->cut_belt != null)
                                <input class="form-check-input"  type="radio"  checked  id="cut_belt" name="belt_type">
                                @else
                                <input class="form-check-input"  type="radio" id="cut_belt" name="belt_type">
                                @endif
                                <label class="form-check-label" for="cut_belt">Cut Belt</label>
                            </div>
                            <div class="mobile-w-100">
                                <input class="form-control cut-radio" value="{{$data->cut_belt}}" type="text" id="id_cut_belt" name="cut_belt" >
                            </div>
                        </div>
                    
                        <div class="form-check form-check-inline w-30 flex-column align-items-start p-3">
                            <div class="d-flex mb-2 input-custom">
                            @if($data->long_belt != null)
                                <input class="form-check-input" type="radio" id="long_belt" checked name="belt_type">
                            @else
                            <input class="form-check-input" type="radio" id="long_belt" name="belt_type">
                            @endif
                                <label class="form-check-label" for="long_belt">Long Belt</label>
                            </div>
                            <div class="mobile-w-100">
                                <input class="form-control cut-redio" value="{{$data->long_belt}}" type="text" id="id_long_belt" name="long_belt" >
                            </div>
                        </div>
                    
                    </div> 
                    <div class="card flex-row">
                        <div class="form-check form-check-inline w-30 flex-column align-items-start p-3">
                            <div class="d-flex mb-2 input-custom">
                                @if($data->side_pocket != null)
                                <input class="form-check-input" type="radio" id="side_pocket" name="side_cross_pocket" checked>
                                @else
                                <input class="form-check-input" type="radio" id="side_pocket" name="side_cross_pocket">
                                @endif

                                <label class="form-check-label" for="side_pocket">Side pocket</label>
                            </div>
                            <div class="mobile-w-100">
                                <input class="form-control cut-redio" type="text" value="{{$data->side_pocket}}" id="id_side_pocket" name="side_pocket" >
                            </div>
                        </div>
                        <div class="form-check form-check-inline w-30 flex-column align-items-start p-3">
                            <div class="d-flex mb-2 input-custom">
                                @if($data->side_cross_pocket != null)
                                <input class="form-check-input" type="radio"  id="side_cross_pocket" name="side_cross_pocket" checked>
                                @else
                                <input class="form-check-input" type="radio"  id="side_cross_pocket" name="side_cross_pocket">
                                @endif
                                <label class="form-check-label" for="side_cross_pocket">Side Cross Pocket</label>
                            </div>
                            <div  class="mobile-w-100">
                                <input class="form-control cut-redio" type="text" value="{{$data->side_cross_pocket}}" name="side_cross_pocket" id="id_side_cross_pocket" >
                            </div>
                        </div>
                    
                    </div> 
                    <div class="card  flex-row">
                        <div class="form-check form-check-inline w-30 flex-column align-items-start p-3">
                            <div class="d-flex mb-2 input-custom">
                                @if($data->plit != null)
                                <input class="form-check-input"  type="radio"  name="plit"  checked>
                                @else
                                <input class="form-check-input"  type="radio"  name="plit" >
                                @endif
                                <label class="form-check-label" for="plit">Plit</label>
                            </div>
                            <div  class="mobile-w-100">
                                <input class="form-control cut-redio" value="{{$data->plit}}" type="text" name="plit" id="id_plit" >
                            </div>
                        </div>
                    
                        <div class="form-check form-check-inline w-30 flex-column align-items-start p-3">
                            <div class="d-flex mb-2 input-custom">
                                @if($data->without_plit !=  null)
                                <input class="form-check-input" type="radio" id="without_plit" name="plit" checked>
                                @else
                                <input class="form-check-input" type="radio" id="without_plit" name="plit" >
                                @endif

                                <label class="form-check-label" for="without_plit">Without Plit</label>
                            </div>
                            <div class="mobile-w-100">
                                <input class="form-control cut-redio" value="{{$data->without_plit}}" type="text" name="without_plit" id="id_without_plit" >
                            </div>
                        </div>
                    
                    </div> 
                    <div class="card  flex-row">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center" widht="50px">
                            <div class="d-flex align-items-center w-100" >
                                <span class="" style="width: 20%">Back pocket<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" name="back_pocket" value="{{$data->back_pocket}}">
                            </div>
                        </div>
                    
                    </div> 
                    <div class="card  flex-row">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100">
                                <span class="" style="width: 20%">Watch pocket<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" value="{{$data->watch_pocket}}" name="watch_pocket" >
                            </div>
                        </div>
                    
                    </div> 
                    <div class="card  flex-row">
                    <img src="{{asset('images/Pants/Length.png')}}" class="edit_input_img">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100" >
                                <span class="" style="width: 30%">Length<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" placeholder="Enter Measurement" value="{{$data->length_measurement}}" name="length_measurement" >
                                <input type="text" class="form-control ml-3" width="100%" placeholder="Enter Note" value="{{$data->length_notes}}" name="length_notes" >
                            </div>
                        </div>
                        
                    </div> 
                    <div class="card  flex-row">
                    <img src="{{asset('images/Pants/Inside Length.png')}}" class="edit_input_img">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100">
                                <span class="" style="width: 30%">Inside lenght<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" placeholder="Enter Measurement" value="{{$data->inside_length_measurement}}" name="inside_length_measurement" >
                                <input type="text" class="form-control ml-3" width="100%" placeholder="Enter Note" value="{{$data->inside_length_notes}}" name="inside_length_notes" >
                            </div>
                        </div>
                    
                    </div> 
                    <div class="card  flex-row">
                    <img src="{{asset('images/Pants/Waist.png')}}" class="edit_input_img">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100">
                                <span class="" style="width: 30%">Waist<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" placeholder="Enter Measurement" value="{{$data->waist_measurement}}" name="waist_measurement" >
                                <input type="text" class="form-control ml-3" width="100%" placeholder="Enter Note" value="{{$data->waist_notes}}" name="waist_notes" >
                            </div>
                        </div>
                    
                    </div> 
                    <div class="card  flex-row">
                    <img src="{{asset('images/Pants/hips.png')}}" class="edit_input_img">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100">
                                <span class="" style="width: 30%">Hips<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" placeholder="Enter Measurement" value="{{$data->hips_measurement}}" name="hips_measurement" >
                                <input type="text" class="form-control ml-3" width="100%" placeholder="Enter Note" value="{{$data->hips_notes}}" name="hips_notes" >
                            </div>
                        </div>
                    
                    </div> 
                    <div class="card  flex-row">
                        <img src="{{asset('images/Pants/Crouch(Fly).png')}}" class="edit_input_img">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100">
                                <span class="" style="width: 30%">fly(crouch)<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" placeholder="Enter Measurement" value="{{$data->fly_measurement}}" name="fly_measurement" >
                                <input type="text" class="form-control ml-3" width="100%" placeholder="Enter Note" value="{{$data->fly_notes}}" name="fly_notes" >
                            </div>
                        </div>
                        
                    </div> 
                    <div class="card  flex-row">
                    <img src="{{asset('images/Pants/Thai.png')}}" class="edit_input_img">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100">
                                <span class="" style="width: 30%">Thai<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" placeholder="Enter Measurement" value="{{$data->thai_measurement}}" name="thai_measurement" >
                                <input type="text" class="form-control ml-3" width="100%" placeholder="Enter Note" value="{{$data->thai_notes}}" name="thai_notes" >
                            </div>
                        </div>
                    
                    </div> 
                    <div class="card  flex-row">
                    <img src="{{asset('images/Pants/Lower Thai.png')}}" class="edit_input_img">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100">
                                <span class="" style="width: 30%">Lower Thai<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" value="{{$data->lower_thai_measurement}}" placeholder="Enter Measurement" name="lower_thai_measurement" >
                                <input type="text" class="form-control ml-3" width="100%" placeholder="Enter Note" value="{{$data->lower_thai_notes}}" name="lower_thai_notes" >
                            </div>
                        </div>
                    
                    </div> 
                    <div class="card  flex-row">
                    <img src="{{asset('images/Pants/Knee.png')}}" class="edit_input_img">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100">
                                <span class="" style="width: 30%">Knee<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" placeholder="Enter Measurement" value="{{$data->knee_measurement}}" name="knee_measurement" >
                                <input type="text" class="form-control ml-3" width="100%" placeholder="Enter Note" value="{{$data->knee_notes}}" name="knee_notes" >
                            </div>
                        </div>
                    
                    </div> 
                    <div class="card  flex-row">
                    <img src="{{asset('images/Pants/Calf.png')}}" class="edit_input_img">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100">
                                <span class="" style="width: 30%">Calfs<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" placeholder="Enter Measurement" value="{{$data->calfs_measurement}}" name="calfs_measurement" >
                                <input type="text" class="form-control ml-3" width="100%" placeholder="Enter Note" value="{{$data->calfs_notes}}" name="calfs_notes" >
                            </div>
                        </div>
                    
                    </div> 
                    <div class="card  flex-row">
                        <img src="{{asset('images/Pants/Bottom.png')}}" class="edit_input_img">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100">
                                <span class="" style="width: 30%">Bottom<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" value="{{$data->bottom_measurement}}" placeholder="Enter Measurement" name="bottom_measurement" >
                                <input type="text" class="form-control ml-3" width="100%" value="{{$data->bottom_notes}}" placeholder="Enter Note" name="bottom_notes" >
                            </div>
                        </div>   
                    </div> 
                    <div class="card  flex-row">    
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100" >
                                <span class="" style="width: 14%">Add Notes<span class="text-danger">*</span></span>
                                <textarea type="text" value="{{$data->add_notes}}" class="form-control" width="50%" name="add_notes" >  {{ htmlspecialchars($data->add_notes) }}</textarea>
                            </div>
                        </div>
                    </div> 

                    
                
                    <div class="d-flex justify-content-between">
                        <div id="image_notes_container" class="d-flex justify-content-center">
                            <div class="card flex-row image_notes_card" style="padding: 1%;">
                                <div class="uplode_pic_view append_1" style="display: inline-block; background-image: url('{{ asset('image/' . $data->image_1) }}'); background-size: cover; background-position: center;"></div>

                                <div class="d-flex" style="flex-direction: column; width: 50%;">
                                    <label for="append_1" class="btn select_img" style="margin-top: 10px;">Select Image</label>
                                    <input id="append_1" class="images_1" style="visibility:hidden; position: absolute;" type="file"  name="images_1">
                                </div>
                                <textarea name="image_notes_1" placeholder="Enter Image Notes"  style="width: 245px;"> {{ htmlspecialchars($data->image_1_notes) }}</textarea>
                            </div>
                        </div>
                        <div id="image_notes_container" class="d-flex justify-content-center">
                            <div class="card flex-row image_notes_card" style="padding: 1%;">
                            <div class="uplode_pic_view append_2" style="display: inline-block; background-image: url('{{ asset('image/' . $data->image_2) }}'); background-size: cover; background-position: center;"></div>
                                <!-- <div class="uplode_pic_view append_2" style="display: inline-block;"></div> -->
                                <div class="d-flex" style="flex-direction: column; width: 50%;">
                                    <label for="append_2" class="btn select_img" style="margin-top: 10px;">Select Image</label>
                                    <input id="append_2" style="visibility:hidden; position: absolute;" type="file"  name="images_2">
                                </div>
                                <textarea name="image_notes_2" placeholder="Enter Image Notes"   style="width: 245px;">{{ htmlspecialchars($data->image_2_notes) }}</textarea>
                            </div>
                        </div>
                        <div id="image_notes_container" class="d-flex justify-content-center">
                            <div class="card flex-row image_notes_card" style="padding: 1%;">
                                <!-- <div class="uplode_pic_view append_3" style="display: inline-block;"></div> -->
                                <div class="uplode_pic_view append_3" style="display: inline-block; background-image: url('{{ asset('image/' . $data->image_3) }}'); background-size: cover; background-position: center;"></div>
                                <div class="d-flex" style="flex-direction: column; width: 50%;">
                                    <label for="append_3" class="btn select_img" style="margin-top: 10px;">Select Image</label>
                                    <input id="append_3" style="visibility:hidden; position: absolute;" type="file"  name="images_3">
                                </div>
                                <textarea name="image_notes_3" placeholder="Enter Image Notes" style="width: 245px;"> {{ htmlspecialchars($data->image_3_notes) }} </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div id="image_notes_container" class="d-flex justify-content-center">
                            <div class="card flex-row image_notes_card" style="padding: 1%;">
                            <!-- <img src="{{ asset('image/' . $data->image_1) }}" alt="" class="w-100"  style="height:100%;"> -->
                            <div class="uplode_pic_view append_4" style="display: inline-block; background-image: url('{{ asset('image/' . $data->image_4) }}'); background-size: cover; background-position: center;"></div>
                                <!-- <div class="uplode_pic_view append_4" style="display: inline-block;"> </div> -->

                                <div class="d-flex" style="flex-direction: column; width: 50%;">
                                    <label for="append_4" class="btn select_img" style="margin-top: 10px;">Select Image</label>
                                    <input id="append_4" class="images_4" style="visibility:hidden; position: absolute;" type="file"  name="images_4">
                                </div>
                                <textarea name="image_notes_4" placeholder="Enter Image Notes"   style="width: 245px;"> {{ htmlspecialchars($data->image_4_notes) }} </textarea>
                            </div>
                        </div>
                        <div id="image_notes_container" class="d-flex justify-content-center">
                            <div class="card flex-row image_notes_card" style="padding: 1%;">
                                <!-- <div class="uplode_pic_view append_5" style="display: inline-block;"></div> -->
                                <div class="uplode_pic_view append_5" style="display: inline-block; background-image: url('{{ asset('image/' . $data->image_5) }}'); background-size: cover; background-position: center;"></div>
                                <div class="d-flex" style="flex-direction: column; width: 50%;">
                                    <label for="append_5" class="btn select_img" style="margin-top: 10px;">Select Image</label>
                                    <input id="append_5" style="visibility:hidden; position: absolute;" type="file"  name="images_5">
                                </div>
                                <textarea name="image_notes_5" placeholder="Enter Image Notes"  style="width: 245px;"> {{ htmlspecialchars($data->image_5_notes) }} </textarea>
                            </div>
                        </div>
                        <div id="image_notes_container" class="d-flex justify-content-center">
                            <div class="card flex-row image_notes_card" style="padding: 1%;">
                                <!-- <div class="uplode_pic_view append_6" style="display: inline-block;"></div> -->
                                <div class="uplode_pic_view append_6" style="display: inline-block; background-image: url('{{ asset('image/' . $data->iamge_6) }}'); background-size: cover; background-position: center;"></div>
                                <div class="d-flex" style="flex-direction: column; width: 50%;">
                                    <label for="append_6" class="btn select_img" style="margin-top: 10px;">Select Image</label>
                                    <input id="append_6" style="visibility:hidden; position: absolute;" type="file"  name="images_6">
                                </div>
                                <textarea name="image_notes_6" placeholder="Enter Image Notes" style="width: 245px;"> {{ htmlspecialchars($data->image_6_notes) }} </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="errorMsgntainer"></div>
                    <br>
                    <div style="text-align: center">
                        <button class="btn justify save-progress" style="background-color: #5ac1b0;">
                            Save progress
                        </button>
                    </div>
        </form>
    </div>
<script>
    // Function to handle file input change event
    function handleFileInputChange(inputId, previewClass) {
        var input = document.getElementById(inputId);
        var preview = document.querySelector(previewClass);

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
    }); 
   
</script>


@endsection