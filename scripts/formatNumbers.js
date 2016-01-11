function number_format( str ){
    if(!str) return "";
    return (""+str).replace(/(\s)+/g, '').replace(/(\d{1,3})(?=(?:\d{3})+$)/g, '$1 ');
}

function number_unformat( str ){
    if(!str) return 0;
    return parseInt(str.replace(/(\s)+/g, ''));
}
