<?php
header('Content-Type: text/plain; charset=utf-8');
$dbh = new PDO("mysql:host=localhost;dbname=daisy;charset=UTF8", 'root', '');
	$q = $dbh->prepare("SELECT * FROM users WHERE TICKET = :ticket");
			$q->execute(array('ticket' => $_GET['ticket']));
				$a = $q->fetch(PDO::FETCH_ASSOC);
				$inv = $a['BGInv'];
	$invred = str_replace("IsUsed>0|IsLimited>0|", '', $inv);
	$invred2 = str_replace("|", ';', $invred);
	$invred3 = preg_replace("/[^0-9,;]/", '', $invred2);
echo "id=" . $a['ID']  . "&username=" . $a['USERNAME']  . "&level=" . $a['LEVEL'] . "&regdate=" . $a['REGDATE'] . "&roleflags=" . $a['ROLEFLAGS'] . "&money=".$a["MONEY"]."&gold=".$a["GOLD"]."&magic=".$a["MAGIC"]."&avatar=" . $a['AVATAR'] . "&inventory=" . $a['INVENTORY'] . "&isbanned=" . $a['ISBANNED'] . "&bg=" . $a['BG'] . "&bginven=" . $invred3;
