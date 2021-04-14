<?php
return array(
	'MenuItems' => array(
		'Misc. Stuff'	=> array(
			'Gepard Ban List'	=> array('module' => 'gban'),
		),
	),
	'SubMenuItems' => array(
		'cplog'			=> array(
			'gban'			=> 'Gepard Bans'
		),
		'gban'			=> array(
			'index'			=> 'Gepard Ban List',
			'logs'			=> 'Ban History Logs',
			'add'			=> 'Add Gepard Ban'
		),
	),
)
?>
