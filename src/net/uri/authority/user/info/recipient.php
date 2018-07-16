<?php namespace norsys\score\net\authority\user\info;

use norsys\score\net\authority\user;

interface recipient
{
	function userInfoInUriIs(user\info $userInfo) :void;
}
