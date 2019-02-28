<?PHP

//１.session_start
session_start();

// 現在のセッションIDを取得
$old_ssession_id=session_id();

// 新しいセッションIDを発行（前回破棄）
session_regenerate_id(true);

// 新しいセッションIDを取得
$new_session_id=session_id();

// 旧セッションIDと新セッションIDを表示

echo'<p>旧id'.$old_session_id.'</p>';
echo'<p>新id'.$new_session_id.'</p>';
