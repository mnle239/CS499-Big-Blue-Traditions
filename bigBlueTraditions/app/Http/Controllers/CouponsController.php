<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    public function index(){
        $coupons = Coupon::get();
        return view('couponList', [
            'coupons' => $coupons
        ]
    );
    }

    public function store(Request $request){
        if(request('deleteB') == true){
            $data = Coupon::where('name', $request['deleteB']); 
            if(!is_null($data)){
                $data->delete();
            }
        }else {
            $this->validate($request, [
                'name' => 'required',
                'description' => 'required'
            ]);

            Coupon::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);
        }

        return back();
    }
}
