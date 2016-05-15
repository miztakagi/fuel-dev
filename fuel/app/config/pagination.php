<?php
/**
 * Part of the Fuel framework.
 *
 * @package    Fuel
 * @version    1.8
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2016 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * NOTICE:
 *
 * If you need to make modifications to the default configuration, copy
 * this file to your app/config folder, and make them in there.
 *
 * This will allow you to upgrade fuel without losing your custom config.
 */

return array(

	// the active pagination template
	'active'                      => 'uikit',

	// Twitter bootstrap 3.x template
	'uikit'                   => array(
		'wrapper'                 => "<ul class='uk-pagination'>\n\t{pagination}\n\t</ul>\n",

		'first'                   => "\n\t\t<li>{link}</li>",
		'first-marker'            => "<i class='uk-icon-angle-double-left'></i>",
		'first-link'              => "<a href='{uri}' role='first'>{page}</a>",

		'first-inactive'          => "",
		'first-inactive-link'     => "",

		'previous'                => "\n\t\t<li>{link}</li>",
		'previous-marker'         => "<i class='uk-icon-angle-left'></i>",
		'previous-link'           => "<a href='{uri}' role='prev'>{page}</a>",

		'previous-inactive'       => "\n\t\t<li class='uk-disabled'>{link}</li>",
		'previous-inactive-link'  => "<span>{page}</span>",

		'regular'                 => "\n\t\t<li>{link}</li>",
		'regular-link'            => "<a href='{uri}'>{page}</a>",

		'active'                  => "\n\t\t<li class='uk-active'>{link}</li>",
		'active-link'             => "<span>{page}</span>",

		'next'                    => "\n\t\t<li>{link}</li>",
		'next-marker'             => "<i class='uk-icon-angle-right'></i>",
		'next-link'               => "<a href='{uri}' role='next'>{page}</a>",

		'next-inactive'           => "\n\t\t<li class='uk-disabled'>{link}</li>",
		'next-inactive-link'      => "<span>{page}</span>",

		'last'                    => "\n\t\t<li>{link}</li>",
		'last-marker'             => "<i class='uk-icon-angle-double-right'></i>",
		'last-link'               => "<a href='{uri}' role='last'>{page}</a>",

		'last-inactive'           => "",
		'last-inactive-link'      => "",
	),
);
