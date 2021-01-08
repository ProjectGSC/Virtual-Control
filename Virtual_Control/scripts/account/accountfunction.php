<?php

class AccountSet {

    /**
     * [VAR] リザルトフォーム
     * 
     * [0] = 成功<br>
     * [1] = データベースエラー<br>
     * [2] = 手続きエラー（ファンクションと内容が違う）<br>
     * [3] = チェックエラー（入力チェック）<br>
     * [4] = 認証エラー<br>
     * [5] = ログインエラー（編集・削除）<br>
     * [6] = 認証ハック<br>
     * [7] = 認証エラー<br>
     * [8] = 確認ハック
     * 
     * @var array
     */
    private $result_form = [
	['CODE' => 0],
	['CODE' => 1],
	['CODE' => 2, 'ERR_TEXT' => "手続きに失敗しました。<br>手続き上で正しく入力してください。<br>システム上の正しい動作のため、UI上の操作以外での通信は拒否されます。"],
	['CODE' => 2, 'ERR_TEXT' => "入力チェックエラーです。<br>以下の入力したデータをご確認ください。"],
	['CODE' => 1, 'ERR_TEXT' => "認証情報に異常が見つかりました。<br>VCServer権限のみ実行可能な処理のため、認証情報が異なるユーザでは処理することができません。"],
	['CODE' => 3],
	['CODE' => 4],
	['CODE' => 5],
	['CODE' => 6],
    ];
    private $userid;
    private $pre_userid;
    private $username;
    private $pass;
    private $r_pass;
    private $a_pass;
    private $per;
    private $funid;

    /**
     * 実際の登録情報を格納します
     * @param int    $functionid    ファンクションID
     * @param string $pre_userid    変更時の対象ユーザID
     * @param string $userid	    ユーザID（作成・変更・削除）
     * @param string $username	    ユーザ名（作成・変更）
     * @param string $a_pass	    認証時のパスワード（認証）
     * @param string $pass	    パスワード（作成・変更）
     * @param string $r_pass	    確認用のパスワード（作成・変更）
     * @param int    $per	    権限（作成）
     */
    public function __construct($functionid, $pre_userid, $userid, $username, $a_pass, $pass, $r_pass, $per) {
	$this->pre_userid = $pre_userid;
	$this->userid = $userid;
	$this->username = $username;
	$this->a_pass = $a_pass;
	$this->pass = $pass;
	$this->r_pass = $r_pass;
	$this->per = $per;
	$this->funid = $functionid;
    }

    /**
     * [GET] ファンクションID調査
     * 
     * ファンクションIDの調査を行います。<br>
     * 実際送られたデータと、送付されているファンクションIDが正しいか、元のデータをたどって確認します。<br>
     * [返却値について]<hr>
     * 1. 作成
     * 2. 変更（ユーザID）
     * 3. 変更（ユーザ名）
     * 4. 変更（パスワード）
     * 5. 削除
     * 6. 手続きエラー
     * 
     * @param int $functionid	実際のファンクションIDです
     */
    public function check_functionid() {
	if (!session_auth() && $this->a_pass) {
	    $set_fun = 999;
	} else {
	    $set_fun = $this->check_correct_functionid();
	    if ($set_fun != $this->funid) {
		$set_fun = 7;
	    }
	}
	$this->funid = $set_fun;
    }

    public function check_correct_functionid() {
	$set_fun = 0;
	$flag1 = $this->userid && $this->username && $this->pass && $this->r_pass;
	$flag2 = isset($this->per); 
	if ($flag1 && $flag2) {
	    $set_fun = 1;
	} else if ($this->pre_userid && $this->userid) {
	    $set_fun = 2;
	} else if ($this->pre_userid && $this->username) {
	    $set_fun = 3;
	} else if ($this->pre_userid && $this->pass && $this->r_pass) {
	    $set_fun = 4;
	} else if ($this->pre_userid) {
	    $set_fun = 5;
	}
	return $set_fun;
    }

