<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
     public function index(){
        $banner = Banner::all();
        return view('banner.index', compact('banner'));
     }
     public function create(){
        $banner =  Banner::query();
        return view('banner.create',compact('banner'));

    }
    public function store(Request $request)
    {
        // Validate dữ liệu từ form
    
          $input = $request->all();
   
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
     
        Banner::create($input);

        // Tạo mới sản phẩm


        // Chuyển hướng về trang danh sách sản phẩm sau khi đã thêm thành công
        return redirect()->route('banners.index')
        ->with('success','Product updated successfully');
    }


        public function edit($id){
            $banner=  Banner::findOrFail($id);
            return view('banner.edit',compact('banner'));
        }
        public function update(Request $request, Banner $banner){
            $input = $request->all();
       
            if ($image = $request->file('image')) {
                $destinationPath = 'images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['image'] = $profileImage;
            }
             
            $banner->update($input);
            return redirect()->route('banner.index')
            ->with('success', 'Product updated successfully');
         } 
        

        public function destroy(Banner $banner){
            $banner->delete();
            return back();

        }

}
