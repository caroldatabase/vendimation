<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageCollection extends Model
{
    protected $table = 'image_collection';
    protected $primaryKey = 'id';
    protected $fillable = ['image_name','extension'];
}
