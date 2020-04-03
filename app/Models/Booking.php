<?php

namespace App\Models;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    //use SoftDeletes;

    protected $table = 'bookings';
    protected $fillable = [
        'time_from',
        'time_to',
        'additional_information',
        'contact_person',
        'receipt_image',
        'amount',
        'num_of_participant',
        'num_of_pengiring',
        'organization',
        'status'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    protected $date = [
                        'time_from'=> 'datetime:Y-m-d H:i:s',
                       'time_to' => 'datetime:Y-m-d H:i:s'
                    ];
                      
  
    public function setCustomerIdAttribute($input)
    {
        $this->attributes['customer_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setPackageIdAttribute($input)
    {
        $this->attributes['package_id'] = $input ? $input : null;
    }

    public function getTimeFromAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['time_from'] = date('Y-m-d H:i:s', strtotime($input));
            return  $this->attributes['time_from'];
        } else {
            $this->attributes['time_from'] = null;
        }
    }

   public function getTimeToAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['time_to'] =  date('Y-m-d H:i:s', strtotime($input));;
        return  $this->attributes['time_to'];
        } else {
            $this->attributes['time_to'] = null;
        }
    }

     public function getTimeAttribute($input)
    {
        $date_ =  date('Y-m-d H:i:s', strtotime($input));
        return $date_;
    }
    public function customer()
    {
        return $this->belongsTo(User::class, 'id')->withTrashed();
    }

    public function calculateAmount($name,$price1,$participant,$from,$to,$pengiring){
        
        $total_amount=0.00;    
        $start= Carbon::createFromDate($from);
        $end= Carbon::createFromDate($to);
        $day=$end->diffInDays($start);
        $price=(float)$price1;
        $pengiring_amount=$pengiring*5.00*$day;


        if($name=="PENGINAPAN PER MALAM")
           $total_amount =(($participant+$pengiring) / 2)*$price*$day; 
            
        else if($name=="PERKHEMAHAN & MOTIVASI (3 HARI 2 MALAM) [PAKEJ PENUH]")
            $total_amount =$participant*$price + $pengiring_amount;

        else if($name=="PERKHEMAHAN & MOTIVASI (2 HARI 1 MALAM) [PAKEJ PENUH]")
            $total_amount =$participant*$price  + $pengiring_amount;

        else if($name=="PERKHEMAHAN & MOTIVASI (SEHARI) [PAKEJ PENUH]")
            $total_amount =$participant*$price  + $pengiring_amount;

        else if($name=="SEWAAN TAPAK (3 HARI 2 MALAM)")
            $total_amount =$participant*$price  + $pengiring_amount;

        else if($name=="SEWAAN TAPAK (2HARI 1 MALAM)")
            $total_amount =$participant*$price  + $pengiring_amount;

        else if($name=="SEWAAN TAPAK PERKHEMAHAN (SEHARI)")
            $total_amount =$participant*$price  + $pengiring_amount; 

        else if($name=="REKREASI : KAYAK PER SESI - TASKM")
            $total_amount =$participant*$price*$day ;

        else if($name=="REKREASI : KAYAK PER SESI - KELAS PENGENALAN KAYAK")
            $total_amount =$participant*$price*$day;

        else if($name=="REKREASI :  MEMANAH TRADISIONAL(ARCHERY) 10 ANAK PANAH PER SESI")
            $total_amount =$participant*$price*$day;

        else if($name=="REKREASI :  MEMANAH TRADISIONAL(ARCHERY) 20 ANAK PANAH PER SESI")
             $total_amount =$participant*$price*$day;

        else if($name=="REKREASI : MEMANAH TEMPUR (COMBAT ARCHERY)")
            $total_amount =$participant*$price*$day;

        else if($name=="REKREASI : BUMPERBALLS")
             $total_amount =$participant*$price*$day;

        else if($name=="REKREASI: EXPLORACE")
             $total_amount =$participant*$price*$day;
        
        else if($name=="REKREASI : MERENTAS HUTAN")
             $total_amount =$participant*$price*$day;

        else if($name=="REKREASI : TREASURE HUNT")
             $total_amount =$participant*$price*$day;

        else if($name=="REKREASI : TELEMATCH 4-11 TAHUN")
             $total_amount =$participant*$price*$day;

        else if($name=="REKREASI : TELEMATCH 12 TAHUN KEATAS")
            $total_amount =$participant*$price*$day;

        else if($name=="SEWAAN SISTEM SIAR RAYA")
            $total_amount =$participant*$price*$day;

        else if($name=="SEWAAN KHEMAH")
             $total_amount =$participant*$price*$day;

        else if($name=="PENGANGKUTAN BAS")
            $total_amount =$participant*$price*$day;

        else if($name=="CERAMAH MOTIVASI")
            $total_amount =$participant*$price*$day;

        else if($name=="LARIAN BERHALANGAN")
             $total_amount =$participant*$price*$day;

        else
            $total_amount =$participant*$price*$day;
        
        return $total_amount;
            
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'id')->withTrashed();
    }
    public function getImageAttribute()
    {
        return $this->receipt_image;
    }
}
