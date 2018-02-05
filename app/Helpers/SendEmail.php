<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers;

/**
 * Description of SendEmail
 *
 * @author kapi7001
 */
class SendEmail {

    private $data;
    
    function __construct($to,$body,$subject) {

        $this->data = array(
            'subject'=> $subject,
            'to' => $to,
            'from' => 'admin@admin.com',
            'bodyHtml' => $body
        );
    }
 
    public function sendEmail(){
       
        $header = "From:Vendimation <admin@admin.com> \r\n";
        $header .= "Content-Type: text/html; charset=UTF-8\r\n";
        if(isset($this->data['to']) && isset($this->data['subject']) && isset($this->data['bodyHtml'])){
     
          $d = mail($this->data['to'],$this->data['subject'],$this->data['bodyHtml'],$header,'-fadmin@admin.com');
   
        }
        
        return $d;
     
    }
}
