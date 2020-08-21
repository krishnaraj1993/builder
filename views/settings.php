<div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Menus</a></li>
              <li><a href="#tab_2" data-toggle="tab">Lookups</a></li>
              <li><a href="#tab_3" data-toggle="tab">Users</a></li>
            </ul>
            <div class="tab-content" style="height: 435px;overflow-y: scroll;">
              <div class="tab-pane active" id="tab_1">
                <?php include('settings_menu.php'); ?>
              </div>
              <div class="tab-pane" id="tab_2">
                <?php include('settings_lookup.php'); ?>
              </div>
              <div class="tab-pane" id="tab_3">
                <?php include('settings_users.php'); ?>
              </div>
         </div>
    </div>
 </div>