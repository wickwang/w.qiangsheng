function getBrowserVersion() {  
        var browser = {};  
        var userAgent = navigator.userAgent.toLowerCase();  
        var s;  
        (s = userAgent.match(/msie ([\d.]+)/))  
                ? browser.ie = s[1]  
                : (s = userAgent.match(/firefox\/([\d.]+)/))  
                        ? browser.firefox = s[1]  
                        : (s = userAgent.match(/chrome\/([\d.]+)/))  
                                ? browser.chrome = s[1]  
                                : (s = userAgent.match(/opera.([\d.]+)/))  
                                        ? browser.opera = s[1]  
                                        : (s = userAgent  
                                                .match(/version\/([\d.]+).*safari/))  
                                                ? browser.safari = s[1]  
                                                : 0;  
        var version = "";  
        if (browser.ie) {  
            version = 'msie ';
        } else if (browser.firefox) {  
            version = 'firefox';  
            
        } else if (browser.chrome) {
            version = 'chrome';  
        } else if (browser.opera) {  
            version = 'opera ';  
           
        } else if (browser.safari) {  
            version = 'safari';  
           
        } else {  
            version = 'δ֪�����';  
        }  
		return version; 
    } 