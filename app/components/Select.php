<?php
	class Select {
		private $col = '';
		private $table = ''; 
		private $where; 
		private $limit; 
		
		public function __construct($arr = []) {
			if (count($arr) == 0) {
				$this->col = '*'; 
			} else {
				foreach($arr as $key => $val) {
					$this->col .= $val; 
					if (!is_numeric($key)) {
						$this->col .= ' AS ' . $val;
						
					}
					$this->col . ', '; 
				}
				$this->col = rtrim($this->col, ', ');
				return $this;	
			}
		}
		
		public function from($from) {
			$this->table = $from;
			return $this; 
			
		}
		
		public function and($arr = []) {
			foreach ($arr as $val) {
				$this->where .= ' AND ' . $val; 
			}
			return $this; 
			
		}
		
		public function limit($count, $offset = 0) {
			$this->limit = "$offset, $count";
			return $this; 			
		}
		
		public function build() {
			$str = "
				SELECT {$this->col}
				FROM {$this->table}
				WHERE 1 {$this->where}
				LIMIT {$this->limit};
			";
			return $str; 
			
		}
		
	
	}


?>