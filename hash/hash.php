<?php

class InternalVerify
{
    private static $folders = [
        '/public/' => [],
        '/vendor/' => [
            '/vendor/**/.git/**',
            '/vendor/**/tests/**',
        ],
        '/artisan' => [],
        '/app/' => [],
        '/config/' => [],
        '/resources/' => [],
        '/routes/' => [],
    ];

    public static function getDirContents($base, $path, $ignores)
    {
        $files = [];
        $fullBase = $base . $path;

        if (\substr($fullBase, -1) !== '/') {
            return [\realpath($fullBase)];
        }

        foreach ($ignores as $key => $value) {
            $ignores[$key] = $base . $value;
        }

        foreach (new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($fullBase)) as $file) {
            $continue = false;
            $pathName = $file->getPathname();

            foreach ($ignores as $ignore) {
                if (\fnmatch($ignore, $pathName)) {
                    $continue = true;
                    break;
                }
            }

            if ($continue) {
                continue;
            }

            if (! $file->isDir()) {
                $filePath = \realpath($pathName);
                if ($filePath) {
                    $files[] = $filePath;
                } else {
                    echo \sprintf("Missing `$pathName' \n");
                }
            }
        }

        return $files;
    }

    public static function hashFiles(...$filesList)
    {
        $md5Out = [];

        foreach ($filesList as $files) {
            \sort($files);

            $md5s = [];

            foreach ($files as $file) {
                $md5s[] = \filesize($file) . ':' . \md5_file($file);
            }

            $md5Out[] = \count($files) . '::' . \implode('|', $md5s);
        }

        return \md5(\implode('|', $md5Out));
    }

    public static function sign() {
        return static::hashFiles(...static::getFiles());
    }

    public static function make() {
        $sign = static::sign();

        $result = \file_put_contents(__DIR__ . '/hash.sign', $sign);

        return $result === false ? "" : $sign;
    }

    public static function verify() {
        $sign = static::sign();

        $existing = \trim(\file_get_contents(__DIR__ . '/hash.sign'));

        return $existing === $sign;
    }

    private static function getFiles()
    {
        $filesOfFiles = [];

        foreach (static::$folders as $path => $ignores) {
            $filesOfFiles[] = static::getDirContents(__DIR__ . '/..', $path, $ignores);
        }

        return $filesOfFiles;
    }
}
