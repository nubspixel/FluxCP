<?php if (!defined('FLUX_ROOT')) exit; ?>
<h2><?php echo htmlspecialchars(Flux::message('GBanAddHeading')) ?></h2>
<?php if (!empty($errorMessage)): ?>
	<p class="red"><?php echo htmlspecialchars($errorMessage) ?></p>
<?php endif ?>
<form action="<?php echo $this->urlWithQs ?>" method="post" class="generic-form">
	<input type="hidden" name="addgban" value="1" />
	<table class="generic-form-table">
		<tr>
			<th><label for="guid"><?php echo htmlspecialchars(Flux::message('GBanGepardIDLabel')) ?></label></th>
			<td><input type="text" name="guid" id="guid" value="<?php echo htmlspecialchars($params->get('guid')) ?>" /></td>
			<td><p><?php echo htmlspecialchars(Flux::message('GBanGepardIDInfo')) ?></p></td>
		</tr>
		<tr>
			<th><label for="reason"><?php echo htmlspecialchars(Flux::message('GBanReasonLabel')) ?></label></th>
			<td>
				<textarea name="reason" id="reason" class="reason"><?php echo htmlspecialchars($params->get('reason')) ?></textarea>
			</td>
			<td></td>
		</tr>
		<tr>
			<th><label><?php echo htmlspecialchars(Flux::message('GBanUnbanDateLabel')) ?></label></th>
			<td><?php echo $this->dateTimeField('unban_time', ($unban_time=$params->get('unban_time')) ? $unban_time : null) ?></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td colspan="2"><input type="submit" value="<?php echo htmlspecialchars(Flux::message('GBanAddButton')) ?>" /></td>
		</tr>
	</table>
</form>
