<?php

if(!isset($_SESSION["21f914a3a7631cacc81c5a80d7301bda"])){
	$_SESSION["21f914a3a7631cacc81c5a80d7301bda"] = "";
}

function getContents($id,$panier){
	$_1 = explode($id." => ", $panier)[1];
	$_2 = explode("end(".$id.")", $_1)[0];
	return $_2;
}

function setSss($pre_sss){
	$_SESSION["21f914a3a7631cacc81c5a80d7301bda"] = $pre_sss;
}

function close_panier(){
	unset($_SESSION["21f914a3a7631cacc81c5a80d7301bda"]);
	unset($_SESSION["panier"]);
}

function getSss(){
	return $_SESSION["21f914a3a7631cacc81c5a80d7301bda"];
}

function getSessionPanier(){
	return $_SESSION["panier"];
}

function addProduct($product){
	if(strpos($_SESSION["panier"], explode(" => ", $product)[0]) !== true){
		$_SESSION["panier"].=$product;
		if(strpos($_SESSION["21f914a3a7631cacc81c5a80d7301bda"], explode(" => ", $product)[0]) === false){
			$_SESSION["21f914a3a7631cacc81c5a80d7301bda"].=explode(" => ", $product)[0].",";
		}
		
	}
}

function getNumberArticle(){
	if(!empty($_SESSION["21f914a3a7631cacc81c5a80d7301bda"])){
		$explode = explode(",", $_SESSION["21f914a3a7631cacc81c5a80d7301bda"]);
		return count($explode)-1;
	}else{
		return 0;
	}
}

function getValue($product, $identifier){
	if(strpos($_SESSION["panier"], explode(" => ", $product)[0]) !== false){
		if(strpos(getContents($product, $_SESSION["panier"]), $identifier) !== false){
			$_1 = str_replace("contents(", "", getContents($product, $_SESSION["panier"]));
			$_2 = str_replace(")", "", $_1);
			$_3 = explode(",",$_2);
			foreach($_3 as $value){
				if(strpos($value, $identifier) !== false){
					return explode("=> ", $value)[1];
				}
			}
		}
	}
}

function getAllProducts(){
	return $_SESSION["21f914a3a7631cacc81c5a80d7301bda"];
}

function changeContents($product,$identifier,$values){
	$final = "contents(";
	if(strpos($_SESSION["panier"], explode(" => ", $product)[0]) !== false){
		if(strpos(getContents($product, $_SESSION["panier"]), $identifier) !== false){
			$_1 = str_replace("contents(", "", getContents($product, $_SESSION["panier"]));
			$_2 = str_replace(")", "", $_1);
			$_3 = explode(",",$_2);
			$_5 = count($_3);
			$_4 = 1;
			foreach($_3 as $value){
				if(strpos($value, $identifier) !== false){
					$final.= str_replace(getValue($product, $identifier), $values, $value);
					if($_4 != $_5){
						$final.=",";
					}
				}else{
					$final.=$value;
					if($_4 != $_5){
						$final.=",";
					}
				}
				$_4+=1;
			}
			$final.=")";
			$replace = str_replace(getContents($product, $_SESSION["panier"]), $final, $_SESSION["panier"]);
			$_SESSION["panier"] = $replace;
		}
	}
}

function addContents($product,$identifier,$values){
	$final = "contents(";
	if(strpos($_SESSION["panier"], explode(" => ", $product)[0]) !== false){
		if(strpos(getContents($product, $_SESSION["panier"]), $identifier) === false){
			$_1 = str_replace("contents(", "", getContents($product, $_SESSION["panier"]));
			$_2 = str_replace(")", "", $_1);
			$_3 = explode(",",$_2);
			$_5 = count($_3);
			$_4 = 1;
			foreach($_3 as $value){
				$final.=$value;
				if($_4 != $_5){
					$final.=",";
				}
				$_4+=1;
			}
			$final.=", ".$identifier." => ".$values.")";
			$replace = str_replace(getContents($product, $_SESSION["panier"]), $final, $_SESSION["panier"]);
			$_SESSION["panier"] = $replace;
		}
	}
}

?>