<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function viewBanners(){
        $banners = Banner::get();
        return view('admin.banners.view-banner' , ['banners' => $banners]);
    }

    public function addBanner(Request $req){
        if ($req->isMethod('post')) {
            $data = $req->all();

            $banner = new Banner();
            $banner->name = $data['banner_name'];
            $banner->textStyle = $data['text_style'];
            $banner->content= $data['content'];
            $banner->link = $data['link'];
            $banner->sortOrder= $data['sort_order'];
            if ($req->hasFile('image')) {
                echo $imp_tmp = $req->file('image');
                if ($imp_tmp->isValid()) {
                    $extension = $imp_tmp->getClientOriginalExtension();
                    $fileName = rand(111, 99999) . '.' . $extension;
                    $imgPath = 'uploads/banners/' . $fileName;
                    Image::make($imp_tmp)->resize(500, 500)->save($imgPath);
                    $banner->image = $fileName;
                }
            }
            $banner->save();
            return redirect('/admin/add-banner')->with('banner-added-message', "Banner has been successfully added!!");
        }
        return view('admin.banners.add-banner');
    }

    public function editBanner(Request $req, $id = null)
    {
        if ($req->isMethod('post')) {
            $data = $req->all();
            if (empty($data['banner_content'])) {
                $data['banner_content'] = '';
            }
            if ($req->hasFile('image')) {
                echo $imp_tmp = $req->file('image');
                if ($imp_tmp->isValid()) {
                    $extension = $imp_tmp->getClientOriginalExtension();
                    $fileName = rand(111, 99999) . '.' . $extension;
                    $imgPath = 'uploads/banners/' . $fileName;
                    Image::make($imp_tmp)->resize(500, 500)->save($imgPath);
                }
            } else {
                $fileName = $data['current_image'];
            }
            Banner::where(['id' => $id])->update(['name' => $data['banner_name'], 'textStyle' => $data['banner_textStyle'], 'content' => $data['banner_content'], 'sortOrder' => $data['banner_sortOrder'], 'link' => $data['banner_link'], 'image' => $fileName]);
            return redirect('/admin/view-banners')->with('banner-update-message', "Banner has been updated successfully!!");
        }

        return view('admin.banners.view-banner');
    }

    public function deleteBanner($id = null)
    {
        Banner::where(['id' => $id])->delete();
        return redirect()->back()->with('banner-deleted-message', 'Banner has been deleted successfully!!');
    }

    public function updateStatus(Request $req, $id = null)
    {
        $data = $req->all();
        Banner::where(['id' => $data['id']])->update(['status' => $data['status']]);
    }
}
