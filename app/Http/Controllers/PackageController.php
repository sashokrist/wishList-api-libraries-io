<?php

namespace App\Http\Controllers;

use App\Services\LibrariesIoService;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function show($name, LibrariesIoService $librariesIoService)
    {
        $package = $librariesIoService->getPackage($name);

        return view('packages.show', compact('package'));
    }
}
