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
        $soalAngka = Soal::where('kategori', 'Numeric')->inRandomOrder()->limit(20)->get();
        $soalVerbal = Soal::where('kategori', 'Verbal')->inRandomOrder()->limit(20)->get();
        $soalLogika = Soal::where('kategori', 'Logika')->inRandomOrder()->limit(20)->get();

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
        if(!$ujian){
            return response()->json([
             'message' => 'Ujian tidak ditemukan',
             'data' => []
            ], 200);

        };
        $ujianSoalList = UjianSoalList::where('ujian_id', $ujian->id)->get();
        $ujianSoalListId = $ujianSoalList->pluck('soal_id');

        // dd($ujianSoalListId);

        // $ujianSoalListId = [];
        // foreach ($ujianSoalList as $soal) {
        //     array_push($ujianSoalListId, $soal->soal_id);
        // }

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
        if(!$ujian){
            return response()->json([
             'message' => 'Ujian tidak ditemukan1',
             'data' => []
            ], 200);

        };


        $ujianSoalList = UjianSoalList::where('ujian_id', $ujian->id)->where('soal_id', $validateData['soal_id'])->first();
        $soal = Soal::where('id', $validateData['soal_id'])->first();

        if ($soal->kunci == $validateData['jawaban']) {
            $ujianSoalList->kebenaran = true;
            $ujianSoalList->save();
        } else {
            $ujianSoalList->kebenaran = false;
            $ujianSoalList->save();
        }

        return response()->json([
            'message' => 'Berhasil simpan jawaban',
            'jawaban' => $ujianSoalList->kebenaran
        ],200);
    }

    public function hitungNilaiUjianByKategori(Request $request)
    {
        $kategori = $request->kategori;
        $ujian = Ujian::where('user_id', $request->user()->id)->first();
        if(!$ujian){
            return response()->json([
             'message' => 'Ujian tidak ditemukan2',
             'data' => []
            ], 200);

        };

        $ujianSoalList = UjianSoalList::where('ujian_id', $ujian->id)->get();
        // $ujianSoalListId = $ujianSoalList->pluck('soal_id');

        $ujianSoalList = $ujianSoalList->filter(function ($value,$key) use($kategori){
            return $value->soal->kategori == $kategori;
        });

        $totalBenar  = $ujianSoalList->where('kebenaran', true)->count();
        $totalSoal = $ujianSoalList->count();
        $nilai = ($totalBenar / $totalSoal) * 100;

        // $nilai = 10;

        // // dd($nilai);

        $kategori_field = 'nilai_verbal';
        if ($kategori == 'Logika') {
            $kategori_field = 'nilai_logika';
        }elseif($kategori == 'Numeric'){
            $kategori_field = 'nilai_angka';
        }

        $ujian->update([
            $kategori_field => $nilai,
        ]);


        return response()->json([
            'message' => 'Berhasil Mendapatkan Nilai',
            'nilai' => $nilai
        ],200);

    }
}
