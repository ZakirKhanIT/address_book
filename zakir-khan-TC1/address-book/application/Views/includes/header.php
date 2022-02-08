
        <!--Begin nav-->
        <nav style="background-color:#2A5D84;margin-bottom:50px;">
            <div class="container">
                <!-- Begin .nav-header -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo PATH_ADDRESS ?>"><?=$applicationName;?></a>
                </div>
                <!-- End .nav-header -->
                <!-- Begin .nav-collapse -->
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li<?php if ($pageName == 'Contacts'):?> class="active"<?php endif;?>><a href="<?php echo PATH_ADDRESS ?>">Contacts</a></li>
                    </ul>
                </div>
                <!-- End .nav-collapse -->
            </div>
        </nav> 
        <!-- End .nav -->