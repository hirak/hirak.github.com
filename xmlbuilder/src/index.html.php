<?php
require_once 'XML/Builder.php';

$pretty = array('class'=>'prettyprint');
$prettyphp = array('class'=>'prettyprint language-php');
$prettyxml = array('class'=>'prettyprint language-xml');

XML_Builder::factory(array('doctype'=>XML_Builder::$HTML5))

->html(array('lang'=>'ja'))
  ->head
    ->meta_(array('http-equiv'=>'Content-Type','content'=>'text/html; charset=UTF-8'))
    ->meta_(array('charset'=>'UTF-8'))
    ->meta_(array('http-equiv'=>'X-UA-Compatible','content'=>'IE=edge,chrome=1'))
    ->_comment('[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]')
    ->title_('php-XML_Builder document')
    ->link_(array('rel'=>'stylesheet','href'=>'assets/bootstrap.min.css'))
    ->link_(array('rel'=>'stylesheet','href'=>'assets/prettify.css'))
  ->_
  ->body(array('style'=>'padding-top:90px;'))
    ->a(array('href'=>'https://github.com/hirak/php-XML_Builder'))
      ->img_(array(
       'style'=>'position: fixed; top: 0; right: 0; border: 0; z-index:2000;',
       'src'=>'https://s3.amazonaws.com/github/ribbons/forkme_right_orange_ff7600.png',
       'alt'=>'Fork me on GitHub'
      ))
    ->_

    ->div(array('class'=>'navbar navbar-fixed-top'))
      ->div(array('class'=>'navbar-inner'))
        ->nav(array('class'=>'container'))
          ->h1_(array('class'=>'brand'), 'XML Builder')
          ->ul(array('class'=>'nav'))
            ->li->a_(array('href'=>'#'),'Introduction')->_
            ->li->a_(array('href'=>'#'),'Grammer')->_
            ->li->a_(array('href'=>'#'),'Backends')->_
            ->li->a_(array('href'=>'#'),'XML ⇔ Array')->_
          ->_
        ->_
      ->_
    ->_

    ->div(array('class'=>'container'))
      ->header(array('class'=>'hero-unit'))
        ->img_(array('src'=>'assets/xml-builder-logo.png','style'=>'display:block;float:right;margin-top:-25px;'))
        ->h1_('php-XML_Builder')
        ->p_('Most simple DSL for DOM / XMLWriter @ PHP')
        ->a_(array('class'=>'btn btn-primary btn-large', 'href'=>'#'), 'Download')
        ->_text(' ')
        ->a_(array('class'=>'btn btn-large', 'href'=>'#'), 'Source Code')
      ->_

      ->section(array('id'=>'introduction'))
        ->div(array('class'=>'page-header'))
          ->h1('Introduction ')
            ->small_('about XML_Builder')
          ->_
        ->_

        ->div(array('class'=>'row'))
          ->div(array('class'=>'span5'))
            ->pre_($pretty, <<<_PHP_
<?php
require_once 'XML/Builder.php';
echo XML_Builder::factory()
->root
    ->hello_('world')
->_;
_PHP_
            )
          ->_
          ->div(array('class'=>'span2', 'style'=>'text-align:center; font-size:74px'))
            ->br_
            ->br_
            ->_text('=')
          ->_
          ->div(array('class'=>'span5'))
            ->pre_($pretty, <<<_XML_
<?xml version="1.0" encoding="UTF-8"?>
<root>
  <hello>world</hello>
</root>
_XML_
            )
          ->_
        ->_
        ->p_('PHPでXMLを組み立てるためのライブラリです。')
        ->div(array('class'=>'row'))
          ->div(array('class'=>'span4'))
            ->h2_('Feature')
            ->dl
              ->dt_('Easy')
              ->dd_('とにかく短く書けます。')
              ->dt_('Safe')
              ->dd_('DOMやXMLWriterといった実績のあるライブラリのラッパーとして動作します。そのためXSSのような不具合が原理的に発生しません。')
              ->dt_('DOM and XMLWriter supported')
              ->dd_('バックエンドとして、高機能なDOM・高速なXMLWriterのいずれかを選択できます。どちらを選んでも同じインターフェースで書けます。')
              ->dt_('to Array')
              ->dd_('おまけ機能として、同一インターフェースで配列を組み立てる機能があります。XML/JSON/YAML/PHPSerializeの出し分けが簡単に行えます。')
            ->_
          ->_

          ->div(array('class'=>'span4'))
            ->p_(array('style'=>'background-color:black'),'abc')
          ->_

          ->div(array('class'=>'span4'))
            ->p_(array('style'=>'background-color:black'),'abc')
          ->_
        ->_
      ->_ //section

      ->div(array('id'=>'wrapper'))
            ->div
                ->div
                    ->div

                        ->hr_
                        ->h2_('Install')
                        ->p
                            ->_text('PEARパッケージ形式で')
                            ->a_(array('href'=>'http://openpear.org/package/XML_Builder'),'Openpear')
                            ->_text('に登録してあるため、pearコマンドで簡単にインストールできます。')
                        ->_
                        ->pre_(<<<_TEXT_
    # pear channel-discover openpear.org
    # pear install openpear/XML_Builder
_TEXT_
                        )
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
                    ->div
                        ->h2_('XML_Builder::factory()')
                        ->p_('XML_Builderオブジェクトを生成します。引数は配列で渡します。')
                        ->table
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
                                ->tr
                                    ->td_('serializer')
                                    ->td_('var_export')
                                    ->td_('Array専用。->_echoしたときに適用するcallbackを指定します。ex) json_encode, yaml_emit, XML_Builder::json, serialize')
                                ->_
                            ->_
                        ->_

                        ->p_('このXML_Builder::factory()でビルダーオブジェクトを作り、以下のメソッドをメソッドチェーンでつなげて書いていきます。')
                        ->table
                            ->tr
                                ->td
                                    ->pre_($pretty, <<<'_PHP_'
$builder = XML_Builder::factory(array(
    'class' => 'dom',
    'doctype' => XML_Builder::$HTML4_STRICT,
));
_PHP_
                                    )
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
                        ->table
                            ->tr
                                ->td
                                    ->pre_($pretty,<<<'_PHP_'
//以下はすべて同じ意味
->root
->root()
->xmlElem('root')
_PHP_
                                    )
                                ->_
                                ->td
                                    ->pre_($pretty,<<<'_XML_'
<root>
_XML_
                                    )
                                ->_
                            ->_
                        ->_
                        ->p_('名前空間付きの要素や、記号を含む要素の場合は{\'〜\'}で囲う必要があります。')
                        ->table
                            ->tr
                                ->td
                                    ->pre_($pretty,<<<'_PHP_'
//以下はすべて同じ意味
->{'atom:feed'}
->{'atom:feed'}()
->xmlElem('atom:feed')
_PHP_
                                    )
                                ->_
                                ->td
                                    ->pre_($pretty,<<<'_XML_'
<atom:feed>
_XML_
                                    )
                                ->_
                            ->_
                        ->_
                        ->hr_

                        ->h3_('->xmlEnd(), ->_')
                        ->p_('現在の要素の編集を終え、親の要素に戻ります。')
                        ->table
                            ->tr
                                ->td
                                    ->pre_($pretty,<<<'_PHP_'
->root
->_
_PHP_
                                    )
                                ->_
                                ->td
                                    ->pre_($pretty,<<<'_XML_'
<root/>
_XML_
                                    )
                                ->_
                            ->_
                        ->_
                        ->hr_

                        ->h3_('->xmlAttr(), ->_attr()')
                        ->p_('現在編集中の要素に属性を追加します。配列で渡します。')
                        ->table
                            ->tr
                                ->td
                                    ->pre_($pretty,<<<'_PHP_'
->root
    ->_attr(array('moge'=>'fuga','noge'=>'guga'))
->_
_PHP_
                                    )
                                ->_
                                ->td
                                    ->pre_($pretty,<<<'_XML_'
<root moge="fuga" noge="guga"/>
_XML_
                                    )
                                ->_
                            ->_
                        ->_
                        ->hr_

                        ->h3_('->xmlText(), ->_text()')
                        ->p_('現在編集中の要素にテキストノードを追加します。')
                        ->table
                            ->tr
                                ->td
                                    ->pre_($pretty,<<<'_PHP_'
->root
    ->_text('hogehoge')
->_
_PHP_
                                    )
                                ->_
                                ->td
                                    ->pre_($pretty,<<<'_XML_'
<root>hogehoge</root>
_XML_
                                    )
                                ->_
                            ->_
                        ->_
                        ->hr_

                        ->h3_('->$name_(array(), "string")')
                        ->p_('xmlElem(), xmlAttr(), xmlText(), xmlEnd()の組み合わせには省略記法が用意されています。')
                        ->p_('"_"で終わるように要素名を書くと、その要素の編集を終了します。->xmlEnd()をすぐに呼んだのと同じ効果です。')
                        ->p_('属性や単純なテキストノードであれば、要素の引数として渡すことでも追加できます。')
                        ->table
                            ->tr
                                ->td
                                    ->pre_($pretty,<<<'_PHP_'
//--同じ意味-----
->root
    ->_attr(array('aaa'=>'bbb'))
    ->_text('hogehoge')
->_
//--------
->root_(array('aaa'=>'bbb'), 'hogehoge')

//--混ざっていてもOK------
->root(array('aaa'=>'bbb'))
    ->_text('hogehoge')
->_
_PHP_
                                    )
                                ->_
                                ->td
                                    ->pre_($pretty,<<<'_XML_'
<root aaa="bbb">hogehoge</root>
_XML_
                                    )
                                ->_
                            ->_
                        ->_
                    ->_

                    ->div
                        ->h2_('XML_Builder_DOM')
                        ->p_('ここではDOMバックエンド特有の機能を紹介します。')
                        ->hr_

                        ->h2_('Additional Properties')
                        ->h3_('->xmlDom')
                        ->p_('XML_Builderによって構築されたDOMDocumentオブジェクトが格納されています。')

                        ->h2_('Additional Methods')
                        ->h3_('->xmlEcho($type="xml")')
                        ->p_('出力を行います。引数にhtmlという文字列を渡すと、DOMによるHTML出力を試みます。')
                    ->_

                    ->div
                        ->h2_('XML_Builder_XMLWriter')
                        ->p_('ここではXMLWriterバックエンド特有の機能を紹介します。')
                        ->hr_

                        ->h2_('Additional Properties')
                        ->h3_('->xmlWriter')
                        ->p_('XMLWriterオブジェクトが格納されています。')
                    ->_

                    ->div()
                        ->h2_('XML_Builder_Array')
                        ->p_('ここではArrayバックエンド特有の機能を紹介します。')
                        ->hr_

                        ->h2_('Additional Properties')
                        ->h3_('->xmlArray')
                        ->p_('構築された入れ子の配列が格納されています。')
                    ->_

                ->_
            ->_
        ->_
        ->_

        ->script_(array('src'=>'assets/jquery-1.8.0.min.js'))
        ->script_(array('src'=>'assets/prettify.js'))
        ->script_(array('src'=>'assets/bootstrap-scrollspy.js'))
        ->script_(array('src'=>'assets/bootstrap-dropdown.js'))
        ->script_('prettyPrint()')
    ->_
->_

->xmlPause($build);

file_put_contents(__DIR__.'/../index.html', $build->_render('html'));
