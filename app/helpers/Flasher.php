<?php
namespace App\Helpers;

class Flasher
{
	public static function set_flash($msg, $type)
	{
		$_SESSION['flash'] = [
			'msg' => $msg,
			'type' => $type
		];
	}

	public static function flash()
	{
		if (isset($_SESSION['flash'])) {
			echo '
				<div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show" role="alert">
					<strong>' . $_SESSION['flash']['msg'] . '</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			';
			unset($_SESSION['flash']);
		}
	}
}
