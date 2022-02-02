<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Skin;

class HomeController extends BaseController
{
    public function index() {
        $isAuth = true;
        $nItems = 3;
        $skins = Skin::all();
        $indexes = [];

        while (sizeof($indexes) < $nItems) {
            $randIndex = rand(0, sizeof($skins));
            if (in_array($randIndex, $indexes) === false) {
                $indexes[] = $randIndex;
            }
        }

        $foundSkins = [];
        foreach ($indexes as $i) {
            $foundSkins[] = $skins[$i];
        }

        return view("index", [
            "title" => "index",
            "subview" => "home",
            "skins" => $foundSkins,
            "isAuthenticated" => $isAuth
        ]);
    }
}