<?php namespace Kkstudio\Contact\Repositories;

use Kkstudio\Contact\Models\Message as Message;

class ContactRepository {

	public function all()
	{
		return Message::orderBy('created_at', 'desc')->get();
	}

	public function get($id)
	{
		return Message::findOrFail($id);
	}

	public function create($email, $title, $content)
	{
		return Message::create([

			'email' => $email,
			'title' => $title,
			'content' => $content

		]);
	}

}