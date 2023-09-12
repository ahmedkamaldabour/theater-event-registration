<?php

namespace App\Http\Requests\eventDay;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventDayRequest extends FormRequest
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
            'movie_id' => 'required|exists:movies,id',
            'date_id' => 'required|exists:dates,id',
            'show_time_id' => 'required|exists:show_times,id',
        ];
    }
}
