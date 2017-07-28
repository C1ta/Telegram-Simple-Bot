<?php

if ($msg == "/start") {
	$menu[] = array(
		array(
			"text" => "Stato Server",
			"callback_data" => "minecraft"
		) ,
	);
	sm($chatID, "Ciao $nome benvenuto in questo bot!", $menu, 'Markdown', false, false, true);
}

$ipserver = "mc.hypixel.net"; //Metti l'ip del vostro server anche numerico! Se avete server non nella porta 25565 scrivete ipserver:PORTA

if ($msg == "minecraft") {
	sm($chatID, "Ottimo, sto prendendo le informazioni del nostro server!");
	$server = file_get_contents("https://mcapi.ca/query/$ipserver/info");
	$server = json_decode($server, 1);
	$giocatori = $server['players']['online'];
	$nomeserver = $server['hostname'];
	$ping = $server['ping'];
	$motd = $server['motds']['clean'];
	if ($server['status'] == 'true') {
		sm($chatID, " 💥<b>$nomeserver</b>💥\n\nStatus Server: <b>ONLINE</b> ✅\nGiocatori online: <b>$giocatori</b>\nMotd: <b>$motd</b>\nPing: <b>$ping</b>\n\nIp: $nomeserver");
	}
	else {
		sm($chatID, "💥<b>$nomeserver</b>💥\n\nStatus Server: <b>OFFLINE</b> ❌");
	}
}