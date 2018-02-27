<?php

/**
 *
 * Thanks For Posts extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2013 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace gfksx\ThanksForPosts\migrations;

class v_2_0_0 extends \phpbb\db\migration\migration
{

	public function effectively_installed()
	{
		return isset($this->config['thanks_for_posts_version']) && version_compare($this->config['thanks_for_posts_version'], '2.0.0', '>=');
	}

	static public function depends_on()
	{
		return array('\gfksx\ThanksForPosts\migrations\v_1_3_4');
	}

	public function update_data()
	{
		// Add ACP modules
		$add_modules = array(
			array('module.add', array('acp', 'ACP_CAT_DOT_MODS', 'ACP_THANKS')),
			array('module.add', array('acp', 'ACP_THANKS', array(
						'module_basename' => '\gfksx\ThanksForPosts\acp\acp_thanks_module',
						'module_langname' => 'ACP_THANKS_SETTINGS',
						'module_mode' => 'thanks',
						'module_auth' => 'ext_gfksx/ThanksForPosts && acl_a_board',
					))),
			array('module.add', array('acp', 'ACP_THANKS', array(
						'module_basename' => '\gfksx\ThanksForPosts\acp\acp_thanks_refresh_module',
						'module_langname' => 'ACP_THANKS_REFRESH',
						'module_mode' => 'thanks',
						'module_auth' => 'ext_gfksx/ThanksForPosts && acl_a_board',
					))),
			array('module.add', array('acp', 'ACP_THANKS', array(
						'module_basename' => '\gfksx\ThanksForPosts\acp\acp_thanks_truncate_module',
						'module_langname' => 'ACP_THANKS_TRUNCATE',
						'module_mode' => 'thanks',
						'module_auth' => 'ext_gfksx/ThanksForPosts && acl_a_board',
					))),
			array('module.add', array('acp', 'ACP_THANKS', array(
						'module_basename' => '\gfksx\ThanksForPosts\acp\acp_thanks_reput_module',
						'module_langname' => 'ACP_THANKS_REPUT_SETTINGS',
						'module_mode' => 'thanks',
						'module_auth' => 'ext_gfksx/ThanksForPosts && acl_a_board',
					))),
		);

		// Update config values
		$update_config = array(
			// Current version
			array('config.add', array('thanks_for_posts_version', '2.0.0')),
			array('config.update', array('thanks_for_posts_version', '2.0.0')),
			array('config.remove', array('thanks_mod_version'))
		);

		return array_merge($add_modules, $update_config);
	}

}
