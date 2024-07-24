<?php

namespace App\Http\Controllers\direccion;

use App\Traits\PaginatorLimitsFromTo;
use Illuminate\Http\Request;
use App\Http\Requests\setting\GradoRequest;
use App\Models\Grado;

class GradoController extends ModDireccionController
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
        $nombre         = $request->query('filter_nombre', '');
        
        // Condiciones para mostrar grado
        $oGrado = new Grado();
        if ($codigo != '' && is_numeric($codigo) && $codigo >= 1) {
            $oGrado = $oGrado->where('GRD_CODIGO', '=', $codigo);
        }
        if($nombre != '') {
            $oGrado = $oGrado->where('GRD_NOMBRE', 'LIKE', $nombre.'%');
        }
        
        // Obtener paginador y agregamos la cadena de consulta
        $pgdGrados = $oGrado->orderBy('GRD_CODIGO', 'desc')->paginate(25)->withQueryString();
        
        // Enviar valores de consulta
        $request->flash();
        
        return view('setting.grado.gradoLista', [
            'modulo' => $this->modulo,
            'pgdGrados' => $pgdGrados,
            'pgdGradosLimits' => $this->getPaginatorLimitsFromTo($pgdGrados)
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setting.grado.gradoCrear', [
            'modulo' => $this->modulo
        ]);
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests
     * @return \Illuminate\Http\Response
     */
    public function store(GradoRequest $request)
    {
        $oGrado = new Grado();
        
        $oGrado->GRD_NOMBRE = strtolower($request->nombre);
        $oGrado->GRD_DESCRIPCION = $request->descripcion;
        
        $oGrado->save();
        
        return redirect()->route('grado.mostrar', [
            'id' => $oGrado->GRD_CODIGO
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
        $oGrado = Grado::findOrFail($id);
        
        return view('setting.grado.gradoMostrar', [
            'modulo'  => $this->modulo,
            'grado'    => $oGrado
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
        $oGrado = Grado::findOrFail($id);
        
        return view('setting.grado.gradoEditar', [
            'modulo' => $this->modulo,
            'grado' => $oGrado
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Inventario\ArticuloRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GradoRequest $request, $id)
    {
        $oGrado = Grado::findOrFail($id);
        
        $oGrado->GRD_NOMBRE = strtolower($request->nombre);
        $oGrado->GRD_DESCRIPCION = $request->descripcion;
        
        $oGrado->save();
        
        return redirect()->route('grado.mostrar', [
            'id' => $oGrado->GRD_CODIGO
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
        $oGrado = Grado::findOrFail($id);
        
        // Se eliminará el grado si no tiene algun grupo asociado
        if(is_null($oGrado->grupos->first())){
            
            $oGrado->delete();
            
            return redirect()->route('grado.lista')->with('status', [
                'type'      => 'success',
                'message'   => 'Eliminado exitosamente!!'
            ]);
        }else{
            
            return back()->with('status', [
                'type'      => 'error',
                'message'   => 'Grado no puede ser eliminado'
            ]);
        }
    }
}
