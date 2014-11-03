<?php namespace Kkstudio\Contact\Controllers;

use Illuminate\Routing\Controller;
use Kkstudio\Contact\Repositories\ContactRepository;

class ContactController extends Controller {

	public function contact() 
	{
		return v('contact.form');
	}

	// Admin

	public function admin(ContactRepository $messages)
	{
		return \View::make('contact::admin')->with('messages', $messages->all());
	}

	public function show($id, ContactRepository $messages)
	{
		$message = $messages->get($id);

		return \View::make('contact::show')->with('message', $message);
	}

	public function create(ContactRepository $messages)
	{
		$validator = \Validator::make(
		    array(
		        'email' => \Request::get('email')
		    ),
		    array(
		        'email' => 'required|email'
		    )
		); 

		if($validator->fails())
		{
			\Flash::error('Proszę wpisać poprawny adres e-mail.');
			return \Redirect::back()->withInput();
		}

		$email = \Request::get('email');
		$title = \Request::get('title');
		$content = \Request::get('content');

		if(strlen($title) == 0 && strlen($content) == 0)
		{
			\Flash::error('Proszę uzupełnić wszystkie pola.');
			return \Redirect::back()->withInput();			
		}

		$message = $messages->create($email, $title, $content);

		m('Contact')->notify(
						'contact-'. $message->id, 
						'Nowa wiadomość od <b>'.$email.'</b>',
						'admin/contact/' . $message->id,
						'envelope' 
					);

		\Flash::success('Wiadomość została wysłana.');

		return \Redirect::back()->with('message_sent', true);			

	}

	public function delete($id, ContactRepository $messages) 
	{
		$message = $messages->get($id);

		return \View::make('contact::delete')->with('message', $message);
	}

	public function postDelete($id, ContactRepository $messages) 
	{
		$message = $messages->get($id);
		$message->delete();

		\Flash::success('Wiadomość usunięta.');

		return \Redirect::to('admin/contact/');
	}

}