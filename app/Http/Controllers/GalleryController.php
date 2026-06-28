<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Requests\GalleryRequest;
use Google\Service\Drive\DriveFile;
use Google\Service\Drive;

class GalleryController extends Controller
{
    private function getGoogleDriveService()
    {
        $client = new \Google\Client();
        $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
        $client->refreshToken(env('GOOGLE_DRIVE_REFRESH_TOKEN'));
        return new Drive($client);
    }

    public function upload_photo(GalleryRequest $request)
    {
        $gallery = $request->validated();

        if ($request->hasFile('image')) {
            $service = $this->getGoogleDriveService();

            $fileMetadata = new DriveFile([
                'name' => time() . '_' . $request->file('image')->getClientOriginalName(),
                'parents' => [env('GOOGLE_DRIVE_GALLERY_FOLDER_ID')] 
            ]);

            $content = file_get_contents($request->file('image')->getRealPath());

            $file = $service->files->create($fileMetadata, [
                'data' => $content,
                'mimeType' => $request->file('image')->getMimeType(),
                'uploadType' => 'multipart',
                'fields' => 'id'
            ]);

            $permission = new \Google\Service\Drive\Permission([
                'type' => 'anyone',
                'role' => 'reader'
            ]);
            $service->permissions->create($file->id, $permission);

            $gallery['image'] = $file->id;
            Gallery::create($gallery);

            return redirect()->back()->with('info', 'Success upload to Google Drive Cloud natively!');
        }

        return redirect()->back();
    }

    public function delete_photo($id)
    {
        $photo = Gallery::findOrFail($id);
        $fileId = $photo->image;
        $service = $this->getGoogleDriveService();
        $service->files->delete($fileId);
        $photo->delete();
        return redirect()->back()->with('info', 'Deleting Success!');
    }

    public function gallery()
    {
        $images = Gallery::all();
        return view('admin.gallery',['images'=>$images]);
    }
}



 
