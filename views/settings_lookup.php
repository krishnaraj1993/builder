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
	<div id="lookupcontainer" style="width: 100%"></div>
	<script type="text/javascript">

		$(document).ready(function () {

		    //Prepare jTable
			$('#lookupcontainer').jtable({
				title: 'Manage lookups',
				paging: true, //Enable paging
				pageSize: 1000, //Set page size (default: 10)
				sorting: true, //Enable sorting
				defaultSorting: 'Name ASC', //Set default sorting
				actions: {
					listAction: 'config/php/lookups.php?action=list',
					createAction: 'config/php/lookups.php?action=create',
					updateAction: 'config/php/lookups.php?action=update',
					deleteAction: 'config/php/lookups.php?action=delete'
				},
				fields: {
					id: {
						key: true,
						create: false,
						edit: false,
						list: false
					},
					root: {
						title: 'root',
						width: '20%',
						options: 'config/php/lovs.php?data=lookup'
					},
					label: {
						title: 'label',
						width: '20%'
					},
					value: {
						title: 'Value',
						width: '20%'
					},
					shrotcode: {
						title: 'shrotcode',
						width: '20%'
					},					
					timestamp: {
						title: 'Record date',
						width: '80%',
						type: 'date',
						create: false,
						edit: false
					}
				}
			});

			//Load person list from server
			$('#lookupcontainer').jtable('load');
	
		});

	</script>
 
  </body>
</html>
