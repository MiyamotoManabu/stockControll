<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'item' => 'required',
        'quantity' => 'required',
        'price' => 'required',
    );
}