    /**
     * [GET] 実行ファンクション
     * 
     * 実行ファンクションを起こします。<br>
     * CODEについて<hr>
     * 0 = 正常終了<br>
     * 1 = 異常終了（原因あり）<br>
     * 2 = 認証が必要（認証を呼び出す）
     * 
     * @return array ["CODE" => .., "ERR_TEXT" => '..']
     */
    public function run() {
	$result_code = 0;
	switch ($this->funid) {
	    case 1:
		$result_code = $this->create();
		break;
	    case 2:
	    case 3:
	    case 4:
		$result_code = $this->edit();
		break;
	    case 5:
		$result_code = $this->delete();
		break;
	    case 7:
		$result_code = 2;
		break;
	    case 999:
		$result_code = $this->auth();
		break;
	}
	return $this->result_form[$result_code];
    }

    /**
     * アカウントを作成します（作成フラグは以下参照）
     * @return int (0..完了, 1..アカウント認証が必要, 2..セッション切れにより更新中止, 3..データベース障害が発生)
     */
    private function create(): int {
	$res_code = 0;
	//1: 全ての値に関してチェックを行う
	$chk = $this->check();
	if ($chk != 0) {
	    $res_code = $chk;
	} else {
	    //2: authidを確認する
	    if (session_auth()) {
		//3: INSERT文の実行
		$salt = random(20);
		$pass_hash = hash('sha256', $this->pass . $salt);
		$res = insert("GSC_USERS", ["USERID", "PASSWORDHASH", "USERNAME", "PERMISSION", "SALT"], [$this->userid, $pass_hash, $this->username, $this->per, $salt]);
		if ($res) {
		    $res_code = 0;
		} else {
		    $res_code = 1;
		}
	    } else {
		$res_code = 6;
	    }
	}
	return $res_code;
    }

    private function edit(): int {
	$res_code = 0;
	$chk = $this->check();
	$chk_login = check_user_login($this->pre_userid);
	$me = check_users_me($this->pre_userid);
	if ($chk != 0) {
	    $res_code = 3;
	}
	if ($chk_login && $me) {
	    $res_code = 5;
	}
	if ($res_code == 0) {
	    if (session_auth()) {
		$query = $this->editQuery();
		if ($query) {
		    if ($this->funid == 2 && !$me) {
			$_SESSION['gsc_userid'] = $this->userid;
		    }
		    $res_code = 0;
		} else {
		    $res_code = 1;
		}
	    } else {
		$res_code = 6;
	    }
	}
	return $res_code;
    }

    private function delete(): int {
	$res_code = 0;
	$chk_login = check_user_login($this->pre_userid);
	if ($chk_login) {
	    $res_code = 5;
	}
	if ($res_code == 0) {
	    if (session_auth()) {
		$res = delete("GSC_USERS", "WHERE USERID = '$this->pre_userid'");
		if ($res) {
		    $res_code = 0;
		} else {
		    $res_code = 1;
		}
	    } else {
		$res_code = 6;
	    }
	}
	return $res_code;
    }

    private function check() {
	$chk_text = '<ul class="black-view">[ERROR_LOG]</ul>';
	$chk = '';
	switch ($this->funid) {
	    case 1: //作成（ユーザID・ユーザ名・パスワード確認）
		$chk .= check_userid($this->userid);
		$chk .= check_username($this->username);
		$chk .= check_password($this->pass, $this->r_pass);
		break;
	    case 2: //編集1（ユーザID確認）
		$chk .= check_userid($this->userid);
		break;
	    case 3: //編集2（ユーザ名確認）
		$chk .= check_username($this->username);
		break;
	    case 4: //編集3（パスワード確認）
		$chk .= check_password($this->pass, $this->r_pass);
		break;
	}
	if ($chk) {
	    $chk_text = str_replace('[ERROR_LOG]', $chk, $chk_text);
	    $this->result_form[3]['ERR_TEXT'] .= $chk_text;
	    return 3;
	} else {
	    return 0;
	}
    }

