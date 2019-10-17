<?php

namespace App\Http\Controllers\Modulos;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Mail\mailme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $contacts = Contact::where('email', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('message', 'LIKE', "%$keyword%")
                ->orWhere('state', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $contacts = Contact::paginate($perPage);
        }

        return view('modulos.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('modulos.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'message' => 'required|max:500'
        ]);
        $requestData = $request->all();
        $requestData['state']='AC';
        $contacto = Contact::create($requestData);

        Mail::to($contacto->email)
            ->bcc('soporte@govistalab.com')
            ->send(new mailme($contacto));

        Session::flash('flash_message', 'Contact added!');

        return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);

        return view('modulos.contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);

        return view('modulos.contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'message' => 'required|max:500'
        ]);
        $requestData = $request->all();

        $contact = Contact::findOrFail($id);
        $contact->update($requestData);

        Session::flash('flash_message', 'Contact updated!');

        return redirect('modulos/contacts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Contact::destroy($id);

        Session::flash('flash_message', 'Contact deleted!');

        return redirect('modulos/contacts');
    }

    public function contactsEmail(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'message' => 'required|max:500'
        ]);
        $requestData = $request->all();
        $requestData['state']='AC';
        $contacto = Contact::create($requestData);

        Mail::to($contacto->email)
            ->bcc('soporte@govistalab.com')
            ->send(new mailme($contacto));

        Session::flash('flash_message', 'Contact added!');

        return redirect('/login');
    }
}
