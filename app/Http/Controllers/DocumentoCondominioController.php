<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DocumentoCondominioController extends Controller
{
    public function index()
    {
        $documentos = Auth::user()->condominio->documentos;

        return view('documento-condominio.index', compact('documentos'));
    }
}