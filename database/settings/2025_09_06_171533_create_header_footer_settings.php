<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('header_footer.nav_home_en', 'Home');
        $this->migrator->add('header_footer.nav_mechanism_of_action_en', 'Mechanism of Action');
        $this->migrator->add('header_footer.nav_efficacy_profile_en', 'Efficacy Profile');
        $this->migrator->add('header_footer.nav_efficacy_profile_sub_en', 'Efficacy Profile');
        $this->migrator->add('header_footer.nav_efficacy_f_vasi_en', 'Efficacy F-VASI');
        $this->migrator->add('header_footer.nav_efficacy_t_vasi_en', 'Efficacy T-VASI');
        $this->migrator->add('header_footer.nav_ruxolitinib_reports_en', 'Ruxolitinib Cream Case Reports');
        $this->migrator->add('header_footer.nav_safety_profile_en', 'Safety Profile');
        $this->migrator->add('header_footer.nav_dosing_en', 'Dosing');
        $this->migrator->add('header_footer.nav_setting_expectations_en', 'Setting Expectations');
        $this->migrator->add('header_footer.nav_download_en', 'Download');
        $this->migrator->add('header_footer.nav_patient_support_en', 'Patient Support');

        $this->migrator->add('header_footer.nav_home_zh', '首页');
        $this->migrator->add('header_footer.nav_mechanism_of_action_zh', '作用机制');
        $this->migrator->add('header_footer.nav_efficacy_profile_zh', '疗效概况');
        $this->migrator->add('header_footer.nav_efficacy_profile_sub_zh', '疗效概况');
        $this->migrator->add('header_footer.nav_efficacy_f_vasi_zh', '疗效 F-VASI');
        $this->migrator->add('header_footer.nav_efficacy_t_vasi_zh', '疗效 T-VASI');
        $this->migrator->add('header_footer.nav_ruxolitinib_reports_zh', '鲁索利替尼乳膏病例报告');
        $this->migrator->add('header_footer.nav_safety_profile_zh', '安全性概况');
        $this->migrator->add('header_footer.nav_dosing_zh', '给药');
        $this->migrator->add('header_footer.nav_setting_expectations_zh', '设定期望');
        $this->migrator->add('header_footer.nav_download_zh', '下载');
        $this->migrator->add('header_footer.nav_patient_support_zh', '患者支持');

        $this->migrator->add('header_footer.footer_title_en', 'Get in Touch With Us.');
        $this->migrator->add('header_footer.footer_description_en', 'At Rxilient, we believe in empowering patients and healthcare providers with the tools and information needed to achieve the best outcomes. Explore our collection of downloadable guides, tips, and educational materials to stay informed and confident throughout your treatment journey.');
        $this->migrator->add('header_footer.footer_contact_prompt_en', 'Leave your contact details and we will get in touch with you as soon as we can.');
        $this->migrator->add('header_footer.footer_form_name_placeholder_en', 'Full Name');
        $this->migrator->add('header_footer.footer_form_email_placeholder_en', 'Email Address');
        $this->migrator->add('header_footer.footer_form_phone_placeholder_en', 'Phone Number');
        $this->migrator->add('header_footer.footer_form_message_placeholder_en', 'Type your message here ...');
        $this->migrator->add('header_footer.footer_form_submit_button_en', 'SEND MESSAGE');
        $this->migrator->add('header_footer.footer_terms_of_use_en', 'TERMS of use');
        $this->migrator->add('header_footer.footer_privacy_policy_en', 'Privacy policy');
        $this->migrator->add('header_footer.footer_company_name_en', 'Rxilient Medical (Hong Kong) Limited');
        $this->migrator->add('header_footer.footer_address_en', 'Unit 2106, 21st Floor, Island Place Tower, No.510 King\'s Road, North Point, Hong Kong');
        $this->migrator->add('header_footer.footer_phone_en', 'Tel: +852 2369 3889');
        $this->migrator->add('header_footer.footer_disclaimer_en', 'For healthcare professionals practising in Hong Kong only. LUM/HKG/DOC-101/ 2025/rev.01');
        $this->migrator->add('header_footer.footer_qr_text_en', 'Scan to download Lumirix® Prescribing Information');
        $this->migrator->add('header_footer.footer_copyright_en', 'Copyrights © 2025 All Rights Reserved');

        $this->migrator->add('header_footer.footer_title_zh', '与我们联系。');
        $this->migrator->add('header_footer.footer_description_zh', '在Rxilient，我们相信通过为患者和医疗保健提供者提供实现最佳结果所需的工具和信息来增强他们的能力。探索我们可下载的指南、提示和教育材料集合，在您的治疗过程中保持知情和自信。');
        $this->migrator->add('header_footer.footer_contact_prompt_zh', '留下您的联系方式，我们将尽快与您联系。');
        $this->migrator->add('header_footer.footer_form_name_placeholder_zh', '姓名');
        $this->migrator->add('header_footer.footer_form_email_placeholder_zh', '邮箱地址');
        $this->migrator->add('header_footer.footer_form_phone_placeholder_zh', '电话号码');
        $this->migrator->add('header_footer.footer_form_message_placeholder_zh', '在此输入您的消息...');
        $this->migrator->add('header_footer.footer_form_submit_button_zh', '发送消息');
        $this->migrator->add('header_footer.footer_terms_of_use_zh', '使用条款');
        $this->migrator->add('header_footer.footer_privacy_policy_zh', '隐私政策');
        $this->migrator->add('header_footer.footer_company_name_zh', 'Rxilient Medical (Hong Kong) Limited');
        $this->migrator->add('header_footer.footer_address_zh', '香港北角英皇道510号岛海大厦21楼2106室');
        $this->migrator->add('header_footer.footer_phone_zh', '电话: +852 2369 3889');
        $this->migrator->add('header_footer.footer_disclaimer_zh', '仅适用于在香港执业的医疗保健专业人员。LUM/HKG/DOC-101/ 2025/rev.01');
        $this->migrator->add('header_footer.footer_qr_text_zh', '扫描下载 Lumirix® 处方信息');
        $this->migrator->add('header_footer.footer_copyright_zh', '版权所有 © 2025 保留所有权利');
    }
};
