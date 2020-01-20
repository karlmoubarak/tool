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

		$ret = '<div class="tool">';
		$ret .= "<div class='toolHeader'><a href='{$github}/{$user}' target='_blank'>{$user}</a> / <a href='{$github}/{$user}/{$repo}' target='_blank'>{$repo}</a> / {$file}</div>";
		$ret .= "<div class='toolContent'>{$jeroen}</div>";
		$ret .= '<div class="toolFooter">';
		$ret .= '<p><a href="https://hackersanddesigners.nl/s/Tools">view more tools</a></p>';
		$ret .= '<p><a href="' . $url . '" target="_blank">↗ view in GitHub ↗</a></p>';
		$ret .= '</div>';
		$ret .= '</div>';
    // $ret .= '<p>also appears in:</p>';

		$parser->getOutput()->addModules( 'ext.tool' );

		return $ret;
	}
}
