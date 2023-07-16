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

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Instruction Page</h2>
            </div>
            <div class="signup-box">
        <div class="card">
            <div class="body">
                <h2>Please follow below instructions</h2>
                <hr />
            <ol style="font-size: 18px; line-height: 2em;">
                <li>The test consists of two parts (listening and grammar).</li>
                <li>Listening portion will start immediately after starting the test.</li>
                <li>Audio file will play and you'll select the correct answers based on the audio you hear, it will not be repeated and it can not be stopped.</li>
                <li>after listening is finished, grammar section will start and you will have a maximum of 45 minutes to answer all the questions.</li>
                <li>each correct answer carries 1 point.</li>
            </ol>
            <hr />
            <a href="quiz.php?id_number=<?php echo $_SESSION['id_number']; ?>" class="btn btn-lg bg-blue waves-effect">Start Quiz</a>
            </div>
        </div>
        </div>
    </section>
    <?php include_once('inc/footer.php'); ?>
