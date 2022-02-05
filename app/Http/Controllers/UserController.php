<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Users;

class UserController extends BaseController
{
    private $salt;

    public function __construct()
    {
        $this->salt = "skugasriccigksianto";
        $this->tokenLength = 60;
        $this->maxIDValue = 9999999999999999;
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

        if ($isValidRequest) {
            $user = new Users;
            $user["id"] = rand(0, $this->maxIdValue);
            $user["nome"] = $jsonData["name"];
            $user["cognome"] = $jsonData["surname"];
            $user["email"] = $jsonData["email"];
            $user["password"] = sha1($this->salt . $jsonData["password"]);
            $user["apitoken"] = Str::random($this->tokenLength);

            if ($user->save()) {
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
}
