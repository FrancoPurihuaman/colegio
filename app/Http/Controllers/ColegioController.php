<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Colegio;
use App\Http\Requests\setting\ColegioRequest;

class ColegioController extends Controller
{
    
    protected $modulo = 'configuracion';
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $oColegio = Colegio::first();
        
        if ($oColegio) {
            return redirect()->route('colegio.mostrar');
            
        }else{
            return view('setting.colegio.colegioCrear', [
                'modulo' => $this->modulo
            ]);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests
     * @return \Illuminate\Http\Response
     */
    public function store(ColegioRequest $request)
    {
        $oColegio = new Colegio();
        
        $oColegio->CLG_CODIGO_MODULAR = $request->codigo_modular;
        $oColegio->CLG_NOMBRE = $request->nombre;
        $oColegio->CLG_DIRECTOR = $request->director;
        
        if($request->hasFile('logo')){
            $oColegio->CLG_LOGO = $request->file('logo')->store('colegio', 'public');
        }
        
        $oColegio->save();
        
        return redirect()->route('colegio.mostrar', [
            'id' => $oColegio->CLG_CODIGO
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
    public function show()
    {
        $oColegio = Colegio::first();
        
        if ($oColegio) {
            return view('setting.colegio.colegioMostrar', [
                'modulo'        => $this->modulo,
                'colegio'      => $oColegio
            ]);
        }else{
            return redirect()->route('colegio.crear');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $oColegio = Colegio::firstOrFail();
        
        return view('setting.colegio.colegioEditar', [
            'modulo' => $this->modulo,
            'colegio' => $oColegio
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Inventario\ArticuloRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ColegioRequest $request)
    {
        $oColegio = Colegio::firstOrFail();
        
        $oColegio->CLG_CODIGO_MODULAR = $request->codigo_modular;
        $oColegio->CLG_NOMBRE = $request->nombre;
        $oColegio->CLG_DIRECTOR = $request->director;
        
        if($request->hasFile('logo')){
            Storage::disk('public')->delete($oColegio->CLG_LOGO);
            $oColegio->CLG_LOGO = $request->file('logo')->store('colegio', 'public');
        }
        
        $oColegio->save();
        
        return redirect()->route('colegio.mostrar', [
            'id' => $oColegio->CLG_CODIGO
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
        //
    }
}
