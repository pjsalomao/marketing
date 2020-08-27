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

	class Produtos extends Node
	{
	    function __construct($nodeUri)
	    {
	    parent::__construct($nodeUri, Node::NF_ADD_LINK | Node::NF_EDITAFTERADD);
	    $this->setTable('rep_produtos');

	    $this->add(new Attribute('id', Attribute::AF_AUTOKEY));
	    //Tabela: cad02 / Colunas: cdexp, dsexp
	  //  $this->add(new Attribute('codigo', Attribute::AF_OBLIGATORY));
	   // $cod = new ParserAttribute("codigo", 0, "[codigo]");
	   // $string = $cod->display($record, $mode);
	    $db = $this->getDb();
		//$res = $db->getrows("select cdexp, dsexp from tmp_prod;");
			$query = "SELECT cdexp, dsexp from tmp_prod;";
		//$mysqli = new mysqli("localhost", "marketing", "marketing", "marketing");
		//$mysqli = Db::doConnect("localhost", "marketing", "marketing", "marketing", 0,"utf8");
			//->doConnect("localhost", "marketing", "marketing", "marketing", 0,"utf8");
		//$res = $db->query("SELECT cdexp, dsexp from tmp_prod;");
			
			$res = $db->getRowsAssoc($query,"cdexp");
			
			echo $res[1][0];
			
		//$lista_cod = array();flfflflflfflfff
		//$lista_desc = array();
			$lista_prod = array();
			
		/*for ($row_no = $res->num_rows - 1; $row_no >= 0; $row_no--) {
			$res->data_seek($row_no);
			$row = $res->fetch_assoc();
			
			$lista_prod += [ $row["cdexp"] => $row["dsexp"] ];
			
		}*/
			//$lista_prod += [ "20.2010.00001" => "Celular LG K220" ];
			//$lista_prod += [ "15.2015.00008" => "Fogão 4 bocas Consul branco" ];
				
		//while ($obj = $res->next_record()){
		//	foreach ($res as $index => $value) {
			
			//array_push($lista_cod, $obj["cdexp"])
			//array_push($lista_desc, $obj["dsexp"])
				
		//	$lista_prod += [ $index => $obj["dsexp"] ];
			
			//$lista_prod += [ $obj["cdexp"] => $obj["dsexp"] ];
			
			//$lista_prod[$obj["cdexp"]] = $obj["dsexp"];
			
			//array_push($lista_prod, ($obj["cdexp"] => ($obj["dsexp"])));
				
		//}
			
	   $this->add(new ListAttribute('codigo', A::AF_OBLIGATORY, array_values($res), array_keys($res)));
	    
	  //  $recs = $db->getrows("SELECT codigo FROM rep_produto WHERE id = " . $cod);
	    
	  //  $codigo_formatado = &$this->getAttribute("codigo");
	    $string = "[codigo]";
	    
	  //  $codigo_formatado = str_replace('.', '_', $recs[0]["codigo"]);
	    
	   // $array = array();
	   // $array = str_split($codigo_formatado);
	    	
	   //$codigo_formatado = str_replace('.', '_', $string);;
	   // $i=0;
	   // while ($i<strlen($array)){
	   // 	$codigo_formatado = $array[$i] == "." ? $codigo_formatado . "_" : $codigo_formatado . $array[$i];
	   // 	$i++;
	   // }
	    
	   // $codigo_formatado = $this->stringparse($string, $data, false);
	    
	    $this->add(new TextAttribute('descricao'));
	    
	    $prod1 = $this->add(new FileAttribute("imagem01", A::AF_HIDE_LIST | A::AF_HIDE_ADD ,"upload_prod"));
	    $prod1->m_filenameTpl = $string  . "_a";
	    $prod2 = $this->add(new FileAttribute("imagem02", A::AF_HIDE_LIST | A::AF_HIDE_ADD ,"upload_prod"));
	    //$prod2->m_filenameTpl = $codigo_formatado . "_b";
	    $prod3 = $this->add(new FileAttribute("imagem03", A::AF_HIDE_LIST | A::AF_HIDE_ADD ,"upload_prod"));
	    //$prod3->m_filenameTpl = $codigo_formatado . "_c";
	    $prod4 = $this->add(new FileAttribute("imagem04", A::AF_HIDE_LIST | A::AF_HIDE_ADD ,"upload_prod"));
	    //$prod4->m_filenameTpl = $codigo_formatado . "_d";
	    $prod5 = $this->add(new FileAttribute("imagem05", A::AF_HIDE_LIST | A::AF_HIDE_ADD ,"upload_prod"));
	    //$prod5->m_filenameTpl = $codigo_formatado . "_e";
	    $prod6 = $this->add(new FileAttribute("imagem06", A::AF_HIDE_LIST | A::AF_HIDE_ADD ,"upload_prod"));
	    //$prod6->m_filenameTpl = $codigo_formatado . "_f";

	   
	    $this->setDescriptorTemplate('[codigo]');

	    //$user = SecurityManager::atkGetUser();
	    //print_r($user);die;
	}
		
  /*   public function edit_values($record){
         $cod = str_replace(".", "_", $record["codigo"]);
		 
		 $img1 = $this->getAttribute("imagem01");
		 $img1->m_filenameTpl = $cod . "_a";
		 $img2 = $this->getAttribute("imagem02");
		 $img2->m_filenameTpl = $cod . "_b";
		 $img3 = $this->getAttribute("imagem03");
		 $img3->m_filenameTpl = $cod . "_c";
		 $img4 = $this->getAttribute("imagem04");
		 $img4->m_filenameTpl = $cod . "_d";
		 $img5 = $this->getAttribute("imagem05");
		 $img5->m_filenameTpl = $cod . "_e";
		 $img6 = $this->getAttribute("imagem06");
		 $img6->m_filenameTpl = $cod . "_f";
		 
		 return $record;
    }*/
		
	public function preUpdate(&$record){
        $cod = str_replace(".", "_", $record["codigo"]);
		 
		 $img1 = $this->getAttribute("imagem01");
		 $img1->m_filenameTpl = $cod . "_a";
		 $img2 = $this->getAttribute("imagem02");
		 $img2->m_filenameTpl = $cod . "_b";
		 $img3 = $this->getAttribute("imagem03");
		 $img3->m_filenameTpl = $cod . "_c";
		 $img4 = $this->getAttribute("imagem04");
		 $img4->m_filenameTpl = $cod . "_d";
		 $img5 = $this->getAttribute("imagem05");
		 $img5->m_filenameTpl = $cod . "_e";
		 $img6 = $this->getAttribute("imagem06");
		 $img6->m_filenameTpl = $cod . "_f";
        return true;
    }
	
	//function formatCodigo($codigo_formatado){
		//$attr1 = $record["codigo"];
		//$sp_array = array();
		//$sp_array = str_split($codigo_formatado);
		//return $sp_array[0];
		//return str_replace(".", "_", $codigo_formatado);
	//}
	
	/*
	function stringfields($string)
     {
       atkdebug("Warning: deprecated use of stringfields(). Use atkStringParser class instead");
       $tmp = "";
       $adding = false;
       $fields = array();
       for ($i=0;$i<strlen($string);$i++)
       {
         if ($string[$i]=="]")
         {
           $adding = false;
           $fields[] = $tmp;
           $tmp="";
         }
         else if ($string[$i]=="[")
         {
           $adding = true;
         }
         else
         {
           if ($adding) $tmp.=$string[$i];
         }
       }
   
       return $fields;
     }
   */
     /**
      * Parse strings
      * @deprecated please use the atkStringParser class
      */
 	/*
     function stringparse($string, $data,$encode=false)
     {
       atkdebug("Warning: deprecated use of stringparse(). Use atkStringParser class instead");
      $fields = $this->stringfields($string);
       for ($i=0;$i<count($fields);$i++)
       {
         $elements = explode(".",$fields[$i]);
         $databin = $data;
         for($j=0;$j<count($elements);$j++)
         {
           if (array_key_exists($elements[$j],$databin))
           {
             $value = $databin[$elements[$j]];
             $databin = $databin[$elements[$j]];
           }
         }
         if ($encode)
         {
           $string = str_replace("[".$fields[$i]."]",rawurlencode($value),$string);
         }
         else
         {
           $string = str_replace("[".$fields[$i]."]",$value,$string);
         }
       }
       return $string;
     }
	*/
    }
?>
