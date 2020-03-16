<?php 

	if(!isset($_SESSION) || empty($_SESSION)){
		header("Location:".BASE_URL);
	}
?>
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
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		<aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="<?=BASE_URL?>"><img src='<?=BASE_URL?>assets/images/logo.png'/></a></h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">Menu de Navegação</li>
              <li class="treeview">
                <a href="<?=BASE_URL?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
              
              <?php if($_SESSION['id_perfil'] == 2){ ?>
              <li><a href="<?=BASE_URL?>Tickets/listadetickets/<?=$_SESSION['slug']?>"><i class="fa fa-angle-right"></i> Tickets</a></li>
              <li><a href="<?=BASE_URL?>Usuarios/editar/<?=$_SESSION['slug']?>"><i class="fa fa-angle-right"></i> Usuarios</a></li>

              <?php }else{ ?>
              <li><a href="<?=BASE_URL?>Tickets/listadetickets/"><i class="fa fa-angle-right"></i> Tickets</a></li>	
              <li><a href="<?=BASE_URL?>Usuarios"><i class="fa fa-angle-right"></i> Usuarios</a></li>
              <?php } ?>
            </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>
    </aside>
	</div>
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
			
				<!--notification menu end -->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<div class="user-name">
										<p><?=$_SESSION['nome_usuario']; ?></p>
										<span><?=$_SESSION['nome_perfil']?></span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="<?=BASE_URL?>Usuarios/fazerLogoff"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
	

		<?php $this->loadViewInTemplate($viewName,$viewData);?>
</div></body>
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