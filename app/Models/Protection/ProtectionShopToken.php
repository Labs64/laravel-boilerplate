<?php

namespace App\Models\Protection;

use App\Models\Auth\User\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Protection\ProtectionShopToken
 *
 * @property int $id
 * @property int $user_id
 * @property string $number
 * @property \Carbon\Carbon $expires
 * @property string $success_url
 * @property string $cancel_url
 * @property string $success_url_title
 * @property string $cancel_url_title
 * @property string $shop_url
 * @property-read \App\Models\Auth\User\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Protection\ProtectionShopToken whereCancelUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Protection\ProtectionShopToken whereCancelUrlTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Protection\ProtectionShopToken whereExpires($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Protection\ProtectionShopToken whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Protection\ProtectionShopToken whereNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Protection\ProtectionShopToken whereShopUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Protection\ProtectionShopToken whereSuccessUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Protection\ProtectionShopToken whereSuccessUrlTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Protection\ProtectionShopToken whereUserId($value)
 * @mixin \Eloquent
 */
class ProtectionShopToken extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'protection_shop_tokens';

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
