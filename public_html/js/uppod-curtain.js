// Uppod Curtain plugin 2012 http://uppod.ru/talk_4210

	var uppod_curtain1;
	var uppod_curtain2;
	var uppod_curtain3;
	var uppod_curtain4;
	var uppod_curtain_init = false;
	var uppod_curtain_player;
	var ua = navigator.userAgent.toLowerCase();
	var isOpera = (ua.indexOf('opera')  > -1);
	var isIE = (!isOpera && ua.indexOf('msie') > -1);
	
	var autostart_uppod_curtain =  false;
	
	function UppodCurtain(playerID,alpha) {
		if(!uppod_curtain_init){
			!alpha?alpha=0.9:'';
			var style="position:absolute;top:0;left:0;background-color:#000000;opacity: "+alpha+";-ms-filter:'progid:DXImageTransform.Microsoft.Alpha(Opacity="+(alpha*100)+")';filter: alpha(opacity="+(alpha*100)+");";
			uppod_curtain1 = document.createElement("div");
			uppod_curtain2 = document.createElement("div");
			uppod_curtain3 = document.createElement("div");
			uppod_curtain4 = document.createElement("div");
			for(i=1;i<5;i++){
			    eval("uppod_curtain"+i).setAttribute("style",style);
			    document.body.appendChild(eval("uppod_curtain"+i));
			    eval("uppod_curtain"+i).style.display='none';
			    eval("uppod_curtain"+i).onclick=CurtainClose;

		    }
		    uppod_curtain_init=true;
		    window.onresize=CurtainSize;
			$(uppod_curtain1).fadeIn();
			$(uppod_curtain2).fadeIn();
			$(uppod_curtain3).fadeIn();
			$(uppod_curtain4).fadeIn();
			
		}else{
			for(i=1;i<5;i++){
				eval("uppod_curtain"+i).style.display='block';
			}
		}
		uppod_curtain_player=playerID;
		CurtainSize();
	}
	function CurtainSize() {
		if(document.getElementById(uppod_curtain_player)){
			var x = 0, y = 0;
			var obj=document.getElementById(uppod_curtain_player);
			var objH=obj.offsetHeight;
			var objW=obj.offsetWidth;
			while(obj){
				x += obj.offsetLeft;
				y += obj.offsetTop;
				obj = obj.offsetParent;
			}
			dw=getDocumentWidth();
			dh=getDocumentHeight();
			uppod_curtain1.style.width=dw+"px";
			uppod_curtain1.style.height=y+"px";
			uppod_curtain1.style.top=0;
			uppod_curtain1.style.left=0;
			
			
			uppod_curtain2.style.width=x+"px";
			uppod_curtain2.style.height=objH+"px";
			uppod_curtain2.style.top=y+"px";
			uppod_curtain2.style.left=0;
			
			uppod_curtain3.style.width=(dw-x-objW)+"px";
			uppod_curtain3.style.height=objH+"px";
			uppod_curtain3.style.top=y+"px";
			uppod_curtain3.style.left=(x+objW)+"px";
			
			uppod_curtain4.style.width=dw+"px";
			uppod_curtain4.style.height=(dh-y-objH)+"px";
			uppod_curtain4.style.top=(y+objH)+"px";
			uppod_curtain4.style.left=0;
		}
	}
	function CurtainClose(playerID,alpha) {
		$(uppod_curtain1).fadeOut();
		$(uppod_curtain2).fadeOut();
		$(uppod_curtain3).fadeOut();
		$(uppod_curtain4).fadeOut();
	}
	function getDocumentHeight() {
	  return Math.max(document.compatMode != 'CSS1Compat' ? document.body.scrollHeight : document.documentElement.scrollHeight, getViewportHeight());
	}
	function getViewportHeight() {
	  return ((document.compatMode || isIE) && !isOpera) ? (document.compatMode == 'CSS1Compat') ? document.documentElement.clientHeight : document.body.clientHeight : (document.parentWindow || document.defaultView).innerHeight;
	}
	function getDocumentWidth() {
	  return Math.max(document.compatMode != 'CSS1Compat' ? document.body.scrollWidth : document.documentElement.scrollWidth, getViewportWidth());
	}
	function getViewportWidth() {
	  return ((document.compatMode || isIE) && !isOpera) ? (document.compatMode == 'CSS1Compat') ? document.documentElement.clientWidth : document.body.clientWidth : (document.parentWindow || document.defaultView).innerWidth;
	}
	
	//Uppod JS API http://uppod.ru/js
	
	function uppodEvent(playerID,event) { 
		switch(event){
			case 'start': 
				autostart_uppod_curtain?UppodCurtain(playerID):'';
				break;
		}
	}
	function uppodSend(playerID,com,callback) {
		document.getElementById(playerID).sendToUppod(com);
	}
	function uppodGet(playerID,com,callback) {
		return document.getElementById(playerID).getUppod(com);
	}
	
	