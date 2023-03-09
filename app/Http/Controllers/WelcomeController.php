<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
   public function index()
   {
       $url = 'https://s3.' . env('AWS_DEFAULT_REGION') . '.amazonaws.com/' . env('AWS_BUCKET');
       $images = [];
       $files = Storage::disk('s3')->files();      
           foreach ($files as $file) {
               $images[] = [
                  //  'name' => str_replace('/', '', $file),
                   'name' => $file,
                   'src' => $url . $file
               ];
           }

      

       return view('welcome', compact('images'));
      // return view('welcome');
   }
 
   public function store(Request $request)
   {
       $this->validate($request, [
           'video' => 'required|mimes:mp4|max:204800'           
       ]);
 
       if ($request->hasFile('video')) {         
           $file = $request->file('video');
           $name = time() . $file->getClientOriginalName();
           $filePath = '/' . $name;
           Storage::disk('s3')->put($filePath, file_get_contents($file));

        //  $image = Image::create([
        //     'filename' => basename($filePath),
        //     'url' => Storage::disk('s3')->url($filePath)
        // ]);
       }
 
       return back()->withSuccess('Video uploaded successfully');
   }
 
   public function destroy($image)
   {
        Storage::disk('s3')->delete('images/' . $image);
        $image = Image::where('filename', $image)->delete();
        return back()->withSuccess('Image was deleted successfully');
   }
}