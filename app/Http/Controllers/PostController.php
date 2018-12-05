<?php

namespace App\Http\Controllers;

use App\Model\Panier;
use Illuminate\Http\Request;

class PostController extends Controller
{


    public function view($id){
        $post = Panier::where('id', $id)->firstOrFail();
        return view('post', compact('post'));
    }

    public function create(){
        $post=newPost();
        return view('post-edit', compact('post'));
    }
}
