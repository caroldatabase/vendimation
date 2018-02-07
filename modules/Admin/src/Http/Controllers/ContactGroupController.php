<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\CategoryRequest;
use Modules\Admin\Models\User; 
use Input;
use Validator;
use Auth;
use Paginate;
use Grids;
use HTML;
use Form;
use Hash;
use View;
use URL;
use Lang;
use Session;
use DB;
use Route;
use Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Dispatcher; 
<<<<<<< HEAD
use Modules\Admin\Helpers\Helper as Helper;
use Modules\Admin\Models\Roles; 
use Modules\Admin\Models\Category;
use Modules\Admin\Models\Contact; 
use Modules\Admin\Models\ContactGroup;
use PDF; 
=======
use App\Helpers\Helper;
use Modules\Admin\Models\Roles; 
use Modules\Admin\Models\Category;
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
 

/**
 * Class AdminController
 */
class ContactGroupController extends Controller {
    /**
     * @var  Repository
     */

    /**
     * Displays all admin.
     *
     * @return \Illuminate\View\View
     */
    public function __construct() { 
<<<<<<< HEAD
         $this->middleware('admin');
        View::share('viewPage', 'Contact');
        View::share('sub_page_title', 'Contact');
        View::share('helper',new Helper);
        View::share('heading','Contact Group');
        View::share('route_url',route('contact')); 
        $this->record_per_page = Config::get('app.record_per_page'); 
=======
        $this->middleware('admin');
        View::share('viewPage', 'contactGroup');
        View::share('sub_page_title', 'Contact Group');
        View::share('helper',new Helper);
        View::share('heading','Contact Group');
        View::share('route_url',route('contactGroup'));

        $this->record_per_page = Config::get('app.record_per_page');
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
    }

   
    /*
     * Dashboard
     * */

<<<<<<< HEAD
    public function index(ContactGroup $contactGroup, Request $request) 
    { 
       
        $page_title = 'Contact';
        $sub_page_title = 'contactGroup';
        $page_action = 'View contactGroup'; 

        if ($request->ajax()) {
            $id = $request->get('id'); 
            $category = ContactGroup::find($id); 
=======
    public function index(Category $category, Request $request) 
    { 
        $page_title = 'Category';
        $sub_page_title = 'Group Category';
        $page_action = 'View Group Category'; 


        if ($request->ajax()) {
            $id = $request->get('id'); 
            $category = Category::find($id); 
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
            $category->status = $s;
            $category->save();
            echo $s;
            exit();
<<<<<<< HEAD
        } 
 
=======
        }

>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
        // Search by name ,email and group
        $search = Input::get('search');
        $status = Input::get('status');
        if ((isset($search) && !empty($search))) {

            $search = isset($search) ? Input::get('search') : '';
               
<<<<<<< HEAD
            $contactGroup = ContactGroup::with(['contactGroup' => function ($query) {
                                $query->with('contact');
                            }])->where(function($query) use($search,$status) {

                                if (!empty($search)) {
                                    $query->Where('groupName', 'LIKE', "%$search%")
                                            ->OrWhere('name', 'LIKE', "%$search%")
                                            ->OrWhere('email', 'LIKE', "%$search%");
                                }
                            
                    })->Paginate($this->record_per_page);
        } else {
           
           $contactGroup =  ContactGroup::with(['contactGroup' => function ($query) {
                $query->with('contact');
            }])->where('parent_id',0)->orderBy('id','desc')->Paginate(10);

        } 
        $contactGroupPag =  ContactGroup::where('parent_id',0)->Paginate(10);
        $export = $request->get('export');

        if($export=='pdf')
        {
            $contactGroup =  ContactGroup::with(['contactGroup' => function ($query) {
                $query->with('contact')->get();

            }])->where('parent_id',0)->get();

           $pdf = PDF::loadView('packages::contactGroup.pdf', compact('contactGroupPag','contactGroup','data', 'page_title', 'page_action','sub_page_title'));
           return ($pdf->download('contact-group.pdf'));
        }
       

        return view('packages::contactGroup.index', compact('contactGroupPag','contactGroup','data', 'page_title', 'page_action','sub_page_title','contacts','html'));
    }

    // updateGroup

    public function updateGroup(Request $request)
    {

        $cgn =  ContactGroup::find($request->get('parent_id'));
        $cgn->groupName = $request->get('groupName');
        $cgn->save();

       ContactGroup::whereNotIn('id',$request->get('ids'))
                  ->where('parent_id',$request->get('parent_id'))->delete();

        $ids = $request->get('ids');

        foreach ($ids as $key => $value) {
           $data = ContactGroup::findOrNew($value);
           $data->groupName = $request->get('groupName');
           if(count($data->contactId)==0){
                 $data->contactId = $value;
           }
          
           $data->parent_id = $request->get('parent_id');
           $data->save();
        }
        echo json_encode(['status'=>1,'message'=>'Group Updated successfully']); 
                exit(); 

=======
            $categories = Category::where(function($query) use($search,$status) {
                        if (!empty($search)) {
                            $query->Where('category_group_name', 'LIKE', "%$search%")
                                    ->OrWhere('category_name', 'LIKE', "%$search%");
                        }
                        
                    })->where('parent_id',0)->Paginate($this->record_per_page);
        } else {
            $categories = Category::where('parent_id',0)->Paginate($this->record_per_page);
        }
         
        
        return view('packages::contact.index', compact('result_set','categories','data', 'page_title', 'page_action','sub_page_title'));
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
    }

