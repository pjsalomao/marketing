<?php

namespace App\Modules\Marketing;

use Sintattica\Atk\Core\Node;
use Sintattica\Atk\Attributes\Attribute;
use Sintattica\Atk\Attributes\TextAttribute;
use Sintattica\Atk\Security\SecurityManager;
use Sintattica\Atk\Attributes\FileAttribute;

class Catalogo extends Node
{
    function __construct($nodeUri)
    {
        parent::__construct($nodeUri, Node::NF_ADD_LINK | Node::NF_EDITAFTERADD);
        $this->setTable('marketing_catalogo');

        $this->add(new Attribute('id', Attribute::AF_AUTOKEY));
       // $this->add(new Attribute('name', Attribute::AF_OBLIGATORY));
	$prod = $this->add(new FileAttribute("name", Attribute::AF_HIDE_LIST|AF_HIDE_ADD|AF_FILE_NO_SELECT|AF_FILE_NO_DELETE,"/home/pjsalomao/projects/conference/src/Modules/Marketing/upload"));
	$prod->m_filenameTpl = "name_[id]";
//	$prod->m_dir = "upload";
        //$this->add(new TextAttribute('description'::AF_HIDE_LIST));

        $this->setDescriptorTemplate('[name]');

        //$user = SecurityManager::atkGetUser();
        //print_r($user);die;
    }
}
?>
