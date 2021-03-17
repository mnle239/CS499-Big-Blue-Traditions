<?php

namespace App\Http\Controllers;

use App\Models\Tradition;
use Illuminate\Http\Request;

class TraditionsController extends Controller
{
    public function index(){
        $traditions = Tradition::get();
        return view('traditionList', [
            'traditions' => $traditions
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'points'=> 'required|integer'
        ]);

        Tradition::create([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'points' => $request->points,
        ]);

        return back();
    }
}
