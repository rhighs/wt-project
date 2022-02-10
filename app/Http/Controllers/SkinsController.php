<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Skin;
use Illuminate\Http\Request;

class SkinsController extends BaseController
{
    public function index(Request $request) {
        $itemsPerPage = 27;
        $isAuth = true;
        $pageNumber = (int)$request->get("page");
        $skins = collect(Skin::all())->toArray();
        $maxPages = (int)(sizeof($skins) / $itemsPerPage) + (sizeof($skins) % $itemsPerPage > 0 ? 1 : 0);
        $halfPages = $maxPages / 2;

        if ($pageNumber > 0 && ($pageNumber - 1) * $itemsPerPage < sizeof($skins)) {
            $possibleEnd = $pageNumber * $itemsPerPage;
            if ($possibleEnd > sizeof($skins)) {
                $itemsPerPage = $possibleEnd - sizeof($skins);
            }
            $skins = array_slice($skins, ($pageNumber - 1) * $itemsPerPage, $itemsPerPage);
        } else {
            $skins = array_slice($skins, 0, $itemsPerPage);
            $pageNumber = 1;
        }

        $orderBy = $request->get("orderby");
        switch ($orderBy) {
            case "desc":
                usort($skins, array('App\Http\Controllers\SkinsController', 'cmpPrice'));
                $orderBy = "prezzo decrescente";
                break;
            case "asc":
                usort($skins, array('App\Http\Controllers\SkinsController', 'cmpPrice'));
                $skins = array_reverse($skins);
                $orderBy = "prezzo crescente";
                break;
            default:
                $orderBy = "order by";
                break;
        }

        return view("index", [
            "title" => "Skins",
            "subview" => "skins",
            "isAuthenticated" => $isAuth,
            "maxPages" => $maxPages,
            "halfPages" => $halfPages,
            "currentPage" => $pageNumber,
            "skins" => $skins,
            "orderby" => $orderBy
        ]);
    }
    function cmpPrice ($a, $b) {
        return ($a['price'] > $b['price']) ? -1 : 1;
    }
}