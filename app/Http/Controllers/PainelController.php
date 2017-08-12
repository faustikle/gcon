<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory as View;

final class PainelController extends Controller
{
    /**
     * PainelController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('painel.index');
    }
}