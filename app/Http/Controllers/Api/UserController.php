<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    //* GET ALL USER
    public function index()
    {
        $posts = User::all();

        return new ApiResource(true, 'Berhasil menampilkan data users', $posts);
    }

    //* POST USER
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|unique:users',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $post = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $request->password,
            'role'      => $request->role,
            'address'   => $request->address
        ]);

        //return response
        return new ApiResource(true, 'Berhasil menambahkan data users', $post);
    }

    //* GET USER BY ID
    public function show($id)
    {
        $post = User::find($id);

        return new ApiResource(true, 'Detail Data Post!', $post);
    }
}
