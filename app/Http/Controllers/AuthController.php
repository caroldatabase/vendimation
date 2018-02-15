<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Socialite;
use Response;
use InvalidStateException;
use ClientException;

class AuthController extends Controller
{
   

    public function redirectToProvider($provider)
    {   
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that 
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider='google')
    {
        try{
            $user = Socialite::driver($provider)->stateless()->user();
            $socialUser = null;
            //Check is this email present
            $checkUser = User::where('email', '=', $user->email)->first();
            $data = [];
            if (User::where('email', '=', $user->email)->first()) {
                Auth::login($checkUser);
            }else{
                $data['password'] = bcrypt(str_random(16));
                $name               = explode(" ", $user->name);
                $data['first_name'] = isset($name[0])?$name[0]:'';
                $data['last_name']  = isset($name[1])?$name[1]:'';
                $data['name'] = isset($user->name)?$user->name:'';
                
                $data['email']      = isset($user->email)?$user->email:'missing' . str_random(10).'@vendimation.com';
                $data['profile_image'] = isset($user->avatar)?$user->avatar:'NA';
                $data[$provider.'_id'] = isset($user->id)?$user->id:'NA';
                $data['step'] = 1;
                $data['gender'] = isset($user->user['gender'])?$user->user['gender']:'';
                $data['skills'] =  isset($user->user['skills'])?$user->user['skills']:'';
                $data['occupation'] =  isset($user->user['occupation'])?$user->user['occupation']:'';
                $data['about_me'] = isset($user->user['aboutMe'])?$user->user['aboutMe']:'';

                $user_data = \DB::table('users')->insert($data);
                $checkUser = User::where('email', '=', $user->email)->first();
                Auth::login($checkUser);
            }
            return redirect('admin');

        }catch(\GuzzleHttp\Exception\ClientException $e){
            return redirect('account/login');
        }
       
    }

    // get contacts

     public function getContacts( Request $request, $provider='google')
    {
        try{

                $google_redirect_url = 'http://localhost.blog.com/blog/google';
                $gClient = new \Google_Client();
                $gClient->setApplicationName('vendimation');
                $gClient->setClientId('834953885970-i7l2mv64qlkldlqp38iodbg9v97ed827.apps.googleusercontent.com');
                $gClient->setClientSecret('h_chgtmW8XEa6ceV5mu69js8');
                $gClient->setRedirectUri($google_redirect_url);
               // $gClient->setDeveloperKey(config('services.google.api_key'));
                $gClient->setScopes(array(
                    'https://www.googleapis.com/auth/plus.me',
                    'https://www.googleapis.com/auth/userinfo.email',
                    'https://www.googleapis.com/auth/userinfo.profile',
                    'https://www.google.com/m8/feeds/contacts'

                ));
                $google_oauthV2 = new \Google_Service_Oauth2($gClient);
                if ($request->get('code')){
                    $gClient->authenticate($request->get('code'));
                    $request->session()->put('token', $gClient->getAccessToken());
                }
                if ($request->session()->get('token'))
                {
                    $gClient->setAccessToken($request->session()->get('token'));
                }
               
                if ($gClient->getAccessToken())
                {   
                    $t = $gClient->getAccessToken();

                    $accesstoken    =   $t['access_token'];
                    $guser          =   $google_oauthV2->userinfo->get();  
                    $email          =   $guser->email;  
                    $givenName      =   $guser->givenName;
                    $picture        =   $guser->picture;
                    $gender         =   $guser->gender;

                   $url = 'https://www.google.com/m8/feeds/contacts/default/full?max-results=100&start-index=1&alt=json&v=3.0&oauth_token='.$accesstoken;
                     
                   $res = file_get_contents($url);

                    $data = json_decode($res,true); 

                    foreach ($data['feed']['entry'] as $key => $value) {

                            $email = isset($value['gd$email'][0]['address'])?$value['gd$email'][0]['address']:'';

                            $name = substr($email, 0,strpos($email, '@'));

                            if(str_contains($name,'_')){
                                 $name = explode('_', $name );

                            }elseif(str_contains($name,'.')){
                                 $name = explode('.', $name );

                            }else{
                                 $name =  explode(' ', $name );

                            }  
                          $arr['name'] = isset($value['title']['$t'])?$value['title']['$t']:'';

                           if($arr['name']==""){
                                $arr['name']  = implode("  ",$name);
                           } 

                          $arr['email'] =  isset($value['gd$email'][0]['address'])?$value['gd$email'][0]['address']:'';
                          $arr['phoneNumber'] =  isset($value['gd$phoneNumber'][0]['$t'])?$value['gd$phoneNumber'][0]['$t']:'';

                          $arr_new[] = $arr;

                          
                    }
                   dd($arr_new); 
                }  
         

                }catch(\GuzzleHttp\Exception\ClientException $e){
                    return redirect('account/login');
                }
       
    }
}