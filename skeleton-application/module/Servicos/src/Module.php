<?php

namespace Servicos;

use Servicos\Model;
include("Controller/Model/Servico.php");
include("Controller/Model/ServicoTable.php");
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{

	public function getConfig(){
		return include __DIR__."/../config/module.config.php";

	}

	public function getServiceConfig()
	{
		return[
			'factories' => [
				Model\ServicoTable::class => function ($container){
					$tableGateway = $container->get(Model\ServicoTableGateway::class);
					return new Model\ServicoTable($tableGateway);
				},
				Model\ServicoTableGateway::class => function($container){

					$dbAdapter = $container->get(AdapterInterface::class);
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new Model\Servico());

					//Passa como parametro o nome da tabela
					return new TableGateway('tiposervico', $dbAdapter, null, $resultSetPrototype);

				}
			]

		];

	}

	public function getControllerConfig()
	{

		return[
			'factories' => [
				Controller\ServicosController::class => function($container){
					return new Controller\ServicosController(
						$container->get(Model\ServicoTable::class)
					);
				}
			]
		];

	}
	
	/*function __construct(argument)
	{
		# code...
	} */
}