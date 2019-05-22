<?php
$number = '[0-9]+';
$date = '[0-9]{4}-[0-9]{2}-[0-9]{2}';
return [
	'CinemaController' => [
    '~^' . MAIN_DIR . "/cinema$~",
	],
  'SeanceController' => [
    '~^' . MAIN_DIR . "/seance/({$number})/({$date})$~", // по кинотеатру и дате
  ],
  'HallController' => [
    '~^' . MAIN_DIR . "/hall/({$number})/({$date})$~", // по залу и дате
  ],
  'PlaceController' => [
    '~^' . MAIN_DIR . "/place/({$number})$~", // по сеансу
  ],
	'Error' => []
];