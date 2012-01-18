<?php
require_once 'XML/Builder.php';

$dt = 'data-dojo-type';
$dp = 'data-dojo-props';
$dl = 'dijit.layout';
$hl_php = array($dt=>'dojox.highlight.Code','class'=>'php');
$hl_xml = array($dt=>'dojox.highlight.Code','class'=>'xml');

XML_Builder::factory(array('doctype'=>XML_Builder::$HTML5))

->html
    ->head
        ->meta_(array('http-equiv'=>'Content-Type','content'=>'text/html; charset=UTF-8'))
        ->meta_(array('http-equiv'=>'X-UA-Compatible','content'=>'IE=edge,chrome=1'))
        ->title_('php-XML_Builder document')
        ->link_(array('rel'=>'stylesheet','href'=>'http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dijit/themes/claro/claro.css'))
        ->link_(array('rel'=>'stylesheet','href'=>'http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dojox/highlight/resources/highlight.css'))
        ->link_(array('rel'=>'stylesheet','href'=>'http://fonts.googleapis.com/css?family=Antic'))
        ->style(<<<_CSS_
body { margin:0;padding:0 }
#wrapper {
    margin:0 1em;
}
h1, h2, h3 {
    font-family: 'Antic', sans-serif;
}
h1 {
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.3);
    background-image: linear-gradient(bottom, rgb(0,26,22) 0%, rgb(21,84,94) 88%);
    background-image: -o-linear-gradient(bottom, rgb(0,26,22) 0%, rgb(21,84,94) 88%);
    background-image: -moz-linear-gradient(bottom, rgb(0,26,22) 0%, rgb(21,84,94) 88%);
    background-image: -webkit-linear-gradient(bottom, rgb(0,26,22) 0%, rgb(21,84,94) 88%);
    background-image: -ms-linear-gradient(bottom, rgb(0,26,22) 0%, rgb(21,84,94) 88%);

    background-color: #033;
    background-image: -webkit-gradient(
        linear,
        left bottom,
        left top,
        color-stop(0, rgb(0,26,22)),
        color-stop(0.88, rgb(21,84,94))
    );
    color: white;
    margin:0 0 10px 0;
    padding: 1em;
    box-shadow: 0 1px 3px 3px #000;
}
_CSS_
        )
    ->_
    ->body(array('class'=>'claro'))
        ->a(array('href'=>'http://github.com/hirak/php-XML_Builder'))
            ->img_(array(
                'style'=>'position: absolute; top: 0; right: 0; border: 0;',
                'src'=>'https://a248.e.akamai.net/assets.github.com/img/30f550e0d38ceb6ef5b81500c64d970b7fb0f028/687474703a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6f72616e67655f6666373630302e706e67',
                'alt'=>'Fork me on GitHub'
            ))
        ->_
        ->h1_('php-XML_Builder')
        ->div(array('id'=>'wrapper'))
            ->div(array('style'=>'position:relative;'))
                ->div(array($dt=>"$dl.TabContainer",'doLayout'=>'false','style'=>'position:static;'))
                    ->div(array($dt=>"$dl.ContentPane", 'title'=>'Introduction'))

                        ->h2_('About')
                        ->table(array('border'=>1))
                            ->tr
                                ->td
                                    ->pre->code_($hl_php, <<<_PHP_
<?php
require_once 'XML/Builder.php';
XML_Builder::factory()

->root
    ->hello_('world')
->_

->_echo;
_PHP_
                                    )->_
                                ->_
                                ->td
                                    ->pre->code_($hl_xml, <<<_XML_
<?xml version="1.0" encoding="UTF-8"?>
<root>
  <hello>world</hello>
</root>
_XML_
                                    )->_
                                ->_
                            ->_
                        ->_
                        ->p_('PHPでXMLを組み立てるためのライブラリです。')
                        ->ul
                            ->li
                                ->strong_('簡潔')
                                ->_text(': とにかく短く書けます。')
                            ->_
                            ->li
                                ->strong_('安全')
                                ->_text(': DOMやXMLWriterといった実績のあるライブラリのラッパーとして動作します。そのためXSSのような不具合が原理的に発生しません。')
                            ->_
                            ->li
                                ->strong_('DOMとXMLWriterをサポート')
                                ->_text(': バックエンドとして、高機能なDOM・高速なXMLWriterのいずれかを選択できます。どちらを選んでも同じインターフェースで書けます。')
                            ->_
                            ->li
                                ->strong_('Arrayサポート')
                                ->_text(': おまけ機能として、同一インターフェースで配列を組み立てる機能があります。JSON/XML/PHPSerializeの出し分けが簡単に行えます。')
                            ->_
                        ->_
                        ->hr_
                        ->h2_('Install')
                        ->p
                            ->_text('PEARパッケージ形式で')
                            ->a_(array('href'=>'http://openpear.org/package/XML_Builder'),'Openpear')
                            ->_text('に登録してあるため、pearコマンドで簡単にインストールできます。')
                        ->_
                        ->pre->code_(<<<_TEXT_
    # pear channel-discover openpear.org
    # pear install openpear/XML_Builder
_TEXT_
                        )->_
                        ->p
                            ->_text('pearコマンドが使えない環境では、')
                            ->a_(array('href'=>'https://github.com/hirak/php-XML_Builder'), 'github')
                            ->_text('からソースをダウンロードして、include_pathにlibの中身をコピーすればOK。')
                        ->_
                        ->p
                            ->_text('なお、このページ自体もXML_Builderを使って書いています。ソースは')
                            ->a_(array('href'=>'https://github.com/hirak/hirak.github.com/blob/master/xmlbuilder/src/index.html.php'),'src/index.html.php')
                            ->_text('から参照できます。')
                        ->_
                    ->_
                    ->div(array($dt=>"$dl.ContentPane", 'title'=>'API Reference'))
                        ->h2_('XML_Builder::factory()')
                        ->p_('XML_Builderオブジェクトを生成します。引数は配列で渡します。')
                        ->table(array('border'=>1))
                            ->caption_('オプション説明')
                            ->thead
                                ->tr
                                    ->th_('オプション名')
                                    ->th_('デフォルト')
                                    ->th_('説明')
                                ->_
                            ->_
                            ->tbody
                                ->tr
                                    ->td_('class')
                                    ->td_('dom')
                                    ->td_('バックエンドを選択します。dom/xmlwriter/arrayのいずれかを指定します。')
                                ->_
                                ->tr
                                    ->td_('formatOutput')
                                    ->td_('true')
                                    ->td_('出力を整形するかどうか')
                                ->_
                                ->tr
                                    ->td_('version')
                                    ->td_('1.0')
                                    ->td_('出力するXMLのバージョン。<?xml version="1.0"?>のversionです。')
                                ->_
                                ->tr
                                    ->td_('encoding')
                                    ->td_('UTF-8')
                                    ->td_('出力するXMLの文字コード。<?xml version="1.0" encoding="UTF-8"?>のencodingです。')
                                ->_
                                ->tr
                                    ->td_('doctype')
                                    ->td_('null')
                                    ->td_('DOCTYPE宣言。array(\'HTML\',null,null)などのように3要素の配列で渡します。よく使いそうなHTML関係のものはXML_Builderクラスのstatic変数として定義してあります。')
                                ->_
                                ->tr
                                    ->td_('writeto')
                                    ->td_('memory')
                                    ->td_('XMLWriter専用。XMLWriterが書きだす先を指定します。ファイル名を書けばそのファイルに直接書き込みますし、php://outputを指定すれば標準出力にどんどん書きだしていきます。')
                                ->_
                            ->_
                        ->_

                        ->p_('このXML_Builder::factory()でビルダーオブジェクトを作り、以下のメソッドをメソッドチェーンでつなげて書いていきます。')
                        ->table(array('border'=>1))
                            ->tr
                                ->td
                                    ->pre->code_($hl_php, <<<_PHP_
\$builder = XML_Builder::factory(array(
    'class' => 'dom',
    'doctype' => XML_Builder::\$HTML4_STRICT,
));
_PHP_
                                    )->_
                                ->_
                            ->_
                        ->_
                        ->hr_

                        ->h2_('Methods')
                        ->ul
                            ->li_('引数がない場合は()を省略することができます。')
                            ->li_('「xml」から始まる正式名と、「_」から始まる省略名があります。「xml～」の方がやや高速に動作します。')
                        ->_
                        ->h3_('->xmlElem($name), ->$name')
                        ->p_('$nameという名前の要素を作成して現在編集中の要素に追加します。戻り値は作成した要素になります。')
                        ->table(array('border'=>1))
                            ->tr
                                ->td
                                    ->pre->code_(array($dt=>'dojox.highlight.Code','class'=>'php'),<<<_PHP_
//以下はすべて同じ意味
->root
->root()
->xmlElem('root')
_PHP_
                                    )->_
                                ->_
                                ->td
                                    ->pre->code_(array($dt=>'dojox.highlight.Code','class'=>'xml'),<<<_XML_
<root>
_XML_
                                    )->_
                                ->_
                            ->_
                        ->_
                        ->p_('名前空間付きの要素や、記号を含む要素の場合は{\'〜\'}で囲う必要があります。')
                        ->table(array('border'=>1))
                            ->tr
                                ->td
                                    ->pre->code_(array($dt=>'dojox.highlight.Code'),<<<_PHP_
//以下はすべて同じ意味
->{'atom:feed'}
->{'atom:feed'}()
->xmlElem('atom:feed')
_PHP_
                                    )->_
                                ->_
                                ->td
                                    ->pre->code_(array($dt=>'dojox.highlight.Code','class'=>'xml'),<<<_XML_
<atom:feed>
_XML_
                                    )->_
                                ->_
                            ->_
                        ->_
                        ->hr_

                        ->h3_('->xmlEnd(), ->_')
                        ->p_('現在の要素の編集を終え、親の要素に戻ります。')
                        ->pre->code_(array($dt=>'dojox.highlight.Code','class'=>'php'),<<<_PHP_
->root
->_
_PHP_
                        )->_
                        ->pre->code_(array($dt=>'dojox.highlight.Code','class'=>'xml'),<<<_XML_
<root/>
_XML_
                        )->_
                        ->hr_

                        ->h3_('->xmlAttr(), ->_attr()')
                        ->p_('現在編集中の要素に属性を追加します。配列で渡します。')
                        ->pre->code_(array($dt=>'dojox.highlight.Code','class'=>'php'),<<<_PHP_
->root
    ->_attr(array('moge'=>'fuga','noge'=>'guga'))
->_
_PHP_
                        )->_
                        ->pre->code_(array($dt=>'dojox.highlight.Code','class'=>'xml'),<<<_XML_
<root moge="fuga" noge="guga"/>
_XML_
                        )->_
                        ->hr_

                        ->h3_('->xmlText(), ->_text()')
                        ->p_('現在編集中の要素にテキストノードを追加します。')
                        ->pre->code_(array($dt=>'dojox.highlight.Code','class'=>'php'),<<<_PHP_
->root
    ->_text('hogehoge')
->_
_PHP_
                        )->_
                        ->pre->code_(array($dt=>'dojox.highlight.Code','class'=>'xml'),<<<_XML_
<root>hogehoge</root>
_XML_
                        )->_
                        ->hr_
                    ->_

                    ->div(array($dt=>"$dl.ContentPane", 'title'=>'DOM'))
                        ->h2_('XML_Builder_DOM')
                        ->p_('ここではDOMバックエンド特有の機能を紹介します。')
                        ->hr_

                        ->h2_('Additional Properties')
                        ->h3_('->xmlDom')
                        ->p_('XML_Builderによって構築されたDOMDocumentオブジェクトが格納されています。')

                        ->h2_('Additional Methods')
                        ->h3_('->xmlEcho($type="xml")')
                        ->p_('出力を行います。')
                    ->_

                    ->div(array($dt=>"$dl.ContentPane", 'title'=>'XMLWriter'))
                        ->h2_('XML_Builder_XMLWriter')
                        ->p_('ここではXMLWriterバックエンド特有の機能を紹介します。')
                    ->_

                    ->div(array($dt=>"$dl.ContentPane", 'title'=>'Array'))
                        ->h2_('XML_Builder_Array')
                        ->p_('ここではArrayバックエンド特有の機能を紹介します。')
                    ->_

                ->_
            ->_
        ->_

        ->script_(array(
            //'src'=>'http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dojo/dojo.js',
            'src'=>'assets/dojo/dojo.js',
            'type'=>'text/javascript',
            'data-dojo-config'=>'parseOnLoad:true'
        ))
        ->script(array('type'=>'text/javascript'))
            ->_comment(implode(PHP_EOL,array(
                '',
                'dojo.require("dijit.layout.TabContainer");',
                'dojo.require("dijit.layout.ContentPane");',
                'dojo.require("dojox.highlight");',
                'dojo.require("dojox.highlight.languages.php");',
                'dojo.require("dojox.highlight.languages.xml");',
                '',
            )))
        ->_
    ->_
->_

->xmlPause($build);

file_put_contents(__DIR__.'/../index.html', $build->_render('html'));
