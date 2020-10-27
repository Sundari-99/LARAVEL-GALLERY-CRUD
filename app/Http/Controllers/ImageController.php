<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use DB;
use ZipArchive;
use File;


class ImageController extends Controller
{
    public function index()
    {
        return view('image');
    }
    public function store(Request $request)
    {
        $image = new Image();
        
        $image->name = $request->input('name');
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' .$extension;
            $file->move('uploads/image/',$filename);
            $image->image=$filename;
        }
        else{
            return $request;
            $image->image='';
        }
        $image->save();
        return redirect('imgpage')->with('image',$image);
        
    }
    public function display()
    {
        $images = Image::paginate(2);
        return view('imageform')->with('images',$images);
    }
     public function edit($id)
     {
         $images = Image::find($id);
         return view('updateform')->with('images',$images);
     }
     public function update(Request $request,$id)
     {
        $images = Image::find($id); 
        
        $images->name = $request->input('name');
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' .$extension;
            $file->move('uploads/image/',$filename);
            $images->image=$filename;
        }
        
        $images->save();
        return redirect('imgpage')->with('images',$images);

     }
     public function delete($id)
     {
         $images = Image::find($id);
         $images->delete();
         return redirect('/imgpage')->with('images',$images);
     }
     public function download($images)
     {
         return response()->download('uploads/image/'.$images);
     }
     public function zipFile()
     {
         $zip = new ZipArchive;
         $fileName = 'myzip.zip';
         if($zip->open(public_path($fileName),ZipArchive::CREATE) === TRUE)
         {
             $files = File::files(public_path('uploads/image/'));
             foreach($files as $key => $value){
                 $relativeNameInZipFile = basename($value);
                 $zip->addFile($value,$relativeNameInZipFile);
             }
             $zip->close();
         }
         return response()->download(public_path($fileName));
     }

     
     
}
