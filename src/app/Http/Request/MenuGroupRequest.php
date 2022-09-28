<?php

namespace MHaciyev\Menu\App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class MenuGroupRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string'
        ];
    }
}
