<?php namespace Kkstudio\Contact\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Message extends Eloquent {

	protected $table = 'kkstudio_contact_messages';

	protected $guarded = [ 'id' ];

}