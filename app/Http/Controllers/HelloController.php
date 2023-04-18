<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function edit(Item $item)
    {
        $types = Item::TYPES;
        return view('item.edit',compact('item','types'));
    }
    
}