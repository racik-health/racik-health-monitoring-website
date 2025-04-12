<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ConsumptionReportUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'herbal_medicine_id' => 'required|exists:herbal_medicines,id',
            'quantity' => 'required|integer|min:1',
            'note' => 'required|string|min:3|max:655',
            'consumed_at' => 'required|date',
        ];
    }
}
