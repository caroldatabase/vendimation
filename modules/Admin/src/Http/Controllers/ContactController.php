<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\ContactRequest;
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
use Route;
use Crypt; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Dispatcher; 
use App\Helpers\Helper;
use Modules\Admin\Models\Contact; 
use Modules\Admin\Models\Category;
<<<<<<< HEAD
use Modules\Admin\Models\ContactGroup;
use Response; 
use Maatwebsite\Excel\Facades\Excel as Excel;
use PDF;
=======
use Response; 
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9

/**
 * Class AdminController
 */
class ContactController extends Controller {
    /**
     * @var  Repository
     */

    /**
     * Displays all admin.
     *
     * @return \Illuminate\View\View
     */
    public function __construct(Contact $contact) { 
        $this->middleware('admin');
        View::share('viewPage', 'Contact');
        View::share('sub_page_title', 'Contact');
        View::share('helper',new Helper);
        View::share('heading','Contact');
        View::share('route_url',route('contact')); 
        $this->record_per_page = Config::get('app.record_per_page'); 
    }

   
    /*
     * Dashboard
     * */

<<<<<<< HEAD
    public function index(Contact $contact, Request $request) 
=======
    public function index(Category $category, Request $request) 
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
    { 
        $page_title = 'Contact';
        $sub_page_title = 'View Contact';
        $page_action = 'View Contact'; 


        if ($request->ajax()) {
            $id = $request->get('id'); 
            $category = Contact::find($id); 
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
               
            $contacts = Contact::where(function($query) use($search,$status) {
                        if (!empty($search)) {
                            $query->Where('name', 'LIKE', "%$search%")
                                    ->OrWhere('email', 'LIKE', "%$search%")
                                      ->OrWhere('phone', 'LIKE', "%$search%");
                        }
                        
<<<<<<< HEAD
                    })->Paginate($this->record_per_page);
        } else {
            $contacts = Contact::orderBy('id','desc')->Paginate($this->record_per_page);
        }

        $export = $request->get('export');
        if($export=='pdf')
        {
           $pdf = PDF::loadView('packages::contact.pdf', compact('corporateProfile', 'page_title', 'page_action','contacts'));
           return ($pdf->download('all-contacts.pdf'));
=======
                    })>Paginate($this->record_per_page);
        } else {
            $contacts = Contact::Paginate($this->record_per_page);
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
        }
         
        
        return view('packages::contact.index', compact('result_set','contacts','data', 'page_title', 'page_action','sub_page_title'));
    }

    /*
     * create Group method
     * */

<<<<<<< HEAD
    public function create(Contact $contact) 
