<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    //* GET ALL CART
    public function index()
    {
        $posts = Cart::all();
        return new ApiResource(true, 'Berhasil menampilkan data', $posts);
    }

    //* DELETE CART
    public function destroy($id)
    {
        $post = Cart::find($id);
        $post->delete(true);


        return new ApiResource(true, 'Data Berhasil Dihapus!', $post);
    }

    //* POST CART
    public function store(Request $request)
    {
        $post = Cart::create($request->all());
        return new ApiResource(true, 'Berhasil menambahkan data', $post);
    }

    //* GET CART BY ID
    public function show($id)
    {
        $post = Cart::find($id);

        return new ApiResource(true, 'Detail Data!', $post);
    }

    //* GET CART BY USER ID
    public function showUserId($userId)
    {
        $post = Cart::where('user_id', $userId)->with('product', 'user')->get();

        return new ApiResource(true, 'Detail Data By id!', $post);
    }
}
