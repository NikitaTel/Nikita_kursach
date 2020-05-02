<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  /**
   * Массово присваиваемые атрибуты.
   *
   * @var array
   */
  protected $fillable = ['name'];

    /**
     * Получить пользователя - владельца данной задачи
     */
    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
