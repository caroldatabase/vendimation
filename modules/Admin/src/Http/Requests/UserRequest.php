<?php

namespace Modules\Admin\Http\Requests;

use App\Http\Requests\Request;
use Input;

class UserRequest extends Request {

    /**
     * The metric validation rules.
     *
     * @return array
     */
    public function rules() {
        //if ( $metrics = $this->metrics ) {
            switch ( $this->method() ) {
                case 'GET':
                case 'DELETE': {
                        return [ ];
                    }
                case 'POST': {
                        return [
<<<<<<< HEAD
                            
                            'first_name'      => 'required|min:3', 
                            'last_name'      => 'required|min:2',
                            'email'     => "required|email|unique:users,email" ,   
                            'password'  => 'required|min:6', 
                            'address' => 'required',
                        //    'phone' =>  'required|number|min:10',
                             'phone' => 'required'
=======
                            'email'     => "required|email|unique:users,email" ,  
                            'name'      => 'required|min:3', 
                            'password'  => 'required|min:6',
                        //    'phone' =>  'required|number|min:10',
                             'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|numeric'
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
                             //size:10
                            //'role'  => 'required'
                            /*'confirm_password' => 'required|same:password'*/ 
                        ];
                    }
                case 'PUT':
                case 'PATCH': {
                    if ( $user = $this->user ) {

                        return [
<<<<<<< HEAD
                            'first_name' => 'required|min:3', 
                            'last_name'  => 'required|min:2', 
                            'email'      => "required|email" ,  
                            'phone'      => 'required',
                            'address'    => 'required',
=======
                            'email'   => "required|email" ,  
                            'name' => 'required|min:3',
                            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|numeric'
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
                           // 'role'  => 'required'
                        ];
                    }
                }
                default:break;
            }
        //}
    }

    /**
     * The
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

}
