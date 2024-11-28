<?php

namespace App\Http\Controllers;


use App\Models\Diplom;
use App\Models\User;
use App\Models\UserCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
//use File;
use Illuminate\Http\File;



class TestController extends Controller
{

    public function test()
    {

dd(config2('moonshine.user.users'));




        foreach (config2('moonshine.user.users') as $user) {




                $vidy_medi = $user['vidy_medi'];
                $language = $user['language'];
                $city = $user['sity'];


                // $this->belongs_to_many_list($vidy_medi, $user['email']);
              //  $this->belongs_to_many_language($language, $user['email']);
                //  $this->belongs_to_many_city($city, $user['email']);


                $users[] = User::updateOrCreate([
                    'email' => $user['email']
                ], [
                    'name' => $user['username'],
                    'username' => $user['username'],
                  // 'sex' => $user['sex'],
                   // 'teacher' => ($user['prepodav'])?1:0,
                    'active_contact' => $user['switch_1'],
                    //   'sphere' => $user['sfera'],
                    //  'user_type_id' => 1,
                    //  'password' => ($user['password'])?bcrypt($user['password']):'511111',
                    //   'email' => $user['email'],
                    /*                    'phone' => phone($user['phone']),
                                        'user_idcard' => $this->files($user['doc1']),
                                        'user_judge' => $this->files($user['doc2']),
                                        'user_crazy' => $this->files($user['doc3']),
                                        'user_diplom' => $this->files($user['doc4']),
                                        'user_cert_mediator' => $this->files($user['doc5']),
                                        'user_special_cert_mediator' => $this->files($user['doc6']),
                                        'user_mediator_trener' => $this->files($user['doc7']),
                                        'user_registered' => $this->files($user['doc8']),
                                        'user_statute' => $this->files($user['doc9']),
                                        'user_order_head' => $this->files($user['doc10']),*/

                    /* 'avatar' => $p,
                                  'company' => $user['company'],
                                   'city' => $user['sity'],
                                   'home' => $user['home'],
                                   'street' => $user['street'],
                                   'office' => $user['office'],
                                   'oput' => $user['oput'],
                                   'dop' => $user['dop'],
                                   'telegram' => $user['telegram'],
                                   'whatsapp' => $user['whatsapp'],
                                   'instagram' => $user['instagram'],
                                   'social' => $user['social'],
                                   'website' => $user['website'],*/
                ]);

            }




        return view('pages.test');
    }

    public function belongs_to_many_list($vidy_medi, $email) {
        $array = explode(",", $vidy_medi);
        $list = array();
        foreach ($array as $k=>$v) {
            if($v == 'Уголовная') {
                $list[$k] = 1;
            }

            if($v == 'Гражданская') {
                $list[$k] = 2;
            }
            if($v == 'Ювенальная') {
                $list[$k] = 3;
            }
            if($v == 'Семейная') {
                $list[$k] = 4;
            }
            if($v == 'Корпоративная') {
                $list[$k] = 5;
            }
            if($v == 'Трудовые споры') {
                $list[$k] = 6;
            }
            if($v == 'Банковские споры') {
                $list[$k] = 7;
            }

        }
        if($list) {
            $us = User::query()->where('email', $email)->first();
            $us->user_list()->sync($list);
        }
    }

    public function belongs_to_many_language($lang, $email) {
        $array = explode(",", $lang);
        $list = array();
        foreach ($array as $k=>$v) {

            if($v == 'Русский') {
                $list[$k] = 1;
            }

            if($v == 'Казахский') {
                $list[$k] = 2;
            }
            if($v == 'Английский') {
                $list[$k] = 3;
            }

        }



        if($list) {
            $us = User::query()->where('email', $email)->first();
            $us->user_language()->sync($list);
        }
    }

    public function belongs_to_many_city($city, $email) {


        $user_cities = UserCity::query()->get();
        $list = array();

        foreach ($user_cities as $k=>$v) {

            if($v->title == $city) {
                $list[$k] = $v->id;


            }

        }

        if($list) {
            $us = User::query()->where('email', $email)->first();
            $us->user_city()->sync($list);
        }
    }

    public function files($doc) {

        $res = array();
        if($doc) {
            $array = explode(",", $doc);
            $doc1 = array();
            foreach ($array as $d)
            {

                $destinationPath = 'storage'. $d;
                /*                        $size = Storage::size($d);
                                          $mimeType = Storage::mimeType($d);  */


                if (\File::exists($destinationPath)) {

                    // File::copy($destinationPath, Storage::disk('public')->path('doc'));

                    $path = Storage::putFile('doc', new File($destinationPath));
                    $res[] = array('json_file_file' => $path);
                }
            }

            return $res;

        }
        return $res;
    }

    public function mk_dir($user) {
        $us = User::query()->where('email', $user['email'])->first();
        if ($us) {
            $p = '/users/' . $us->id . '/avatar/avatar.jpg';
            $path = '/users/' . $us->id . '/avatar';

            Storage::disk('public')->makeDirectory($path);
            //  dd(Storage::disk('public')->path($user['avatar']));
            $destinationPath = Storage::disk('public')->path($user['avatar']);

            if (File::exists($destinationPath)) {

                File::copy($destinationPath, Storage::disk('public')->path($p));
            } else {
                $p = '';
            }
        } else {
            $p = '';
        }

        return $p;

    }

}
