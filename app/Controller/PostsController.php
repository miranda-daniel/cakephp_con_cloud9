<?php
	App::uses('AppController', 'Controller');

	class PostsController extends AppController {

		public function index() {

			$this->Post->recursive = -1;

			$this->set('posts', $this->paginate());
		}

		//////////////////////////////////////////////////////////////////////////////////////////////

		public function view($id = null) {

			if (empty($id) || !($post = $this->Post->findById($id))) {

				// Llama al error400.ctp
				throw new NotFoundException(__('Post not found'));
			}

			$this->set(compact('post'));
		}

		//////////////////////////////////////////////////////////////////////////////////////////////

		// LO que hago aca esta explicado en proyecto "SEGURIDAD"
		public function add() {

			if ($this->request->is('post')) {

				$this->Post->create();

				if($this->verifica_campos_form($this->request->data['Post'], array('title', 'body', 'cantidad'))){

					$this->request->data['Post']['id'] = String::uuid();

					if ($this->Post->save($this->request->data, true, array('id', 'title', 'body', 'cantidad'))) {

						$this->Session->setFlash(__('New post created'));
						return $this->redirect(array('action' => 'index'));
					}

					else{

						$this->Session->setFlash(__('Could not create Post'));
					}
				}

				else{
					$this->Session->setFlash(__('Borraste un campo del formulario'));
						return $this->redirect(array('action' => 'index'));
				}
			}
		}


		//////////////////////////////////////////////////////////////////////////////////////////////

		public function edit($id = null) {

			if (empty($id) || !($post = $this->Post->findById($id))) {

				// Llama al error400.ctp
				throw new NotFoundException(__('Post not found'));
			}

			if ($this->request->is('put','post')){

				$this->request->data['Post']['id'] = $id;

				if ($this->Post->save($this->request->data, true, array('id', 'title', 'body', 'cantidad'))) {

					$this->Session->setFlash(__('Post updated'));

					return $this->redirect(array('action' => 'index'));
				}

				$this->Session->setFlash(__('Could not update Post'));
			}

			else {
				$this->request->data = $post;
			}
		}

		public function delete($id = null) {

			// Solo se puede eliminar mediante POST
			if (!$this->request->is('post')) {

				// Llama al error400.ctp
				throw new MethodNotAllowedException();
			}

			if ($this->Post->delete($id)) {

				$this->Session->setFlash(__('post removed: %s', h($id)));
				return $this->redirect(array('action' => 'index'));
			}

			$this->Session->setFlash(__('Could not remove product'));
			return $this->redirect($this->referer());
		}

	}
?>