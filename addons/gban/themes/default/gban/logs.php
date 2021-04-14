<?php if (!defined('FLUX_ROOT')) exit; ?>
<h2><?php echo htmlspecialchars(Flux::message('GBanListHeading')) ?></h2>
<?php if ($banlist): ?>
<?php echo $paginator->infoText() ?>
<form action="<?php echo $this->url('gban', 'unban') ?>" method="post">
	<input type="hidden" name="unban" value="1" />
	<table class="horizontal-table">
		<tr>
			<th><?php echo $paginator->sortableColumn('unique_id', Flux::message('GBanBannedGeIDLabel')) ?></th>
			<th><?php echo $paginator->sortableColumn('block_time', Flux::message('GBanBanDateLabel')) ?></th>
			<th><?php echo $paginator->sortableColumn('unban_time', Flux::message('GBanBanExpireLabel')) ?></th>
			<th><?php echo $paginator->sortableColumn('reason', Flux::message('GBanBanReasonLabel')) ?></th>
		</tr>
		<?php foreach ($banlist as $list): ?>
		<tr>
			<td>
			<?php if ($auth->actionAllowed('account', 'index')): ?>
				<?php echo $this->linkToAccountSearch(array('unique_id' => $list->unique_id), $list->unique_id) ?>
			<?php else: ?>
				<?php echo htmlspecialchars($list->unique_id) ?>
			<?php endif ?>
			</td>
			<td><?php echo $this->formatDateTime($list->block_time) ?></td>
			<td>
				<?php if (!$list->unban_time || $list->unban_time == '1000-01-01 00:00:00'): ?>
					<span class="not-applicable"><?php echo htmlspecialchars(Flux::message('NeverLabel')) ?></span>
				<?php else: ?>
					<?php echo $this->formatDateTime($list->unban_time) ?>
				<?php endif ?>
			</td>
			<td>
				<?php if ($list->reason): ?>
					<?php echo htmlspecialchars($list->reason) ?>
				<?php else: ?>
					<span class="not-applicable"><?php echo htmlspecialchars(Flux::message('NoneLabel')) ?></span>
				<?php endif ?>
			</td>
		</tr>
		<?php endforeach ?>
	</table>
</form>
<?php echo $paginator->getHTML() ?>
<?php else: ?>
<p>
	<?php echo htmlspecialchars(Flux::message('GBanListNoBans')) ?>
	<a href="javascript:history.go(-1)"><?php echo htmlspecialchars(Flux::message('GoBackLabel')) ?></a>
</p>
<?php endif ?>
