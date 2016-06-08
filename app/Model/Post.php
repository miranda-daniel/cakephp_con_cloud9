<?php

App::uses('AppModel', 'Model');

	class Post extends AppModel {

		public $validate = array(

            'title' => array(

                'nonEmpty' => array(
                                    'rule' => array('notEmpty'),
                                    'message' => 'El nombre no puede ser vacío',
                                    'allowEmpty' => false
                ),

               'between' => array(
								'rule' => array('between', 3, 30),
								'message' => 'El nombre debe contener entre 3 y 30 caracteres'
				),

                'reg' => array(
        					'rule' => '/^[a-zA-Z0-9áéíóúÁÉÍÓÚÑñ;,.:$()ªº@#=%!*?¿¡_ \-]*$/',
        					'message' => 'El asunto presenta caracteres prohibidos'
    			)

            ),

            //////////////////////////////////////////////


            'body' => array(

                'nonEmpty' => array(
                                    'rule' => array('notEmpty'),
                                    'message' => 'El email no puede ser vacío',
                                    'allowEmpty' => false
                ),

                'reg' => array(
        					// Remember that "\s" includes \n(ewline) \r(eturn) \t(tab) \v(ertical tab) \f(orm feed) and space.
                            // Lo uso  a "\s" sobretodo para que pueda hacer enter.
        					'rule' => '/^[a-zA-Z0-9áéíóúÁÉÍÓÚÑñ;,.:$()ªº@#=%!*?¿¡_\s \-]*$/',
        					'message' => 'Presenta caracteres prohibidos'
    			)

            ),

            'cantidad' => array(

                'nonEmpty' => array(
                                    'rule' => array('notEmpty'),
                                    'message' => 'Ingrese cantidad disponible. Tenga cuidado de no dejar espacios en blanco al principio y/o al final',
                                    'allowEmpty' => false
                ),

                // El "true" es para que acepte 0 tambien. ver en documentacion de cakephp.
                'natural_number' => array(
                                            'rule'    => array('naturalNumber',true),
                                            'message' => 'El Stock debe ser un valor entero positivo'
                ),

                'max_length' => array(
                                    'rule' => array('maxLength', '5'),
                                    'message' => 'No pueden ser mas de 5 digitos'
                )
            )

        );


	}

?>