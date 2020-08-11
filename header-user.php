<?php if(!isset($Translation)){ @header('Location: index.php'); exit; } ?>
<?php @include("{$currDir}/hooks/links-home.php"); ?>
<?php if(!defined('PREPEND_PATH')) define('PREPEND_PATH', ''); ?>
<?php if(!defined('datalist_db_encoding')) define('datalist_db_encoding', 'UTF-8'); ?>
<?php include("libs/db_connect.php"); ?>
<?php include("libs/fetch_data.php"); ?>
<?php include("libs/count_records.php"); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Universal Properties | <?php echo (isset($x->TableTitle) ? $x->TableTitle : ''); ?></title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="danger">

    <div class="sidebar-wrapper">
            <div class="logo">
                <a href="index.php" class="simple-text">
                <img src="universal.jpeg" alt="uni-global" class="centering">
               <style>
                .centering {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 180px;
                height: 150px;
                }
                </style>
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="index.php">
                        <i class="ti-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
                <li>
                    <a href="dashboard/credit/index.php">
                        <i class="ti-wallet"></i>
                        <p>Credit Report</p>
                    </a>
                </li>
                <li>
                    <a href="dashboard/debit/index.php">
                        <i class="ti-wallet"></i>
                        <p>Debit Report</p>
                    </a>
                </li>
                <li>
                    <a href="dashboard/income/index.php">
                        <i class="ti-wallet"></i>
                        <p>Income Report</p>
                    </a>
                </li>
                <li>
                    <a href="dashboard/cashcol.php">
                        <i class="ti-money"></i>
                        <p>Income Updates </p>
                    </a>
                </li>
                <li>
                    <a href="dashboard/income-expense.php">
                        <i class="ti-money"></i>
                        <p>Book Income & Expense </p>
                    </a>
                </li>
                <li>
                    <a href="dashboard/loan-tool">
                        <i class="ti-layers-alt"></i>
                        <p>Loan Tool Calculator</p>
                    </a>
                </li>
                <li>
                    <a href="dashboard/simple-calculator">
                        <i class="ti-layers-alt"></i>
                        <p>Math Calculator</p>
                    </a>
                </li>
                <li>
                    <a href="currency-converter">
                        <i class="ti-money"></i>
                        <p>Currency Converter</p>
                    </a>
                </li>
                <li>
                    <a href="dashboard/adminprofile.php">
                        <i class="ti-user"></i>
                        <p>Admin System</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Universal Properties - The Gambia's most experienced real estate agency.</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-user"></i>
                                    <p class="notification"></p>
									<p><strong><?php echo getLoggedMemberID(); ?></strong></p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
              <li><a href="<?php echo PREPEND_PATH; ?>dashboard/adminprofile.php"><i class="fa fa-user"></i> <strong>Profile Details</strong> </a></li><br>
              <strong><p>&nbsp;&nbsp;NDIAYE Mohamed - Software Engineer</p></strong>
              <!--login/logout area starts-->
              <li>
               <?php if(getLoggedAdmin()){ ?>
               <!-- <a href="<?php echo PREPEND_PATH; ?>admin/pageHome.php" class="btn btn-danger navbar-btn btn-sm hidden-xs"><i class="fa fa-cog"></i> <strong><?php echo $Translation['admin area']; ?></strong></a>
               <a href="<?php echo PREPEND_PATH; ?>admin/pageHome.php" class="btn btn-danger navbar-btn btn-sm visible-xs btn-sm"><i class="fa fa-cog"></i> <strong><?php echo $Translation['admin area']; ?></strong></a> -->
               <?php } ?>
               <?php if(!$_GET['signIn'] && !$_GET['loginFailed']){ ?>
               <?php if(getLoggedMemberID() == $adminConfig['anonymousMember']){ ?>
               <p class="navbar-text navbar-right">&nbsp;</p>
               <a href="<?php echo PREPEND_PATH; ?>index.php?signIn=1" class="btn btn-success navbar-btn btn-sm navbar-right"><strong><?php echo $Translation['sign in']; ?></strong></a>
               <p class="navbar-text navbar-right">
                <?php echo $Translation['not signed in']; ?>
              </p>
              <?php }else{ ?>
              <ul class="nav navbar-nav navbar-right hidden-xs" style="min-width: 330px;">
              </ul>
              <ul class="nav navbar-nav visible-xs">
              </ul>
              <?php } ?>
              <?php } ?>
            </li>
            <!--login/logout area ends-->
            <li class="divider"></li>
            <li><a class="btn navbar-btn btn-warning" href="<?php echo PREPEND_PATH; ?>index.php?signOut=1"><i class="fa fa-power-off"></i> <strong style="color:black"><?php echo $Translation['sign out']; ?></strong> </a></li>
          </ul>
        </li>
          </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <?php include("main.php");?>
