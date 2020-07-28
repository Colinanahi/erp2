/* logic.js */

function getBrowser() {
    c = navigator.appName+"\n";
    if (c.indexOf("Microsoft") > -1) {
        c = "IE";
    } else {
        c = "other";
    }
    return c;
}


function writeFlash() {
    // check url for chapter
	// check to see if theme is hybrid and act accordingly
	if (parent.window != window) {
		var url = new String(parent.window.location);
		var ishybrid = "ishybrid=true";
		if (top.is508) {
			ishybrid = ishybrid+"&is508=true";
		} else {
			ishybrid = ishybrid+"&is508=false";
		}
	} else {
		var url = new String(window.location);
		var ishybrid = "ishybrid=false";
	}
    if (url.indexOf("cid=") > 0) {
        var cid = url.substr(url.indexOf("cid=")+4, 10);
    } else {
        var cid = "0400000000";
    }
    if (url.indexOf("l1=") > 0) {
        var l1 = url.substr(url.indexOf("l1=")+3, 2);
    } else {
        var l1 = "en";
    }
    if (url.indexOf("l2=") > 0) {
	if (url.indexOf("l2=none") > -1) {
		var l2 = "none";
	} else {
		var l2 = url.substr(url.indexOf("l2=")+3, 2);
	}
    } else {
        var l2 = "none";
    }
    
    if (url.indexOf("chapter=") > 0) {
        var ch = url.substr(url.indexOf("chapter=")+8, url.length);
    } else {
        var ch = "intro";
    }

	// get pseudolocal
	if (url.indexOf("pseudolocal=true") > -1) {
		pseudolocal = "pseudolocal=true";
	} else {
		pseudolocal = "pseudolocal=false";
	}


	var attrstring = ishybrid+"&"+pseudolocal+"&cid="+cid+"&l1="+l1+"&l2="+l2+"&chapter="+ch;
	//alert(attrstring);

    var f = '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="100%" height="100%" id="cheetah" align="top">';
    f += '<param name="allowScriptAccess" value="sameDomain" />';
    f += '<param name="movie" value="swf/cheetah.swf?'+attrstring+'" />';
    f += '<param name="menu" value="false" />';
    f += '<param name="quality" value="high" />';
    f += '<param name="bgcolor" value="#FFFFFF" />';
    f += '<embed src="swf/cheetah.swf?'+attrstring+'" menu="false" quality="high" bgcolor="#FFFFFF" width="100%" height="100%" name="cheetah" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />';
    f += '</object>';
    //alert(f);
    document.write(f);
}


function openGlobalTool(ref) {
    var w = 800;
    var h = 600;
    var gtwin = window.open(ref, "gtwin", "status=0,toolbar=0,location=0,menubar=0,directories=0,resizable=1,width="+w+",height="+h);
}

function openActivity(ref, path) {
    var w = 800;
    var h = 470;
    var eawin = window.open(ref+"?path="+path, "eawin", "status=0,toolbar=0,location=0,menubar=0,directories=0,resizable=1,width="+w+",height="+h);
}

function openDocument(ref) {
    var w = 800;
    var h = 600;
    var docwin = window.open(ref, "docwin", "status=0,toolbar=0,location=0,menubar=0,directories=0,resizable=1,scrollbars=1,width="+w+",height="+h);
}

function openExternal(ref) {
    var w = 800;
    var h = 600;
    var docwin = window.open(ref, "docwin", "status=0,toolbar=0,location=1,menubar=0,address=1,directories=0,resizable=1,scrollbars=1,width="+w+",height="+h);
}

function openELAB(ref) {
    var w = 800;
    var h = 600;
    var docwin = window.open(ref, "docwin", "status=0,toolbar=0,location=1,menubar=0,address=1,directories=0,resizable=1,scrollbars=1,width="+w+",height="+h);
}

function openPT(ref) {
    var browser = getBrowser();
    var w = 300;
    var h = 150;
    if (browser == "IE") {
        var ptwin = window.open("pt.html?pt="+ref, "ptwin", "status=0,toolbar=0,location=0,menubar=0,directories=0,resizable=1,width="+w+",height="+h);
    } else {
        var ptwin = window.open(ref, "ptwin", "status=0,toolbar=0,location=0,menubar=0,directories=0,resizable=1,width="+w+",height="+h);
    }
}
function openQuiz(ref, path) {
    var w = 740;
    var h = 460;
	if (parent.window != window) {
		if (!top.is508 && top.main.course.lang == "tl") {
			ref = ref.replace(/quiz\.html/, "hybrid/theme_frontend/quiz.html");
			path = "../../"+path;
		}
	}

    var ptwin = window.open(ref+"?path="+path, "quizwin", "status=0,toolbar=0,location=0,menubar=0,directories=0,scrollbars=0,resizable=1,width="+w+",height="+h);
}
    

function showCourseMenu() {
    window.opener.focus();
}
