<?php
class tool {
	static function onParserInit( Parser $parser ) {
		$parser->setHook( 'tool', array( __CLASS__, 'toolRender' ) );
		return true;
	}
	static function toolRender( $text, array $args, Parser $parser, PPFrame $frame ) {
		$github = 'https://github.com';
		$user = $args['user'];
		$repo = $args['repo'];
		$file = $args['file'];

		$url = $github . '/' . $user . '/' . $repo;

		$text = '{{#github:' . $file . '|' . $user . '/' . $repo . '}}';
		$jeroen = $parser->recursiveTagParse( $text, $frame );

		$ret = '<table class="toolTable">';
		$ret .= '<tbody>';
		$ret .= "<th class='toolHeader' colspan='2'><a href='{$github}/{$user}' target='_blank'>{$user}</a> / <a href='{$github}/{$user}/{$repo}' target='_blank'>{$repo}</a> / {$file}</th>";
		$ret .= "<tr class='toolContent'><td colspan='2'>{$jeroen}</td></tr>";
		$ret .= '<tr class="toolFooter">';
		$ret .= '<td><a href="https://hackersanddesigners.nl/s/Tools">view more tools</a></td>';
		$ret .= '<td><a href="' . $url . '" target="_blank">↗ view in GitHub ↗</a></td>';
		$ret .= '</tr>';
		$ret .= '</tbody>';
		$ret .= '</table>';
    // $ret .= '<p>also appears in:</p>';
		return $ret;

		$parser->getOutput()->addModules( 'ext.tool' );
	}
}
