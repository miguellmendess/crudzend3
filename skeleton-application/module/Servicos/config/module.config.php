<?php

namespace Servicos;


use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;



return [

	'controllers'=>[
		'factories'=>[
			#Controller\ServicosController::class =>InvokableFactory::class
			

		]
	],
	'router'=>[

		'routes' => [
			'servicos'=>[
				'type' => 'literal',
				'options' => [
					'route' => '/servicos',
					'defaults' => [
						'controller' => Controller\ServicosController::class,
						'action' => 'index'
					]
				]
			]
		]

	],
	'view_manager'=>[
		'template_path_stack'=>[

			'servicos'=>__DIR__."/../view"
		]
	]


];