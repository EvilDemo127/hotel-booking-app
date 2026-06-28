<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Google\Service\Drive\Permission;
use Google\Service\Drive\DriveFile;
use Google\Service\Drive;


class RoomController extends Controller
{
    private function getGoogleDriveService()
    {
        $client = new \Google\Client();
        $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
        $client->refreshToken(env('GOOGLE_DRIVE_REFRESH_TOKEN'));
        return new Drive($client);
    }
    
    public function create_room()
    {
        return view('admin.create_room');
    }


    public function store_room(StoreRoomRequest $request)
    {
        $valiRoom = $request->validated();
        if ($request->hasFile('image')) {
            $service = $this->getGoogleDriveService();

            $fileMetadata = new DriveFile([
                'name' => time() . '_' . $request->file('image')->getClientOriginalName(),
                'parents' => [env('GOOGLE_DRIVE_ROOM_FOLDER_ID')] 
            ]);

            $content = file_get_contents($request->file('image')->getRealPath());

            $file = $service->files->create($fileMetadata, [
                'data' => $content,
                'mimeType' => $request->file('image')->getMimeType(),
                'uploadType' => 'multipart',
                'fields' => 'id'
            ]);

            $permission = new Permission([
                'type' => 'anyone',
                'role' => 'reader'
            ]);
            $service->permissions->create($file->id, $permission);

            $valiRoom['image'] = $file->id;
            Room::create($valiRoom);

            return redirect()->back()->with('info', 'Success create room!');
        }

        return redirect()->back();
    }


    public function view_room()
    {
        $rooms = Room::all();
        return view('admin.view_room',['rooms'=>$rooms]);
    }

    public function detail_room($id)
    {
        $room = Room::find($id);
        return view('admin.room_detail',['room'=>$room]);
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
                $service = $this->getGoogleDriveService();

                $roomID =$room->image;
                $service =$this->getGoogleDriveService();
                $service->files->delete($roomID);

                $fileMetadata = new DriveFile([
                    'name' => time() . '_' . $request->file('image')->getClientOriginalName(),
                    'parents' => [env('GOOGLE_DRIVE_ROOM_FOLDER_ID')] 
                ]);

                $content = file_get_contents($request->file('image')->getRealPath());

                $file = $service->files->create($fileMetadata, [
                    'data' => $content,
                    'mimeType' => $request->file('image')->getMimeType(),
                    'uploadType' => 'multipart',
                    'fields' => 'id'
                ]);

                $permission = new Permission([
                    'type' => 'anyone',
                    'role' => 'reader'
                ]);
                $service->permissions->create($file->id, $permission);

                $valiRoom['image'] = $file->id;
            }
        $room->update($valiRoom);
        return redirect()->back()->with('info','Updating room success');
    }

     public function delete_room($id)
    {
        $room =Room::find($id);
        $roomID =$room->image;
        $service =$this->getGoogleDriveService();
        $service->files->delete($roomID);
        $room->delete();
        return redirect()->back()->with('info','Deleting room success');
    }
}

