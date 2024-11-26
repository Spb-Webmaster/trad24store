<?php

namespace App\Http\Controllers;


use App\Models\Diplom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
//use File;
use Illuminate\Http\File;



class TestController extends Controller
{

    public function test()
    {

        dd('stop');

        foreach (config2('moonshine.user.users') as $user) {

                //dd(Storage::disk('public')->path($user['avatar']));
                //$p = $this->mk_dir($user);

                $users[] = User::updateOrCreate([
                    'email' => $user['email']
                ], [
                    'name' => $user['username'],
                    'username' => $user['username'],
                    //  'password' => ($user['password'])?bcrypt($user['password']):'511111',
                    //   'email' => $user['email'],
                    'phone' => phone($user['phone']),
                    'user_idcard' => $this->files($user['doc1']),
                    'user_judge' => $this->files($user['doc2']),
                    'user_crazy' => $this->files($user['doc3']),
                    'user_diplom' => $this->files($user['doc4']),
                    'user_cert_mediator' => $this->files($user['doc5']),
                    'user_special_cert_mediator' => $this->files($user['doc6']),
                    'user_mediator_trener' => $this->files($user['doc7']),
                    'user_registered' => $this->files($user['doc8']),
                    'user_statute' => $this->files($user['doc9']),
                    'user_order_head' => $this->files($user['doc10']),

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
