<?php namespace Kkstudio\Contact;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('kkstudio/contact');

		\Route::group([ 'prefix' => 'admin', 'before' => 'admin'], function() {

			\Route::get('contact', '\Kkstudio\Contact\Controllers\ContactController@admin');
			\Route::get('contact/{id}', '\Kkstudio\Contact\Controllers\ContactController@show')->where('id', '[0-9]');
			\Route::get('contact/{id}/delete', '\Kkstudio\Contact\Controllers\ContactController@delete');
			\Route::post('contact/{id}/delete', '\Kkstudio\Contact\Controllers\ContactController@postDelete');

		});

		\Route::get('contact', '\Kkstudio\Contact\Controllers\ContactController@contact');
		\Route::post('contact', '\Kkstudio\Contact\Controllers\ContactController@create');

	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
