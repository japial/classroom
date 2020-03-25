<div class="row">
    <div class="col-md-12 py-3">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <h4><?php echo lang('index_heading'); ?></h4>
                    </div>
                    <div class="col-md-8">
                        <div class="text-right">
                            <?php echo anchor('auth/create_user', 'New Teacher', 'class="btn btn-primary"') ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div id="infoMessage"><?php echo $message; ?></div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo lang('index_fname_th'); ?></th>
                            <th><?php echo lang('index_lname_th'); ?></th>
                            <th><?php echo lang('index_email_th'); ?></th>
                            <th>User Role</th>
                            <th><?php echo lang('index_status_th'); ?></th>
                            <th><?php echo lang('index_action_th'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td>
                                    <?php foreach ($user->groups as $group): ?>
                                        <?php echo htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8') ?><br />
                                    <?php endforeach ?>
                                </td>
                                <td><?php echo ($user->active) ? anchor("auth/deactivate/" . $user->id, lang('index_active_link')) : anchor("auth/activate/" . $user->id, lang('index_inactive_link')); ?></td>
                                <td><?php echo anchor("auth/edit_user/" . $user->id, 'Edit', 'class="btn btn-warning"'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>





