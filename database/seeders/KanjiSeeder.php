<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kanji;
use App\Models\Pronounce;

class KanjiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!(Kanji::exists())){
            // N5
            // 1
            Kanji::insert(['character' => '日','group' => 'Nhật','meaning' => 'ngày, mặt trời', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'nichi','Hiragana'=>'','Katakana'=>'ニチ','kanji_id'=>'1']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'jitsu','Hiragana'=>'','Katakana'=>'ジツ','kanji_id'=>'1']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'hi','Hiragana'=>'ひ','Katakana'=>'','kanji_id'=>'1']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'bi','Hiragana'=>'び','Katakana'=>'','kanji_id'=>'1']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'ka','Hiragana'=>'か','Katakana'=>'','kanji_id'=>'1']);
            // 2
            Kanji::insert(['character' => '一','group' => 'Nhất','meaning' => 'một, 1', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'ichi','Hiragana'=>'','Katakana'=>'イチ','kanji_id'=>'2']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'hito(tsu)','Hiragana'=>'ひと(つ)','Katakana'=>'','kanji_id'=>'2']);
            // 3
            Kanji::insert(['character' => '国','group' => 'Quốc','meaning' => 'đất nước', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'koku','Hiragana'=>'','Katakana'=>'コク','kanji_id'=>'3']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'kuni','Hiragana'=>'くに','Katakana'=>'','kanji_id'=>'3']);
            // 4
            Kanji::insert(['character' => '人','group' => 'Nhân','meaning' => 'người', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'jin','Hiragana'=>'','Katakana'=>'ジン','kanji_id'=>'4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'nin','Hiragana'=>'','Katakana'=>'ニン','kanji_id'=>'4']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'hito','Hiragana'=>'ひと','Katakana'=>'','kanji_id'=>'4']);
            // 5
            Kanji::insert(['character' => '年','group' => 'Niên','meaning' => 'năm, tuổi', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'nen','Hiragana'=>'','Katakana'=>'ネン','kanji_id'=>'5']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'toshi','Hiragana'=>'とし','Katakana'=>'','kanji_id'=>'5']);
            // 6
            Kanji::insert(['character' => '大','group' => 'Đại','meaning' => 'to, lớn', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'dai','Hiragana'=>'','Katakana'=>'ダイ','kanji_id'=>'6']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'tai','Hiragana'=>'','Katakana'=>'タイ','kanji_id'=>'6']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'oo(kii)','Hiragana'=>'おお(きい)','Katakana'=>'','kanji_id'=>'6']);
            // 7
            Kanji::insert(['character' => '十','group' => 'thập','meaning' => 'mười, 10', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'juu','Hiragana'=>'','Katakana'=>'ジュウ','kanji_id'=>'7']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'tou','Hiragana'=>'とお','Katakana'=>'','kanji_id'=>'7']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'to','Hiragana'=>'と','Katakana'=>'','kanji_id'=>'7']);
            // 8
            Kanji::insert(['character' => '二','group' => 'nhị','meaning' => 'hai, 2', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'ni','Hiragana'=>'','Katakana'=>'ニ','kanji_id'=>'8']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'ji','Hiragana'=>'','Katakana'=>'ジ','kanji_id'=>'8']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'futa(tsu)','Hiragana'=>'ふた(つ)','Katakana'=>'','kanji_id'=>'8']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'futatabi','Hiragana'=>'ふたたび','Katakana'=>'','kanji_id'=>'8']);
            // 9
            Kanji::insert(['character' => '本','group' => 'bản, bổn','meaning' => 'sách, nguồn gốc, nguyên bản, bản chất', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'hon','Hiragana'=>'','Katakana'=>'ホン','kanji_id'=>'9']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'moto','Hiragana'=>'もと','Katakana'=>'','kanji_id'=>'9']);
            // 10
            Kanji::insert(['character' => '中','group' => 'trung','meaning' => 'bên trong, trung tâm', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'chuu','Hiragana'=>'','Katakana'=>'チュウ','kanji_id'=>'10']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'naka','Hiragana'=>'なか','Katakana'=>'','kanji_id'=>'10']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'uchi','Hiragana'=>'うち','Katakana'=>'','kanji_id'=>'10']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'ata(ru)','Hiragana'=>'あた(る)','Katakana'=>'','kanji_id'=>'10']);
            // 11
            Kanji::insert(['character' => '長','group' => 'trường','meaning' => 'dài, lâu', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'chou','Hiragana'=>'','Katakana'=>'チョウ','kanji_id'=>'11']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'naga(i)','Hiragana'=>'なが(い)','Katakana'=>'','kanji_id'=>'11']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'osa','Hiragana'=>'おさ','Katakana'=>'','kanji_id'=>'11']);
            // 12
            Kanji::insert(['character' => '出','group' => 'xuất','meaning' => 'sự chảy ra, thoát ra', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'shutsu','Hiragana'=>'','Katakana'=>'シュツ','kanji_id'=>'12']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'sui','Hiragana'=>'','Katakana'=>'スイ','kanji_id'=>'12']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'de(ru)','Hiragana'=>'で(る)','Katakana'=>'','kanji_id'=>'12']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'da(su)','Hiragana'=>'だ(す)','Katakana'=>'','kanji_id'=>'12']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'i(deru)','Hiragana'=>'い(でる)','Katakana'=>'','kanji_id'=>'12']);
            // 13
            Kanji::insert(['character' => '三','group' => 'tam','meaning' => 'ba, 3', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'san','Hiragana'=>'','Katakana'=>'サン','kanji_id'=>'13']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'mi(tsu)','Hiragana'=>'み(つ)','Katakana'=>'','kanji_id'=>'13']);
            // 14
            Kanji::insert(['character' => '時','group' => 'thì','meaning' => 'thời gian, lúc', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'ji','Hiragana'=>'','Katakana'=>'ジ','kanji_id'=>'14']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'toki','Hiragana'=>'とき','Katakana'=>'','kanji_id'=>'14']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'doki','Hiragana'=>'どき','Katakana'=>'','kanji_id'=>'14']);
            // 15
            Kanji::insert(['character' => '行','group' => 'hành','meaning' => 'đi, hành trình, thực hiện, dòng, hàng', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'kou','Hiragana'=>'','Katakana'=>'コウ','kanji_id'=>'15']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'gyou','Hiragana'=>'','Katakana'=>'ギョウ','kanji_id'=>'15']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'an','Hiragana'=>'','Katakana'=>'アン','kanji_id'=>'15']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'i(ku)','Hiragana'=>'い(く)','Katakana'=>'','kanji_id'=>'15']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'yu(ku)','Hiragana'=>'ゆ(く)','Katakana'=>'','kanji_id'=>'15']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'okona(u)' ,'Hiragana'=>'おこな(う)','Katakana'=>'','kanji_id'=>'15']);
            // 16
            Kanji::insert(['character' => '見','group' => 'kiến','meaning' => 'gặp, thấy', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'ken','Hiragana'=>'','Katakana'=>'ケン','kanji_id'=>'16']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'mi(ru)','Hiragana'=>'み(る)','Katakana'=>'','kanji_id'=>'16']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'mi(seru)','Hiragana'=>'み(せる)','Katakana'=>'','kanji_id'=>'16']);
            // 17
            Kanji::insert(['character' => '今','group' => 'kim','meaning' => 'nay, bây giờ', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'kon','Hiragana'=>'','Katakana'=>'コン','kanji_id'=>'17']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'kin','Hiragana'=>'','Katakana'=>'キン  ','kanji_id'=>'17']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'ima','Hiragana'=>'いま','Katakana'=>'','kanji_id'=>'17']);
            // 18
            Kanji::insert(['character' => '月','group' => 'nguyệt','meaning' => 'tháng, mặt trăng', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'getsu','Hiragana'=>'','Katakana'=>'ゲツ','kanji_id'=>'18']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'gatsu','Hiragana'=>'','Katakana'=>'ガツ','kanji_id'=>'18']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'tsuki','Hiragana'=>'つき','Katakana'=>'','kanji_id'=>'18']);
            // 19
            Kanji::insert(['character' => '分','group' => 'phân','meaning' => 'phần, phút, phân chia, hiểu', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'bun','Hiragana'=>'','Katakana'=>'ブン','kanji_id'=>'19']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'fun','Hiragana'=>'','Katakana'=>'フン','kanji_id'=>'19']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'bu','Hiragana'=>'','Katakana'=>'ブ','kanji_id'=>'19']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'wa(keru)','Hiragana'=>'わ(ける)','Katakana'=>'','kanji_id'=>'19']);
            // 20
            Kanji::insert(['character' => '後','group' => 'hậu','meaning' => 'sau, phía sau', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'go','Hiragana'=>'','Katakana'=>'ゴ','kanji_id'=>'20']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'kou','Hiragana'=>'','Katakana'=>'コウ','kanji_id'=>'20']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'nochi','Hiragana'=>'のち','Katakana'=>'','kanji_id'=>'20']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'ushi(ro)','Hiragana'=>'うし(ろ)','Katakana'=>'','kanji_id'=>'20']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'ato','Hiragana'=>'あと','Katakana'=>'','kanji_id'=>'20']);
            // 21
            Kanji::insert(['character' => '前','group' => 'tiền','meaning' => 'trước, phía trước', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'zen','Hiragana'=>'','Katakana'=>'ゼン','kanji_id'=>'21']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'mae','Hiragana'=>'まえ','Katakana'=>'','kanji_id'=>'21']);
            // 22
            Kanji::insert(['character' => '生','group' => 'sinh','meaning' => 'sống, sinh đẻ', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'sei','Hiragana'=>'','Katakana'=>'セイ','kanji_id'=>'22']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'shou','Hiragana'=>'','Katakana'=>'ショウ','kanji_id'=>'22']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'i(kiru)','Hiragana'=>'い(きる)','Katakana'=>'','kanji_id'=>'22']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'u(mu)','Hiragana'=>'う(む)','Katakana'=>'','kanji_id'=>'22']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'o(u)','Hiragana'=>'お(う)','Katakana'=>'','kanji_id'=>'22']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'ha(eru)','Hiragana'=>'は(える)','Katakana'=>'','kanji_id'=>'22']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'nama','Hiragana'=>'なま','Katakana'=>'','kanji_id'=>'22']);
            // 23
            Kanji::insert(['character' => '五','group' => 'ngũ','meaning' => 'năm, 5', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'go','Hiragana'=>'','Katakana'=>'ゴ','kanji_id'=>'23']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'itsu(tsu)','Hiragana'=>'いつ(つ)','Katakana'=>'','kanji_id'=>'23']);
            // 24
            Kanji::insert(['character' => '間','group' => 'gian','meaning' => 'khoảng không gian', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'kan','Hiragana'=>'','Katakana'=>'カン','kanji_id'=>'24']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'ken','Hiragana'=>'','Katakana'=>'ケン','kanji_id'=>'24']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'aida','Hiragana'=>'あいだ','Katakana'=>'','kanji_id'=>'24']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'ma','Hiragana'=>'ま','Katakana'=>'','kanji_id'=>'24']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'ai','Hiragana'=>'あい','Katakana'=>'','kanji_id'=>'24']);
            // 25
            Kanji::insert(['character' => '上','group' => 'thượng','meaning' => 'đi lên, ở phía trên', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'jou','Hiragana'=>'','Katakana'=>'ジョウ','kanji_id'=>'25']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'shou','Hiragana'=>'','Katakana'=>'ショウ','kanji_id'=>'25']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'shan','Hiragana'=>'','Katakana'=>'シャン','kanji_id'=>'25']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'ue','Hiragana'=>'うえ','Katakana'=>'','kanji_id'=>'25']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'uwa','Hiragana'=>'うわ','Katakana'=>'','kanji_id'=>'25']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'kami','Hiragana'=>'かみ','Katakana'=>'','kanji_id'=>'25']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'a(geru)','Hiragana'=>'あ(げる)','Katakana'=>'','kanji_id'=>'25']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'nobo(ru)','Hiragana'=>'のぼ(る)','Katakana'=>'','kanji_id'=>'25']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'tatematsu(ru)','Hiragana'=>'たてまつ(る)','Katakana'=>'','kanji_id'=>'25']);
            // 26
            Kanji::insert(['character' => '東','group' => 'đông','meaning' => 'phía đông, phía đông', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'tou','Hiragana'=>'','Katakana'=>'トウ','kanji_id'=>'26']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'higashi','Hiragana'=>'ひがし','Katakana'=>'','kanji_id'=>'26']);
            // 27
            Kanji::insert(['character' => '四','group' => 'tứ','meaning' => 'bốn, 4', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'shi','Hiragana'=>'','Katakana'=>'シ','kanji_id'=>'27']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'yo(tsu)','Hiragana'=>'よ(つ)','Katakana'=>'','kanji_id'=>'27']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'yon','Hiragana'=>'よん','Katakana'=>'','kanji_id'=>'27']);
            // 28
            Kanji::insert(['character' => '金','group' => 'kim','meaning' => 'vàng, tiền', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'kin','Hiragana'=>'','Katakana'=>'キン','kanji_id'=>'28']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'kon','Hiragana'=>'','Katakana'=>'コン','kanji_id'=>'28']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'gon','Hiragana'=>'','Katakana'=>'ゴン','kanji_id'=>'28']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'kane','Hiragana'=>'かね','Katakana'=>'','kanji_id'=>'28']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'kana','Hiragana'=>'かな','Katakana'=>'','kanji_id'=>'28']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'gane','Hiragana'=>'がね','Katakana'=>'','kanji_id'=>'28']);
            // 29 
            Kanji::insert(['character' => '九','group' => 'cửu','meaning' => 'chín, 9', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'kyuu','Hiragana'=>'','Katakana'=>'キュウ','kanji_id'=>'29']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'ku','Hiragana'=>'','Katakana'=>'ク','kanji_id'=>'29']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'kokono(tsu)','Hiragana'=>'ここの(つ)','Katakana'=>'','kanji_id'=>'29']);
            // 30 
            Kanji::insert(['character' => '入','group' => 'nhập','meaning' => 'vào trong', 'level' => 'N5']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'nyuu','Hiragana'=>'','Katakana'=>'ニュウ','kanji_id'=>'30']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'i(ru)','Hiragana'=>'い(る)','Katakana'=>'','kanji_id'=>'30']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'hai(ru)','Hiragana'=>'はい(る)','Katakana'=>'','kanji_id'=>'30']);
            // N4
            // 1
            Kanji::insert(['character' => '悪','group' => 'ác','meaning' => 'tồi, xấu', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'aku','Hiragana'=>'','Katakana'=>'アク','kanji_id'=>'31']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'o','Hiragana'=>'','Katakana'=>'オ','kanji_id'=>'31']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'waru(i)','Hiragana'=>'わる(い)','Katakana'=>'','kanji_id'=>'31']);
            // 2
            Kanji::insert(['character' => '暗','group' => 'ám','meaning' => 'tối', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'an','Hiragana'=>'','Katakana'=>'アン','kanji_id'=>'32']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'kura(i)','Hiragana'=>'くら(い)','Katakana'=>'','kanji_id'=>'32']);
            // 3
            Kanji::insert(['character' => '医','group' => 'y','meaning' => 'y học, y tế', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'i','Hiragana'=>'','Katakana'=>'イ','kanji_id'=>'33']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'i(suru)','Hiragana'=>'い(する)','Katakana'=>'','kanji_id'=>'33']);
            // 4
            Kanji::insert(['character' => '意','group' => 'ý','meaning' => 'ý chí, ý định', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'i','Hiragana'=>'','Katakana'=>'イ','kanji_id'=>'34']);
            // 5
            Kanji::insert(['character' => '以','group' => 'dĩ','meaning' => 'lấy, làm, dĩ (làm tiền tố)', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'i','Hiragana'=>'','Katakana'=>'イ','kanji_id'=>'35']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'motte','Hiragana'=>'もっ(て)','Katakana'=>'','kanji_id'=>'35']);
            // 6
            Kanji::insert(['character' => '引','group' => 'dẫn','meaning' => 'kéo, giảm (giá)', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'in','Hiragana'=>'','Katakana'=>'イン','kanji_id'=>'36']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'hi(ku)','Hiragana'=>'ひ(く)','Katakana'=>'','kanji_id'=>'36']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'hi(keru)','Hiragana'=>'ひ(ける)','Katakana'=>'','kanji_id'=>'36']);
            // 7
            Kanji::insert(['character' => '院','group' => 'viện','meaning' => 'viện', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'in','Hiragana'=>'','Katakana'=>'イン','kanji_id'=>'37']);
            // 8
            Kanji::insert(['character' => '員   ','group' => 'viên','meaning' => '(nhân) viên', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'in','Hiragana'=>'','Katakana'=>'イン','kanji_id'=>'38']);
            // 9
            Kanji::insert(['character' => '運','group' => 'vận','meaning' => 'số phận, vận chuyển, mang/vác', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'un','Hiragana'=>'','Katakana'=>'ウン','kanji_id'=>'39']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'hako(bu)','Hiragana'=>'はこ(ぶ)','Katakana'=>'','kanji_id'=>'39']);
            // 10
            Kanji::insert(['character' => '英','group' => 'anh','meaning' => 'Anh (nước Anh), tinh túy, thiên tài', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'ei','Hiragana'=>'','Katakana'=>'エイ','kanji_id'=>'40']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'hanabusa','Hiragana'=>'はなぶさ','Katakana'=>'','kanji_id'=>'40']);
            // 11
            Kanji::insert(['character' => '映','group' => 'ảnh','meaning' => 'chiếu (phim), chiếu sáng', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'ei','Hiragana'=>'','Katakana'=>'エイ','kanji_id'=>'41']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'utsu(su)','Hiragana'=>'うつ(す)','Katakana'=>'','kanji_id'=>'41']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'ha(eru)','Hiragana'=>'は(える)','Katakana'=>'','kanji_id'=>'41']);
            // 12
            Kanji::insert(['character' => '遠','group' => 'viễn','meaning' => 'xa', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'en','Hiragana'=>'','Katakana'=>'エン','kanji_id'=>'42']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'on','Hiragana'=>'','Katakana'=>'オン','kanji_id'=>'42']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'too(i)','Hiragana'=>'とお（い）','Katakana'=>'','kanji_id'=>'42']);
            // 13
            Kanji::insert(['character' => '屋','group' => 'ốc','meaning' => 'căn phòng', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'oku','Hiragana'=>'','Katakana'=>'オク','kanji_id'=>'43']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'ya','Hiragana'=>'や','Katakana'=>'','kanji_id'=>'43']);
            // 14
            Kanji::insert(['character' => '音','group' => 'âm','meaning' => 'âm thanh', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'on','Hiragana'=>'','Katakana'=>'オン','kanji_id'=>'44']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'in','Hiragana'=>'','Katakana'=>'イン','kanji_id'=>'44']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'non','Hiragana'=>'','Katakana'=>'ノン','kanji_id'=>'44']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'oto','Hiragana'=>'おと','Katakana'=>'','kanji_id'=>'44']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'ne','Hiragana'=>'ね','Katakana'=>'','kanji_id'=>'44']);
            // 15
            Kanji::insert(['character' => '歌','group' => 'ca','meaning' => 'hát', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'ka','Hiragana'=>'','Katakana'=>'カ','kanji_id'=>'45']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'uta','Hiragana'=>'うた','Katakana'=>'','kanji_id'=>'45']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'uta(u)','Hiragana'=>'うた（う）','Katakana'=>'','kanji_id'=>'45']);
            // 16
            Kanji::insert(['character' => '夏','group' => 'hạ','meaning' => 'mùa hè', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'ka','Hiragana'=>'','Katakana'=>'カ','kanji_id'=>'46']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'ga','Hiragana'=>'','Katakana'=>'ガ','kanji_id'=>'46']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'ge','Hiragana'=>'','Katakana'=>'ゲ','kanji_id'=>'46']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'natsu','Hiragana'=>'なつ','Katakana'=>'','kanji_id'=>'46']);
            // 17
            Kanji::insert(['character' => '家','group' => 'gia','meaning' => 'nhà', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'ka','Hiragana'=>'','Katakana'=>'カ','kanji_id'=>'47']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'ke','Hiragana'=>'','Katakana'=>'ケ','kanji_id'=>'47']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'ie','Hiragana'=>'いえ','Katakana'=>'','kanji_id'=>'47']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'ya','Hiragana'=>'や','Katakana'=>'','kanji_id'=>'47']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'uchi','Hiragana'=>'うち','Katakana'=>'','kanji_id'=>'47']);
            // 18
            Kanji::insert(['character' => '画','group' => 'hoạ','meaning' => 'hình ảnh', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'ga','Hiragana'=>'','Katakana'=>'ガ','kanji_id'=>'48']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'kaku','Hiragana'=>'','Katakana'=>'カク','kanji_id'=>'48']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'e','Hiragana'=>'','Katakana'=>'エ','kanji_id'=>'48']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'hakarigoto','Hiragana'=>'はかりごと','Katakana'=>'','kanji_id'=>'48']);
            // 19
            Kanji::insert(['character' => '海','group' => 'hải','meaning' => 'biển', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'kai','Hiragana'=>'','Katakana'=>'カイ','kanji_id'=>'49']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'umi','Hiragana'=>'うみ','Katakana'=>'','kanji_id'=>'49']);
            // 20
            Kanji::insert(['character' => '回','group' => 'hồi','meaning' => 'lần', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'kai','Hiragana'=>'','Katakana'=>'カイ','kanji_id'=>'50']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'mawa(su)','Hiragana'=>'まわ（す）','Katakana'=>'','kanji_id'=>'50']);
            // 21
            Kanji::insert(['character' => '開','group' => 'khai','meaning' => 'mở, phát triển', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'kai','Hiragana'=>'','Katakana'=>'カイ','kanji_id'=>'51']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'a(keru)','Hiragana'=>'あ（ける）','Katakana'=>'','kanji_id'=>'51']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'hira(ku)','Hiragana'=>'ひら（く）','Katakana'=>'','kanji_id'=>'51']);
            // 22
            Kanji::insert(['character' => '界','group' => 'giới ','meaning' => 'thế giới', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'kai','Hiragana'=>'','Katakana'=>'カイ','kanji_id'=>'52']);
            // 23
            Kanji::insert(['character' => '楽','group' => 'lạc','meaning' => 'nhạc, niềm vui, sự vui vẻ', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'gaku','Hiragana'=>'','Katakana'=>'がく','kanji_id'=>'53']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'raku','Hiragana'=>'','Katakana'=>'らく','kanji_id'=>'53']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'tano(shii)','Hiragana'=>'たの（しい）','Katakana'=>'','kanji_id'=>'53']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'tano(shimu)','Hiragana'=>'たの（しむ）','Katakana'=>'','kanji_id'=>'53']);
            // 24
            Kanji::insert(['character' => '館','group' => 'quán','meaning' => 'quán, sảnh lớn, tòa nhà', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'kan','Hiragana'=>'','Katakana'=>'カン','kanji_id'=>'54']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'yakata','Hiragana'=>'','Katakana'=>'やかた','kanji_id'=>'54']);
            // 25
            Kanji::insert(['character' => '漢','group' => 'hán','meaning' => '', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'kan','Hiragana'=>'','Katakana'=>'カン','kanji_id'=>'55']);
            // 26
            Kanji::insert(['character' => '寒','group' => 'hàn','meaning' => 'lạnh', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'kan','Hiragana'=>'','Katakana'=>'カン','kanji_id'=>'56']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'samu(i)','Hiragana'=>'さむ（い）','Katakana'=>'','kanji_id'=>'56']);
            // 27
            Kanji::insert(['character' => '顔','group' => 'nhan','meaning' => 'mặt', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'gan','Hiragana'=>'','Katakana'=>'ガン','kanji_id'=>'57']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'kao','Hiragana'=>'かお','Katakana'=>'','kanji_id'=>'57']);
            // 28
            Kanji::insert(['character' => '帰','group' => 'quy','meaning' => 'quay về', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'ki','Hiragana'=>'','Katakana'=>'キ','kanji_id'=>'58']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'kae(ru)','Hiragana'=>'','Katakana'=>'かえ（る）','kanji_id'=>'58']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'kae(su)','Hiragana'=>'','Katakana'=>'かえ（す）','kanji_id'=>'58']);
            // 29
            Kanji::insert(['character' => '起','group' => 'khởi','meaning' => '(ngủ) dậy, gây ra', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'ki','Hiragana'=>'','Katakana'=>'キ','kanji_id'=>'59']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'o(kiru)','Hiragana'=>'お（きる）','Katakana'=>'','kanji_id'=>'59']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'o(kosu)','Hiragana'=>'お（こす）','Katakana'=>'','kanji_id'=>'59']);
            // 30
            Kanji::insert(['character' => '究','group' => 'cứu','meaning' => 'khám phá, tìm hiểu', 'level' => 'N4']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'kyuu','Hiragana'=>'','Katakana'=>'キュウ    ','kanji_id'=>'60']);
            Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>'kiwa(meru)','Hiragana'=>'きわ（める）','Katakana'=>'','kanji_id'=>'60']);
            // N3
            // 1
            Kanji::insert(['character' => '王','group' => 'Vương','meaning' => 'vua', 'level' => 'N3']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'ou','Hiragana'=>'','Katakana'=>'オウ','kanji_id'=>'61']);
            Pronounce::insert(['Type'=>'Onyomi','Romanji'=>'-nou','Hiragana'=>'','Katakana'=>'ノウ','kanji_id'=>'61']);
        }
    }
}
