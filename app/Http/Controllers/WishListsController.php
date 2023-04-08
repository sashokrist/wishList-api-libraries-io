<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use Illuminate\Http\Request;

class WishListsController extends Controller
{
    public function index()
    {
        $user_id = auth('api')->user()->id;//auth()->id();
        $wishLists = Wishlist::where('user_id',$user_id)->with('libraries')->get();

        return response()->json($wishLists);
    }

    public function store(Request $request)
    {
        $wishList = Wishlist::create($request->all());

        $libraries = $request->input('library_id', []);
        $wishList->libraries()->attach($libraries);

        return response()->json($wishList);
    }

    public function show(WishList $wishList)
    {
        $wishList->load('libraries');

        return response()->json($wishList);
    }

    public function update(Request $request, WishList $wishList)
    {
        $wishList->update($request->all());

        return response()->json($wishList);
    }

    public function destroy(WishList $wishList)
    {
        $wishList->libraries()->detach();
        $wishList->delete();

        return response()->json(['message' => 'WishList deleted successfully']);
    }
}

