<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    use SoftDeletes;

    protected $table ='bookings';
    protected $fillable = [
      'time_from',
      'time_to',
      'additional_information',
      'contact_person',
      'image',
      'amount',
      'num_of_participant',
      'num_of_pengiring',
      'organization'
    ];

    protected $date =[
        'time_from',
        'time_to'
    ];

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id')->withTrashed();
    }
    
    public function package() {
        return $this->belongsTo(Customer::class, 'package_id')->withTrashed();
    }

    


}
