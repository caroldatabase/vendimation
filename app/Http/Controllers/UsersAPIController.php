<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class UsersAPIController
        extends Controller {

    public function login(Request $request) {

        $data = $request->all();
        $valid = false;
        $errors = null;
        $rules = [
            'userId' => 'required_if:loginType,0',
            'password' => 'required_if:loginType,0',
            'loginType' => 'required'
        ];

        $message = [
        ];

        try {

            $validation = \Illuminate\Support\Facades\Validator::make($data, $rules);

            if ($validation->fails()) {

                $errors = implode("<br>", $validation->errors()->all());
            } else {

                if ($data['loginType'] == 0) {

                    $loginData = [
                        'email' => $data['userId'],
                        'password' => $data['password']
                    ];

                    $checkUser = \Illuminate\Support\Facades\Auth::attempt($loginData);
                    if ($checkUser) {

                        $usermodel = \Illuminate\Support\Facades\Auth::user();
                        $valid = true;
                    } else {

                        $errors = "Username/Password is wrong.";
                    }
                }
            }
        } catch (\Exception $e) {

            $errors = $e->getMessage();
        }

        if ($valid) {
            return response()->json(
                            [
                                "status" => true,
                                'code' => 200,
                                "message" => "User Loggedin Successfully.",
                                'data' => ['token' => $usermodel->remember_token, 'jwttoken' => \Tymon\JWTAuth\Facades\JWTAuth::fromUser($usermodel)]
                            ]
            );
        } else {

            return response()->json(
                            [
                                "status" => false,
                                'code' => 200,
                                'error' => $errors,
                                "message" => "Username/Password is wrong.",
                                'data' => null
                            ]
            );
        }
    }

    public function logout() {

        \Illuminate\Support\Facades\Auth::logout();
        return response()->json(
                        [
                            "status" => true,
                            'code' => 200,
                            "message" => "User Logged out Successfully.",
                            'data' => null
                        ]
        );
    }

    public function register(Request $request) {

        $valid = false;
        $errors = null;
        $data = $request->all();
        try {

            $rules = [
                'name' => 'required|string',
                'mobile' => 'required|numeric',
                'phone' => 'required',
                'extension' => 'required',
                'password' => 'required|min:10',
                'email' => 'required|email|unique:users,email',
                'companyName' => 'required',
                'dateOfBirth' => 'required',
                'companyLogo' => 'required',
                'address' => 'required',
                'position' => 'required'
            ];

            $message = [
                'name.string' => 'Full Name should be string only.',
                'name.required' => 'Full name is required',
                'mobile.required' => 'Mobile number is required',
                'mobile.number' => 'Mobile number should be digit only',
                'extension.required' => 'Extension number is required',
                'phone.required' => 'Phone number is required',
                'password.required' => 'Password is required',
                'password.min' => 'Password minimum legnth is 10 or more',
                'email.required' => 'Email is required',
                'email.email' => 'In valid email id',
                'email.unique' => 'Email id already exists please use another email id',
                'companyName.required' => 'Company name is required',
                'dateOfBirth.required' => 'DOB is required',
                'companyLogo.required' => 'Company logo is required',
                'address.required' => 'Address is required',
                'position.required' => 'Designation is required'
            ];

            $validation = \Illuminate\Support\Facades\Validator::make($data, $rules, $message);

            if ($validation->fails()) {

                $errors = implode("<br>", $validation->errors()->all());
            } else {

                $data['password'] = bcrypt($data['password']);
                $userModel = \App\User::create($data);
                if ($userModel) {

                    $valid = true;
                }
            }
        } catch (\Exception $e) {

            $errors = $e->getMessage();
        }

        if ($valid) {

            \Illuminate\Support\Facades\DB::commit();
            return response()->json(
                            [
                                "status" => true,
                                'code' => 200,
                                "message" => "User registered sucessfully.",
                                'data' => null
                            ]
            );
        } else {

            \Illuminate\Support\Facades\DB::rollback();
            return response()->json(
                            [
                                "status" => false,
                                'code' => 200,
                                'error' => $errors,
                                "message" => "Something went wrong",
                                'data' => null
                            ]
            );
        }
    }

    public function forgotPassword(Request $request) {

        $valid = false;
        $errors = null;
        try {

            $messages = [
                'userId.exists' => 'No such user exist.',
            ];
            $validator = \Illuminate\Support\Facades\Validator::make(
                            $request->all(), [
                        'userId' => 'exists:users,email|required'
                            ], $messages
            );

            if ($validator->fails()) {

                $errors = implode("<br>", $validator->errors()->all());
            } else {

                $usermodel = \App\User::where('email', $request->get('userId'))->first();
                $temp_pass = mt_rand(10000000, 99999999);
                $usermodel->password = bcrypt($temp_pass);
                $usermodel->save();
                /* $to = strtolower($usermodel->email);
                  $emailView = \Illuminate\Support\Facades\View::make('emails.forgot-password')->with(array("fname" => ucfirst($usermodel->first_name), 'password' => $temp_pass));
                  $body = $emailView->render();
                  $subject = 'Your Password';
                  $sendEmail = new \App\Helpers\SendEmail($to, $body, $subject);
                  $sendEmail->sendEmail(); */
                $valid = true;
            }
        } catch (\Exception $e) {

            $errors = $e->getMessage();
        }

        if ($valid) {
            return response()->json(
                            [
                                "status" => true,
                                'code' => 200,
                                "message" => "Password send sucessfully.",
                                'data' => array('password' => $temp_pass)
                            ]
            );
        } else {

            return response()->json(
                            [
                                "status" => false,
                                'code' => 200,
                                'error' => $errors,
                                "message" => "Username is not valid.",
                                'data' => null
                            ]
            );
        }
    }

    public function changePassword(Request $request) {

        $errors = null;
        $valid = false;
        try {
            \Illuminate\Support\Facades\DB::beginTransaction();
            //check user token
            $user_model = JWTAuth::toUser($request->get('token'));

            if ($user_model) {

                $validator = \Illuminate\Support\Facades\Validator::make(
                                $request->all(), [
                            'userId' => 'exists:users,email|required',
                            'currentPassword' => 'required',
                            'newPassword' => 'required|min:8',
                            'confirmPassword' => 'same:newPassword'
                                ]
                );

                if ($validator->fails()) {

                    $errors = implode("<br>", $validator->errors()->all());
                } else {

                    $user = \App\User::where('email', $request->get('userId'))->first();

                    if ($user) {
                        // Validation Successful
                        if (!\Hash::check($request->get('currentPassword'), $user->password)) {

                            $errors = 'Your current password is incorrect.';
                        } else {

                            $user->password = \Hash::make($request->get('newPassword'));

                            if ($user->save()) {

                                \Illuminate\Support\Facades\DB::commit();
                                $valid = true;
                            } else {

                                $errors = 'something went wrong.';
                            }
                        }
                    }
                }
            } else {

                $errors = 'User is not valid.';
            }
        } catch (\Exception $e) {

            $errors = $e->getMessage();
        }

        if ($valid) {

            return response()->json(
                            [
                                "status" => true,
                                'code' => 200,
                                "message" => "Password updated sucessfully.",
                                'data' => null
                            ]
            );
        } else {

            \Illuminate\Support\Facades\DB::rollback();
            return response()->json(
                            [
                                "status" => false,
                                'code' => 200,
                                'error' => $errors,
                                "message" => "Something went wrong",
                                'data' => null
                            ]
            );
        }
    }

    public function uploadImg() {
        
        $errors = null;
        $valid = false;
        $image_data = file_get_contents('php://input');
        $im = imagecreatefromstring($image_data);
        $quality = 0;
        $filename = '/images/'.rand().'.png';
        if ($im !== false) {
            header('Content-Type: image/png');
            imagepng($im, public_path().$filename,$quality);
            imagedestroy($im);
            $image_data = array(
              'extension'  => 'png',
              'image_name' => $filename
                
            );
            $imgModel = \App\ImageCollection::create($image_data);
            $valid = true;
        }
        else {
           $errors = 'something went wrong.';
        }
        
        if ($valid) {

            return response()->json(
                [
                    "status" => true,
                    'code' => 200,
                    "message" => "Image uploaded sucessfully.",
                    'data' => array('filename' => $filename,'imageId' => $imgModel->id)
                ]
            );
        } else {

            
            return response()->json(
                [
                    "status" => false,
                    'code' => 200,
                    'error' => $errors,
                    "message" => "Something went wrong",
                    'data' => null
                ]
            );
        }

        /*if (Input::hasFile('file')) {

            echo 'Uploaded';
            $file = Input::file('file');
            $file->move('uploads', $file->getClientOriginalName());
            echo '';
        }*/
        
        /*foreach (\Illuminate\Support\Facades\Input::file('imgFile') as $photo) {
            $filename = $entry->id . "_" . $entry->spcode . '_' . $photo->getClientOriginalName();
            $quality = 90;
            $src = $photo; //Input::get('image');
            $img = imagecreatefromjpeg($src);
            $dest = ImageCreateTrueColor(\Illuminate\Support\Facades\Input::get('cw'), \Illuminate\Support\Facades\Input::get('ch'));
            imagecopyresampled($dest, $img, 0, 0, \Illuminate\Support\Facades\Input::get('cx'), \Illuminate\Support\Facades\Input::get('cy'), \Illuminate\Support\Facades\Input::get('cw'), \Illuminate\Support\Facades\Input::get('ch'), \Illuminate\Support\Facades\Input::get('cw'), \Illuminate\Support\Facades\Input::get('ch'));
            imagejpeg($dest, base_path() . '/public/images/BGPhoto/' . $filename, $quality);

            $photoUrl = \App\photourl::create([
                        'bgId' => $entry->id,
                        'photoURL' => $filename
            ]);
            $photoUrl->save();
        }*/
    }
    
    
    public function SaveCard(Request $request){
        
        $errors = null;
        $valid = false;
        \Illuminate\Support\Facades\DB::beginTransaction();
        try{
            $data = $request->all();
            $user_model = JWTAuth::toUser($request->get('token'));
            if($user_model){
            
                $validator = \Illuminate\Support\Facades\Validator::make(
                                $data, [
                                    'card_id' => 'required',
                                    'user_id' => 'required',
                                    'external_card_id' => 'required',
                                    'customer_id' => 'required',
                                    'first_name' => 'required',
                                    'last_name' => 'required',
                                    'card_number' => 'required',
                                    'expire_month' => 'required',
                                    'expire_year' => 'required',
                                    'type' => 'required',
                                ]
                );

                if ($validator->fails()) {

                    $errors = implode("<br>", $validator->errors()->all());
                    
                } else {
                    
                    $userCardModel = \App\UserCard::create($data);
                    if ($userCardModel) {
                        
                         \Illuminate\Support\Facades\DB::commit();
                        $valid = true;
                    }
                }
            }else{
                
                $errors = 'User is not valid.';
            }
            
        } catch (\Exception $e) {
            
            $errors = $e->getMessage();
        }
        
        
        
        if ($valid) {

            return response()->json(
                            [
                                "status" => true,
                                'code' => 200,
                                "message" => "User card details saved sucessfully.",
                                'data' => null
                            ]
            );
        } else {

            \Illuminate\Support\Facades\DB::rollback();
            return response()->json(
                            [
                                "status" => false,
                                'code' => 200,
                                'error' => $errors,
                                "message" => "Something went wrong",
                                'data' => null
                            ]
            );
        }  
    }

}
