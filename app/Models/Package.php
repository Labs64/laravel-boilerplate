<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
    // use SoftDeletes;

    protected $table = 'package';

    protected $fillable = [

        'name',
        'type',
        'description',
        'active',
        'price',
        'min_person',
        
    ];

    public function category() {

        return $this->belongsTo(Customer::class, 'category_id')->withTrashed();
    }

}
