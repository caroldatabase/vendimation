<?php
namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Deals extends Model {

   
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'deals';
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
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    public function user()
    {
        return $this->hasOne('Modules\Admin\Models\User','user_id','id');
    }
    
    
  
}
