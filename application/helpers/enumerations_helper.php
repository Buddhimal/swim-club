<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserRole{
	const Admin = 1;
	const Parent = 2;
	const Coach = 3;
	const Swimmer = 4;
}

class VerifyStatus
{
	const Pending = 0;
	const Verified = 1;
	const Rejected = 2;
}

class ApplicationStatus
{
	const Pending = 0;
	const Verified = 1;
	const Rejected = 2;
}

