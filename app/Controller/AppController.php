<?php

App::uses('Controller', 'Controller');


class AppController extends Controller {

	// Explicada proyecto "SEGURIDAD"
	public function verifica_campos_form($data = null, $requiredFields) {

		$bandera = true;

		if (!empty($requiredFields)) {

			foreach ($requiredFields as $campo) {

					if(!in_array($campo, array_keys($data))){

						$bandera = false;
					}
			}
		}

		return $bandera;
	}

}