    /*
     * create Group method
     * */

    public function create(Category $category) 
    {
         
        $page_title = 'contactGroup';
        $page_action = 'Create contactGroup';
        $category  = Category::all();
        $sub_category_name  = Category::all();
 
        $html = '';
        $categories = '';

        return view('packages::contactGroup.create', compact('categories', 'html','category','sub_category_name', 'page_title', 'page_action'));
    }

    /*
     * Save Group method
     * */

    public function store(CategoryRequest $request, Category $category) 
    {  
        $name = $request->get('category_group_name');
        $slug = str_slug($request->get('category_group_name'));
        $parent_id = 0;

        $photo = $request->file('category_group_image');
        $destinationPath = storage_path('uploads/category');
        $photo->move($destinationPath, time().$photo->getClientOriginalName());
        $photo_name = time().$photo->getClientOriginalName();
        $request->merge(['photo'=>$photo_name]);
 

        $cat = new Category;
        $cat->category_group_name   =  $request->get('category_group_name');
        $cat->slug                  =  strtolower(str_slug($request->get('category_group_name')));
        $cat->parent_id             =  $parent_id;
        $cat->category_name         =  $request->get('category_group_name'); 
        $cat->level                 =  1;
        $cat->category_group_image  =  $photo_name; 
        $cat->description           =  $request->get('description');
        
        $cat->save();   
         
        return Redirect::to(route('contact'))
                            ->with('flash_alert_notice', 'New category  successfully created !');
        }

    /*
     * Edit Group method
     * @param 
     * object : $category
     * */

    public function edit(Category $category) {

        $page_title = 'Category';
        $page_action = 'Edit Group category'; 
        $url = url::asset('storage/uploads/category/'.$category->category_group_image)  ;
        return view('packages::category.edit', compact( 'url','category', 'page_title', 'page_action'));
    }

    public function update(CategoryRequest $request, Category $category) {
       
        $name = $request->get('category_group_name');
        $slug = str_slug($request->get('category_group_name'));
        $parent_id = 0;

        $validate_cat = Category::where('category_group_name',$request->get('category_group_name'))
                            ->where('parent_id',0)
                            ->where('id','!=',$category->id)
                            ->first();
         
        if($validate_cat){
              return  Redirect::back()->withInput()->with(
                'field_errors','The Group Category name already been taken!'
            );
        } 


        if ($request->file('category_group_image')) {
            $photo = $request->file('category_group_image');
            $destinationPath = storage_path('uploads/category');
            $photo->move($destinationPath, time().$photo->getClientOriginalName());
            $photo_name = time().$photo->getClientOriginalName();
            $request->merge(['photo'=>$photo_name]);
        } 

        $cat                        = Category::find($category->id);
        $cat->category_group_name   =  $request->get('category_group_name');
        $cat->slug                  =  strtolower(str_slug($request->get('category_group_name')));
        $cat->parent_id             =  $parent_id;
        $cat->category_name         =  $request->get('category_group_name'); 
        $cat->level                 =  1;
        $cat->description           =  $request->get('description');

        if(isset($photo_name))
        {
          $cat->category_group_image  =  $photo_name; 
        }
<<<<<<< HEAD
        $cat->save();    
        return Redirect::to(route('contact'))
                        ->with('flash_alert_notice', 'Contact Group  successfully updated.');
=======
         
        $cat->save();    


        return Redirect::to(route('contact'))
                        ->with('flash_alert_notice', 'Group Category  successfully updated.');
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
    }
    /*
     *Delete User
     * @param ID
     * 
     */
<<<<<<< HEAD
    public function destroy(ContactGroup $cg) 
    {
        ContactGroup::whereIdOrParentId($cg->id,$cg->id)->delete();
        return Redirect::to(route('contactGroup'))
                        ->with('flash_alert_notice', 'Contact Group successfully deleted.');
    }

    public function show(ContactGroup $cg) {
=======
    public function destroy(Category $category) {
        
        $d = Category::where('id',$category->id)->delete(); 
        return Redirect::to(route('category'))
                        ->with('flash_alert_notice', 'Group Category  successfully deleted.');
    }

    public function show(Category $category) {
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
        
    }

}
