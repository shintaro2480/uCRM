//フォームでのテキストボックス入力用。ブレイクタグ変換
const nl2br = (str) => {
    str = str.replace(/\r\n/g, "<br />");
    str = str.replace(/(\n|\r)/g, "<br />");
    return str;
}

//購入登録用。今日の日付を取得する
const getToday = () => { 
    const today = new Date(); 
    const yyyy = today.getFullYear(); 
    const mm = ("0"+(today.getMonth()+1)).slice(-2); 
    const dd = ("0"+today.getDate()).slice(-2); 
    return yyyy+'-'+mm+'-'+dd; 
  }

//コンポーネントで取り込みたいので、exportで関数を指定してやる
export { nl2br }
export { getToday }
