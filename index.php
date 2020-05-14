
<?php include_once('inc/head.php'); ?>
<body class="theme-red">
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo $_SERVER['PHP_SELF']; ?>">PHP Simple Quiz System </a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name']; ?></div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <?php include_once('inc/menu.php'); ?>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo date('Y', time()); ?> <a href="#">PHP Simple Quiz System</a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <?php if($_SESSION['group_name'] == 'administrator'){ ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Dashboard</h2>
            </div>
        </div>
    </section>
    <?php } else if($_SESSION['group_name'] == 'standard') { ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Registration Page</h2>
            </div>
        <?php if(isset($_POST['submit'])) {
            $fullname = $_POST['name'];
            $fathername = $_POST['fathername'];
            $id_number = $_SESSION['id_number'] = $_POST['id_number'];
            $date = $_POST['date'];
            $q = "INSERT INTO `register`(`id`, `fullname`, `fathername`, `id_number`, `date`, `status`) VALUES (NULL,'{$fullname}','{$fathername}','{$id_number}','{$date}','active')";
            if($database->query($q)){
                $report_title = $id_number;
                $myfile = fopen("report/{$report_title}.txt", "w") or die("Unable to open file!");
                $txt = "[Fullname]: {$fullname} \r\n";
                $txt .= " [Lastname]: {$fathername} \r\n";
                $txt .= " [ID Number]: {$id_number} \r\n";
                $txt .= " [Date]: {$date} \r\n";
                fwrite($myfile, $txt);
                fclose($myfile);

                $myfile2 = fopen("transcript/{$report_title}_details.txt", "w") or die("Unable to open file!");

                fwrite($myfile2, $txt);
                fclose($myfile2);
                echo '<script>window.location="instruction.php";</script>';
            } else {
                echo '<div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                There seems to be a problem kindly try again later!
            </div>';
            }
        } ?>
            <div class="signup-box">
        <div class="card">
            <div class="body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="sign_up" method="POST">
                    <div class="msg">Register yourself</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Fullname" required autofocus>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="fathername" placeholder="Fathername" required>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">credit_card</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="id_number" placeholder="ID Number" required>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                        <i class="material-icons">date_range</i>
                        </span>
                        <div class="form-line">
                            <input type="date" class="form-control" name="date" placeholder="Date" value="<?php echo date('m/d/Y', time()); ?>">
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit" name="submit">REGISTER</button>
                </form>
            </div>
        </div>
        </div>
    </section>
    <?php } ?>
    <?php include_once('inc/footer.php'); ?>