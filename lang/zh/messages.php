<?php

return [
    'register_success' => '账户注册成功',
    'login_success' => '登录成功',
    'phone_or_password_incorrect' => '电话号码或密码不正确',
    'account_not_found' => '账户不存在',
    'code_sent_to_email' => '验证码已发送到电话号码',
    'incorrect_code' => '验证码不正确',
    'correct_code_enter_new_password' => '验证码正确，请输入新密码',
    'email_not_found' => '电子邮件不存在',
    'password_updated_successfully' => '密码更新成功',
    'account_info_updated_successfully' => '账户信息更新成功',
    'user_not_found' => '用户不存在',
    'incorrect_password' => '密码不正确',
    'account_deleted_successfully' => '账户删除成功',
    'logged_out_successfully' => '退出登录成功',
    'starter_pack_success' => '启动包请求创建成功',
    'on_track_pack_success' => '跟踪请求创建成功',
    'redeeming_pack_success' => '兑换请求创建成功',
    'already_attending' => '已经参加',
    'attending' => '你现在正在参加这个活动',
    'login_first' => '请先登录',
    
    // OTP System Messages
    'otp_sent_successfully' => '验证码发送成功',
    'otp_verified_successfully' => '验证码验证成功',
    'otp_expired' => '验证码已过期',
    'otp_invalid' => '验证码无效',
    'otp_too_many_attempts' => '尝试次数过多，请稍后再试',
    'otp_rate_limited' => '请稍等再请求另一个代码',
    'mobile_verified_successfully' => '手机号码验证成功',
    'mobile_already_registered' => '此手机号码已注册另一个账户',
    'verification_code_resent' => '验证码重新发送成功',
    
    // Additional OTP Messages
    'otp_send_failed' => '验证码发送失败，请重试',
    'otp_generation_error' => '生成验证码时发生错误',
    'otp_account_locked' => '由于尝试次数过多，账户暂时被锁定',
    'otp_not_found_or_expired' => '未找到验证码或验证码已过期',
    'otp_account_locked_temporarily' => '尝试次数过多，账户暂时被锁定',
    'otp_verification_error' => '验证代码时发生错误',
    
    // SMS Gateway Messages
    'sms_gateway_disabled' => '短信网关已禁用（开发模式）',
    'sms_gateway_invalid_response' => '短信网关响应格式无效',
    'sms_gateway_auth_failed' => '短信网关认证失败',
    'sms_gateway_auth_error' => '认证错误',
    'sms_gateway_error' => '短信网关错误：:reason',
    'sms_send_failed' => '短信发送失败',
    'sms_service_error' => '短信服务错误',
    'sms_delivery_status_not_supported' => '此网关不支持投递状态检查',
    'sms_balance_not_supported' => '不支持余额检查或端点无法访问',
    'contact_sms_gateway_support' => '联系EMMA短信网关支持以获取余额检查功能',
    'sms_balance_check_error' => '检查余额时出错',
    
    // SMS Content
    'otp_sms_content' => '您的验证码是：:otp。有效期为10分钟。请勿与他人分享此代码。',
    
    // General Messages
    'unknown_error' => '未知错误',
    'sms_balance_retrieved' => '余额获取成功',
    'sms_balance_check_failed' => '检查短信余额失败',

    // Humanized time/messages
    'time_in_seconds' => ':seconds 秒',
    'time_in_minutes' => ':minutes 分钟',
    'retry_after_message' => ':base 请在 :time 后重试。',
    'locked_until_message' => ':base 请在 :time 后重试。',
];
