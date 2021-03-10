<?php
use Illuminate\Support\Facades\DB;
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

class OrderDriverDetailsController extends Controller
{
 
    public function driverdetails($id)
    {
        $driver=  DB::select("select * from drivers where user_id=? ",[$id]);
        return response()->json([
            'data'=>'hello'
        ]);

    }
}
