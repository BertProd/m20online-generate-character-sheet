<?php

namespace M20Sheet\Composer\Helper;

use Composer\Script\Event;

final class BootstrapHelper
{
    private const ASSETS_DIR_NAME = 'assets';
    private const ASSETS_CSS_DIR_NAME = 'css';
    private const ASSETS_JS_DIR_NAME = 'js';

    private static function getPathPublic (Event $pEvent) : string
    {
        $vendorDir = $pEvent->getComposer()->getConfig()->get('vendor-dir');

        return $vendorDir . '/../public';
    }

    private static function createDir (string $pPath) : void
    {
        if (true === is_dir($pPath)) {
            return;
        }

        mkdir($pPath);
    }

    private static function createArchitecture (Event $pEvent) : void
    {
        $pathPublicDir = self::getPathPublic($pEvent);

        $dirs = [
            $pathPublicDir.'/'.self::ASSETS_DIR_NAME,
            $pathPublicDir.'/'.self::ASSETS_DIR_NAME.'/'.self::ASSETS_CSS_DIR_NAME,
            $pathPublicDir.'/'.self::ASSETS_DIR_NAME.'/'.self::ASSETS_JS_DIR_NAME
        ];

        foreach ($dirs as $dir) {
            self::createDir($dir);
        }
    }

    public static function deployBootstrap(Event $pEvent) : void
    {
        self::createArchitecture($pEvent);

        $pathPublicDir = self::getPathPublic($pEvent);
        $cssDir = $pathPublicDir.'/'.self::ASSETS_DIR_NAME.'/'.self::ASSETS_CSS_DIR_NAME;
        $jsDir = $pathPublicDir.'/'.self::ASSETS_DIR_NAME.'/'.self::ASSETS_JS_DIR_NAME;

        $vendorDir = $pEvent->getComposer()->getConfig()->get('vendor-dir');
        $distDir = $vendorDir.'/twbs/bootstrap/dist';
        $sourceCssFile = $distDir.'/css/bootstrap.min.css';
        $sourceJsFile = $distDir.'/js/bootstrap.min.js';

        copy($sourceCssFile, $cssDir.'/bootstrap.min.css');
        copy($sourceJsFile, $jsDir.'/bootstrap.min.js');
    }
}
