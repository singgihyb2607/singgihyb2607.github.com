<?php
session_start();
error_reporting(0);
include "timeout.php";

if($_SESSION[login]==1){
	if(!cek_login()){
		$_SESSION[login] = 0;
	}
}
if($_SESSION[login]==0){
  header('location:logout.php');
}
else{
if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
	

	
	
?>
<html>
<head>
<title>Halaman Admin</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "inlinepopups",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "hr,removeformat,visualaid,|,undo,redo,|,sub,sup,charmap,|,forecolor,backcolor,|,emotions",
		theme_advanced_buttons3 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

	});
</script>

<link rel="stylesheet" href="jquery-ui.css" type="text/css" />
	<script type="text/javascript" src="jquery-1.9.1.js"></script>
	<script type="text/javascript" src="jquery-ui.js"></script>
	<script type="text/javascript">
		$(function() {
		$( "#input" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		});
	</script>
    
    
    </script>

<link rel="stylesheet" href="jquery-ui.css" type="text/css" />
	<script type="text/javascript" src="jquery-1.9.1.js"></script>
	<script type="text/javascript" src="jquery-ui.js"></script>
	<script type="text/javascript">
		$(function() {
		$( "#in" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		});
	</script>
    
    
    </script>

<link rel="stylesheet" href="jquery-ui.css" type="text/css" />
	<script type="text/javascript" src="jquery-1.9.1.js"></script>
	<script type="text/javascript" src="jquery-ui.js"></script>
	<script type="text/javascript">
		$(function() {
		$( "#inp" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		});
	</script>
<link rel="stylesheet" type="text/css" href="./jquery.datetimepicker.css"/>



	
	


	
</head>
<body background="images/bgrepeat.png">

<div id="header">  	

	<div id="menu">
		<div class="left">
		<?php 
        include "menu.php"; ?>
		</div>
        
        

        
        
		<div class="right">
		 <ul class="topmenu">
		 <li><a href=logout.php>Logout</a></li>
     </ul>
		</div>
	</div>
</div>
<div id="wrap">
  <div id="content">
		<?php include "content.php"; ?>
  </div>
  
		
</div>
</body>

<script src="./jquery.datetimepicker.js"></script>
<script>

$('#datetimepicker10').datetimepicker({
	step:5,
	inline:true
});
$('#datetimepicker_mask').datetimepicker({
	mask:'9999/19/39 29:59'
});
$('#datetimepicker').datetimepicker();
$('#datetimepicker').datetimepicker({value:'2015/04/15 05:03',step:10});
$('#datetimepicker1').datetimepicker({
	datepicker:false,
	format:'H:i',
	step:5
});
$('#datetimepicker2').datetimepicker({
	yearOffset:222,
	lang:'ch',
	timepicker:false,
	format:'d/m/Y',
	formatDate:'Y/m/d',
	minDate:'-1970/01/02', // yesterday is minimum date
	maxDate:'+1970/01/02' // and tommorow is maximum date calendar
});
$('#datetimepicker3').datetimepicker({
	inline:true
});
$('#datetimepicker4').datetimepicker();
$('#open').click(function(){
	$('#datetimepicker4').datetimepicker('show');
});
$('#close').click(function(){
	$('#datetimepicker4').datetimepicker('hide');
});
$('#reset').click(function(){
	$('#datetimepicker4').datetimepicker('reset');
});
$('#datetimepicker5').datetimepicker({
	datepicker:false,
	allowTimes:['12:00','13:00','15:00','17:00','17:05','17:20','19:00','20:00']
});
$('#datetimepicker6').datetimepicker();
$('#destroy').click(function(){
	if( $('#datetimepicker6').data('xdsoft_datetimepicker') ){
		$('#datetimepicker6').datetimepicker('destroy');
		this.value = 'create';
	}else{
		$('#datetimepicker6').datetimepicker();
		this.value = 'destroy';
	}
});
var logic = function( currentDateTime ){
	if( currentDateTime.getDay()==6 ){
		this.setOptions({
			minTime:'11:00'
		});
	}else
		this.setOptions({
			minTime:'8:00'
		});
};
$('#datetimepicker7').datetimepicker({
	onChangeDateTime:logic,
	onShow:logic
});
$('#datetimepicker8').datetimepicker({
	onGenerate:function( ct ){
		$(this).find('.xdsoft_date')
			.toggleClass('xdsoft_disabled');
	},
	minDate:'-1970/01/2',
	maxDate:'+1970/01/2',
	timepicker:false
});
$('#datetimepicker9').datetimepicker({
	onGenerate:function( ct ){
		$(this).find('.xdsoft_date.xdsoft_weekend')
			.addClass('xdsoft_disabled');
	},
	weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],
	timepicker:false
});
</script>

</html>
<?php
}
}
?>
<?php
mysql_free_result($rsData);
?>