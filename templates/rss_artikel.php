<?php
echo '<item>
    <title>'.htmlspecialchars(studip_utf8encode($title)).'</title>
    <link>'.htmlspecialchars(studip_utf8encode($studipUrl)).'</link>
    <description>'.
        htmlspecialchars(studip_utf8encode(formatready($description,1,1)))
    .'</description>
    <pubDate>'.date('r', $pubDate).'</pubDate>
    <guid isPermaLink="false">'.$guid.'</guid>
</item>
';
