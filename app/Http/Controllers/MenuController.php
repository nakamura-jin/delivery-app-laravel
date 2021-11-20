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
            $item->tag_name = $tag->name;
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


    public function show($menu)
    {
        $item = Menu::find($menu);

        $tag = Tag::find($item->tag_id);
        $item->tag_name = $tag->name;

        if ($item) {
            return response()->json(['data' => $item], 201);
        } else {
            return response()->json(['message' => 'エラーです'], 404);
        }
    }


    public function update(Request $request, $id)
    {
        if ($request->image) {
            $url = $this->upload($request);
            $update = [
                'name' => $request->name,
                'discription' => $request->discription,
                'tag_id' => $request->tag_id,
                'price' => $request->price,
                'image' => $url
            ];
        } else {
            $update = [
                'name' => $request->name,
                'discription' => $request->discription,
                'tag_id' => $request->tag_id,
                'price' => $request->price,
            ];
        }

        $item = Menu::find($id)->update($update);


        if ($item) {
            return response()->json(['data' => $item], 201);
        } else {
            return response()->json(['message' => '変更に失敗しました'], 404);
        }
    }


    public function destroy(Request $request)
    {
        $item = Menu::where('id', $request->id)->delete();
        if ($item) {
            return response()->json(['message' => 'メニューを削除しました'], 201);
        } else {
            return response()->json(['message' => 'メニューを削除できませんでした'], 404);
        }
    }

}
