<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
  protected $table = 'data';
  protected $primaryKey = 'id';
  public $timestamps = false;
  public $appends = ['pole','pole_reformat'];

  protected $guarded = [];

  public function getPoleAttribute()
  {
    return PoleAttribute::where('data_id', $this->id)->get();
  }

  public function getPoleReformatAttribute()
  {
    $pole = PoleAttribute::where('data_id', $this->id)->get('name');

    if (!$pole) {
      return NULL;
    }

    return $pole->map(function ($item, $key) {
        return $item->name;
    });
  }
}
