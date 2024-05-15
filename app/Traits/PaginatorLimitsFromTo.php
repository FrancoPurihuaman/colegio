<?php 

namespace App\Traits;

use Illuminate\Pagination\LengthAwarePaginator;

trait PaginatorLimitsFromTo
{
    /**
     * Trait retorna array con los limites "from" y "to" del paginador
     * 
     * @param Illuminate\Pagination\LengthAwarePaginator
     * @return array
     */
    public function getPaginatorLimitsFromTo(LengthAwarePaginator $paginator) {
        
        $from = 0;
        $to = 0;
        
        if($paginator->currentPage() <= $paginator->lastPage()){
            $auxStart = (($paginator->currentPage() - 1) * $paginator->perPage()) + 1;
            $from = ($auxStart > $paginator->total()) ? 0 : $auxStart;
            $auxEnd = $auxStart + $paginator->count() - 1;
            $to = ($auxEnd > $paginator->total()) ? 0 : $auxEnd;
        }
        
        return ["from" => $from, "to" => $to];
    }
}