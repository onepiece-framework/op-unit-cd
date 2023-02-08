<?php
/** op-unit-cd:/CD.class.php
 *
 * @created    2023-02-05
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
namespace OP\UNIT;

/** use
 *
 */
use Exception;
use OP\IF_UNIT;
use OP\OP_CORE;
use OP\OP_CI;

/** CD
 *
 * @created    2023-02-05
 * @version    1.0
 * @package    op-unit-empty
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */
class CD implements IF_UNIT
{
	/** use
	 *
	 */
	use OP_CORE, OP_CI;

	/** Automaticall
	 *
	 * @created    2023-02-05
	 */
	static function Auto()
	{
		//	...
		$prefix = '.ci_commit_id_';
		foreach( glob("{$prefix}*") as $file ){
			$branch_name      = substr($file, strlen($prefix));
			$commit_id_saved  = file_get_contents($file);
			$commit_id_branch = self::Git()->CommitID($branch_name);
			D($file, $branch_name, $commit_id_saved, $commit_id_branch);

			//	...
			if( $commit_id_saved !== $commit_id_branch ){
				throw new Exception("Does not match commit id. ({$file}={$commit_id_saved}, {$branch_name}={$commit_id_branch})");
			}

			//	...
			self::Git()->Push($branch_name);
		}
	}

	/** Init
	 *
	 * @created    2023-02-05
	 */
	static function Init()
	{

	}

	/** Git
	 *
	 * @created    2023-02-05
	 * @return     Git
	 */
	static function Git()
	{
		static $_git;
		if(!$_git ){
			$_git = OP()->Unit('Git');
		}
		return $_git;
	}
}
