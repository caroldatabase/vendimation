<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model as Eloquent; 
use Illuminate\Http\Request;
use Input;
use Validator;
use Auth;
use Hash;
use View;
use URL;
use Lang;
use Session;
use DB;
use Route;
use Crypt;
use Illuminate\Http\Dispatcher;

class CategoryDashboard extends Eloquent {


     protected $parent = 'parent_id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categoryDashboard';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     /**
     * The primary key used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','category','display_order','category_id'];  // All field of user table here    


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     public function subcategory()
    {
       
        return $this->belongsTo('Modules\Admin\Models\Category','parent_id','id');
    }

    public function parent()
    {
        return $this->belongsTo('Modules\Admin\Models\Category', 'parent_id');
    }
<<<<<<< HEAD

    public function category()
    {
        return $this->belongsTo('Modules\Admin\Models\Category', 'category_id');
    }   

    public function getCategories(){
    
           $dashboard_categories = CategoryDashboard::select('categoryDashboard.category_id','categoryDashboard.name','categoryDashboard.display_order','categories.category_image','categories.parent_id','categories.category_group_name')->join('categories', 'categoryDashboard.category_id' , '=', 'categories.id')->orderBy('display_order')->where('parent_id','!=','0')->take(8)->get();

           $cat_array = [];
           if (count($dashboard_categories)) {
                
                $image_url = env('IMAGE_URL',url::asset('storage/uploads/category/'));

                foreach($dashboard_categories as $key => $value){
                    $cat_array[$key]  = [

                                        'categoryId'    =>$value['category_id'],
                                        'categoryName'  =>$value['name'],
                                        'categoryOrder' =>$value['display_order'],
                                        'categoryImage' =>$image_url.'/'.$value['category_image'],
                                        'groupId'       =>$value['parent_id'],
                                        'groupName'     =>$value['category_group_name']
=======
 

    public function getCategories(){
    
           $dashboard_categories = CategoryDashboard::select('categoryDashboard.category_id','categoryDashboard.name','categoryDashboard.display_order','categories.category_image','categories.parent_id')->join('categories', 'categoryDashboard.category_id' , '=', 'categories.id')->orderBy('display_order')->where('parent_id','!=','0')->take(8)->get();
           $cat_array = [];
           if (count($dashboard_categories)) {

                
                $image_url = env('IMAGE_URL',url::asset('storage/uploads/category/'));
                
                foreach($dashboard_categories as $key=>$value){
                    $cat_array[$key]  = [

                                        'cat_id'=>$value['category_id'],
                                        'cat_name'=>$value['name'],
                                        'cat_order'=>$value['display_order'],
                                        'cat_image'=>$image_url.$value['category_image'],
                                        'group_id'=>$value['parent_id']
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9

                                    ];

                }
                return $cat_array;

           } else {
                return $cat_array;
           }
            
    }
}
