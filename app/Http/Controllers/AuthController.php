<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Owner;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'role_id' => 'required',
            'uid' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json(['message' => '登録に失敗しました']);
        }

        if($request->role_id != 3) {
            $items = Owner::create([
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role_id,
                'uid' => $request->uid
            ]);
        } else {
            $items = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role_id,
                'uid' => $request->uid
            ]);
        }

        return response()->json(['data' => $items]);
    }

    public function login(Request $request)
    {
        $user = User::where('uid', $request->uid)->first();

        if(!$user) {
            $owner = Owner::where('uid', $request->uid)->first();
        }

        if ($user) {
            return response()->json(['data' => $user], 201);
        } else if ($owner) {
            return response()->json(['data' => $owner], 201);
        } else {
            return response()->json(['message' => 'ユーザーが見当たりません'], 404);
        }

    }
}
