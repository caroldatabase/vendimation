<?php
namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Dispatcher; 
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest; 
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
use Redirect; 
use App\Http\Requests;
use App\Helpers\Helper as Helper;
use Modules\Admin\Models\User;
use Modules\Admin\Http\Requests\LoginRequest;
use App\Admin; 
use Modules\Admin\Models\TargetLocation; 
use Modules\Admin\Models\TargetMarket; 
use Modules\Admin\Models\BusinessNature;
use Modules\Admin\Models\TargetMarketType; 
use Modules\Admin\Models\BusinessNatureType;
use Illuminate\Http\UploadedFile;
use Modules\Admin\Models\Country;
use Modules\Admin\Models\State;
use Modules\Admin\Models\City; 
 
 
class AuthController extends Controller
{
     
    protected $redirectTo = 'admin'; 
	protected $guard = 'web';

	protected $file;
	 
	public function index(User $user, Request $request)
	{  
		if(Auth::guard($this->guard)->check()){  
    		return Redirect::to('admin');
    	}
    	$request->session()->flush();
        return view('packages::auth.login', compact('user'));
	}

	 

	public function signup(Request $request, $step=null){

		$user = new User;
		$countries 			= '';//	Country::with('state')->get(); 
        $targetMarketType 	=  	TargetMarketType::all();
        $businessNatureType =  	BusinessNatureType::all();
		$uid = null;
	 	if ($request->session()->has('user_id')) {
	 		$uid = $request->session()->get('user_id', null);

	 		if($uid){
	 			$user = User::find($uid); 
	 			$step_id = $user->step;
	 			$step_new = 'step_'.$step_id;  
	 			if($request->method()=="GET"){
	 				if($step_new!=$step){ 
	 					return Redirect::to('admin/signup/'.$step_new);
	 				}
	 			} 
	 		} 		
		} 

		$user = User::findOrNew($uid);
			if($request->method()=="POST"){

			
			switch ($step) {
				case 'step_2':
			      			        if($user->id){
			        	 $validator = Validator::make($request->all(), [
				                        'email' => "required|email",
				                        'password' => 'required',
				                        'name' => 'required',
				                        'phone_or_mobile' => 'required|numeric',
				                        'dateOfBirth' => 'required'
		            			]); 
					    /** Return Error Message * */
				        if (isset($validator) && $validator->fails()) {
					        return  Redirect::back()->withInput()->withErrors($validator);    
				        }
			        }else{

			        	 $validator = Validator::make($request->all(), [
				                        'email' => "required|email|unique:users,email",
				                        'password' => 'required',
				                        'name' => 'required',
				                        'phone_or_mobile' => 'required|numeric',
				                        'dateOfBirth' => 'required'
		            			]); 
					    /** Return Error Message * */
				        if (isset($validator) && $validator->fails()) {
					        return  Redirect::back()->withInput()->withErrors($validator);    
				        }

			        }



			        if(!$request->get('tnc')){ 
			        	 return  Redirect::back()->withInput()->withErrors(['tnc'=>'Please  check terms and condition']);
			        }
			        
					$user->name  		= $request->get('name');
					$user->email  		= $request->get('email');
					$user->password  	= Hash::make($request->get('password'));
					$user->phone  		= $request->get('phone_or_mobile');
					$user->mobile  		= $request->get('phone_or_mobile');
					$user->dateOfBirth  = $request->get('dateOfBirth');
					$user->step  		=	2;
					$user->save();
					$request->session()->put('user_id', $user->id);  
					break;
					 
				case 'step_3':

					$validator = Validator::make($request->all(), [
				                        'companyName' => 'required',
				                        'designation' => 'required',
				                        'office_number' => 'numeric',
				                        'extension' => 'numeric',
				                        'companyLogo' => 'mimes:jpeg,bmp,png,jpg'
		            			]); 
			    /** Return Error Message * */
		        if (isset($validator) && $validator->fails()) {
			        return  Redirect::back()->withInput()->withErrors($validator);    
		        }


					if ($request->file('companyLogo')) {
		                $companyLogo = User::createImage($request,'companyLogo');
		                $request->merge(['companyPic'=> $companyLogo]);
		                $user->companyLogo = $request->get('companyPic');
		            } 

		            $user->companyName 	= $request->get('companyName');
					$user->designation 	= $request->get('designation');
		            $user->address 		= $request->get('address');
		            $user->office_number= $request->get('office_number');
		            $user->extension 	= $request->get('extension');
		            $user->step 		= 3;
		            $user->save();
		            $request->session()->put('user_id', $user->id);
					break;
				case 'step_4':
				 	break;
			 	case 'step_5':
			 		$user->bussiness_nature 	= $request->get('bussiness_nature');
		            $user->target_market 		= $request->get('target_market');
		            $user->region 				= $request->get('region');
		            $user->step 				= 5;
		            $user->save();
		            $helper = new Helper;
		          	$subject = "Welcome to Vendimation! Verify your email address to get started";
		          	$email_content = array(
		          					'receipent_email'=> $user->email,
		          					'subject'	=>	$subject,
		          					'name'		=> 	$user->name
		          				);

		          	$verification_email = $helper->sendEmail($email_content,'verification_link');
		          	$request->session()->flush();
					return view('packages::auth.thankyou');
				 	break;
				case 'skip':
					$request->session()->flush();
					return redirect::to('admin/login');
					break;	
				default:
					$request->session()->flush();
					return redirect::to('admin/signup/step_1');
					break;
			} 
		}


		return view('packages::auth.signup_'.$step, compact('user','countries','targetMarketType','businessNatureType','step'));
	}

