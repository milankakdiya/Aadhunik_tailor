<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\PantsMeasurement;
use App\Models\ShirtsMeasurement;
use App\Models\KurtaMeasurement;
use App\Models\Indo_servaniMeasurement;
use App\Models\Blazer_JodhpuriMeasurement;
use App\Models\Vest_bandiMeasurement;
use App\Models\bill;
use App\Models\order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class StoreadminController extends Controller
{
    public function index()
    {
         return view('store_admin.index');
    }

    public function dashboards()
    {
        return view('store_admin.dashboards');
    }

    public function add_customer()
    {
        
         
        $name = Auth::user()->store_access;
        $namesArray = explode(',', $name);
        
        $data = \DB::table("customers")
        ->select("customers.*");
        
        foreach ($namesArray as $value) {
            $data->orWhereRaw("find_in_set('".$value."', customers.store_id)");
        }
        $data = $data->where('is_delete', 0)->get();
        
        $customer_id = DB::table('customers')->orderBy('id', 'DESC')->first();
    
        return view('store_admin.addcustomer', compact('data','customer_id'));
    }


    public function customer_store(Request $request)
    {
       
         $store_id = Auth::user()->store_access;
         $data = new Customer;
         $data->customer_name = $request->customer_name;
         $data->customer_number = $request->customer_number['main'];
         $data->store_id = $store_id;
         
         $front_image = 'lv_' . rand() . '.' . $request->front_image->extension();
         $request->front_image->move(public_path('image/'), $front_image);
         $requestData['image'] = $front_image;

         $back_image = 'lv_' . rand() . '.' . $request->back_image->extension();
         $request->back_image->move(public_path('image/'), $back_image);
         $requestData['image'] = $back_image;

         $side_image = 'lv_' . rand() . '.' . $request->side_image->extension();
         $request->side_image->move(public_path('image/'), $side_image);
         $requestData['image'] = $side_image;

         $data->front_image =  $front_image;
         $data->back_image = $back_image;
         $data->side_image = $side_image;

         $data->notes = $request->notes; 
         $data->customer_id = $request->customer_id;
                
         $data->save();


        $pent = New PantsMeasurement;
        $pent->customer_id = $data->customer_id;
        $pent->customer_name = $data->customer_name;
        $pent->customer_image = $data->front_image;
        $pent->store_id = $data->store_id;
        $pent->update_id = $data->customer_id;
        $pent->save();

        $shirt = new ShirtsMeasurement;
        $shirt->customer_id = $data->customer_id;
        $shirt->customer_name = $data->customer_name;
        $shirt->customer_image = $data->front_image;
        $shirt->store_code = $data->store_id;
        $shirt->update_id = $data->customer_id;
        $shirt->save();


        $kurta = new KurtaMeasurement;
        $kurta->customer_id = $data->customer_id;
        $kurta->customer_name = $data->customer_name;
        $kurta->customer_image = $data->front_image;
        $kurta->store_code = $data->store_id;
        $kurta->update_id = $data->customer_id;
        $kurta->save();

        $indo   = new Indo_servaniMeasurement;
        $indo->customer_id = $data->customer_id;
        $indo->customer_name = $data->customer_name;
        $indo->customer_image = $data->front_image;
        $indo->store_code = $data->store_id;
        $indo->update_id = $data->customer_id;
        $indo->save();

        $blazer  = new Blazer_JodhpuriMeasurement;
        $blazer->customer_id = $data->customer_id;
        $blazer->customer_name = $data->customer_name;
        $blazer->customer_image = $data->front_image;
        $blazer->store_id = $data->store_id;
        $blazer->update_id = $data->customer_id;
        $blazer->save();

        $vest  = new Vest_bandiMeasurement();
        $vest->customer_id = $data->customer_id;
        $vest->customer_name = $data->customer_name;
        $vest->customer_image = $data->front_image;
        $vest->store_code = $data->store_id;
        $vest->update_id = $data->customer_id;
        $vest->save();

         return redirect()->back();  
    }

    public function customer_delete(Request $request)
    {
        $id = $request->id;
        $data = Customer::find($id);
        $data->is_delete = 1;
        $data->update();

        return redirect()->back();
        
    }

     public function customer_edit(Request $request)
     {
         $id = $request->id;
         $data = Customer::find($id);
         $data->customer_name = $request->customer_name;
         $data->customer_number = $request->mobile_number['main'];
         $data->notes = $request->notes;


         $front_image = 'lv_' . rand() . '.' . $request->front_image->extension();
         $request->front_image->move(public_path('image/'), $front_image);
         $requestData['image'] = $front_image;

         $back_image = 'lv_' . rand() . '.' . $request->back_image->extension();
         $request->back_image->move(public_path('image/'), $back_image);
         $requestData['image'] = $back_image;

         $side_image = 'lv_' . rand() . '.' . $request->side_image->extension();
         $request->side_image->move(public_path('image/'), $side_image);
         $requestData['image'] = $side_image;

         $data->front_image =  $front_image;
         $data->back_image = $back_image;
         $data->side_image = $side_image;

         $data->update();

         return redirect()->back();
     }

     public function measurement_list($customer_id, Request $request)
     {
        $customer_id = $request->customer_id;
        $data = Customer::where('customer_id', $customer_id)->first();
        
        return view('store_admin.measurementlist', compact('data'));
     }


     public function measurement_add_date(Request $request)
     {
        $customer_id = $request->customer_id;
         
        $customer = Customer::where('customer_id', $customer_id)->firstOrFail();
        $customer->today_date = $request->today_date;
        $customer->delivery_date = $request->delivery_date;
        $customer->update();

        $pent = PantsMeasurement::where('customer_id', $customer_id)->first();
        $pent->today_date = $request->today_date;
        $pent->delivery_date = $request->delivery_date;
        $pent->update();
        
      
        $shirt = ShirtsMeasurement::where('customer_id', $customer_id)->first();
        $shirt->today_date = $request->today_date;
        $shirt->delivery_date = $request->delivery_date;
        $shirt->update();

        $kurta = KurtaMeasurement::where('customer_id', $customer_id)->first();
        $kurta->today_date = $request->today_date;
        $kurta->delivery_date = $request->delivery_date;
        $kurta->update();

        $indo = Indo_servaniMeasurement::where('customer_id', $customer_id)->first();
        $indo->today_date = $request->today_date;
        $indo->delivery_date = $request->delivery_date;
        $indo->update();

        
        $blazer = Blazer_JodhpuriMeasurement::where('customer_id', $customer_id)->first();
        $blazer->today_date = $request->today_date;
        $blazer->delivery_date = $request->delivery_date;
        $blazer->update();
             
        $vest = Vest_bandiMeasurement::where('customer_id', $customer_id)->first();
        $vest->today_date = $request->today_date;
        $vest->delivery_date = $request->delivery_date;
        $vest->update();

        return response()->json($pent, $shirt, $kurta,$indo,$blazer,$vest);
        
     }

     public function pant_measurement($customer_id, Request $request)
     {   
      
         $customer_id = $request->customer_id;
         $data = PantsMeasurement::where('customer_id', $customer_id)->first();
    
         return view('store_admin.pantmeasurement', compact('data'));
     }
 
    public function pant_measurement_detils_print(Request $request)
    {
        $customer_id = $request->customer_id;
        $data = PantsMeasurement::where('customer_id', $customer_id)->first();
        return view('store_admin.pantmeasurementdetailsprint', compact('data'));
    }
 
    public function pant_measurement_update(Request $request)
    {
        $update_id = Auth::user()->user_id;
         
         $customer_id = $request->customer_id; 
         $data = PantsMeasurement::where('customer_id', $customer_id)->first();
         $data->pants_quantity = $request->pants_quantity;
         $data->today_date = $request->today_date;
         $data->delivery_date = $request->delivery_date;
         $data->cut_belt = $request->cut_belt;
         $data->long_belt = $request->long_belt;
         $data->side_pocket = $request->side_pocket;
         $data->side_cross_pocket = $request->side_cross_pocket;
         $data->plit = $request->plit;
         $data->without_plit = $request->without_plit;
         $data->back_pocket = $request->back_pocket;
         $data->watch_pocket = $request->watch_pocket;
         $data->length_measurement = $request->length_measurement;
         $data->length_notes = $request->length_notes;
         $data->inside_length_measurement = $request->inside_length_measurement;
         $data->inside_length_notes	= $request->inside_length_notes;
         $data->waist_measurement = $request->waist_measurement;
         $data->waist_notes = $request->waist_notes;
         $data->hips_measurement = $request->hips_measurement;
         $data->hips_notes = $request->hips_notes;
         $data->fly_measurement = $request->fly_measurement;
         $data->fly_notes = $request->fly_notes;
         $data->thai_measurement = $request->thai_measurement;
         $data->thai_notes = $request->thai_notes;
         $data->lower_thai_measurement = $request->lower_thai_measurement;
         $data->lower_thai_notes = $request->lower_thai_notes;
         $data->knee_measurement = $request->knee_measurement;
         $data->knee_notes = $request->knee_notes;
         $data->calfs_measurement = $request->calfs_measurement;
         $data->calfs_notes = $request->calfs_notes;
         $data->bottom_measurement = $request->bottom_measurement;
         $data->bottom_notes = $request->bottom_notes;
         $data->add_notes = $request->add_notes;
         $data->update_id = $update_id;
 
         $data->image_1_notes = $request->image_notes_1;
         $data->image_2_notes = $request->image_notes_2;
         $data->image_3_notes = $request->image_notes_3;
         $data->image_4_notes = $request->image_notes_4;
         $data->image_5_notes = $request->image_notes_5;
         $data->image_6_notes = $request->image_notes_6;
 
         if($request->images_1){
             $image_1 = 'lv_' . rand() . '.' . $request->file('images_1')->extension();
             $request->file('images_1')->move(public_path('image/'), $image_1);
             $data->image_1 = $image_1;
         }
 
         if($request->images_2){
             $image_2 = 'lv_' . rand() . '.' . $request->file('images_2')->extension();
             $request->file('images_2')->move(public_path('image/'), $image_2);
             $data->image_2 = $image_2;
         }
         if($request->images_3){
             $image_3 = 'lv_' . rand() . '.' . $request->file('images_3')->extension();
             $request->file('images_3')->move(public_path('image/'), $image_3);
             $data->image_3 = $image_3;
         }
         
         if($request->images_4){
             $image_4 = 'lv_' . rand() . '.' . $request->file('images_4')->extension();
             $request->file('images_4')->move(public_path('image/'), $image_4);
             $data->image_4 = $image_4;
         }
 
         if($request->images_5){
             $image_5 = 'lv_' . rand() . '.' . $request->file('images_5')->extension();
             $request->file('images_5')->move(public_path('image/'), $image_5);
             $data->image_5 = $image_5;
         }
 
         if($request->images_6){
             $image_6 = 'lv_' . rand() . '.' . $request->file('images_6')->extension();
             $request->file('images_6')->move(public_path('image/'), $image_6);
             $data->iamge_6 = $image_6;
         }
 
         $data->update();
 
         return redirect()->route('storeadmin.pant_measurement_detils_print', ['customer_id' => $customer_id]);
     
    }
 
  
    public function shirt_measurement($customer_id, Request $request)
    {
        $customer_id = $request->customer_id;
        $data = ShirtsMeasurement::where('customer_id', $customer_id)->first();
         return view('store_admin.shirtmeasurement', compact('data'));
    }

    public function shirt_measurement_detils_print($customer_id, Request $request)
    {
    
        $customer_id = $request->customer_id;
        $data = ShirtsMeasurement::where('customer_id', $customer_id)->first();
         return view('store_admin.shirtmeasurementdetailsprint', compact('data'));

    }
     
    public function shirt_measurement_update(Request $request)
    {
        $update_id = Auth::user()->user_id;
         
        $customer_id = $request->customer_id; 
        $data = ShirtsMeasurement::where('customer_id', $customer_id)->first();
        $data->today_date = $request->today_date;
        $data->delivery_date = $request ->delivery_date;
        $data->open_shirts_full = $request->open_shirts_full;
        $data->opan_shirts_half = $request->opan_shirts_half;
        $data->bushirt_full = $request->bushirt_full;
        $data->bushirt_half = $request->bushirt_half;
        $data->length_measurement = $request->length_measurement;
        $data->length_notes = $request->length_notes;
        $data->sleeve_length_measurement = $request->sleeve_length_measurement;
        $data->sleeve_length_notes = $request->sleeve_length_notes;
        $data->half_sleeve_length_measurement = $request->half_sleeve_length_measurement;
        $data->half_sleeve_length_notes = $request->half_sleeve_length_notes;
        $data->biceps_measurement = $request->biceps_measurement;
        $data->biceps_notes = $request->biceps_notes;
        $data->forearm_measurement = $request->forearm_measurement;
        $data->forearm_notes = $request->forearm_notes;
        $data->wrist_measurement = $request->wrist_measurement;
        $data->wrist_notes = $request->wrist_notes;
        $data->sholders_measurement = $request->sholders_measurement;
        $data->sholders_notes = $request->sholders_notes;
        $data->chest_measurement = $request->chest_measurement;
        $data->chest_notes = $request->chest_notes;
        $data->waist_measurement = $request->waist_measurement;
        $data->waist_notes = $request->waist_notes;
        $data->hips_measurement = $request->hips_measurement;
        $data->hips_notes = $request->hips_notes;
        $data->collar_measurement = $request->collar_measurement;
        $data->collar_notes = $request->collar_notes;
        $data->pocket_measurement = $request->pocket_measurement;
        $data->pocket_notes = $request->pocket_notes;
        $data->add_notes = $request->add_notes;
        $data->update_id = $update_id;

        $data->image_1_notes = $request->image_notes_1;
        $data->image_2_notes = $request->image_notes_2;
        $data->image_3_notes = $request->image_notes_3;
        $data->image_4_notes = $request->image_notes_4;
        $data->image_5_notes = $request->image_notes_5;
        $data->image_6_notes = $request->image_notes_6;

        if($request->images_1){
            $image_1 = 'lv_' . rand() . '.' . $request->file('images_1')->extension();
            $request->file('images_1')->move(public_path('image/'), $image_1);
            $data->image_1 = $image_1;
        }

        if($request->images_2){
            $image_2 = 'lv_' . rand() . '.' . $request->file('images_2')->extension();
            $request->file('images_2')->move(public_path('image/'), $image_2);
            $data->image_2 = $image_2;
        }
        if($request->images_3){
            $image_3 = 'lv_' . rand() . '.' . $request->file('images_3')->extension();
            $request->file('images_3')->move(public_path('image/'), $image_3);
            $data->image_3 = $image_3;
        }
        
        if($request->images_4){
            $image_4 = 'lv_' . rand() . '.' . $request->file('images_4')->extension();
            $request->file('images_4')->move(public_path('image/'), $image_4);
            $data->image_4 = $image_4;
        }

        if($request->images_5){
            $image_5 = 'lv_' . rand() . '.' . $request->file('images_5')->extension();
            $request->file('images_5')->move(public_path('image/'), $image_5);
            $data->image_5 = $image_5;
        }

        if($request->images_6){
            $image_6 = 'lv_' . rand() . '.' . $request->file('images_6')->extension();
            $request->file('images_6')->move(public_path('image/'), $image_6);
            $data->image_6 = $image_6;
        }

        $data->update();

        return redirect()->route('storeadmin.shirt_measurement_detils_print', ['customer_id' => $customer_id]);
     
    }
    public function kurta_measurement($customer_id, Request $request)
    {
        $customer_id = $request->customer_id;
        $data = KurtaMeasurement::where('customer_id', $customer_id)->first();
        return view('store_admin.kurtameasuremen', compact('data'));
    }

    public function kurta_measurement_details(Request $request)
    {
        $customer_id = $request->customer_id;
        $data = KurtaMeasurement::where('customer_id', $customer_id)->first();
        return view('store_admin.kurtameasuremendetailsprint', compact('data'));
    
    }

    public function kurta_measurement_update(Request $request)
    {
        $update_id = Auth::user()->user_id;
         
        $customer_id = $request->customer_id; 
        $data = KurtaMeasurement::where('customer_id', $customer_id)->first();
        $data->today_date = $request->today_date;
        $data->delivery_date = $request->delivery_date;
        $data->kurta_full = $request->kurta_full;
        $data->kurta_half = $request->kurta_half;
        $data->length_measurement = $request->length_measurement;
        $data->length_notes = $request->length_notes;
        $data->sleeve_length_measurement = $request->sleeve_length_measurement;
        $data->sleeve_length_notes = $request->sleeve_length_notes;
        $data->half_sleeve_length_measurement  = $request->half_sleeve_length_measurement;
        $data->half_sleeve_length_notes = $request->half_sleeve_length_notes;
        $data->biceps_measurement = $request->biceps_measurement;
        $data->biceps_notes = $request->biceps_notes;
        $data->forearm_measurement = $request->forearm_measurement;
        $data->forearm_notes = $request->forearm_notes;
        $data->wrist_measurement = $request->wrist_measurement;
        $data->wrist_notes = $request->wrist_notes;
        $data->sholders_measurement = $request->sholders_measurement;
        $data->sholders_notes = $request->sholders_notes;
        $data->chest_measurement = $request->chest_measurement;
        $data->chest_notes = $request->chest_notes;
        $data->waist_measurement = $request->waist_measurement;
        $data->waist_notes = $request->waist_notes;
        $data->hips_measurement = $request->hips_measurement;
        $data->hips_notes = $request->hips_notes;
        $data->collar_measurement = $request->collar_measurement;
        $data->collar_notes = $request->collar_notes;
        $data->pocket_measurement = $request->pocket_measurement;
        $data->pocket_notes = $request->pocket_notes;
        $data->add_notes = $request->add_notes;
        $data->update_id = $update_id;

        $data->image_1_notes = $request->image_notes_1;
        $data->image_2_notes = $request->image_notes_2;
        $data->image_3_notes = $request->image_notes_3;
        $data->image_4_notes = $request->image_notes_4;
        $data->image_5_notes = $request->image_notes_5;
        $data->image_6_notes = $request->image_notes_6;

        
        if($request->images_1){
            $image_1 = 'lv_' . rand() . '.' . $request->file('images_1')->extension();
            $request->file('images_1')->move(public_path('image/'), $image_1);
            $data->image_1 = $image_1;
        }

        if($request->images_2){
            $image_2 = 'lv_' . rand() . '.' . $request->file('images_2')->extension();
            $request->file('images_2')->move(public_path('image/'), $image_2);
            $data->image_2 = $image_2;
        }
        if($request->images_3){
            $image_3 = 'lv_' . rand() . '.' . $request->file('images_3')->extension();
            $request->file('images_3')->move(public_path('image/'), $image_3);
            $data->image_3 = $image_3;
        }
        
        if($request->images_4){
            $image_4 = 'lv_' . rand() . '.' . $request->file('images_4')->extension();
            $request->file('images_4')->move(public_path('image/'), $image_4);
            $data->image_4 = $image_4;
        }

        if($request->images_5){
            $image_5 = 'lv_' . rand() . '.' . $request->file('images_5')->extension();
            $request->file('images_5')->move(public_path('image/'), $image_5);
            $data->image_5 = $image_5;
        }

        if($request->images_6){
            $image_6 = 'lv_' . rand() . '.' . $request->file('images_6')->extension();
            $request->file('images_6')->move(public_path('image/'), $image_6);
            $data->image_6 = $image_6;
        }

        $data->update();

        return redirect()->route('storeadmin.kurta_measurement_details', ['customer_id' => $customer_id]);

    }

    public function vest_coat($customer_id, Request $request)
    { 
        $customer_id = $request->customer_id;
        $data = Vest_bandiMeasurement::where('customer_id', $customer_id)->first();
        return view('store_admin.vestcoat _bandi', compact('data'));
    }

    public function vest_coat_details(Request $request)
    {
        $customer_id = $request->customer_id;
        $data = Vest_bandiMeasurement::where('customer_id', $customer_id)->first();
        return view('store_admin.vestcoat _bandidetailsprint', compact('data'));
           
    }

    public function vest_coat_update( Request $request)
    {
        $update_id = Auth::user()->user_id;
         
        $customer_id = $request->customer_id; 
        $data = Vest_bandiMeasurement::where('customer_id', $customer_id)->first();
        $data->today_date = $request->today_date;
        $data->delivery_date = $request->delivery_date;
        $data->vest_coat = $request->vest_coat;
        $data->bandi = $request->bandi;
        $data->length_measurement = $request->length_measurement;
        $data->length_notes = $request->length_notes;
        $data->sholders_measurement = $request->sholders_measurement;
        $data->sholders_notes = $request->sholders_notes;
        $data->chest_measurement = $request->chest_measurement;
        $data->chest_notes = $request->chest_notes;
        $data->waist_measurement = $request->waist_measurement;
        $data->waist_notes = $request->waist_notes;
        $data->hips_measurement = $request->hips_measurement;
        $data->hips_notes = $request->hips_notes;
        $data->collar_measurement = $request->collar_measurement;
        $data->collar_notes = $request->collar_notes;
        $data->pocket_measurement = $request->pocket_measurement;
        $data->pocket_notes = $request->pocket_notes;
        $data->add_notes = $request->add_notes;
        $data->update_id = $update_id;

        $data->image_1_notes = $request->image_notes_1;
        $data->image_2_notes = $request->image_notes_2;
        $data->image_3_notes = $request->image_notes_3;
        $data->image_4_notes = $request->image_notes_4;
        $data->image_5_notes = $request->image_notes_5;
        $data->image_6_notes = $request->image_notes_6;

        
        if($request->images_1){
            $image_1 = 'lv_' . rand() . '.' . $request->file('images_1')->extension();
            $request->file('images_1')->move(public_path('image/'), $image_1);
            $data->image_1 = $image_1;
        }

        if($request->images_2){
            $image_2 = 'lv_' . rand() . '.' . $request->file('images_2')->extension();
            $request->file('images_2')->move(public_path('image/'), $image_2);
            $data->image_2 = $image_2;
        }
        if($request->images_3){
            $image_3 = 'lv_' . rand() . '.' . $request->file('images_3')->extension();
            $request->file('images_3')->move(public_path('image/'), $image_3);
            $data->image_3 = $image_3;
        }
        
        if($request->images_4){
            $image_4 = 'lv_' . rand() . '.' . $request->file('images_4')->extension();
            $request->file('images_4')->move(public_path('image/'), $image_4);
            $data->image_4 = $image_4;
        }

        if($request->images_5){
            $image_5 = 'lv_' . rand() . '.' . $request->file('images_5')->extension();
            $request->file('images_5')->move(public_path('image/'), $image_5);
            $data->image_5 = $image_5;
        }

        if($request->images_6){
            $image_6 = 'lv_' . rand() . '.' . $request->file('images_6')->extension();
            $request->file('images_6')->move(public_path('image/'), $image_6);
            $data->image_6 = $image_6;
        }

        $data->update();

        return redirect()->route('storeadmin.vest_coat_details', ['customer_id' => $customer_id]);  
    }
   

    public function blazer_jodhpuri($customer_id, Request $request)
    { 
        $customer_id = $request->customer_id;
        $data = Blazer_JodhpuriMeasurement::where('customer_id', $customer_id)->first();
        return view('store_admin.blazer_ jodhpuri_measurement', compact('data'));
    }

    public function blazer_jodhpuri_details($customer_id , Request $request)
    {
        $customer_id = $request->customer_id;
        $data = Blazer_JodhpuriMeasurement::where('customer_id', $customer_id)->first();
        return view('store_admin.blazer_ jodhpuri_measurementdetailsprint', compact('data'));
    }
    
    public function blazer_jodhpuri_update(Request $request)
    {

        $update_id = Auth::user()->user_id;
         
        $customer_id = $request->customer_id; 
        $data = Blazer_JodhpuriMeasurement::where('customer_id', $customer_id)->first();
        $data->today_date = $request->today_date;
        $data->delivery_date = $request->delivery_date;
        $data->blazer = $request->blazer;
        $data->jodhpuri = $request->jodhpuri;
        $data->length_measurement = $request->length_measurement;
        $data->length_notes = $request->length_notes;
        $data->sleeve_length_measurement = $request->sleeve_length_measurement;
        $data->sleeve_length_notes = $request->sleeve_length_notes;
        $data->biceps_measurement = $request->biceps_measurement;
        $data->biceps_notes = $request->biceps_notes;
        $data->forearm_measurement = $request->forearm_measurement;
        $data->forearm_notes = $request->forearm_notes;
        $data->wrist_measurement = $request->wrist_measurement;
        $data->wrist_notes = $request->wrist_notes;
        $data->sholders_measurement = $request->sholders_measurement;
        $data->sholders_notes = $request->sholders_notes;
        $data->chest_measurement = $request->chest_measurement;
        $data->chest_notes = $request->chest_notes;
        $data->waist_measurement = $request->waist_measurement;
        $data->waist_notes = $request->waist_notes;
        $data->hips_measurement = $request->hips_measurement;
        $data->hips_notes = $request->hips_notes;
        $data->collar_measurement = $request->collar_measurement;
        $data->collar_notes = $request->collar_notes;
        $data->pocket_measurement = $request->pocket_measurement;
        $data->pocket_notes = $request->pocket_notes;
        $data->add_notes = $request->add_notes;
        $data->update_id = $update_id;

        $data->image_1_notes = $request->image_notes_1;
        $data->image_2_notes = $request->image_notes_2;
        $data->image_3_notes = $request->image_notes_3;
        $data->image_4_notes = $request->image_notes_4;
        $data->image_5_notes = $request->image_notes_5;
        $data->image_6_notes = $request->image_notes_6;



        if($request->images_1){
            $image_1 = 'lv_' . rand() . '.' . $request->file('images_1')->extension();
            $request->file('images_1')->move(public_path('image/'), $image_1);
            $data->image_1 = $image_1;
        }

        if($request->images_2){
            $image_2 = 'lv_' . rand() . '.' . $request->file('images_2')->extension();
            $request->file('images_2')->move(public_path('image/'), $image_2);
            $data->image_2 = $image_2;
        }
        if($request->images_3){
            $image_3 = 'lv_' . rand() . '.' . $request->file('images_3')->extension();
            $request->file('images_3')->move(public_path('image/'), $image_3);
            $data->image_3 = $image_3;
        }
        
        if($request->images_4){
            $image_4 = 'lv_' . rand() . '.' . $request->file('images_4')->extension();
            $request->file('images_4')->move(public_path('image/'), $image_4);
            $data->image_4 = $image_4;
        }

        if($request->images_5){
            $image_5 = 'lv_' . rand() . '.' . $request->file('images_5')->extension();
            $request->file('images_5')->move(public_path('image/'), $image_5);
            $data->image_5 = $image_5;
        }

        if($request->images_6){
            $image_6 = 'lv_' . rand() . '.' . $request->file('images_6')->extension();
            $request->file('images_6')->move(public_path('image/'), $image_6);
            $data->image_6 = $image_6;
        }

        $data->update();
        return redirect()->route('storeadmin.blazer_jodhpuri_details', ['customer_id' => $customer_id]);
    }

    public function indo_servani($customer_id, Request $request)
    {
        $customer_id = $request->customer_id;
        $data = Indo_servaniMeasurement::where('customer_id', $customer_id)->first();
        return view('store_admin.indo_servani_measurement', compact('data'));
    }
    public function indo_servani_details($customer_id, Request $request)
    {
        $customer_id = $request->customer_id;
        $data = Indo_servaniMeasurement::where('customer_id', $customer_id)->first();
        return view('store_admin.indo_servani_measurementdetilsprint', compact('data'));
    }

    public function indo_servani_update(Request $request)
    {

        $update_id = Auth::user()->user_id;
        $customer_id = $request->customer_id;
        $data = Indo_servaniMeasurement::where('customer_id', $customer_id)->first();
        $data->indo = $request->indo;
        $data->today_date = $request->today_date;
        $data->delivery_date = $request->delivery_date;
        $data->servani = $request->servani;
        $data->length_measurement = $request->length_measurement;
        $data->length_notes = $request->length_notes;
        $data->sleeve_length_measurement = $request->sleeve_length_measurement;
        $data->sleeve_length_notes = $request->sleeve_length_notes;
        $data->biceps_measurement = $request->biceps_measurement;
        $data->biceps_notes = $request->biceps_notes;
        $data->forearm_measurement = $request->forearm_measurement;
        $data->forearm_notes = $request->forearm_notes;
        $data->wrist_measurement = $request->wrist_measurement;
        $data->wrist_notes = $request->wrist_notes;
        $data->sholders_measurement = $request->sholders_measurement;
        $data->sholders_notes = $request->sholders_notes;
        $data->chest_measurement = $request->chest_measurement;
        $data->chest_notes = $request->chest_notes;
        $data->waist_measurement = $request->waist_measurement;
        $data->waist_notes = $request->wrist_notes;
        $data->hips_measurement = $request->hips_measurement;
        $data->hips_notes = $request->hips_notes;
        $data->collar_measurement = $request->collar_measurement;
        $data->collar_notes = $request->collar_notes;
        $data->pocket_measurement = $request->pocket_measurement;
        $data->pocket_notes = $request->pocket_notes;
        $data->add_notes = $request->add_notes;

        $data->image_1_notes = $request->image_notes_1;
        $data->image_2_notes = $request->image_notes_2;
        $data->image_3_notes = $request->image_notes_3;
        $data->image_4_notes = $request->image_notes_4;
        $data->image_5_notes = $request->image_notes_5;
        $data->image_6_notes = $request->image_notes_6;



        if($request->images_1){
            $image_1 = 'lv_' . rand() . '.' . $request->file('images_1')->extension();
            $request->file('images_1')->move(public_path('image/'), $image_1);
            $data->image_1 = $image_1;
        }

        if($request->images_2){
            $image_2 = 'lv_' . rand() . '.' . $request->file('images_2')->extension();
            $request->file('images_2')->move(public_path('image/'), $image_2);
            $data->image_2 = $image_2;
        }
        if($request->images_3){
            $image_3 = 'lv_' . rand() . '.' . $request->file('images_3')->extension();
            $request->file('images_3')->move(public_path('image/'), $image_3);
            $data->image_3 = $image_3;
        }
        
        if($request->images_4){
            $image_4 = 'lv_' . rand() . '.' . $request->file('images_4')->extension();
            $request->file('images_4')->move(public_path('image/'), $image_4);
            $data->image_4 = $image_4;
        }

        if($request->images_5){
            $image_5 = 'lv_' . rand() . '.' . $request->file('images_5')->extension();
            $request->file('images_5')->move(public_path('image/'), $image_5);
            $data->image_5 = $image_5;
        }

        if($request->images_6){
            $image_6 = 'lv_' . rand() . '.' . $request->file('images_6')->extension();
            $request->file('images_6')->move(public_path('image/'), $image_6);
            $data->image_6 = $image_6;
        }

        $data->update();
        return redirect()->route('storeadmin.indo_servani_details', ['customer_id' => $customer_id]);
  
    }

    public function add_invoice()
    {

        $data =  DB::table('bills')
                 ->get();

        foreach ($data as $item) {
                $orders = DB::table('orders')->where('invoice_id', $item->invoice_id)->get();
                $item->invoice_bill = $orders;
        }

        $customer = DB::table('customers')->get();
        $customers  = DB::table('customers')->get();
        $customer_number = DB::table('customers')->get();

        return view('store_admin.addbill', compact('data','customer','customers','customer_number'));
    }


     public function home()
     {
        return view('store_admin.home');
     }
    
    public function add_invoice_bill()
    {
        $customer = DB::table('customers')->get();
        $customers  = DB::table('customers')->get();
        $customer_number = DB::table('customers')->get();
       return view('store_admin.addinvoice',compact('customer','customers','customer_number'));
    }


    public function view_table(Request $request)
    {
        $invoice_id = $request->invoice_id;
        $data = DB::table('bills')
            ->where('invoice_id', $invoice_id)
            ->first();
        $order = DB::table('orders')
                ->where('invoice_id', $data->invoice_id)
                ->get();

        $data->data_order = $order;

        return response()->json($data);

    }

    public function get_details(Request $request)
    {
        $customer_id = $request->customer_id;
        $data = DB::table('customers')->where('customer_id', $customer_id)->first();
    
        return response()->json($data);

    }

    public function get_orders(Request $request)
    {
         $invoice_id = $request->form_invoice_id;
         $data = DB::table('orders')->where('invoice_id', $invoice_id)->first();

         return response()->json($data);
    }

    public function store_new_invoice(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'customer_name' => 'required',
            'phone_number' => 'required',
            'invoice_date' => 'required',
            'trial_date' => 'required',
            'delivery_date' => 'required',
        ]); 
        
        $data = new bill;
        $data->customer_id = $request->customer_id;
        $data->customer_name = $request->customer_name;
        $data->phone_number = $request->phone_number;
        $data->invoice_date = $request->invoice_date;
        $data->trial_date = $request->trial_date;
        $data->delivery_date = $request->delivery_date;
        $data->invoice_type = $request->invoice_type;
        $data->save();

        $number = $request->phone_number;
        $phone_number = substr($number, 8);
        $data->invoice_id = $phone_number . '-' . $data->id;
        $data->update();

        return response($data);
    }


    public function shirt_order(Request $request)
    {

    $data = New order;
    $data->customer_id = $request->customer_id;
    $data->invoice_id = $request->invoice_id;
    $data->customer_name = $request->customer_name;
    $data->pair_no = $request->pair_no;
    $data->order_status = $request->order_status;
    $data->product_name = 'Shirt';
    $data->trial_delivery_date = $request->trial_delivery_date;
    $data->rate = $request->rate;
    $data->notes = $request->notes;

    $image = 'lv_' . rand() . '.' . $request->file('image')->extension();
    $request->file('image')->move(public_path('image/'), $image);

    $data->image = $image;

    $data->save();

    $invoice_id = $data->invoice_id;
    $id = $data->id;  
    $update = bill::where('invoice_id', $invoice_id)->first();
    $update->shirt_order_id = $id;
    $update->update();
    

    return response()->json(['success' => true, 'data' => $data]);
    }

    public function order_item_edit(Request $request)
    {
    
        $id = $request->id;
        $data = Order::find($id);
        $data->pair_no = $request->pair_no;
        $data->order_status = $request->order_status;
        $data->trial_delivery_date = $request->trial_delivery_date;
        $data->rate = $request->rate;

        if ($request->hasFile('image')) {
            $image = 'lv_' . rand() . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('image/'), $image);
            $data->image = $image;
        }
    
        $data->image = $request->image;
        $data->notes = $request->notes;
    
        $data->update();
    
        return response()->json([
            'success' => true,
            'data' => $data, // Updated data to populate the table row
        ]);
    }

    public function order_item_delete(Request $request)
    {
        $id = $request->id;
        $data = Order::find($id);
        $data->delete();
        return response($data);
    }

    public function pant_order(Request $request)
    {
        $data = New order;
        $data->customer_id = $request->customer_id;
        $data->invoice_id = $request->invoice_id;
        $data->customer_name = $request->customer_name;
        $data->pair_no = $request->pair_no;
        $data->order_status = $request->order_status;
        $data->product_name = 'Pant';
        $data->trial_delivery_date = $request->trial_delivery_date;
        $data->rate = $request->rate;
        $data->notes = $request->notes;

        $image = 'lv_' . rand() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('image/'), $image);

        $data->image = $image;

        $data->save();

        $invoice_id = $data->invoice_id;
        $id = $data->id;  
        $update = bill::where('invoice_id', $invoice_id)->first();
        $update->pant_order_id = $id;
        $update->update();
        return response()->json(['success' => true, 'data' => $data]);
    }

    public function kurta_order(Request $request)
    {

        $data = New order;
        $data->customer_id = $request->customer_id;
        $data->invoice_id = $request->invoice_id;
        $data->customer_name = $request->customer_name;
        $data->pair_no = $request->pair_no;
        $data->order_status = $request->order_status;
        $data->product_name = 'Kurta';
        $data->trial_delivery_date = $request->trial_delivery_date;
        $data->rate = $request->rate;
        $data->notes = $request->notes;

        $image = 'lv_' . rand() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('image/'), $image);

        $data->image = $image;

        $data->save();

        $invoice_id = $data->invoice_id;
        $id = $data->id;  
        $update = bill::where('invoice_id', $invoice_id)->first();
        $update->kurta_order_id = $id;
        $update->update();
        

        return response()->json(['success' => true, 'data' => $data]);
    }

    public function vest_order(Request $request)
    {

        $data = New order;
        $data->customer_id = $request->customer_id;
        $data->invoice_id = $request->invoice_id;
        $data->customer_name = $request->customer_name;
        $data->pair_no = $request->pair_no;
        $data->order_status = $request->order_status;
        $data->product_name = 'Vest[Waist Coat]';
        $data->trial_delivery_date = $request->trial_delivery_date;
        $data->rate = $request->rate;
        $data->notes = $request->notes;

        $image = 'lv_' . rand() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('image/'), $image);

        $data->image = $image;
        
        $data->save();

        $invoice_id = $data->invoice_id;
        $id = $data->id;  
        $update = bill::where('invoice_id', $invoice_id)->first();
        $update->vest_order_id = $id;
        $update->update();

        return response()->json(['success' => true, 'data' => $data]);
    }

    public function blazer_order(Request $request)
    {
        
        $data = New order;
        $data->customer_id = $request->customer_id;
        $data->invoice_id = $request->invoice_id;
        $data->customer_name = $request->customer_name;
        $data->pair_no = $request->pair_no;
        $data->order_status = $request->order_status;
        $data->product_name = 'Blazer/Jodhpuri';
        $data->trial_delivery_date = $request->trial_delivery_date;
        $data->rate = $request->rate;
        $data->notes = $request->notes;

        $image = 'lv_' . rand() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('image/'), $image);

        $data->image = $image;

        $data->save();

        $invoice_id = $data->invoice_id;
        $id = $data->id;  
        $update = bill::where('invoice_id', $invoice_id)->first();
        $update->blazer_order_id = $id;
        $update->update();
        

        return response()->json(['success' => true, 'data' => $data]);

    }

    public function servani_order(Request $request)
    {

        $data = New order;
        $data->customer_id = $request->customer_id;
        $data->invoice_id = $request->invoice_id;
        $data->customer_name = $request->customer_name;
        $data->pair_no = $request->pair_no;
        $data->order_status = $request->order_status;
        $data->product_name = 'Servani';
        $data->trial_delivery_date = $request->trial_delivery_date;
        $data->rate = $request->rate;
        $data->notes = $request->notes;

        $image = 'lv_' . rand() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('image/'), $image);

        $data->image = $image;

        $data->save();

        $invoice_id = $data->invoice_id;
        $id = $data->id;  
        $update = bill::where('invoice_id', $invoice_id)->first();
        $update->servani_order_id = $id;
        $update->update();
        

        return response()->json(['success' => true, 'data' => $data]);
    }
    public function other_order(Request $request)
    {

        $data = New order;
        $data->customer_id = $request->customer_id;
        $data->invoice_id = $request->invoice_id;
        $data->customer_name = $request->customer_name;
        $data->pair_no = $request->pair_no;
        $data->order_status = $request->order_status;
        $data->product_name = 'Other';
        $data->trial_delivery_date = $request->trial_delivery_date;
        $data->rate = $request->rate;
        $data->notes = $request->notes;

        $image = 'lv_' . rand() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('image/'), $image);

        $data->image = $image;

        $data->save();

        $invoice_id = $data->invoice_id;
        $id = $data->id;  
        $update = bill::where('invoice_id', $invoice_id)->first();
        $update->other_order_id = $id;
        $update->update();
        

        return response()->json(['success' => true, 'data' => $data]);
    }

    public function update_amont(Request $request)
    {
        $form_invoice_id = $request->input('form_invoice_id');
        $data = bill::where('invoice_id', $form_invoice_id)->first();
        $data->total = $request->total_amount;
        $data->paid = $request->paid_amount;
        $data->discount = $request->discount_amount;
        $data->notes = $request->notes;
        $data->update();

        return response($data);
    }
   
}
