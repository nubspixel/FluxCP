<?php
if (!defined('FLUX_ROOT')) exit;

$this->loginRequired();

$title = Flux::message('GBanListTitle');

$sqlpartial = "WHERE 1 = 1";

$sql = "SELECT COUNT(unique_id) AS total FROM {$server->loginDatabase}.gepard_block $sqlpartial";
$sth = $server->connection->getStatement($sql);
$sth->execute();

$paginator = $this->getPaginator($sth->fetch()->total);
$paginator->setSortableColumns(array('unique_id', 'unban_time', 'reason'));

$sql = $paginator->getSQL("SELECT unique_id, unban_time, reason FROM {$server->loginDatabase}.gepard_block $sqlpartial");
$sth = $server->connection->getStatement($sql);
$sth->execute();

$banlist = $sth->fetchAll();

# echo "<pre>";
# var_dump($banlist);
# echo "</pre>";
# die();
?>
