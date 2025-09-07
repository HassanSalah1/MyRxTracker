<?php

namespace App\Filament\Pages;

use App\Settings\HeaderFooterSettings;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class HeaderFooterSettingsPage extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'Website Management';
    protected static ?string $title = 'Header & Footer Settings';
    protected static ?string $navigationLabel = 'Header & Footer';

    protected static string $settings = HeaderFooterSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Navigation Menu - English')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('nav_home_en')
                                ->label('Home')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('nav_mechanism_of_action_en')
                                ->label('Mechanism of Action')
                                ->required()
                                ->maxLength(255),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('nav_efficacy_profile_en')
                                ->label('Efficacy Profile')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('nav_efficacy_profile_sub_en')
                                ->label('Efficacy Profile (Sub)')
                                ->required()
                                ->maxLength(255),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('nav_efficacy_f_vasi_en')
                                ->label('Efficacy F-VASI')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('nav_efficacy_t_vasi_en')
                                ->label('Efficacy T-VASI')
                                ->required()
                                ->maxLength(255),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('nav_ruxolitinib_reports_en')
                                ->label('Ruxolitinib Cream Case Reports')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('nav_safety_profile_en')
                                ->label('Safety Profile')
                                ->required()
                                ->maxLength(255),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('nav_dosing_en')
                                ->label('Dosing')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('nav_setting_expectations_en')
                                ->label('Setting Expectations')
                                ->required()
                                ->maxLength(255),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('nav_download_en')
                                ->label('Download')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('nav_patient_support_en')
                                ->label('Patient Support')
                                ->required()
                                ->maxLength(255),
                        ]),
                    ]),

                Section::make('Navigation Menu - Chinese')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('nav_home_zh')
                                ->label('首页')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('nav_mechanism_of_action_zh')
                                ->label('作用机制')
                                ->required()
                                ->maxLength(255),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('nav_efficacy_profile_zh')
                                ->label('疗效概况')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('nav_efficacy_profile_sub_zh')
                                ->label('疗效概况 (子)')
                                ->required()
                                ->maxLength(255),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('nav_efficacy_f_vasi_zh')
                                ->label('疗效 F-VASI')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('nav_efficacy_t_vasi_zh')
                                ->label('疗效 T-VASI')
                                ->required()
                                ->maxLength(255),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('nav_ruxolitinib_reports_zh')
                                ->label('鲁索利替尼乳膏病例报告')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('nav_safety_profile_zh')
                                ->label('安全性概况')
                                ->required()
                                ->maxLength(255),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('nav_dosing_zh')
                                ->label('给药')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('nav_setting_expectations_zh')
                                ->label('设定期望')
                                ->required()
                                ->maxLength(255),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('nav_download_zh')
                                ->label('下载')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('nav_patient_support_zh')
                                ->label('患者支持')
                                ->required()
                                ->maxLength(255),
                        ]),
                    ]),

                Section::make('Footer Content - English')
                    ->schema([
                        TextInput::make('footer_title_en')
                            ->label('Footer Title')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('footer_description_en')
                            ->label('Footer Description')
                            ->required()
                            ->rows(3),
                        TextInput::make('footer_contact_prompt_en')
                            ->label('Contact Prompt')
                            ->required()
                            ->maxLength(255),
                        Grid::make(2)->schema([
                            TextInput::make('footer_form_name_placeholder_en')
                                ->label('Name Placeholder')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('footer_form_email_placeholder_en')
                                ->label('Email Placeholder')
                                ->required()
                                ->maxLength(255),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('footer_form_phone_placeholder_en')
                                ->label('Phone Placeholder')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('footer_form_message_placeholder_en')
                                ->label('Message Placeholder')
                                ->required()
                                ->maxLength(255),
                        ]),
                        TextInput::make('footer_form_submit_button_en')
                            ->label('Submit Button Text')
                            ->required()
                            ->maxLength(255),
                        Grid::make(2)->schema([
                            TextInput::make('footer_terms_of_use_en')
                                ->label('Terms of Use')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('footer_privacy_policy_en')
                                ->label('Privacy Policy')
                                ->required()
                                ->maxLength(255),
                        ]),
                        TextInput::make('footer_company_name_en')
                            ->label('Company Name')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('footer_address_en')
                            ->label('Address')
                            ->required()
                            ->rows(2),
                        TextInput::make('footer_phone_en')
                            ->label('Phone')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('footer_disclaimer_en')
                            ->label('Disclaimer')
                            ->required()
                            ->rows(2),
                        TextInput::make('footer_qr_text_en')
                            ->label('QR Code Text')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('footer_copyright_en')
                            ->label('Copyright')
                            ->required()
                            ->maxLength(255),
                    ]),

                Section::make('Footer Content - Chinese')
                    ->schema([
                        TextInput::make('footer_title_zh')
                            ->label('页脚标题')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('footer_description_zh')
                            ->label('页脚描述')
                            ->required()
                            ->rows(3),
                        TextInput::make('footer_contact_prompt_zh')
                            ->label('联系提示')
                            ->required()
                            ->maxLength(255),
                        Grid::make(2)->schema([
                            TextInput::make('footer_form_name_placeholder_zh')
                                ->label('姓名占位符')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('footer_form_email_placeholder_zh')
                                ->label('邮箱占位符')
                                ->required()
                                ->maxLength(255),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('footer_form_phone_placeholder_zh')
                                ->label('电话占位符')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('footer_form_message_placeholder_zh')
                                ->label('消息占位符')
                                ->required()
                                ->maxLength(255),
                        ]),
                        TextInput::make('footer_form_submit_button_zh')
                            ->label('提交按钮文本')
                            ->required()
                            ->maxLength(255),
                        Grid::make(2)->schema([
                            TextInput::make('footer_terms_of_use_zh')
                                ->label('使用条款')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('footer_privacy_policy_zh')
                                ->label('隐私政策')
                                ->required()
                                ->maxLength(255),
                        ]),
                        TextInput::make('footer_company_name_zh')
                            ->label('公司名称')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('footer_address_zh')
                            ->label('地址')
                            ->required()
                            ->rows(2),
                        TextInput::make('footer_phone_zh')
                            ->label('电话')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('footer_disclaimer_zh')
                            ->label('免责声明')
                            ->required()
                            ->rows(2),
                        TextInput::make('footer_qr_text_zh')
                            ->label('二维码文本')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('footer_copyright_zh')
                            ->label('版权')
                            ->required()
                            ->maxLength(255),
                    ]),
            ]);
    }
}
