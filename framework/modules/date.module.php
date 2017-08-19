<?php

function russian_month(int $mounth)
{
	if ($mounth == 1) {
		return 'января';
	}
	if ($mounth == 2) {
		return 'февраля';
	}
	if ($mounth == 3) {
		return 'марта';
	}
	if ($mounth == 4) {
		return 'апреля';
	}
	if ($mounth == 5) {
		return 'мая';
	}
	if ($mounth == 6) {
		return 'июня';
	}
	if ($mounth == 7) {
		return 'июля';
	}
	if ($mounth == 8) {
		return 'августа';
	}
	if ($mounth == 9) {
		return 'сентября';
	}
	if ($mounth == 10) {
		return 'октября';
	}
	if ($mounth == 11) {
		return 'ноября';
	}
	if ($mounth == 12) {
		return 'декабря';
	}

	return false;
}
