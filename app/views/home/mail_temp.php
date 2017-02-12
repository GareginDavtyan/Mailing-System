
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['list'] as $user){?>
            <tr>
                <td><?= $user['id'];?></td>
                <td><?= $user['title'];?></td>
                <td><?= $user['content'];?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>