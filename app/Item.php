<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  use SoftDeletes;
  
  protected $fillable = ['text','body'];
  protected $dates = ['deleted_at'];
}