<?php
// This file is part of Moodle - http://moodle.org/
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.

// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Version details
 *
 * @package    local_quizservice
 * @category   local
 * @copyright  2024 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$plugin->version   = 2024062300;          // The current plugin version (Date: YYYYMMDDXX).
$plugin->requires  = 2022041900;          // Requires this Moodle version.
$plugin->component = 'local_quizservice'; // Full name of the plugin (used for diagnostics).
$plugin->maturity  = MATURITY_STABLE;     // This is considered as stable version.
$plugin->release   = 'v1.0';              // This is our first release.
$plugin->cron      = 0;                   // Period for cron to check this plugin (secs).
