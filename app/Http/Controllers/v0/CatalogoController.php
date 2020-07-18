<?php

namespace App\Http\Controllers\v0;

use App\Exports\JornadasExport;
use App\Http\Controllers\Controller;
use App\Models\Catalogo;
use App\Models\DocenteActividad;
use App\Models\DocenteAsistencia;
use App\Models\JornadaActividad;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CatalogoController extends Controller
{
    public function obtenerCatalogos(Request $request)
    {
        $catalogos = Catalogo::where('tipo', $request->tipo)->orderBy('nombre')->get();
        return response()->json(['catalogos' => $catalogos], 200);

    }
}
