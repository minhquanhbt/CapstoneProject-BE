<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kanji;
use App\Models\Vocabulary;
use App\Models\MeaningVietnamese;
use App\Models\ExampleVietnamese;

class VocabularySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1
        $vocabulary = Vocabulary::insertGetId(['Word' => '中日','Pronouce' => 'ちゅうにち', 'Level' => 'N5']);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Ngày giữa','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '中日間は本当にお互いを知り合うところまでは到達していない。', 
                                    'vietnamese_example' => 'Giữa Nhật Bản và Trung Quốc vẫn chưa đạt được sự hiểu biết thực sự.','meaning_id' => $meaning]);
        $kanji = Kanji::where('character', '中')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '日')->first();
        $kanji->vocabularies()->attach($vocabulary);
        // 2
        $vocabulary = Vocabulary::insertGetId(['Word' => '一月','Pronouce' => 'いちがつ', 'Level' => 'N5']);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Một tháng','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '電気代はいつも一月いくらかかりますか？', 
                                'vietnamese_example' => 'Tiền điện hàng tháng là bao nhiêu?','meaning_id' => $meaning]);
        $kanji = Kanji::where('character', '一')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '月')->first();
        $kanji->vocabularies()->attach($vocabulary);
        // 3
        $vocabulary = Vocabulary::insertGetId(['Word' => '中国','Pronouce' => 'くにびと', 'Level' => 'N5']);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Nước Trung Quốc; tên một hòn đảo phía Tây Nam Nhật Bản.','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '中国の自治区', 
                                'vietnamese_example' => 'Khu vực tự trị của Trung Quốc','meaning_id' => $meaning]);
        $kanji = Kanji::where('character', '中')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '国')->first();
        $kanji->vocabularies()->attach($vocabulary);
        // 4
        $vocabulary = Vocabulary::insertGetId(['Word' => '人出','Pronouce' => 'ひとで', 'Level' => 'N5']);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Đám đông; số người có mặt; số người hiện diện','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '大勢の人出でしたよ', 
                                'vietnamese_example' => 'Chúng tôi đã lấp đầy xà nhà.','meaning_id' => $meaning]);
        $kanji = Kanji::where('character', '出')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '人')->first();
        $kanji->vocabularies()->attach($vocabulary);
        // 5
        $vocabulary = Vocabulary::insertGetId(['Word' => '今年','Pronouce' => 'ことし / こんねん', 'Level' => 'N5']);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Năm nay','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '今年はトラ年です', 
                                'vietnamese_example' => 'Năm nay là năm con hổ.','meaning_id' => $meaning]);
        $kanji = Kanji::where('character', '今')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '年')->first();
        $kanji->vocabularies()->attach($vocabulary);
        // 6
        $vocabulary = Vocabulary::insertGetId(['Word' => '五月','Pronouce' => 'さつき / ごがつ', 'Level' => 'N5']);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Tháng Năm âm lịch .','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '五月五日は彼の誕生日だ', 
                                'vietnamese_example' => 'Sinh nhật của anh ấy là ngày 5 tháng Năm','meaning_id' => $meaning]);
        ExampleVietnamese::insert(['japanese_example' => '五月に彼は中国に行きます。', 
                                'vietnamese_example' => 'Anh ấy đi Trung Quốc vào tháng Năm.','meaning_id' => $meaning]);
        $kanji = Kanji::where('character', '五')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '月')->first();
        $kanji->vocabularies()->attach($vocabulary);
        // 7
        $vocabulary = Vocabulary::insertGetId(['Word' => '医大','Pronouce' => 'いだい', 'Level' => 'N4']);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Trường đại học y','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => 'ビルは結局医大に行くそうだ。', 
                                'vietnamese_example' => 'Có vẻ như Bill sẽ đi học y khoa.','meaning_id' => $meaning]);
        $kanji = Kanji::where('character', '大')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '医')->first();
        $kanji->vocabularies()->attach($vocabulary);
        // 8
        $vocabulary = Vocabulary::insertGetId(['Word' => '丸本','Pronouce' => 'まるぼん / まるほん / まるもと', 'Level' => 'N3']);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Bộ sách; trọn tập sách','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => 'あの丸本を参考にして、問題集を解いた。', 
                                'vietnamese_example' => 'Đọc và tham khảo tập sách đó, tôi đã giải được bộ đề.','meaning_id' => $meaning]);
        $kanji = Kanji::where('character', '本')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '丸')->first();
        $kanji->vocabularies()->attach($vocabulary);
        // 9
        $vocabulary = Vocabulary::insertGetId(['Word' => '医長','Pronouce' => 'いちょう', 'Level' => 'N4']);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Viện trưởng','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '私たちの病院の医長はとても能力が高いです。', 
                                'vietnamese_example' => 'Viện trưởng của chúng tôi là người có năng lực cao','meaning_id' => $meaning]);
        $kanji = Kanji::where('character', '医')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '長')->first();
        $kanji->vocabularies()->attach($vocabulary);
        // 10
        $vocabulary = Vocabulary::insertGetId(['Word' => '分引き','Pronouce' => 'ぶびき', 'Level' => 'N4']);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Chiết khấu','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => 'この鍋に料理を分引きしてください。', 
                                'vietnamese_example' => 'Hãy cho thức ăn vào chảo này.','meaning_id' => $meaning]);
        $kanji = Kanji::where('character', '分')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '引')->first();
        $kanji->vocabularies()->attach($vocabulary);
        // 11
        $vocabulary = Vocabulary::insertGetId(['Word' => '以前','Pronouce' => 'いぜん', 'Level' => 'N4']);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Trước đây; ngày trước','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '以前(人)と議論したことがある', 
                                'vietnamese_example' => 'Trước đây đã từng thảo luận với ai','meaning_id' => $meaning]);
        ExampleVietnamese::insert(['japanese_example' => '以前うそをついたことがあるので、その大臣は信頼性を欠いていた', 
                                'vietnamese_example' => 'Vì trước đây Bộ trưởng đã nói dối nên ông bị mất tín nhiệm','meaning_id' => $meaning]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Trước kia.','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '以前ちょうどここに商店があった', 
                                'vietnamese_example' => 'Đã từng có một cửa hàng ngay tại đây.','meaning_id' => $meaning]);
        ExampleVietnamese::insert(['japanese_example' => '以前より外食が増える', 
                                'vietnamese_example' => 'Số người đi ăn ở ngoài (đi ăn tiệm) tăng hơn so với trước đây .','meaning_id' => $meaning]);
        $kanji = Kanji::where('character', '以')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '前')->first();
        $kanji->vocabularies()->attach($vocabulary);
        // 12
        $vocabulary = Vocabulary::insertGetId(['Word' => '生糸','Pronouce' => 'きいと', 'Level' => 'N3']);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Tơ tằm; tơ','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => 'わが国の生糸の生産高は年々減少', 
                                'vietnamese_example' => 'Sản lượng tơ lụa của nước ta giảm theo từng năm.','meaning_id' => $meaning]);
        $kanji = Kanji::where('character', '生')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '糸')->first();
        $kanji->vocabularies()->attach($vocabulary);
        // 13
        $vocabulary = Vocabulary::insertGetId(['Word' => '羽化','Pronouce' => 'うか', 'Level' => 'N2']);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Quá trình ấp trứng của côn trùng hoặc chim để trở thành con trưởng thành','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '最近、庭にいためるすずめの卵が孵化し、すくすくと成長しています。', 
                                'vietnamese_example' => 'Gần đây, trứng chim sẻ trong sân vườn đã nở và phát triển nhanh chóng','meaning_id' => $meaning]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Sự phát triển, trưởng thành.','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '彼女は相変わらず立派な女性に羽化した。', 
                                'vietnamese_example' => 'Cô ấy vẫn tiếp tục phát triển trở thành một người phụ nữ tuyệt vời.','meaning_id' => $meaning]);
        $kanji = Kanji::where('character', '羽')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '化')->first();
        $kanji->vocabularies()->attach($vocabulary);
        // 14
        $vocabulary = Vocabulary::insertGetId(['Word' => '公算','Pronouce' => 'こうさん', 'Level' => 'N3']);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Xác suất; tỷ lệ xảy ra; khả năng xảy ra','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '成功の〜が大きい', 
                                'vietnamese_example' => 'Khả năng thành công là rất lớn.','meaning_id' => $meaning]);
        $kanji = Kanji::where('character', '公')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '算')->first();
        $kanji->vocabularies()->attach($vocabulary);
        // 15
        $vocabulary = Vocabulary::insertGetId(['Word' => '喫煙','Pronouce' => 'きつえん', 'Level' => 'N2']);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Sự hút thuốc','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '喫煙禁止', 
                                'vietnamese_example' => 'Cấm hút thuốc','meaning_id' => $meaning]);
        ExampleVietnamese::insert(['japanese_example' => '喫煙室', 
                                'vietnamese_example' => 'Phòng dành cho người hút thuốc','meaning_id' => $meaning]);
        ExampleVietnamese::insert(['japanese_example' => '喫煙が身体によくないことは事実である。', 
                                'vietnamese_example' => 'Có một thực tế là hút thuốc có hại cho sức khỏe.','meaning_id' => $meaning]);                                
        $kanji = Kanji::where('character', '喫')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '煙')->first();
        $kanji->vocabularies()->attach($vocabulary);
        // 16
        $vocabulary = Vocabulary::insertGetId(['Word' => '御中','Pronouce' => 'おんちゅう', 'Level' => 'N2']);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Kính thưa; kính gửi','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => 'A御中関係各位', 
                                'vietnamese_example' => 'Kính gửi tất cả quý vị có liên quan của công ty A','meaning_id' => $meaning]);
        $kanji = Kanji::where('character', '御')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '中')->first();
        $kanji->vocabularies()->attach($vocabulary);
        // 17
        $vocabulary = Vocabulary::insertGetId(['Word' => '二形','Pronouce' => 'ひとづき', 'Level' => 'N2']);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Lưỡng tính','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => 'カクレクマノミは二形な動物です', 
                                'vietnamese_example' => 'Cá hề là động vật lưỡng hình','meaning_id' => $meaning]);
        $kanji = Kanji::where('character', '二')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '形')->first();
        $kanji->vocabularies()->attach($vocabulary);
        // 18
        $vocabulary = Vocabulary::insertGetId(['Word' => '三原','Pronouce' => 'みはら', 'Level' => 'N2']);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'ba thứ căn bản','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '三原色を混合すると黒色ができる', 
                                'vietnamese_example' => 'Hỗn hợp của ba màu cơ bản có thể tạo ra màu đen.','meaning_id' => $meaning]);
        $kanji = Kanji::where('character', '三')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '原')->first();
        $kanji->vocabularies()->attach($vocabulary);
        // 19
        $vocabulary = Vocabulary::insertGetId(['Word' => '一戸','Pronouce' => 'いっこ / いちこ', 'Level' => 'N2']);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Một hộ gia đình','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '一戸建より共同住宅に住む世帯の増加率の方が高い', 
                                'vietnamese_example' => 'Tỷ lệ tăng hộ đối với nhà chung cư cao hơn so với nhà ở riêng lẻ','meaning_id' => $meaning]);
        $kanji = Kanji::where('character', '一')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '戸')->first();
        $kanji->vocabularies()->attach($vocabulary);
        // 20
        $vocabulary = Vocabulary::insertGetId(['Word' => '黄金','Pronouce' => 'おうごん / こがね / きがね / くがね', 'Level' => 'N2']);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Vàng; bằng vàng','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '黄金の像', 
                                'vietnamese_example' => 'Tượng vàng','meaning_id' => $meaning]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Vàng; tiền vàng','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '黄金の王国',
                                'vietnamese_example' => 'Vương quốc vàng (tiền vàng).','meaning_id' => $meaning]);
        $kanji = Kanji::where('character', '黄')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '金')->first();
        $kanji->vocabularies()->attach($vocabulary);
    }
}
