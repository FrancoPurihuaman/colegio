<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Profesor;
use App\Models\Area;
use App\Models\Grado;

class ModSettingController extends Controller
{
    
    protected $modulo = 'configuracion';
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $cantEstudiantes = Estudiante::count();
        $cantProfesores = Profesor::count();
        $cantAreas = Area::count();
        $cantGrados = Grado::count();
        
        return view('setting.settingHome', [
            'modulo' => $this->modulo,
            'cantEstudiantes' => $cantEstudiantes,
            'cantProfesores' => $cantProfesores,
            'cantAreas' => $cantAreas,
            'cantGrados' => $cantGrados
        ]);
    }
}
