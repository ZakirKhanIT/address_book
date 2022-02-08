<?php include_once PATH_VIEWS . 'includes/head.php'; ?>
<?php include_once PATH_VIEWS . 'includes/header.php'; ?>

<!--Begin content-->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <p>
                <a href="?action=contact/add" class="btn btn-default">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add </a>
                <a href="?action=contact/exportInXml" class="btn btn-default">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Export in XML </a>
                <a href="?action=contact/exportInJson" class="btn btn-default">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Export in JSON </a>
            </p>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email Address</th>
                        <th>Street</th>
                        <th>Zip Code</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            if ($contacts):
                            foreach ($contacts as $contact) :
                            ?><tr>
                        <td><?=$contact['id'];?></td>
                        <td><?=$contact['first_name'];?></td>
                        <td><?=$contact['last_name'];?></td>
                        <td><?=$contact['email_address'];?></td>
                        <td><?=$contact['street'];?></td>
                        <td><?=$contact['zip_code'];?></td>
                        <td><?=$contact['name'];?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="...">
                                <a href="?action=contact/edit&id=<?=$contact['id'];?>" class="btn btn-custom"><span
                                        class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                <a href="?action=contact/delete&id=<?=$contact['id'];?>" class="btn btn-custom"><span
                                        class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; 
                        else: ?>
                    <tr>
                        <td colspan="6">
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