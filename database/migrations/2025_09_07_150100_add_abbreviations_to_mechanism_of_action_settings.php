<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $settings = [
            ['group' => 'mechanism_of_action', 'name' => 'abbreviations_en', 'value' => json_encode('')],
            ['group' => 'mechanism_of_action', 'name' => 'abbreviations_zh', 'value' => json_encode('')],
        ];

        foreach ($settings as $setting) {
            $exists = DB::table('settings')
                ->where('group', $setting['group'])
                ->where('name', $setting['name'])
                ->exists();

            if (! $exists) {
                DB::table('settings')->insert($setting);
            }
        }
    }

    public function down(): void
    {
        DB::table('settings')
            ->where('group', 'mechanism_of_action')
            ->whereIn('name', ['abbreviations_en', 'abbreviations_zh'])
            ->delete();
    }
};


