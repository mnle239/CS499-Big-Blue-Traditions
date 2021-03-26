<?php

namespace App\Http\Controllers;

use App\Models\Tradition;
use Illuminate\Http\Request;

class TraditionsController extends Controller
{
    private $category;

    public function index(){
        $history = Tradition::get()->where('category', "History/Traditions");
        $bbn = Tradition::get()->where('category', "Big Blue Nation");
        $involvment = Tradition::get()->where('category', "Student Involvement");
        $home = Tradition::get()->where('category', "My Old Kentucky Home");
        $all = Tradition::get();

        $sortedTraditions = [$all, $history, $bbn, $involvment, $home];
        return view('traditionList', [
            'sortedTraditions' => $sortedTraditions
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
