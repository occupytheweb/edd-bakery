//vanilla ajax
var ajax = {};
ajax.x = function() {
    if (typeof XMLHttpRequest !== 'undefined') {
        return new XMLHttpRequest();
    }

    var stupidversions = [
        "MSXML2.XmlHttp.6.0",
        "MSXML2.XmlHttp.5.0",
        "MSXML2.XmlHttp.4.0",
        "MSXML2.XmlHttp.3.0",
        "MSXML2.XmlHttp.2.0",
        "Microsoft.XmlHttp"
    ];

    var xhr;
    for (var i = 0; i < stupidversions.length; i++) {
        try {
            xhr = new ActiveXObject(stupidversions[i]);
            break;
        }
        catch(e) {
            //don't care, it's IE
        }
    }
    return xhr;
}

ajax.send = function(url, callback, method, data, async) {
    async = async === undefined ? true : async;
    var x = ajax.x();
    x.open(method, url, async);
    x.onreadystatechange = function() {
        if(x.readyState == x.DONE) {
            callback(x.responseText);
        }
    };
    if(method == 'POST') {
        x.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    }
    x.send(data);
};