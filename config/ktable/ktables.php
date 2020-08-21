<?php
session_start();
include('config.php');
class ktables{
	public $table_arg = array();
	public $content;
	public $table_id;
	public $table_db_id;
	public $tablename;
	public $rows_view;
	public $kbuttons;
	public $pagination='';
	public $where='';
	public $order='';
	public $rowactions = null;
	public $table_string = null;
	public $form_cols = 0;
	public $edit_types;
	public $setlov;
	public $total_rows = 0;
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
		$action_display = '';
		if($this->rowactions!=null){
			$action_display = 'none';
		}
		$this->content = '
		
		<table id="customers" style="font-size: x-small;">
		  <tr>
			  <th colspan="'.($numargs+1+$actions).'" class="tools">
				<!--<img src="load.gif" style="width: 3%;">-->
				<div class="components" style="height: 20px;">
				<ul style="display:'.$action_display.'">				
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
		
		
		$this->content = $this->content.'<th style="width: 68px;display:'.$action_display.'">Action</th>';
		$this->content = $this->content.$this->get_button_headers().'<tr>';
		$this->db_data();
		
		$pages_list = ''; 
		for($x=1;($x*10)<=$this->total_rows;$x++){
			if($totals==$x){
				$pages_list = $pages_list.'<option value="'.$x.'" selected>'.$x.'</option>';
			}else{
				$pages_list = $pages_list.'<option value="'.$x.'">'.$x.'</option>';
			}
		}
		$paginate = $this->pagination;
		$this->content = $this->content.'<tr>
		  <th colspan="'.($numargs+1+$actions).'" class="tools">
		  <div class="pagination" style="display:'.$paginate.'">
			  <a data-id="'.$table_id.'" href="#">&laquo;</a>
			  <a data-id="'.$table_id.'" id="pagination_prv"><</a>
			  <a data-id="'.$table_id.'" href="#" style="padding: 0px;"><input type="hidden" value="'.$totals.'" id="pagination_val" style="border: 0;padding: 4px;margin-bottom: 0;border-radius: 0;font-size: x-small;width: 36px;"></a>
			  <a data-id="'.$table_id.'" id="pagination_nxt">></a>
			  <a data-id="'.$table_id.'" href="#">&raquo;</a>
			</div>
			<div class="pagination" style="float: right;display:'.$paginate.'">
			<select style="font-size: 15px;padding: 1px;" data-id="'.$table_id.'" id="gotokables">'.$pages_list.'</select>
			</div>
		  </th>
		  </tr>
		</table>';
		
		echo $this->content;
	}
	
	public function db_data(){
		global $mysqli;
		$condition = $this->where;
		$order = $this->order;
		$primarykey = $this->table_db_id;
		$table = $this->tablename;
		$table_id = $this->table_id;
		$limit = 'LIMIT '.$this->rows_view;
		if($this->table_string==null){
			$sql = "SELECT * FROM $table $condition $order $limit";
		}else{
			$sql = $this->table_string." ".$limit;
		}
		
		$sql1 = "SELECT * FROM $table $condition $order";
		
		
		$action_display = '';
		if($this->rowactions!=null){
			$action_display = 'none';
		}
		
		$numargs = count($this->table_arg);	
		$result = $mysqli->query($sql);
		$result1 = $mysqli->query($sql1);
		$this->total_rows = $result1->num_rows;
		if ($result->num_rows > 0) {
			$this->content = $this->content.'<tr>';
			while($row = $result->fetch_assoc()) {
				for ($i = 0; $i < $numargs; $i++) {
					$this->content = $this->content.'<td>'.$row[explode('=', $this->table_arg[$i])[1]].'</td>';
				}
				$this->content = $this->content.'<td><button class="button Red dalete_rows" data-id='.$table_id.' data-dbid='.$row[$primarykey].' style=" padding: 0px 6px;display:'.$action_display.'"><i class="fa fa-close"></i></button>
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
		$divs = 0;
		$text = 0;
		$cols = $this->form_cols;
		$tid = $this->table_id;
		$content = '<form id="ktables'.$tid.'" method="POST"><table style="width: 100%;">';
		//$content =  $content."<div>".print_r($this->edit_types)."</div>";
		$numargs = count($this->table_arg);	
		for ($i = 0; $i < $numargs; $i++) {
			$divs++;
			if($divs==$cols){ $content = $content.'<tr>'; $divs=0; }
			if(isset($this->edit_types[(explode('=', $this->table_arg[$i])[1])])){
				if($this->edit_types[(explode('=', $this->table_arg[$i])[1])]!='hidden'){
					if($data!=0){
						$val = $data[explode('=', $this->table_arg[$i])[1]];
					}
					
					$content = $content.'<td>'.explode('=', $this->table_arg[$i])[0].'</td><td>'.$this->get_input_type($val,$i).'</td>';
				}
			}else{
					if($data!=0){
							$val = $data[explode('=', $this->table_arg[$i])[1]];
					}
				
					$content = $content.'<td>'.explode('=', $this->table_arg[$i])[0].'</td><td>'.$this->get_input_type($val,$i).'</td>';
			}
			if($divs==$cols){ $content = $content.'</tr><tr>'; }
			
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
				if(isset($this->edit_types[$key])){
					if($this->edit_types[$key]!='hidden'){
						if($key!=''){
							$label = $label.$key.",";	
							$value = $value."'".$data[$key]."',";
						}
					}
				}else
				{
					if($key!=''){
						$label = $label.$key.",";	
						$value = $value."'".$data[$key]."',";
					}
				}
			}
			$label = rtrim($label,',');
			$value = rtrim($value,',');

			$sql =  "INSERT INTO $table($label) VALUES ($value)";
			$mysqli->query($sql);
		}else{
			$str = '';
			for ($i = 0; $i < $numargs; $i++) {
				$key = explode('=', $this->table_arg[$i])[1];
					if(isset($this->edit_types[$key])){
						if($this->edit_types[$key]!='hidden'){
							if($key!=''){
								$label = $key;
								$value = $data[$key];
								$str = $str.$label."='".$value."',";
							}
						}
					}else{
						if($key!=''){
							$label = $key;
							$value = $data[$key];
							$str = $str.$label."='".$value."',";
						}
					}
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
		$this->render();
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
	
	public function get_input_type($val,$i){
		$name = explode('=', $this->table_arg[$i])[1];
		$find = '';
		$content = '';
		if(isset($this->setlov[$name])){
			$find = $this->setlov[$name];
			$content = $this->get_dropdown($find,$name);
			
		}else{
			$content = '<input type="text" id="'.$name.'" value="'.$val.'" name="'.$name.'" style="width: 100%;">';
		}
		
		return $content;
	}
	
	public function get_dropdown($str,$name){
		global $mysqli;
		$rowdata = '<select name="'.$name.'">';
		$result = $mysqli->query($str);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$rowdata = $rowdata.'<option value="'.$row['k'].'">'.$row['v'].'</option>';
			}
		}
		$rowdata = $rowdata.'</select>';
		return $rowdata;
	}
	
	
}

?>