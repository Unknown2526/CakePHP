<?php
$this->extend('/Layout/default');
$urlToRestApi = $this->Url->build('/api/pays', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Pays/index', ['block' => 'scriptBottom']);
?>

<div class="container">
    <div class="row">
        <div class="panel panel-default pays-content">
            <div class="panel-heading">Country <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addForm">
                <h2 id="actionLabel">Add Country</h2>
                <form class="form" id="paysAddForm" enctype='application/json'>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="pays_nom" id="pays_nom"/>
                    </div>
                    <div class="form-group">
                        <label>Currency</label>
                        <input type="text" class="form-control" name="pays_devise" id="pays_devise"/>
                    </div>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="paysAction('add')">Add Country</a>
                    <!-- input type="submit" class="btn btn-success" id="addButton" value="Add Country" -->
                </form>
            </div>
            <div class="panel-body none formData" id="editForm">
                <h2 id="actionLabel">Edit Country</h2>
                <form class="form" id="paysEditForm" enctype='application/json'>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="pays_nom" id="pays_nomEdit"/>
                    </div>
                    <div class="form-group">
                        <label>Currency</label>
                        <input type="text" class="form-control" name="pays_devise" id="pays_deviseEdit"/>
                    </div>
                    <input type="hidden" class="form-control" name="pays_code" id="pays_codeEdit"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="paysAction('edit')">Update Country</a>
                    <!-- input type="submit" class="btn btn-success" id="editButton" value="Update Country" -->
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Currency</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="paysData">
                    <?php
                    $count = 0;
                    foreach ($pays as $pay): $count++;
                        ?>
                        <tr>
                            <td><?php echo '#' . $count; ?></td>
                            <td><?php echo $pay['pays_nom']; ?></td>
                            <td><?php echo $pay['pays_devise']; ?></td>
                            <td>
                                <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editCountry('<?php echo $pay['pays_code']; ?>')"></a>
                                <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?') ? paysAction('delete', '<?php echo $pay['pays_code']; ?>') : false;"></a>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                    ?>
                    <tr><td colspan="5">No Country found......</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>