<?php
if (!defined('FLUX_ROOT')) exit;

$this->loginRequired();

$title = Flux::message('GBanListTitle');

$sqlpartial = "WHERE 1 = 1 ";

$sql = "SELECT COUNT(id) AS total FROM {$server->loginDatabase}.gepard_block_log $sqlpartial";
$sth = $server->connection->getStatement($sql);
$sth->execute();


$paginator = $this->getPaginator($sth->fetch()->total);
$paginator->setSortableColumns(array('id', 'block_time' => 'desc', 'unban_time', 'reason'));

$sql = $paginator->getSQL("SELECT id, unique_id, block_time, unban_time, reason FROM {$server->loginDatabase}.gepard_block_log $sqlpartial");
$sth = $server->connection->getStatement($sql);
$sth->execute();

$banlist = $sth->fetchAll();

# echo "<pre>";
# var_dump($banlist);
# echo "</pre>";
# die();
?>
