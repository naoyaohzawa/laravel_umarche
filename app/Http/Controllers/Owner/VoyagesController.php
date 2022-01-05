<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voyage;
use App\Models\Ship;
use App\Models\Image;
use App\Models\Owner;
use Validator; //この行を上に追加
use Auth; //追加
use Illuminate\Support\Facades\DB; //クエリビルダー

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
        // $voyages = Voyage::all()->from('voyages as v')->join('ships as s', function($join){
        //     $join->on('s.id', '=', 'v.ship_id');
        // })->paginate(5);
        // dd($ships);

        $owner_id = Auth::id();
        // dd($owner_id);
        $owners = Owner::where('id', $owner_id)->get();
        $owner_company_id = $owners[0]->owner_company_id;
        // dd($owner_company_id);

        $voyages = DB::table('voyages')
        ->join('ships', 'ship_id', '=', 'ships.id')
        ->where('voyages.owner_company_id', '=', $owner_company_id)
        ->orderBy('planned_loading_date', 'desc')
        ->paginate(10);

        // dd($voyages);
        
        // dd($voyages);


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

        $voyages = DB::table('voyages')
        ->join('ships', 'ship_id', '=', 'ships.id')
        ->orderBy('planned_loading_date', 'desc')
        ->paginate(10);
        
        // dd($voyages);


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
        $voyage = Voyage::findorFail($id);
        // dd($voyage);
        $ship_lists = Ship::where('id', $voyage->ship_id)->get();
        
        
        return view('owner.voyages.edit', compact('voyage'));
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
        // dd($request);
        $input_voyage_data = Voyage::findorFail($id);
        // $input_voyage_data->ship_id = 2; 
        // $input_voyage_data->owner_id = Auth::id();
        $input_voyage_data->itinerary_number = $request->itinerary_number;
        $input_voyage_data->operator_name = $request->operator_name;
        // $input_voyage_data->operator_id = 2;
        $input_voyage_data->cargo_company_name = $request->cargo_company_name;
        // $input_voyage_data->cargo_company_id = 3;        
        $input_voyage_data->owner_company_name = $request->cargo_company_name;
        // $input_voyage_data->owner_company_id = 1;        
        $input_voyage_data->cargo_description = $request->cargo_description;
        $input_voyage_data->cargo_amount = $request->cargo_amount;
        $input_voyage_data->planned_loading_port = $request->planned_loading_port;
        $input_voyage_data->planned_discharging_port = $request->planned_discharging_port;
        $input_voyage_data->planned_loading_date = $request->planned_loading_date;
        $input_voyage_data->planned_discharging_date = $request->planned_discharging_date;
        $input_voyage_data->arrived_port_date = $request->arrived_port_date;
        $input_voyage_data->loading_started_date = $request->loading_started_date;
        $input_voyage_data->loading_completed_date = $request->loading_completed_date;
        $input_voyage_data->loading_port_disported_date = $request->loading_port_disported_date;
        $input_voyage_data->discharging_port_arrived_date = $request->discharging_port_arrived_date;
        $input_voyage_data->discharging_start_date = $request->discharging_start_date;
        $input_voyage_data->discharging_complete_date = $request->discharging_complete_date;
        $input_voyage_data->discharging_port_disported_date = $request->discharging_port_disported_date;
        $input_voyage_data->complete_flag = $request->complete_flag;
        $input_voyage_data->save();
        
        // $voyages = DB::table('voyages')
        // ->join('ships', 'ship_id', '=', 'ships.id')
        // ->orderBy('planned_loading_date', 'desc')
        // ->paginate(10);

        // dd($voyages);

        return redirect()->route('owner.voyages.show', [$id]);
        // return view('owner.voyages.index', compact('voyages'));
        
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

    public function shipinfo($id){

        $ship_lists = Ship::where('id', $id)->get();
        return view('owner.voyages.shipinfo', compact('ship_lists'));
    }
}
