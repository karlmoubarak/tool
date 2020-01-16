<?php
class tool {
	static function onParserInit( Parser $parser ) {
		$parser->setHook( 'tool', array( __CLASS__, 'toolRender' ) );
		return true;
	}
	static function toolRender( $input, array $args, Parser $parser, PPFrame $frame ) {
		$parser->getOutput()->addModules( 'ext.tool' );
		$ret = '<table class="toolTable">';
		$ret .= '<tr class="toolHeader">';
		$ret .= '<td>GithubRepository/Path/Filename</td>';
		$ret .= '</tr>';
		$ret .= '<tr>';
		$ret .= '<td>FileContents (Jeroens Syntax)</td>';
		$ret .= '</tr>';
    $ret .= '<tr class="toolContents">';
    $ret .= '<td>{{#github:readme.md|hackersanddesigners/hdsa2019doc}}</td>';
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
