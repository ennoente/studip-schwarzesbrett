<?php
echo '<?xml version="1.0"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <atom:link href="'.htmlspecialchars(studip_utf8encode($selfLink)).'" rel="self" type="application/rss+xml" />
        <title>'.htmlspecialchars(studip_utf8encode($title)).'</title>
        <link>'.htmlspecialchars(studip_utf8encode($studipUrl)).'</link>
        <image>
            <url>'.Assets::image_path('logos/studipklein.gif').'</url>
            <title>'.htmlspecialchars(studip_utf8encode($title)).'</title>
            <link>'.htmlspecialchars(studip_utf8encode($studipUrl)).'</link>
        </image>
        <description>'.$description.'</description>
        <lastBuildDate>'.date("r").'</lastBuildDate>
        <generator>'.htmlspecialchars(studip_utf8encode('Stud.IP - ' . $GLOBALS['SOFTWARE_VERSION'])).'</generator>
        '.$items.'
    </channel>
</rss>';
