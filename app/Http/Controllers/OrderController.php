<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\OrderCreated;
use App\Models\Order;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        $items = Order::orderBy('date', 'asc')->orderBy('time', 'asc')->get();

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

        return response()->json([
            'data' => $items
        ], 200);
    }


    public function create(Request $request)
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


        $order = Order::create([
            'user_id' => $request->user_id,
            'menu_list' => $request->menu_list,
            'display' => 1,
            'cooked' => 1,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        event(new OrderCreated($order));

        return $order;
    }
}
