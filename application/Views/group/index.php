<?php include_once PATH_VIEWS . 'includes/head.php'; ?>
<?php include_once PATH_VIEWS . 'includes/header.php'; ?>

<!--Begin content-->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <p>
                <a href="?action=group/add" class="btn btn-default">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add </a>
                <a href="?action=group/exportInXml" class="btn btn-default">
                    <span class="glyphicon glyphicon-download" aria-hidden="true"></span> Export in XML </a>
                <a href="?action=group/exportInJson" class="btn btn-default">
                    <span class="glyphicon glyphicon-download" aria-hidden="true"></span> Export in JSON </a>
            </p>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Group Name</th>
                        <th>Inherited To</th>
                        <th>Contact Assigned</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                            if ($groups):
                            foreach ($groups as $group) :
                            ?>
                    <tr>
                        <td><?=$i;?></td>
                        <td><?=$group['name'];?></td>
                        <td><?=getNameOfGroup($group['child_group'] , $groups_by_id );?></td>
                        <td><?=getNameOfGroups($group['contact'], $contacts, $groups,$group['id'] );?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="...">
                                <a href="?action=group/edit&id=<?=$group['id'];?>" class="btn btn-success"><span
                                        class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                <a href="?action=group/delete&id=<?=$group['id'];?>" class="btn btn-danger"><span
                                        class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                            </div>
                        </td>
                    </tr>
                    <?php $i++; endforeach; 
                        else: ?>
                    <tr>
                        <td colspan="5">
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