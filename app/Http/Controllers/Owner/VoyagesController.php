<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voyage;
use App\Models\Ship;
use App\Models\Image;
use Validator; //この行を上に追加
use Auth; //追加

class VoyagesController extends Controller
{

    // ログイン認証処理ミドルウェア
    public function __construct()
    {
        $this->middleware('auth:owners');
    }

    public function index()
    {
        // $allvoyages2 = Voyage::all();
        // dd($allvoyages2);

        // $allVoyages = Ship::with('voyages')->get();
        // dd($allVoyages->voyages->ship_id);
        $voyages = Voyage::get();
        // dd($ships);




        return view('owner.voyages.index', compact('voyages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 航海情報取得
        $voyages = Voyage::where('id', $id)->get();
        // dd($ship_lists);
        $ship_id = $voyages[0]->ship_id;
        // dd($ship_id);

        // 船の情報首都lく
        $ship_lists = Ship::where('id', $ship_id)->get();

        // 画像urlの取得
        $voyage_id = $voyages[0]->id;
        $images = Image::where('voyage_id', $voyage_id)->get();

        return view('owner.voyages.detail', compact(['ship_lists', 'voyages', 'images']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
