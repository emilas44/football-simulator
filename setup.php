<?php

$teams = [
	['name' => 'Russia', 			'att' => 79, 'mid' => 77, 'def' => 76, 'ovr' => 77],
	['name' => 'Saudi Arabia', 		'att' => 63, 'mid' => 64, 'def' => 64, 'ovr' => 64],
	['name' => 'Egypt', 			'att' => 70, 'mid' => 65, 'def' => 64, 'ovr' => 66],
	['name' => 'Uruguay', 			'att' => 84, 'mid' => 78, 'def' => 79, 'ovr' => 80],

	['name' => 'Portugal', 			'att' => 86, 'mid' => 82, 'def' => 81, 'ovr' => 82],
	['name' => 'Spain', 			'att' => 85, 'mid' => 85, 'def' => 86, 'ovr' => 85],
	['name' => 'Marocco', 			'att' => 66, 'mid' => 67, 'def' => 65, 'ovr' => 66],
	['name' => 'Iran', 				'att' => 65, 'mid' => 66, 'def' => 66, 'ovr' => 66],

	['name' => 'France', 			'att' => 83, 'mid' => 87, 'def' => 84, 'ovr' => 85],
	['name' => 'Australia',			'att' => 70, 'mid' => 73, 'def' => 72, 'ovr' => 72],
	['name' => 'Peru', 				'att' => 76, 'mid' => 74, 'def' => 70, 'ovr' => 73],
	['name' => 'Denmark', 			'att' => 77, 'mid' => 81, 'def' => 77, 'ovr' => 78],

	['name' => 'Argentina',			'att' => 89, 'mid' => 80, 'def' => 79, 'ovr' => 82],
	['name' => 'Iceland', 			'att' => 74, 'mid' => 74, 'def' => 71, 'ovr' => 72],
	['name' => 'Croatia',	 		'att' => 80, 'mid' => 85, 'def' => 81, 'ovr' => 82],
	['name' => 'Nigeria', 			'att' => 77, 'mid' => 76, 'def' => 75, 'ovr' => 76],

	['name' => 'Brazil', 			'att' => 90, 'mid' => 85, 'def' => 88, 'ovr' => 86],
	['name' => 'Switzerland',		'att' => 75, 'mid' => 77, 'def' => 77, 'ovr' => 77],
	['name' => 'Costa Rica', 		'att' => 68, 'mid' => 66, 'def' => 69, 'ovr' => 68],
	['name' => 'Serbia', 			'att' => 79, 'mid' => 81, 'def' => 79, 'ovr' => 79],

	['name' => 'Germany', 			'att' => 84, 'mid' => 86, 'def' => 83, 'ovr' => 85],
	['name' => 'Mexico', 			'att' => 79, 'mid' => 78, 'def' => 75, 'ovr' => 77],
	['name' => 'Sweden', 			'att' => 76, 'mid' => 76, 'def' => 76, 'ovr' => 76],
	['name' => 'Korea Republic',	'att' => 71, 'mid' => 76, 'def' => 72, 'ovr' => 73],

	['name' => 'Belgium', 			'att' => 86, 'mid' => 85, 'def' => 86, 'ovr' => 86],
	['name' => 'Panama', 			'att' => 65, 'mid' => 64, 'def' => 63, 'ovr' => 64],
	['name' => 'Tunisia',	 		'att' => 75, 'mid' => 76, 'def' => 74, 'ovr' => 75],
	['name' => 'England', 			'att' => 85, 'mid' => 81, 'def' => 81, 'ovr' => 82],

	['name' => 'Poland', 			'att' => 80, 'mid' => 75, 'def' => 74, 'ovr' => 76],
	['name' => 'Senegal', 			'att' => 79, 'mid' => 78, 'def' => 78, 'ovr' => 78],
	['name' => 'Colombia', 			'att' => 81, 'mid' => 80, 'def' => 77, 'ovr' => 79],
	['name' => 'Japan', 			'att' => 78, 'mid' => 78, 'def' => 75, 'ovr' => 77],
];

