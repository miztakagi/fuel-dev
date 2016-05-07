<!-- MAIN -->
<div id="main">
    <!-- CONTAINER -->
    <div class="container">

        <!-- FILTER TAB -->
        <ul id="filter" class="uk-subnav uk-subnav-pill">
            <li class="uk-active" data-uk-filter=""><a href="#">すべて</a></li>
            <li data-uk-filter="na" class=""><a href="#">ノベル</a></li>
            <li data-uk-filter="ca" class=""><a href="#">コミック</a></li>
            <li data-uk-filter="ar" class=""><a href="#">アート</a></li>
            <li data-uk-filter="ad" class=""><a href="#">アダルト</a></li>
            <li data-uk-filter="et" class=""><a href="#">その他</a></li>
            <li data-uk-filter="info" class=""><a href="#">インフォ00</a></li>
        </ul>
        <!-- END FILTER TAB -->

        <!-- メッセージ表示 -->
        <? if (!empty($message)) { ?>
            <div class="uk-alert uk-text-left">
              <ul>
                <li><?=$message?></li>
              </ul>
            </div>
        <? } ?>
        <!-- エラー表示 -->
        <? if (!empty($err_message)) { ?>
            <div class="uk-alert uk-alert-danger uk-text-left">
              <ul>
                <li><?=$err_message?></li>
              </ul>
            </div>
        <? } ?>
        
        <!-- GRID -->
        <div class="uk-grid-width-1-1 uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-5 tm-grid-heights" data-uk-grid="{gutter: 20, controls: '#filter'}">
            <!-- INFO-BLOCK -->
            <div data-uk-filter="info" data-uk-modal="{target:'#infobox'}">
                <div class="uk-panel uk-panel-box color-pink" data-uk-scrollspy="{cls:'uk-animation-slide-top', repeat: true}">
                    <div class="uk-panel-teaser">
                      <?=Asset::img('sample/teaser01.jpg', array('alt'=>'girl'));?>
                    </div>
                    <h4 class="uk-panel-title">読んでみる？
                        <div class="uk-float-right"><i class="uk-icon-external-link"></i></div>
                    </h4>
                    <div class="context">ラノベ？それとも純文学？ いえいえ、これぞまさに「野ノベル」です！ もはやジャンル無用のインディーズ作家たちのユニークな作品がいっぱいです！ 新しい「面白さ」を発見して下さい。 検索は<a href="" data-uk-modal="{target:'#searchbox'}">コチラ</a>から</div>
                </div>
            </div>
            <div data-uk-filter="info" data-uk-modal="{target:'#infobox'}">
                <div class="uk-panel uk-panel-box color-gray" data-uk-scrollspy="{cls:'uk-animation-slide-top', repeat: true}">
                    <div class="uk-panel-teaser">
                      <?=Asset::img('sample/teaser02.gif', array('alt'=>'girl'));?>
                    </div>
                    <h4 class="uk-panel-title">書いてみる？
                        <div class="uk-float-right"><i class="uk-icon-external-link"></i></div>
                    </h4>
                    <div class="context">目指せ、印税生活！ 出版社から本を出さなくたって、書いて生活できれば、それはもう立派な作家じゃないか。 要は、たくさんの人に面白いと思ってもらえることなんだよね！</div>
                </div>
            </div>
            <!-- END INFO-BLOCK -->
            <!-- ITEM-BLOCK -->
            <div data-uk-filter="na">
                <figure class="uk-overlay uk-overlay-active">
                    <div class="uk-panel uk-panel-box" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                        <div class="badges">
                            <span class="uk-badge uk-badge">小説</span>
                            <span class="uk-badge uk-badge-success">長編</span>
                            <span class="uk-badge uk-badge-danger">おすすめ作</span>
                        </div>
                        <div class="box-cover uk-thumbnail uk-thumbnail-expand uk-badge uk-badge-success">
                            <?=Asset::img('data/cover/na/1000001.jpg', array('alt'=>'君の膵臓をたべたい/住野よる/￥1,512', 'class'=>'box-photo'));?>
                        </div>
                        <h4 class="uk-panel-title">君の膵臓をたべたい</h4>
                        <h3 class="author"><span class="sub">著</span>住野よる</h3>
                        <h3 class="design"><span class="sub">装丁デザイン</span>住野よる</h3>
                         <div class="prof">
                            <span class="sub">販売希望額</span>￥1,512<br>
                            <span class="sub">リリース日</span>2015/6/17<br>
                         </div>
                         <div class="tags">
                             <span class="tag">生と死</span>
                             <span class="tag">日記</span>
                             <span class="tag">青春</span>
                         </div>
                         <figcaption class="uk-overlay-panel uk-overlay-background">
                            <a class="uk-close"></a>
                            <div>
                                <h3>あらすじ</h3>
                                <p class="box-text">
                                    偶然、僕が病院で拾った１冊の文庫本。タイトルは「共病文庫」。
                                    それはクラスメイトである山内桜良が綴っていた、秘密の日記帳だった。
                                    そこには、彼女の余命が膵臓の病気により、もういくばくもないと書かれていて――。
                                    病を患う彼女にさえ、平等につきつけられる残酷な現実。
                                    【名前のない僕】と【日常のない彼女】が紡ぐ、終わりから始まる物語。
                                    全ての予想を裏切る...
                                </p>
                                <button class="uk-button readtry" data-item-id="na-1000001">試し読み</button>
                            </div>
                        </figcaption>
                    </div>
                </figure>
            </div>
            <div data-uk-filter="na">
                <figure class="uk-overlay uk-overlay-active">
                    <div class="uk-panel uk-panel-box" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                        <div class="badges">
                            <span class="uk-badge uk-badge">小説</span>
                            <span class="uk-badge uk-badge-success">長編</span>
                            <span class="uk-badge uk-badge-danger">話題作</span>
                        </div>
                        <div class="box-cover uk-thumbnail uk-thumbnail-expand uk-badge uk-badge-success">
                            <?=Asset::img('data/cover/na/1000003.jpg', array('alt'=>'また、同じ夢を見ていた/住野よる/￥1,512', 'class'=>'box-photo'));?>
                        </div>
                        <h4 class="uk-panel-title">また、同じ夢を見ていた</h4>
                        <h3 class="author"><span class="sub">著</span>住野よる</h3>
                         <div class="prof">
                            <span class="sub">販売希望額</span>￥1,512<br>
                            <span class="sub">リリース日</span>2015/6/17<br>
                         </div>
                         <div class="tags">
                             <span class="tag">女子高生</span>
                             <span class="tag">孤独</span>
                             <span class="tag">幸せ</span>
                         </div>
                         <figcaption class="uk-overlay-panel uk-overlay-background">
                            <div>
                                <h3>あらすじ</h3>
                                <p class="box-text">
                                デビュー作にして25万部を超えるベストセラーとなった「君の膵臓(すいぞう)をたべたい」の著者が贈る、待望の最新作。
                                友達のいない少女、リストカットを繰り返す女子高生、アバズレと罵られる女、一人静かに余生を送る老婆。
                                彼女たちの“幸せ"は、どこにあるのか。
                                「やり直したい」ことがある、“今"がうまくいかない全ての人たちに送る物語。
                                </p>
                                <button class="uk-button readtry" data-item-id="na-1000003">試し読み</button>
                            </div>
                        </figcaption>
                    </div>
                </figure>
            </div>
            <div data-uk-filter="na">
                <figure class="uk-overlay uk-overlay-active">
                    <div class="uk-panel uk-panel-box" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                        <div class="badges">
                            <span class="uk-badge uk-badge">小説</span>
                            <span class="uk-badge uk-badge-success">長編</span>
                            <span class="uk-badge uk-badge-warning">恋愛</span>
                            <span class="uk-badge uk-badge-danger">話題作</span>
                        </div>
                        <div class="box-cover uk-thumbnail uk-thumbnail-expand uk-badge uk-badge-success">
                            <?=Asset::img('data/cover/na/1000005.jpg', array('alt'=>'ぼくは明日、昨日のきみとデートする/七月隆文/￥724', 'class'=>'box-photo'));?>
                        </div>
                        <h4 class="uk-panel-title">ぼくは明日、昨日のきみとデートする</h4>
                        <h3 class="author"><span class="sub">著</span>七月隆文</h3>
                         <div class="prof">
                            <span class="sub">販売希望額</span>￥724<br>
                            <span class="sub">リリース日</span>2014/8/6<br>
                         </div>
                         <div class="tags">
                             <span class="tag">純愛</span>
                             <span class="tag">タイムリープ</span>
                             <span class="tag">美少女</span>
                         </div>
                         <figcaption class="uk-overlay-panel uk-overlay-background">
                            <div>
                                <h3>あらすじ</h3>
                                <p class="box-text">
                                京都の美大に通うぼくが一目惚れした女の子。
                                高嶺の花に見えた彼女に意を決して声をかけ、交際にこぎつけた。
                                気配り上手でさびしがりやな彼女には、ぼくが想像もできなかった大きな秘密が隠されていて―。
                                「あなたの未来がわかるって言ったら、どうする?」
                                奇跡の運命で結ばれた二人を描く、甘くせつない恋愛小説。
                                彼女の秘密を知ったとき、きっと最初から読み返したくなる。
                                </p>
                                <button class="uk-button readtry" data-item-id="na-1000005">試し読み</button>
                            </div>
                        </figcaption>
                    </div>
                </figure>
            </div>

            <div data-uk-filter="info" data-uk-modal="{target:'#infobox'}">
                <div class="uk-panel uk-panel-box color-blue" data-uk-scrollspy="{cls:'uk-animation-slide-top', repeat: true}">
                    <div class="uk-panel-teaser">
                      <?=Asset::img('sample/teaser03.jpg', array('alt'=>'girl'));?>
                    </div>
                    <h4 class="uk-panel-title">賞、始めちゃいます！
                        <div class="uk-float-right"><i class="uk-icon-external-link"></i></div>
                    </h4>
                    <div class="context">第一回ののべる大賞はどの作品に！？ それを決めるのは、ただ読者評価のみ。 賞金もたんまりですよ。 詳しくは<a href="">コチラ</a>を</div>
                </div>
            </div>

            <div data-uk-filter="ca">
                <figure class="uk-overlay uk-overlay-active">
                    <div class="uk-panel uk-panel-box" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                        <div class="badges">
                            <span class="uk-badge uk-badge">コミック</span>
                            <span class="uk-badge uk-badge-success small">シリーズ</span>
                            <span class="uk-badge uk-badge-warning small">アクション</span>
                            <span class="uk-badge uk-badge-danger">人気作</span>
                        </div>
                        <div class="box-cover uk-thumbnail uk-thumbnail-expand uk-badge uk-badge-success">
                            <?=Asset::img('data/cover/ca/1000002.jpg', array('alt'=>'ゴールデンカムイ(1)/野田サトル/￥555', 'class'=>'box-photo'));?>
                        </div>
                        <h4 class="uk-panel-title">ゴールデンカムイ (1)</h4>
                        <h3 class="author"><span class="sub">著</span>野田サトル</h3>
                         <div class="prof">
                            <span class="sub">販売希望額</span>￥555<br>
                            <span class="sub">リリース日</span>2015/1/19<br>
                         </div>
                         <div class="tags">
                             <span class="tag">冒険ロマン</span>
                             <span class="tag">北海道</span>
                             <span class="tag">アイヌ</span>
                             <span class="tag">エゾ狼</span>
                             <span class="tag">生存競争</span>
                         </div>
                         <figcaption class="uk-overlay-panel uk-overlay-background">
                         <a class="uk-close"></a>
                            <div>
                                <h3>あらすじ</h3>
                                <p class="box-text">
                                『不死身の杉元』日露戦争での鬼神の如き武功から、そう謳われた兵士は、ある目的の為に大金を欲し、かつてゴールドラッシュに沸いた北海道へ足を踏み入れる。
                                そこにはアイヌが隠した莫大な埋蔵金への手掛かりが!?
                                立ち塞がる圧倒的な大自然と凶悪な死刑囚。
                                そして、アイヌの少女、エゾ狼との出逢い。
                                『黄金を巡る生存競争』開幕ッ!!!!
                                </p>
                                <button class="uk-button readtry" data-item-id="ca-1000002">試し読み</button>
                            </div>
                        </figcaption>
                    </div>
                </figure>
            </div>
            <div data-uk-filter="ca">
                <figure class="uk-overlay uk-overlay-active">
                    <div class="uk-panel uk-panel-box" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                        <div class="badges">
                            <span class="uk-badge uk-badge">コミック</span>
                            <span class="uk-badge uk-badge-success small">シリーズ</span>
                            <span class="uk-badge uk-badge-warning small">アクション</span>
                            <span class="uk-badge uk-badge-danger">人気作</span>
                        </div>
                        <div class="box-cover uk-thumbnail uk-thumbnail-expand uk-badge uk-badge-success">
                            <?=Asset::img('data/cover/ca/1000001.jpg', array('alt'=>'波よ聞いてくれ(1)/沙村広明/¥637', 'class'=>'box-photo'));?>
                        </div>
                        <h4 class="uk-panel-title">波よ聞いてくれ (1)</h4>
                        <h3 class="author"><span class="sub">著</span>沙村広明</h3>
                         <div class="prof">
                            <span class="sub">販売希望額</span>¥637<br>
                            <span class="sub">リリース日</span>2015/5/22<br>
                         </div>
                         <div class="tags">
                             <span class="tag">ラジオ</span>
                             <span class="tag">サッポロ</span>
                             <span class="tag">恋愛</span>
                         </div>
                         <figcaption class="uk-overlay-panel uk-overlay-background">
                         <a class="uk-close"></a>
                            <div>
                                <h3>あらすじ</h3>
                                <p class="box-text">
                                舞台は北海道サッポロ。主人公の鼓田ミナレは酒場で知り合ったラジオ局員にグチまじりに失恋トークを披露する。
                                すると翌日、録音されていたトークがラジオの生放送で流されてしまった。
                                激高したミナレはラジオ局に突撃するも、ディレクターの口車に乗せられアドリブで自身の恋愛観を叫ぶハメに。
                                この縁でラジオ業界から勧誘されるミナレを中心に、個性あふれる面々の人生が激しく動き出す。
                                まさに、波よ聞いてくれ、なのだ!
                                </p>
                                <button class="uk-button readtry" data-item-id="ca-1000001">試し読み</button>
                            </div>
                        </figcaption>
                    </div>
                </figure>
            </div>
            <div data-uk-filter="ca">
                <figure class="uk-overlay uk-overlay-active">
                    <div class="uk-panel uk-panel-box" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                        <div class="badges">
                            <span class="uk-badge uk-badge">コミック</span>
                            <span class="uk-badge uk-badge-success small">シリーズ</span>
                            <span class="uk-badge uk-badge-warning small">恋愛</span>
                            <span class="uk-badge uk-badge-danger">話題作</span>
                        </div>
                        <div class="box-cover uk-thumbnail uk-thumbnail-expand uk-badge uk-badge-success">
                            <?=Asset::img('data/cover/ca/1000003.jpg', array('alt'=>'恋は雨上がりのように(1)/眉月じゅん/¥596', 'class'=>'box-photo'));?>
                        </div>
                        <h4 class="uk-panel-title">恋は雨上がりのように (1)</h4>
                        <h3 class="author"><span class="sub">著</span>眉月じゅん</h3>
                         <div class="prof">
                            <span class="sub">販売希望額</span>¥596<br>
                            <span class="sub">リリース日</span>2015/1/9<br>
                         </div>
                         <div class="tags">
                             <span class="tag">女子高生</span>
                             <span class="tag">おじさん</span>
                             <span class="tag">片想い</span>
                         </div>
                         <figcaption class="uk-overlay-panel uk-overlay-background">
                         <a class="uk-close"></a>
                            <div>
                                <h3>あらすじ</h3>
                                <p class="box-text">
                                橘あきら。17歳。高校2年生。
                                感情表現が少ないクールな彼女が、胸に秘めし恋。
                                その相手はバイト先のファミレス店長。
                                ちょっと寝ぐせがついてて、たまにチャックが開いてて、後頭部には10円ハゲのある、そんな冴えないおじさん。
                                海辺の街を舞台に青春の交差点で立ち止まったままの彼女と人生の折り返し地点にさしかかった彼が織りなす小さな恋のものがたり。
                                無名の新鋭作家ながら「月刊!スピリッツ」にてアンケート1位獲得!
                                『アオイホノオ』の島本和彦先生も「俺だけは認めてやろう!」とつぶやいた話題の女子高生片想い叙情譜、
                                ついに待望の単行本化!! 
                                </p>
                                <button class="uk-button readtry" data-item-id="ca-1000003">試し読み</button>
                            </div>
                        </figcaption>
                    </div>
                </figure>
            </div>

             <!-- END ITEM-BLOCK -->
        </div>
        <!-- END GRID -->
    </div>
    <!-- END CONTAINER -->
</div>
<!-- END MAIN -->