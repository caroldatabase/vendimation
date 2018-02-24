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
use Modules\Admin\Models\Contact;
use Response;
use App\Helpers\Helper as Helper;

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
    private $user;
    public function __construct()
    {
        $this->middleware('admin');
        
        $js_file = [
            'jquery.min.js',
            'bootstrap.min.js',
            'bootbox.js'
            ];
        View::share('js_file',$js_file);
        $admin = Auth::guard('admin')->user();
        if($admin){
            $user = Auth::guard('admin')->user(); 
        }else{
            $user = Auth::guard('web')->user(); 
        }
        if($user==null){
            Auth::logout();
            auth()->guard('admin')->logout(); 
            return redirect('admin/login');
        }
        
        View::share('user',$user);   
        $this->user =$user;

        $card= \DB::table('user_cards')->where('user_id',$user->id)->get();
        View::share('card',$card);   

        $buy_contacts = \DB::table('buy_contacts')->get();
        View::share('buy_contacts',$buy_contacts);

        $tm =  array_map('intval', explode(',', $user->bussiness_nature));
        $bn = array_map('intval', explode(',', $user->target_market));
        
        $targetMarketType   =  TargetMarketType::all();
        $businessNatureType =  BusinessNatureType::all(); 

        View::share('targetMarketType',$targetMarketType);
        View::share('businessNatureType',$businessNatureType);
        
        View::share('tm',$tm);
        View::share('bn',$bn);

    }

    public function dragExcel()
    {
      return view('packages::dashboard.drag-excel');
    
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
        'firstName'=>'First Name*',
        'lastName'=>'last Name',
        //'name'=>'Name',
        'email'=>'Email*',
        'mobile'=>'Mobile*',
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
        $action = $request->get('action');
        if($file_found){ 
        $request->session()->flash('status', $sheetTitle.' Load successfully!');       
        }else{
          $request->session()->flash('error', $sheetTitle.' Not Found. Please Upload Excel and Continue.!!');    
        }
        if($action ==md5('save-excel-import')){
          $mapFields =$request->session()->get('excel_map'); 
          $totalRows = $this->processRecords($totalRows,$mapFields);
          
          $totalRowsCount =$totalRows['total_count'];
          $acceptedCount = $totalRows['accepted_count'];         
         $totalRows = $totalRows['items'];     
          return  $this->saveContacts($request,$totalRows);
        }else{
          $mapFields =$request->get('excel_map',array());
          $totalRows = $this->processRecords($totalRows,$mapFields);
          $totalRowsCount =$totalRows['total_count'];
          $request->session()->put('excel_map',$mapFields);
         return  view('packages::dashboard.contact-list', compact('db_contact_fields','file_found','excel_name','sheetHeading','sheetHeadingCount','totalRows','totalRowsCount','mapFields'));          
        }
       return redirect('admin/add-excel');
    }
    return view('packages::dashboard.add-excel', compact('db_contact_fields','file_found','excel_name','sheetHeading','sheetHeadingCount','totalRows','totalRowsCount'));    
    }
    
    private function saveContacts(Request $request,$records){
        $selected = $request->get('import_selected');
        $status=0;
        $result['success'] =array();
        $result['error'] =array();
        $result['notfound'] =array();
        if($selected){
          
            foreach($selected as $row_id){
              if(isset($records[$row_id])){
               $record = $records[$row_id];
               if(isset($record['valid'])&&$record['valid']==1){
                   $contact = new Contact;
                   $contact->firstName = $record['firstName']['value'];
                   $contact->lastName = $record['lastName']['value'];
                   $contact->email = $record['email']['value'];
                   $contact->mobile = $record['mobile']['value'];
                   $contact->phone = $record['phone']['value'];
                   $contact->user_id = $this->user->id;
                   $contact->save();
                  
                 $result['success'][]= $row_id;     
               }else{
                    $result['error'][]= $row_id;     
               }
              }else{
              $result['notfound'][]= $row_id;   
              }
              $message = '<div class="alert alert-info">Contact Import Result.<ul>'; 
              if(count($result['success'])){
                  $status=1;
               $message .= '<li>Accepted : '.count($result['success']).' Records</li>';    
              }
              if(count($result['error'])){
               $message .= '<li>Rejected : '.count($result['error']).' Records</li>';    
              }
              if(count($result['notfound'])){
               $message .= '<li>Not Found : '.count($result['notfound']).' Records</li>';    
              }
              $message.= '</ul></div>';
            }
            $minimumContactRequired = 100;//Set Minimum Required Contact 
            $totalImported =Contact::where(['user_id' => $this->user->id])->count();
            if($totalImported <$minimumContactRequired){
            $remainingNeed = $minimumContactRequired-$totalImported;
            $message .= "You need more {$remainingNeed} contacts.";
            $status=0;
            }
        
        }else{
        $message = 'No Contact selected. Please select record to continue.';   
        }
         return Response::json(array(
                       'status' =>$status,
                       'code'=>200,
                       'message' => $message,
                       'data'  =>$result
                       )
                   );
    }
    
    private function processRecords($sheet_records,$mapFields){
        $totalRows =array();
        $accepted=0;
        $count = 0;
        foreach($sheet_records as $k=>$record){
       
         $row =array();
         $id = md5($k.'-hash-'.date('Ymd')); 
         $valid=1;

        foreach($mapFields as $key=>$value){
          $error=0;
          $item_value=isset($record[$value])&&$record[$value]?$record[$value]:'';
          if($key=='email' && !filter_var($item_value,FILTER_VALIDATE_EMAIL)){
          $valid=0;
          $error=1;
          }
          if($key=='firstName' && $item_value==''){
          $valid=0;
          $error=1;
          }
          if($key=='mobile' && ($item_value==''|| !preg_match('/^[0-9]{10}+$/', $item_value))){
           $valid=0;
           $error=1;
          }
          
          $row[$key]=array('value'=>$item_value,'error'=>$error);
        }
         $row['valid'] =$valid;
         $totalRows[$id]=$row; 
         if($valid)$accepted++;
         $count++;
      }
      return array('items'=>$totalRows,'total_count'=>$count,'accepted_count'=>$accepted);
    }
    public function contactList(Request $request){
        $allContact = '';
        return view('packages::dashboard.contact-list', compact('allContact'));
    }

    public function addCard(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'card_number' => 'required|regex:/^[a-z0-9 .\-]+$/i',
           'card_name' => 'required|string',
           'expire_mm_yy' => 'required',
           'cvv'=> 'required|numeric'
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

        $data = $request->all();

        $expire_mm_yy = explode('/',$request->get('expire_mm_yy'));
        $card_name = explode(" ", $request->get('card_name'));  

        $date = date('Y');
        $exp = isset($expire_mm_yy[1])?$expire_mm_yy[1]:0;
        $expire_yr = 2000+intval($exp);

        if($date>$expire_yr){
          return Response::json(array(
                'status' => 0,
                'code'=>200,
                'message' =>'Please enter valid expiry date',
                'data'  =>  $data
                )
            );
        }


        $input['card_number'] = $request->get('card_number');
        $input['first_name']  = isset($card_name[0])?$card_name[0]:'';
        $input['last_name']   =  isset($card_name[1])?$card_name[1]:'';
        $input['expire_month']= isset($expire_mm_yy[1])?$expire_mm_yy[1]:'';
        $input['expire_year'] = isset($expire_mm_yy[1])?$expire_mm_yy[1]:'';
        $input['user_id'] = $request->get('user_id');
        $input['card_type'] = $request->get('card_type');

      $html =  '<div class="personal-box work-detail product-view wallet">
        <div class="row">
            <div class="col-sm-6">
                <p class="wallet-in"><a href="#"><img src="'.url("assets/img/circle-right.jpg").'"></a> <span class="nam-card">'.$request->get('card_name').'<span>****'.substr($request->get('card_number'), -4).'</span></span></p>
            </div>
            <div class="col-sm-6 visa">
                <img src="'.url('assets/img/'.$request->get('card_type').'.png').'"> <input type="text" class="cvv" placeholder="CVV">
            </div>
        </div>
    </div>';
        
        

        $result = \DB::table('user_cards')->insert($input);

         return Response::json(array(
                'status' => 1,
                'code'=>200,
                'message' =>'Card added successfully',
                'data'  =>  $html
                )
            );

    }

    public function inviteUser(Request $request)
    {   
        $user_id = $request->input('userId'); 
        $invited_user = User::find($user_id); 
        
        $user_first_name = $invited_user->first_name ;
        $download_link = url('admin/signup/step_1');
        $user_email = $request->input('email');

        $validator = Validator::make($request->all(), [
           'email' => 'required|email'
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
       
        /** --Send Mail after Sign Up-- **/
       
        $user_data      = User::find($user_id); 
        $sender_name    = ($user_data->name)?$user_data->name:$user_data->first_name.' '.$last_name;
        $invited_by     = $sender_name; //$invited_user->first_name.' '.$invited_user->last_name;
        $receipent_name = "User";
        $subject        = ucfirst($sender_name)." has invited you to join vendimation";   
        $email_content  = array('receipent_email'=> $user_email,'subject'=>$subject,'name'=>'User','invite_by'=>$invited_by,'receipent_name'=>ucwords($receipent_name));
       
        $helper = new Helper;
        $invite_notification_mail = $helper->sendNotificationMail($email_content,'invite_notification_mail',['name'=> 'User']);
        
        return  response()->json([ 
                    "status"=>1,
                    "code"=> 200,
                    "message"=>"You've successfully invited",
                    'data' => ['receipentEmail'=>$user_email]
                   ]
                );
    }

}
