<?php
/**
 * File name: OptionController.php
 * Last modified: 2020.06.03 at 20:04:42
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 *
 */

namespace App\Http\Controllers;

use App\Criteria\Options\OptionsOfUserCriteria;
use App\Criteria\Products\ProductsOfUserCriteria;
use App\DataTables\OptionDataTable;
use App\Http\Requests\CreateOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use App\Models\Driver;
use App\Models\User;
use App\Repositories\CustomFieldRepository;
use App\Repositories\OptionGroupRepository;
use App\Repositories\OptionRepository;
use App\Repositories\ProductRepository;
use App\Repositories\UploadRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;

class DriverMerchantRegistration extends Controller
{

    public function savedriver(Request $request)
    {




       // echo $request->post('email');


        $user = new User();
        $user->email = $request->post('email');
        $user->status = 0;
        $user->password = Hash::make($request->post('password'));
        $user->name = $request->post('first_name')." ".$request->post('last_name');
        $user->save();

        DB::insert('insert into model_has_roles (role_id, model_type,model_id) values (?, ?, ?)', [5, 'App\Models\User', $user->id]);


        $driver = new Driver();
        $driver->user_id = $user->id;
        $driver->delivery_fee = 0.00;
        $driver->save();



      //  return redirect('./login');

//        echo "WOW";
//      die();
    }




    public function savemerchant(Request $request)
    {




        // echo $request->post('email');



        $user = new User();
        $user->email = $request->post('email');
        $user->status = 0;
        $user->password = Hash::make($request->post('password'));
        $user->name = $request->post('first_name')." ".$request->post('last_name');
        $user->save();
        DB::insert('insert into model_has_roles (role_id, model_type,model_id) values (?, ?, ?)', [3, 'App\Models\User', $user->id]);


        return redirect('./login');

//        echo "WOW";
//      die();
    }
}
