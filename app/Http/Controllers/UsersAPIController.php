<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

                $errors = implode("<br>",$validation->errors()->all());
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

                $errors = implode("<br>",$validation->errors()->all());
                
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
                'email.exists' => 'No such user exist.',
            ];
            $validator = Validator::make(
                            $request->all(), [
                        'email' => 'exists:users,email|required'
                            ], $messages
            );

            if ($validator->fails()) {

                $errors = implode("<br>",$validator->errors()->all());
            } else {

                $usermodel = \App\User::where('email', $request->get('email'))->first();
                $temp_pass = rand(8, 16);
                $usermodel->password = bcrypt($temp_pass);
                $usermodel->save();
                $to = strtolower($usermodel->email);
                $emailView = \Illuminate\Support\Facades\View::make('emails.forgot-password')->with(array("fname" => ucfirst($usermodel->first_name), 'password' => $temp_pass));
                $body = $emailView->render();
                $subject = 'Your Password';
                $sendEmail = new \App\Helpers\SendEmail($to, $body, $subject);
                $sendEmail->sendEmail();
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
                                'data' => null
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
        try {
            \Illuminate\Support\Facades\DB::beginTransaction();
            //check user token
            $user_model = JWTAuth::parseToken()->authenticate();

            $validator = Validator::make(
                            $request->all(), [
                        'email' => 'exists:users,email|required',
                        'current_password' => 'required',
                        'new_password' => 'required|min:8',
                        'confirm_password' => 'same:new_password'
                            ]
            );

            if ($validator->fails()) {

                $errors = implode("<br>", $validator->errors()->all());
            } else {

                $user = \App\User::where('email', $request->json('email'))->first();

                if ($user) {
                    // Validation Successful
                    if (!\Hash::check($request->json('current_password'), $user->password)) {

                        $errors = 'Your current password is incorrect.';
                    } else {

                        $user->password = \Hash::make($request->json('new_password'));

                        if ($user->save()) {

                            \Illuminate\Support\Facades\DB::commit();
                            $valid = true;
                        } else {

                            $errors = 'something went wrong.';
                        }
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
                                "message" => "Password updated sucessfully.",
                                'data' => null
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
    }

}
