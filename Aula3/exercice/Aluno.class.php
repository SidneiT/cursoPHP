<?php

class Aluno
{
	private $xml;
	
	public function __construct($xml)
	{	
		$this->xml = new SimpleXMLElement($xml, null, true);
	}
	
	public function listaAlunos()
	{		
		foreach($this->xml as $aluno)
		{			
			$lista[] = array
			(
					'nome'  => $aluno->nome,
					'email' => $aluno->email,
					'senha' => $aluno->senha
			);
		}
		
		return $lista;
	}
}