<?php if (!defined('FLUX_ROOT')) exit;
require_once FLUX_THEME_DIR.'/newtheme/includes/config.php';


# var_dump($config['woe_schedule']);
# die();

$castleNames = Flux::config('CastleNames')->toArray();
$ids = implode(',', array_fill(0, count($castleNames), '?'));

// herc needs this for some reason
$sc = $this->defaultData['session']->loginAthenaGroup->athenaServers[0];

$sql  = "SELECT castles.castle_id, castles.guild_id, guild.name AS guild_name, guild.emblem_len FROM {$sc->charMapDatabase}.guild_castle AS castles ";
$sql .= "LEFT JOIN guild ON guild.guild_id = castles.guild_id ";
$sql .= "WHERE castles.castle_id IN ($ids)";
$sql .= "ORDER BY castles.castle_id ASC";
$sth  = $sc->connection->getStatement($sql);
$sth->execute(array_keys($castleNames));

$castles = $sth->fetchAll();


// fix castle ids
foreach($castles as $key => $value) {
	$cid 								= $value->castle_id;
	$castles_data[$cid]['castle_id'] 	= $cid;
	$castles_data[$cid]['guild_id'] 	= $value->guild_id;
	$castles_data[$cid]['guild_name'] 	= $value->guild_name;
	$castles_data[$cid]['emblem_len'] 	= $value->emblem_len;
}

$castle_names = Flux::config('CastleNames')->toArray();
$castles       = array();
$woe          = array();
$t            = array();
$woe_time	  = array();
$pattern      = "/(Sunday|Monday|Tuesday|Wednesday|Thursday|Friday|Saturday) ([0-9\:]{5})(?:[0-9\:]{3}) (?:Sunday|Monday|Tuesday|Wednesday|Thursday|Friday|Saturday) ([0-9\:]{5})(?:[0-9\:]{3})/";
$replacement  = '$1 $2 - $3';

# echo "<pre>";
# var_dump($config['woe_schedule']);
# die();
foreach ($config['woe_schedule'] as $key => $schedule)
{
	// initialize datetime
	$n = new DateTime('now');
	$n->setTimezone(new DateTImeZone($config['timezone']));

	$s = new DateTime('now');
	$s->setTimezone(new DateTImeZone($config['timezone']))->modify('next '.$schedule['woe_start']);

	$s2 = new DateTime('now');
	$s2->setTimezone(new DateTImeZone($config['timezone']))->modify($schedule['woe_start']);

	$e = new DateTime('now');
	$e->setTimezone(new DateTImeZone($config['timezone']))->modify('next '.$schedule['woe_end']);

	$e2 = new DateTime('now');
	$e2->setTimezone(new DateTImeZone($config['timezone']))->modify($schedule['woe_end']);

	$cids 						= $schedule['castle_id'];
	$diff 						= 0;
	if($n < $e2) {
		$diff					= $n->diff($s2)->d * 24 + $n->diff($s2)->h;
		$woe[$diff]['start']	= $s2; // ->format('Y-m-d H:i:s');
		$woe[$diff]['end']		= $e2; // ->format('Y-m-d H:i:s');
		$woe[$diff]['active']	= false;

		if($s2 <= $n && $n <= $e2 ) {
			$woe[$diff]['active'] = true;
		}

		# $woe_time[$diff] = "<span>".$s2->format('l')."</span><span>".$s2->format('H:i')." - ".$e2->format('H:i')."</span>";
	} else {
		$diff					= $n->diff($s)->d * 24 + $n->diff($s2)->h;
		$woe[$diff]['start']	= $s; // ->format('Y-m-d H:i:s');
		$woe[$diff]['end']		= $e; // ->format('Y-m-d H:i:s');
		$woe[$diff]['active']	= false;

		# $woe_time[$diff] = "<span>".$s->format('l')."</span><span>".$s->format('H:i')." - ".$e->format('H:i')."</span>";
	}

	$woe[$diff]['diff']									= $diff;
	// $woe[$diff]['cids']								= $cids;
	foreach ($cids as $idx => $cid) {

		$woe[$diff]['castles'][$cid]['cid']				= $cid;
		$woe[$diff]['castles'][$cid]['castle']			= $castle_names[$cid];
		$woe[$diff]['castles'][$cid]['link']			= $schedule['link'];

		$woe[$diff]['castles'][$cid]['owner']			= "No Owner";
		$woe[$diff]['castles'][$cid]['gid']				= 0;
		$woe[$diff]['castles'][$cid]['emblem']			= "";
		$woe[$diff]['castles'][$cid]['leader']			= "n/a";
		$woe[$diff]['castles'][$cid]['time_text']		= preg_replace($pattern, $replacement, $schedule['woe_start'].' '.$schedule['woe_end']);
		$woe[$diff]['castles'][$cid]['tooltip']			= "Guild: No Owner<br>Castle: ".$woe[$diff]['castles'][$cid]['castle'];

		if(isset($castles_data[$cid])) {
			$sql  = "SELECT `master` FROM `{$sc->charMapDatabase}`.`guild` WHERE `guild`.guild_id = ?";

			$sth  = $sc->connection->getStatement($sql);
			$sth->execute(array($castles_data[$cid]['guild_id']));
			if($result = $sth->fetch()) {
				$master = $result->master;

				$woe[$diff]['castles'][$cid]['owner']		= $castles_data[$cid]['guild_name'];
				$woe[$diff]['castles'][$cid]['gid']			= $castles_data[$cid]['guild_id'];
				$woe[$diff]['castles'][$cid]['emblem']		= $castles_data[$cid]['emblem_len'];
				$woe[$diff]['castles'][$cid]['leader']		= $master;
				$woe[$diff]['castles'][$cid]['time_text']	= preg_replace($pattern, $replacement, $schedule['woe_start'].' '.$schedule['woe_end']);
				$woe[$diff]['castles'][$cid]['tooltip']		= "Guild: ".$woe[$diff]['castles'][$cid]['owner']."<br>Leader: ".$master."<br>Castle: ".$woe[$diff]['castles'][$cid]['castle'];
			}
		}
	}
}


ksort($woe);
$woe = array_values($woe);

$woe_schedule = array();
foreach($woe as $k1 => $data) {
	$s = $data['start'];
	$e = $data['end'];

	$woe_schedule[$s->format('l')][] = $s->format('H:i').' - '.$e->format('H:i');

	foreach($data['castles'] as $k2 => $actual_data) {
		$castles[] = $actual_data;
	}
}

$koe_schedule = array();
foreach ($config['koe_schedule'] as $key => $koe_time) {
	$s = new DateTime('now');
	$s->setTimezone(new DateTImeZone($config['timezone']))->modify('next '.$koe_time);

	$koe_schedule[$s->format('l')][] = $s->format('H:i');
}

# echo "<pre>";
# var_dump($woe_schedule);
# die();

?>