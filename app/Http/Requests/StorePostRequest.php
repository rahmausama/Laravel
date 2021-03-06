<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class StorePostRequest extends FormRequest
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
        $user = new User();
        $users = $user->all();
        $ids =[];
        foreach ($users as $oneUser) {
            array_push($ids, $oneUser->id);
        }
        return [
            'title' => ['required', 'min:3',Rule::unique('posts', 'title')->ignore($this->post)],
            'description' => ['required', 'min:10'],
            'post_creator' => ['required',Rule::in($ids)],
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'title.min' => 'minimum length of title is 3'
        ];
    }
}
