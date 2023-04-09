<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function storeUser(Request $request)
    {
        try {
            $user = DB::table('items')->orderBy('id', 'DESC')->first();
            $client = new Client();
            $result = $client->post('oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => '2',
                    'client_secret' => '6JGxEGy9BHcJgMdxaE2Ix0scQ98WTK2clbbTv7Ba',
                    'username' => $user->email,
                    'password' => $user->password,
                    'scope' => '',
                ]
            ]);
            $access_token = json_decode((string) $result->getBody(), true)['access_token'];
            $result = $client->get('api/user', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => "Bearer $access_token",
                ]
            ]);

            return (string) $result->getBody();
        } catch (GuzzleException $e) {
            return "Exception!: " . $e->getMessage();
        }
    }

    public function deactivateAccount()
    {
        $user = auth('api')->user();
        $user->is_active = false;
        $user->save();
        Auth::logout();
        return redirect()->route('register')->with('success', 'Your account has been deactivated.');
    }
}
