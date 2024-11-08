<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Support\Flash\Flash;
use Illuminate\Support\Facades\Route;


if (!function_exists('flash')) {

    function flash(): Flash
    {
        return app(Flash::class);
    }
}


/**
 * Телефон
 */

if (!function_exists('format_phone')) {

    function format_phone($from): string
    {
        if ($from) {
            $to = sprintf("%s (%s) %s-%s-%s",
                substr($from, 0, 1),
                substr($from, 1, 3),
                substr($from, 4, 3),
                substr($from, 7, 2),
                substr($from, 9)
            );
            return '+' . $to;
        }
        return '';
    }
}

/**
 * Телефон вырезаем из телефона все, кроме цифр
 */
if (!function_exists('phone')) {
    function phone(string $phone = null): string|int
    {
        return trim(preg_replace('/^1|\D/', "", $phone));
    }
}

/**
 * Более корректная дата рождения birthdate
 */
if (!function_exists('birthdate')) {
    function birthdate(string $birthdate = null): string|int|null
    {
        if($birthdate == '1970-01-01') {
            return null;
        }
        $date = new DateTime($birthdate);
        $formattedDate = $date->format('d.m.Y');
        return $formattedDate;
    }
}

/**
 * Slug Формируем slug  Версия 1
 */
if (!function_exists('slugCheck')) {

    function slugCheck($str, Model $model)
    {
        $placeObj = $model;

        $businessName = $str; //Input from User
        $businessNameURL = Str::slug($businessName, '-'); //Convert Input to Str Slug

        //Check if this Slug already exists
        $checkSlug = $placeObj->whereSlug($businessNameURL)->exists();

        if ($checkSlug) {
            //Slug уже существует.
            //Добавьте числовой префикс в конце. Начиная с 1
            $numericalPrefix = 1;

            while (1) {
                //Check if Slug with final prefix exists.

                $newSlug = $businessNameURL . "-" . $numericalPrefix++; //new Slug with incremented Slug Numerical Prefix
                $newSlug = Str::slug($newSlug); //String Slug


                $checkSlug = $placeObj->whereSlug($newSlug)->exists(); //Check if already exists in DB
                //This returns true if exists.

                if (!$checkSlug) {

                    //There is not more coincidence. Finally found unique slug.
                    $slug = $newSlug; //New Slug

                    break; //Break Loop

                }


            }

        } else {
            //Slug do not exists. Just use the selected Slug.
            $slug = $businessNameURL;
        }

        return $slug;
    }


}

/**
 * Slug Формируем slug  Версия 2
 */
if (!function_exists('createSlug')) {
    function createSlug($title, $model)
    {
        $slug = Str::slug($title, '-');
        $count = $model::query()->where('slug', 'LIKE', "{$slug}%")->count();
        $newCount = $count > 0 ? ++$count : '';
        return $newCount > 0 ? "$slug-$newCount" : $slug;
    }
}

/**
 * Удаляем кэш
 */
if (!function_exists('cache_clear ')) {

    function cache_clear($model = null)
    {
        Cache::forget('home');
        Cache::forget('cities');
        Cache::forget('companies');
        Cache::forget('companies_options');

    }
}

/**
 * День рождения
 */
if (!function_exists('birthdate')) {

    function birthdate($birthdate, $integer = null): string
    {
        if ($birthdate) {

            $birthday = new DateTime($birthdate);
            $interval = $birthday->diff(new DateTime);
            $int = $interval->y;
            if ($integer) {
                return (int)$int; // сокращенный вариант
            }
            $date = new DateTime($birthdate);
            $formattedDate = $date->format('d.m.Y');
            return $formattedDate . ' (' . $int . ')';


        }
        return '';
    }
}

if (!function_exists('rusbirthdate')) {

    function rusbirthdate($birthdate): string
    {
        if ($birthdate) {

            $birthday = new DateTime($birthdate);
            $interval = $birthday->diff(new DateTime);
            $int = $interval->y;
            $date = new DateTime($birthdate);
            $formattedDate = $date->format('d.m.Y');
            return $formattedDate;


        }
        return '';
    }
}

