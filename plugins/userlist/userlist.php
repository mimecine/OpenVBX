<?php

$me = OpenVBX::getCurrentUser();
if($me->is_admin == 1) {
    $users = VBX_User::search(array('is_active' => 1));
}
?>

<div class="vbx-content-main">
	<div class="vbx-content-menu vbx-content-menu-top">
		<h2 class="vbx-content-heading">User List</h2>
	</div><!-- .vbx-content-menu -->
    <div class="vbx-content-container">
        <div class="vbx-content-section">
            <table class="vbx-items-grid" border="0">
                <tr class="items-head recording-head">
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Full Name</th>
                    <th>Is Admin?</th>
                </tr>
                <?php if(isset($users)): 
                    foreach($users as $user): ?>
                    <tr class="message-row">
                        <td><?php echo $user->id ?></td>
                        <td><?php echo $user->email ?></td>
                        <td><?php echo $user->first_name ?> <?php echo $user->last_name ?></td>
                        <td><?php if($user->is_admin == 1): ?>
                        Yes
                        <?php else: ?>
                        No
                        <?php endif;?></td>
                    </tr>
                <?php 
                endforeach; 
                endif; ?>
            </table>
        </div>
    </div>
</div>