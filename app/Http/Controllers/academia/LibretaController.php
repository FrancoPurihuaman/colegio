<?php

namespace App\Http\Controllers\academia;

use Illuminate\Http\Request;
use App\Traits\PaginatorLimitsFromTo;
use App\Models\Clase;
use App\Http\Controllers\direccion\ModDireccionController;

class LibretaController extends ModDireccionController
{
    use PaginatorLimitsFromTo;
    
    protected $modulo = 'reportes';
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//         $codigo = $request->query('filter_codigo', '');
//         $nombre = $request->query('filter_nombre', '');
//         $codigoDigemid = $request->query('filter_cod_digemid', '');
//         $categoria = $request->query('filter_categoria', -1);
        
        $message = [];          // Mensaje para usuario
//         $errorFiltros = [];     // Errores en los datos de filtro
        
//         // Condiciones para mostrar articulos
        $oClase = new Clase();
//         if ($codigo != '') {
//             if(is_numeric($codigo) && $codigo >= 1 ){
//                 $oArticulo = $oArticulo->where('ART_CODIGO', '=', $codigo);
//             }else{$errorFiltros['codigo'] = "valor de codigo invalido";}
//         }
//         if($nombre != ''){
//             $oArticulo = $oArticulo->where('ART_NOMBRE', 'LIKE', $nombre.'%');
//         }
//         if($codigoDigemid != '') {
//             $oArticulo = $oArticulo->where('ART_COD_DIGEMID', '=', $codigoDigemid);
//         }
//         if($categoria != '' && is_numeric($categoria) && $categoria >= 1) {
//             $oArticulo = $oArticulo->where('CAT_CODIGO', '=', $categoria);
//         }
        
//         // Obtener paginador y agregamos la cadena de consulta al paginador
        $paginatorClase = $oClase->with('area')->orderBy('CLS_CODIGO', 'desc')->paginate(25)->withQueryString();
        
        // Obtenemos las categorias de articulo
//         $clases = Clase::all();
        
        // Agregar errores de filtro si los hubiera
//         if ($errorFiltros) {
//             $message = [
//                 'type'      => 'error',
//                 'message'   => 'Filtros invalidos',
//                 'details'   => $errorFiltros
//             ];
//         }
        
        // Enviar valores de consulta
//         $request->flash();
        
        return view('reports.libreta', [
            'modulo' => $this->modulo,
            'paginatorClases' => $paginatorClase,
            'paginatorClasesLimits' => $this->getPaginatorLimitsFromTo($paginatorClase),
//             'clases' => $clases,
            'message' => $message
        ]);
    }
    
    
    
    
    
    
    
    /**
     * Display a listing of the resource.
     * 
     * @param  int  $idClase
     * @return \Illuminate\Http\Response
     */
    public function porEstudiante(Request $request, $idClase)
    {
//         $codigo = $request->query('filter_codigo', '');
//         $nombre = $request->query('filter_nombre', '');
//         $codigoDigemid = $request->query('filter_cod_digemid', '');
//         $categoria = $request->query('filter_categoria', -1);
        
        $message = [];          // Mensaje para usuario
//         $errorFiltros = [];     // Errores en los datos de filtro
        
//         // Condiciones para mostrar articulos
        $oClase = Clase::with('matriculas.estudiante')->find($idClase);dd($oClase);
//         if ($codigo != '') {
//             if(is_numeric($codigo) && $codigo >= 1 ){
//                 $oArticulo = $oArticulo->where('ART_CODIGO', '=', $codigo);
//             }else{$errorFiltros['codigo'] = "valor de codigo invalido";}
//         }
//         if($nombre != ''){
//             $oArticulo = $oArticulo->where('ART_NOMBRE', 'LIKE', $nombre.'%');
//         }
//         if($codigoDigemid != '') {
//             $oArticulo = $oArticulo->where('ART_COD_DIGEMID', '=', $codigoDigemid);
//         }
//         if($categoria != '' && is_numeric($categoria) && $categoria >= 1) {
//             $oArticulo = $oArticulo->where('CAT_CODIGO', '=', $categoria);
//         }
        
//         // Obtener paginador y agregamos la cadena de consulta al paginador
        $paginatorClase = $oClase->with('area')->orderBy('CLS_CODIGO', 'desc')->paginate(25)->withQueryString();
        
        // Obtenemos las categorias de articulo
//         $clases = Clase::all();
        
        // Agregar errores de filtro si los hubiera
//         if ($errorFiltros) {
//             $message = [
//                 'type'      => 'error',
//                 'message'   => 'Filtros invalidos',
//                 'details'   => $errorFiltros
//             ];
//         }
        
        // Enviar valores de consulta
//         $request->flash();
        
        return view('reports.libreta', [
            'modulo' => $this->modulo,
            'paginatorClases' => $paginatorClase,
            'paginatorClasesLimits' => $this->getPaginatorLimitsFromTo($paginatorClase),
//             'clases' => $clases,
            'message' => $message
        ]);
    }
}