function comments($ballPosition, $ifElse) {

    global $team1, $team2, $comment;

    $comments = [
        '10' => [
            'if' => $comment == false ? '' : $team1->name . " starts the attack<br>",
            'else' => $comment == false ? '' : "Recounter, " . $team2->name . " starts new attack<br>"
        ],
        '-10' => [
            'if' => $comment == false ? '' : $team2->name . " starts the attack<br>",
            'else' => $comment == false ? '' : "Recounter, " . $team1->name . " starts new attack<br>"
        ],
        '9' => [
            'if' => $comment == false ? '' : $team1->name . " passes the ball<br>",
            'else' => $comment == false ? '' : "Recounter, " . $team2->name . " starts new attack<br>"
        ],
        '-9' => [
            'if' => $comment == false ? '' : $team2->name . " passes the ball<br>",
            'else' => $comment == false ? '' : "Recounter, " . $team1->name . " starts new attack<br>"
        ],
        '8' => [
            'if' => $comment == false ? '' : $team1->name . " passes the ball<br>",
            'else' => $comment == false ? '' : "Recounter, " . $team2->name . " starts new attack<br>"
        ],
        '-8' => [
            'if' => $comment == false ? '' : $team2->name . " passes the ball<br>",
            'else' => $comment == false ? '' : "Recounter, " . $team1->name . " starts new attack<br>"
        ],
        '7' => [
            'if' => $comment == false ? '' : $team1->name . " tries a long pass<br>",
            'else' => $comment == false ? '' : "Recounter, " . $team2->name . " starts new attack<br>"
        ],
        '-7' => [
            'if' => $comment == false ? '' : $team2->name . " tries a long pass<br>",
            'else' => $comment == false ? '' : "Recounter, " . $team1->name . " starts new attack<br>"
        ],
        '6' => [
            'if' => $comment == false ? '' : $team1->name . " is dribbling the ball<br>",
            'else' => $comment == false ? '' : "Recounter, " . $team2->name . " starts new attack<br>"
        ],
        '-6' => [
            'if' => $comment == false ? '' : $team2->name . " is dribbling the ball<br>",
            'else' => $comment == false ? '' : "Recounter, " . $team1->name . " starts new attack<br>"
        ],
        '5' => [
            'if' => $comment == false ? '': $team1->name . " is dribbling the ball<br>",
            'else' => $comment == false ? '': "Recounter, " . $team2->name . " starts new attack<br>"
        ],
        '-5' => [
            'if' => $comment == false ? '' : $team2->name . " is dribbling the ball<br>",
            'else' => $comment == false ? '' : "Recounter, " . $team1->name . " starts new attack<br>"
        ],
        '4' => [
            'if' => $comment == false ? '' : $team1->name . " tries to change side<br>",
            'else' => $comment == false ? '' : "Recounter, " . $team2->name . " starts new attack<br>"
        ],
        '-4' => [
            'if' => $comment == false ? '' : $team2->name . " tries to change side<br>",
            'else' => $comment == false ? '' : "Recounter, " . $team1->name . " starts new attack<br>"
        ],
        '3' => [
            'if' => $comment == false ? '' : $team1->name . " has made an excellent pass!<br>",
            'else' => $comment == false ? '' : "Recounter, " . $team2->name . " starts new attack<br>"
        ],
        '-3' => [
            'if' => $comment == false ? '' : $team2->name . " has made an excellent pass!<br>",
            'else' => $comment == false ? '' : "Recounter, " . $team1->name . " starts new attack<br>"
        ],
        '2' => [
            'if' => $comment == false ? '' : "It's a chance, " . $team1->name . " is shooting!!<br>",
            'else' => $comment == false ? '' : $team2->name . " has blocked the ball<br>"
        ],
        '-2' => [
            'if' => $comment == false ? '' : "It's a chance, " . $team2->name . " is shooting!!<br>",
            'else' => $comment == false ? '' : $team1->name . " has blocked the ball<br>"
        ],
        '1' => [
            'if' => $comment == false ? '' : $team1->name . " has scored a GOOOOOOOAAAAAL!!!<br>",
            'else' => $comment == false ? '' : "WOW a great save from " . $team2->name . " goalkeeper<br>"
        ],
        '-1' => [
            'if' => $comment == false ? '' : $team2->name . " has scored a GOOOOOOOAAAAAL!!!<br>",
            'else' => $comment == false ? '' : "WOW a great save from " . $team1->name . " goalkeeper<br>"
        ]
    ];

    echo $comments[$ballPosition][$ifElse];
}
