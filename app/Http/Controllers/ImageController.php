<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;


use App\Image;
use App\Product;


class ImageController extends Controller

{

      function index()
         {
            return view('image');
        }


       function upload(Request $request)
       {

        $image = $request->file('file');

        $imageName = time() . '.' . $image->extension();

        $imageName = $image->getClientOriginalName();

        $image->move(public_path('images'), $imageName);

        Image::create([
            'filename'=>time().$imageName
        ]);

        return response()->json(['success' => $imageName]);


       }

       function fetch()
       {
        $images = \File::allFiles(public_path('images'));
        $output = '<div class="row">';
        foreach($images as $image)
        {
         $output .= '
         <div class="col-md-2" style="margin-bottom:16px;" align="center">
                   <img src="'.asset('images/' . $image->getFilename()).'" class="img-thumbnail" width="175" height="175" style="height:175px;" />
                   <button type="button" class="btn btn-link remove_image" id="'.$image->getFilename().'">Remove</button>
               </div>
         ';
        }
        $output .= '</div>';
        echo $output;
       }

       function delete(Request $request)
       {
        if($request->get('name'))
        {
            Image::destroy($request->get('name'));
         \File::delete(public_path('images/' . $request->get('name')));
        }
    }

}




