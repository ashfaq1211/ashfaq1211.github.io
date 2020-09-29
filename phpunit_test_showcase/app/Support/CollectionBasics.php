<?php

$users = new Collection([
	'one', 'two', 'three'
]);

echo $users->count(); // 3

foreach ($users as $user)
{
	echo $user->getEmail();
}