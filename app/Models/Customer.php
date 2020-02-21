<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    use SoftDeletes;

    protected $table ='customer';
    protected $fillable = [
      'first_name',
      'last_name',
      'address',
      'phone',
      'email',
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
