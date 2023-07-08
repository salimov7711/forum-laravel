<?php



namespace App\Http\Controllers;

use App\Helpers\TranslateHelper;

use Illuminate\Http\Request;

class TranslateController extends Controller
{
	public function translate($string)
	{

		$translator = new TranslateHelper();
		return $translator->createLangString($string);
	}
}
