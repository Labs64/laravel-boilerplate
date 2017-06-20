<?php

namespace App\Models\Auth\User\Traits\Attributes;

use App\Models\Auth\User\SocialAccount;

trait UserAttributes
{

    /**
     * Get user avatar by gravatar
     *
     * @param bool $size
     * @return string
     */
    public function getGravatar($size = null)
    {
        $size = ($size) ? $size : config('gravatar.default.size');

        return gravatar()->get($this->email, ['size' => $size]);
    }

    /**
     * Get user avatar by social
     */
    public function getSocialAvatar($provider = null)
    {
        $provider = ($provider) ? $provider : session(config('auth.socialite.session_name'));

        if (!$provider) return null;

        /** @var  $socialAccount SocialAccount */
        $socialAccount = $this->providers->where('provider', $provider)->first();

        if (!$socialAccount) return null;

        return $avatar = $socialAccount->avatar;
    }

    /**
     * Get User avatar
     */

    public function getAvatarAttribute()
    {
        $avatar = $this->getSocialAvatar();

        return ($avatar) ? $avatar : $this->getGravatar();
    }

    /**
     * Get User licensee number
     */
    public function getLicenseeNumberAttribute()
    {
        return $this->getAttribute(config('protection.defaults.licensee.number'));
    }

    /**
     * Get User licensee name
     *
     * @return mixed
     */
    public function getLicenseeNameAttribute()
    {
        return $this->getAttribute(config('protection.defaults.licensee.name'));
    }
}