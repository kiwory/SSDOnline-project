<?php
	class DBConnection
	{
		private $server = "localhost:3308";
		private $username= "root";
		private $password= "";
		private $database = "ongeza_test";
		private $connect=0;
        
        

		public function GetConnection()
		{
			$this->connect = mysqli_connect($this->server, $this->username, $this->password, $this->database);
			if($this->connect)
			{
				return 1;
			}
			else 
			{
				return 0;
			}
		}

		public function ExecuteDML($sql)
		{
			$result = mysqli_query($this->connect, $sql);
			if($result)
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}

		public function GetRows($sql)
		{
			$result = $this->connect->query($sql);
			return $result;
		}
        
        public function FilterData($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = mysqli_real_escape_string($this->connect, $data);
            return $data;
        }
	}
?>