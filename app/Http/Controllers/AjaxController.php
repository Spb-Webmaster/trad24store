<?php

namespace App\Http\Controllers;

use App\Events\Feedback\FeedbackFormEvent;
use App\Events\Form\BidFormEvent;
use App\Events\Form\OrderCallBlueFormEvent;
use App\Events\Form\OrderCallEvent;
use App\Events\Lesson\SingUpLessonFormEvent;
use App\Events\UserUpdate\UploadUserDocsFormEvent;
use App\Exports\ReportExport;
use App\Models\User;
use Domain\Comment\ViewModels\CommentViewModel;
use Domain\Diplom\ViewModels\DiplomViewModel;
use Domain\Report\ViewModels\ReportExcel;
use Domain\Timetable\ViewModels\TimetableViewModel;
use Domain\User\ViewModels\UserFilesViewModel;
use Domain\User\ViewModels\UserViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

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


        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'min:5'],
            'email' => ['required', 'email', 'email:dns'],
            'feedback' => ['required'],
        ]);
        if ($validator->passes()) {

            /* dump($request->all());
             dump(session('feedback_user'));*/

            $user = UserViewModel::make()->feedback_user_session();
            /** пользователь для которого нужны результаты */

            if (count($user)) {
                $request->request->add($user);
                /** добавляем   **/
                $stars = CommentViewModel::make()->rating($user['user_id']);
                /**  пересчет рейтинга */

            }


            /**
             * Событие отправка сообщения админу (Отзыв о медиаторе)
             */


            CommentViewModel::make()->store($request);
            /** сохраним отзыв  **/

            FeedbackFormEvent::dispatch($request);
            /** событие, отправка админу  **/


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
     * Метод загрузки документов
     */

    public function uploadDocs(Request $request)
    {


        $files = $request->file('file');


        $user_id = auth()->user()->id;

        if (!$user_id) {
            dd('Нет  Auth()->user()->id');
        }

        $field = ($request->field) ?: null;

        if (!$field) {
            dd('Нет  $request->field');
        }

        if ($files) {
            $count = count($files);
            $storage = Storage::disk('public');
            $destinationPath = 'users/' . $user_id . '/docs';

            if (!$storage->exists($destinationPath)) {
                $storage->makeDirectory($destinationPath);
            }

            // $success = Storage::deleteDirectory($destinationPath); // удалять паку не будем

            foreach ($files as $k => $file) {


                $newFileName = $file->getClientOriginalName();
                $file->storeAs($destinationPath, $newFileName);
                $puth_files[$k]['json_file_file'] = $destinationPath . '/' . $newFileName; // для БД

            }
        } else {
            dd('Нет  $request->file(\'file\')');
        }


        /** слияние ранее загружанных файлов */
             $uploaded_files = UserFilesViewModel::make()->user_get_files($user_id, $field, $count); //получим все ранее загркженный файлы


                $user_files_field = array(); // создадим новаый массив для слияния

                if(!is_null($uploaded_files)) {

                    $user_files_field = array_merge($uploaded_files, $puth_files); // слияние массивов

                } else {

                    $user_files_field = $puth_files; // если ранее загруженных файлов нет, то берет, то, что сейчас загрузили
                }

        /** слияние ранее загружанных файлов  - решил не делать */



        $user = User::find($user_id);

        $user->$field = $user_files_field; /** все новые файлы */

        $user->published = 0;   /** снять с пуликации **/

        $user->save();


        $new_files = UserFilesViewModel::make()->json_files($user->$field);


        $user_files_field = array_merge(['files' => $puth_files], ['id' => $user->id]); /** на модерацию тольлко загруженные */

        /** добавим id пользователя */
        UploadUserDocsFormEvent::dispatch($user_files_field);
        /** событие, создание токена, отправка админу  **/

        /**
         * возвращаем назад в браузер
         */

        return response()->json([
            'request' => $request,
            'new_files' => $new_files,
        ]);


    }


    /**
     * Метод удаления и обновления документов
     */

    public function deleteDocs(Request $request)
    {

        //dump($request->all());

        if ($request->delete) {
            Storage::delete(trim($request->delete));
        }

        $files = $request->file;

        $user_id = auth()->user()->id;

        if (!$user_id) {
            dd('Нет  Auth()->user()->id');
        }

        $field = ($request->field) ?: null;

        if (!$field) {
            dd('Нет  $request->field');
        }

        $user = User::find($user_id);

        if ($files) {
            $count = count($files);
            $storage = Storage::disk('public');
            $destinationPath = 'users/' . $user_id . '/docs';

            if (!$storage->exists($destinationPath)) {
                $storage->makeDirectory($destinationPath);
            }

            // $success = Storage::deleteDirectory($destinationPath); // удалять паку не будем

            foreach ($files as $k => $file) {

                $puth_files[$k]['json_file_file'] = $file; // для БД

            }


            $user->$field = $puth_files;
            $user->save();

        } else {

            $user->$field = [];
            $user->save();
        }


        /**
         * возвращаем назад в браузер
         */

        return response()->json([
            'request' => $request
        ]);


    }

    /**
     * Метод создания excel отчета за определенный периуд
     */

    public function generate_excel(Request $request)
    {

        $session_user = $request->session()->get('user');

        /**
         *  Проверка совпадения сессии и $request->id
         */
        if ($session_user == $request->id) {


            $validator = Validator::make($request->all(), [
                'from' => ['required'],
                'to' => ['required'],
            ]);
            if ($validator->passes()) {

                $dates = $request->toArray();

                $filename = User::find($dates['id'])->user . '-'. $dates['from'] .'-'.$dates['to'].'.xlsx';

                  $result =  Excel::store(new ReportExport($dates), $filename, 'export');


                /**
                 * возвращаем назад в браузер
                 */

                return response()->json([
                    'request' => $request,
                    'result' => $result,
                    'file' => $filename,
                    'filename' => '/storage/export/'.$filename
                ]);

            }
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
                'published' => 0/** снять с пуликации **/
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
