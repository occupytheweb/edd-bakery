//vanilla ajax
var ajax = {};


ajax.init = function() {
    if (typeof XMLHttpRequest !== 'undefined') {
        return new XMLHttpRequest();
    }

    var versions = [
                    "MSXML2.XmlHttp.6.0",
                    "MSXML2.XmlHttp.5.0",
                    "MSXML2.XmlHttp.4.0",
                    "MSXML2.XmlHttp.3.0",
                    "MSXML2.XmlHttp.2.0",
                    "Microsoft.XmlHttp"
                   ];

    var xhr;
    for (var i = 0; i < versions.length; i++) {
        try {
            xhr = new ActiveXObject(versions[i]);
            break;
        }
        catch(e) {
            //don't care, it's IE
        }
    }
    return xhr;
}


ajax.send = function(url, callback, method, data, responseType) {
    var xhr = ajax.init();

    xhr.open(method, url, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == xhr.DONE && xhr.status == 200) {
            if (responseType == 'xml') {
                callback(xhr.responseXML);
            } else {
                callback(xhr.responseText);
            }
        }
    };

    if(method == 'POST') {
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    }

    xhr.send(data);
};


ajax.get = function (url, data, callback, responseType) {
    var query = [];
    for (var key in data) {
        query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
    }
    url += query.length ? '?' + query.join('&') : '';

    ajax.send(url, callback, 'GET', null);
};


ajax.post = function (url, data, callback, responseType) {
    var query = [];
    for (var key in data) {
        query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
    }
    data = query.join('&');

    ajax.send(url, callback, 'POST', data, responseType);
};