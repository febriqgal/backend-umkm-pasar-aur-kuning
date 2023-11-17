<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    //* GET ALL CATEGORY
    public function index()
    {
        $posts = Category::all();
        return new ApiResource(true, 'Berhasil menampilkan data products', $posts);
    }

    //* STORE CATEGORY
    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'title'     => 'required|unique:categories',
            'icon'   => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $post = Category::create([
            'title'    => $request->title,
            'icon'     => $request->icon,
        ]);

        //return response
        return new ApiResource(true, 'Berhasil menambahkan data users', $post);
    }
}
