<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use Illuminate\Database\QueryException;

class CustomVoyagerController extends VoyagerBaseController
{
    public function destroy(Request $request, $id)
    {
        try {
            return parent::destroy($request, $id);

        } catch (QueryException $e) {

            // 23000 = error de integridad (FK)
            if ($e->getCode() == 23000) {

                // Opcional: detectar error exacto MySQL 1451
                if (isset($e->errorInfo[1]) && $e->errorInfo[1] == 1451) {
                    $mensaje = 'No puedes eliminar este registro porque está siendo utilizado en otros datos.';
                } else {
                    $mensaje = 'No se puede eliminar el registro.';
                }

                return redirect()->back()->with([
                    'message' => $mensaje,
                    'alert-type' => 'error',
                ]);
            }

            return redirect()->back()->with([
                'message' => 'Error inesperado.',
                'alert-type' => 'error',
            ]);
        }
    }
}
