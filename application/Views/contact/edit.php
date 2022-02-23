<?php include_once PATH_VIEWS . 'includes/head.php'; ?>
<?php include_once PATH_VIEWS . 'includes/header.php'; ?>

<!--Begin content-->
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <form class="form-horizontal" method="POST" action="?action=contact/edit">
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="hidden" name="id" value="<?=$contact['id'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="firstName" name="firstName"
                            value="<?=$contact['first_name'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Last Name</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="LastName" name="lastName"
                            value="<?=$contact['last_name'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="emailAddress" class="col-sm-2 control-label">Email Address</label>
                    <div class="col-sm-10">
                        <input type="email" required class="form-control" id="emailAddress" name="emailAddress"
                            value="<?=$contact['email_address'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="street" class="col-sm-2 control-label">Street</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="street" name="street"
                            value="<?=$contact['street'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="zipCode" class="col-sm-2 control-label">Zip code</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="zipCode" name="zipCode"
                            value="<?=$contact['zip_code'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-sm-2 control-label">City</label>
                    <div class="col-sm-10">
                        <select class="selectpicker" id="cityID" name="cityID" required>
                            <?php foreach($city as $city) { ?>
                            <option value="<?php echo $city['id'];  ?>"
                                <?php echo $city['id']===$contact['city_id'] ? 'selected':'' ?>>
                                <?php echo $city['name'];  ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-sm-2 control-label">Group</label>
                    <div class="col-sm-10">
                        <select class="selectpicker" id="groupID" name="groupID[]"   multiple data-live-search="true">
                            <?php foreach($groups as $group) { ?>
                            <option value="<?php echo $group['id'];  ?>"><?php echo $group['name'];  ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-sm-2 control-label">Tags</label>
                    <div class="col-sm-10">
                        <select class="selectpicker" id="tagID" name="tagID[]"   multiple data-live-search="true">
                            <?php foreach($tags as $tag) { ?>
                            <option value="<?php echo $tag['id'];  ?>"><?php echo $tag['name'];  ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class=" col-sm-10 col-sm-offset-2">
                        <a href="<?php echo PATH_ADDRESS ?>?action=contact" class="btn btn-default"><span
                                class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>
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
<script type="text/javascript">
        $(document).ready(function() {
            $('#tagID').selectpicker('val', [<?=$contact['tag_name']; ?>]);
            $('#groupID').selectpicker('val', [<?=$contact['group_name']; ?>]);        
        })
    </script>