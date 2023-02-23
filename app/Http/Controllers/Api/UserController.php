<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        Log::info('admin mengambil data user');
        return response()->json($data);
    }

    public function count()
    {
        $data = User::count();
        Log::info('admin menampilkan total data user');
        return response()->json([
            'total data ' => $data
        ]);
    }
}
