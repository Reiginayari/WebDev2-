<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\art;
use App\Models\exhibit;
use App\Models\music;
use App\Models\poetry;
use App\Models\transaction;
use App\Models\user;

use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    function home(){
        if(Auth::check()){
            if(Auth::user()->admin == true){
                $art = art::all();
                $exhibit = exhibit::all();
                $music = music::all();
                $poetry = poetry::all();
                $transaction = transaction::all();
                $user = user::all();

                return view('tables/allTable')->with('art', $art)->with('exhibit', $exhibit)->with('music', $music)->with('poetry', $poetry)->with('transaction', $transaction)->with('user', $user);
            }
            else{
                $id = Auth::user()->id;
                $art = art::all()->where('userID', "=", $id);
                $exhibit = exhibit::all()->where('userID', "=", $id);
                $music = music::all()->where('userID', "=", $id);
                $poetry = poetry::all()->where('userID', "=", $id);
                $transaction = transaction::all()->where('userID', "=", $id);
                

                return view('tables/allTable')->with('art', $art)->with('exhibit', $exhibit)->with('music', $music)->with('poetry', $poetry)->with('transaction', $transaction);
            }
            
        }
        else{
            return redirect('/login');
        }
    }

//routes for the tables
    function artTable(){
        $art = art::all();

        return view('tables/artTable')->with('art', $art);
    }
  
    function exhibitsTable(){
        $exhibit = exhibit::all();

        return view('tables/exhibitsTable')->with('exhibit', $exhibit);
    }
    function musicTable(){
        $music = music::all();

        return view('tables/musicTable')->with('music', $music);
    }
    function poetriesTable(){
        $poetry = poetry::all();

        return view('tables/poetriesTable')->with('poetry', $poetry);
    }
    function transactionsTable(){
        $transaction = transaction::all();

        return view('tables/transactionsTable')->with('transaction', $transaction);
    }
    function usersTable(){
        $user = user::all();

        return view('tables/usersTable')->with('user', $user);
    }

//routes for the forms
    function artForm(){
        return view('forms/newArt');
    }
    function artFormUpdate(Request $request){
        $art = art::find($request->input('id'));
        return view('forms/updateArt')->with('art', $art);
    }


    function exhibitForm(){
        return view('forms/newExhibit');
    }
    function exhibitFormUpdate(Request $request){
        $id = $request->input('id');
        $exhibit = exhibit::find($id);
        return view('forms/newExhibit')->with('exhibit', $exhibit);
    }

    function musicForm(){
        return view('forms/newMusic');
    }
    function musicFormUpdate(Request $request){
        $id = $request->input('id');
        $music = music::find($id);
        return view('forms/updateMusic')->with('music', $music);
    }

    function poetryForm(){
        return view('forms/newPoetry');
    }
    function poetryFormUpdate(Request $request){
        $id = $request->input('id');
        $poetry = poetry::find($id);
        return view('forms/updatePoetry')->with('poetry', $poetry);
    }

    function transactionForm(){
        return view('forms/newTransaction');
    }
    function transactionFormUpdate(Request $request){
        $id = $request->input('id');
        $transaction = transaction::find($id);
        return view('forms/updateTransaction')->with('transaction', $transaction);
    }
    function userForm(){
        return view('forms/newUser');
    }
    function userFormUpdate(Request $request){
        $user = user::find($request->input('id'));
        return view('forms/updateUser')->with('user', $user);
    }

}
?>
