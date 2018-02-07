<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCard extends Model
{
    protected $table = 'user_cards';
    protected $primaryKey = 'id';
    protected $fillable = ['first_name','last_name','card_id','user_id','external_card_id','customer_id','card_number','expire_month','expire_year','type',];
}
