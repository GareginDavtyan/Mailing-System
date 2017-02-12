<table class="table table-hover">
    <thead>
        <tr>
            <th>Id Session</th>
            <th>Date</th>
            <th>Sent</th>
            <th>In queue (In process)</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['list'] as $session){?>
            <tr>
                <td><?= $session['id'];?></td>
                <td><?= date("F j, Y, g:i a", strtotime($session['date_add']));?></td>
                <td><?= $session['sent_count'];?></td>
                <td><?= $session['queue_count'];?> (<?= $session['in_process_count'];?>)</td>
            </tr>
        <?php } ?>
    </tbody>
</table>