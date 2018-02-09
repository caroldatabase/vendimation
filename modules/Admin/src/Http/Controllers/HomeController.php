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
use Excel;
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
            $file_name = $request->file('file')->getClientOriginalName();
            $data=['path'=>$savefile, 'full_url'=>url($savefile),'name'=>$file_name];
            $request->session()->put('excel_upload_file', $data);
        return Response::json(array(
                       'status' => 1,
                       'code'=>200,
                       'message' => 'File uploaded succesfully.',
                       'data'  => $data
                       )
                   );
          }
        
    }
    
    public function AddExcel(Request $request){
    $excel_file_data = $request->session()->get('excel_upload_file'); 
    $excel_path = isset($excel_file_data['path'])?$excel_file_data['path']:'';
    $excel_name =  isset($excel_file_data['name'])?$excel_file_data['name']:'MyContact.xls';
    $file_found =false;
    $sheetTitle =false;
    $sheetHeadingCount =0;
    $totalRowsCount =0;
    $totalRows =array();
    $sheetHeading =array();
    $db_contact_fields=array(
        'firstName'=>'First Name',
        'lastName'=>'last Name',
        //'name'=>'Name',
        'email'=>'Email',
        'mobile'=>'Mobile',
        'phone'=>'Phone',
       // 'address'=>'Address',
    );
    if(!file_exists($excel_path)){
        $request->session()->flash('status', 'No Excel Found. Please Upload Excel and Continue.!');
    }else{
      $file_found =true;
      $sheet = Excel::selectSheetsByIndex(0)->load($excel_path)->get();
      $sheetTitle =$sheet->getTitle();
      $sheetHeading =$sheet->getHeading();
      $totalRows =$sheet->toArray();
      $totalRowsCount = count($totalRows);
      $sheetHeadingCount = count($sheetHeading);
      $request->session()->flash('status', $sheetTitle.' Load successfully!');  
    }
    if($request->method()=='POST'){
        $mapFields =$request->get('excel_map',array());
        if($file_found){
          //  print_r($totalRows);die;
        $request->session()->flash('status', $sheetTitle.' Load successfully!');       
        return  view('packages::dashboard.contact-list', compact('db_contact_fields','file_found','excel_name','sheetHeading','sheetHeadingCount','totalRows','totalRowsCount','mapFields'));     
        }else{
          $request->session()->flash('error', $sheetTitle.' Not Found. Please Upload Excel and Continue.!!');    
        }
    }
    return view('packages::dashboard.add-excel', compact('db_contact_fields','file_found','excel_name','sheetHeading','sheetHeadingCount','totalRows','totalRowsCount'));    
    }
    public function saveContacts(){
        
    }
    public function contactList(Request $request){
        $allContact = '';
        return view('packages::dashboard.contact-list', compact('allContact'));
    }

}
