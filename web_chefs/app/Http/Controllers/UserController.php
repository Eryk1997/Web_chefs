<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return \view('users.index',[
            'user' => auth()->user(),
            'restaurants' => Restaurant::all(),
        ]);
    }

    public function attachRestaurant(Restaurant $restaurant){
        if (count(auth()->user()->restaurants) >= 3) {
            toast("Uzytkownik " . auth()->user()->name . " posiada max restauracji", 'error');
            return back();
        }
        if (count($restaurant->users) >= 5) {
            toast("Restauracja " . $restaurant->name . " posiada max pracowników", 'error');
            return back();
        }else{
            auth()->user()->restaurants()->attach($restaurant);
            toast("Pomyślnie przypisano Cię do tej restauracji", 'success');
            return back();
        }
    }

    public function detachRestaurant(Restaurant $restaurant){
        if(auth()->user()){
            auth()->user()->restaurants()->detach($restaurant);
            toast("Pomyślnie odpięto Cię do tej restauracji", 'success');
            return back();
        }
    }

}
