<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Users;
use App\Models\Cart;

class UserController extends BaseController
{
    private $salt;

    public function __construct()
    {
        $this->salt = "skugasriccigksianto";
        $this->tokenLength = 60;
    }

    public function generateId() {
        $maxIdValue = 9999999999999999;
        $id = rand(0, $maxIdValue);

        while (Users::where("id", "=", $id)->first() != null) {
            $id = rand(0, $maxIdValue);
        }

        return $id;
    }

    public static function test(Request $request) {
        $token = $request->header("token");

        if (!$token) {
            return [
                "success" => false
            ];
        }

        $user = Users::where("apitoken", "=", $token)
            ->first();

        return [
            "success" => true,
            "userdata" => [
                "id" => $user["id"],
                "email" => $user["email"],
                "name" => $user["nome"],
                "surname" => $user["cognome"]
            ]
        ];
    }

    public function account() {
        return view("index", [
            "title" => "account",
            "subview" => "account"
        ]);
    }

    public function login(Request $request) {
        if ($request->has("email") && $request->has("password")) {
            $user = Users::where("email", "=", $request->input("email"))
                ->where("password", "=", sha1($this->salt . $request->input("password")))
                ->first();

            if ($user) {
                $token = Str::random($this->tokenLength);
                $user["apitoken"] = $token;
                $user->save();

                return [
                    "success" => true,
                    "token" => $user["apitoken"]
                ];
            } else {
                return [
                    "success" => false,
                    "error" => "L'utente specificato non esiste"
                ];
            }
        } else {
            return [
                "success" => false,
                "error" => "La richiesta non è valida"
            ];
        }
    }

    public function signup(Request $request) {
        $jsonData = $request->json()->all();
        $isValidRequest = $this->validate($request, [
            "name" => "required",
            "surname" => "required",
            "email" => "required",
            "password" => "required"
        ]);

        $user = Users::where("email", "=", $jsonData["email"])->first();

        if ($user != null) {
            return [
                "success" => false,
                "error" => "Esiste già un utente con questa email"
            ];
        }

        if ($isValidRequest) {
            $user = new Users;
            $user["id"] = $this->generateId();
            $user["nome"] = $jsonData["name"];
            $user["cognome"] = $jsonData["surname"];
            $user["email"] = $jsonData["email"];
            $user["password"] = sha1($this->salt . $jsonData["password"]);
            $user["apitoken"] = Str::random($this->tokenLength);

            if ($user->save()) {
                $this->createCart($user["id"]);
                return [
                    "success" => true
                ];
            } else {
                return [
                    "success" => false,
                    "error" => "Esiste già un utente con queste credenziali"
                ];
            }
        } else {
            return [
                "success" => false,
                "error" => "La richiesta non è valida"
            ];
        }
    }

    private function createCart(int $idUser){
        $cart = new Cart;
        $cart["id"] = 1;
        $cart["iduser"] = $idUser;
        $cart->save();
    }
}
