<?php

namespace App\Http\Requests;

use App\Http\Enums\AccountName;
use App\Rules\MOD11;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\ValidationRules\Rules\Currency;


class StoreAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // todo: add logic to ensure that only an existing user can do this
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
            'account_number' => ['required', 'unique:accounts,account_number', 'string', 'digits:11', new MOD11],
            'account_name' => ['required', Rule::enum(AccountName::class), 'max:255'],
            'currency' => ['required', new Currency()],
        ];
    }
}
