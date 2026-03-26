<?php

namespace App\Http\Controllers;

use App\Models\StockMedicamento;
use App\Models\Sede;
use App\Models\Medicamento;
use Illuminate\Http\Request;

class StockMedicamentoController extends Controller
{
    public function index()
    {
        $stocks = StockMedicamento::with('sede', 'medicamento')->get();
        return view('stock-medicamentos.index', compact('stocks'));
    }

    public function create()
    {
        $sedes = Sede::all();
        $medicamentos = Medicamento::all();
        return view('stock-medicamentos.create', compact('sedes', 'medicamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sede_id'       => 'required|exists:sedes,id',
            'medicamento_id'=> 'required|exists:medicamentos,id',
            'stock'         => 'required|integer|min:0',
        ]);
        StockMedicamento::create($request->all());
        return redirect()->route('stock-medicamentos.index')->with('success', 'Stock creado correctamente');
    }

    public function show(StockMedicamento $stockMedicamento)
    {
        return view('stock-medicamentos.show', compact('stockMedicamento'));
    }

    public function edit(StockMedicamento $stockMedicamento)
    {
        $sedes = Sede::all();
        $medicamentos = Medicamento::all();
        return view('stock-medicamentos.edit', compact('stockMedicamento', 'sedes', 'medicamentos'));
    }

    public function update(Request $request, StockMedicamento $stockMedicamento)
    {
        $request->validate([
            'sede_id'       => 'required|exists:sedes,id',
            'medicamento_id'=> 'required|exists:medicamentos,id',
            'stock'         => 'required|integer|min:0',
        ]);
        $stockMedicamento->update($request->all());
        return redirect()->route('stock-medicamentos.index')->with('success', 'Stock actualizado correctamente');
    }

    public function destroy(StockMedicamento $stockMedicamento)
    {
        $stockMedicamento->delete();
        return redirect()->route('stock-medicamentos.index')->with('success', 'Stock eliminado correctamente');
    }
}