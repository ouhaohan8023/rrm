<?php

namespace OhhInk\Rrm\Model;

use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{
    protected $fillable = [
      'name','url','icon'
    ];
}
