<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view("account.index", [
            "plans" => [
                ["id" => "free", "name" => "Free"],
                ["id" => "seller", "name" => "Seller"],
            ]
        ]);
    }

    public function change($plan)
    {
        $user = auth()->user();

        if ($plan === "seller") {
            $user->newSubscription('seller', 'seller')->create($user->stripe_token);
        }

        if ($plan === "free") {
            $user->subscription("seller")->cancel();
        }
        
        return redirect()->route("account.index");
    }
}
