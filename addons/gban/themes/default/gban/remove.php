<?php if (!defined('FLUX_ROOT')) exit; ?>
<h2><?php echo htmlspecialchars(Flux::message('GBanRemoveHeading')) ?></h2>
<?php if ($gban): ?>
	<?php if (!empty($errorMessage)): ?>
		<p class="red"><?php echo htmlspecialchars($errorMessage) ?></p>
	<?php endif ?>

	<form action="<?php echo $this->urlWithQs ?>" method="post" class="generic-form">
		<input type="hidden" name="remgban" value="1" />
		<table class="generic-form-table">
			<tr>
				<td>
					<p>
						<?php echo Flux::message('GBanChangeConfirm'); ?>
					</p>
				</td>
			</tr>
			<tr>
				<td>
					<p>
						<button type="submit">
							<?php echo htmlspecialchars(Flux::message('GBanRemoveButton')) ?>
						</button>
						<a href="javascript:history.go(-1)">
							Cancel
						</a>
					</p>
				</td>
			</tr>
		</table>
	</form>
<?php else: ?>
<p>No such IP ban. <a href="javascript:history.go(-1)">Go back</a>.</p>
<?php endif ?>
