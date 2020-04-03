<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Package extends Model
{
    //
    // use SoftDeletes;
    use Sortable;

    protected $table = 'package';

    protected $fillable = [

        'name',
        'type',
        'description',
        'active',
        'price',
        'min_person',
        
        
    ];

    public $sortable = ['name',
    'type',
    'description',
    'active',
    'price',
    'min_person',];


    protected $dates = ['created_at','updated_at','deleted_at'];
    public function category() {

        return $this->belongsTo(Category::class, 'id')->withTrashed();
    }

}
