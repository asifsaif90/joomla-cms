<?php
/**
 * @package     Joomla.UnitTest
 * @subpackage  Form
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

require_once dirname(__DIR__) . '/inspectors.php';

/**
 * Test class for JFormFieldHeadertag.
 * Generated by PHPUnit on 2012-08-16 at 17:35:48.
 */
class JFormFieldHeadertagTest extends PHPUnit_Framework_TestCase
{
	/**
	 * Tests the getInput method.
	 *
	 * @return  void
	 *
	 * @since   3.1
	 */
	public function testGetInput()
	{
		$form = new JFormInspector('form1');

		$this->assertThat(
			$form->load('<form><field name="headertag" type="headertag" label="Header Tag" description="Header Tag listing" /></form>'),
			$this->isTrue(),
			'Line:' . __LINE__ . ' XML string should load successfully.'
		);


		$field = new JFormFieldHeadertag($form);

		$this->assertThat(
			$field->setup($form->getXml()->field, 'value'),
			$this->isTrue(),
			'Line:' . __LINE__ . ' The setup method should return true.'
		);

		$this->assertContains(
			'<option value="h3">h3</option>',
			$field->input,
			'Line:' . __LINE__ . ' The getInput method should return an option with the header tags, verify H3 tag is in list.'
		);
	}
}
