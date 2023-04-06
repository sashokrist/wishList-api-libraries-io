<?php

namespace App\Http\Controllers;

use App\Models\Library;
use App\Models\User;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {
        $user_id = 4;//auth()->id();
        $libraries = Library::where('user_id',$user_id)->with('wishLists')->get();

        return response()->json($libraries);
    }

    public function store(Request $request)
    {
        $library = Library::create($request->all());

        return response()->json($library);
    }

    public function show(Library $library)
    {
        $library->load('wishLists');

        return response()->json($library);
    }

    public function update(Request $request, Library $library)
    {
        $library->update($request->all());

        return response()->json($library);
    }

    public function destroy(Library $library)
    {
        $library->wishLists()->detach();
        $library->delete();

        return response()->json(['message' => 'Library deleted successfully']);
    }
}
