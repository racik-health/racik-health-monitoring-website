<?php

namespace Database\Seeders;

use App\Models\ConsumptionHistory;
use App\Models\Dispenser;
use App\Models\DispenserControlLog;
use App\Models\HealthInput;
use App\Models\HerbalMedicine;
use App\Models\RecommendationResult;
use App\Models\User;
use Illuminate\Database\Seeder;

class ExampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ==================
        // Data Users (3 user)
        // ==================
        $user1 = User::create([
            'name' => 'Asep Bensin',
            'email' => 'asep@gmail.com',
            'password' => bcrypt('12345678'),
            'phone_number' => '08123456789',
            'gender' => 'male',
        ]);

        $user2 = User::create([
            'name' => 'Sigit Rendang',
            'email' => 'sigit@gmail.com',
            'password' => bcrypt('12345678'),
            'phone_number' => '08112223333',
            'gender' => 'female',
        ]);

        $user3 = User::create([
            'name' => 'Nina Bobo',
            'email' => 'nina@gmail.com',
            'password' => bcrypt('12345678'),
            'phone_number' => '08223334444',
            'gender' => 'male',
        ]);

        $user4 = User::create([
            'name' => 'Salman Abdurrahman',
            'email' => 'salmanabdurrahman12345@gmail.com',
            'password' => bcrypt('12345678'),
            'phone_number' => '081282159360',
            'gender' => 'male',
        ]);

        $user1->assignRole('patient');
        $user2->assignRole('patient');
        $user3->assignRole('patient');
        $user4->assignRole('patient');

        // ==================
        // Data Dispensers (4 data dispenser)
        // ==================
        $dispenser1 = Dispenser::create([
            'name' => 'Dispenser A',
            'status' => 'active',
            'last_online' => now(),
        ]);

        $dispenser2 = Dispenser::create([
            'name' => 'Dispenser B',
            'status' => 'maintenance',
            'last_online' => now()->subMinutes(15),
        ]);

        $dispenser3 = Dispenser::create([
            'name' => 'Dispenser C',
            'status' => 'inactive',
            'last_online' => now()->subHours(1),
        ]);

        $dispenser4 = Dispenser::create([
            'name' => 'Dispenser D',
            'status' => 'active',
            'last_online' => now()->subMinutes(5),
        ]);

        // ==================
        // Data Herbal Medicines (4 jenis obat herbal)
        // ==================
        $medicine1 = HerbalMedicine::create([
            'name' => 'Kunyit Asam',
            'description' => 'Minuman herbal tradisional yang bermanfaat untuk meredakan nyeri haid dan detoksifikasi tubuh.',
            'ingredients' => 'Kunyit, asam jawa, gula merah',
            'stock' => 100,
        ]);

        $medicine2 = HerbalMedicine::create([
            'name' => 'Beras Kencur',
            'description' => 'Minuman herbal yang menyegarkan dan membantu mengatasi pegal linu.',
            'ingredients' => 'Beras, kencur, jahe, gula',
            'stock' => 80,
        ]);

        $medicine3 = HerbalMedicine::create([
            'name' => 'Temulawak',
            'description' => 'Minuman herbal untuk meningkatkan nafsu makan dan menjaga fungsi hati.',
            'ingredients' => 'Temulawak, jahe, gula aren',
            'stock' => 70,
        ]);

        $medicine4 = HerbalMedicine::create([
            'name' => 'Cabe Puyang',
            'description' => 'Minuman herbal untuk mengatasi pegal-pegal dan kelelahan.',
            'ingredients' => 'Cabe puyang, jahe, daun pandan, gula',
            'stock' => 60,
        ]);

        // ==================
        // Data Consumption Histories
        // Masing-masing user memiliki 2 data konsumsi
        // ==================
        // Untuk $user1
        ConsumptionHistory::create([
            'user_id' => $user1->id,
            'herbal_medicine_id' => $medicine1->id,
            'quantity' => 2,
            'note' => 'Diminum sebelum makan siang',
            'consumed_at' => now()->subDay(),
        ]);
        ConsumptionHistory::create([
            'user_id' => $user1->id,
            'herbal_medicine_id' => $medicine2->id,
            'quantity' => 1,
            'note' => 'Diminum setelah olahraga',
            'consumed_at' => now()->subHours(6),
        ]);

        // Untuk $user2
        ConsumptionHistory::create([
            'user_id' => $user2->id,
            'herbal_medicine_id' => $medicine2->id,
            'quantity' => 3,
            'note' => 'Diminum pagi hari',
            'consumed_at' => now()->subDays(2),
        ]);
        ConsumptionHistory::create([
            'user_id' => $user2->id,
            'herbal_medicine_id' => $medicine3->id,
            'quantity' => 2,
            'note' => 'Diminum saat istirahat siang',
            'consumed_at' => now()->subHours(10),
        ]);

        // Untuk $user3
        ConsumptionHistory::create([
            'user_id' => $user3->id,
            'herbal_medicine_id' => $medicine3->id,
            'quantity' => 1,
            'note' => 'Diminum karena rekomendasi dokter',
            'consumed_at' => now()->subDays(1)->subHours(2),
        ]);
        ConsumptionHistory::create([
            'user_id' => $user3->id,
            'herbal_medicine_id' => $medicine4->id,
            'quantity' => 2,
            'note' => 'Diminum pada sore hari',
            'consumed_at' => now()->subHours(3),
        ]);

        // ==================
        // Data Health Inputs
        // Masing-masing user memiliki 2 data input kesehatan
        // ==================
        // Untuk $user1
        $healthInput1 = HealthInput::create([
            'user_id' => $user1->id,
            'symptoms' => 'Demam ringan, batuk kering',
        ]);
        $healthInput2 = HealthInput::create([
            'user_id' => $user1->id,
            'symptoms' => 'Pusing, lemas',
        ]);

        // Untuk $user2
        $healthInput3 = HealthInput::create([
            'user_id' => $user2->id,
            'symptoms' => 'Sakit kepala, nyeri otot',
        ]);
        $healthInput4 = HealthInput::create([
            'user_id' => $user2->id,
            'symptoms' => 'Flu dan pilek',
        ]);

        // Untuk $user3
        $healthInput5 = HealthInput::create([
            'user_id' => $user3->id,
            'symptoms' => 'Sakit perut, mual',
        ]);
        $healthInput6 = HealthInput::create([
            'user_id' => $user3->id,
            'symptoms' => 'Lelah, kurang energi',
        ]);

        // ==================
        // Data Recommendation Results
        // Setiap input kesehatan akan menghasilkan satu rekomendasi
        // ==================
        // Rekomendasi untuk $user1
        RecommendationResult::create([
            'user_id' => $user1->id,
            'health_input_id' => $healthInput1->id,
            'herbal_medicine_id' => $medicine1->id,
            'reason' => 'Cocok untuk meredakan demam dan batuk kering',
            'confidence_score' => 85.50,
        ]);
        RecommendationResult::create([
            'user_id' => $user1->id,
            'health_input_id' => $healthInput2->id,
            'herbal_medicine_id' => $medicine2->id,
            'reason' => 'Membantu mengurangi pusing dan rasa lemas',
            'confidence_score' => 80.00,
        ]);

        // Rekomendasi untuk $user2
        RecommendationResult::create([
            'user_id' => $user2->id,
            'health_input_id' => $healthInput3->id,
            'herbal_medicine_id' => $medicine3->id,
            'reason' => 'Efektif meredakan nyeri otot dan sakit kepala',
            'confidence_score' => 88.00,
        ]);
        RecommendationResult::create([
            'user_id' => $user2->id,
            'health_input_id' => $healthInput4->id,
            'herbal_medicine_id' => $medicine2->id,
            'reason' => 'Cocok untuk mengatasi flu dan gejala pilek',
            'confidence_score' => 90.00,
        ]);

        // Rekomendasi untuk $user3
        RecommendationResult::create([
            'user_id' => $user3->id,
            'health_input_id' => $healthInput5->id,
            'herbal_medicine_id' => $medicine4->id,
            'reason' => 'Rekomendasi untuk meredakan sakit perut dan mual',
            'confidence_score' => 92.00,
        ]);
        RecommendationResult::create([
            'user_id' => $user3->id,
            'health_input_id' => $healthInput6->id,
            'herbal_medicine_id' => $medicine3->id,
            'reason' => 'Meningkatkan energi dan membantu pemulihan badan',
            'confidence_score' => 87.50,
        ]);

        // ==================
        // Data Dispenser Control Logs
        // Setiap user memiliki minimal 2 log kontrol dispenser
        // ==================
        // Log untuk $user1
        DispenserControlLog::create([
            'user_id' => $user1->id,
            'dispenser_id' => $dispenser1->id,
            'status' => 'completed',
            'command' => 'OPEN_DOOR',
            'response' => 'OK',
            'ip_address' => '192.168.1.10',
            'executed_at' => now()->subMinutes(30),
        ]);
        DispenserControlLog::create([
            'user_id' => $user1->id,
            'dispenser_id' => $dispenser2->id,
            'status' => 'failed',
            'command' => 'CLOSE_DOOR',
            'response' => 'ERROR: Device busy',
            'ip_address' => '192.168.1.11',
            'executed_at' => now()->subMinutes(45),
        ]);

        // Log untuk $user2
        DispenserControlLog::create([
            'user_id' => $user2->id,
            'dispenser_id' => $dispenser3->id,
            'status' => 'completed',
            'command' => 'OPEN_DOOR',
            'response' => 'OK',
            'ip_address' => '192.168.1.12',
            'executed_at' => now()->subMinutes(20),
        ]);
        DispenserControlLog::create([
            'user_id' => $user2->id,
            'dispenser_id' => $dispenser4->id,
            'status' => 'in_progress',
            'command' => 'OPEN_DOOR',
            'response' => 'Processing',
            'ip_address' => '192.168.1.13',
            'executed_at' => now()->subMinutes(10),
        ]);

        // Log untuk $user3
        DispenserControlLog::create([
            'user_id' => $user3->id,
            'dispenser_id' => $dispenser1->id,
            'status' => 'failed',
            'command' => 'CLOSE_DOOR',
            'response' => 'ERROR: Device not responding',
            'ip_address' => '192.168.1.14',
            'executed_at' => now()->subMinutes(5),
        ]);
        DispenserControlLog::create([
            'user_id' => $user3->id,
            'dispenser_id' => $dispenser2->id,
            'status' => 'completed',
            'command' => 'OPEN_DOOR',
            'response' => 'OK',
            'ip_address' => '192.168.1.15',
            'executed_at' => now()->subMinutes(25),
        ]);
    }
}
