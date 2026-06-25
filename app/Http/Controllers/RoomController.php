<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function create_room()
    {
        return view('admin.create_room');
    }

    public function store_room(StoreRoomRequest $request)
    {
        $valiRoom = $request->validated();
        $name =$valiRoom['room_name'] . '-' .time(). '.' . $request->file('image')->getClientOriginalExtension();
        $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(), [
            'folder' => 'rooms'
        ])->getSecurePath(); 
        
        $valiRoom['image'] =$uploadedFileUrl;
        Room::create($valiRoom);
        return redirect()->back()->with('info','Success Creating Room');
    }

    public function view_room()
    {
        $rooms = Room::all();
        return view('admin.view_room',['rooms'=>$rooms]);
    }

    public function edit_room($id)
    {   
        $room = Room::find($id);
        return view('admin.edit_room',['room'=>$room]);
    }

    public function update_room(UpdateRoomRequest $request,$id)
    {
        $valiRoom =$request->validated();
        $room =Room::find($id);
        if(request()->hasFile('image'))
            {
                Storage::disk('public')->delete($room->image);
                $name =$room->room_name.'-'. time() . '.'. request()->file('image')->getClientOriginalExtension();
                request()->file('image')->storeAs('rooms',$name,'public');
                $valiRoom['image'] ='rooms/'.$name;
            }
        $room->update($valiRoom);
        return redirect()->back()->with('info','Updating room success');
    }

     public function delete_room($id)
    {
        $room =Room::find($id);
        Storage::disk('public')->delete($room->image);
        $room->delete();
        return redirect()->back()->with('info','Deleting room success');
    }
}

