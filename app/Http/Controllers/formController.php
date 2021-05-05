<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\art;
use App\Models\user;
use App\Models\exhibit;
use App\Models\music;
use App\Models\poetry;
use App\Models\transaction;
use Illuminate\Support\Facades\Hash;


class formController extends Controller
{
    function insertArt(Request $request){
        $title = $request->input('artTitle');
        $type = $request->input('artType');
        $id = $request->input('userID');

        $art = new art;
        $art->ArtTitle = $title;
        $art->ArtType = $type;
        $art->userID = $id;
        $art->save();

        return redirect('/');
    }
    function updateArt(Request $request){
        $art = art::find($request->input('id'));
        if($art){
            $title = $request->input('artTitle');
            $type = $request->input('artType');
            $id = $request->input('userID');

            $art->ArtTitle = $title;
            $art->ArtType = $type;
            $art->userID = $id;
            $art->save();
        }
        

        return redirect('/');
    }
    function deleteArt(Request $request){
        $art = art::find($request->input('id'));
        if($art){
            $art->delete();
        }
        

        return redirect('/');
    }

function insertExhibit(Request $request){
        $sDate = $request->input('StartDate');
        $eDate = $request->input('EndDate');
        $theme = $request->input('Theme');
        $transactionID = $request->input('TransactionID');

        $exhibit = new exhibit;
        $exhibit->StartDate = $sDate;
        $exhibit->EndDate = $eDate;
        $exhibit->Theme = $theme;
        $exhibit->TransactionID = $transactionID;

        $exhibit->save();
        return redirect('/');
    }
function updateExhibit(Request $request){
        $sDate = $request->input('StartDate');
        $eDate = $request->input('EndDate');
        $theme = $request->input('Theme');
        $transactionID = $request->input('TransactionID');

        $exhibit = exhibit::find($request->input('id'));
        $exhibit->StartDate = $sDate;
        $exhibit->EndDate = $eDate;
        $exhibit->Theme = $theme;
        $exhibit->TransactionID = $transactionID;

        $exhibit->save();
        return redirect('/');
    }
    function deleteExhibit(Request $request){
        $exhibit = exhibit::find($request->input('id'));
        if($exhibit){
            $exhibit->delete();
        }
        

        return redirect('/');
    }

function insertMusic(Request $request){
        $title = $request->input('musicTitle');
        $genre = $request->input('genre');
        $userID = $request->input('userID');

        $music = new music;
        $music->MusicTitle = $title;
        $music->genre = $genre;
        $music->userID = $userID;
        $music->save();
        return redirect('/');
    }
function updateMusic(Request $request){
        $title = $request->input('musicTitle');
        $genre = $request->input('genre');
        $userID = $request->input('userID');

        $music = music::find($request->input('id'));
        $music->MusicTitle = $title;
        $music->genre = $genre;
        $music->userID = $userID;
        $music->save();
        return redirect('/');
    }
    function deleteMusic(Request $request){
        $music = music::find($request->input('id'));
        if($music){
            $music->delete();
        }
        

        return redirect('/');
    }

function insertPoetry(Request $request){
        $title = $request->input('poetryTitle');
        $id = $request->input('userID');

        $poetry = new poetry;
        $poetry->PoetryTitle = $title;
        $poetry->userID = $id;
        $poetry->save();
        return redirect('/');
    }
function updatePoetry(Request $request){
        $title = $request->input('poetryTitle');
        $id = $request->input('userID');

        $poetry = poetry::find($request->input('id'));
        $poetry->PoetryTitle = $title;
        $poetry->userID = $id;
        $poetry->save();
        return redirect('/');
    }
    function deletePoetry(Request $request){
        $poetry = poetry::find($request->input('id'));
        if($poetry){
            $poetry->delete();
        }
        

        return redirect('/');
    }

function insertTransaction(Request $request){
        $userID = $request->input('userID');
        $date = $request->input('transactionDate');

        $trans = new transaction;
        $trans->TransactionDate = $date;
        $trans->userID = $userID;
        $trans->save();
        return redirect('/');
    }
function updateTransaction(Request $request){
        $userID = $request->input('userID');
        $date = $request->input('transactionDate');

        $trans = transaction::find($request->input('id'));
        $trans->TransactionDate = $date;
        $trans->userID = $userID;
        $trans->save();
        return redirect('/');
    }
    function deleteTransaction(Request $request){
        $transaction = transaction::find($request->input('id'));
        if($transaction){
            $transaction->delete();
        }
        

        return redirect('/');
    }

    function insertUser(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $admin = $request->input('admin') ? true : false;

        $user = new user;
        $user->name = $name;
        $user->admin = $admin;
        $user->email = $email;
        $user->password = Hash::make($password);//needs to be fixed as hash does not work here. might need to import something
        $user->save();

        return redirect('/');
    }
    function updateUser(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $admin = $request->input('admin') ? true : false;

        $user = user::find($reqest->input('id'));
        if($user){
            $user->name = $name;
            $user->admin = $admin;
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->save();
        }
        return redirect('/');
    }
    function deleteUser(Request $request){
        $user = user::find($request->input('id'));
        if($user){
            $user->delete();
        }
        return redirect('/');
    }

}
