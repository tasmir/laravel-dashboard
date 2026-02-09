<?php

namespace App\Http\Requests\Backend\User;

use Tasmir\MediaManager\Http\Traits\MediaHelper;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        if($this->status_change) {
            $rules['status'] = 'required|in:active,inactive';
        }else {
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $this->user->id,
                // 'password' => 'nullable|string|min:8|confirmed',
                'role' => 'required|exists:roles,name',
                'status' => 'required|in:active,inactive',
            ];
        }
        if (isset($this->password)) {
            $rules['password'] = 'nullable|string|min:8|confirmed';
        }
        return $rules;
    }

    protected function passedValidation()
    {
        if($this->has("image_file") && $this->file('image_file') !== null) {
            $file = $this->file('image_file');
            $make_path = 'user/';
            $data = [
                'file' => $file,
                'path' => $make_path,
                'prefix' => 'user',
                'quality' => 100,
                'alt_text' => $this->input('image_alt_text') ?? $this->input('name'),
                'caption' => $this->input('image_caption') ?? $this->input('name'),
                'isYearMonth' => false,
            ];
            $file_id = $this->uploadMediaFile($data);
            $this->merge(
                ['image_id' => $file_id]
            );
        } else {
            $model_data = $this->user;
            $change = [];
            if($this->has("image_alt_text") && $this->input('image_alt_text') !== $model_data?->media?->alt) {
                $change['alt'] = $this->input('image_alt_text');
            } else if($this->has("image_caption") && $this->input('image_caption') !== $model_data?->media?->caption) {
                $change['caption'] = $this->input('image_caption');
            }
            if(count($change) > 0) {
                $model_data->media->update($change);
            }
        }
    }
}
