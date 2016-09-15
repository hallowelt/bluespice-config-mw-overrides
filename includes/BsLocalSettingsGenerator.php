<?php
/**
 * Generator for LocalSettings.php file.
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
 * Class for generating BlueSpice LocalSettings.php file.
 *
 * @ingroup Deployment
 * @since 2.27
 *
 * @author Stephan Muggli
 * @author Robert Vogel <vogel@hallowelt.com>
 */
class BsLocalSettingsGenerator extends LocalSettingsGenerator {

	/**
	 * Return the full text of the generated LocalSettings.php file,
	 * including the extensions and skins.
	 *
	 * @return string
	 */
	public function getText() {
		$localSettings = $this->getDefaultText();

		if ( count( $this->skins ) ) {
			$localSettings .= "
# Enabled skins.
# The following skins were automatically enabled:\n";

			foreach ( $this->skins as $skinName ) {
				$localSettings .= $this->generateExtEnableLine( 'skins', $skinName );
			}

			$localSettings .= "\n";
		}

		if ( count( $this->extensions ) ) {
			$localSettings .= "
# Enabled extensions. Most of the extensions are enabled by adding
# wfLoadExtensions('ExtensionName');
# to LocalSettings.php. Check specific extension documentation for more details.
# The following extensions were automatically enabled:\n";

			foreach ( $this->extensions as $extName ) {
				$localSettings .= $this->generateExtEnableLine( 'extensions', $extName );
			}

			$localSettings .= "\n";
		}

		// BlueSpice - START
		$localSettings .= "require_once \"\$IP/LocalSettings.BlueSpice.php\";\n";
		// BlueSpice - END

		$localSettings .= "
# End of automatically generated settings.
# Add more configuration options below.\n\n";

		return $localSettings;
	}
}
