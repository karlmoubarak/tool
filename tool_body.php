<?php
class tool {
	static function onParserInit( Parser $parser ) {
		$parser->setHook( 'tool', array( __CLASS__, 'toolRender' ) );
		return true;
	}
	static function toolRender( array $args, Parser $parser, PPFrame $frame ) {
		// $repo = $args['repo']
		// $filname = $args['filename']
		// $branch = $args['branch']

		$parser->getOutput()->addModules( 'ext.tool' );

		$text = '{{#github:readme.md|hackersanddesigners/hdsa2019doc}}';
		$jeroen = $parser->recursiveTagParse( $text, $frame );

		$ret = '<table class="toolTable">';
		$ret .= '<tr class="toolHeader">';
		$ret .= '<td>GithubRepository/Path/Filename</td>';
		$ret .= '</tr>';
    $ret .= '<tr class="toolContent">';
    $ret .= '<td>' . $jeroen . '</td>';
    $ret .= '</tr>';
		$ret .= '<tr class="toolFooter">';
		$ret .= '<td><a href="">view more tools</a></td>';
		$ret .= '<td><a href="">view in GitHub</a></td>';
		$ret .= '</tr>';
		$ret .= '</table>';
    // $ret .= '<p>also appears in:</p>';
		return $ret;
	}
}
