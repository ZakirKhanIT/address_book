
        <!--Begin nav-->
        <nav class="breadcrumb">
            <div class="container">
                <!-- Begin .nav-header -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo PATH_ADDRESS ?>"><?=APPLICATION_NAME;?></a>
                </div>
                <!-- End .nav-header -->
                <!-- Begin .nav-collapse -->
                <nav class="navbar navbar-expand-sm bg-light navbar-light">
                    <ul class="nav navbar-nav">
                        <li <?php echo (isset($pageName) && ($pageName == 'Contacts'))? 'class="active"' : '' ?>><a href="<?php echo PATH_ADDRESS ?>?action=contact">Contacts</a></li>
                        <li <?php echo (isset($pageName) && ($pageName == 'Groups'))? 'class="active"' : '' ?>><a href="<?php echo PATH_ADDRESS ?>?action=group">Groups</a></li>
                        <li <?php echo (isset($pageName) && ($pageName == 'Tags'))? 'class="active"' : '' ?>><a href="<?php echo PATH_ADDRESS ?>?action=tag">Tags</a></li>
                        <li <?php echo (isset($pageName) && ($pageName == 'Cities'))? 'class="active"' : '' ?>><a href="<?php echo PATH_ADDRESS ?>?action=city">Cities</a></li>
                    </ul>
                        </nav>
                <!-- End .nav-collapse -->
            </div>
        </nav> 
        <!-- End .nav -->