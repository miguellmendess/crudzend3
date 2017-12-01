<?php

namespace Servicos\Model;

use Zend\Db\TableGateway\TableGatewayInterface;

class ServicoTable
{
	private $tableGateway;

	public function __construct(TableGatewayInterface $tableGateway)
	{
		$this->tableGateway = $tableGateway;

	}

	public function fetchAll()
	{
		return $this->tableGateway->select();
	}


}