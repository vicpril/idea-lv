<?php

namespace Idea\Http\Requests;

// use Idea\Http\Requests\Request as Request;

class ArticleRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
//         $regex = '/^[A-Za-z0-9-éèàù]{1,50}?(,[A-Za-z0-9-éèàù]{1,50})*$/';
//         $id = $this->post ? ',' . $this->post->id : '';

        return $rules = [
            'year' => 'bail|required|numeric',
            'no' => 'bail|required|max:1',
            'tom' => 'bail|required|max:1',
          
            'users' => 'required|array',
          
            'date-arrival' => 'bail|date|nullable',
            'date-review' => 'bail|date|nullable',
            'doi' => 'bail|max:100',
            'udk' => 'bail|max:100',
            'category' => 'required',
            'tags' => 'required|array',
            'status' => 'required',

            'title-ru' => 'bail|required|max:255',
            'title-en' => 'bail|required|max:255',
//             'text' => 'bail|max:65000',
            'annotation-ru' => 'bail|max:65000',
            'annotation-en' => 'bail|max:65000',
            'keywords-ru' => 'bail|max:50',
            'keywords-en' => 'bail|max:50',
            'aplications' => 'bail|max:65000',
            'finance' => 'bail|max:50',
            'literature-ru' => 'bail|max:65000',
            'literature-en' => 'bail|max:65000',
            
            
            
          
        ];
    }
}
