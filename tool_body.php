<?php
class tool {
	static function onParserInit( Parser $parser ) {
		$parser->setHook( 'tool', array( __CLASS__, 'toolRender' ) );
		return true;
	}
	static function toolRender( $text, $input, array $args, Parser $parser, PPFrame $frame ) {
		// $branch = $args['branch']
		$parser->getOutput()->addModules( 'ext.tool' );

		$attr = [repo, file];
		foreach( $args as $name => $value ) {
			$attr[] = '<strong>' . htmlspecialchars( $name ) . '</strong> = ' . htmlspecialchars( $value );
		}
		return implode( '<br />', $attr ) . "\n\n" . htmlspecialchars( $input );

		$github = 'https://github.com';
		$repo = $args['repo']
		$file = $args['file']
		// $repo = 'hackersanddesigners/hdsa2019doc';
		// $file = 'readme.md';

		$url = $github . '/' . $repo;

		$text = '{{#github:' . $file . '|' . $repo . '}}';
		$jeroen = $parser->recursiveTagParse( $text, $frame );

		$ret = '<table class="toolTable">';
		$ret .= '<tr class="toolHeader">';
		$ret .= "<td>{$repo}</td>";
		$ret .= '</tr>';
    $ret .= '<tr class="toolContent" colspan="2">';
    $ret .= "<td>{$jeroen}</td>";
    $ret .= '</tr>';
		$ret .= '<tr class="toolFooter">';
		$ret .= '<td><a href="https://hackersanddesigners.nl/s/Tools">view more tools</a></td>';
		$ret .= '<td><a href="' . $url . '" target="_blank">view in GitHub</a></td>';
		$ret .= '</tr>';
		$ret .= '</table>';
    // $ret .= '<p>also appears in:</p>';
		return $ret;
	}
}
