<?php
    namespace App\Utilities;

    use Illuminate\Support\Facades\Request;

    class AppLanguage
    {
        public static function languageUrl($languageCode)
        {
            $pathData = [];
            $path = Request::getPathInfo();
            if ($languageCode != config('app.default_language')) {
                $pathData[] = $languageCode;
            }

            $pathData[] = ltrim($path, '/vi/en');
            $pathStr = implode('/', $pathData);

            return url($pathStr);
        }
    }
