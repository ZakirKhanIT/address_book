<?php include_once PATH_VIEWS . 'includes/head.php'; ?>
<?php include_once PATH_VIEWS . 'includes/header.php'; ?>

<!--Begin content-->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class='mt-5'>
                <span>
                    <a href="?action=tag/add" class="btn btn-default">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add </a>
                    <a href="?action=tag/exportInXml" class="btn btn-default">
                        <span class="glyphicon glyphicon-download" aria-hidden="true"></span> Export in XML </a>
                    <a href="?action=tag/exportInJson" class="btn btn-default">
                        <span class="glyphicon glyphicon-download" aria-hidden="true"></span> Export in JSON </a>
                       
                </span>
                <span> Record found: <?= count($tags) ?></span>
                <p></p>
                <table class="table table-hover table-bordered mb-4">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $i=1;
                            if ($tags):
                            foreach ($tags as $tag) :
                            ?><tr>
                            <td><?=$i;?></td>
                            <td><?=$tag['name'];?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="...">
                                    <a href="?action=tag/edit&id=<?=$tag['id'];?>" class="btn btn-success"><span
                                            class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                    <a href="?action=tag/delete&id=<?=$tag['id'];?>"
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
