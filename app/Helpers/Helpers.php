<?php

namespace App\Helpers;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Carbon\Carbon;

class Helpers
{
  public static function GenerateUUID()
  {
    $uuid = false;
    try {
      $uuid = Uuid::uuid4()->toString();
    } catch (UnsatisfiedDependencyException $e) {
      log::info(json_encode($e->getMessage()));
    }

    return $uuid;
  }

  public static function DateFormat($date)
  {
    return Carbon::createFromFormat('d/m/Y H:i', $date)->toDateTimeString();
  }

  public static function DateRange($start, $end)
  {
    $actual_start_at = Carbon::parse($start);
    $actual_end_at = Carbon::parse($end);
    $mins = $actual_end_at->diffInMinutes($actual_start_at, true);

    return $mins;
  }
}
