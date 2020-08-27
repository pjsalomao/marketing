<?php

namespace App\Modules\Marketing;

use Sintattica\Atk\Core\Node;
use Sintattica\Atk\Attributes\Attribute;
use Sintattica\Atk\Attributes\Attribute as A;


class Produtos extends Node
{
	function __construct($nodeUri)
	{
		parent::__construct($nodeUri, Node::NF_ADD_LINK);
		$this->setTable("produtos");
		$this->setOrder("cdexp");
		$this->setIndex("dsexp");

		$this->add(new Attribute("cdexp", A::AF_PRIMARY | A::AF_SEARCHABLE));
		$this->add(new Attribute("dsexp", A::AF_OBLIGATORY | A::AF_SEARCHABLE, 30));

		//		$this->addFilter("cad02.sr_deleted = ''");
	}

	function descriptor_def()
	{
		return "[dsexp]";
	}
}