/**
 * города получаем по id
 */
if (!function_exists('city')) {

    function city($id)
    {

        $city = City::select('id', 'city')->where('id', $id)->first();

        return (isset($city->city))?$city->city:'-';
    }
}
/**
 * С папками удаление
 */
if (!function_exists('clearFolder')) {

    function clearFolder($path, $disk)
    {

        if (Storage::disk($disk)->directoryExists($path)) {

            $folderPath = public_path('storage/' . $disk . '/' . $path);

            File::deleteDirectory($folderPath);

            return __('Папка успешно очищена и удалена.');

        }
        return __('Папка не существует, файлов не было удалено.');


    }
}

/**
 * С папками удаление
 */

if (!function_exists('num2word')) {

    function num2word($num, $words)
    {
        $num = $num % 100;
        if ($num > 19) {
            $num = $num % 10;
        }
        switch ($num) {
            case 1:
            {
                return ($words[0]);
            }
            case 2:
            case 3:
            case 4:
            {
                return ($words[1]);
            }
            default:
            {
                return ($words[2]);
            }
        }
    }


}


if (!function_exists('active_link')) {
    function active_link(string|array $names, string $class = 'active'): string|null
    {

        if (is_string($names)) {
            $names = [$names];
        }
        return Route::is($names) ? $class : null;
    }
}


if (!function_exists('active_linkMenu')) {
    function active_linkMenu($url, string $find = null, string $class = 'active'): string|null
    {
        if ($find) {

            if (str_starts_with(url()->current(), trim($url))) {
                return $class;
            }
            return null;

        }


        return ($url == url()->current()) ? $class : null;
    }
}
if (!function_exists('active_linkParse')) {
    function active_linkParse($url, string $find = null, string $class = 'active'): string|null
    {


        $parse_url = parse_url(url()->current(), PHP_URL_PATH) ?? '/';

        if ($parse_url == '/') {
            /** * мы на главной  */
            if ($url == $parse_url) {
                return $class;
            }
        }

        if ($find) {
            if ($url == '/') {
                /** * мы на главной (дальше не ходим) */
                return null;
            }
            if (str_starts_with(parse_url(url()->current(), PHP_URL_PATH), trim($url))) {
                return $class;
            }
            return null;
        }


        return ($url == url()->current()) ? $class : null;
    }
}


/**
 *  route_name
 */

if (!function_exists('route_name')) {
    function route_name(): string|null
    {

        return Route::currentRouteName();
    }
}


/**
 *  shortcode
 */

if (!function_exists('shortcode')) {
    function shortcode($html)
    {
        preg_match_all("/\{(.+?)\}/", $html, $matches);
        if ($matches[1]) {
            foreach ($matches[1] as $match) {
                //dd($match);
                $html = str_replace('{' . $match . '}', '<embed style="width: 100%" width="100%" height="480" src="https://www.youtube.com/embed/' . $match . '" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></embed>', $html);
            }
            //  return implode(',', $matches[1]);
            return $html;
        }
        return $html;
    }
}


/**
 *  работа с датами
 */

if (!function_exists('rusdate')) {
    function rusdate($date): string|null
    {
        $timestump = strtotime($date);

        $month = [1 => "Янв", 2 => "Фев", 3 => "Мар", 4 => "Апр", 5 => "Май", 6 => "Июн", 7 => "Июл", 8 => "Авг", 9 => "Сен", 10 => "Окт", 11 => "Ноя", 12 => "Дек"];
        $return = date('d', $timestump);
        $return .= " " . $month[date('n', $timestump)];

        return $return;
    }
}


if (!function_exists('rusdate2')) {
    function rusdate2($date): string|null
    {
        $timestump = strtotime($date);
        $month = [1 => "янв.", 2 => "фев.", 3 => "мар.", 4 => "апр.", 5 => "май", 6 => "июн.", 7 => "июл.", 8 => "авг.", 9 => "сен.", 10 => "окт.", 11 => "ноя.", 12 => "дек."];

        $days = ['(вс)', '(пн)', '(вт)', '(ср)', '(чт)', '(пт)', '(сб)'];

        $day = $days[date("w", $date)];
        $m = $month[date('n', $timestump)];
        $d = date('d', $timestump);

        return $d . ' ' . $m . ' ' . $day;

    }
}


