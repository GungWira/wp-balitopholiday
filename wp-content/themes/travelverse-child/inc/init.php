<?php
/**
 * Child theme initialization
 */

// Load custom block patterns
require_once __DIR__ . '/patterns/register-patterns.php';

require_once __DIR__ . '/points/schema.php';
require_once __DIR__ . '/points/point-helper.php';
require_once __DIR__ . '/points/point-query.php';
require_once __DIR__ . '/points/hooks.php';

require_once __DIR__ . '/referral/referral-helper.php';
require_once __DIR__ . '/referral/referral-hooks.php';