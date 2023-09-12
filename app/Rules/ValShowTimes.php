<?php

namespace App\Rules;

use App\Models\ShowTime;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use function request;

class ValShowTimes implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        // validate if The show time already exists
        $show_time = ShowTime::where('start_time', $value)
            ->where('end_time', request()->end_time)
            ->first();

        if ($show_time) {
            if (request()->route()->getName() == 'showTimes.update') {
                if ($show_time->id != request()->route()->parameter('showTime')->id) {
                    $fail('Show Time already exists.');
                }
            } else {
                $fail('Show Time already exists.');
            }
        }

        // validate if The show time is at least 1 hour
        $start_time = strtotime($value);
        $end_time = strtotime(request()->end_time);
        $difference = $end_time - $start_time;
        if ($difference < 3600) {
            $fail('Show Time must be at least 1 hour.');
        }
    }

}
