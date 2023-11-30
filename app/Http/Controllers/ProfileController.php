<?php

namespace App\Http\Controllers;

use App\Models\BoxResult;
use App\Models\Skin;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id)
{
    $userProfile = User::find($id);

    // Retrieve all skins for the specified user
    $allSkins = BoxResult::where('user_id', $id)->get();

    // Initialize an empty array to store skin models
    $skinArray = [];

    foreach ($allSkins as $skin) {
        // Assuming 'skin_id' is the foreign key in BoxResult pointing to the Skin model
        $skinModel = Skin::find($skin->skin_id);

        if ($skinModel) {
            $skinArray[] = $skinModel;
        }
    }

    // Use dd() for debugging

    return view('profile.profile')->with([
        'user' => $userProfile,
        'skins' => $skinArray,
    ]);
}

}
