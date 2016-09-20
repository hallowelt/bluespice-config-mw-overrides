<?php
/**
 * BlueSpice Output handler for the web installer.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 * @ingroup Deployment
 */

/**
 * BlueSpice output class modelled on OutputPage.
 *
 * @ingroup Deployment
 * @since 2.27
 *
 * @author Stephan Muggli
 * @author Robert Vogel <vogel@hallowelt.com>
 */
class BsWebInstallerOutput extends WebInstallerOutput {

	 // BlueSpice
	public function outputTitle() {
		global $wgVersion;
		echo wfMessage( 'bs-installer-title', $wgVersion, '2.27' )->plain();
	}

	/* //For the future
	public function getJQuery() {
		$sJQueryScriptTag = parent::getJQuery();
		return $sJQueryScriptTag.
			"\n\t".
			Html::linkedStyle( "../extensions/BlueSpiceFoundation/resources/extjs/resources/ext-theme-neptune/ext-theme-neptune-all.js" )."\n\t".
			Html::linkedScript( "../extensions/BlueSpiceFoundation/resources/extjs/ext-all-debug.js" );
	}
	*/

	public function outputFooter() {
		if ( $this->useShortHeader ) {
			echo Html::closeElement( 'body' ) . Html::closeElement( 'html' );

			return;
		}
?>

</div></div>

<div id="mw-panel">
	<div class="portal" id="p-logo">
	  <a style="background-image: url(overrides/resources/images/bs-logo.png);background-size: 140px;"
		href="https://www.mediawiki.org/"
		title="Main Page"></a>
	</div>
<?php
	$message = wfMessage( 'config-sidebar' )->plain();
	foreach ( explode( '----', $message ) as $section ) {
		echo '<div class="portal"><div class="body">';
		echo $this->parent->parse( $section, true );
		echo '</div></div>';
	}
?>
</div>

<?php
		echo Html::closeElement( 'body' ) . Html::closeElement( 'html' );
	}
}