if (!function_exists('rusdate3')) {
    function rusdate3($date): string|null
    {
        $timestump = strtotime($date);
        $month = [1 => "января", 2 => "февраля", 3 => "марта", 4 => "апреля", 5 => "мая", 6 => "июня", 7 => "июля", 8 => "августа", 9 => "сентября", 10 => "октября", 11 => "ноября", 12 => "декабря"];

        $days = ['(вс)', '(пн)', '(вт)', '(ср)', '(чт)', '(пт)', '(сб)'];

        $day = $days[date("w", strtotime($date))];
        $m = $month[date('n', $timestump)];
        $y = date('Y', $timestump);
        $d = date('d', $timestump);

        return $d . ' ' . $m . ' ' . $y . ' г.';

    }
}


/**
 *  currency
 */

if (!function_exists('currency')) {
    function currency($cur)
    {
        foreach (config('currency.currency') as $k => $currency) {
            if ($k == $cur) {
                return $currency;
            }
        }
        return '';
    }
}

/**
 *  цены
 */

if (!function_exists('price')) {
    function price($price)
    {
        $price =  (int)$price;
        if(is_int($price)) {
            return number_format($price, 0, '.', ' ');
        }
        return $price;
    }

}

/**
 *  получение переменных из папки storage
 */

if (!function_exists('config2')) {
    function config2($path =  null)
    {
        if(is_null($path)) {
            return '';
        }
        $ar = explode(".", $path);

        $p = array_pop($ar); // последний элемент, это нужный ключ массива
        $storage_congig = implode("/", $ar).'.php'; // складываеи в строку, и добавляем '.php', получаем точный путь файла

        if (Storage::disk('config')->exists($storage_congig)) {
            $result = include(storage_path('app/public/config/'. $storage_congig));
            // если есть такой файл, то получим содержимое (должен быть массив (return array))
        } else {
            return '';
        }


        return (isset($result[$p]))? $result[$p] : '';
    }

}




if (!function_exists('config2_array')) {
    function config2_array($path =  null):array|null
    {
        if(is_null($path)) {
            return null;
        }
        $ar = explode(".", $path);


        $storage_congig = implode("/", $ar).'.php'; // складываеи в строку, и добавляем '.php', получаем точный путь файла

        if (Storage::disk('config')->exists($storage_congig)) {
            $result = include(storage_path('app/public/config/'. $storage_congig));
            // если есть такой файл, то получим содержимое (должен быть массив (return array))
        } else {
            return null;
        }


        return (isset($result))? $result : null;
    }

}


/**
 * url2
 */
if (!function_exists('url2')) {

    function url2()
    {
        $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        $url = $url[0];
        return $url;
    }
}

/**
 * intervention
 */

if (!function_exists('intervention')) {
    function intervention(string $size, string $image = null, string $dir = 'countries', string $method = 'cover')
    {
        if (!$image) {
            return null;
        }
        if (!File::exists(public_path('storage/' . $image))) {
            return null;
        }

        // $dir = 'countries';
        // $method = 'fit'; // 'resize|crop|fit'
        $file = File::basename($image);

        // dd($image);
        abort_if(!in_array($size, config('thumbnail.allowed_sizes', [])),
            403,
            'size not allowed'
        );


        $storage = Storage::disk('intervention');


        $realPath = $image;
        $newDirPath = "$dir/$method/$size";
        $resultPaht = "$newDirPath/$file";

        if (!$storage->exists($newDirPath)) {
            $storage->makeDirectory($newDirPath);
        }


        if (!$storage->exists($resultPaht)) {

            $image = Image::read($storage->path($realPath));


            [$w, $h] = explode('x', $size);
            if ($h == 0) {
                $image->{$method}(width: $w);
            } else {
                $image->{$method}($w, $h);

            }


            $image->save($storage->path($resultPaht));


        }


        return 'storage/' . $resultPaht;

    }
}



