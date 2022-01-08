<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voyage;
use App\Models\Ship;
use App\Models\Image;
use App\Models\User;
use Validator; //この行を上に追加
use Auth; //追加
use Illuminate\Support\Facades\DB; //クエリビルダー

class VoyagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id = Auth::id();
        // dd($user_id);
        $users = User::where('id', $user_id)->get();
        // dd($users);
        $operator_company_id = $users[0]->operator_company_id;
        // dd($operator_company_id);

        $voyages = DB::table('voyages')
        ->join('ships', 'ship_id', '=', 'ships.id')
        ->where('voyages.operator_id', '=', $operator_company_id)
        ->orderBy('planned_loading_date', 'desc')
        ->paginate(10);

        return view('user.voyages.index', compact('voyages'));
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

        return view('user.voyages.detail', compact(['ship_lists', 'voyages', 'images']));
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
