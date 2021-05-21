<?php
namespace college\employee\teacher{

	class teacherProfile{

		private $techerName;
		private $designation;

		public function setName($tname,$tdesignation){
			$this->teacherName=$tname;
			$this->designation=$tdesignation;
		}

		public function getName(){
			return "Name of Teacher is $this->teacherName and $this->designation <br/>";
		}
	} 
}

?>