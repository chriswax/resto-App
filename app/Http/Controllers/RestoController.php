<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Support\Facades\Session;
//use Crypt; //for hashing password
use Illuminate\Support\Facades\Crypt;
//use decrypt;
use Illuminate\Support\Facades\Decrypt;
class RestoController extends Controller
{
    //
    public function index(){
        return view("home");
    }
    public function list(){
        $data = Restaurant::all();
        return view("list", ["data"=>$data]);
    }

    public function add(Request $req){       
        // return $req->input();

        $resto = new Restaurant;
        $resto->name =$req->input('name');
        $resto->email =$req->input('email');
        $resto->address =$req->input('address');
        $resto->save();
        $this->$req->session()->flash('status', 'Restaurant entered successfully');
        return redirect("list");
    }

    public function delete($id){
        $result = Restaurant::find($id)->delete();
        Session::flash('status', 'Restaurant deleted successfully');
        return redirect("list");
    }

    public function edit($id){
        $data = Restaurant::find($id);
        return view("update", ['data'=>$data]);
    }
    public function update(Request $req){       
        $resto = Restaurant::find($req->id);
        $resto->name =$req->input('name');
        $resto->email =$req->input('email');
        $resto->address =$req->input('address');
        $resto->save();
        $this->$req->session()->flash('status', 'Restaurant Updated successfully');
        return redirect("list");
    }

    public function register(Request $req){       
        $user = new User;
        $user->name =$req->input('name');
        $user->email =$req->input('email');
        $user->password = Crypt::encrypt($req->input('password'));
        $user->contact =$req->input('contact');
        $user->save();
        $req->session()->put('user', $req->input('name'));
        return redirect("/");
    }
    public function login(Request $req){       
       $user = User::where('email', $req->input("email"))->get();
       if (Crypt::Decrypt($user[0]->password) == $req->input("password")){
            $req->session()->put('user', $user[0]->name);
            return redirect("/");
       }
    }


}
