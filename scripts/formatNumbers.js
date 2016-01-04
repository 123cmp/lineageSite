function number_format( str ){
    return (""+str).replace(/(\s)+/g, '').replace(/(\d{1,3})(?=(?:\d{3})+$)/g, '$1 ');
}

function number_unformat( str ){
    return parseInt(str.replace(/(\s)+/g, ''));
}
