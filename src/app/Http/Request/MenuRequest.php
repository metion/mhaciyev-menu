<?php

namespace MHaciyev\Menu\App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use MHaciyev\Menu\Enums\LinkType;

class MenuRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'title' => 'array|required',
            'value' => 'array|nullable',
            'target_mode' => 'required|string|in:true,false',
            'active' => 'required|string|in:true,false',
            'group_id' => 'required|exists:menu_group,id'
        ];
        return $this->mapLangRules($rules);
    }

    public function mapLangRules($rules)
    {
        foreach (config('mhaciyev_menu.languages') as $lang) {
            $rules['title.' . $lang] = 'required|string';
        }
        return $rules;
    }
}
