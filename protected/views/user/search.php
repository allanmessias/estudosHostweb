<table class="table table-striped"> 
    <thead>
        <tr>
            <th>id</th>
            <th>Usuario</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($user as $users): ?>
            <tr>
                <td><?=$users->id ?></td>
            <td><?=$users->username ?></td>
            <td><?=$users->email ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>