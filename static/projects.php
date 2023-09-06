<?php

$projects=array();
$folders=scandir("/home");

foreach ($folders as $item)
{
	if (is_dir("/home/".$item."/public_html") && file_exists("/home/".$item."/public_html/MANIFEST"))
	{
		$info=parse_ini_file("/home/".$item."/public_html/MANIFEST");
		$info['folder']=$item;
		if (!$info['private'])
		{
			$projects[]=$info;
		}
	}
}

header("Content-type: text/json");
header("Access-Control-Allow-Origin: http://localhost:1313");
print json_encode($projects);
