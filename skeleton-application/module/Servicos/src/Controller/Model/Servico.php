<?php

namespace Servicos\Model;

class Servico{

	public $id;
	public $nome;
	public $descricao;

	public function exchangeArray(array $data)
	{
		$this->id = (!empty($data['id'])) ? $data['id']: null;
		$this->nome = (!empty($data['nome'])) ? $data['nome']: null;
		$this->descricao = (!empty($data['descricao'])) ? $data['descricao']: null;
	}


	public function getArrayCopy()
	{
		return [
			'id' => $this->id,
			'nome' => $this->nome,
			'descricao' => $this->descricao
		];
	}


}