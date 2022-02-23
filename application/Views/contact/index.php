<?php include_once PATH_VIEWS . 'includes/head.php'; ?>
<?php include_once PATH_VIEWS . 'includes/header.php'; ?>

<!--Begin content-->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class='mt-5'>
                <span>
                    <a href="?action=contact/add" class="btn btn-default">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add </a>
                    <a href="?action=contact/exportInXml" class="btn btn-default">
                        <span class="glyphicon glyphicon-download" aria-hidden="true"></span> Export in XML </a>
                    <a href="?action=contact/exportInJson" class="btn btn-default">
                        <span class="glyphicon glyphicon-download" aria-hidden="true"></span> Export in JSON </a>
                       
                </span>
                <span> Record found: <?= count($contacts) ?></span>
                <span class="pull-right">
                    <form class="form-horizontal" method="POST" action="?action=contact/search">
                        <!-- Actual search box -->
                        <select class="selectpicker" id="tagID" name="tagID[]" multiple data-live-search="true">
                            <?php foreach($tags as $tag) { ?>
                            <option value="<?php echo $tag['id'];  ?>"><?php echo $tag['name'];  ?> </option>
                            <?php } ?>
                        </select>
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"
                                aria-hidden="true"></span></button>
                    </form>
                </span>
                <p> </p>
                <table class="table table-hover table-bordered mb-4">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email Address</th>
                            <th>Street</th>
                            <th>Zip Code</th>
                            <th>City</th>
                            <th>Group Name</th>
                            <th>Tag Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $i=1;
                            if ($contacts):
                            foreach ($contacts as $contact) :
                            ?><tr>
                            <td><?=$i;?></td>
                            <td><?=$contact['first_name'];?></td>
                            <td><?=$contact['last_name'];?></td>
                            <td><?=$contact['email_address'];?></td>
                            <td><?=$contact['street'];?></td>
                            <td><?=$contact['zip_code'];?></td>
                            <td><?=$contact['name'];?></td>
                            <td><?=getNameOfGroup($contact['group_name'] , $groups );?></td>
                            <td><?=getNameOfGroup($contact['tag_name'] , $tags );?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="...">
                                    <a href="?action=contact/edit&id=<?=$contact['id'];?>" class="btn btn-success"><span
                                            class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                    <a href="?action=contact/delete&id=<?=$contact['id'];?>"
                                        class="btn btn-danger"><span class="glyphicon glyphicon-remove"
                                            aria-hidden="true"></span></a>
                                </div>
                            </td>
                        </tr>
                        <?php $i++; endforeach; 
                        else: ?>
                        <tr>
                            <td colspan="10">
                                <h4><span class="label label-info">No records!</span></h4>
                            </td>
                        </tr>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--End content-->
    <?php include_once PATH_VIEWS . 'includes/footer.php'; ?>
