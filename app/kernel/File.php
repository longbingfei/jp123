<?php

namespace App\Kernel;
class File
{
    public static function loadConfig($path)
    {
        $path = array_filter((array)$path);
        if (empty($path)) {
            return [];
        }
        $config = [];
        array_map(function ($y) use (&$config) {
            $exp = explode('.', $y);
            if (count($exp) > 1 && end($exp) === 'php') {
                $key = explode(DS, $exp[0]);
                $config[end($key)] = self::loadPHPConfig($y);
            } else {
                self::loadEnv($y);
            }

        }, $path);
        return $config;
    }

    public static function loadPHPConfig($path)
    {
        return file_exists($path) ? include $path : [];
    }

    public static function loadEnv($path, $replace = true, $symbol = '=')
    {
        $envs = file_exists($path) ? file($path) : [];
        if (empty($env)) {
            foreach ($envs as $vo) {
                $arr = array_filter(explode($symbol, $vo));
                if (count($arr) === 2) {
                    if (!$replace && getenv($arr[0]) !== '') {
                        continue;
                    }
                    putenv(implode('=', $arr));
                }
            }
        }
    }
}