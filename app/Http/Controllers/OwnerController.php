<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Owner;
use App\Models\Role;

class OwnerController extends Controller
{
    public function index()
    {
        $items = Owner::all();

        foreach ($items as $item) {
            $role = Role::where('id', $item->role_id)->first();
            $item->role_name = $role->name;
        }


        return response()->json([
            'data' => $items
        ], 200);
    }

    public function show($owner)
    {
        $item = Owner::find($owner);

        // $role = Role::where('id', $item->role_id )->first();
        // $item->role_name = $role->name;

        if ($item) {
            return response()->json(['data' => $item], 201);
        } else {
            return response()->json(['message' => 'エラーです'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $update = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'uid' => $request->uid
        ];
        $item = Owner::find($id)->update($update);

        if ($item) {
            return response()->json(['message' => '変更しました'], 201);
        } else {
            return response()->json(['message' => '変更に失敗しました'], 404);
        }
    }

    public function destroy(Request $request)
    {
        $item = Owner::where('id', $request->id)->delete();
        if ($item) {
            return response()->json(['message' => 'ユーザーを削除しました'], 201);
        } else {
            return response()->json(['message' => 'ユーザを削除できませんでした'], 404);
        }
    }

    public function userList()
    {
        $items = Owner::where('role_id', '=', 3)->get();

        foreach ($items as $item) {
            $role = Role::where('id', $item->role_id)->first();
            $item->role_name = $role->name;
        }

        return response()->json([
            'data' => $items
        ], 200);
    }
}
