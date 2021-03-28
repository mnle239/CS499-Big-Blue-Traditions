<?php

namespace App\Http\Controllers;

use App\Models\Prize;
use Illuminate\Http\Request;

class PrizesController extends Controller
{
    public function index(){
        $prizes = Prize::get();
        return view('prizeList', [
            'prizes' => $prizes
        ]);
    }

    public function store(Request $request){
        if(request('deleteB') == true){
            $data = Prize::where('name', $request['deleteB']); 
            if(!is_null($data)){
                $data->delete();
            }
        }else {
            $this->validate($request, [
                'name' => 'required',
                'description' => 'required',
                'points'=> 'required|integer'
            ]);

            Prize::create([
                'name' => $request->name,
                'description' => $request->description,
                'points' => $request->points,
            ]);
        }

        return back();
    }
}
