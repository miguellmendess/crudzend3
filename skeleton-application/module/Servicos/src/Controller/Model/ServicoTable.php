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

	public function findByPartialName($name)
	{

		return $this->tableGateway->select(['nome'=>$name]);	
		// $select = $this->tableGateway->select()->from('servico')
		// ->where('name like ?', "%{$name}%")
		// ->order('name ASC');

		// return $this->fetchAll($select); 
	}


}