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

		echo $url;

		$text = '{{#embed:' . $url . '}}';
		$jeroen = $parser->recursiveTagParse( $text, $frame );

		$ret = '<tool>';
		$ret .= '<div class="tool">';
		$ret .= "<div class='toolHeader'><a href='{$github}/{$user}' target='_blank'>{$user}</a> / <a href='{$github}/{$user}/{$repo}' target='_blank'>{$repo}</a> / {$file}</div>";
		$ret .= "<div class='toolContent'>{$jeroen}</div>";
		$ret .= '<div class="toolFooter">';
		$ret .= '<a href="https://hackersanddesigners.nl/s/Tools">↗ view more tools ↗</a>';
		$ret .= '<a class="inGitHub" href="' . $url . '" target="_blank">↗ view in GitHub ↗</a>';
		$ret .= '</div>';
		$ret .= '</div>';
		$ret .= '</tool>';
    // $ret .= '<p>also appears in:</p>';

		$parser->getOutput()->addModules( 'ext.tool' );

		return $ret;
	}
}
