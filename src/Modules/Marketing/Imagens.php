<?php

namespace App\Modules\Marketing;

use Sintattica\Atk\Core\Node;
use Sintattica\Atk\Attributes\Attribute;
use Sintattica\Atk\Attributes\Attribute as A;
use Sintattica\Atk\Attributes\DateTimeAttribute;
use Sintattica\Atk\Attributes\FileAttribute;
use Sintattica\Atk\Relations\ManyToOneRelation;


class Imagens extends Node
{
	function __construct($nodeUri)
	{
		parent::__construct($nodeUri, Node::NF_ADD_LINK | Node::NF_EDITAFTERADD | Node::NF_NO_EXTENDED_SEARCH );
		$this->setTable('imagens');
		

		$prod = $this->add(new ManyToOneRelation("codigo", A::AF_PRIMARY | A::AF_OBLIGATORY | A::AF_SEARCHABLE | A::AF_LARGE | A::AF_READONLY_EDIT, "marketing.produtos"));


		$img1 = $this->add(new FileAttribute("imagem01", A::AF_HIDE_LIST | A::AF_HIDE_ADD, "upload_prod"));
		$img1->m_filenameTpl = "[codigo.cdexp]_a";
		$img2 = $this->add(new FileAttribute("imagem02", A::AF_HIDE_LIST | A::AF_HIDE_ADD, "upload_prod"));
		$img2->m_filenameTpl = "[codigo.cdexp]_b";
		
		$img3 = $this->add(new FileAttribute("imagem03", A::AF_HIDE_LIST | A::AF_HIDE_ADD, "upload_prod"));
		$img3->m_filenameTpl = "[codigo.cdexp]_c";
		$img4 = $this->add(new FileAttribute("imagem04", A::AF_HIDE_LIST | A::AF_HIDE_ADD, "upload_prod"));
		$img4->m_filenameTpl = "[codigo.cdexp]_d";
		$img5 = $this->add(new FileAttribute("imagem05", A::AF_HIDE_LIST | A::AF_HIDE_ADD, "upload_prod"));
		$img5->m_filenameTpl = "[codigo.cdexp]_e";
		$img6 = $this->add(new FileAttribute("imagem06", A::AF_HIDE_LIST | A::AF_HIDE_ADD, "upload_prod"));
		$img6->m_filenameTpl = "[codigo.cdexp]_f";

		$usr = $this->add(new Attribute("usuario", A::AF_READONLY));
		$usr = $this->add(new DateTimeAttribute("data_alteracao", A::AF_READONLY));


		$this->setDescriptorTemplate("[codigo.dsexp]");

		//$user = SecurityManager::atkGetUser();
		//print_r($user);die;
	}

	function initial_values()
    {
	  $user =  get_current_user();
      $initial["data_alteracao"]    = array("year"=>date("Y"), "month"=>date("m"), "day"=>date("d"));
     // $initial["hora_cadastro"]    = date('H:i:s');
      $initial["usuario"] = $user["name"];
      return $initial;
    }

}
