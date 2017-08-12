<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory as View;

final class PainelController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        return view('painel.index');
    }
}
