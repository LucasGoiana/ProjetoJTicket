
<!DOCTYPE HTML>
<html>
<head>
<title>Projeto Jestor</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />


<!-- Bootstrap Core CSS -->
<link href="<?=BASE_URL?>assets/css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="<?=BASE_URL?>assets/css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="<?=BASE_URL?>assets/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS -->

 <!-- side nav css file -->
 <link href='<?=BASE_URL?>assets/css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->
 
 <!-- js-->
<script src="<?=BASE_URL?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?=BASE_URL?>assets/js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- Metis Menu -->
<script src="<?=BASE_URL?>assets/js/metisMenu.min.js"></script>
<script src="<?=BASE_URL?>assets/js/custom.js"></script>
<link href="<?=BASE_URL?>assets/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

</head> 
<body class="cbp-spmenu-push">
	<?php $this->loadViewInTemplate($viewName,$viewData);?>
	<div class="main-content">
		
		<!--footer-->
		<div class="footer">
		   <p>&copy; <?=date('Y');?> Jestor Todos os Direitos Reservados | Desenvolvido por  <a href="https://www.jestor.com.br/" target="_blank">Jestor</a></p>
	   </div>
        <!--//footer-->
	</div>
	
	<!-- side nav js -->
	<script src='<?=BASE_URL?>assets/js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="<?=BASE_URL?>assets/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
	
	<!--scrolling js-->
	<script src="<?=BASE_URL?>assets/js/jquery.nicescroll.js"></script>
	<script src="<?=BASE_URL?>assets/js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
   <script src="<?=BASE_URL?>assets/js/bootstrap.js"> </script>
   
</body>
</html>