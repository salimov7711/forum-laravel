<?php

namespace App\Helpers;

class TranslateHelper
{
	public function createLangString($string, $rusToEng = true)
	{
		if (!$string || trim($string) == "") {
			return null;
		}

		$string = str_replace(
			["  ", "   ", "    ", "     "],
			" ",
			str_replace([" & ", "& ", " &", "&"], "-", strtolower($string))
		);
		$string = str_replace(["#"], "-", $string);
		$string = str_replace(["%"], "-", $string);
		$string = str_replace(["'"], "", $string);
		$string = str_replace(['"'], "", $string);
		$string = str_replace([" | ", "|  ", " |", "|"], "-", $string);
		$string = str_replace([" ? ", "?  ", " ?", "?"], "-", $string);
		$string = str_replace([" / ", "/  ", " /", "/"], "-", $string);
		$string = str_replace([" - ", "-  ", " -", "-"], "-", $string);
		$string = str_replace([" : ", ":  ", " :", ":"], "-", $string);
		$string = str_replace([" , ", ",  ", " ,", ","], "-", $string);
		$string = str_replace([" ( ", "(  ", " (", "("], "-", $string);
		$string = str_replace([" ) ", ")  ", " )", ")"], "-", $string);
		$string = str_replace([" . ", ".  ", " .", "."], "-", $string);
		$string = str_replace(["____", "____", "___", "__"], "-", $string);
		$string = str_replace([" "], "-", $string);
		$string = str_replace(["-----", "----", "---", "--"], "-", $string);
		$string = trim($string);
		$string = rtrim($string, "-");
		$string = ltrim($string, "-");
		if ($rusToEng) {
			return $this->rusToEng($string);
		}

		return $string;
	}

	public function rusToEng($text, $toLower = true)
	{
		/* 	Русский алфавит  */
		$rus_alphabet = [
			"А",
			"Б",
			"В",
			"Г",
			"Д",
			"Е",
			"Ё",
			"Ж",
			"З",
			"И",
			"Й",
			"К",
			"Л",
			"М",
			"Н",
			"О",
			"П",
			"Р",
			"С",
			"Т",
			"У",
			"Ф",
			"Х",
			"Ц",
			"Ч",
			"Ш",
			"Щ",
			"Ъ",
			"Ы",
			"Ь",
			"Э",
			"Ю",
			"Я",
			"Ғ",
			"Ӣ",
			"Қ",
			"Ӯ",
			"Ҳ",
			"Ҷ",
			"а",
			"б",
			"в",
			"г",
			"д",
			"е",
			"ё",
			"ж",
			"з",
			"и",
			"й",
			"к",
			"л",
			"м",
			"н",
			"о",
			"п",
			"р",
			"с",
			"т",
			"у",
			"ф",
			"х",
			"ц",
			"ч",
			"ш",
			"щ",
			"ъ",
			"ы",
			"ь",
			"э",
			"ю",
			"я",
			"ғ",
			"ӣ",
			"қ",
			"ӯ",
			"ҳ",
			"ҷ",
		];
		if ($toLower) {
			// Английская транслитерация
			$rus_alphabet_transliteration = [
				"a",
				"b",
				"v",
				"g",
				"d",
				"e",
				"yo",
				"zh",
				"z",
				"i",
				"i",
				"k",
				"l",
				"m",
				"n",
				"o",
				"p",
				"r",
				"s",
				"t",
				"u",
				"f",
				"kh",
				"c",
				"ch",
				"sh",
				"sh",
				"",
				"y",
				"",
				"e",
				"yu",
				"ya",
				"gh",
				"y",
				"q",
				"u",
				"h",
				"j",
				"a",
				"b",
				"v",
				"g",
				"d",
				"e",
				"yo",
				"zh",
				"z",
				"i",
				"i",
				"k",
				"l",
				"m",
				"n",
				"o",
				"p",
				"r",
				"s",
				"t",
				"u",
				"f",
				"kh",
				"c",
				"ch",
				"sh",
				"sh",
				"",
				"y",
				"",
				"e",
				"yu",
				"ya",
				"gh",
				"y",
				"q",
				"u",
				"h",
				"j",
			];
		} else {
			// Английская транслитерация
			$rus_alphabet_transliteration = [
				"A",
				"B",
				"V",
				"G",
				"D",
				"E",
				"Yo",
				"Zh",
				"Z",
				"I",
				"I",
				"K",
				"L",
				"M",
				"N",
				"O",
				"P",
				"R",
				"S",
				"T",
				"U",
				"F",
				"H",
				"C",
				"Ch",
				"Sh",
				"Sh",
				"",
				"Y",
				"",
				"E",
				"Yu",
				"Ya",
				"Gh",
				"Y",
				"Q",
				"U",
				"H",
				"J",
				"a",
				"b",
				"v",
				"g",
				"d",
				"e",
				"yo",
				"zh",
				"z",
				"i",
				"i",
				"k",
				"l",
				"m",
				"n",
				"o",
				"p",
				"r",
				"s",
				"t",
				"u",
				"f",
				"h",
				"c",
				"ch",
				"sh",
				"sh",
				"",
				"y",
				"",
				"e",
				"yu",
				"ya",
				"gh",
				"y",
				"q",
				"u",
				"h",
				"j",
			];
		}
		return str_replace(
			$rus_alphabet,
			$rus_alphabet_transliteration,
			$text
		);
	}
}
