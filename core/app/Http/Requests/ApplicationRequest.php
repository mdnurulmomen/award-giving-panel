<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    
    public function messages()
    {
        return [

            'name.required' => 'We need to know your :attribute',
            'birth_date.required'  => 'We need to know your birth day',
            'email.required' => 'We need to know your :attribute',
            'phone.required'  => 'Invalid phone number',
            'address.required' => 'We need to know your valid address to contact',
            'age_id.required'  => 'Age is required',
            'category_id.required' => 'Application category is required',

			'content_type_id.*' => 'Please submit with proper application type',

            'title.*'  => 'Submission title is required',
			'filePrintOnlineMedia.*'  => 'Image should be jpg or jpeg type',
            'linkPrintOnlineMedia.*'=>'Print online media link should be url',
			'linkVisualOrRadio.*'=>'Media Link should be url',
			'fileNewsPhotography_1.*'=>'Image should be jpg or jpeg type',
			'fileNewsPhotography_2.*'=>'Image should be jpg or jpeg type',
			// 'name_videographer'=>'nullable',
			
            'publisher_name.*' => 'We need to know publisher name',
            'date_publishment.*' => 'Media publishment date is required',
            'representative_name.*'  => 'We need to know name of contact person',
            'representative_designation.*' => 'We need to know designation of contact person',
			'representative_organization.*' => 'We need to know contact persons organization name',
			
        	'representative_phone.*'  => 'We need to know either email or phone of the contact person',
			'representative_email.*'  => 'We need contact details of publisher',

			'media_type_id.*'  => 'Please choose media type'
        ];
    }

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
        return [
            
            'name'=>'required|bail|max:255',
            'birth_date'=>'required|bail',
            'email'=>'required|email|bail|max:255',
            'phone'=>'required|regex:/(01)[0-9]{9}/|bail',
            'address'=>'required|bail|max:255',
            'age_id'=>'required|integer|bail',
            'category_id'=>'required|integer|bail',
			'content_type_id'=>'integer',
            'title.*'=>'required|bail|max:255',

			//'name_videographer'=>'nullable',

            'filePrintOnlineMedia.*'=>'nullable|image|mimes:jpg,jpeg|max:10120',
            'linkPrintOnlineMedia.*'=>'nullable|url',
			'linkVisualOrRadio.*'=>'nullable|url',
			'fileNewsPhotography_1.*'=>'nullable|image|mimes:jpg,jpeg|max:10120',
			'fileNewsPhotography_2.*'=>'nullable|image|mimes:jpg,jpeg|max:10120',
            
			'date_publishment.*'=>'required|bail',
            'publisher_name.*'=>'required|bail|max:255',
            'representative_name.*'=>'required|bail|max:255',
            'representative_designation.*'=>'required|bail|max:255',
			'representative_organization.*'=>'required|bail|max:255',
            'representative_phone.*'=>'required_without:representative_email.*',
			'representative_email.*'=>'required_without:representative_phone.*',

			'media_type_id'=>'required',
			'media_type_id.*' => 'integer'
		];
    }

}
