<?php

?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">ADMINISTRATOR MENU</li>
		<?php
			global $conn;
			$role = $_SESSION['user_role'];
			$filter ='';
			if($role!='admin'){
				$filter = "AND `menu_status`='".$_SESSION['User_access']."'";
			}
			$sql = "SELECT * FROM `admin_menus` WHERE menu_name = '#'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {				
		?>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span><?php echo $row['sub_menu']; ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
		  <?php
		  $id = $row['id'];
		   $sql1 = "SELECT * FROM `admin_menus` WHERE menu_name = '$id' $filter";
		  $result1 = $conn->query($sql1);

			if ($result1->num_rows > 0) {
				while($row1 = $result1->fetch_assoc()) {
		  ?>
		  
            <li style=" cursor: pointer; "><a class="menu_click" data-title="<?php echo $row1['menu_desc']; ?>" data-page="<?php echo $row1['menu_link']; ?>"><i class="fa fa-circle-o"></i><?php echo $row1['sub_menu']; ?></a></li>
			<?php
				}
			}
			?>
		 </ul>
        </li>    
		<?php
			}
		}
		?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>