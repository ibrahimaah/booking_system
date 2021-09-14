<?php

namespace App\Http\Controllers\Admin;

use App\Floor;
use App\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        $floors = Floor::all();
        return view('admin.room.index')->withRooms($rooms)->withFloors($floors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $floors = Floor::all();
        return view('admin.room.create')->withFloors($floors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'floor_id' => 'required',
            'number' => 'required',
            'type' => 'required',
            'capacity' => 'required',
        ]);
        
        $room = new Room();
        $room->floor_id = $request->floor_id;
        $room->number = $request->number;
        $room->type = $request->type;
        $room->capacity = $request->capacity;
        $room->note = $request->note;

        if($room->save())
        {
            return back()->with('success','A New Room added successfuly :)');
        }
        else
        {
            return back()->with('faild','Cann\'t add a new Room :(');
        } 
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
        $room = Room::findOrFail($id);
        $floors = Floor::all();
        return view('admin.room.edit')->withRoom($room)->withFloors($floors);;
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
        $request->validate([
            'floor_id' => 'required',
            'number' => 'required',
            'type' => 'required',
            'capacity' => 'required',
        ]);
        
        $room = Room::findOrFail($id);
        $room->floor_id = $request->floor_id;
        $room->number = $request->number;
        $room->type = $request->type;
        $room->capacity = $request->capacity;
        $room->note = $request->note;

        if($room->save())
        {
            return back()->with('success','Room updated successfuly :)');
        }
        else
        {
            return back()->with('faild','Cann\'t update Room :(');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Room::findOrFail($id)->delete();
        return back()->with('success-removed','Room Removed Successfully :)');
    }
}
