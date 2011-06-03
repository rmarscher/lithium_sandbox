<?php

namespace app\controllers;

use app\models\Posts;

class PostsController extends \lithium\action\Controller {

	protected function _init() {
		$this->_render['negotiate'] = true;
		parent::_init();
	}

	public function index() {
		$posts = Posts::all();
		$message = 'regular';
		return compact('posts', 'message');
	}

	public function view() {
		$post = Posts::first($this->request->id);
		return compact('post');
	}

	public function add() {
		$post = Posts::create();

		if (($this->request->data) && $post->save($this->request->data)) {
			$this->redirect(array('Posts::index'));
		}
		return compact('post');
	}

	public function edit() {
		$post = Posts::find($this->request->id);

		if (!$post) {
			$this->redirect('Posts::index');
		}
		if (($this->request->data) && $post->save($this->request->data)) {
			$this->redirect(array('Posts::view', 'args' => array($post->id)));
		}
		return compact('post');
	}

	public function delete() {
		if (!$this->request->is('post') && !$this->request->is('delete')) {
			$msg = "Posts::delete can only be called with http:post or http:delete.";
			throw new DispatchException($msg);
		}
		Posts::find($this->request->id)->delete();
		$this->redirect('Posts::index');
	}
	
	public function foo() {
	
		return array('message' => 'ajax');
	}
}

?>