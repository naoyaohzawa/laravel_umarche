<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voyage;
use App\Models\Ship;
use Auth; //追加

class DocumentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:owners');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('docu');
        // $voyages = DB::table('voyages')
        // ->join('ships', 'ship_id', '=', 'ships.id')
        // ->where('id', $id)
        // ->get();
        return view('owner.voyages.documents.index');
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
        // dd($id);
        // 航海情報取得
        $voyages = Voyage::where('id', $id)->get();
        // dd($ship_lists);
        $ship_id = $voyages[0]->ship_id;
        // dd($ship_id);

        // 船の情報首都lく
        $ship_lists = Ship::where('id', $ship_id)->get();

        return view('owner.voyages.documents.general_declaration', compact(['ship_lists', 'voyages']));
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

    // general_declarationへのリンク書類
    public function general($id){

        dd($id);
        // 航海情報取得
        $voyages = Voyage::where('id', $id)->get();
        // dd($ship_lists);
        $ship_id = $voyages[0]->ship_id;
        // dd($ship_id);

        // 船の情報首都lく
        $ship_lists = Ship::where('id', $ship_id)->get();

        return view('owner.voyages.documents.general_declaration', compact(['ship_lists', 'voyages']));
    }
}
