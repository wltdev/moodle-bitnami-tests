<?php
// File: moodle/local/getuserinfoservice/externallib.php

require_once($CFG->libdir . '/externallib.php');

class get_user_info extends external_api
{
    /**
     * Define parameters for the web service function.
     */
    public static function fetch_user_data_parameters()
    {
        return new external_function_parameters(
            array(
                // No need for a token parameter here
                // Only specify parameters needed for the function
            )
        );
    }

    /**
     * Execute the web service function.
     */
    public static function fetch_user_data()
    {
        global $DB, $USER, $CFG;

        // Validate parameters.
        // Ensure the function is called with valid authentication.
        $context = context_system::instance();
        self::validate_context($context);

        // Get the user ID from the global user object (authenticated user)
        $userid = $USER->id;

        // Fetch user information.
        if (!$user = $DB->get_record('user', array('id' => $userid))) {
            throw new invalid_parameter_exception('Invalid user ID');
        }

        // Fetch user information.
        if (!$user = $DB->get_record('user', array('id' => $userid))) {
            throw new invalid_parameter_exception('Invalid user ID');
        }

        // Get user context ID.
        $context = context_user::instance($user->id);
        $contextid = $context->id;

        // Generate profile picture URL.
        $fs = get_file_storage();
        $file = $fs->get_file_by_id($user->picture); // This method might not be accurate for retrieving the profile picture.

        $profile_picture_url = $file ? $CFG->wwwroot . '/pluginfile.php/' . $contextid . '/user/icon' : '';

        // Prepare the result.
        $result = array(
            'userid'           => $user->id,
            'lang'             => $user->lang,
            'username'         => $user->username,
            'firstname'        => $user->firstname,
            'lastname'         => $user->lastname,
            'email'            => $user->email,
            'fullname'         => fullname($user),
            'contextid'        => $contextid,
            'userpictureurl'   => $profile_picture_url, // Profile picture URL
        );

        return $result;
    }

    /**
     * Return description of result value.
     */
    public static function fetch_user_data_returns()
    {
        return new external_single_structure(
            array(
                'userid'           => new external_value(PARAM_INT, 'User ID'),
                'lang'             => new external_value(PARAM_TEXT, 'Language'),
                'username'         => new external_value(PARAM_TEXT, 'Username'),
                'firstname'        => new external_value(PARAM_TEXT, 'First name'),
                'lastname'         => new external_value(PARAM_TEXT, 'Last name'),
                'email'            => new external_value(PARAM_TEXT, 'Email address'),
                'fullname'         => new external_value(PARAM_TEXT, 'Full name'),
                'contextid'        => new external_value(PARAM_INT, 'Context ID'),
                'userpictureurl'   => new external_value(PARAM_URL, 'Profile picture URL')
            )
        );
    }
}
