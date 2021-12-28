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
        $voyages = Voyage::paginate(3);
        // dd($ships);




        return view('owner.voyages.index', compact('voyages'));
    }

    
    // 航路作成画面
    public function create()
    {
        $owner_id = Auth::id();
        $ships = Ship::where('owner_id', $owner_id)->get();
        return view('owner.voyages.create', compact('ships'));
    }


    // public function confirm(Request $request)
    // {
    //     dd("作成画面です");
    //     return view('owner.voyages.create_confirm');
    // }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        
        $input_voyage_data = new Voyage;
        $input_voyage_data->ship_id = 2;
        $input_voyage_data->owner_id = Auth::id();
        $input_voyage_data->itinerary_number = $request->itinerary_number;
        $input_voyage_data->operator_name = $request->operator_name;
        $input_voyage_data->operator_id = 2;
        $input_voyage_data->cargo_company_name = $request->cargo_company_name;
        $input_voyage_data->cargo_company_id = 3;        
        $input_voyage_data->owner_company_name = $request->cargo_company_name;
        $input_voyage_data->owner_company_id = 1;        
        $input_voyage_data->cargo_description = $request->cargo_description;
        $input_voyage_data->cargo_amount = $request->cargo_amount;
        $input_voyage_data->planned_loading_port = $request->planned_loading_port;
        $input_voyage_data->planned_discharging_port = $request->planned_discharging_port;
        $input_voyage_data->planned_loading_date = $request->planned_loading_date;
        $input_voyage_data->planned_discharging_date = $request->planned_discharging_date;

        // $input_voyage_data->arrived_port_date = null;
        // $input_voyage_data->loading_started_date = null;
        // $input_voyage_data->loading_completed_date = null;
        // $input_voyage_data->loading_port_disported_date = null;
        // $input_voyage_data->discharging_port_arrived_date = null;
        // $input_voyage_data->discharging_start_date = null;
        // $input_voyage_data->discharging_complete_date = null;
        // $input_voyage_data->discharging_port_disported_date = null;
        // $input_voyage_data->complete_flag = null;
        
        $input_voyage_data->save();

        $voyages = Voyage::get();
        return view('owner.voyages.index', compact('voyages'));
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
