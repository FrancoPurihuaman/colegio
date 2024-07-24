<?php

namespace App\Http\Controllers\direccion;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Profesor;
use App\Http\Requests\direccion\ProfesorRequest;
use App\Traits\PaginatorLimitsFromTo;


class ProfesorController extends ModDireccionController
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
        $dni            = $request->query('filter_dni', '');
        $apellido_pat   = $request->query('filter_apellido_pat', '');
        
        // Condiciones para mostrar profesor
        $oProfesor = new profesor();
        if ($codigo != '' && is_numeric($codigo) && $codigo >= 1) {
            $oProfesor = $oProfesor->where('PFS_CODIGO', '=', $codigo);
        }
        if($dni != ''){
            $oProfesor = $oProfesor->where('PFS_DNI', '=', $dni);
        }
        if($apellido_pat != '') {
            $oProfesor = $oProfesor->where('PFS_APELLIDO_PAT', 'LIKE', $apellido_pat.'%');
        }
        
        // Obtener paginador y agregamos la cadena de consulta
        $pgdProfesores = $oProfesor->orderBy('PFS_CODIGO', 'desc')->paginate(25)->withQueryString();
        
        // Enviar valores de consulta
        $request->flash();
        
        return view('direccion.profesor.profesorLista', [
            'modulo' => $this->modulo,
            'pgdProfesores' => $pgdProfesores,
            'pgdProfesoresLimits' => $this->getPaginatorLimitsFromTo($pgdProfesores)
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('direccion.profesor.profesorCrear', [
            'modulo' => $this->modulo
        ]);
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests
     * @return \Illuminate\Http\Response
     */
    public function store(ProfesorRequest $request)
    {
        $oProfesor = new Profesor();
        
        $oProfesor->PFS_DNI = $request->dni;
        $oProfesor->PFS_NOMBRE = $request->nombre;
        $oProfesor->PFS_APELLIDO_PAT = $request->apellido_pat;
        $oProfesor->PFS_APELLIDO_MAT = $request->apellido_mat;
        $oProfesor->PFS_SEXO = $request->sexo;
        $oProfesor->PFS_FECHA_NACIMIENTO = $request->fecha_nacimiento;
        $oProfesor->PFS_EMAIL = $request->email;
        $oProfesor->PFS_TELEFONO = $request->telefono;
        $oProfesor->PFS_ESPECIALIDAD = $request->especialidad;
        
        if($request->hasFile('foto')){
            $oProfesor->PFS_FOTO = $request->file('foto')->store('profesor', 'public');
        }
        
        $oProfesor->save();
        
        return redirect()->route('profesor.mostrar', [
            'id' => $oProfesor->PFS_CODIGO
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
        $oProfesor = Profesor::findOrFail($id);
        
        return view('direccion.profesor.profesorMostrar', [
            'modulo'        => $this->modulo,
            'profesor'      => $oProfesor
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
        $oProfesor = Profesor::findOrFail($id);
        
        return view('direccion.profesor.profesorEditar', [
            'modulo' => $this->modulo,
            'profesor' => $oProfesor
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Inventario\ArticuloRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfesorRequest $request, $id)
    {
        $oProfesor = Profesor::findOrFail($id);
        
        $oProfesor->PFS_DNI = $request->dni;
        $oProfesor->PFS_NOMBRE = $request->nombre;
        $oProfesor->PFS_APELLIDO_PAT = $request->apellido_pat;
        $oProfesor->PFS_APELLIDO_MAT = $request->apellido_mat;
        $oProfesor->PFS_SEXO = $request->sexo;
        $oProfesor->PFS_FECHA_NACIMIENTO = $request->fecha_nacimiento;
        $oProfesor->PFS_EMAIL = $request->email;
        $oProfesor->PFS_TELEFONO = $request->telefono;
        $oProfesor->PFS_ESPECIALIDAD = $request->especialidad;
        
        if($request->hasFile('foto')){
            Storage::disk('public')->delete($oProfesor->PFS_FOTO);
            $oProfesor->PFS_FOTO = $request->file('foto')->store('profesor', 'public');
        }
        
        $oProfesor->save();
        
        return redirect()->route('profesor.mostrar', [
            'id' => $oProfesor->PFS_CODIGO
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
        $oProfesor = Profesor::findOrFail($id);
        
        // Se eliminará el profesor si no tiene alguna clase asociada
        if(is_null($oProfesor->clases->first())){
            
            if($oProfesor->PFS_FOTO){
                Storage::disk('public')->delete($oProfesor->PFS_FOTO);
            }
            
            $oProfesor->delete();

            return redirect()->route('profesor.lista')->with('status', [
                'type'      => 'success',
                'message'   => 'Eliminado exitosamente!!'
            ]);
        }else{
            
            return back()->with('status', [
                'type'      => 'error',
                'message'   => 'Profesor no puede ser eliminado'
            ]);
        }
    }
}
