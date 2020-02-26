<?php
//---------------------------------------------------
// 同盟に関する設定
//---------------------------------------------------

trait Alliance {
	public $comAlly;

	// 同盟作成を許可するか？(0:しない、1:する、2:管理者のみ)
	public $allyUse     = 1;

	// ひとつの同盟にしか加盟できないようにするか？(0:しない、1:する)
	public $allyJoinOne = 1;

	// 同盟データの管理ファイル
	public $allyData    = 'ally.dat';

	// 同盟のマーク
	public $allyMark = array(
		"🐶","🐵","🐦",
		// 'Б','Г','Д','Ж','Й',
		// 'Ф','Ц','Ш','Э','Ю',
		// 'Я','б','Θ','Σ','Ψ',
		// 'Ω','ゑ','ゐ','¶','‡',
		// '†','♪','♭','♯','‰',
		// 'Å','∽','∇','∂','∀',
		// '⇔','∨','〒','￡','￠',
		// '＠','★','♂','♀','＄',
		// '￥','℃','仝','〆',
	);

	// 入力文字数の制限 (全角文字数で指定) 実際は、<input> 内の MAXLENGTH を直に修正してください。 (;^_^A
	public $lengthAllyName    = 15;   // 同盟の名前
	public $lengthAllyComment = 40;   // 「各同盟の状況」欄に表示される盟主のコメント
	public $lengthAllyTitle   = 30;   // 「同盟の情報」欄の上に表示される盟主メッセージのタイトル
	public $lengthAllyMessage = 1500; // 「同盟の情報」欄の上に表示される盟主メッセージ

	// 以下は、表示関連で使用しているだけで、実際の機能を有していません、さらなる改造で実現可能です。

	// 加盟・脱退をコマンドで行うようにする？(0:しない、1:する)
	public $allyJoinComUse = 0;

	// 同盟に加盟することで通常災害発生確率が減少？(0:しない)
	// 対象となる災害：地震、津波、台風、隕石、巨大隕石、噴火
	public $allyDisDown  = 0;    // 設定する場合、通常時に対する倍率を設定。(例)0.5なら半減。2なら倍増(^^;;;
	public $costMakeAlly = 1000; // 同盟の結成・変更にかかる費用
	public $costKeepAlly = 500;  // 同盟の維持費(加盟している島で均等に負担)
}
