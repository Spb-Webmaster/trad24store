<?php

namespace App\Http\Controllers;

use App\Events\OrderCallBlueFormEvent;
use App\Events\OrderCallEvent;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AjaxController extends Controller
{


    /**
     * Метод отправки сообщения "Заказать звонок"
     */

    public function OrderCall(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'min:5']
        ]);

        if ($validator->passes()) {

            /**
             * Событие отправка сообщения админу (заказ звонка)
             */

            OrderCallEvent::dispatch($request);

            /**
             * возвращаем назад в браузер
             */

            return response()->json([
                'request' => $request

            ]);
        }

        return response()->json(['error' => $validator->errors()]);

    }


    /**
     * Метод отправки сообщения "Заказать звонок" синяя форма
     */

    public function OrderCallBlue_form(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'min:5'],
            'email' => ['required', 'email', 'email:dns'],
        ]);

        if ($validator->passes()) {

            /**
             * Событие отправка сообщения админу (заказ звонка)
             */

            OrderCallBlueFormEvent::dispatch($request);

            /**
             * возвращаем назад в браузер
             */

            return response()->json([
                'request' => $request

            ]);
        }

        return response()->json(['error' => $validator->errors()]);

    }



    /**
     * Метод загрузки Аватара
     */
    public function uploadAvatar(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'upload_f' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:6096'
        ]);

        if ($validator->fails()) {
            $resp["success"] = false;
            $resp["err"] = $validator->errors()->first('upload_f');
            return json_encode($resp);
        }

        $puth_avatar = false;

        if ($request->hasFile('upload_f')) {

            $storage = Storage::disk('public');
            $destinationPath = 'users/' . auth()->user()->id . '/avatar';

            if (!$storage->exists($destinationPath)) {
                $storage->makeDirectory($destinationPath);
            } else {
                $success = Storage::deleteDirectory($destinationPath);
            }

            $file = $request->file('upload_f');
            $newFileName = $file->getClientOriginalName();
            $file->storeAs($destinationPath, $newFileName);
            $puth_avatar = $destinationPath . '/' . $newFileName; // для БД

        }

        if (!$puth_avatar) {
            $avatar = (auth()->user()->avatar) ?: '';

        } else {
            $avatar = $puth_avatar;
        }

        $user = User::query()
            ->where('id', auth()->user()->id)
            ->update([
                'avatar' => $avatar,
            ]);

        $resp = array();
        $resp['success'] = true;
        $resp['mess'] = "Документы успешно загружены";
        $resp['avatar'] = Storage::disk('public')->url($avatar);


        /**
         * возвращаем назад в браузер
         */

        return response()->json([
            'success' => $resp['success'],
            'mess' => $resp['mess'],
            'avatar' => $resp['avatar'],

        ]);

    }



}
