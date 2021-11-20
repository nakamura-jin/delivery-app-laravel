<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{

    public function index()
    {
        $items = Menu::all();

        foreach ($items as $item) {
            $tag = Tag::where('id', $item->tag_id)->first();
            $item->tag_name = $tag->tag_name;
        }

        return response()->json([
            'data' => $items
        ], 200);
    }


    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'discription' => 'required',
            'price' => 'required|numeric',
            'tag_id' => 'required',
            'image' => 'required',
        ]);
        if ($validate->fails()) {
            return response()->json(['message' => '登録に失敗しました']);
        }

        $url = $this->upload($request);

        Menu::create([
            'name' => $request->name,
            'discription' => $request->discription,
            'tag_id' => $request->tag_id,
            'price' => $request->price,
            'image' => $url,
        ]);

    }


    public function upload(Request $request)
    {
        $image = $request->file('image');

        $path = Storage::disk('s3')->putFile('/', $image, 'public');

        $url = Storage::disk('s3')->url($path);

        return $url;
    }

}
