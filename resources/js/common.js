const nl2br = (str) => {
    str = str.replace(/\r\n/g, "<br />");
    str = str.replace(/(\n|\r)/g, "<br />");
    return str;
}

//コンポーネントで取り込みたいので、exportで関数を指定してやる
export { nl2br }