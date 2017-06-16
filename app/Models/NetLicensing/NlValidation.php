<?php

namespace App\Models\NetLicensing;

use App\Models\Auth\User\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NetLicensing\NlValidation
 *
 * @property int $id
 * @property int $user_id
 * @property \Carbon\Carbon $ttl
 * @property array $validation_result
 * @property-read \App\Models\Auth\User\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetLicensing\NlValidation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetLicensing\NlValidation whereTtl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetLicensing\NlValidation whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetLicensing\NlValidation whereValidationResults($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetLicensing\NlValidation whereValidationResult($value)
 */
class NlValidation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nl_validations';

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
    protected $fillable = ['user_id', 'ttl', 'validation_results'];


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
}
