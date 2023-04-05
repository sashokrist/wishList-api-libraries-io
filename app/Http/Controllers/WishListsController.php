<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use Illuminate\Http\Request;

class WishListsController extends Controller
{
    public function index()
    {
        $user_id = 1;//auth()->id();
        $wishLists = Wishlist::where('user_id',$user_id)->with('libraries')->get();

        return response()->json($wishLists);
    }

    public function store(Request $request)
    {
        $wishList = WishList::create([
            'user_id' => 1,
            'name' => $request->name,
            'description' => $request->description
        ]);

       // $wishList->libraries()->associate($request->library_id);
        $wishList->libraries()->attach($request->library_id);

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

