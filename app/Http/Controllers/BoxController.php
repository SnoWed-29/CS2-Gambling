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
    $box = Box::create([
        'name' => $validatedData['name'],
        // Add other box attributes if needed
    ]);

    // Attach skins to the box using sync
    $box->skins()->sync($validatedData['skins']);

    return response()->json(['message' => 'Box created successfully']);
    }

    public function boxPage(){
        $boxes = Box::paginate(12);
        return view('casePages.case-index')->with('boxes', $boxes);
    }
    public function getRandomSkin($rarities)
{
    // Calculate the total percentage
    $totalPercentage = array_sum($rarities);

    // Generate a random number between 0 and the total percentage
    $randomNumber = mt_rand(0, $totalPercentage);

    // Loop through rarities to find the selected one
    $currentPercentage = 0;
    foreach ($rarities as $rarity => $percentage) {
        $currentPercentage += $percentage;
        if ($randomNumber <= $currentPercentage) {
            // Return the selected rarity
            return $rarity;
        }
    }

    // This should not happen, but return null if something goes wrong
    return null;
}



    public function handleBox($id){
        $validRarities = [
            'Consumer Grade' => 10,
            'Classified' => 15,
            'Contraband' => 5,
            'Extraordinary' => 5,
            'Covert' => 20,
            'Industrial Grade' => 10,
            'Mil-Spec Grade' => 15,
            'Restricted' => 20,
        ];
        
            $box = Box::find($id);
    
            if (!$box) {
                abort(404);
            }
    
            $skins = $box->skins;
    
            $randomRarity = $this->getRandomSkin($validRarities);
            $filteredSkins = $skins->where('rarity', $randomRarity);
            $randomSkin = $filteredSkins->random();
    
            // Return the random skin information as JSON
            return response()->json(['box' => $box, 'randomSkin' => $randomSkin]);
    }

    public function showBox($id){
        $box = Box::find($id);

        if (!$box) {
            
            abort(404);
        }

        $skins = $box->skins;

        // $box->skins[0]->name

        return view("casePages.case", ['box' => $box, 'skins'=> $skins]);
    }

    
}
