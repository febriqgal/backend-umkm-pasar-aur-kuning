<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $posts = Order::with('user', 'product', 'cart')->get();
        return new ApiResource(true, 'Berhasil menampilkan data', $posts);
    }
    public function store(Request $request)
    {
        $post = Order::create($request->all());

        return new ApiResource(true, 'Berhasil menambahkan data', $post);
    }
    public function destroy($id)
    {
        $post = Order::find($id);
        $post->delete();
        return new ApiResource(true, 'Data Berhasil Dihapus!', null);
    }
    public function update(Request $request, $id)
    {
        $user = Order::find($id);
        $user->update($request->all());

        return new ApiResource(true, 'Data Berhasil!', $user);
    }
    public function show($userId)
    {
        $post = Order::where('user_id', $userId)->with('user', 'product', 'cart')->orderBy('created_at', 'desc')->get();

        return new ApiResource(true, 'Detail Data By id!', $post);
    }
}
