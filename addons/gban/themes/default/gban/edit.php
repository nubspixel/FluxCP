<?php if (!defined('FLUX_ROOT')) exit; ?>
<h2><?php echo htmlspecialchars(Flux::message('GBanEditHeading')) ?></h2>
<?php if ($gban): ?>
	<?php if (!empty($errorMessage)): ?>
		<p class="red"><?php echo htmlspecialchars($errorMessage) ?></p>
	<?php endif ?>
	<form action="<?php echo $this->urlWithQs ?>" method="post" class="generic-form">
		<input type="hidden" name="modgban" value="1" />
		<table class="generic-form-table">
			<tr>
				<th><label for="unique_id"><?php echo htmlspecialchars(Flux::message('GBanGepardIDLabel')) ?></label></th>
				<td><input type="text" name="newguid" id="unique_id"
						value="<?php echo htmlspecialchars(($unique_id=$params->get('newguid')) ? $unique_id : $gban->unique_id) ?>" /></td>
				<td><p><?php echo htmlspecialchars(Flux::message('GBanGepardIDInfo')) ?></p></td>
			</tr>
			<tr>
				<th><label><?php echo htmlspecialchars(Flux::message('GBanUnbanDateLabel')) ?></label></th>
				<td><?php echo $this->dateTimeField('unban_time', ($unban_time=$params->get('unban_time')) ? $unban_time : $gban->unban_time) ?></td>
				<td></td>
			</tr>
			<tr>
				<th><label for="reason"><?php echo htmlspecialchars(Flux::message('GBanReasonLabel')) ?></label></th>
				<td>
					<textarea name="reason" id="reason" class="reason"><?php
						echo htmlspecialchars(($reason=$params->get('reason')) ? $reason : $gban->reason)
					?></textarea>
				</td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td colspan="2"><input type="submit" value="<?php echo htmlspecialchars(Flux::message('GBanEditButton')) ?>" /></td>
			</tr>
		</table>
	</form>
<?php else: ?>
<p>No such IP ban. <a href="javascript:history.go(-1)">Go back</a>.</p>
<?php endif ?>
