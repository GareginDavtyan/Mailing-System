<table class="table table-hover">
    <thead>
        <tr>
            <th colspan="5"> Total count of sent mails : <?= count($data['list'])?></th>
        </tr>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Email</th>
            <th>Template</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($data['list'] as $state){?>
        <tr>
            <td><?= $state['id'];?></td>
            <td><?= $state['user_name'];?></td>
            <td>
                <a href= "mailto:<?= $state['user_email'];?>">
                    <?= $state['user_email'];?>
                </a>
            </td>
            <td>
                <a href="/public/home/template/<?= $state['id_template']?>">
                    <?= $state['template_name'];?>
                </a>
            </td>
            <td><?= date("F j, Y, g:i a", strtotime($state['date_sent']));?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>