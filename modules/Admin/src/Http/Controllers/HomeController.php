<?php
namespace Modules\Admin\Http\Controllers;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Modules\Admin\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Modules\Admin\Models\User;
use Input;
use Validator;
use Auth;
use Paginate;
use Grids;
use HTML;
use Form;
use View;
use URL;
use Lang;
use Route;
use Session;
use App\Http\Controllers\Controller; 
use Modules\Admin\Models\TargetMarketType; 
use Modules\Admin\Models\BusinessNatureType;
use Response;

/**
 * Class AdminController
 */
class HomeController extends Controller { 
    /**
     * @var  Repository
     */ 
    /**
     * Displays all admin.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        $targetMarketType   =  TargetMarketType::all();
        $businessNatureType =  BusinessNatureType::all(); 
        View::share('targetMarketType',$targetMarketType);
        View::share('businessNatureType',$businessNatureType);
        View::share('businessNatureType',$businessNatureType);
        $admin = Auth::guard('admin')->user();
        if($admin){
            $user = Auth::guard('admin')->user(); 
        }else{
            $user = Auth::guard('web')->user(); 
        }
        View::share('user',$user);        
    }
    

   /*
    * Dashboard
    **/
    public function index(User $user) { 
         
       return view('packages::auth.create', compact('user'));
    } 
    
    public function uploadFile(Request $request){
        
     
       $validator = Validator::make($request->all(), [
           'file' => 'required|mimes:xls,csv,xlsx'
        ]);
        /** Return Error Message **/
        if ($validator->fails()) {
                    $error_msg  =   [];
            foreach ( $validator->messages()->all() as $key => $value) {
                        array_push($error_msg, $value);     
                    }
                            
            return Response::json(array(
                'status' => 0,
                'code'=>500,
                'message' => $error_msg[0],
                'data'  =>  ''
                )
            );
        } 
         $savefile = User::saveFile($request, 'file');
         if($savefile !==FALSE) {
        return Response::json(array(
                       'status' => 1,
                       'code'=>200,
                       'message' => 'File uploaded succesfully.',
                       'data'  => ['path'=>$savefile, 'full_url'=>url($savefile)]
                       )
                   );
          }
        
    }


    public function contactList(Request $request){
        $allContact = '';
        return view('packages::dashboard.contact-list', compact('allContact'));
    }

}
