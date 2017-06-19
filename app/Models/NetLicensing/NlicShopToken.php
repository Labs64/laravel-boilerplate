<?php

namespace App\Models\NetLicensing;

use App\Models\Auth\User\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\NetLicensing\NlShopToken
 *
 * @property int $id
 * @property int $user_id
 * @property string $number
 * @property \Carbon\Carbon $expires
 * @property string $shop_url
 * @property-read \App\Models\Auth\User\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetLicensing\NlicShopToken whereExpires($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetLicensing\NlicShopToken whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetLicensing\NlicShopToken whereNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetLicensing\NlicShopToken whereShopUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetLicensing\NlicShopToken whereUserId($value)
 * @mixin \Eloquent
 */
class NlicShopToken extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nlic_shop_tokens';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'number', 'expires', 'shop_url'];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['expires'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function isExpired()
    {
        return $this->expires <= Carbon::now();
    }
}
