<?php
$wgAutoloadClasses['tool'] = $IP . '/extensions/tool/tool_body.php';
$wgHooks['ParserFirstCallInit'][] = 'tool::onParserInit';

// :))
