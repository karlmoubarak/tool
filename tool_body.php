<?php
class tool {
	static function onParserInit( Parser $parser ) {
		$parser->setHook( 'tool', array( __CLASS__, 'toolRender' ) );
		return true;
	}
	static function toolRender( $text, array $args, Parser $parser, PPFrame $frame ) {
		// $repo = $args['repo']
		// $filename = $args['filename']
		// $branch = $args['branch']
		$parser->getOutput()->addModules( 'ext.tool' );

		$github = 'https://github.com';
		$repo = 'hackersanddesigners/hdsa2019doc';
		$filename = 'readme.md';

		$url = $github . '/' . $repo;

		$text = '{{#github:' . $filename . '|' . $repo . '}}';
		$jeroen = $parser->recursiveTagParse( $text, $frame );

		$ret = '<table class="toolTable">';
		$ret .= '<tr class="toolHeader">';
		$ret .= "<td>{$repo}</td>";
		$ret .= '</tr>';
    $ret .= '<tr class="toolContent">';
    $ret .= "<td>{$jeroen}</td>";
    $ret .= '</tr>';
		$ret .= '<tr class="toolFooter">';
		$ret .= '<td><a href="">view more tools</a></td>';
		$ret .= '<td><a href="' . $url . '" target="_blank">view in GitHub</a></td>';
		$ret .= '</tr>';
		$ret .= '</table>';
    // $ret .= '<p>also appears in:</p>';
		return $ret;
	}
}
