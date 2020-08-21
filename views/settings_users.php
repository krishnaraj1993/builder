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
	<div id="PeopleTableContainer100" style="width: 100%"></div>
	<script type="text/javascript">

		$(document).ready(function () {

		    //Prepare jTable
			$('#PeopleTableContainer100').jtable({
				title: 'Manage Menus',
				paging: true,
				pageSize: 10,
				sorting: true,
				defaultSorting: 'Name ASC',
				actions: {
					listAction: 'config/php/users.php?action=list',
					createAction: 'config/php/users.php?action=create',
					updateAction: 'config/php/users.php?action=update',
					deleteAction: 'config/php/users.php?action=delete'
				},
				fields: {
					id: {
						key: true,
						create: false,
						edit: false,
						list: false
					},
					firstname: {
						title: 'firstname',
						width: '20%'
					},
					lastname: {
						title: 'lastname',
						width: '20%'
					},
					username: {
						title: 'username',
						width: '20%'
					},
					password: {
						title: 'password',
						width: '20%'
					},
					role: {
						title: 'Role type',
						options: { 'admin': 'Admin', 'user': 'Non admin' }
					},
					otp_required: {
						title: 'otp_required',
						options: { '1': 'Yes', '0': 'No'},
						width: '60%'
					}
				}
			});

			//Load person list from server
			$('#PeopleTableContainer100').jtable('load');

		});

	</script>
 
  </body>
</html>
