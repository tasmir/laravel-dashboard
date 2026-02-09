<?php

namespace App\Http\Requests\Backend\User;

use Tasmir\MediaManager\Http\Traits\MediaHelper;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    use MediaHelper;
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,name',
            'status' => 'required|in:active,inactive',
        ];
    }

    protected function passedValidation()
    {
        if ($this->has("image_file") && $this->file('image_file') !== null) {
            $file = $this->file('image_file');
            $make_path = 'user/';
            $data = [
                'file' => $file,
                'path' => $make_path,
                'prefix' => 'user',
                'quality' => 100,
                'alt_text' => $this->input('image_alt_text'),
                'caption' => $this->input('image_caption'),
                'isYearMonth' => false,
            ];
            $file_id = $this->uploadMediaFile($data);
            $this->merge(
                ['image_id' => $file_id]
            );
        }

    }
}
