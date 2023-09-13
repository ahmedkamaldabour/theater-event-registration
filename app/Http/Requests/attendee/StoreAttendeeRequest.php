<?php

namespace App\Http\Requests\attendee;

use App\Models\EventDay;
use Illuminate\Foundation\Http\FormRequest;

class StoreAttendeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric|digits_between:10,12',
            'movie_id' => 'required|exists:movies,id',
            'date_id' => 'required|exists:dates,id',
            'show_time_id' => 'required|exists:show_times,id',
            'event_day_id' => 'required'

        ];
    }

    public function prepareForValidation()
    {
        $event_day_id = EventDay::where('date_id', $this->date_id)
            ->where('show_time_id', $this->show_time_id)
            ->first()->id;
        $this->merge([
            'event_day_id' => $event_day_id
        ]);
    }
}
