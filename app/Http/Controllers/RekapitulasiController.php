<?php

namespace App\Http\Controllers;

use App\Models\Rekapitulasi;
use Illuminate\Http\Request;
use App\Exports\RekapitulasiExport;
use App\Imports\RekapitulasiImport;
use Maatwebsite\Excel\Facades\Excel;

class RekapitulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekapitulasi = Rekapitulasi::all();
        return view('rekapitulasi.index', compact('rekapitulasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rekapitulasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'jmlh_perekam' => 'required|integer',
            'jmlh_suket' => 'required|integer',
            'jmlh_kia' => 'required|integer',
            'jmlh_ktp' => 'required|integer',
            'penerbitan_akte' => 'required|integer',
        ]);

        Rekapitulasi::create($validatedData);

        return redirect()->route('rekapitulasi.index')->with('success', 'Data rekapitulasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rekapitulasi = Rekapitulasi::findOrFail($id);
        return view('rekapitulasi.show', compact('rekapitulasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rekapitulasi = Rekapitulasi::findOrFail($id);
        return view('rekapitulasi.edit', compact('rekapitulasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'jmlh_perekam' => 'required|integer',
            'jmlh_suket' => 'required|integer',
            'jmlh_kia' => 'required|integer',
            'jmlh_ktp' => 'required|integer',
            'penerbitan_akte' => 'required|integer',
        ]);

        $rekapitulasi = Rekapitulasi::findOrFail($id);
        $rekapitulasi->update($validatedData);

        return redirect()->route('rekapitulasi.index')->with('success', 'Data rekapitulasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rekapitulasi = Rekapitulasi::findOrFail($id);
        $rekapitulasi->delete();

        return redirect()->route('rekapitulasi.index')->with('success', 'Data rekapitulasi berhasil dihapus.');
    }
    public function export()
    {
        return Excel::download(new RekapitulasiExport, 'rekapitulasi.xlsx');
    }

    // Import data
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new RekapitulasiImport, $request->file('file'));

        return redirect()->route('rekapitulasi.index')->with('success', 'Data berhasil diimpor.');
    }
}
