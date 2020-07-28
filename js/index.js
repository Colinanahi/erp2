courseTitleArray = new Array();
courseTitleArray["0400000000"] = "Discovery Index";
courseTitleArray["0500000000"] = "Discovery Index";
courseTitleArray["1100000000"] = "Discovery Index";
courseTitleArray["1200000000"] = "Discovery Index";
courseTitleArray["0600000000"] = "Exploration Index";
courseTitleArray["0900000000"] = "Exploration Index";
courseTitleArray["1300000000"] = "Exploration Index";
courseTitleArray["1400000000"] = "Exploration Index";


// grab the variables off the url if they exist if not use the variables on the page (to be written by script)
function getProperties() {
	// they exist
	if (url.indexOf("cid=") > -1) {
		//get the course id
		cid = url.substr(url.indexOf("cid=")+4, 10);
		// get lang1 
		lang1 = url.substr(url.indexOf("&l1")+4, 2);
		// get lang2
		lang2 = url.substr(url.indexOf("&l2")+4, url.length);
		// get pseudolocal
		if (url.indexOf("pseudolocal=true") > -1) {
			pseudolocal = "pseudolocal=true&";
		} else {
			pseudolocal = "";
		}
	}
	//alert("cid: "+cid+"\nlang1: "+lang1+"\nlang2: "+lang2+"\npseudolocal: "+pseudolocal);
}

function setTitle() {
	document.title = courseTitleArray[cid];
}

function launch(c1,c2,chapter) {
	var ref = "theme/cheetah.html";
	var w = screen.width;
	var h = screen.height;
	if (c1 == "blank") {
		alert("You must select a main course.");
	} else {
		var mywin = window.open(ref+"?"+pseudolocal+"cid="+cid+"&l1="+lang1+"&l2="+lang2+"&"+chapter, "newwin", "status=0,toolbar=0,location=0,menubar=0,directories=0,resizable=1,width="+w+",height="+h);
		mywin.moveTo(0,0);
	}
}
