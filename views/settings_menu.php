<html>
  <head>
	<style>
.jtable-input-field-container {
    margin-bottom: 5px;
    display: block;
    float: none;
}
#jtable-create-form {
    display: block;
    width: 450px;
    -moz-column-gap:40px;
    /* Firefox */
    -webkit-column-gap:40px;
    /* Safari and Chrome */
    column-gap:40px;
    -moz-column-count:2;
    /* Firefox */
    -webkit-column-count:2;
    /* Safari and Chrome */
    column-count:2;
}

#jtable-edit-form{
    display: block;
    width: 450px;
    -moz-column-gap:40px;
    /* Firefox */
    -webkit-column-gap:40px;
    /* Safari and Chrome */
    column-gap:40px;
    -moz-column-count:2;
    /* Firefox */
    -webkit-column-count:2;
    /* Safari and Chrome */
    column-count:2;
}
	</style>
  </head>
  <body>
	<div id="PeopleTableContainer" style="width: 100%"></div>
	<script type="text/javascript">

		$(document).ready(function () {

		    //Prepare jTable
			$('#PeopleTableContainer').jtable({
				title: 'Manage Menus',
				paging: true,
				pageSize: 10,
				sorting: true,
				defaultSorting: 'Name ASC',
				actions: {
					listAction: 'config/php/settings.php?action=list',
					createAction: 'config/php/settings.php?action=create',
					updateAction: 'config/php/settings.php?action=update',
					deleteAction: 'config/php/settings.php?action=delete'
				},
				fields: {
					id: {
						key: true,
						create: false,
						edit: false,
						list: false
					},
					menu_name: {
						title: 'Menu Name',
						width: '20%',
						options: 'config/php/lovs.php?data=menu'
					},
					sub_menu: {
						title: 'Submenu',
						width: '20%'
					},
					menu_link: {
						title: 'Menu Link',
						width: '20%'
					},
					menu_desc: {
						title: 'Menu Description',
						width: '20%'
					},
					menu_ico: {
						title: 'Menu icon',
						width: '20%'
					},
					menu_status: {
						title: 'Menu Status',
						width: '80%'
					},					
					RecordDate: {
						title: 'Record date',
						width: '80%',
						type: 'date',
						create: false,
						edit: false
					}
				}
			});

			//Load person list from server
			$('#PeopleTableContainer').jtable('load');

		});

	</script>
 
  </body>
</html>
