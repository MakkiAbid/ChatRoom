<?php 

class Badwords
{
	public static function isDirty($string)
	{
		$words = explode(' ', $string);

		$bad_words = self::getBadWords();

		foreach ($words as $word) {
			if(in_array(strtolower($word), $bad_words)){
				return true;
			}
		}

		return false;
	}

	public static function strip($string)
	{
		$words = explode(' ', $string);

		$bad_words = self::getBadWords();

		$new_words = [];

		foreach ($words as $word) {
			if(in_array(strtolower($word), $bad_words)){
				$word_len = strlen($word);
				$staric_word = $word[0];
				for($i=1; $i<$word_len; $i++){
					$staric_word .= "*";
				}
				$new_words[] = $staric_word;

			}
			else{
				$new_words[] = $word;
			}
		}

		return implode(' ', $new_words);
	}

	public static function getBadWords()
	{
		return array_map(function($item){
			return strtolower(trim($item));
		}, explode("\n", file_get_contents(__DIR__ . '/badwords.txt')));
	}
}