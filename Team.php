<?php

class Team
{
	public $name;
	public $attack;
	public $midfield;
	public $defense;
	public $overall;
	public $Pts;
	public $W;
	public $D;
	public $L;
	public $GF;
	public $GA;
	public $GD;
	public $PK;

	function __construct(array $strength)
	{
		$this->name = $strength['name'];
		$this->attack = $strength['att'];
		$this->midfield = $strength['mid'];
		$this->defense = $strength['def'];
		$this->overall = $strength['ovr'];
	}
}