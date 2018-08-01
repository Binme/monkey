<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Menu_detail;

class MenuController extends Controller
{
    public function getAllMenus(){
    	$a = array();
    	$menu_number = array();
    	$menu_array = array();
    	$getMenus = Menu::select('id','title','href')->get();
    	$menu_details = Menu_detail::select('menu_id')->get();
    	foreach ($menu_details as $menu_detail){
    		$menu_number[] = $menu_detail->menu_id;
    	}
    	foreach ($getMenus as $getMenu) {
    		if (in_array($getMenu->id, $menu_number)) {
    			$menu_detail_arrays = Menu_detail::select('id','title','href','menu_id')->where('menu_id',$getMenu->id)->get();
    			foreach ($menu_detail_arrays as $menu_detail_array)	{
	    			$menu_array[] = [
			    						'id' => $menu_detail_array->id, 
			    						'title' => $menu_detail_array->title, 
			    						'href' => $menu_detail_array->href,
			    						'menu_id' => $menu_detail_array->menu_id
		    						];	 	
	    		}
	    		$a[] =	[
	    					'id' => $getMenu->id,
	    					'title' => $getMenu->title,
	    					'href' => $getMenu->href,
	    					'detail' => $menu_array	
	    				];
	    		$menu_array = null;								
	    	}else {
	    		$a[] =	[
		    				'id' => $getMenu->id,
	    					'title' => $getMenu->title,
	    					'href' => $getMenu->href	
	    				];
	    	}	
    	}
    	return response()->json($a);	
    }

    public function createMenu(Request $request){
    	$createMenu = Menu::create($request->all());
    	return response()->json('hello world');
    }

    public function getMenuById($id){
    	$menu = Menu::findOrFail($id);
    	return responese()->json($menu);
    }

    public function editMenu(Request $request,$id){
        $menu = Menu::findOrFail($id);
        $menu->title = $request->title;
        $menu->href = $request->href;
        $menu->save();
        return response()->json('Da edit thanh cong');
    }

    public function deleteMenu($id){
        $menu_detail = Menu_detail::where('menu_id','=',$id);
        $menu_detail->delete();
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return response()->json('Da delete thanh cong');
    }
}
