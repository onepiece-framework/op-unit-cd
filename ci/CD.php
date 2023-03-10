<?php
/** op-unit-cd:/ci/CD.php
 *
 * @created    2023-01-30
 * @version    1.0
 * @package    op-unit-cd
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */

/** Declare strict
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP;

//	...
$ci = new CI();

//	Auto
$args   = null;
$result = null;
$ci->Set('Auto', $result, $args);

//	Git
$args   =  null;
$result = 'OP\UNIT\Git';
$ci->Set('Git', $result, $args);

//	...
return $ci->GenerateConfig();
