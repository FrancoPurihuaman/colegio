<?php

namespace App\Http\Controllers\direccion;

use App\Traits\PaginatorLimitsFromTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Estudiante;
use App\Http\Requests\setting\EstudianteRequest;

class EstudianteController extends ModDireccionController
{
    use PaginatorLimitsFromTo;
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $codigo         = $request->query('filter_ref', '');
        $codigo_est     = $request->query('filter_codigo_est', '');
        $apellido_pat   = $request->query('filter_apellido_pat', '');
        
        // Condiciones para mostrar estudiante
        $oEstudiante = new Estudiante();
        if ($codigo != '' && is_numeric($codigo) && $codigo >= 1) {
            $oEstudiante = $oEstudiante->where('STD_CODIGO', '=', $codigo);
        }
        if($codigo_est != ''){
            $oEstudiante = $oEstudiante->where('STD_COD_ESTUDIANTE', '=', $codigo_est);
        }
        if($apellido_pat != '') {
            $oEstudiante = $oEstudiante->where('STD_APELLIDO_PAT', 'LIKE', $apellido_pat.'%');
        }
        
        // Obtener paginador y agregamos la cadena de consulta
        $pgdEstudiantes = $oEstudiante->orderBy('STD_CODIGO', 'desc')->paginate(25)->withQueryString();
        
        // Enviar valores de consulta
        $request->flash();
        
        return view('setting.estudiante.estudianteLista', [
            'modulo' => $this->modulo,
            'pgdEstudiantes' => $pgdEstudiantes,
            'pgdEstudiantesLimits' => $this->getPaginatorLimitsFromTo($pgdEstudiantes)
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setting.estudiante.estudianteCrear', [
            'modulo' => $this->modulo
        ]);
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests
     * @return \Illuminate\Http\Response
     */
    public function store(EstudianteRequest $request)
    {
        $oEstudiante = new Estudiante();
        
        $oEstudiante->STD_COD_ESTUDIANTE = $request->codigo_est;
        $oEstudiante->STD_NOMBRE = $request->nombre;
        $oEstudiante->STD_APELLIDO_PAT = $request->apellido_pat;
        $oEstudiante->STD_APELLIDO_MAT = $request->apellido_mat;
        $oEstudiante->STD_SEXO = $request->sexo;
        $oEstudiante->STD_FECHA_NACIMIENTO = $request->fecha_nacimiento;
        
        if($request->hasFile('foto')){
            $oEstudiante->STD_FOTO = $request->file('foto')->store('estudiante', 'public');
        }
        
        $oEstudiante->save();
        
        return redirect()->route('estudiante.mostrar', [
            'id' => $oEstudiante->STD_CODIGO
        ])->with('status', [
            'type'      => 'success',
            'message'   => 'Creado exitosamente!!'
        ]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oEstudiante = Estudiante::findOrFail($id);
        
        return view('setting.estudiante.estudianteMostrar', [
            'modulo'        => $this->modulo,
            'estudiante'    => $oEstudiante
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oEstudiante = Estudiante::findOrFail($id);
        
        return view('setting.estudiante.estudianteEditar', [
            'modulo' => $this->modulo,
            'estudiante' => $oEstudiante
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Inventario\ArticuloRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstudianteRequest $request, $id)
    {
        $oEstudiante = Estudiante::findOrFail($id);
        
        $oEstudiante->STD_COD_ESTUDIANTE = $request->codigo_est;
        $oEstudiante->STD_NOMBRE = $request->nombre;
        $oEstudiante->STD_APELLIDO_PAT = $request->apellido_pat;
        $oEstudiante->STD_APELLIDO_MAT = $request->apellido_mat;
        $oEstudiante->STD_SEXO = $request->sexo;
        $oEstudiante->STD_FECHA_NACIMIENTO = $request->fecha_nacimiento;
        
        if($request->hasFile('foto')){
            Storage::disk('public')->delete($oEstudiante->STD_FOTO);
            $oEstudiante->STD_FOTO = $request->file('foto')->store('estudiante', 'public');
        }
        
        $oEstudiante->save();
        
        return redirect()->route('estudiante.mostrar', [
            'id' => $oEstudiante->STD_CODIGO
        ])->with('status', [
            'type'      => 'success',
            'message'   => 'Actualizado exitosamente!!'
        ]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oEstudiante = Estudiante::findOrFail($id);
        
        // Se eliminará el estudiante si no tiene alguna matricula asociada
        if(is_null($oEstudiante->matriculas->first())){
            
            if($oEstudiante->STD_FOTO){
                Storage::disk('public')->delete($oEstudiante->STD_FOTO);
            }
            
            $oEstudiante->delete();
            
            return redirect()->route('estudiante.lista')->with('status', [
                'type'      => 'success',
                'message'   => 'Eliminado exitosamente!!'
            ]);
        }else{
            
            return back()->with('status', [
                'type'      => 'error',
                'message'   => 'Estudiante no puede ser eliminado'
            ]);
        }
    }
}
