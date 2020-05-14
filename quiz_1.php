
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
                <a class="navbar-brand" href="<?php echo $_SERVER['PHP_SELF']; ?>">AUAF-PDI Quiz System </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">

            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo date('Y', time()); ?> <a href="https://www.auaf.edu.af/">AUAF - PDI </a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
    <div class="container-fluid">
    <audio src="audio/oxford_placement_test_listening.mp3" autoplay></audio>
    <div class="block-header">
        <h2>Quiz Page</h2>
    </div>
            <div class="content_container">
                <!-- PANEL ONE -->
                <div class="item panel_one" data-panel="0">
                    <div class="wrapper">
                        <h1>Listenting/Grammar Quiz</h1>
                        <p>Please listen carefuly to start of the audio section and <br />
                        follow exactly by selecting correct answer and clicking next question</p>
                        <div class="start_quiz">
                            Start Quiz
                        </div>
                    </div>
                </div>
                <!-- END PANEL ONE -->

                <!-- PANEL TWO -->
                <div class="item panel_two hidden" data-panel="1">
                    <div class="wrapper">
                        <h3>How do you drink your beer?</h3>
                        <div class="options">
                            <div>Very Cold</div>
                            <div>Warm</div>
                            <div>I don't drink</div>
                        </div>
                        <div class="next_question" data-next="2">Next Question</div>
                    </div>
                </div>
                <!-- END PANEL TWO -->

                <!-- PANEL THREE -->
                <div class="item panel_two hidden" data-panel="2">
                    <div class="wrapper">
                        <h3>What do you think about Trump?</h3>
                        <div class="options">
                            <div>I Love him</div>
                            <div>I hate him</div>
                            <div>I really don't care</div>
                        </div>
                        <div class="next_question" data-next="3">Next Question</div>
                    </div>
                </div>
                <!-- END PANEL TWO -->
            </div>
            <div class="error">
                Please make a selection
            </div>
            <div class="progress">
                <div class="bar"></div>
            </div>
            </div>
        </div>
    </div>
    </section>

    <?php include_once('inc/footer.php'); ?>
