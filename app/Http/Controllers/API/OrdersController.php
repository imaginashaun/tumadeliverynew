<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DeliveryAddress;

class OrdersController extends Controller
{
    public function driverdetails($id){
        $driver=  DB::select("SELECT user_id,U.name,D.plate,D.total_orders,D.carimage,D.carmodel FROM drivers D INNER JOIN users U on U.id=D.user_id where  user_id=?",[$id]);
        $driverCount=  DB::select("select count(*) as numberOf from drivers where user_id=?",[$id]);
        if($driverCount[0]->numberOf>0){

            return response()->json([
                "success"=>true,
                "data"=>$driver[0],
                "message"=>"Driver Found!"
            ]);
        }
        else{
            return response()->json([
                "success"=>false,
                "data"=>null,
                "message"=>"Driver Not Found!"
            ]);
        }
        
    }


    public function pickAddress($id){
        $address=  DB::select("select * from delivery_addresses where  id=?",[$id]);
        $addressCount=  DB::select("select count(*) as numberOf from delivery_addresses where  id=?",[$id]);
        if($addressCount[0]->numberOf>0){
            return response()->json([
                "success"=>1,
                "data"=>$address[0],
                "message"=>"Address Found!"
            ]);
        }
        else{
            return response()->json([
                "success"=>0,
                "data"=>null,
                "message"=>"Address Not Found!"
            ]);
        }
    
    }

    public function DriverAddress($id,$order_id){
        $address=  DB::select("select * from driver_locations  where  driver_id=?",[$id]);
        $addressCount=  DB::select("select  count(*) as numberOf from driver_locations where  driver_id=?",[$id]);
        if($addressCount[0]->numberOf>0){

            $status =DB::select("SELECT O.order_status_id,OS.status FROM `orders` O INNER join order_statuses OS ON OS.id=O.order_status_id where O.id=?",[$order_id]);


            return response()->json([
                "success"=>1,
                "data"=>$address[0],
                "status"=>$status[0],
                "message"=>"Driver Address Found!"
            ]);
        }
        else{
            return response()->json([
                "success"=>0,
                "data"=>null,
                "message"=>"Driver Address Not Found!"
            ]);
        }
    
    }


    public function AccountOrders($id){
        $orders=  DB::select("SELECT id,user_id from orders where user_id=? and active=1  and driver_id is not null",[$id]);
        if (count($orders)) {

            return response()->json([
                "success"=>1,
                "data"=>$orders,
                "message"=>"Account  Orders  Found!"
            ]);
         }

         else{
            return response()->json([
                "success"=>0,
                "data"=>null,
                "message"=>"Account orders Not Found!"
            ]);
        }
    
    }

    public function SavepickAddress(Request $request){
        $data = new DeliveryAddress;
        $data->description=$request->description;
        $data->address=$request->address;
        $data->latitude=$request->latitude;
        $data->longitude=$request->longitude;
        $data->is_default=$request->is_default;
        $data->user_id=$request->user_id;
        $data->save();
        return response()->json([
            "success"=>1,
            "data"=>$data,
            "message"=>""
        ]);

        // $address=  DB::select("insert into delivery_addresses set description=?,address=?,latitude=?,longitude=?,is_deault=?,user_id=?,created_at=now(),updated_at=now()",
        // [$description,$address,$latitude,$longitude,$is_default,$user_id]);
    
    }
    

}




