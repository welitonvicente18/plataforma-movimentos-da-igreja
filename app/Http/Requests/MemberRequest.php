<?php

namespace App\Http\Requests;

use App\Rules\Telephone;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;


class MemberRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'required|int',
            'status' => 'required|int',
            'event' => 'string|max:200',
            'circle' => 'nullable|string|max:50',
            'name' => 'required|string|max:300',
            'surname' => 'string|max:100',
            'spouse' => 'nullable|string|max:200',
            'sex' => 'string|max:1',
            'telephone' => ['string', new Telephone],
            'birth_date' => 'nullable|date',
            'uf' => 'string|max:2',
            'city' => 'string|max:100',
            'address' => 'string|max:300',
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', File::image()->max(2 * 1024)->dimensions(Rule::dimensions()->minWidth(100)->maxWidth(2000)->minHeight(100)->maxHeight(2000))],
        ];
    }
}
