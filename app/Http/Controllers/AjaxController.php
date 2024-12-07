<?php

namespace App\Http\Controllers;

use App\Events\BidFormEvent;
use App\Events\FeedbackFormEvent;
use App\Events\OrderCallBlueFormEvent;
use App\Events\OrderCallEvent;

use App\Events\SingUpLessonFormEvent;
use App\Models\User;

use Domain\Comment\ViewModels\CommentViewModel;
use Domain\Diplom\ViewModels\DiplomViewModel;
use Domain\Timetable\ViewModels\TimetableViewModel;
use Domain\User\ViewModels\UserViewModel;
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
     * Метод отправки сообщения "Отправить заявку" мадальное окно -  форма
     */

    public function bid(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'min:5'],
            'email' => ['required', 'email', 'email:dns'],
        ]);

        if ($validator->passes()) {


            /**
             * Событие отправка сообщения админу (Отправить заявку)
             */

            BidFormEvent::dispatch($request);

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
     * Метод  получения session (город)
     */

    public function city(Request $request)
    {

        session(['city_city' => $request->city]);
        session(['city_phone' => $request->phone]);

        /**
         * возвращаем назад в браузер
         */

        return response()->json([
            'city' => $request->city
        ]);

    }


    /**
     * Метод  поиска дипломов
     */

    public function search_diplom(Request $request)
    {

        $title = ($request->title) ?: null; // номер диплома
        $name = ($request->name) ?: null; // ФИО

        $result = DiplomViewModel::make()->search($title, $name);

        $str = DiplomViewModel::make()->render($result);


        /**
         * возвращаем назад в браузер
         */

        return response()->json([
            'result' => $result,
            'html' => $str,
        ]);

    }


    /**
     * Метод  переадресации на стрнаицу горола с  месяцем в расписании
     */

    public function redirect_city_mounth(Request $request)
    {

        $city = ($request->city) ?: null; // город
        $mounth = ($request->mounth) ?: null; // месяц
        if ($mounth) {
            session(['mounth' => $mounth]);
        }

        $route = route('timetable_city', ['slug' => $city]);


        /**
         * возвращаем назад в браузер
         */

        return response()->json([
            'route' => $route,
        ]);


    }

    /**
     * Метод  вывода расписания  на стрнаицу города с  месяцем
     */

    public function redirect_mounth_city(Request $request)
    {

        $city = ($request->city) ?: null; // город
        $mounth = ($request->mounth) ?: null; // месяц

        $timetable_city = TimetableViewModel::make()->timetable_city($city);
        $str = TimetableViewModel::make()->timetable_city_lessons_month($timetable_city, $mounth);


        /**
         * возвращаем назад в браузер
         */

        return response()->json([
            'html' => $str,
        ]);


    }


    /**
     * Метод отправки сообщения "Отправить заявку" мадальное окно -  форма
     */

    public function sing_up_lesson(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'min:5'],
            'email' => ['required', 'email', 'email:dns'],
        ]);

        if ($validator->passes()) {


            /**
             * Событие отправка сообщения админу (Отправить заявку)
             */

            SingUpLessonFormEvent::dispatch($request);

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
     * Метод отправки сообщения "Отзыв" мадальное окно -  форма
     */

    public function feedback(Request $request)
    {



        $user = UserViewModel::make()->feedback_user_session();

        if (count($user)) {
            $request->request->add($user);
            $stars = CommentViewModel::make()->rating($user['user_id']); // пересчет рейтинга

        }




        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'min:5'],
            'email' => ['required', 'email', 'email:dns'],
            'feedback' => ['required'],
        ]);

        if ($validator->passes()) {



            /**
             * Событие отправка сообщения админу (Отзыв о медиаторе)
             */

            FeedbackFormEvent::dispatch($request);

            CommentViewModel::make()->store($request);

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
