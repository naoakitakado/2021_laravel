<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// ↓1行追加
use Auth;

class Todo extends Model
{
  use HasFactory;

  protected $guarded = [
    'id',
    'created_at',
    'updated_at',
  ];

  public static function getAllOrderByDeadline()
  {
    $todos = self::orderBy('deadline', 'asc')
      ->get();
    return $todos;
  }

  // ↓新しい関数を追加
  public static function getMyAllOrderByDeadline()
  {
    $todos = self::where('user_id', Auth::user()->id)
      ->orderBy('deadline', 'asc')
      ->get();
    return $todos;
  }
}