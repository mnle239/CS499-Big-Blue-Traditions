<?php

namespace App\Http\Controllers;

use App\Models\Tradition;
use Illuminate\Http\Request;

class TraditionsController extends Controller
{

    public function index(){
        $categories = ["All", "History/Traditions", "Big Blue Nation", "Student Involvement", "My Old Kentucky Home"];
        
        $history = Tradition::get()->where('category', $categories[1]);
        $bbn = Tradition::get()->where('category', $categories[2]);
        $involvment = Tradition::get()->where('category', $categories[3]);
        $home = Tradition::get()->where('category', $categories[4]);
        $all = Tradition::get();

        $sortedTraditions = [$all, $history, $bbn, $involvment, $home];
        return view('traditionList', [
            'sortedTraditions' => $sortedTraditions,
            'categories' => $categories 
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
