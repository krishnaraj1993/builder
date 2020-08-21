<?php
session_start();
include('config.php');
class ktables{
	public $table_arg = array();
	public $content;
	public $table_id;
	public $table_db_id;
	public $tablename;
	public $kbuttons;
	public $rows_view;
	public function headers(){
		$numargs = func_num_args();
		$arg_list = func_get_args();
		$this->table_arg = $arg_list;
	}
	public function render($totals=10){
		$this->table_db_id = $this->set_primary_key();
		$table_id = $this->table_id;
		$numargs = count($this->table_arg);	
		$actions = count($this->kbuttons);	
		$this->content = '
		<table id="customers">
		  <tr>
			  <th colspan="'.($numargs+1+$actions).'" class="tools">
				<!--<img src="load.gif" style="width: 3%;">-->
				<div class="components">
				<ul>				
				  <li><a class="button Blue" id="'.$table_id.'" style=" padding: 0px 5px; font-size: smaller;">import</a></li>
				  <li><a class="button Blue" id="'.$table_id.'" style=" padding: 0px 5px; font-size: smaller;">export</a></li>
				  <li><a class="button Blue" id="'.$table_id.'" style=" padding: 0px 5px; font-size: smaller;">Serach</a></li>
				  <!--<li><input type="text" id="search" style="padding: 5px;margin: 4px;" placeholder="seach item here.."></li>-->
				  <li><a class="button Blue create_new_item" id="'.$table_id.'" style=" padding: 0px 5px; font-size: smaller;">create</a></li>
				</ul>
					  
				</div>
			  </th>
			  </tr>
		<tr>';
		for ($i = 0; $i < $numargs; $i++) {
			$this->content = $this->content.'<th>'.explode('=', $this->table_arg[$i])[0].'</th>';
		}
		$this->content = $this->content.'<th style="width: 68px;">Action</th>';
		$this->content = $this->content.$this->get_button_headers().'<tr>';
		$this->db_data();
		$this->content = $this->content.'<tr>
		  <th colspan="'.($numargs+1+$actions).'" class="tools">
		  <div class="pagination">
			  <a data-id="'.$table_id.'" href="#">&laquo;</a>
			  <a data-id="'.$table_id.'" id="pagination_prv"><</a>
			  <a data-id="'.$table_id.'" href="#" style="padding: 0px;"><select id="pagination_val" style="border: 0;padding: 4px;margin-bottom: 0;border-radius: 0;font-size: small;"><option>1</option></select></a>
			  <a data-id="'.$table_id.'" id="pagination_nxt">></a>
			  <a data-id="'.$table_id.'" href="#">&raquo;</a>
			</div>
		  </th>
		  </tr>
		</table>';
		
		echo $this->content;
	}
	
	public function db_data(){
		global $mysqli;
		$primarykey = $this->table_db_id;
		$table = $this->tablename;
		$table_id = $this->table_id;
		$limit = 'LIMIT '.$this->rows_view;
		$sql = "SELECT * FROM $table $limit";
		$numargs = count($this->table_arg);	
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
			$this->content = $this->content.'<tr>';
			while($row = $result->fetch_assoc()) {
				for ($i = 0; $i < $numargs; $i++) {
					$this->content = $this->content.'<td>'.$row[explode('=', $this->table_arg[$i])[1]].'</td>';
				}
				$this->content = $this->content.'<td><button class="button Red dalete_rows" data-id='.$table_id.' data-dbid='.$row[$primarykey].' style=" padding: 0px 6px; "><i class="fa fa-close"></i></button>
				<button class="button green edit_rows" data-id='.$table_id.' data-dbid='.$row[$primarykey].' style=" padding: 0px 6px; "><i class="fa fa-pencil"></i></button>
				</td>
				'.$this->get_buttons($row).'
				</tr>';
			}
		} else {
			echo "";
		}
	}
	
	public function register($id,$object){
		$this->table_id = $id;
		$_SESSION[$id] = $object;
	}
	public function render_form($data=0,$id=0){
		$val = '';
		$tid = $this->table_id;
		$content = '<form id="ktables'.$tid.'" method="POST"><table style="width: 100%;">';
		$numargs = count($this->table_arg);	
		for ($i = 0; $i < $numargs; $i++) {
			if($data!=0){
				$val = $data[explode('=', $this->table_arg[$i])[1]];
			}
			$content = $content.'<tr><td>'.explode('=', $this->table_arg[$i])[0].'</td><td><input type="text" id="fname" value="'.$val.'" name="'.explode('=', $this->table_arg[$i])[1].'" style="width: 100%;"></td><tr>';
		}
		echo $content."
		<tr>
		<td></td><td><input type='button' data-update='".$id."' class='insertktable' id='".$tid."' value='Submit' style='float: right;'></td>
		</tr>
		</table></form>";
	}
	
	public function insert_data($data,$dbid){
		$label = '';
		$value = '';
		global $mysqli;
		$table = $this->tablename;
		$numargs = count($this->table_arg);
		if($dbid==0){
			for ($i = 0; $i < $numargs; $i++) {
				$key = explode('=', $this->table_arg[$i])[1];
				$label = $label.$key.",";
				$value = $value."'".$data[$key]."',";
			}
			$label = rtrim($label,',');
			$value = rtrim($value,',');

			$sql =  "INSERT INTO $table($label) VALUES ($value)";
			$mysqli->query($sql);
		}else{
			$str = '';
			for ($i = 0; $i < $numargs; $i++) {
				$key = explode('=', $this->table_arg[$i])[1];
				$label = $key;
				$value = $data[$key];
				$str = $str.$label."='".$value."',";
			}
			$str = rtrim($str,',');
			$primarykey = $this->table_db_id;
			$sql =  "UPDATE $table SET $str WHERE $primarykey = $dbid";
			$mysqli->query($sql);
		}
		$this->render();
	}
	
	public function set_primary_key(){
		global $mysqli;
		$table = $this->tablename;
		$sql = "SHOW KEYS FROM $table WHERE Key_name = 'PRIMARY'";
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['Column_name'];
		}
		else
		{
			return 0;
		}
	}
	
	public function form_edit($id){
		global $mysqli;
		$primarykey = $this->table_db_id;
		$table = $this->tablename;
		$sql = "SELECT * FROM $table WHERE $primarykey=".$id;
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$this->render_form($row,$id);
		}
	}
	
	public function form_delete($id){
		global $mysqli;
		$primarykey = $this->table_db_id;
		$table = $this->tablename;
		$sql = "DELETE FROM $table WHERE $primarykey=".$id;
		$mysqli->query($sql);
	}
	public function get_buttons($data){
		$content = '';
		if(sizeof($this->kbuttons)!=0){
			foreach($this->kbuttons as $key=>$value){
				$id = explode(':', $value);
				$content = $content."<td><button onclick='".$id[0]."(".$data[$id[1]].")'>".$key."</button></td>";
			}
		}
		return $content;
	}
	
	function get_button_headers(){
		$content = '';
		if(sizeof($this->kbuttons)!=0){
			foreach($this->kbuttons as $key=>$value){
				$content = $content."<th style='width: 59px;'>".$key."</th>";
			}
		}
		return $content;
	}
	
}

?>