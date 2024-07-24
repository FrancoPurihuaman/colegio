<?php

namespace App\Http\Controllers\direccion;

use App\Traits\PaginatorLimitsFromTo;
use Illuminate\Http\Request;
use App\Http\Requests\direccion\AreaRequest;
use App\Models\Area;

class AreaController extends ModDireccionController
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
        
        // Condiciones para mostrar area
        $oArea = new Area();
        if ($codigo != '' && is_numeric($codigo) && $codigo >= 1) {
            $oArea = $oArea->where('ARE_CODIGO', '=', $codigo);
        }
        if($nombre != '') {
            $oArea = $oArea->where('ARE_NOMBRE', 'LIKE', $nombre.'%');
        }
        
        // Obtener paginador y agregamos la cadena de consulta
        $pgdAreas = $oArea->orderBy('ARE_CODIGO', 'desc')->paginate(25)->withQueryString();
        
        // Enviar valores de consulta
        $request->flash();
        
        return view('direccion.area.areaLista', [
            'modulo' => $this->modulo,
            'pgdAreas' => $pgdAreas,
            'pgdAreasLimits' => $this->getPaginatorLimitsFromTo($pgdAreas)
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('direccion.area.areaCrear', [
            'modulo' => $this->modulo
        ]);
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request)
    {
        $oArea = new Area();
        
        $oArea->ARE_NOMBRE = strtolower($request->nombre);
        $oArea->ARE_DESCRIPCION = $request->descripcion;
        
        $oArea->save();
        
        return redirect()->route('area.mostrar', [
            'id' => $oArea->ARE_CODIGO
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
        $oArea = Area::findOrFail($id);
        
        return view('direccion.area.areaMostrar', [
            'modulo'  => $this->modulo,
            'area'    => $oArea
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
        $oArea = Area::findOrFail($id);
        
        return view('direccion.area.areaEditar', [
            'modulo' => $this->modulo,
            'area' => $oArea
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Inventario\ArticuloRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, $id)
    {
        $oArea = Area::findOrFail($id);
        
        $oArea->ARE_NOMBRE = strtolower($request->nombre);
        $oArea->ARE_DESCRIPCION = $request->descripcion;
        
        $oArea->save();
        
        return redirect()->route('area.mostrar', [
            'id' => $oArea->ARE_CODIGO
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
        $oArea = Area::findOrFail($id);
        
        // Se eliminará el area si no tiene alguna clase o competencia asociada
        if(is_null($oArea->clases->first()) && is_null($oArea->competencias->first())){
            
            $oArea->delete();
            
            return redirect()->route('area.lista')->with('status', [
                'type'      => 'success',
                'message'   => 'Eliminado exitosamente!!'
            ]);
        }else{
            
            return back()->with('status', [
                'type'      => 'error',
                'message'   => 'Área no puede ser eliminado'
            ]);
        }
    }
}
