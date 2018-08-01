<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu_detail;

class Menu_detailController extends Controller
{
    public function getAllMenu_details(){
    	$menu_details = Menu_detail::select('id','title','href','menu_id')->get();
    	return response()->json($menu_details);
    }
    public function createDetailMenu(Request $request,$id){
        $menu_detail['title'] = $request->title;
        $menu_detail['href'] = $request->href;
        $menu_detail['menu_id'] = $id;
        // return response()->json($menu_detail);
        $createMenu_detail = Menu_detail::create($menu_detail);
        return response()->json(['data' => 'Successfully create Detail_Menu']);
    }
    public function editDetailMenu(Request $request,$id){
        $menu_detail = Menu_detail::findOrFail($id);
        $menu_detail->title = $request->title;
        $menu_detail->href = $request->href;
        $menu_detail->save();
        return response()->json('Da edit detail thanh cong');
    }
    public function deleteDetailMenu($id){
        $menu_detail = Menu_detail::findOrFail($id);
        $menu_detail->delete();
        return response()->json('Da delete thanh cong');
    }
}