=======
    public function create(Category $category) 
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
    {
        
        $page_title = 'Contact';
        $page_action = 'Create Contact';
        $category  = Category::all();
<<<<<<< HEAD
        $categories  = Category::all();
  
=======
        $sub_category_name  = Category::all();
 
        $html = '';
        $categories = '';

>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
        return view('packages::contact.create', compact('categories', 'html','category','sub_category_name', 'page_title', 'page_action'));
    }

    public function createGroup(Request $request)
    {
<<<<<<< HEAD
        $users = $request->get('ids');
        $validator = Validator::make($request->all(), [
                'groupName' => 'required|unique:contact_groups,groupName' 
            ]); 

        if ($validator->fails()) {
            $error_msg  =   [];
            foreach ( $validator->messages()->all() as $key => $value) {
                        array_push($error_msg, $value);     
                    }
                            
            return Response::json(array(
                'status' => 0,
                'message' => $error_msg[0],
                'data'  =>  ''
                )
            );
        }

        $cgObj             = new ContactGroup;
        $cgObj->groupName  = $request->get('groupName');
        $cgObj->parent_id  = 0;
        $cgObj->save();

        foreach ($users as $key => $value) {
            $contact        = Contact::find($value);
            $cg             = new ContactGroup;
            $cg->groupName  = $request->get('groupName');
            $cg->contactId  = $value;
            $cg->email      = $contact->email;
            $cg->name       = $contact->name;
            $cg->parent_id  = $cgObj->id;
            $cg->save();
        }

        return $cg;

=======
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
        $contact = Contact::whereIn('id',$request->get('ids'))->get();
        return $contact;
    }

    /*
     * Save Group method
     * */

    public function store(ContactRequest $request, Contact $contact) 
    {   
<<<<<<< HEAD
        
        $categoryName = $request->get('categoryName');
        $cn= '';
        foreach ($categoryName as $key => $value) {
            $cn = ltrim($cn.','.$value,',');
        }
        
        $table_cname = \Schema::getColumnListing('contacts');
        $except = ['id','create_at','updated_at','categoryName'];
        $input = $request->all();
        $contact->categoryName = $cn;
        foreach ($table_cname as $key => $value) {
           
           if(in_array($value, $except )){
                continue;
           }

           if(isset($input[$value])) {
               $contact->$value = $request->get($value); 
           } 
        }
        $contact->save();   
         
        return Redirect::to(route('contact'))
                            ->with('flash_alert_notice', 'New contact successfully created!');
    }
    
    public function uploadFile($file)
    {
       
        //Display File Name
        $fileName = $file->getClientOriginalName();

        //Display File Extension
        $ext = $file->getClientOriginalExtension();
        //Display File Real Path
        $realPath = $file->getRealPath(); 
        //Display File Mime Type
        

        $file_name = time().'.'.$ext;
        $path = storage_path('csv');

        chmod($path ,0777);
        $file->move($path,$file_name);
        chmod($path.'/'.$file_name ,0777);
        return $path.'/'.$file_name;
    }

    public function contactImport(Request $request)
    {
        try{
            $file = $request->file('importContact');
            
            if($file==NULL){
                echo json_encode(['status'=>0,'message'=>'Please select  csv file!']); 
                exit(); 
            }
            $ext = $file->getClientOriginalExtension();
            if($file==NULL || $ext!='csv'){
                echo json_encode(['status'=>0,'message'=>'Please select valid csv file!']); 
                exit(); 
            }
            $mime = $file->getMimeType();   
           
            $upload = $this->uploadFile($file);
           
            $rs =    \Excel::load($upload, function($reader)use($request) {

            $data = $reader->all(); 
              
            $table_cname = \Schema::getColumnListing('contacts');
            
            $except = ['id','create_at','updated_at'];

            $input = $request->all();
           // $contact->categoryName = $cn;
            $contact =  new Contact;
            foreach ($data  as $key => $result) {
                foreach ($table_cname as $key => $value) {
                   if(in_array($value, $except )){
                        continue;
                   }
                   if(isset($result->$value)) {
                       $contact->$value = $result->$value; 
                       $status = 1;
                   } 
                }
                 if(isset($status)){
                     $contact->save(); 
                 }
            } 
           
            if(isset($status)){
                echo json_encode(['status'=>1,'message'=>'contact imported successfully!']);
            }else{
               echo json_encode(['status'=>0,'message'=>'Invalid file type or content.Please upload csv file only.']); 
            }
             
            });

        } catch (\Exception $e) {
            echo json_encode(['status'=>0,'message'=>'Please select csv file!']); 
            exit(); 
        }
        
       
    }
=======
        $contact->name     =   $request->get('name');
        $contact->phone    =   $request->get('phone');
        $contact->email    =   $request->get('email');
        $contact->address  =   $request->get('address'); 
        
        $contact->save();   
         
        return Redirect::to(route('contact'))
                            ->with('flash_alert_notice', 'New contact  successfully created!');
        }
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9

    /*
     * Edit Group method
     * @param 
     * object : $category
     * */

<<<<<<< HEAD
    public function edit(Contact $contact) {
        $page_title     = 'contact';
        $page_action    = 'Edit contact'; 
        $categories  = Category::all();
        $category_id  = explode(',',$contact->categoryName);
        
        return view('packages::contact.edit', compact('category_id','categories', 'url','contact', 'page_title', 'page_action'));
    }

    public function update(Request $request, Contact $contact) {
        
        $contact = Contact::find($contact->id); 
        $categoryName = $request->get('categoryName');
        $cn= '';
        foreach ($categoryName as $key => $value) {
            $cn = ltrim($cn.','.$value,',');
        }
    
        if($cn!=''){
            $contact->categoryName =  $cn;
        }
        $request = $request->except('_method','_token','categoryName');
        
=======
    public function edit($id) {
        $contact = Contact::find($id);
        $page_title = 'contact';
        $page_action = 'Edit contact'; 
        return view('packages::contact.edit', compact( 'url','contact', 'page_title', 'page_action'));
    }

    public function update(Request $request, $id) {
        $request = $request->except('_method','_token');
        $contact = Contact::find($id); 
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
        foreach ($request as $key => $value) {
            $contact->$key = $value;
        }
        $contact->save();
        return Redirect::to(route('contact'))
                        ->with('flash_alert_notice', 'Contact  successfully updated.');
    }
    /*
     *Delete User
     * @param ID
     * 
     */
<<<<<<< HEAD
    public function destroy(Contact $contact) { 
        Contact::where('id',$contact->id)->delete(); 
=======
    public function destroy($id) { 
        Contact::where('id',$id)->delete(); 
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
        return Redirect::to(route('contact'))
                        ->with('flash_alert_notice', 'contact  successfully deleted.');
    }

    public function show($id) {
        
        return Redirect::to('admin/contact');

            }

}