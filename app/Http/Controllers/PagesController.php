<?php

namespace App\Http\Controllers;

use App\Models\Skin;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $skins = Skin::paginate(12);
        return view('welcome')->with('skins',$skins);
    }

    public function createCase(){
            $skins = Skin::all();

            return view('casePages.create-case')->with('skins', $skins);
    }
}
