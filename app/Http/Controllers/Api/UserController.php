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

        return new ApiResource(true, 'Berhasil menampilkan data', $posts);
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
            'phone'     => $request->phone,
            'address'   => $request->address
        ]);

        //return response
        return new ApiResource(true, 'Berhasil menambahkan data', $post);
    }

    //* GET USER BY ID
    public function show($id)
    {
        $post = User::where('email', 'LIKE', '%' . $id . '%')->first();

        return new ApiResource(true, 'Detail Data!', $post);
    }

    //* UPDATE USER
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());

        return new ApiResource(true, 'Data Berhasil!', $user);
    }

    //* DELETE USER
    // public function destroy($id)
    // {
    //     $user = User::find($id);
    //     $user->delete();

    //     return new ApiResource(true, 'Data Berhasil Dihapus!', null);
    // }
}
