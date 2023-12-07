<?php

namespace App\Http\Controllers\Api;

use App\Models\Soal;
use App\Models\Ujian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SoalResource;
use App\Models\UjianSoalList;

class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function createUjian(Request $request)
    {
        $soalAngka = Soal::where('kategori', 'Numeric')->inRandomOrder()->limit(10)->get();
        $soalVerbal = Soal::where('kategori', 'Verbal')->inRandomOrder()->limit(10)->get();
        $soalLogika = Soal::where('kategori', 'Logika')->inRandomOrder()->limit(10)->get();

        $ujian = Ujian::create([
            'user_id' => $request->user()->id,
            // 'nilai_angka' => 0,
            // 'nilai_verbal' => 0,
            // 'nilai_logika' => 0,
            // 'hasil' => 'belum selesai'
        ]);

        foreach ($soalAngka as $soal) {
            UjianSoalList::create([
                'ujian_id' => $ujian->id,
                'soal_id' => $soal->id
            ]);
        }
        foreach ($soalVerbal as $soal) {
            UjianSoalList::create([
                'ujian_id' => $ujian->id,
                'soal_id' => $soal->id
            ]);
        }
        foreach ($soalLogika as $soal) {
            UjianSoalList::create([
                'ujian_id' => $ujian->id,
                'soal_id' => $soal->id
            ]);
        }

        return response()->json([
            'message' => 'Ujian berhasil dibuat',
            'data' => $ujian
        ]);
    }

    public function getListSoalByKategori(Request $request)
    {
        $ujian = Ujian::where('user_id', $request->user()->id)->first();
        $ujianSoalList = UjianSoalList::where('ujian_id', $ujian->id)->get();

        $ujianSoalListId = [];
        foreach ($ujianSoalList as $soal) {
            array_push($ujianSoalListId, $soal->soal_id);
        }

        $soal = Soal::whereIn('id', $ujianSoalListId)->where('kategori', $request->kategori)->get();

        return response()->json([
            'message' => 'Berhasil mendapatkan soal',
            'data' => SoalResource::collection($soal)
            // 'data' => $soal
        ]);
    }

    //Jawab Soal
    public function jawabSoal(Request $request)
    {
        $validateData = $request->validate([
            'soal_id' => 'required',
            'jawaban' => 'required'
        ]);

        $ujian = Ujian::where('user_id', $request->user()->id)->first();
        $ujianSoalList = UjianSoalList::where('ujian_id', $ujian->id)->where('soal_id', $validateData['soal_id'])->first();
        $soal = Soal::where('id', $validateData['soal_id'])->first();

        if ($soal->kunci == $validateData['jawaban']) {
            $ujianSoalList->kebenaran = true;
            $ujianSoalList->save();
        } else {
            $ujianSoalList->kebenaran = false;
            $ujianSoalList->save();
        }
    }
}
