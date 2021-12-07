<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\SalesList;
use App\Models\Menu;
use App\Models\User;
use Carbon\Carbon;

class SalesListController extends Controller
{
    public function index()
    {
        $items = SalesList::all();

        foreach ($items as $item) {
            $lists = [];
            foreach ($item->menu_list as $id) {
                $menu = Menu::where('id', $id['id'])->first();
                $menu->quantity = $id[('quantity')];

                array_push($lists, $menu);
            }

            $item->menu_list = $lists;

            $user = User::where('id', $item->user_id)->first();
            $item->user_name = $user->name;
        }

        return response()->json(['data' => $items]);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'user_id' => 'required',
            'menu_list' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);
        if ($validate->fails()) {
            return response()->json(['message' => '登録に失敗しました']);
        }

        $date = new Carbon();
        $date->format('Y-m-d H:i:s');

        $item = SalesList::create([
            'user_id' => $request->user_id,
            'menu_list' => $request->menu_list,
            'date' => $request->date,
            'time' => $request->time,
            'created_at' => $date

        ]);

        return response()->json(['data' => $item], 201);
    }

    public function show(Request $request)
    {

        $items = SalesList::where('created_at', 'LIKE', "%{$request->created_at}%")->get();

        foreach ($items as $item) {
            $lists = [];
            foreach ($item->menu_list as $id) {
                $menu = Menu::where('id', $id['id'])->first();
                $menu->quantity = $id[('quantity')];

                array_push($lists, $menu);
            }

            $item->menu_list = $lists;

            $user = User::where('id', $item->user_id)->first();
            $item->user_name = $user->name;
        }

        return response()->json(['data' => $items]);
    }
}
