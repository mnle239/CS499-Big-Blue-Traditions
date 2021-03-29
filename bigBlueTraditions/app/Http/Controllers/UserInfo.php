<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserInfo extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    
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
}
