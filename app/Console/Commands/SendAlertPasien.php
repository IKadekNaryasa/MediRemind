<?php

namespace App\Console\Commands;

use Exception;
use App\Models\Patient;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendAlertPasien extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pasien:alert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check and Send Alert to Patient!';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $timeNow = now()->format('H:i');
        $patients = Patient::where('status', 'active')->where('jam', $timeNow)->get();
        $successCount = 0;
        $failedCount = 0;


        $bar = $this->output->createProgressBar($patients->count());
        $this->info('Mengecek Jadwal Pasien...');
        $bar->start();
        foreach ($patients as $pasien) {
            try {
                $send = $this->sendAlert($pasien);
                if ($send) {
                    $successCount++;
                } else {
                    $failedCount++;
                    $this->newLine();
                    $this->error("Gagal mengirim notifikasi ke : {$pasien->namaPasien}");
                }
            } catch (Exception $e) {
                $failedCount++;
                $this->newLine();
                $this->error("Gagal mengirim notifikasi ke : {$pasien->namaPasien}");
            }
            $bar->advance();
        }
        $bar->finish();
        $this->newLine(2);

        $this->info('-- Info --');
        $this->info("Total Pasien Dengan Jadwal Minum Obat Jam {$timeNow}  : {$patients->count()}");
        $this->info("Berhasil terkirim : {$successCount} ");
        $this->error("Gagal terkirim : {$failedCount}");

        return 0;
    }

    private function sendAlert(Patient $pasien): bool
    {
        if (!$pasien | !$pasien->wa) {
            return false;
        }
        $wa = $pasien->wa;
        $message = "Pengingat Minum Obat! \n\n";
        $message .= "Halo, bapak/ibu {$pasien->namaPasien} \n";
        $message .= "Ingat minum obat hari ini ya di jam {$pasien->jam} \n";
        $message .= "Semoga Cepat Pulih! \n\n";
        $message .= "[MediRemind]";

        try {
            $response = Http::withHeaders([
                'Authorization' => env('AUTH_FONTE'),
            ])->post('https://api.fonnte.com/send', [
                'target' => $wa,
                'message' => $message,
                'countryCode' => '62'
            ]);

            if ($response->successful()) {
                $result = $response->json();
                return $result['status'] ?? false;
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }
}
