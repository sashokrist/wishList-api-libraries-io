<?php

namespace App\Http\Controllers;

use App\Services\LibrariesIoService;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function show(LibrariesIoService $librariesIoService)
    {
        $package = $librariesIoService->getPackage('wishList-api-libraries.io');
        dd($package);

        return view('packages.show', compact('package'));
    }
}
