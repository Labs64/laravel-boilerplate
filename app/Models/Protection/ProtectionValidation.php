<?php

namespace App\Models\Protection;

use App\Models\Auth\User\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Protection\ProtectionValidation
 *
 * @property int $id
 * @property int $user_id
 * @property \Carbon\Carbon $ttl
 * @property array $validation_result
 * @property-read \App\Models\Auth\User\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Protection\ProtectionValidation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Protection\ProtectionValidation whereTtl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Protection\ProtectionValidation whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Protection\ProtectionValidation whereValidationResult($value)
 * @mixin \Eloquent
 */
class ProtectionValidation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'protection_validations';

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
    protected $fillable = ['user_id', 'ttl', 'validation_result'];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['validation_result' => 'array'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['ttl'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isValid($productModuleNumber)
    {
        return collect($this->validation_result)
            ->where('productModuleNumber', $productModuleNumber)
            ->where('valid', true)
            ->isNotEmpty();
    }

    public function isExpired()
    {
        return $this->ttl <= Carbon::now();
    }

    public function getValidationResult($productModuleNumber)
    {
        return collect($this->validation_result)
            ->where('productModuleNumber', $productModuleNumber)
            ->first();
    }

}
