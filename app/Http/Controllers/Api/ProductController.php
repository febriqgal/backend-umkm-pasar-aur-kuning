<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $posts = Product::with('user')->get();
        return new ApiResource(true, 'Berhasil menampilkan data products', $posts);
    }

    public function destroy($id)
    {
        $post = Product::find($id);
        $post->delete();
        return new ApiResource(true, 'Data Post Berhasil Dihapus!', null);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'    => 'required',
            'desc'     => 'required',
            'user_id'  => 'required|exists:users,id'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $post = Product::create([
            'title'    => $request->title,
            'desc'     => $request->desc,
            'user_id'  => $request->user_id,
            'category' => $request->category,
            'price'    => $request->price,
            'stock'    => $request->stock,
            'discount' => $request->discount,
            'image'    => $request->image,
            'total'     => $request->price - ($request->price * ($request->discount / 100)),

        ]);
        return new ApiResource(true, 'Berhasil menambahkan data users', $post);
    }

    public function show($id)
    {
        $post = Product::find($id);
        return new ApiResource(true, 'Detail Data Post!', $post);
    }

    public function showUserId($userId)
    {
        $post = Product::where('user_id', 'LIKE', '%' . $userId . '%')->get();
        return new ApiResource(true, 'Detail Data Post!', $post);
    }

    public function search($q)
    {
        $post = Product::where('title', 'LIKE', '%' . $q . '%')->get();
        return new ApiResource(true, 'Detail Data Post!', $post);
    }
    public function update(Request $request, $id)
    {
        $post = Product::find($id);
        $post->update([
            'title'    => $request->title,
            'desc'     => $request->desc,
            'category' => $request->category,
            'price'    => $request->price,
            'stock'    => $request->stock,
            'discount' => $request->discount,


        ]);
        return new ApiResource(true, 'Data Post Berhasil Diubah!', $post);
    }
}
