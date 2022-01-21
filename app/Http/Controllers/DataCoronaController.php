<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class DataCoronaController extends Controller
{
    public function index()
    {
        $response = Http::get('https://api.kawalcorona.com/');
        $data = $response->json();
        return view('dashboard.corona.index', compact('data'));
    }
}