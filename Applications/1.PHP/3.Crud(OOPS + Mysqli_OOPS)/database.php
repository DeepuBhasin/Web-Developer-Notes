<?php
class Database {

	private $db_host = "localhost";
	private $db_user = "root";
	private $db_pass = "";
	private $db_name = "testing";

	private $mysqli = "";
	private $result = array();
	private $conn = false;

	public function __construct(){

		if(!$this->conn){
			$this->mysqli = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);

			$this->conn = true;

			if($this->mysqli->connect_error){
					array_push($this->result,$this->mysqli->connect_error);
				return false;
			}else{
				return true; 
			}
		}	
	}

	//function to insert into the database 
	public function insert($table,$params=array()){
		if($this->tableExists($table)){
			$tableColumns=implode(",",array_keys($params));

			$tableValues=implode("','",$params);
			
			$sql="INSERT INTO $table ($tableColumns) VALUES ('$tableValues')";
				
			if($this->mysqli->query($sql)){
				array_push($this->result,$this->mysqli->insert_id);
				return true;
			}else{
				array_push($this->result,$this->mysqli->error);
				return false;
			}	
		}else{
			return false;
		}
	}

	// function show to error 
	public function getResult(){
		$val = $this->result;
		$this->result=array();
		return $val;
	}

	//function to update row in the database
	public function update($table,$params=array(),$where=null){
		if($this->tableExists($table)){
			
			$args = array();

			foreach($params as $key=>$value){
				$args[] = "$key = '$value'";
			}
			
			$tableValues=implode(", ",$args);
			
			$sql="UPDATE $table SET $tableValues ";
			
			if($where !=null){
				$sql .="Where $where";
			}

			if($this->mysqli->query($sql)){
				array_push($this->result,$this->mysqli->affected_rows);
				return true;
			}else{
				array_push($this->result,$this->mysqli->error);
				return false;
			}	
		}else{
			return false;
		}
	}

	//function to delete table or row(s) from database
	public function delete($table,$where=null){
		if($this->tableExists($table)){
			
			$sql="DELETE FROM $table ";
			
			if($where !=null){
				$sql .="Where $where";
			}

			if($this->mysqli->query($sql)){
				array_push($this->result,$this->mysqli->affected_rows);
				return true;
			}else{
				array_push($this->result,$this->mysqli->error);
				return false;
			}	
		}else{
			return false;
		}
	}

	//function to selete 
	public function select($table,$row="*",$join=null,$where=null,$order=null,$limit=null){
		if($this->tableExists($table)){
			$sql="SELECT $row FROM $table";

			if($join!=null){
				$sql.=" JOIN $join";
			}
			if($where!=null){
				$sql.=" WHERE $where";
			}
			if($order!=null){
				$sql.=" ORDER BY $order";
			}
			if($limit!=null){

				if(isset($_GET['page'])){
						$page =$_GET['page'];
				}else{
					$page = 1;
				}	

				$start = ($page-1)*$limit;

				$sql.=" Limit $start,$limit";
			}
			// echo $sql;
			$query = $this->mysqli->query($sql); 
			if($query){
				$this->result= $query->fetch_all(MYSQLI_ASSOC);
				return true;
			}else{
				array_push($this->result,$this->mysqli->error);
				return false;
			}

		}else{
			return false;
		}
	}

	//function for pagination 
	public function pagination($table,$join=null,$where=null,$limit=null){
		if($this->tableExists($table)){
			
			if($limit!=null){
				$sql= "SELECT COUNT(*) FROM $table";

				if($join!=null){
					$sql.=" JOIN $join";
				}
				if($where!=null){
					$sql.="WHERE $where";
				}

				$query = $this->mysqli->query($sql);

				$total_record = $query->fetch_array();
				$total_record = $total_record[0];

				$total_page = ceil($total_record / $limit);

				$url = basename($_SERVER['PHP_SELF']);

				if(isset($_GET['page'])){
						$page =$_GET['page'];
				}else{
					$page = 1;
				}	

				$output = "<ul class='pagination'>";

				if($page>1){
					$output = "<li><a href='$url?page=".($page-1)."'>Prv</a></li>";
				}

				if($total_record > $limit){
					
					for($i=1;$i<=$total_page;$i++){
						if($i==$page){
							$class = "class='active'";
						}else{
							$class="";
						}
						$output .= "<li><a $class href='$url?page=$i'>$i</a></li>";
					}
				}
				if($total_page>$page){
					$output .= "<li><a href='$url?page=".($page+1)."'>Next</a></li>";
				}

				$output .= "</ul>";
				return $output;

			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	// function for sql query
	public function sql($sql){
		$query = $this->mysqli->query($sql);
		if($query){
			$this->result= $query->fetch_all(MYSQLI_ASSOC);
			return true;
		}else{
			array_push($this->result,$this->mysqli->error);
			return false;
		}
	}

	// table exist 
	private function tableExists($table){
		$sql = "SHOW TABLES FROM $this->db_name LIKE '$table'";
		$tableInDb = $this->mysqli->query($sql);
		if($tableInDb){
			if($tableInDb->num_rows>0){
				return true;
			}else{
				array_push($this->result,$table." does not exist in this database.");
				return false;
			}
		}
	}

	//close Connection 
	function __destruct(){
		if($this->conn){
			if($this->mysqli->close()){
				$this->conn=false;
				return true;
			}else{
				return false;
			}
		}
	}
}
?>