<?php
	class PDOData {
		private $db = null; //Doi tuong PDO
		
		/**
		* Ham tao
		*/
		public function __construct() {
			try {
			    /* Ket noi CSDL */
				$this->db = new PDO("mysql:host=localhost:3306;dbname=QLDT;", "root", "123456");
			} catch(PDOException $ex) { echo $ex->getMessage();	}
		}
		
		
		/**
		* Ham huy
		*/
		public function __destruct() {
		    /** Dong ket noi */
			try {
				$this->db = null;
			} catch(PDOException $ex) { echo $ex->getMessage();	}
		}

        /**
		* Thuc hien truy van
		* $query: Cau lenh select
		* return: mang cac ban ghi, so trang
		*/
		public function doQuery($query) {
			$ret = array(); 
			
			try {
				$stmt = $this->db->query($query);  
				if ($stmt) {
					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
						$ret[] = $row; 
					}
				} 
			} catch(PDOException $ex) {	echo $query; }
			
			return $ret;
		}
		
		/**
		* Thực hiện truy vấn theo câu lệnh chuẩn bị trước
		* $queryTmpl: Mẫu câu truy vấn
		* $paras: Mảng các tham số cho truy vấn
		* return: Mảng các bản ghi
		*/
		public function doPreparedQuery($queryTmpl, $paras) {
			$ret = array();
			try {
				$stmt = $this->db->prepare($queryTmpl);
				foreach ($paras as $k=>$v) $stmt->bindValue($k+1, $v);
				$stmt->execute();
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$ret[] = $row; 
				}
			} catch(PDOException $ex) {	echo $ex; }
			
			return $ret;
		}	

		/**
		* Thuc hien cap nhat
		* $sql: Cau lenh insert, update, delete, ...
		* return: So ban ghi duoc cap nhat
		*/
		public function doSql($sql) {
		    $count = 0;
			try {
				$count = $this->db->exec($sql);
			} catch(PDOException $ex) {
				$count = -1;
			}
			return $count;
		}
		
		/**
		* Thực hiện cập nhật theo câu lệnh chuẩn bị trước
		* $queryTmpl: Mẫu câu cập nhật insert, update, delete, ...
		* $paras: Mảng các tham số cho câu lệnh cập nhật
		* return: Số bản ghi đã cập nhật
		* chua insert duoc :((
		*/
		public function doPrepareSql($queryTmpl,$paras) {
			$count = 0;
			$a =$b="";
			try {
				$stmt = $this->db->prepare($queryTmpl);
				
				foreach ($paras as $k=>$v){
					$a.=($k+1).",";
					$b.=($v).",";
					$stmt->bindValue($k+1, $v);
				}
				//$stmt->execute(); // bo di ma chay thu
				
			} catch(PDOException $ex) {	echo $ex; $count=-1; }
			// xem dau ra the nao
			$out = "trong: ".$queryTmpl." ".$a." ".$b;
			return $out;
		}	
		 
	}
