<?php include_once PATH_VIEWS . 'includes/head.php'; ?>
<?php include_once PATH_VIEWS . 'includes/header.php'; ?>

<!--Begin content-->
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <form class="form-horizontal" method="POST" action="?action=contact/add">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="firstName" name="firstName" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Last Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="LastName" name="lastName" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="emailAddress" class="col-sm-2 control-label">Email Address</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="emailAddress" name="emailAddress" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="street" class="col-sm-2 control-label">Street</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="street" name="street" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="zipCode" class="col-sm-2 control-label">Zip code</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="zipCode" name="zipCode" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-sm-2 control-label">City</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="cityID" name="cityID" required>
                            <?php foreach($city as $city) { ?>
                            <option value="<?php echo $city['id'];  ?>"><?php echo $city['name'];  ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a href="/contact" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"
                                aria-hidden="true"></span></a>
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-floppy-disk"
                                aria-hidden="true"></span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--End content-->
<?php include_once PATH_VIEWS . 'includes/footer.php'; ?>