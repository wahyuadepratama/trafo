<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoleAttribute extends Model
{
  protected $table = 'pole_attribute';
  protected $primaryKey = 'id';
  public $timestamps = false;  

  protected $guarded = [];
}
