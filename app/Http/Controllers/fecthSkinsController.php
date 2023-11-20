<?php

namespace App\Http\Controllers;

use App\Models\Skin;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;

class fecthSkinsController extends Controller
{
    public function fetchData()
    {
        $client = new Client();
        
        try {
            $response = $client->get('https://bymykel.github.io/CSGO-API/api/en/skins.json');
            $data = json_decode($response->getBody(), true);
            
            foreach ($data as $item) {
                // extracting every field needed
                $itemName = $item['name'];
                $weaponName = $item['weapon']['name'];
                $rarityName = $item['rarity']['name'];
                $collectionName = null;
                if(!$weaponName){
                    $weaponName = "NotWeapon";
                }
                // checking if collections is set or not
                if (isset($item['collections'][0]['name'])) {
                    $collectionName = $item['collections'][0]['name'];
                }else{
                    $collectionName = "NoCollection";
                }
            
                $imageUrl = $item['image'];
            
                // checking if the item already exists
                $existingSkin = Skin::where('name', $itemName)->first();
                
                //insert it into the database if it not exist
                if (!$existingSkin) {
                    Skin::create([
                        'name' => $itemName,
                        'weapon' => $weaponName,
                        'rarity' => $rarityName,
                        'collection' => $collectionName,
                        'image' => $imageUrl,
                        'quality'=>"all Qualities"
                    ]);
                }
            }
            return response()->json(['message' => 'Data fetched and stored successfully']);
        } catch (RequestException $e) {
            return response()->json(['error' => 'Failed to fetch data from API'], 500);
        }
    }
}
