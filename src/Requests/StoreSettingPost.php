<?php

namespace C18app\CmsX\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $setting = $this->route('setting');
        $title_rules = 'required|max:255|unique:cms18x_settings';
        if($setting) {
            $title_rules .= ',title,'.$this->route('setting')->id;
        }

        return [
            'title' => $title_rules,
            'content' => 'required'
        ];
    }
}