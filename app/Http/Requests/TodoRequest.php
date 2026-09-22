<?php

namespace App\Http\Requests;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        /** @var Todo|null $todo */
        $todo = $this->route('todo');
        /** @var User $user */
        $user = $this->user();

        return $todo === null || $todo->user_id === $user->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'expiration_date' => ['required', 'date'],
            'description' => ['nullable', 'string'],
            'completed_date' => ['nullable', 'date'],
        ];
    }
}
