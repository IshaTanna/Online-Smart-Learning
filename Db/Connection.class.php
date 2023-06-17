<?php
	class Connection
	{
		private $servername="localhost";
		private $username="id20825638_id16251952_root";
		private $password="Ishu@1103";
		private $dbname="id20825638_id16251952_online1";
		public $con=null;
		function __construct()
		{
			$this->con=mysqli_connect($this->servername,$this->username,$this->password,$this->dbname) or die("Connection Error:");
		}
		function isUnique($query)
		{
			$res=mysqli_query($this->con,$query);
			if(mysqli_num_rows($res)==0)
				return true;
			else
				return false;
		}
	}
?>