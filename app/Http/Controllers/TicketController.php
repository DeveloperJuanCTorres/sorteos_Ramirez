<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Raffle;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TicketsExport;

class TicketController extends Controller
{
    public function index()
    {
        $empresa = Company::first();
        return view('tickets', compact('empresa')); // sin datos al inicio
    }

    public function buscar(Request $request)
    {
        $empresa = Company::first();
        $dni = $request->dni;

        $tickets = Ticket::with('sorteo')
                    ->where('dni', $dni)
                    ->orderBy('id', 'desc')
                    ->get();

        // separar por estado
        $aprobados = $tickets->where('aprobado', 1);
        $pendientes = $tickets->where('aprobado', 0);

        // NUEVO
        $activos = $tickets->filter(function ($ticket) {

            if (!$ticket->sorteo) {
                return false;
            }

            return $ticket->sorteo->active == 1
                && \Carbon\Carbon::parse($ticket->sorteo->date)->gte(now());
        });

        $sinResultados = $tickets->isEmpty();

        return view('tickets', compact('tickets', 'aprobados', 'pendientes', 'activos', 'empresa', 'sinResultados'))->with('busqueda', true);
    }

    public function store(Request $request)
    {

        $request->validate([
            'tipo_documento' => 'required|in:dni,ce,pasaporte',

            'numero_documento' => [
                'required',
                'string',
                function ($attr, $value, $fail) use ($request) {
                    if ($request->tipo_documento === 'dni' && !preg_match('/^\d{7,8}$/', $value)) {
                        $fail('El DNI debe tener 7 u 8 dígitos.');
                    }
                    if ($request->tipo_documento === 'ce' && strlen($value) < 9) {
                        $fail('Carnet inválido.');
                    }
                    if ($request->tipo_documento === 'pasaporte' && strlen($value) < 6) {
                        $fail('Pasaporte inválido.');
                    }
                }
            ],

            'nombres' => 'required|regex:/^[\pL\s]+$/u',
            'apellidos' => 'required|regex:/^[\pL\s]+$/u',

            'telefono' => 'required|digits:9',

            'departamento' => 'required|string',

            'comprobante' => 'required|file|mimes:jpg,jpeg,png|max:2048', // 2MB

            'raffle_id' => 'required|exists:raffles,id',
            'cantidad'  => 'required|integer|min:1|max:100',
        ]);

        $sorteo = Raffle::findOrFail($request->raffle_id);

        // Guardar archivo
        $rutaComprobante = null;

        if ($request->hasFile('comprobante')) {
            $rutaComprobante = $request->file('comprobante')->store('comprobantes', 'public');
        }

        Ticket::create([
            'sorteo_id'   => $sorteo->id,
            'dni'         => $request->numero_documento,
            'nombres'     => $request->nombres,
            'apellidos'   => $request->apellidos,
            'telefono'    => $request->telefono,
            'departamento'=> $request->departamento,
            'comprobante' => $rutaComprobante,
            'aprobado'    => 0,
            'cantidad'    => $request->cantidad
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Registro enviado correctamente'
        ]);
    }

    public function exportView()
    {
        $empresa = Company::first();
        $sorteos = Raffle::orderBy('date', 'desc')->get();
        return view('tickets.export', compact('sorteos', 'empresa'));
    }

    public function exportPrint(Request $request)
    {
        $tickets = Ticket::where('sorteo_id', $request->raffle_id)
            ->where('aprobado', 1)
            ->get();

        return view('tickets.print', compact('tickets'));
    }

    public function exportThermal(Request $request)
    {
        $tickets = Ticket::where('sorteo_id', $request->raffle_id)
            ->where('aprobado',1)
            ->get();

        return view('tickets.thermal',compact('tickets'));
    }

    public function exportExcel(Request $request)
    {
        return Excel::download(new TicketsExport($request->raffle_id), 'tickets.xlsx');
    }
}
