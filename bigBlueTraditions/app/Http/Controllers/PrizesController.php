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

        return back();
    }
}
