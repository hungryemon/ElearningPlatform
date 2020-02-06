<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\Subcategory;
use Illuminate\Http\Request;

class ajaxController extends Controller
{
    public function getSubcategory(Request $request){
        echo $request->get('category');
        $subcategories = Subcategory::where('category_id','=',$request->get('category'))->get();

        echo '<option value="">-- Select Subcategory --</option>';
        foreach ($subcategories as $subcategory){
            echo '<option value="'. $subcategory->id .'">'. $subcategory->subcategoryName .'</option>';
        }
    }

    public function editChapter(Request $request){
        $chapter = Chapter::find($request->get('chapterId'));
        $chapter->chapterName = $request->get('chapterName');
        $chapter->update();
        echo 'Done';
    }
    
    public function deleteChapter(Request $request){
        Chapter::find($request->get('deleteChapterId'))->delete();
    }
}
