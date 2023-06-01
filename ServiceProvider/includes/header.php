<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootsrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">

    <title> <?php echo TITLE ?> </title>
</head>

<body>
    <!-- Top Navbar  -->
    <nav class="navbar navbar-dark fixed-top bg-secondary flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="RequesterProfile.php">InfinityServices</a>
    </nav>

    <!-- Start Container -->
    <div class="container-fluid mb-5 " style="margin-top:40px;">
        <div class="row">
            <!-- Start row -->
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
                <!-- Side Bar -->
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'ServiceProfile') { echo 'active'; } ?>" href="ServiceProfile.php">
                                <i class="fas fa-user"></i>
                                Profile <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'ProvideService') { echo 'active'; } ?>" href="ProvideService.php">
                                <i class="fab fa-accessible-icon"></i>
                                Provide Service
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'WorkAssign') { echo 'active'; } ?>" href="WorkAssign.php">
                                <i class="fas fa-align-center"></i>
                                Work Assigned
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'Servicechangepass') { echo 'active'; } ?>" href="Servicechangepass.php">
                                <i class="fas fa-key"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav> <!-- End Side Bar -->
