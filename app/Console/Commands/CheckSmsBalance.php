<?php

namespace App\Console\Commands;

use App\Services\EmmaSmsService;
use Illuminate\Console\Command;

class CheckSmsBalance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:balance {--detailed : Show detailed response data}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check EMMA SMS Gateway account balance';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Checking EMMA SMS Gateway balance...");
        
        try {
            $emmaService = new EmmaSmsService();
            $balanceResult = $emmaService->getBalance();

            if ($balanceResult['success']) {
                $this->info("✅ Balance retrieved successfully!");
                
                if (isset($balanceResult['balance'])) {
                    $this->info("💰 Balance: " . $balanceResult['balance']);
                }
                
                if (isset($balanceResult['currency'])) {
                    $this->info("💱 Currency: " . $balanceResult['currency']);
                }
                
                if (isset($balanceResult['message'])) {
                    $this->info("📝 Message: " . $balanceResult['message']);
                }
                
                if ($this->option('detailed') && isset($balanceResult['data'])) {
                    $this->info("\n📊 Detailed Response:");
                    $this->line(json_encode($balanceResult['data'], JSON_PRETTY_PRINT));
                }
            } else {
                $this->error("❌ Failed to retrieve balance");
                $this->error("Error: " . $balanceResult['message']);
                
                if (isset($balanceResult['note'])) {
                    $this->warn("Note: " . $balanceResult['note']);
                }
                
                if (isset($balanceResult['error'])) {
                    $this->error("Details: " . $balanceResult['error']);
                }
            }
        } catch (\Exception $e) {
            $this->error("❌ Exception occurred: " . $e->getMessage());
            $this->error("Stack trace: " . $e->getTraceAsString());
        }

        return 0;
    }
}
