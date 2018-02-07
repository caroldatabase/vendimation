<?php

namespace Modules\Admin\Http\Requests;

use App\Http\Requests\Request;
use Input;

class ContactRequest  extends Request {

    /**
     * The metric validation rules.
     *
     * @return array    
     */
    public function rules() { 
            switch ( $this->method() ) {
                case 'GET':
                case 'DELETE': {
                        return [ ];
                    }
                case 'POST': {
                        return [
<<<<<<< HEAD
                            'firstName' => 'required', 
                            'email'     => "required|email" , 
                            'categoryName' => 'required'
=======
                            'name' => 'required', 
                             'email'     => "required|email|unique:contacts,email" , 
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
                        ];
                    }
                case 'PUT':
                case 'PATCH': {
                    if ( $contact = $this->contact) {

                        return [
<<<<<<< HEAD
                            'firstName' => 'required', 
                             'email' => 'required' , 
                            'categoryName' => 'required'
=======
                            'name' => 'required', 
                             'email' => 'required' , 
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
                            
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
