<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $posts = Cart::all();
        return new ApiResource(true, 'Berhasil menampilkan data products', $posts);
    }

    public function destroy($id)
    {
        $post = Cart::find($id);
        $post->delete();
        return new ApiResource(true, 'Data Post Berhasil Dihapus!', null);
    }

    public function store(Request $request)
    {

        $post = Cart::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total' => $request->total
        ]);
        return new ApiResource(true, 'Berhasil menambahkan data users', $post);
    }

    public function show($id)
    {
        $post = Cart::find($id);
        return new ApiResource(true, 'Detail Data Post!', $post);
    }

    public function showUserId($userId)
    {
        $post = Cart::where('user_id', $userId)->get();
        return new ApiResource(true, 'Detail Data Post!', $post);
    }
}
