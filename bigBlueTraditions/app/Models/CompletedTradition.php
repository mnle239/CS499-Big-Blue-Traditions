<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedTradition extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'file_path',
        'tradition_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tradition(){
        return $this->belongsTo(Tradition::class);
    }
}
