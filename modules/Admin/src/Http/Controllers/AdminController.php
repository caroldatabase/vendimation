<?php
namespace Modules\Admin\Http\Controllers; 

use Modules\Admin\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;  
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Dispatcher; 
use Illuminate\Contracts\Encryption\DecryptException;
use App\Http\Requests\UserRequest;
use Auth;
use Input;
use Redirect; 
use Response;   
use Crypt; 
use View;
use Cookie;
use Closure; 
use Hash;
use URL;
use Lang;
use Validator;
use App\Http\Requests;
use App\Helpers\Helper as Helper;
//use Modules\Admin\Models\User; 
<<<<<<< HEAD
use Modules\Admin\Models\Contact;
use Modules\Admin\Models\Deals;
use Modules\Admin\Models\Notification;
use Modules\Admin\Models\ContactGroup;
use Modules\Admin\Models\User;
use App\Admin;
use Illuminate\Http\Request;
use Session;
use Modules\Admin\Models\TargetMarketType; 
use Modules\Admin\Models\BusinessNatureType;
=======
use Modules\Admin\Models\Category;
use Modules\Admin\Models\CategoryDashboard;
use App\Admin;
use Illuminate\Http\Request;
use Session;

use App\User;
use App\ProfessorProfile;
use App\StudentProfile;
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
 
/**
 * Class : AdminController
 */
class AdminController extends Controller { 
    /**
     * @var  Repository
     */ 
    /**
     * Displays all admin.
     *
     * @return \Illuminate\View\View
     */ 
    protected $guard = 'admin';
    public function __construct()
    {  
        $this->middleware('admin');  
<<<<<<< HEAD
         View::share('heading','dashboard');
        View::share('route_url','admin');

        $js_file = [
                'jquery.min.js', 
                'bootstrap.min.js',
                'jquery.flot.js',
                'custom.js'
                ];
        View::share('js_file',$js_file);
=======
        View::share('heading','dashboard');
        View::share('route_url','admin');
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
    }
    /*
    * Dashboard
    **/
    public function index(Request $request) 
    { 
<<<<<<< HEAD
        $page_title = "";
        $page_action = "";
        $viewPage = "Admin";

        $contact = Contact::all();
        $notification = Notification::all();

        $contact_count          = ($contact)?$contact->count():0;
        $notification_count     = ($notification)?$notification->count():0;

        $admin = Auth::guard('admin')->user();
        if($admin){
            $user = Auth::guard('admin')->user(); 
        }else{
            $user = Auth::guard('web')->user(); 
        }
        $deals = Deals::where('user_id',$user->id)->orderBy('id','desc')->first();
        $close_deals = Deals::where('user_id',$user->id)->count();

         $contactGroup =   ContactGroup::with(['contactGroup' => function ($query) {
                $query->with('contact');
            }])->where('parent_id',0)->orderBy('id','desc')->get();
        $targetMarketType  =   TargetMarketType::all();
        $businessNatureType =   BusinessNatureType::all();
                
        return view('packages::dashboard.billing',compact('contact_count','deals','notification_count','close_deals','contactGroup','user','targetMarketType','businessNatureType'));
    }

    public function renderPage(Request $request,$myprofile=null) 
    {
        $page_title = "";
        $page_action = "";
        $viewPage = "billing";

        $contact = Contact::all();
        $notification = Notification::all();

        $contact_count          = ($contact)?$contact->count():0;
        $notification_count     = ($notification)?$notification->count():0;

        $admin = Auth::guard('admin')->user();
        if($admin){
            $user = Auth::guard('admin')->user(); 
        }else{
            $user = Auth::guard('web')->user(); 
        }
        $deals = Deals::where('user_id',$user->id)->orderBy('id','desc')->first();
        $close_deals = Deals::where('user_id',$user->id)->count();

         $contactGroup =   ContactGroup::with(['contactGroup' => function ($query) {
                $query->with('contact');
            }])->where('parent_id',0)->orderBy('id','desc')->get();
        $targetMarketType  =   TargetMarketType::all();
        $businessNatureType =   BusinessNatureType::all();
         
                
        return view('packages::dashboard.'.$myprofile,compact('contact_count','deals','notification_count','close_deals','contactGroup','user','targetMarketType','businessNatureType'));
=======
       // dd(Session::getId());
        $page_title = "";
        $page_action = "";
        $professor = User::where('role_type',1)->count();
         
        $user = User::count();
        $viewPage = "Admin";

        $users_count        =  User::count();
        $category_grp_count =  Category::where('parent_id',0)->count();
        $category_count     =  Category::where('parent_id','!=',0)->count();
        $category_dashboard_count = CategoryDashboard::count();


        return view('packages::dashboard.index',compact('category_count','users_count','category_grp_count','page_title','page_action','viewPage','category_dashboard_count'));
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
    }

   public function profile(Request $request,Admin $users)
   {
        $users = Admin::find(Auth::guard('admin')->user()->id);
        $page_title = "Profile";
        $page_action = "My Profile";
        $viewPage = "Admin";
        $method = $request->method();
        $msg = "";
        $error_msg = [];
        if($request->method()==='POST'){
            $messages = ['password.regex' => "Your password must contain 1 lower case character 1 upper case character one number"];

            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'min:6',
                'name' => 'required', 
        ]);
        /** Return Error Message **/
        if ($validator->fails()) {

            $error_msg  =   $validator->messages()->all(); 
           return view('packages::users.admin.index',compact('error_msg','method','users','page_title','page_action','viewPage'))->with('flash_alert_notice', $msg)->withInput($request->all());
        }
            $users->name= $request->get('name');
            $users->email= $request->get('email');
            if($request->get('password')!=null){
                $users->password=    Hash::make($request->get('password'));
            }
            $users->save();
            $method = $request->method();
            $msg = "Profile details successfully updated.";
        } 
       return view('packages::users.admin.index',compact('error_msg','method','users','page_title','page_action','viewPage'))->with('flash_alert_notice', $msg)->withInput($request->all());
       
     
   }
   public function errorPage()
   {
        $page_title = "Error";
        $page_action = "Error Page";
        $viewPage = "404 Error";
        $msg = "page not found";
        return view('packages::auth.page_not_found',compact('page_title','page_action','viewPage'))->with('flash_alert_notice', $msg);

   }  
}
