<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use Illuminate\Http\Request;

class WishListsController extends Controller
{
    public function index()
    {
        $wishLists = WishList::with('libraries')->get();

        return response()->json($wishLists);
    }

    public function store(Request $request)
    {
        $wishList = WishList::create($request->all());

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

