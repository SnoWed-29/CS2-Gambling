<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    public function createBox(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|string',
            'skins' => 'required|array',
            'skins.*' => 'exists:skins,id',
        ]);
        
        // Create a new box
   
    // Create a new box
    $box = Box::create([
        'name' => $validatedData['name'],
        // Add other box attributes if needed
    ]);

    // Attach skins to the box using sync
    $box->skins()->sync($validatedData['skins']);

    // Optionally, you can return a response or redirect after the operation
    return response()->json(['message' => 'Box created successfully']);
    }

    public function showBox($id)
    {
        $box = Box::find($id);

        if (!$box) {
            // Handle the case where the box with the given ID is not found
            abort(404);
        }

        $skins = $box->skins;

        // dd($box->skins[0]->name);

        return view("casePages.case", ['box' => $box, 'skins'=> $skins]);
    }
}
