<?php
include("../includes/mooveeClass.inc.php");
$k = new moovee();

if(isset($_POST['getMovList']))
{
	$parm = explode("-", strip_tags($_POST['getMovList']));

	$group = $k->getGroupByFieldName($parm[0]);
	$groupKeys = array_keys($group);

	$movKeyList = $group[$groupKeys[$parm[1]]];

	$cacheArr = array();
	$cTitles = array();
	foreach($movKeyList as $movKey)
	{
		$data = $k->getMovieByKey($movKey, array("KEY", "CTITLE", "ETITLE", "PAGE"));
		if(in_array($data['CTITLE'], $cTitles, true) == false)
		{
			if(strstr($data['CTITLE'], '(取消)') !== false) continue;
			$cTitles[] = $data['CTITLE'];
			$cacheArr[] = $data;
		}
	}

//	$cacheArr = array_unique($cacheArr);
	usort($cacheArr, "compareTitle");

	echo "refreshTitleBox(\"" . strip_tags($_POST['getMovList']) . "\"," . json_encode($cacheArr) . ");";
}

if(isset($_POST['getGroup']))
{
	$field = strip_tags($_POST['getGroup']);

	$group = array_keys($k->getGroupByFieldName($field));

	echo "refreshGroupBox(\"{$field}\"," . json_encode($group) . ");";
}

if(isset($_POST['movTitle']))
{
	$movTitle = strip_tags($_POST['movTitle']);
	$movGroupTitleList = $k->getKeyListByField('CTITLE');
	$movKeyList = $movGroupTitleList[$movTitle];

	$cacheArr = array();
	foreach($movKeyList as $movKey) $cacheArr[] = $k->getMovieByKey($movKey);
	usort($cacheArr, "compareTime");

	echo "refreshDragBox(" . json_encode($cacheArr) . ");";
}

if(isset($_POST['movIdAdd']))
{
	$cacheArr = array();
	$movIdAdd = preg_replace("/[^0-9noe]/", '', strip_tags($_POST['movIdAdd']));


	$movIdList = "";
	if(isset($_POST['varStor']))
	{
		$movIdList = explode(",", trim(strip_tags(urldecode($_POST['varStor'])), ','));
		$movIdList = preg_replace("/[^0-9,]/", '', $movIdList);		
	}

	if($movIdAdd == 'none')
	{
		$collStat = 0;
		$movIdListNew = array();
		foreach($movIdList as $id)
			if($k->checkCollision($id, $movIdListNew) == 0) $movIdListNew[] = $id;
		$movIdList = $movIdListNew;
	}
	else $collStat = $k->checkCollision($movIdAdd, $movIdList);

	switch($collStat)
	{
	case 0:
		foreach($movIdList as $movKey) $cacheArr[] = $k->getMovieByKey($movKey);
		$cacheArr[] = $k->getMovieByKey($movIdAdd);
		usort($cacheArr, "compareTime");
		echo "refreshDropBox(" . json_encode($cacheArr) . ");";
		break;
	case 1:
		$msg = "error: 電影播映時間衝突";
		echo "refreshDropBox(" . json_encode($msg) . ");";
		break;
	case -1:
		$msg = "error: 片單中已有此片";
		echo "refreshDropBox(" . json_encode($msg) . ");";
		break;
	}
}

?>