    private function auth() {
	$res = 0;
	$s_userid = session_get_userid();
	switch (session_auth_check($s_userid, $this->a_pass, true)) {
	    case 0:
		$res = 8;
		$this->result_form[$res]['DATA'] = $this->generateList();
		break;
	    case 1:
		$res = 1;
		break;
	    case 2:
		$res = 7;
		break;
	}
	return $res;
    }

    private function editQuery() {
	$res = [];
	switch ($this->funid) {
	    case 2:
		$res = ['GSC_USERS', ['USERID'], [$this->userid]];
		break;
	    case 3:
		$res = ['GSC_USERS', ['USERNAME'], [$this->username]];
		break;
	    case 4:
		$salt = random(20);
		$pass_hash = hash('sha256', $this->pass . $salt);
		$res = ['GSC_USERS', ['PASSWORDHASH', 'SALT'], [$pass_hash, $salt]];
		break;
	}
	$flag = true;
	for ($i = 0; $i < sizeof($res[1]); $i++) {
	    $r01 = update($res[0], $res[1][$i], $res[2][$i], "WHERE USERID = '$this->pre_userid'");
	    if (!$r01) {
		$flag = false;
		break;
	    }
	}
	return $flag;
    }

    private function generateList() {
	$list_text = '<ul class="black-view">';
	$func = "<li>ファンクション: [FUNCTION]</li>";
	$column_list = ["<li>対象のユーザ: [USERID]</li>", "<li>ユーザID: [NEW_USERID]</li>", "<li>ユーザ名: [NEW_USERNAME]</li>", "<li>パスワード: [表示できません]</li>", "<li>権限: [NEW_PERMISSION]</li>", "<li>現在のユーザID: [USERID]</li>", "<li>現在のユーザ名: [USERNAME]</li>", "<li>現在の権限: [PERMISSION]</li>"];
	$columns = [];
	switch ($this->check_correct_functionid()) {
	    case 1: $func = str_replace('[FUNCTION]', 'ユーザ作成', $func);
		$columns = [1, 2, 3, 4];
		break;
	    case 2: $func = str_replace('[FUNCTION]', 'ユーザ編集（ユーザID）', $func);
		$columns = [0, 5, 1];
		break;
	    case 3: $func = str_replace('[FUNCTION]', 'ユーザ編集（ユーザ名）', $func);
		$columns = [0, 6, 2];
		break;
	    case 4: $func = str_replace('[FUNCTION]', 'ユーザ編集（パスワード）', $func);
		$columns = [0, 3];
		break;
	    case 5: $func = str_replace('[FUNCTION]', 'ユーザ削除', $func);
		$columns = [5, 6, 7];
		break;
	}
	$list_text .= $func;
	foreach ($columns as $col) {
	    $text = $column_list[$col];
	    switch ($col) {
		case 0: $text = str_replace('[PER_USERID]', $this->pre_userid, $text);
		    break;
		case 1: $text = str_replace('[NEW_USERID]', $this->userid, $text);
		    break;
		case 2: $text = str_replace('[NEW_USERNAME]', $this->username, $text);
		    break;
		case 4: $text = str_replace('[NEW_PERMISSION]', $this->get_permission_text($this->per), $text);
		    break;
	    }
	    $list_text .= $text;
	}
	$list_text .= '</ul>';
	return $list_text;
    }

    private function get_permission_text($permission): string {
	$text = '';
	switch ($permission) {
	    case 0:
		$text = 'VCServer';
		break;
	    case 1:
		$text = 'VCHost';
		break;
	}
	return $text;
    }

}

/**
 * [FUNCTION] 指定ユーザセッション一致確認
 * 
 * 削除しようとしている情報が自分のユーザであるか確認します。
 * ユーザが自分である場合はfalseを返し、それ以外はtrueを返します。
 * @param string $userid    手続き元のユーザIDを指定します
 * @return bool
 */
