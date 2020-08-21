$('#page_loader_div').on('click','#submitsheet',function(){
	if(validate_form()){
		$.post('config/php/students/new_student.php', $('#studentform').serialize(),function(data, status){
			if(data=='true'){
				
				$('#page_loader_div').load("views/students.php");
			}else{
				$('#alertmsg').css('display','');
				$('#error_msg').text("Something went wrong..!");
			}
		});
	}
});


$('#page_loader_div').on('click','#btnactionbutton',function(){
	
		$.post( "views/configuratioon/submit_my_reciept.php",$('#repiectcreation').serialize(),function(data, status){
			$('#page_loader_div').load("views/invoice.php?data="+data);
		});
});

$('#page_loader_div').on('click','.linkclick',function(){
	var page = $(this).data('page');
	$('#page_loader_div').load("views/"+page);
});




function validate_form(){
	var msg = '';
	var flag = 0;
	$( ".required-input" ).each(function( index ) {		
		if(($(this).val()).length==0){
			$(this).addClass("error_field");
			msg =  msg + $(this).attr('placeholder')+" ,";
			flag++;
		}
	});
	$( ".required-option" ).each(function( index ) {		
		if(($(this).val())==0){
			$(this).addClass("error_field");
			msg =  msg + $(this).attr('placeholder')+" ,";
			flag++;
		}
	});
	
	if(flag!=0){
		$('#alertmsg').css('display','');
		$('#error_msg').text(msg+"fields are Required");
		return false;
	}
	else
	{
		return true;
	}
	
}
$('#page_loader_div').on('click','.alert_close_btn',function(){
	$('#alertmsg').css('display','none');
	$( ".required-input" ).removeClass('error_field');
	$( ".required-option" ).removeClass('error_field');
});



$('#page_loader_div').on('click','#view_marks_card',function(){
	var year = $('#rseries').find(':selected').data('year');
	var sem = $('#semid').val();
	var rno = $('#rno_id').val();
	var table = $('#rseries').val();
	var branch = $('#rseries').find(':selected').data('branch');
	var month = $('#rseries').find(':selected').data('month');
	
	$('#markscard_details').load("views/templates/result_template.php?sem="+sem+"&fname=''&mname=''&rno="+rno+"&year='"+year+"'&branch="+branch+"&table="+table+"&ser="+month+"");
});
//feedback/operations====================================
function get_questions(obj){
	var feedback = obj.value;
	$.post("config/php/feedback/operations.php",
    {
        action: 1,
        type: feedback
    },
    function(data, status){
		$('#table_otline2 tbody').empty();
        $('#table_otline2 tbody').append(data);
    });
}

function findstudent(obj){
	rno = obj.value;
	if(rno.length==10){
		//select_brch(rno);
		$.post("config/php/feedback/operations.php",
		{
			action: 2,
			rno: rno
		},
		function(data, status){
			document.getElementById('gptname').value =  data;
		});
	}
}
	
	
function select_brch(rno){
	$.post("config/php/feedback/operations.php",
    {
        action: 3,
        type: rno
    },
    function(data, status){
		document.getElementById('input_6').value =  data;
    });
}

var dept1 = "";
var sem1 = "";
function select_lecture(obj){
	var div = document.getElementById('divs_brch').value;
	var sem = obj.value
	dept1 = div;
	sem1 = sem;		
	
	$.post("config/php/feedback/operations.php",
    {
        action: 4,
        div: div,
        sem: sem,
    },
    function(data, status){
		document.getElementById('input_6').value =  data;
    });
}

function set_names(obj){
	var sname = obj.value;
	var sem = obj.value;	
	sem1 = encodeURI(sem1);
	sname= encodeURI(sname);
	dept1 = encodeURI(dept1);
	
	$.post("config/php/feedback/operations.php",
    {
        action: 5,
        div: dept1,
        sem: sem1,
        sname: sname,
    },
    function(data, status){
		document.getElementById('input_6').value =  data;
    });
}
//==========================================================
$('#page_loader_div').on('click','#add_result_sheet',function(){
	var form_data = new FormData();
	file_data = $('#file').prop('files')[0];
	filePicked(file_data);
});	


function filePicked(file_data) {
    var oFile = file_data;
    var sFilename = oFile.name;
    var reader = new FileReader();
    
    reader.onload = function(e) {
        var data = e.target.result;
        var cfb = XLS.CFB.read(data, {type: 'binary'});
        var wb = XLS.parse_xlscfb(cfb);
        wb.SheetNames.forEach(function(sheetName) {
            var sCSV = XLS.utils.make_csv(wb.Sheets[sheetName]);   
            var oJS = XLS.utils.sheet_to_row_object_array(wb.Sheets[sheetName]);   
           
            console.log(oJS);
			 var data2 = $('#resultform').serializeArray();
			$.post( "config/php/result/operations.php", { formdata:data2,data: oJS})
				.done(function( data ) {
				alert( "Data Loaded: " + data );
			});
        });
    };
    
    // Tell JS To Start Reading The File.. You could delay this if desired
    reader.readAsBinaryString(oFile);
}

//======================================================================================



//=====================================================================================Login

function load_notification_page(page){
	$('#page_loader_div').load("views/"+page);	
}


function cancel_inv(id){
		$.post("config/php/operations.php",
		{
			action: 1,
			id: id
		},
		function(data, status){
			alert("successfully canceled");
		});
}

function signout(){
	window.location.assign("config/php/signout.php");
}

//===============adminission==============================================================
