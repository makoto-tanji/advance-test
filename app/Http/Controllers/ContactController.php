<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Pagination\Paginator;

class ContactController extends Controller
{
    //
    public function index(Request $request)
    {
        $items = [
            'lastName' => $data = $request->session()->get('lastName'),
            'firstName' => $data = $request->session()->get('firstName'),
            'email'=> $data = $request->session()->get('email'),
            'postcode' => $data = $request->session()->get('postcode'),
            'address' => $data = $request->session()->get('address'),
            'building' => $data = $request->session()->get('building'),
            'opinion' => $data = $request->session()->get('opinion')
        ];
        return view('contact', $items);
    }

    public function confirm(ContactRequest $request)
    {
        $request->session()->put('lastName',$request->lastName);
        $request->session()->put('firstName',$request->firstName);
        $request->session()->put('gender',$request->gender);
        $request->session()->put('email',$request->email);
        $request->session()->put('postcode',$request->postcode);
        $request->session()->put('address',$request->address);
        $request->session()->put('building',$request->building);
        $request->session()->put('opinion',$request->opinion);

        $items = [
            'lastName' => $request->lastName,
            'firstName' => $request->firstName,
            'gender' => $request->gender,
            'email'=> $request->email,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building' => $request->building,
            'opinion' => $request->opinion
        ];
        return view('confirmation', $items);
    }

    public function store(Request $request)
    {
        $fllname = $request->session()->get('lastName') . " " . $request->session()->get('firstName');
        $items = [
            'fullname' => $fllname,
            'gender' => $data = $request->session()->get('gender'),
            'email'=> $data = $request->session()->get('email'),
            'postcode' => $data = $request->session()->get('postcode'),
            'address' => $data = $request->session()->get('address'),
            'building_name' => $data = $request->session()->get('building'),
            'opinion' => $data = $request->session()->get('opinion')
        ];
        Contact::create($items);
        return redirect('/thanks');
    }

    public function thanks()
    {
        return view('thanks');
    }

    public function management()
    {
        return view('management');
    }

    public function search(Request $request)
    {
        //日にち取得
        $date = Contact::getDate($request->dateFrom, $request->dateBy);

        $items = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
        ->where( function($query) use($request){
            $query->whereIn('gender', Contact::getGender($request->gender) );
        })
        ->where( function($query) use($request, $date){
            $query->whereBetween('created_at', $date);
        })
        ->where('email', 'LIKE',  "%{$request->email}%")
        ->paginate(5);

        return view('management', ['items' => $items]);
    }

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/management');
    }
}
