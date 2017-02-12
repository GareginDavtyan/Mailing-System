<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-inline">
            <select class="form-control" id="template_list">
                <option value="">Choose a template:</option>
                <?php foreach ($data['template_list'] as $template){?>
                    <option value="<?= $template['id'];?>">
                        <?= $template['title'];?>
                    </option>
                <?php } ?>
            </select>
            &nbsp &nbsp
            <button type="button" class="btn btn-primary" id="send_email">Send Email</button>
        </form>
    </div>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th id="select_all" width="100">Select All</th>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['list'] as $user){?>
            <tr>
                <td>
                    <input type="checkbox" class="ch_user" value="<?= $user['id'];?>">
                </td>
                <td><?= $user['id'];?></td>
                <td><?= $user['name'];?></td>
                <td><?= $user['email'];?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<div class="alert alert-success" id="added_to_queue">
    <strong>Success!</strong> Emails added to queue.
</div>


