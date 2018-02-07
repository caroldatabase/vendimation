<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;  

use Illuminate\Foundation\Http\FormRequest;
use Response;

class ContactGroup extends Eloquent {

   
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contact_groups';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     /**
     * The primary key used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
<<<<<<< HEAD

   

    public function contact()
    {
        return $this->belongsTo('Modules\Admin\Models\Contact','contactId','id');
    }

    public function contactGroup()
    {
        return $this->hasMany('Modules\Admin\Models\ContactGroup','parent_id','id');
    }
=======
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
    
 
  
}
