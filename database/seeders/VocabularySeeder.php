<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kanji;
use App\Models\Vocabulary;
use App\Models\MeaningVietnamese;
use App\Models\ExampleVietnamese;
use App\Models\missPronounces;

class VocabularySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1
        $vocabulary = Vocabulary::insertGetId(['word' => '中日','pronounce' => 'ちゅうにち', 'level' => 5]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Ngày giữa','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '中日間は本当にお互いを知り合うところまでは到達していない。', 
                                    'vietnamese_example' => 'Giữa Nhật Bản và Trung Quốc vẫn chưa đạt được sự hiểu biết thực sự.','meaning_vietnamese_id' => $meaning]);
        $kanji = Kanji::where('character', '中')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '日')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $sample = missPronounces::insert(['pronounce' => 'ちゅにち' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'なかひ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'ちゅひ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'ちゅうひ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'なかにち' ,'vocabulary_id' => $vocabulary]);
        // 2
        $vocabulary = Vocabulary::insertGetId(['word' => '一月','pronounce' => 'いちがつ', 'level' => 5]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Một tháng','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '電気代はいつも一月いくらかかりますか？', 
                                'vietnamese_example' => 'Tiền điện hàng tháng là bao nhiêu?','meaning_vietnamese_id' => $meaning]);
        $kanji = Kanji::where('character', '一')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '月')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $sample = missPronounces::insert(['pronounce' => 'いちかつ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'ひとがつ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'ひとつき' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'ひとげつ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'いちつき' ,'vocabulary_id' => $vocabulary]);
        // 3
        $vocabulary = Vocabulary::insertGetId(['word' => '中国','pronounce' => 'ちゅうごく', 'level' => 5]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Nước Trung Quốc; tên một hòn đảo phía Tây Nam Nhật Bản.','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '中国の自治区', 
                                'vietnamese_example' => 'Khu vực tự trị của Trung Quốc','meaning_vietnamese_id' => $meaning]);
        $kanji = Kanji::where('character', '中')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '国')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $sample = missPronounces::insert(['pronounce' => 'ちゅうこく' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'なかくに' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'なかこく' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'なかごく' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'ちゅうくに' ,'vocabulary_id' => $vocabulary]);
        // 4
        $vocabulary = Vocabulary::insertGetId(['word' => '人出','pronounce' => 'ひとで', 'level' => 5]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Đám đông; số người có mặt; số người hiện diện','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '大勢の人出でしたよ', 
                                'vietnamese_example' => 'Chúng tôi đã lấp đầy xà nhà.','meaning_vietnamese_id' => $meaning]);
        $kanji = Kanji::where('character', '出')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '人')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $sample = missPronounces::insert(['pronounce' => 'ひとしゅつ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'じんしゅつ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'じんで' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'じんだ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'ひとだ' ,'vocabulary_id' => $vocabulary]);
        // 5
        $vocabulary = Vocabulary::insertGetId(['word' => '今年','pronounce' => 'ことし / こんねん', 'level' => 5]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Năm nay','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '今年はトラ年です', 
                                'vietnamese_example' => 'Năm nay là năm con hổ.','meaning_vietnamese_id' => $meaning]);
        $kanji = Kanji::where('character', '今')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '年')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $sample = missPronounces::insert(['pronounce' => 'こんとし / こねん' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'いまとし / いねん' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'こんとし / きょねん' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'こんとし / きんねん' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'きんとし / こねん' ,'vocabulary_id' => $vocabulary]);
        // 6
        $vocabulary = Vocabulary::insertGetId(['word' => '五月','pronounce' => 'さつき / ごがつ', 'level' => 5]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Tháng Năm âm lịch .','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '五月五日は彼の誕生日だ', 
                                'vietnamese_example' => 'Sinh nhật của anh ấy là ngày 5 tháng Năm','meaning_vietnamese_id' => $meaning]);
        ExampleVietnamese::insert(['japanese_example' => '五月に彼は中国に行きます。', 
                                'vietnamese_example' => 'Anh ấy đi Trung Quốc vào tháng Năm.','meaning_vietnamese_id' => $meaning]);
        $kanji = Kanji::where('character', '五')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '月')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $sample = missPronounces::insert(['pronounce' => 'いつき / ごがつ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'さつき / いつがつ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'ごつき / さがつ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'いつつき / ごがつ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'ごつき / いつがつ' ,'vocabulary_id' => $vocabulary]);
        // 7
        $vocabulary = Vocabulary::insertGetId(['word' => '医大','pronounce' => 'いだい', 'level' => 4]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Trường đại học y','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => 'ビルは結局医大に行くそうだ。', 
                                'vietnamese_example' => 'Có vẻ như Bill sẽ đi học y khoa.','meaning_vietnamese_id' => $meaning]);
        $kanji = Kanji::where('character', '大')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '医')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $sample = missPronounces::insert(['pronounce' => 'いたい' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'いいた' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'いいたい' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'いいだ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'いいだい' ,'vocabulary_id' => $vocabulary]);
        // 8
        $vocabulary = Vocabulary::insertGetId(['word' => '丸本','pronounce' => 'まるぼん', 'level' => 3]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Bộ sách; trọn tập sách','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => 'あの丸本を参考にして、問題集を解いた。', 
                                'vietnamese_example' => 'Đọc và tham khảo tập sách đó, tôi đã giải được bộ đề.','meaning_vietnamese_id' => $meaning]);
        $kanji = Kanji::where('character', '本')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '丸')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $sample = missPronounces::insert(['pronounce' => 'めるぼん' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'めるほん' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'めるもと' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'がんぼん' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'がんほん' ,'vocabulary_id' => $vocabulary]);
        // 9
        $vocabulary = Vocabulary::insertGetId(['word' => '医長','pronounce' => 'いちょう', 'level' => 4]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Viện trưởng','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '私たちの病院の医長はとても能力が高いです。', 
                                'vietnamese_example' => 'Viện trưởng của chúng tôi là người có năng lực cao','meaning_vietnamese_id' => $meaning]);
        $kanji = Kanji::where('character', '医')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '長')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $sample = missPronounces::insert(['pronounce' => 'いちう' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'いなか' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'いいちょう' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'いいちょ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'いちょ' ,'vocabulary_id' => $vocabulary]);
        // 10
        $vocabulary = Vocabulary::insertGetId(['word' => '分引き','pronounce' => 'ぶびき', 'level' => 4]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Chiết khấu','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => 'この鍋に料理を分引きしてください。', 
                                'vietnamese_example' => 'Hãy cho thức ăn vào chảo này.','meaning_vietnamese_id' => $meaning]);
        $kanji = Kanji::where('character', '分')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '引')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $sample = missPronounces::insert(['pronounce' => 'ぶひき' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'ふひき' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'ふびき' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'ふうひき' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'ぶうひき' ,'vocabulary_id' => $vocabulary]);
        // 11
        $vocabulary = Vocabulary::insertGetId(['word' => '以前','pronounce' => 'いぜん', 'level' => 4]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Trước đây; ngày trước','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '以前(人)と議論したことがある', 
                                'vietnamese_example' => 'Trước đây đã từng thảo luận với ai','meaning_vietnamese_id' => $meaning]);
        ExampleVietnamese::insert(['japanese_example' => '以前うそをついたことがあるので、その大臣は信頼性を欠いていた', 
                                'vietnamese_example' => 'Vì trước đây Bộ trưởng đã nói dối nên ông bị mất tín nhiệm','meaning_vietnamese_id' => $meaning]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Trước kia.','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '以前ちょうどここに商店があった', 
                                'vietnamese_example' => 'Đã từng có một cửa hàng ngay tại đây.','meaning_vietnamese_id' => $meaning]);
        ExampleVietnamese::insert(['japanese_example' => '以前より外食が増える', 
                                'vietnamese_example' => 'Số người đi ăn ở ngoài (đi ăn tiệm) tăng hơn so với trước đây .','meaning_vietnamese_id' => $meaning]);
        $kanji = Kanji::where('character', '以')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '前')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $sample = missPronounces::insert(['pronounce' => 'いせん' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'いまえ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'もっせん' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'もっぜん' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'もっまえ' ,'vocabulary_id' => $vocabulary]);
        // 12
        $vocabulary = Vocabulary::insertGetId(['word' => '生糸','pronounce' => 'きいと', 'level' => 3]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Tơ tằm; tơ','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => 'わが国の生糸の生産高は年々減少', 
                                'vietnamese_example' => 'Sản lượng tơ lụa của nước ta giảm theo từng năm.','meaning_vietnamese_id' => $meaning]);
        $kanji = Kanji::where('character', '生')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '糸')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $sample = missPronounces::insert(['pronounce' => 'きと' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'きいとう' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'きとう' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'せいと' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'せいとう' ,'vocabulary_id' => $vocabulary]);
        // 13
        $vocabulary = Vocabulary::insertGetId(['word' => '羽化','pronounce' => 'うか', 'level' => 2]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Quá trình ấp trứng của côn trùng hoặc chim để trở thành con trưởng thành','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '最近、庭にいためるすずめの卵が孵化し、すくすくと成長しています。', 
                                'vietnamese_example' => 'Gần đây, trứng chim sẻ trong sân vườn đã nở và phát triển nhanh chóng','meaning_vietnamese_id' => $meaning]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Sự phát triển, trưởng thành.','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '彼女は相変わらず立派な女性に羽化した。', 
                                'vietnamese_example' => 'Cô ấy vẫn tiếp tục phát triển trở thành một người phụ nữ tuyệt vời.','meaning_vietnamese_id' => $meaning]);
        $kanji = Kanji::where('character', '羽')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '化')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $sample = missPronounces::insert(['pronounce' => 'はねか' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'わか' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'はか' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'うけ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'わけ' ,'vocabulary_id' => $vocabulary]);
        // 14
        $vocabulary = Vocabulary::insertGetId(['word' => '公算','pronounce' => 'こうさん', 'level' => 3]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Xác suất; tỷ lệ xảy ra; khả năng xảy ra','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '成功の公算が大きい', 
                                'vietnamese_example' => 'Khả năng thành công là rất lớn.','meaning_vietnamese_id' => $meaning]);
        $kanji = Kanji::where('character', '公')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '算')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $sample = missPronounces::insert(['pronounce' => 'こさん' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'くさん' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'こせん' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'くうさん' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'こうさ' ,'vocabulary_id' => $vocabulary]);
        // 15
        $vocabulary = Vocabulary::insertGetId(['word' => '喫煙','pronounce' => 'きつえん', 'level' => 2]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Sự hút thuốc','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '喫煙禁止', 
                                'vietnamese_example' => 'Cấm hút thuốc','meaning_vietnamese_id' => $meaning]);
        ExampleVietnamese::insert(['japanese_example' => '喫煙室', 
                                'vietnamese_example' => 'Phòng dành cho người hút thuốc','meaning_vietnamese_id' => $meaning]);
        ExampleVietnamese::insert(['japanese_example' => '喫煙が身体によくないことは事実である。', 
                                'vietnamese_example' => 'Có một thực tế là hút thuốc có hại cho sức khỏe.','meaning_vietnamese_id' => $meaning]);                                
        $kanji = Kanji::where('character', '喫')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '煙')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $sample = missPronounces::insert(['pronounce' => 'きえん' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'きつえ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'のむえん' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'きつうえ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'きつうえん' ,'vocabulary_id' => $vocabulary]);
        // 16
        $vocabulary = Vocabulary::insertGetId(['word' => '御中','pronounce' => 'おんちゅう', 'level' => 2]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Kính thưa; kính gửi','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => 'A御中関係各位', 
                                'vietnamese_example' => 'Kính gửi tất cả quý vị có liên quan của công ty A','meaning_vietnamese_id' => $meaning]);
        $kanji = Kanji::where('character', '御')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '中')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $sample = missPronounces::insert(['pronounce' => 'おちゅう' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'おんちゅ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'おちゅ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'おんなか' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'ぎょちゅう' ,'vocabulary_id' => $vocabulary]);
        // 17
        $vocabulary = Vocabulary::insertGetId(['word' => '二形','pronounce' => 'ふたなり', 'level' => 2]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Lưỡng tính','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => 'カクレクマノミは二形な動物です', 
                                'vietnamese_example' => 'Cá hề là động vật lưỡng hình','meaning_vietnamese_id' => $meaning]);
        $kanji = Kanji::where('character', '二')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '形')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $sample = missPronounces::insert(['pronounce' => 'ふたなり' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'ふたたび' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'になり' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'にけい' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'にぎょう' ,'vocabulary_id' => $vocabulary]);
        // 18
        $vocabulary = Vocabulary::insertGetId(['word' => '三原','pronounce' => 'みはら', 'level' => 2]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'ba thứ căn bản','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '三原色を混合すると黒色ができる', 
                                'vietnamese_example' => 'Hỗn hợp của ba màu cơ bản có thể tạo ra màu đen.','meaning_vietnamese_id' => $meaning]);
        $kanji = Kanji::where('character', '三')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '原')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $sample = missPronounces::insert(['pronounce' => 'みっげん' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'さんはら' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'さんげん' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'みげん' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'みつげん' ,'vocabulary_id' => $vocabulary]);
        // 19
        $vocabulary = Vocabulary::insertGetId(['word' => '一戸','pronounce' => 'いちこ', 'level' => 2]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Một hộ gia đình','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '一戸建より共同住宅に住む世帯の増加率の方が高い', 
                                'vietnamese_example' => 'Tỷ lệ tăng hộ đối với nhà chung cư cao hơn so với nhà ở riêng lẻ','meaning_vietnamese_id' => $meaning]);
        $kanji = Kanji::where('character', '一')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '戸')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $sample = missPronounces::insert(['pronounce' => 'ひとこ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'いしこ' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'ひとと' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'いちと' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'いっと' ,'vocabulary_id' => $vocabulary]);
        // 20
        $vocabulary = Vocabulary::insertGetId(['word' => '黄金','pronounce' => 'おうごん / こがね / きがね / くがね', 'level' => 2]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Vàng; bằng vàng','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '黄金の像', 
                                'vietnamese_example' => 'Tượng vàng','meaning_vietnamese_id' => $meaning]);
        $meaning = MeaningVietnamese::insertGetId(['meaning' => 'Vàng; tiền vàng','vocabulary_id' => $vocabulary]);
        ExampleVietnamese::insert(['japanese_example' => '黄金の王国',
                                'vietnamese_example' => 'Vương quốc vàng (tiền vàng).','meaning_vietnamese_id' => $meaning]);
        $kanji = Kanji::where('character', '黄')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $kanji = Kanji::where('character', '金')->first();
        $kanji->vocabularies()->attach($vocabulary);
        $sample = missPronounces::insert(['pronounce' => 'おうごん / ごがね / きかね / くかね' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'おごん / こうがね / きいがね / くうがね' ,'vocabulary_id' => $vocabulary]);
        $sample = missPronounces::insert(['pronounce' => 'きごん / こんがね / おうがね / きんがね' ,'vocabulary_id' => $vocabulary]);
    }
}
