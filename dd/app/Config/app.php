<?php

namespace App\Config;
// set default timezone
date_default_timezone_set(env($_ENV["TIMEZONE"], 'UTC'));
