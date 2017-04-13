<?php

/**
 * Global helpers file with misc functions.
 */

if (!function_exists('gravatar')) {
    /**
     * Access the gravatar helper.
     *
     * @return \Creativeorange\Gravatar\Gravatar|\Illuminate\Foundation\Application|mixed
     */
    function gravatar()
    {
        return app('gravatar');
    }
}

if (!function_exists('to_js')) {
    /**
     * Access the javascript helper.
     */
    function to_js($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('tojs');
        }

        if (is_array($key)) {
            return app('tojs')->put($key);
        }

        return app('tojs')->get($key, $default);
    }
}

if (!function_exists('meta')) {
    /**
     * Access the meta helper.
     */
    function meta()
    {
        return app('meta');
    }
}

if (!function_exists('meta_tag')) {
    /**
     * Access the meta tags helper.
     */
    function meta_tag($name = null, $content = null, $attributes = [])
    {
        return app('meta')->tag($name, $content, $attributes);
    }
}

if (!function_exists('meta_property')) {
    /**
     * Access the meta tags helper.
     */
    function meta_property($name = null, $content = null, $attributes = [])
    {
        return app('meta')->property($name, $content, $attributes);
    }
}