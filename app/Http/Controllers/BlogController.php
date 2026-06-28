<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Google\Service\Drive;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Google\Service\Drive\DriveFile;

class BlogController extends Controller
{
    private function getGoogleDriveService()
    {
        $client = new \Google\Client();
        $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
        $client->refreshToken(env('GOOGLE_DRIVE_REFRESH_TOKEN'));
        return new Drive($client);
    }

    public function blog()
    {
        $blogs = Blog::all();
        return view('admin.blog',['blogs'=>$blogs]);
    }

    public function create_blog(StoreBlogRequest $request)
    {
        $storeBlog = $request->validated();
        if ($request->hasFile('image')) {
            $service = $this->getGoogleDriveService();

            $fileMetadata = new DriveFile([
                'name' => time() . '_' . $request->file('image')->getClientOriginalName(),
                'parents' => [env('GOOGLE_DRIVE_BLOG_FOLDER_ID')] 
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

            $storeBlog['image'] = $file->id;
            Blog::create($storeBlog);
            return redirect()->back()->with('info','Success Upload Blog!');
        }
    }

    public function edit_blog($id)
    {
        $blog =Blog::find($id);
        return view('admin.edit_blog',['blog'=>$blog]);
    }

    public function update_blog(UpdateBlogRequest $request, $id)
    {
        $valiBlog = $request->validated();
        $blog = Blog::find($id);
        if ($request->hasFile('image')) {

            $service = $this->getGoogleDriveService();
            $fileId = $valiBlog->image;
            $service->files->delete($fileId);

            $fileMetadata = new DriveFile([
                'name' => time() . '_' . $request->file('image')->getClientOriginalName(),
                'parents' => [env('GOOGLE_DRIVE_BLOG_FOLDER_ID')] 
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
            $valiBlog['image']=$file->id;
        }
        $blog->update($valiBlog);
        return redirect()->back()->with('info','Updating success');
    }


    public function delete_blog($id)
    {
        $blog = Blog::find($id);
        $service = $this->getGoogleDriveService();
        $fileId = $blog->image;
        $service->files->delete($fileId);
        $blog->delete();
        return redirect()->back()->with('info','Deleting Success');
    }
}
