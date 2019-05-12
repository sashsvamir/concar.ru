<?php

namespace App;

use Illuminate\Http\Request;


/**
 * This class used by middleware OldRedirect to obtain redirect info.
 *
 * @package App
 */
class OldRedirect
{
    /**
     * Name of config file with redirect mappings placed in config directory
     *
     * @var string
     */
    public static $configName = 'old_redirect_map.php';

    /**
     * Prepare redirect url if founded
     *
     * @param  Request  $request
     * @return string|null
     */
    public static function getRedirect(Request $request)
    {
        $pathInfo = $request->getPathInfo();

        $redirect_map = static::getConfig();

        // if request old links
        $param = $request->query->get('a');
        if ($param && in_array($pathInfo, ['/', '/main.php'])) {
            foreach ($redirect_map as $oldUri => $newUri) {
                if ((string) $oldUri === $param) {
                    return $newUri; // redirect url
                }
            }
        }

        // if request old main page
        if ($request->getRequestUri() === '/main.php') {
            return '/'; // redirect url
        }

        // if request old form
        if ($request->getRequestUri() === '/form.php') {
            return 'http://intermehanika.ru/feedback'; // redirect url
        }

        // if redirect not found
        return null;
    }

    /**
     * Retrieve list key value params of redirects
     *
     * @return array
     */
    protected static function getConfig()
    {
        return require(config_path() . DIRECTORY_SEPARATOR . self::$configName);
    }

}
