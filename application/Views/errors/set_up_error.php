<?php include_once PATH_VIEWS . 'includes/head.php'; ?>
        <?php include_once PATH_VIEWS . 'includes/header.php'; ?>  
        <div class="container">
        <div class="alert alert-danger" role="alert">
        <?php 
          print_r(errorMessages()['dnf']);
        ?>
        </div>
        <div class="alert alert-info" role="info">
        <?php 
          echo errorMessages()['info'];
        ?>
        </div>
        </div>
        <!--End content--> 
        <?php include_once PATH_VIEWS . 'includes/footer.php'; ?>