<?php

namespace Domain\User\ViewModels;


use App\Models\User;
use App\Models\UserCity;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Support\Traits\Makeable;

class UserFilesViewModel
{
    use Makeable;

    /**
     * @param $files
     * @return array
     * получение массива с данными о файлах пользователя по определенному полю
     */
  public function json_files($files):array {
      $array = array();
      foreach ($files as $k => $file) {



          if($file['json_file_file']) {

              $array[$k]['ext'] = pathinfo(Storage::url($file['json_file_file']), PATHINFO_EXTENSION); // расширение
              $array[$k]['link'] = Storage::url($file['json_file_file']); // ссылка
              $array[$k]['file'] = $file['json_file_file']; // файл
              $array[$k]['html'] = $this->render($array[$k]['ext'], $array[$k]['link'], $array[$k]['file']); // html



          }


      }
      return $array;

  }

    /**
     * @param $ext
     * @return string
     * проверка и получения расширения файла в виде строки (иконка)
     */

  public function ext($ext):string {

      if($ext == 'jpg' || $ext == 'jpeg') {
          $e = 'jpg';
      }
      if($ext == 'png' || $ext == 'svg') {
          $e = 'png';

      }
      if($ext == 'pdf') {
          $e = 'pdf';
      }
      if($ext == 'doc' || $ext == 'docx' || $ext == 'dotx' || $ext == 'dot' || $ext == 'docm' || $ext == 'dotm') {
          $e = 'doc';
      }
      if($ext == 'xml' || $ext == 'txt' || $ext == 'xlsx' || $ext == 'xls' || $ext == 'xltx' || $ext == 'xlt'|| $ext == 'xlsm' || $ext == 'xltm' || $ext == 'xlsb' || $ext == 'xps'|| $ext == 'htm' || $ext == 'html' || $ext == 'csv' || $ext == 'csv') {
          $e = 'excel';
      }

      $image = (Storage::url('images/icons/'. $e.'.svg'))?:'/storage/images/icons/excel.svg';

      return $image;
  }

    /**
     * @param $ext
     * @param $link
     * @return string
     * получения готового html кода одного файла, с возможностью скачать. Имя файла добавим в js
     */

  public function render($ext, $link, $file):string {

      $e = $this->ext($ext);
      $str = '<span class="input-file-list-name"><a class="__dowloads" data-file="'. $file .'"  target="_blank" href="'.$link .'"><img class="_ext" width="30" height="30" src="'.$e.'" /></a></span><a href="#" onclick="return false;"               class="input-file-list-remove input-file-load-remove__js">x</a>';

      return $str;

  }


 public function user_get_files($id, $field, $count) {

      $user = User::query()->select($field)->where('id', $id)->first();

      if(count($user->$field)) {
          foreach ($user->$field as $f) {
              $array_files[]['json_file_file'] = $f['json_file_file'];

          }
          return $array_files;
      }

      return null;

}




}
