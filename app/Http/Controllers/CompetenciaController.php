<?php

namespace App\Http\Controllers;

use App\Traits\PaginatorLimitsFromTo;
use Illuminate\Http\Request;
use App\Http\Requests\setting\CompetenciaRequest;
use App\Models\Competencia;
use App\Models\Area;

class CompetenciaController extends Controller
{
    use PaginatorLimitsFromTo;
    
    protected $modulo = 'configuracion';
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $codigo         = $request->query('filter_ref', '');
        $nombre         = $request->query('filter_nombre', '');
        $area           = $request->query('filter_area', '');
        
        // Condiciones para mostrar competencia
        $oCompetencia = new Competencia();
        if ($codigo != '' && is_numeric($codigo) && $codigo >= 1) {
            $oCompetencia = $oCompetencia->where('CPT_CODIGO', '=', $codigo);
        }
        if($nombre != '') {
            $oCompetencia = $oCompetencia->where('CPT_NOMBRE', 'LIKE', $nombre.'%');
        }
        if($area != '' && is_numeric($area) && $area >= 1) {
            $oCompetencia  = $oCompetencia->where('ARE_CODIGO', '=', $area);
        }
        
        // Obtener paginador y agregamos la cadena de consulta
        $pgdCompetencias = $oCompetencia->orderBy('CPT_CODIGO', 'desc')->paginate(25)->withQueryString();
        
        $areas = Area::all();
        
        // Enviar valores de consulta
        $request->flash();
        
        return view('setting.competencia.competenciaLista', [
            'modulo' => $this->modulo,
            'pgdCompetencias' => $pgdCompetencias,
            'pgdCompetenciasLimits' => $this->getPaginatorLimitsFromTo($pgdCompetencias),
            'areas' => $areas
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        
        return view('setting.competencia.competenciaCrear', [
            'modulo' => $this->modulo,
            'areas' => $areas
        ]);
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests
     * @return \Illuminate\Http\Response
     */
    public function store(CompetenciaRequest $request)
    {
        $oCompetencia = new Competencia();
        
        $oCompetencia->CPT_NOMBRE = strtolower($request->nombre);
        $oCompetencia->CPT_DESCRIPCION = $request->descripcion;
        $oCompetencia->ARE_CODIGO = $request->area;
        
        $oCompetencia->save();
        
        return redirect()->route('competencia.mostrar', [
            'id' => $oCompetencia->CPT_CODIGO
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
        $oCompetencia = Competencia::findOrFail($id);
        
        return view('setting.competencia.competenciaMostrar', [
            'modulo'  => $this->modulo,
            'competencia'    => $oCompetencia
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
        $oCompetencia = Competencia::findOrFail($id);
        $areas = Area::all();
        
        return view('setting.competencia.competenciaEditar', [
            'modulo' => $this->modulo,
            'competencia'   => $oCompetencia,
            'areas' => $areas
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Inventario\ArticuloRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompetenciaRequest $request, $id)
    {
        $oCompetencia = Competencia::findOrFail($id);
        
        $oCompetencia->CPT_NOMBRE = strtolower($request->nombre);
        $oCompetencia->CPT_DESCRIPCION = $request->descripcion;
        $oCompetencia->ARE_CODIGO = $request->area;
        
        $oCompetencia->save();
        
        return redirect()->route('competencia.mostrar', [
            'id' => $oCompetencia->CPT_CODIGO
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
        $oCompetencia = Competencia::findOrFail($id);
        
        // Se eliminará la competencia si no tiene alguna capacidad o calificación asociada
        if(is_null($oCompetencia->capacidades->first())
            && is_null($oCompetencia->calificaciones->first())){
            
            $oCompetencia->delete();
            
            return redirect()->route('competencia.lista')->with('status', [
                'type'      => 'success',
                'message'   => 'Eliminado exitosamente!!'
            ]);
        }else{
            
            return back()->with('status', [
                'type'      => 'error',
                'message'   => 'Competencia no puede ser eliminado'
            ]);
        }
    }
}