   public function emailVerification(Request $request) {
        $verification_code = $request->input('verification_code');
        $email = $request->input('email');

        if (Hash::check($email, $verification_code)) {
            $user = User::where('email', $email)->get()->count();
            if ($user > 0) {
                User::where('email', $email)->update(['status' => 1]);
              	$msg =  "Welcome to Vendimation!  Email verified successfully.";
        		return view('packages::auth.email-verify', compact('msg'));	
        	
            } else {
                $msg = "Verification link is Invalid or expire!";
                return view('packages::auth.email-verify', compact('msg'));
            }
        } else {
            	$msg = "Verification link is Invalid!";
            	return view('packages::auth.email-verify', compact('msg'));
    	}
    }

	public function forgetPassword	()
	{	 
		return view('packages::auth.forget-password');
	}
	
	public function resetPassword(UserRequest $request)
	{ 	 
		$encryptedValue = ($request->get('key'))?$request->get('key'):''; 
		$method_name = $request->method();
		$token = $request->get('token');
		$email = ($request->get('email'))?$request->get('email'):'';

		if($method_name=='GET')
		{ 	 
			try {
			    $email = Crypt::decrypt($encryptedValue);
			    if (Hash::check($email, $token)) {
 
			    	return view('packages::auth.reset',compact('token','email'));	
 
			    }else{
			    	return redirect()
				 		->back()
				 		->withInput()  
				 		->withErrors(['message'=>'Invalid reset password link!']);
			    } 
			    
			} catch (DecryptException $e) { 
 
				return view('packages::auth.reset',compact('token','email'))  
				 			->withErrors(['message'=>'Invalid reset password link!']); 		
			}
			
		}else
		{ 	  
			 
			if (Hash::check($email, $token)) {
				 
				$password =  Hash::make($request->get('password'));
		        $user = User::where('email',$request->get('email'))->update(['password'=>$password]);
				 $msg = "Password reset successfully.";

		        return view('packages::auth.email-verify', compact('msg'));

		        return redirect()
				 		->back()
				 		->withInput()  
				 		->withErrors(['message'=>$msg]);
			}else{
				 
			 return redirect()
				 		->back()
				 		->withInput()  
				 		->withErrors(['message'=>'Invalid reset password link!']);
			} 
		} 
	}
	
	public function logout(){
		Auth::logout();
		auth()->guard('admin')->logout(); 
		return redirect('admin/login');
	}
	public function login(Request $request)
	{
		$credentials = array('email' => Input::get('email'), 'password' => Input::get('password')); 
        if (Auth::attempt($credentials, true)) {
            return Redirect::to('admin');
        }
		//dd(Auth::check());
	}

	public function sendResetPasswordLink(Request $request)
	{	 
		$email = $request->get('email');
 
		if(!$email){
			 return redirect()
				 		->back()
				 		->withInput()  
				 		->withErrors(['alert'=>'danger','message'=>'Pease enter your email address.']);
		} 
        //Server side valiation
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]); 
 
        $user =   User::where('email',$email)->first(); 
        if(!$user){
 
        	 return redirect()
				 		->back()
				 		->withInput()  
				 		->withErrors(['alert'=>'danger','message'=>'Oh no! The address you provided isn’t in our system']);
        }
 
        $user_data = User::find($user->id); 
        $temp_password =  Hash::make($email);
 
        $email_content = array(
                        'receipent_email'   => $request->get('email'),
 
                        'subject'           => 'Your Vendimation Account Password',
                        'name'              => $user_data->name,
                        'temp_password'     => $temp_password,
                        'encrypt_key'       => Crypt::encrypt($email),
                        'greeting'          => 'Vendimation Team'
                    );
        //print_r($email_content);
        $helper = new Helper;
        $email_response = $helper->sendEmail(
                                $email_content,
                                'forgot_password_link'
                            ); 
        return Redirect::to('admin/forgot-password') 
        					->withErrors(['alert'=>'success','message'=>'Reset password link has sent to your registered email.']);
         
	}
}