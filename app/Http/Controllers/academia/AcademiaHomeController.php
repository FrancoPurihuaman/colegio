<?php

namespace App\Http\Controllers\academia;

use Illuminate\Http\Request;

class AcademiaHomeController extends ModAcademiaContoller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        
        
        return view('academia.academiaHome', [
            'modulo' => $this->modulo
        ]);
    }
}
