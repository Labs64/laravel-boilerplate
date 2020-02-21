<?php

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon as Carbon;
class PackagesSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->disableForeignKeys();
        $this->truncate('package');//
        
        $packages = [
            [
                'name' => 'Penginapan Per Malam',
                'type' => 'A',
                'description' => 'Bermalam di Rumah Kampung UTM (waktu masuk jam 3 petang dan keluar maksimum jam 12 tengah hari keesokan hari). Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Kemudahan 2 katil bujang (single) dan tandas  disediakan di dalam Rumah Kampung UTM.
                Kadar selesa 2 orang satu unit.',
                'active' => true,
                'price' => '75.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'1',
                'min_person' =>'1',
            ],
            
            [
                'name' => 'Penginapan Per Malam',
                'type' => 'A',
                'description' => 'Bermalam di Rumah Kampung UTM (waktu masuk jam 3 petang dan keluar maksimum jam 12 tengah hari keesokan hari). Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Kemudahan 2 katil bujang (single) dan tandas  disediakan di dalam Rumah Kampung UTM.
                Kadar selesa 2 orang satu unit.',
                'active' => true,
                'price' => '80.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'2',
                'min_person' =>'1',
            ],
            
            [    
                'name' => 'Penginapan Per Malam',
                'type' => 'A',
                'description' => 'Bermalam di Rumah Kampung UTM (waktu masuk jam 3 petang dan keluar maksimum jam 12 tengah hari keesokan hari). Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Kemudahan 2 katil bujang (single) dan tandas  disediakan di dalam Rumah Kampung UTM.
                Kadar selesa 2 orang satu unit.',
                'active' => true,
                'price' => '80.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'3',
                'min_person' =>'1',
            ],
            
            [
                'name' => 'Penginapan Per Malam',
                'type' => 'A',
                'description' => 'Bermalam di Rumah Kampung UTM (waktu masuk jam 3 petang dan keluar maksimum jam 12 tengah hari keesokan hari). Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Kemudahan 2 katil bujang (single) dan tandas  disediakan di dalam Rumah Kampung UTM.
                Kadar selesa 2 orang satu unit.',
                'active' => true,
                'price' => '85.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'4',
                'min_person' =>'1',
            ],
                        
            [
                'name' => 'PERKHEMAHAN & MOTIVASI (3 HARI 2 MALAM) [PAKEJ PENUH]',
                'type' => 'B',
                'description' => '
                Waktu penggunaan bermula selepas jam 12 tengah hari (Hari Pertama) dan keluar maksimum sebelum jam 12 tengah hari (Hari Ketiga). Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Minimum 40 peserta.
                Kemudahan Tapak Perkhemahan di Hutan Rekreasi.
                Kemudahan Surau, Dewan Terbuka (Resak), Ruang Makan, Dapur Memasak dan Ruang BBQ.
                Kemudahan tandas lelaki dan perempuan.
                Merangkumi Modul Khas & Aktiviti Luar.
                Termasuk makan & minum (2x Sarapan Pagi, 2x Makan Tengah Hari, 2x Makan Malam & 2x Minum Malam).
                Sijil Penyertaan (untuk peserta).
                Sistem siar raya (mikrofon, pembesar suara dan skrin  projektor).
                Kemudahan peralatan khemah disediakan (kadar selesa 3-4 orang satu unit khemah).
                Termasuk Fasilitator / Petugas Tunggu Sedia.
                Program dianjurkan sepenuhnya oleh Pejabat UTM Kampus Edupelancongan.
                ',
                'active' => true,
                'price' => '150.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'1',
                'min_person' =>'40',
            ],
            
            [
                'name' => 'PERKHEMAHAN & MOTIVASI (3 HARI 2 MALAM) [PAKEJ PENUH]',
                'type' => 'B',
                'description' => '
                Waktu penggunaan bermula selepas jam 12 tengah hari (Hari Pertama) dan keluar maksimum sebelum jam 12 tengah hari (Hari Ketiga). Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Minimum 40 peserta.
                Kemudahan Tapak Perkhemahan di Hutan Rekreasi.
                Kemudahan Surau, Dewan Terbuka (Resak), Ruang Makan, Dapur Memasak dan Ruang BBQ.
                Kemudahan tandas lelaki dan perempuan.
                Merangkumi Modul Khas & Aktiviti Luar.
                Termasuk makan & minum (2x Sarapan Pagi, 2x Makan Tengah Hari, 2x Makan Malam & 2x Minum Malam).
                Sijil Penyertaan (untuk peserta).
                Sistem siar raya (mikrofon, pembesar suara dan skrin  projektor).
                Kemudahan peralatan khemah disediakan (kadar selesa 3-4 orang satu unit khemah).
                Termasuk Fasilitator / Petugas Tunggu Sedia.
                Program dianjurkan sepenuhnya oleh Pejabat UTM Kampus Edupelancongan.
                ',
                'active' => true,
                'price' => '190.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'2',
                'min_person' =>'40',
            ],
            
            [    
                'name' => 'PERKHEMAHAN & MOTIVASI (3 HARI 2 MALAM) [PAKEJ PENUH]',
                'type' => 'B',
                'description' => '
                Waktu penggunaan bermula selepas jam 12 tengah hari (Hari Pertama) dan keluar maksimum sebelum jam 12 tengah hari (Hari Ketiga). Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Minimum 40 peserta.
                Kemudahan Tapak Perkhemahan di Hutan Rekreasi.
                Kemudahan Surau, Dewan Terbuka (Resak), Ruang Makan, Dapur Memasak dan Ruang BBQ.
                Kemudahan tandas lelaki dan perempuan.
                Merangkumi Modul Khas & Aktiviti Luar.
                Termasuk makan & minum (2x Sarapan Pagi, 2x Makan Tengah Hari, 2x Makan Malam & 2x Minum Malam).
                Sijil Penyertaan (untuk peserta).
                Sistem siar raya (mikrofon, pembesar suara dan skrin  projektor).
                Kemudahan peralatan khemah disediakan (kadar selesa 3-4 orang satu unit khemah).
                Termasuk Fasilitator / Petugas Tunggu Sedia.
                Program dianjurkan sepenuhnya oleh Pejabat UTM Kampus Edupelancongan.
                ',
                'active' => true,
                'price' => '190.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'3',
                'min_person' =>'40',
            ],
            
            [
                'name' => 'PERKHEMAHAN & MOTIVASI (3 HARI 2 MALAM) [PAKEJ PENUH]',
                'type' => 'B',
                'description' => '
                Waktu penggunaan bermula selepas jam 12 tengah hari (Hari Pertama) dan keluar maksimum sebelum jam 12 tengah hari (Hari Ketiga). Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Minimum 40 peserta.
                Kemudahan Tapak Perkhemahan di Hutan Rekreasi.
                Kemudahan Surau, Dewan Terbuka (Resak), Ruang Makan, Dapur Memasak dan Ruang BBQ.
                Kemudahan tandas lelaki dan perempuan.
                Merangkumi Modul Khas & Aktiviti Luar.
                Termasuk makan & minum (2x Sarapan Pagi, 2x Makan Tengah Hari, 2x Makan Malam & 2x Minum Malam).
                Sijil Penyertaan (untuk peserta).
                Sistem siar raya (mikrofon, pembesar suara dan skrin  projektor).
                Kemudahan peralatan khemah disediakan (kadar selesa 3-4 orang satu unit khemah).
                Termasuk Fasilitator / Petugas Tunggu Sedia.
                Program dianjurkan sepenuhnya oleh Pejabat UTM Kampus Edupelancongan.
                ',
                'active' => true,
                'price' => '225.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'4',
                'min_person' =>'40',
            ],
            [
                'name' => 'PERKHEMAHAN & MOTIVASI (2 HARI 1 MALAM) [PAKEJ PENUH]',
                'type' => 'C',
                'description' => '
                Waktu penggunaan bermula selepas jam 12 tengah hari (Hari Pertama) dan keluar maksimum sebelum jam 12 tengah hari (Hari Kedua). Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Minimum 40 peserta.
                Kemudahan Tapak Perkhemahan di Hutan Rekreasi.
                Kemudahan Surau, Dewan Terbuka (Resak), Ruang Makan, Dapur Memasak dan Ruang BBQ.
                Kemudahan tandas lelaki dan perempuan.
                Merangkumi Modul Khas & Aktiviti Luar.
                Termasuk Makan & Minum (Sarapan Pagi, Makan Tengah Hari, Makan Malam & Minum Malam).
                Sijil Penyertaan (untuk peserta).
                Sistem siar raya (mikrofon, pembesar suara dan skrin projektor).
                Kemudahan peralatan Khemah disediakan (kadar selesa 3-4 orang satu unit khemah).
                Termasuk Fasilitator / Petugas Tunggu Sedia.
                ',
                'active' => true,
                'price' => '110.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'1',
                'min_person' =>'40',
            ],
            
            [
                'name' => 'PERKHEMAHAN & MOTIVASI (2 HARI 1 MALAM) [PAKEJ PENUH]',
                'type' => 'C',
                'description' => '
                Waktu penggunaan bermula selepas jam 12 tengah hari (Hari Pertama) dan keluar maksimum sebelum jam 12 tengah hari (Hari Kedua). Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Minimum 40 peserta.
                Kemudahan Tapak Perkhemahan di Hutan Rekreasi.
                Kemudahan Surau, Dewan Terbuka (Resak), Ruang Makan, Dapur Memasak dan Ruang BBQ.
                Kemudahan tandas lelaki dan perempuan.
                Merangkumi Modul Khas & Aktiviti Luar.
                Termasuk Makan & Minum (Sarapan Pagi, Makan Tengah Hari, Makan Malam & Minum Malam).
                Sijil Penyertaan (untuk peserta).
                Sistem siar raya (mikrofon, pembesar suara dan skrin projektor).
                Kemudahan peralatan Khemah disediakan (kadar selesa 3-4 orang satu unit khemah).
                Termasuk Fasilitator / Petugas Tunggu Sedia.
                ',
                'active' => true,
                'price' => '138.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'2',
                'min_person' =>'40',
            ],
            
            [    
                'name' => 'PERKHEMAHAN & MOTIVASI (2 HARI 1 MALAM) [PAKEJ PENUH]',
                'type' => 'C',
                'description' => '
                Waktu penggunaan bermula selepas jam 12 tengah hari (Hari Pertama) dan keluar maksimum sebelum jam 12 tengah hari (Hari Kedua). Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Minimum 40 peserta.
                Kemudahan Tapak Perkhemahan di Hutan Rekreasi.
                Kemudahan Surau, Dewan Terbuka (Resak), Ruang Makan, Dapur Memasak dan Ruang BBQ.
                Kemudahan tandas lelaki dan perempuan.
                Merangkumi Modul Khas & Aktiviti Luar.
                Termasuk Makan & Minum (Sarapan Pagi, Makan Tengah Hari, Makan Malam & Minum Malam).
                Sijil Penyertaan (untuk peserta).
                Sistem siar raya (mikrofon, pembesar suara dan skrin projektor).
                Kemudahan peralatan Khemah disediakan (kadar selesa 3-4 orang satu unit khemah).
                Termasuk Fasilitator / Petugas Tunggu Sedia.
                ',
                'active' => true,
                'price' => '138.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'3',
                'min_person' =>'40',
            ],
            
            [
                'name' => 'PERKHEMAHAN & MOTIVASI (2 HARI 1 MALAM) [PAKEJ PENUH]',
                'type' => 'C',
                'description' => '
                Waktu penggunaan bermula selepas jam 12 tengah hari (Hari Pertama) dan keluar maksimum sebelum jam 12 tengah hari (Hari Kedua). Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Minimum 40 peserta.
                Kemudahan Tapak Perkhemahan di Hutan Rekreasi.
                Kemudahan Surau, Dewan Terbuka (Resak), Ruang Makan, Dapur Memasak dan Ruang BBQ.
                Kemudahan tandas lelaki dan perempuan.
                Merangkumi Modul Khas & Aktiviti Luar.
                Termasuk Makan & Minum (Sarapan Pagi, Makan Tengah Hari, Makan Malam & Minum Malam).
                Sijil Penyertaan (untuk peserta).
                Sistem siar raya (mikrofon, pembesar suara dan skrin projektor).
                Kemudahan peralatan Khemah disediakan (kadar selesa 3-4 orang satu unit khemah).
                Termasuk Fasilitator / Petugas Tunggu Sedia.
                ',
                'active' => true,
                'price' => '165.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'4',
                'min_person' =>'40',
            ],
            [
                'name' => 'PERKHEMAHAN & MOTIVASI (SEHARI) [PAKEJ PENUH',
                'type' => 'D',
                'description' => 'Waktu penggunaan bermula jam 8 pagi dan keluar maksimum jam 5 petang. Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Minimum 40 peserta.
                Kemudahan Tapak Perkhemahan di Hutan Rekreasi.
                Kemudahan Surau, Dewan Terbuka (Resak), Ruang Makan, Dapur Memasak dan Ruang BBQ.
                Kemudahan tandas lelaki dan perempuan.
                Merangkumi Modul Khas & Aktiviti Luar.
                Termasuk Makan & Minum (Sarapan Pagi, Makan Tengah Hari & Minum Petang).
                Sijil Penyertaan (untuk peserta).
                Sistem siar raya (mikrofon, pembesar suara dan skrin projektor)
                Termasuk Fasilitator / Petugas Tunggu Sedia
                Program dianjurkan sepenuhnya oleh Pejabat UTM Kampus Edupelancongan.',
                'active' => true,
                'price' => '100.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'1',
                'min_person' =>'40',
            ],
            
            [
                'name' => 'PERKHEMAHAN & MOTIVASI (SEHARI) [PAKEJ PENUH',
                'type' => 'D',
                'description' => 'Waktu penggunaan bermula jam 8 pagi dan keluar maksimum jam 5 petang. Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Minimum 40 peserta.
                Kemudahan Tapak Perkhemahan di Hutan Rekreasi.
                Kemudahan Surau, Dewan Terbuka (Resak), Ruang Makan, Dapur Memasak dan Ruang BBQ.
                Kemudahan tandas lelaki dan perempuan.
                Merangkumi Modul Khas & Aktiviti Luar.
                Termasuk Makan & Minum (Sarapan Pagi, Makan Tengah Hari & Minum Petang).
                Sijil Penyertaan (untuk peserta).
                Sistem siar raya (mikrofon, pembesar suara dan skrin projektor)
                Termasuk Fasilitator / Petugas Tunggu Sedia
                Program dianjurkan sepenuhnya oleh Pejabat UTM Kampus Edupelancongan.',
                'active' => true,
                'price' => '125.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'2',
                'min_person' =>'40',
                
            ],
            
            [
            
                'name' => 'PERKHEMAHAN & MOTIVASI (SEHARI) [PAKEJ PENUH',
                'type' => 'D',
                'description' => 'Waktu penggunaan bermula jam 8 pagi dan keluar maksimum jam 5 petang. Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Minimum 40 peserta.
                Kemudahan Tapak Perkhemahan di Hutan Rekreasi.
                Kemudahan Surau, Dewan Terbuka (Resak), Ruang Makan, Dapur Memasak dan Ruang BBQ.
                Kemudahan tandas lelaki dan perempuan.
                Merangkumi Modul Khas & Aktiviti Luar.
                Termasuk Makan & Minum (Sarapan Pagi, Makan Tengah Hari & Minum Petang).
                Sijil Penyertaan (untuk peserta).
                Sistem siar raya (mikrofon, pembesar suara dan skrin projektor)
                Termasuk Fasilitator / Petugas Tunggu Sedia
                Program dianjurkan sepenuhnya oleh Pejabat UTM Kampus Edupelancongan.',
                'active' => true,
                'price' => '125.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'3',
                'min_person' =>'40',
            ],
            
            [
                'name' => 'PERKHEMAHAN & MOTIVASI (SEHARI) [PAKEJ PENUH',
                'type' => 'D',
                'description' => 'Waktu penggunaan bermula jam 8 pagi dan keluar maksimum jam 5 petang. Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Minimum 40 peserta.
                Kemudahan Tapak Perkhemahan di Hutan Rekreasi.
                Kemudahan Surau, Dewan Terbuka (Resak), Ruang Makan, Dapur Memasak dan Ruang BBQ.
                Kemudahan tandas lelaki dan perempuan.
                Merangkumi Modul Khas & Aktiviti Luar.
                Termasuk Makan & Minum (Sarapan Pagi, Makan Tengah Hari & Minum Petang).
                Sijil Penyertaan (untuk peserta).
                Sistem siar raya (mikrofon, pembesar suara dan skrin projektor)
                Termasuk Fasilitator / Petugas Tunggu Sedia
                Program dianjurkan sepenuhnya oleh Pejabat UTM Kampus Edupelancongan.',
                'active' => true,
                'price' => '150.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'4',
                'min_person' =>'40',
            ],
            [
                'name' => 'SEWAAN TAPAK (3 HARI 2 MALAM)',
                'type' => 'E',
                'description' => '
                Waktu penggunaan bermula selepas jam 12 tengah hari (Hari Pertama) dan keluar maksimum sebelum jam 12 tengah hari (Hari Ketiga). Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Kemudahan Tapak Perkhemahan, Surau, Dewan Terbuka (Resak), Ruang Makan, Dapur Memasak, Ruang BBQ dan Tandas di Hutan Rekreasi.
                Sistem siar raya (mikrofon, pembesar suara dan skrin projektor).
                Termasuk aktiviti Merentas Hutan dan Berjalan Malam.
                Khemah disediakan (maksimum 20 unit sahaja).
                Staff tunggu sedia.
                ',
                'active' => true,
                'price' => '40.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'1',
                'min_person' =>'1',
            ],
            
            [
                'name' => 'SEWAAN TAPAK (3 HARI 2 MALAM)',
                'type' => 'E',
                'description' => '
                Waktu penggunaan bermula selepas jam 12 tengah hari (Hari Pertama) dan keluar maksimum sebelum jam 12 tengah hari (Hari Ketiga). Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Kemudahan Tapak Perkhemahan, Surau, Dewan Terbuka (Resak), Ruang Makan, Dapur Memasak, Ruang BBQ dan Tandas di Hutan Rekreasi.
                Sistem siar raya (mikrofon, pembesar suara dan skrin projektor).
                Termasuk aktiviti Merentas Hutan dan Berjalan Malam.
                Khemah disediakan (maksimum 20 unit sahaja).
                Staff tunggu sedia.
                ',
                'active' => true,
                'price' => '45.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'2',
                'min_person' =>'1',
            ],
            
            [    
                'name' => 'SEWAAN TAPAK (3 HARI 2 MALAM)',
                'type' => 'E',
                'description' => '
                Waktu penggunaan bermula selepas jam 12 tengah hari (Hari Pertama) dan keluar maksimum sebelum jam 12 tengah hari (Hari Ketiga). Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Kemudahan Tapak Perkhemahan, Surau, Dewan Terbuka (Resak), Ruang Makan, Dapur Memasak, Ruang BBQ dan Tandas di Hutan Rekreasi.
                Sistem siar raya (mikrofon, pembesar suara dan skrin projektor).
                Termasuk aktiviti Merentas Hutan dan Berjalan Malam.
                Khemah disediakan (maksimum 20 unit sahaja).
                Staff tunggu sedia.
                ',
                'active' => true,
                'price' => '50.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'3',
                'min_person' =>'1',
            ],
            
            [
                'name' => 'SEWAAN TAPAK (3 HARI 2 MALAM)',
                'type' => 'E',
                'description' => '
                Waktu penggunaan bermula selepas jam 12 tengah hari (Hari Pertama) dan keluar maksimum sebelum jam 12 tengah hari (Hari Ketiga). Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Kemudahan Tapak Perkhemahan, Surau, Dewan Terbuka (Resak), Ruang Makan, Dapur Memasak, Ruang BBQ dan Tandas di Hutan Rekreasi.
                Sistem siar raya (mikrofon, pembesar suara dan skrin projektor).
                Termasuk aktiviti Merentas Hutan dan Berjalan Malam.
                Khemah disediakan (maksimum 20 unit sahaja).
                Staff tunggu sedia.
                ',
                'active' => true,
                'price' => '55.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'4',
                'min_person' =>'1',
            ],
            [
                'name' => 'SEWAAN TAPAK (2HARI 1 MALAM)',
                'type' => 'F',
                'description' => '
                Waktu penggunaan bermula selepas jam 12 tengah hari (Hari Pertama) dan keluar maksimum sebelum jam 12 tengah hari (Hari Kedua). Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Kemudahan Tapak Perkhemahan, Surau, Dewan Terbuka (Resak), Ruang Makan, Dapur Memasak, Ruang BBQ dan Tandas di Hutan Rekreasi.
                Sistem siar raya (mikrofon, pembesar suara dan skrin projektor).
                Termasuk aktiviti Merentas Hutan sahaja.
                Khemah disediakan (maksimum 20 unit sahaja).
                Staff tunggu sedia.
                ',
                'active' => true,
                'price' => '30.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'1',
                'min_person' =>'1',
            ],
            
            [
                'name' => 'SEWAAN TAPAK (2HARI 1 MALAM)',
                'type' => 'F',
                'description' => '
                Waktu penggunaan bermula selepas jam 12 tengah hari (Hari Pertama) dan keluar maksimum sebelum jam 12 tengah hari (Hari Kedua). Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Kemudahan Tapak Perkhemahan, Surau, Dewan Terbuka (Resak), Ruang Makan, Dapur Memasak, Ruang BBQ dan Tandas di Hutan Rekreasi.
                Sistem siar raya (mikrofon, pembesar suara dan skrin projektor).
                Termasuk aktiviti Merentas Hutan sahaja.
                Khemah disediakan (maksimum 20 unit sahaja).
                Staff tunggu sedia.
                ',
                'active' => true,
                'price' => '35.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'2',
                'min_person' =>'1',
            ],
            
            [    
                'name' => 'SEWAAN TAPAK (2HARI 1 MALAM)',
                'type' => 'F',
                'description' => '
                Waktu penggunaan bermula selepas jam 12 tengah hari (Hari Pertama) dan keluar maksimum sebelum jam 12 tengah hari (Hari Kedua). Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Kemudahan Tapak Perkhemahan, Surau, Dewan Terbuka (Resak), Ruang Makan, Dapur Memasak, Ruang BBQ dan Tandas di Hutan Rekreasi.
                Sistem siar raya (mikrofon, pembesar suara dan skrin projektor).
                Termasuk aktiviti Merentas Hutan sahaja.
                Khemah disediakan (maksimum 20 unit sahaja).
                Staff tunggu sedia.
                ',
                'active' => true,
                'price' => '40.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'3',
                'min_person' =>'1',
            ],
            
            [
                'name' => 'SEWAAN TAPAK (2HARI 1 MALAM)',
                'type' => 'F',
                'description' => '
                Waktu penggunaan bermula selepas jam 12 tengah hari (Hari Pertama) dan keluar maksimum sebelum jam 12 tengah hari (Hari Kedua). Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan).
                Kemudahan Tapak Perkhemahan, Surau, Dewan Terbuka (Resak), Ruang Makan, Dapur Memasak, Ruang BBQ dan Tandas di Hutan Rekreasi.
                Sistem siar raya (mikrofon, pembesar suara dan skrin projektor).
                Termasuk aktiviti Merentas Hutan sahaja.
                Khemah disediakan (maksimum 20 unit sahaja).
                Staff tunggu sedia.
                ',
                'active' => true,
                'price' => '45.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'4',
                'min_person' =>'1',
            ],
            [
                'name' => 'SEWAAN TAPAK PERKHEMAHAN (SEHARI)',
                'type' => 'G',
                'description' => '
                Waktu penggunaan bermula jam 8 pagi dan keluar maksimum jam 5 petang. Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan)
                Kemudahan Tapak Perkhemahan, Surau,  Dewan Terbuka (Resak), Ruang Makan, Ruang BBQ, Dapur Memasak, Ruang BBQ dan Tandas di Hutan Rekreasi.
                Sistem siar raya (mikrofon, pembesar suara dan skrin projektor).
                Termasuk aktiviti Merentas Hutan sahaja.
                Staff tunggu sedia.',
                'active' => true,
                'price' => '15.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'1',
                'min_person' =>'1',
            ],
            
            [
                'name' => 'SEWAAN TAPAK PERKHEMAHAN (SEHARI)',
                'type' => 'G',
                'description' => '
                Waktu penggunaan bermula jam 8 pagi dan keluar maksimum jam 5 petang. Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan)
                Kemudahan Tapak Perkhemahan, Surau,  Dewan Terbuka (Resak), Ruang Makan, Ruang BBQ, Dapur Memasak, Ruang BBQ dan Tandas di Hutan Rekreasi.
                Sistem siar raya (mikrofon, pembesar suara dan skrin projektor).
                Termasuk aktiviti Merentas Hutan sahaja.
                Staff tunggu sedia.',
                'active' => true,
                'price' => '20.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'2',
                'min_person' =>'1',
            ],
            
            [    
                'name' => 'SEWAAN TAPAK PERKHEMAHAN (SEHARI)',
                'type' => 'G',
                'description' => '
                Waktu penggunaan bermula jam 8 pagi dan keluar maksimum jam 5 petang. Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan)
                Kemudahan Tapak Perkhemahan, Surau,  Dewan Terbuka (Resak), Ruang Makan, Ruang BBQ, Dapur Memasak, Ruang BBQ dan Tandas di Hutan Rekreasi.
                Sistem siar raya (mikrofon, pembesar suara dan skrin projektor).
                Termasuk aktiviti Merentas Hutan sahaja.
                Staff tunggu sedia.',
                'active' => true,
                'price' => '25.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'3',
                'min_person' =>'1',
            ],
            
            [
                'name' => 'SEWAAN TAPAK PERKHEMAHAN (SEHARI)',
                'type' => 'G',
                'description' => '
                Waktu penggunaan bermula jam 8 pagi dan keluar maksimum jam 5 petang. Bagi pemanjangan waktu keluar, caj RM 5 akan dikenakan untuk setiap jam (tertakluk kepada kekosongan)
                Kemudahan Tapak Perkhemahan, Surau,  Dewan Terbuka (Resak), Ruang Makan, Ruang BBQ, Dapur Memasak, Ruang BBQ dan Tandas di Hutan Rekreasi.
                Sistem siar raya (mikrofon, pembesar suara dan skrin projektor).
                Termasuk aktiviti Merentas Hutan sahaja.
                Staff tunggu sedia.',
                'active' => true,
                'price' => '30.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'4',
                'min_person' =>'1',
            ],
            [
                'name' => 'REKREASI : KAYAK PER SESI - TASK',
                'type' => 'H',
                'description' => '
                Minimum: 15 orang
                Lokasi:
                Tasik Ilmu II, Taman Tropika.
                Tasik Outbound, Fakulti Pendidikan.
                Tasik Desa Bakti.',
                'active' => true,
                'price' => '45.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'1',
                'min_person' =>'15',
            ],
            
            [
                'name' => 'REKREASI : KAYAK PER SESI - TASK',
                'type' => 'H',
                'description' => '
                Minimum: 15 orang
                Lokasi:
                Tasik Ilmu II, Taman Tropika.
                Tasik Outbound, Fakulti Pendidikan.
                Tasik Desa Bakti.',
                'active' => true,
                'price' => '45.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'2',
                'min_person' =>'15',
            ],
            
            [    
                'name' => 'REKREASI : KAYAK PER SESI - TASK',
                'type' => 'H',
                'description' => '
                Minimum: 15 orang
                Lokasi:
                Tasik Ilmu II, Taman Tropika.
                Tasik Outbound, Fakulti Pendidikan.
                Tasik Desa Bakti.',
                'active' => true,
                'price' => '52.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'3',
                'min_person' =>'15',
            ],
            
            [
                'name' => 'REKREASI : KAYAK PER SESI - TASK',
                'type' => 'H',
                'description' => '
                Minimum: 15 orang
                Lokasi:
                Tasik Ilmu II, Taman Tropika.
                Tasik Outbound, Fakulti Pendidikan.
                Tasik Desa Bakti.',
                'active' => true,
                'price' => '55.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'4',
                'min_person' =>'15',
            ],
            [
                'name' => 'REKREASI : KAYAK PER SESI - KELAS PENGENALAN KAYAK',
                'type' => 'H',
                'description' => '
                Minimum: 15 orang
                Lokasi:
                Tasik Ilmu II, Taman Tropika.
                Tasik Outbound, Fakulti Pendidikan.
                Tasik Desa Bakti.',
                'active' => true,
                'price' => '60.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'1',
                'min_person' =>'15',
            ],
            
            [
                'name' => 'REKREASI : KAYAK PER SESI - KELAS PENGENALAN KAYAK',
                'type' => 'H',
                'description' => '
                Minimum: 15 orang
                Lokasi:
                Tasik Ilmu II, Taman Tropika.
                Tasik Outbound, Fakulti Pendidikan.
                Tasik Desa Bakti.',
                'active' => true,
                'price' => '60.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'2',
                'min_person' =>'15',
            ],
            
            [    
                'name' => 'REKREASI : KAYAK PER SESI - KELAS PENGENALAN KAYAK',
                'type' => 'H',
                'description' => '
                Minimum: 15 orang
                Lokasi:
                Tasik Ilmu II, Taman Tropika.
                Tasik Outbound, Fakulti Pendidikan.
                Tasik Desa Bakti.',
                'active' => true,
                'price' => '69.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'3',
                'min_person' =>'15',
            ],
            
            [
                'name' => 'REKREASI : KAYAK PER SESI - KELAS PENGENALAN KAYAK',
                'type' => 'H',
                'description' => '
                Minimum: 15 orang
                Lokasi:
                Tasik Ilmu II, Taman Tropika.
                Tasik Outbound, Fakulti Pendidikan.
                Tasik Desa Bakti.',
                'active' => true,
                'price' => '75.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'4',
                'min_person' =>'15',
            ],
            [
                'name' => 'REKREASI :  MEMANAH TRADISIONAL(ARCHERY) 10 ANAK PANAH PER SESI',
                'type' => 'H',
                'description' => '10 anak panah per sesi',
                'active' => true,
                'price' => '10.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'1',
                'min_person' =>'1',
            ],
            
            [
                'name' => 'REKREASI :  MEMANAH TRADISIONAL(ARCHERY) 10 ANAK PANAH PER SESI',
                'type' => 'H',
                'description' => '10 anak panah per sesi',
                'active' => true,
                'price' => '10.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'2',
                'min_person' =>'1',
            ],
            
            [    
                'name' => 'REKREASI :  MEMANAH TRADISIONAL(ARCHERY) 10 ANAK PANAH PER SESI',
                'type' => 'H',
                'description' => '10 anak panah per sesi',
                'active' => true,
                'price' => '10.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'3',
                'min_person' =>'1',
            ],
            
            [
                'name' => 'REKREASI :  MEMANAH TRADISIONAL(ARCHERY) 10 ANAK PANAH PER SESI',
                'type' => 'H',
                'description' => '10 anak panah per sesi',
                'active' => true,
                'price' => '10.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'4',
                'min_person' =>'1',
            ],
            [
                'name' => 'REKREASI :  MEMANAH TRADISIONAL(ARCHERY) 20 ANAK PANAH PER SESI',
                'type' => 'H',
                'description' => '30 anak panah per sesi',
                'active' => true,
                'price' => '30.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'1',
                'min_person' =>'1',
            ],
            
            [
                'name' => 'REKREASI :  MEMANAH TRADISIONAL(ARCHERY) 20 ANAK PANAH PER SESI',
                'type' => 'H',
                'description' => '30 anak panah per sesi',
                'active' => true,
                'price' => '30.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'2',
                'min_person' =>'1',
            ],
            
            [    
                'name' => 'REKREASI :  MEMANAH TRADISIONAL(ARCHERY) 20 ANAK PANAH PER SESI',
                'type' => 'H',
                'description' => '30 anak panah per sesi',
                'active' => true,
                'price' => '30.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'3',
                'min_person' =>'1',
            ],
            
            [
                'name' => 'REKREASI :  MEMANAH TRADISIONAL(ARCHERY) 20 ANAK PANAH PER SESI',
                'type' => 'H',
                'description' => '30 anak panah per sesi',
                'active' => true,
                'price' => '30.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'4',
                'min_person' =>'1',
            ],
            [
                'name' => 'REKREASI : MEMANAH TEMPUR (COMBAT ARCHERY)',
                'type' => 'H',
                'description' => '
                Minimum: 10 orang
                4 pusingan',
                'active' => true,
                'price' => '39.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'1',
                'min_person' =>'10',
            ],
            
            [
                'name' => 'REKREASI : MEMANAH TEMPUR (COMBAT ARCHERY)',
                'type' => 'H',
                'description' => '
                Minimum: 10 orang
                4 pusingan',
                'active' => true,
                'price' => '39.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'2',
                'min_person' =>'10',
            ],
            
            [    
                'name' => 'REKREASI : MEMANAH TEMPUR (COMBAT ARCHERY)',
                'type' => 'H',
                'description' => '
                Minimum: 10 orang
                4 pusingan',
                'active' => true,
                'price' => '45.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'3',
                'min_person' =>'10',
            ],
            
            [
                'name' => 'REKREASI : MEMANAH TEMPUR (COMBAT ARCHERY)',
                'type' => 'H',
                'description' => '
                Minimum: 10 orang
                4 pusingan',
                'active' => true,
                'price' => '49.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'4',
                'min_person' =>'10',
            ],
            [
                'name' => 'REKREASI : BUMPERBALLS',
                'type' => 'H',
                'description' => '
                Minimum: 10 orang
                60 minit',
                'active' => true,
                'price' => '39.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'1',
                'min_person' =>'10',
            ],
            
            [
                'name' => 'REKREASI : BUMPERBALLS',
                'type' => 'H',
                'description' => 'Minimum: 10 orang
                60 minit',
                'active' => true,
                'price' => '39.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'2',
                'min_person' =>'10',
            ],
            
            [    
                'name' => 'REKREASI : BUMPERBALLS',
                'type' => 'H',
                'description' => 'Minimum: 10 orang
                60 minit',
                'active' => true,
                'price' => '45.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'3',
                'min_person' =>'10',
            ],
            
            [
                'name' => 'REKREASI : BUMPERBALLS',
                'type' => 'H',
                'description' => 'Minimum: 10 orang
                60 minit',
                'active' => true,
                'price' => '49.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'4',
                'min_person' =>'10',
            ],

            [
                'name' => 'REKREASI: EXPLORACE',
                'type' => 'H',
                'description' => 'Program Explorace merangkumi 5 ‘check point’ / lebih
                Sekitar kawasan Hutan Rekreasi.',
                'active' => true,
                'price' => '20.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'1',
                'min_person' =>'1',
            ],
            [
                'name' => 'REKREASI: EXPLORACE',
                'type' => 'H',
                'description' => 'Program Explorace merangkumi 5 ‘check point’ / lebih
                Sekitar kawasan Hutan Rekreasi.',
                'active' => true,
                'price' => '20.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'2',
                'min_person' =>'1',
            ],
            [
                'name' => 'REKREASI: EXPLORACE',
                'type' => 'H',
                'description' => 'Program Explorace merangkumi 5 ‘check point’ / lebih
                Sekitar kawasan Hutan Rekreasi.',
                'active' => true,
                'price' => '23.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'3',
                'min_person' =>'1',
            ],
            [
                'name' => 'REKREASI: EXPLORACE',
                'type' => 'H',
                'description' => 'Program Explorace merangkumi 5 ‘check point’ / lebih
                Sekitar kawasan Hutan Rekreasi.',
                'active' => true,
                'price' => '24.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'4',
                'min_person' =>'1',
            ],

            [
                'name' => 'REKREASI : MERENTAS HUTAN',
                'type' => 'H',
                'description' => 'Program ini memfokuskan kepada kerja berpasukan dalam kumpulan dan menguji keberanian dan ketahanan mental dan fizikal peserta dalam meredah Hutan Rekreasi sejauh 1.6 km – 3 km.
                Program ini memakan masa antara 2-4 jam bergantung kepada kepantasan peserta dan dilaksanakan pada waktu siang.
                Program ini turut melibatkan aktiviti ikhtiar hidup dan penyamaran berkumpulan tertakluk kepada permintaan (optional).
                Lokasi:                
                Hutan Rekreasi UTM.
                UTM Trails.
                Peralatan-peralatan yang digunakan:                
                Laluan trek jalan; dan
                Pakaian sukan',
                'active' => true,
                'price' => '10.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'1',
                'min_person' =>'10',
            ],
            [
                'name' => 'REKREASI : MERENTAS HUTAN',
                'type' => 'H',
                'description' => 'Program ini memfokuskan kepada kerja berpasukan dalam kumpulan dan menguji keberanian dan ketahanan mental dan fizikal peserta dalam meredah Hutan Rekreasi sejauh 1.6 km – 3 km.
                Program ini memakan masa antara 2-4 jam bergantung kepada kepantasan peserta dan dilaksanakan pada waktu siang.
                Program ini turut melibatkan aktiviti ikhtiar hidup dan penyamaran berkumpulan tertakluk kepada permintaan (optional).
                Lokasi:                
                Hutan Rekreasi UTM.
                UTM Trails.
                Peralatan-peralatan yang digunakan:                
                Laluan trek jalan; dan
                Pakaian sukan',
                'active' => true,
                'price' => '10.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'1',
                'min_person' =>'10',
            ],
            [
                'name' => 'REKREASI : MERENTAS HUTAN',
                'type' => 'H',
                'description' => 'Program ini memfokuskan kepada kerja berpasukan dalam kumpulan dan menguji keberanian dan ketahanan mental dan fizikal peserta dalam meredah Hutan Rekreasi sejauh 1.6 km – 3 km.
                Program ini memakan masa antara 2-4 jam bergantung kepada kepantasan peserta dan dilaksanakan pada waktu siang.
                Program ini turut melibatkan aktiviti ikhtiar hidup dan penyamaran berkumpulan tertakluk kepada permintaan (optional).
                Lokasi:                
                Hutan Rekreasi UTM.
                UTM Trails.
                Peralatan-peralatan yang digunakan:                
                Laluan trek jalan; dan
                Pakaian sukan',
                'active' => true,
                'price' => '12.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'3',
                'min_person' =>'10',
            ],
            [
                'name' => 'REKREASI : MERENTAS HUTAN',
                'type' => 'H',
                'description' => 'Program ini memfokuskan kepada kerja berpasukan dalam kumpulan dan menguji keberanian dan ketahanan mental dan fizikal peserta dalam meredah Hutan Rekreasi sejauh 1.6 km – 3 km.
                Program ini memakan masa antara 2-4 jam bergantung kepada kepantasan peserta dan dilaksanakan pada waktu siang.
                Program ini turut melibatkan aktiviti ikhtiar hidup dan penyamaran berkumpulan tertakluk kepada permintaan (optional).
                Lokasi:                
                Hutan Rekreasi UTM.
                UTM Trails.
                Peralatan-peralatan yang digunakan:                
                Laluan trek jalan; dan
                Pakaian sukan',
                'active' => true,
                'price' => '13.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'4',
                'min_person' =>'10',
            ],

            [
                'name' => 'REKREASI : TREASURE HUNT',
                'type' => 'H',
                'description' => 'per orang
                Lokasi : Hutan Rekreasi',
                'active' => true,
                'price' => '10.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'1',
                'min_person' =>'1',
            ],
            [
                'name' => 'REKREASI : TREASURE HUNT',
                'type' => 'H',
                'description' => 'per orang
                Lokasi : Hutan Rekreasi',
                'active' => true,
                'price' => '10.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'2',
                'min_person' =>'1',
            ],
            [
                'name' => 'REKREASI : TREASURE HUNT',
                'type' => 'H',
                'description' => 'per orang
                Lokasi : Hutan Rekreasi',
                'active' => true,
                'price' => '12.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'3',
                'min_person' =>'1',
            ],
            [
                'name' => 'REKREASI : TREASURE HUNT',
                'type' => 'H',
                'description' => 'per orang
                Lokasi : Hutan Rekreasi',
                'active' => true,
                'price' => '13.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'4',
                'min_person' =>'1',
            ],

            [
                'name' => 'REKREASI : TELEMATCH 4-11 TAHUN',
                'type' => 'H',
                'description' => '
                6 PILIHAN AKTIVITI
                Ball Treasure
                Balloon Burst
                Balloons Tree
                Book Balancing Relay
                Chu! Chu! Train
                Drunken Monkey Relay
                Filling The Bottle
                Find Your Shoe
                Frog Jump
                Hula Hoop Chain
                Monkey Walk
                Pass The Buck
                Ping Pong Ball & Spoon Relay
                Pulling The Tennis Ball
                Sweets In The Flour
                ',
                'active' => true,
                'price' => '10.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'1',
                'min_person' =>'1',
            ],
            [
                'name' => 'REKREASI : TELEMATCH 4-11 TAHUN',
                'type' => 'H',
                'description' => '
                6 PILIHAN AKTIVITI
                Ball Treasure
                Balloon Burst
                Balloons Tree
                Book Balancing Relay
                Chu! Chu! Train
                Drunken Monkey Relay
                Filling The Bottle
                Find Your Shoe
                Frog Jump
                Hula Hoop Chain
                Monkey Walk
                Pass The Buck
                Ping Pong Ball & Spoon Relay
                Pulling The Tennis Ball
                Sweets In The Flour
                ',
                'active' => true,
                'price' => '10.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'2',
                'min_person' =>'1',
            ],
            [
                'name' => 'REKREASI : TELEMATCH 4-11 TAHUN',
                'type' => 'H',
                'description' => '
                6 PILIHAN AKTIVITI
                Ball Treasure
                Balloon Burst
                Balloons Tree
                Book Balancing Relay
                Chu! Chu! Train
                Drunken Monkey Relay
                Filling The Bottle
                Find Your Shoe
                Frog Jump
                Hula Hoop Chain
                Monkey Walk
                Pass The Buck
                Ping Pong Ball & Spoon Relay
                Pulling The Tennis Ball
                Sweets In The Flour
                ',
                'active' => true,
                'price' => '12.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'3',
                'min_person' =>'1',
            ],
            [
                'name' => 'REKREASI : TELEMATCH 4-11 TAHUN',
                'type' => 'H',
                'description' => '
                6 PILIHAN AKTIVITI
                Ball Treasure
                Balloon Burst
                Balloons Tree
                Book Balancing Relay
                Chu! Chu! Train
                Drunken Monkey Relay
                Filling The Bottle
                Find Your Shoe
                Frog Jump
                Hula Hoop Chain
                Monkey Walk
                Pass The Buck
                Ping Pong Ball & Spoon Relay
                Pulling The Tennis Ball
                Sweets In The Flour
                ',
                'active' => true,
                'price' => '13.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'4',
                'min_person' =>'1',
            ],

            [
                'name' => 'REKREASI : TELEMATCH 12 TAHUN KEATAS',
                'type' => 'H',
                'description' => '6 PILIHAN AKTIVITI
                Balloons Tree
                Captured Bomb
                Dadu Dice Race
                Drunken Monkey Relay
                Filling The Bottle
                Giant Chopstick & Ball
                Monkey Walk
                Pony Tail
                Roll The Ball
                Roll The Ring Relay
                Romantic Ball Relay
                Sand Marble
                Six Legged Relay Race
                Sweet In The Flour
                The Gunny Sack Race
                The Longest Line
                Three Legged Race
                Tug of War
                Walking In The Plank
                Wheel Barrow Race',
                'active' => true,
                'price' => '10.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'1',
                'min_person' =>'1',
            ],
            [
                'name' => 'REKREASI : TELEMATCH 12 TAHUN KEATAS',
                'type' => 'H',
                'description' => '6 PILIHAN AKTIVITI
                Balloons Tree
                Captured Bomb
                Dadu Dice Race
                Drunken Monkey Relay
                Filling The Bottle
                Giant Chopstick & Ball
                Monkey Walk
                Pony Tail
                Roll The Ball
                Roll The Ring Relay
                Romantic Ball Relay
                Sand Marble
                Six Legged Relay Race
                Sweet In The Flour
                The Gunny Sack Race
                The Longest Line
                Three Legged Race
                Tug of War
                Walking In The Plank
                Wheel Barrow Race',
                'active' => true,
                'price' => '10.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'2',
                'min_person' =>'1',
            ],
            [
                'name' => 'REKREASI : TELEMATCH 12 TAHUN KEATAS',
                'type' => 'H',
                'description' => '6 PILIHAN AKTIVITI
                Balloons Tree
                Captured Bomb
                Dadu Dice Race
                Drunken Monkey Relay
                Filling The Bottle
                Giant Chopstick & Ball
                Monkey Walk
                Pony Tail
                Roll The Ball
                Roll The Ring Relay
                Romantic Ball Relay
                Sand Marble
                Six Legged Relay Race
                Sweet In The Flour
                The Gunny Sack Race
                The Longest Line
                Three Legged Race
                Tug of War
                Walking In The Plank
                Wheel Barrow Race',
                'active' => true,
                'price' => '12.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'3',
                'min_person' =>'1',
            ],
            [
                'name' => 'REKREASI : TELEMATCH 12 TAHUN KEATAS',
                'type' => 'H',
                'description' => '6 PILIHAN AKTIVITI
                Balloons Tree
                Captured Bomb
                Dadu Dice Race
                Drunken Monkey Relay
                Filling The Bottle
                Giant Chopstick & Ball
                Monkey Walk
                Pony Tail
                Roll The Ball
                Roll The Ring Relay
                Romantic Ball Relay
                Sand Marble
                Six Legged Relay Race
                Sweet In The Flour
                The Gunny Sack Race
                The Longest Line
                Three Legged Race
                Tug of War
                Walking In The Plank
                Wheel Barrow Race',
                'active' => true,
                'price' => '13.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'4',
                'min_person' =>'1',
            ],
            [
                'name' => 'SEWAAN SISTEM SIAR RAYA',
                'type' => 'I',
                'description' => '– Per Hari
                – Portable Amplifier (mikrofon) & LCD Projektor',
                'active' => true,
                'price' => '200.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'1',
                'min_person' =>'1',
            ],
            [
                'name' => 'SEWAAN SISTEM SIAR RAYA',
                'type' => 'I',
                'description' => '– Per Hari
                – Portable Amplifier (mikrofon) & LCD Projektor',
                'active' => true,
                'price' => '200.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'2',
                'min_person' =>'1',
            ],
            [
                'name' => 'SEWAAN SISTEM SIAR RAYA',
                'type' => 'I',
                'description' => '– Per Hari
                – Portable Amplifier (mikrofon) & LCD Projektor',
                'active' => true,
                'price' => '200.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'3',
                'min_person' =>'1',
            ],
            [
                'name' => 'SEWAAN SISTEM SIAR RAYA',
                'type' => 'I',
                'description' => '– Per Hari
                – Portable Amplifier (mikrofon) & LCD Projektor',
                'active' => true,
                'price' => '200.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'4',
                'min_person' =>'1',
            ],
            [
                'name' => 'PENGANGKUTAN BAS',
                'type' => 'J',
                'description' => 'Sekitar dalam Kampus UTM',
                'active' => true,
                'price' => '300.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'1',
                'min_person' =>'1',
            ],
            [
                'name' => 'PENGANGKUTAN BAS',
                'type' => 'J',
                'description' => 'Sekitar dalam Kampus UTM',
                'active' => true,
                'price' => '300.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'2',
                'min_person' =>'1',
            ],
            [
                'name' => 'PENGANGKUTAN BAS',
                'type' => 'J',
                'description' => 'Sekitar dalam Kampus UTM',
                'active' => true,
                'price' => '300.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'3',
                'min_person' =>'1',
            ],
            [
                'name' => 'PENGANGKUTAN BAS',
                'type' => 'J',
                'description' => 'Sekitar dalam Kampus UTM',
                'active' => true,
                'price' => '300.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=>'4',
                'min_person' =>'1',
            ],
            [
                'name' => 'SEWAAN KHEMAH',
                'type' => 'M',
                'description' => 'Per unit / penggunaan',
                'active' => true,
                'price' => '30.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=> NULL,
                'min_person' =>'1',
            ],
            [
                'name' => 'CERAMAH MOTIVASI',
                'type' => 'K',
                'description' => 'Tajuk Modul Ceramah (sila pilih):
                Motivasi Kepimpinan Pelajar
                Motivasi Pelajar Sanjungan Bangsa
                Teknik Belajar Berkesan
                Pengurusan Masa Efektif
                Komunikasi Berkesan
                Teknik Menjawab Soalan Peperiksaan
                Ceramah & Amali Sembelihan
                Muhasabah Diri
                Tazkirah Maghrib dan Subuh
                Asas Fardhu Ain
                Taklimat Pengambilan UTM bagi Diploma (UTM Space)
                Taklimat Pengambilan UTM bagi Ijazah Sarjana Muda (UTM SRAD)
                ',
                'active' => true,
                'price' => '150.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id'=> NULL,
                'min_person' =>'1',
            ],
           
        ];

        DB::table('package')->insert($packages);

        $this->enableForeignKeys();
    }
}