function check_users_me($userid): bool {
    if (session_chk()) {
	$session_userid = $_SESSION['gsc_userid'];
	return ($userid == $session_userid);
    } else {
	return false;
    }
}

/**
 * [FUNCTION] ユーザログインチェック
 * 
 * 指定したユーザがログイン中かどうかを判定します。<br>
 * ログイン中である場合は true, でない場合は false が返されます。
 * @return bool
 */
function check_user_login($userid): bool {
    $sql = select(true, 'GSC_USERS', 'LOGINSTATE', "WHERE USERID = '$userid'");
    $res = false;
    if ($sql) {
	$res = ($sql['LOGINSTATE'] == 1);
    }
    return $res;
}

/**
 * [FUNCTION] ユーザ名確認
 * 
 * ユーザ名の記述についてチェックします。<br>
 * 【判定条件】ユーザ名が最大50バイトを超えていないか かつ 1文字以上書いているか<br>
 * <br>（※）表示形式はUTF-8のため、UTF-8でのバイト数で数えます。
 * 
 * @param string $data ユーザ名（手続き元）
 * @return string|null 何らかのエラーがあれば、その原因のエラーを出し、何もなければnullを返します。
 */
function check_username($data): string {
    $len = strlen(mb_convert_encoding($data, 'SJIS', 'UTF-8'));
    if ($len > 30 || $len < 1) {
	return '<li>ユーザ名が最大半角文字数30文字を超えています。</li>';
    } else {
	return '';
    }
}

/**
 * [FUNCTION] ユーザID確認
 * 
 * ユーザIDの記述について確認します。<br>
 * 【判定条件】記入しようとしているユーザIDがすでに登録されているか かつ 半角英数字[数字・英字組み合わせ]で5-20文字を遵守しているか<br>
 * （※）ユーザIDは大文字・小文字が区別されます。
 * 
 * @param string $userid ユーザID（手続き元）
 * @return string|null 何らかのエラーがあれば、その原因のエラーを出し、何もなければnullを返します。
 */
function check_userid($userid): string {
    $result = select(true, "GSC_USERS", "COUNT(*) AS USERCOUNT", "WHERE USERID = '$userid'");
    if ($result['USERCOUNT'] == 1) {
	return '<li>ユーザIDが重複しています。</li>';
    }

    if (!preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{5,20}+\z/', $userid)) {
	return '<li>ユーザID入力ルールに違反しています。</li>';
    } else {
	return '';
    }
}

/**
 * [FUNCTION] パスワード確認
 * 
 * パスワードの記述について確認します。<br>
 * 【判定条件】半角英数字・記号($, _ のみ)を用いて10-30文字の範囲で記述しているか
 * 
 * @param string $pass パスワード（手続き元）
 * @param string $r_pass パスワードの確認（手続き元）
 * @return string|null 何らかのエラーがあれば、その原因のエラーを出し、何もなければnullを返します。
 */
function check_password($pass, $r_pass) {
    if (!preg_match('/\A(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)(?=.*?[$_])[a-zA-Z\d$_]{10,30}+\z/', $pass)) {
	return '<li>パスワードルールに違反しています。</li>';
    }
    if ($pass != $r_pass) {
	return '<li>確認用パスワードが間違っています。</li>';
    } else {
	return '';
    }
}

/**
 * [FUNCTION] 権限確認
 * 
 * 権限の記述について確認します。
 * 【判定条件】0（VCServer）, 1（VCHost）のいずれかが代入されていること
 * 
 * @param int $per 権限値（手続き元）
 * @return string|null 何らかのエラーがあれば、その原因のエラーを出し、何もなければnullを返します。
 */
function check_permission($per) {
    if (!isset($per) && (($per == 0) || ($per == 1))) {
	return '<li>権限を選択してください。</li>';
    } else {
	return '';
    }
}
