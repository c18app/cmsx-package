<?php

namespace Cms18\CmsX\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTagPost extends FormRequest
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
        $tag = $this->route('tag');
        $title_rules = 'required|max:255|unique:cms18_tags';
        if($tag) {
            $title_rules .= ',title,'.$this->route('tag')->id;
        }

        if(!$this->invisible) {
            $this->merge(['invisible' => 0]);
        }

        return [
            'invisible' => 'boolean',
            'title' => $title_rules,
        ];
    }
}
