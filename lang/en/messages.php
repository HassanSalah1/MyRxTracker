<?php

return [
    'register_success' => 'Account registered successfully',
    'login_success' => 'Logged in successfully',
    'phone_or_password_incorrect' => 'The mobile number or password is incorrect',
    'account_not_found' => 'Account does not exist',
    'code_sent_to_email' => 'The code has been sent to the Mobile number',
    'incorrect_code' => 'The code is incorrect',
    'correct_code_enter_new_password' => 'The code is correct, please enter the new password',
    'email_not_found' => 'The email does not exist',
    'password_updated_successfully' => 'Password updated successfully',
    'account_info_updated_successfully' => 'Account information updated successfully',
    'user_not_found' => 'User does not exist',
    'incorrect_password' => 'The password is incorrect',
    'account_deleted_successfully' => 'Account deleted successfully',
    'logged_out_successfully' => 'Logged out successfully',
    'starter_pack_success' => 'Starter Pack Request created successfully',
    'on_track_pack_success' => 'On Track Request  created successfully',
    'redeeming_pack_success' => 'Redeeming Request created successfully',
    'request_redeeming_pack_success' => 'Request Redeeming pack created successfully',
    'no_starter_pack' => 'You must have starter pack to continue',
    'unused_message' => 'You must have at least 3 unused On Track applications to redeem.',
    'already_attending' => 'Already attending',
    'attending' => 'You are now attending this event',
    'photo_added_successfully' => 'Photo stored successfully',
    'photo_deleted_successfully' => 'Photo deleted successfully',
    'login_first' => 'You must login first',
    'no_photo_found' => 'No photo found',
    'no_event_found' => 'No event found',
    'no_starter_pack_found' => 'No starter pack found',
    'no_on_track_pack_found' => 'No on track pack found',
    'no_redeeming_pack_found' => 'No redeeming pack found',
    'no_request_redeeming_pack_found' => 'No request redeeming pack found',
    'no_attending_found' => 'No attending found',
    
    // OTP System Messages
    'otp_sent_successfully' => 'Verification code sent successfully',
    'otp_verified_successfully' => 'Verification code verified successfully',
    'otp_expired' => 'Verification code has expired',
    'otp_invalid' => 'Invalid verification code',
    'otp_too_many_attempts' => 'Too many failed attempts. Please try again later',
    'otp_rate_limited' => 'Please wait before requesting another code',
    'mobile_verified_successfully' => 'Mobile number verified successfully',
    'mobile_already_registered' => 'This mobile number is already registered with another account',
    'verification_code_resent' => 'Verification code resent successfully',
    
    // Additional OTP Messages
    'otp_send_failed' => 'Failed to send verification code. Please try again',
    'otp_generation_error' => 'An error occurred while generating the verification code',
    'otp_account_locked' => 'Account is temporarily locked due to too many failed attempts',
    'otp_not_found_or_expired' => 'No verification code found or code has expired',
    'otp_account_locked_temporarily' => 'Too many failed attempts. Account locked temporarily',
    'otp_verification_error' => 'An error occurred while verifying the code',
    
    // SMS Gateway Messages
    'sms_gateway_disabled' => 'SMS Gateway disabled (development mode)',
    'sms_gateway_invalid_response' => 'Invalid response format from SMS Gateway',
    'sms_gateway_auth_failed' => 'Authentication failed with SMS Gateway',
    'sms_gateway_auth_error' => 'Authentication error',
    'sms_gateway_error' => 'SMS Gateway error: :reason',
    'sms_send_failed' => 'Failed to send SMS',
    'sms_service_error' => 'SMS service error',
    'sms_delivery_status_not_supported' => 'Delivery status checking not supported by this gateway',
    'sms_balance_not_supported' => 'Balance checking not supported or endpoints not accessible',
    'contact_sms_gateway_support' => 'Contact EMMA SMS Gateway support for balance checking capabilities',
    'sms_balance_check_error' => 'Error checking balance',
    
    // SMS Content
    'otp_sms_content' => 'Your verification code is: :otp. Valid for 10 minutes. Do not share this code with anyone.',
    
    // General Messages
    'unknown_error' => 'Unknown error',
    'sms_balance_retrieved' => 'Balance retrieved successfully',
    'sms_balance_check_failed' => 'Failed to check SMS balance',

];
