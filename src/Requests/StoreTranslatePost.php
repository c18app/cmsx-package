<?php

namespace C18app\Cmsx\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTranslatePost extends FormRequest
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
        $translate = $this->route('translate');
        $title_rules = 'required|max:255|unique:' . \Config::get('cmsx.table_prefix') . 'translates';
        if ($translate) {
            $title_rules .= ',title,' . $this->route('translate')->id;
        }

        return [
            'title' => $title_rules,
            'content' => 'required'
        ];
    }
}
