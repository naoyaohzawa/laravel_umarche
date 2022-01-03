<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ship;
use Validator; //この行を上に追加
use Auth; //追加

class ShipsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:owners');
    }
    
    public function index()
    {
        

        $ships = Ship::get();
        // dd($ships);
        return view('owner.ships.index', compact('ships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('owner.ships.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        //バリデーション 
        $validator = Validator::make($request->all(), [
            'vessel_name' => 'required|max:255',
            'owner_name' => 'required|max:255',
            'vessel_type' => 'required|max:255',
            'gross_ton' => 'required|max:255',
            'dwt' => 'required|max:255',
            'mmsi' => 'required|max:255',
            'call_number' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('owner.ships.create')
                ->withInput()
                ->withErrors($validator);
        }

        $ships = new Ship;
        $ships->vessel_name = $request->vessel_name;
        $ships->owner_name = $request->owner_name;
        $ships->vessel_type = $request->vessel_type;
        $ships->gross_ton = $request->gross_ton;
        $ships->dwt = $request->dwt;
        $ships->mmsi = $request->mmsi;
        $ships->call_number = $request->call_number;
        $ships->owner_company_id = 2;
        $ships->owner_id = $request->user()->id;
        $ships->save();

        return redirect()->route('owner.ships.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ship = Ship::findorFail($id);
        // dd($ship);
        return view('owner.ships.edit', compact('ship'));
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

        // dd($request);
        // dd($id);
        $ships = Ship::find($id);
        $ships->vessel_name = $request->vessel_name;
        $ships->owner_name = $request->owner_name;
        $ships->vessel_type = $request->vessel_type;
        $ships->gross_ton = $request->gross_ton;
        $ships->dwt = $request->dwt;
        $ships->mmsi = $request->mmsi;
        $ships->call_number = $request->call_number;
        $ships->owner_company_id = 2;
        $ships->owner_id = Auth::id();
        $ships->save();

        return redirect()->route('owner.ships.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $ship = Ship::where('id', $id);
        // dd($ship);
        $ship->delete();

        return redirect()->route('owner.ships.index');
    }
}
