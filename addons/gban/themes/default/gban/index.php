<?php if (!defined('FLUX_ROOT')) exit; ?>
<h2><?php echo htmlspecialchars(Flux::message('GBanListHeading')) ?></h2>
<?php if ($banlist): ?>
<?php echo $paginator->infoText() ?>
<table class="horizontal-table">
	<tr>
		<th><?php echo $paginator->sortableColumn('last_unique_id', Flux::message('GBanBannedGeIDLabel')) ?></th>
		<th><?php echo $paginator->sortableColumn('unban_time', Flux::message('GBanBanExpireLabel')) ?></th>
		<th><?php echo $paginator->sortableColumn('reason', Flux::message('GBanBanReasonLabel')) ?></th>
		<?php if ($auth->allowedToModifyIpBan && $auth->actionAllowed('gban', 'edit')): ?>
		<th><?php echo htmlspecialchars(Flux::message('GBanModifyLink')) ?></th>
		<?php endif ?>
		<?php if ($auth->allowedToRemoveIpBan && $auth->actionAllowed('gban', 'remove')): ?>
		<th><?php echo htmlspecialchars(Flux::message('GBanRemoveLink')) ?></th>
		<?php endif ?>
	</tr>
	<?php foreach ($banlist as $list): ?>
	<tr>
		<td>
		<?php if ($auth->actionAllowed('account', 'index')): ?>
			<?php echo $this->linkToAccountSearch(array('last_unique_id' => $list->unique_id), $list->unique_id) ?>
		<?php else: ?>
			<?php echo htmlspecialchars($list->unique_id) ?>
		<?php endif ?>
		</td>
		<td>
			<?php if (!$list->unban_time || $list->unban_time == '1000-01-01 00:00:00'): ?>
				<span class="not-applicable"><?php echo htmlspecialchars(Flux::message('NeverLabel')) ?></span>
			<?php else: ?>
				<?php echo $this->formatDateTime($list->unban_time)." ".($list->unban_time < date("Y-m-d H:i:s") ? '<span class="down">expired</span>' : ''); ?>
			<?php endif ?>
		</td>
		<td>
			<?php if ($list->reason): ?>
				<?php echo htmlspecialchars($list->reason) ?>
			<?php else: ?>
				<span class="not-applicable"><?php echo htmlspecialchars(Flux::message('NoneLabel')) ?></span>
			<?php endif ?>
		</td>
		<?php if ($auth->allowedToModifyIpBan && $auth->actionAllowed('gban', 'edit')): ?>
		<td class="td-action action"><a href="<?php echo $this->url('gban', 'edit', array('guid' => $list->unique_id)) ?>"><?php echo htmlspecialchars(Flux::message('GBanModifyLink')) ?></a></td>
		<?php endif ?>
		<?php if ($auth->allowedToRemoveIpBan && $auth->actionAllowed('gban', 'remove')): ?>
		<td class="td-action action"><a href="<?php echo $this->url('gban', 'remove', array('guid' => $list->unique_id)) ?>"><?php echo htmlspecialchars(Flux::message('GBanRemoveLink')) ?></a></td>
		<?php endif ?>
	</tr>
	<?php endforeach ?>
</table>
<?php echo $paginator->getHTML() ?>
<?php else: ?>
<p>
	<?php echo htmlspecialchars(Flux::message('GBanListNoBans')) ?>
	<a href="javascript:history.go(-1)"><?php echo htmlspecialchars(Flux::message('GoBackLabel')) ?></a>
</p>
<?php endif ?>
