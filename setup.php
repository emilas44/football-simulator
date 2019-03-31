<?php

require_once('Team.php');

$teams = [
	'A1' => ['name' => 'Russia', 			'att' => 79, 'mid' => 77, 'def' => 76, 'ovr' => 77],
	'A2' => ['name' => 'Saudi Arabia', 		'att' => 63, 'mid' => 64, 'def' => 64, 'ovr' => 64],
	'A3' => ['name' => 'Egypt', 			'att' => 70, 'mid' => 65, 'def' => 64, 'ovr' => 66],
	'A4' => ['name' => 'Uruguay', 			'att' => 84, 'mid' => 78, 'def' => 79, 'ovr' => 80],

	'B1' => ['name' => 'Portugal', 			'att' => 86, 'mid' => 82, 'def' => 81, 'ovr' => 82],
	'B2' => ['name' => 'Spain', 			'att' => 85, 'mid' => 85, 'def' => 86, 'ovr' => 85],
	'B3' => ['name' => 'Marocco', 			'att' => 66, 'mid' => 67, 'def' => 65, 'ovr' => 66],
	'B4' => ['name' => 'Iran', 				'att' => 65, 'mid' => 66, 'def' => 66, 'ovr' => 66],

	'C1' => ['name' => 'France', 			'att' => 83, 'mid' => 87, 'def' => 84, 'ovr' => 85],
	'C2' => ['name' => 'Australia',			'att' => 70, 'mid' => 73, 'def' => 72, 'ovr' => 72],
	'C3' => ['name' => 'Peru', 				'att' => 76, 'mid' => 74, 'def' => 70, 'ovr' => 73],
	'C4' => ['name' => 'Denmark', 			'att' => 77, 'mid' => 81, 'def' => 77, 'ovr' => 78],

	'D1' => ['name' => 'Argentina',			'att' => 89, 'mid' => 80, 'def' => 79, 'ovr' => 82],
	'D2' => ['name' => 'Iceland', 			'att' => 74, 'mid' => 74, 'def' => 71, 'ovr' => 72],
	'D3' => ['name' => 'Croatia',	 		'att' => 80, 'mid' => 85, 'def' => 81, 'ovr' => 82],
	'D4' => ['name' => 'Nigeria', 			'att' => 77, 'mid' => 76, 'def' => 75, 'ovr' => 76],

	'E1' => ['name' => 'Brazil', 			'att' => 90, 'mid' => 85, 'def' => 88, 'ovr' => 86],
	'E2' => ['name' => 'Switzerland',		'att' => 75, 'mid' => 77, 'def' => 77, 'ovr' => 77],
	'E3' => ['name' => 'Costa Rica', 		'att' => 68, 'mid' => 66, 'def' => 69, 'ovr' => 68],
	'E4' => ['name' => 'Serbia', 			'att' => 79, 'mid' => 81, 'def' => 79, 'ovr' => 79],

	'F1' => ['name' => 'Germany', 			'att' => 84, 'mid' => 86, 'def' => 83, 'ovr' => 85],
	'F2' => ['name' => 'Mexico', 			'att' => 79, 'mid' => 78, 'def' => 75, 'ovr' => 77],
	'F3' => ['name' => 'Sweden', 			'att' => 76, 'mid' => 76, 'def' => 76, 'ovr' => 76],
	'F4' => ['name' => 'Korea Republic',	'att' => 71, 'mid' => 76, 'def' => 72, 'ovr' => 73],

	'G1' => ['name' => 'Belgium', 			'att' => 86, 'mid' => 85, 'def' => 86, 'ovr' => 86],
	'G2' => ['name' => 'Panama', 			'att' => 65, 'mid' => 64, 'def' => 63, 'ovr' => 64],
	'G3' => ['name' => 'Tunisia',	 		'att' => 75, 'mid' => 76, 'def' => 74, 'ovr' => 75],
	'G4' => ['name' => 'England', 			'att' => 85, 'mid' => 81, 'def' => 81, 'ovr' => 82],

	'H1' => ['name' => 'Poland', 			'att' => 80, 'mid' => 75, 'def' => 74, 'ovr' => 76],
	'H2' => ['name' => 'Senegal', 			'att' => 79, 'mid' => 78, 'def' => 78, 'ovr' => 78],
	'H3' => ['name' => 'Colombia', 			'att' => 81, 'mid' => 80, 'def' => 77, 'ovr' => 79],
	'H4' => ['name' => 'Japan', 			'att' => 78, 'mid' => 78, 'def' => 75, 'ovr' => 77],
];

$groupA = [
    '1' => new Team($teams['A1']),
    '2' => new Team($teams['A2']),
    '3' => new Team($teams['A3']),
    '4' => new Team($teams['A4']),
];

$groupB = [
    '1' => new Team($teams['B1']),
    '2' => new Team($teams['B2']),
    '3' => new Team($teams['B3']),
    '4' => new Team($teams['B4']),
];

$groupC = [
    '1' => new Team($teams['C1']),
    '2' => new Team($teams['C2']),
    '3' => new Team($teams['C3']),
    '4' => new Team($teams['C4']),
];

$groupD = [
    '1' => new Team($teams['D1']),
    '2' => new Team($teams['D2']),
    '3' => new Team($teams['D3']),
    '4' => new Team($teams['D4']),
];

$groupE = [
    '1' => new Team($teams['E1']),
    '2' => new Team($teams['E2']),
    '3' => new Team($teams['E3']),
    '4' => new Team($teams['E4']),
];

$groupF = [
    '1' => new Team($teams['F1']),
    '2' => new Team($teams['F2']),
    '3' => new Team($teams['F3']),
    '4' => new Team($teams['F4']),
];

$groupG = [
    '1' => new Team($teams['G1']),
    '2' => new Team($teams['G2']),
    '3' => new Team($teams['G3']),
    '4' => new Team($teams['G4']),
];

$groupH = [
    '1' => new Team($teams['H1']),
    '2' => new Team($teams['H2']),
    '3' => new Team($teams['H3']),
    '4' => new Team($teams['H4']),
];