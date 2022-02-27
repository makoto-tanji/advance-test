<?php

namespace App\Http\Livewire;

use Livewire\Component;
//
use Illuminate\Http\Request;

class ContactForm extends Component
{
    public $lastName;
    public $firstName;
    public $email;
    public $postcode;
    public $address;
    public $opinion;

    public function mount(Request $request)
    {
            $this->lastName = $request->session()->get('lastName');
            $this->firstName = $request->session()->get('firstName');
            $this->email = $request->session()->get('email');
            $this->postcode = $request->session()->get('postcode');
            $this->address = $request->session()->get('address');
            $this->building = $request->session()->get('building');
            $this->opinion = $request->session()->get('opinion');
    }

    protected $rules = [
        'lastName' => 'required',
        'firstName' => 'required',
        'email' => 'required | email',
        'postcode' => 'required | between:8,8 | regex:/[0-9]{3}+-[0-9]{4}/' ,
        'address' => 'required',
        'opinion' => 'required | max:120'
    ];

    protected $messages = [
        'lastName.required' => '名字を入力してください。',
        'firstName.required' => '名前を入力してください。',
        'email.required' => 'メールアドレスを入力してください。',
        'email.email' => 'メールアドレス形式で入力してください。',
        'postcode.required' => '郵便番号を入力してください。',
        'postcode.between' => '123-4567という形で入力してください。',
        'postcode.regex' => '123-4567という形で入力してください。',
        'address.required' => '住所を入力してください。',
        'opinion.required' => '120字以内で入力してください。',
        'opinion.max' => '120字以内で入力してください。'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $items = [
            'lastName',
            'firstName',
            'email',
            'postcode',
            'address',
            'building',
            'opinion'
        ];
        $item = [
            'content' => $this->lastName,
        ];
        return view('livewire.contact-form', $items);
    }
}
