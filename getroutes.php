<?php
class Route{
	private $_uri = array();

	public function add($uri){
		$this -> _uri[] = '/' . trim($uri, '/');
	}

	public function submit(){
		$uriGetParam = isset($_GET['uri']) ? '/' . $_GET['uri'] : '/';
		$uriArray = array();
		foreach ($this->_uri as $key => $value){
			if(preg_match("#^$value$#", $uriGetParam))
			{
				$mainvalue = "./pages/".$value;
				array_push($uriArray, $mainvalue);
			}
		}
		// var_dump($uriArray);
		if($_GET['uri'] == "index.php" || $_GET['uri'] == "blog")
		{
			// include './blocks/header.php';
			include './pages/blog.php';
			// include './blocks/footer.php';
			exit();
		}
		elseif(sizeof($uriArray) == 1)
		{
			// include './blocks/header2.php';
			include (trim(($uriArray[0].'.php'), '/'));
			// include './blocks/footer.php';

			exit();
		}else{
			// include './blocks/header2.php';
			include './pages/404.php';
			// include './blocks/footer.php';

			exit();
		}
	}
}
?>
