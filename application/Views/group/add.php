<?php include_once PATH_VIEWS . 'includes/head.php'; ?>
<?php include_once PATH_VIEWS . 'includes/header.php'; ?>

<!--Begin content-->
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <form class="form-horizontal" method="POST" action="?action=group/add">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Group Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="groupName" name="groupName" required>
                    </div>
                </div>
                <?php if($groups){ ?>
                <div class="form-group">
                    <label for="city" class="col-sm-2 control-label">Inherited To Child Group</label>
                    <div class="col-sm-10">
                        <select class="selectpicker" id="groupID" name="groupID[]"  multiple data-live-search="true">
                            <?php foreach($groups as $group) { ?>
                            <option value="<?php echo $group['id'];  ?>"><?php echo $group['name'];  ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <?php } ?>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a href="<?php echo PATH_ADDRESS ?>?action=group" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"
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