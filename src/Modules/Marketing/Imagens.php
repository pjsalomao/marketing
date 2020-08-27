<?php

namespace App\Modules\Marketing;

use Sintattica\Atk\Core\Node;
use Sintattica\Atk\Attributes\Attribute;
use Sintattica\Atk\Attributes\Attribute as A;
use Sintattica\Atk\Attributes\TextAttribute;
use Sintattica\Atk\Attributes\ListAttribute;
use Sintattica\Atk\Security\SecurityManager;
use Sintattica\Atk\Attributes\FileAttribute;
use Sintattica\Atk\Db\Db;
use Sintattica\Atk\Db\Query;
use Sintattica\Atk\Db\MySqliDb;
use Sintattica\Atk\Relations\ManyToOneRelation;
use Sintattica\Atk\Attributes\ParserAttribute;
use App\Modules\Marketing\Produtos;

class Imagens extends Node
{
	function __construct($nodeUri)
	{
		parent::__construct($nodeUri, Node::NF_ADD_LINK | Node::NF_EDITAFTERADD | Node::NF_NO_EXTENDED_SEARCH );
		$this->setTable('imagens');

		$GLOBALS["prod"] = "";

	$prod = $this->add(new ManyToOneRelation("codigo", A::AF_PRIMARY | A::AF_OBLIGATORY | A::AF_SEARCHABLE | A::AF_LARGE | A::AF_READONLY_EDIT, "marketing.produtos"));
		//$prod = new ManyToOneRelation("codigo", A::AF_PRIMARY | A::AF_OBLIGATORY | A::AF_SEARCHABLE | A::AF_LARGE | A::AF_READONLY_EDIT, "marketing.produtos");
		//$prod->m_index;
		echo $prod->value2db("codigo");
		$db = $this->getDb();
		$res = $db->query("select codigo from imagens where codigo = '" . $prod->value2db("codigo") ."'");

		echo $res["codigo"];
	//	$teste = new ParserAttribute($prod->fieldName(), 0, "cdexp");
		//echo $teste->parseStringValue("[codigo][cdexp]");
		//$tt = $teste->display("[codigo][cdexp]","display");
		//echo $this->m_postvars["imagens"]["codigo"];
		//echo $GLOBALS["prod"];
		//echo $prod->fieldName();
		//$prod->
	//	echo $prod->parse_str;
		$string =  $this->getAttribute("codigo"); 

		$prod1 = $this->add(new FileAttribute("imagem01", A::AF_HIDE_LIST | A::AF_HIDE_ADD, "upload_prod"));
		$prod1->m_filenameTpl = $string  . "_a";
		$prod2 = $this->add(new FileAttribute("imagem02", A::AF_HIDE_LIST | A::AF_HIDE_ADD, "upload_prod"));
		//$prod2->m_filenameTpl = $codigo_formatado . "_b";
		$prod3 = $this->add(new FileAttribute("imagem03", A::AF_HIDE_LIST | A::AF_HIDE_ADD, "upload_prod"));
		//$prod3->m_filenameTpl = $codigo_formatado . "_c";
		$prod4 = $this->add(new FileAttribute("imagem04", A::AF_HIDE_LIST | A::AF_HIDE_ADD, "upload_prod"));
		//$prod4->m_filenameTpl = $codigo_formatado . "_d";
		$prod5 = $this->add(new FileAttribute("imagem05", A::AF_HIDE_LIST | A::AF_HIDE_ADD, "upload_prod"));
		//$prod5->m_filenameTpl = $codigo_formatado . "_e";
		$prod6 = $this->add(new FileAttribute("imagem06", A::AF_HIDE_LIST | A::AF_HIDE_ADD, "upload_prod"));
		//$prod6->m_filenameTpl = $codigo_formatado . "_f";


		$this->setDescriptorTemplate($res[0]["codigo"]);

		//$user = SecurityManager::atkGetUser();
		//print_r($user);die;
	}
	//$GLOBALS["foo"]

	public function postAdd($record, $mode = 'add')
    {
		$prod = "3333" . $record['cdexp'];
		echo $prod;
        return true;
    }

}
