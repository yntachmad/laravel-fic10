<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSoalRequest;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SoalController extends Controller
{
    public function index(Request $request)
    {


        $soals = DB::table('soals')
            ->when($request->input('soal'), function ($query, $soal) {
                return $query->where('pertanyaan', 'like', '%' . $soal . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pages.soal.index', compact('soals'));
    }

    public function create()
    {
        return view('pages.soal.create');
    }

    public function store(StoreSoalRequest $request)
    {
        $data = $request->all();
        Soal::create($data);
        return redirect()->route('soal.index')->with('success', 'User successfully created');
    }
}
