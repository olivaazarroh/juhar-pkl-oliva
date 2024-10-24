<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Dudi;
use App\Models\Admin\Guru;
use App\Models\Admin\Pembimbing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembimbingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function pembimbing()
    {
        {
            $pembimbings = Pembimbing::with('guru', 'dudi')->get();
            return view('admin.pembimbing', compact('pembimbings'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gurus = Guru::all();
        $dudis = Dudi::all();
        return view('admin.tambah_pembimbing', compact('gurus', 'dudis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'id_guru' => 'required',
        'id_dudi' => 'required',
       ]);

       pembimbing::create([
        'id_guru' => $request->id_guru,
        'id_dudi' => $request->id_dudi,
       ]);

       return redirect()->route('admin.pembimbing')->with('seccess', 'Data Pembimbing Berasil Di Tambah.');
    }

    /**
     * Display 
     * the specified resource.
     */
    public function delete(Request $request,$id)
    {
        $pembimbing = Pembimbing::find($id);

        $pembimbing->delete();

        return redirect()->route('admin.pembimbing')->with('success', 'Data pembimbing Berhasil Di Hapus');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pembimbing = pembimbing::find($id);
        $gurus = Guru::with('pembimbingGuru')->get();
        $dudis = Dudi::with('pembimbingDudi')->get();
        return view('admin.edit_pembimbing', compact('pembimbing', 'gurus', 'dudis'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pembimbing = Pembimbing::find($id);

        $request->validate([
            'id_guru' => 'required',
            'id_dudi' => 'required',
        ]);

        $pembimbing->update([
            'id_guru' => $request->id_guru,
            'id_dudi' => $request->id_dudi,
        ]);
        
        return redirect()->route('admin.pembimbing')->with('success', 'Data pembimbing Berhasil Di Update.');
    }

    public function pembimbingGuru()
    {
        $guru = Auth::guard('guru')->user();
        $pembimbings = pembimbing::where('id_guru', $guru->id_guru)->get();
        return view('guru.pembimbing', compact('pembimbings'));
    }
}

