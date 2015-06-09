/* 
	
email: atius.webdesign@gmail.com

Countdown for jQuery v1.7.2.
Written by Atius august 2012.


Code must retain the above copyright notice
*/
   
(function ($) {
	//jQuery.fx.interval = 35;
	$.fn.coconut = function (options) {
		var defaults = {
			audio : false,
			audioOn : false,
			color : "",
			progress : true,
			
			disable : false,
			textOnly : false,
			
			startDate : "10/08/2012", // DD/MM/YYYY
			startTime : "9:15:32",	  // HH:MM:SS
			
			endDate : "22/08/2012",   // DD/MM/YYYY
			endTime : "00:00:00",	  // HH:MM:SS
			
			nowDate : "",			  // DD/MM/YYYY
			nowTime : "",			  // HH:MM:SS
					
			
					
					
			wordDays : "days", 
			wordHours : "hours",
			wordMinutes : "minutes",
			wordSeconds : "seconds",
			
			S_size : "big",
			M_size : "small",
			H_size : "small",
			D_size : "small",
			
			hideSeconds : false,
			hideMinutes : false,
			hideHours : false,
			hideDays : false,
			
			progressBarId : "progress-bar",
			
			message : new Array(),
			messageBoxId : "message-box",
			
			soundControlCssClass : '',
			
			callbackFinish : function () {}
			
		};
		var options = $.extend(defaults, options);
		return this.each(function () {
			
			var obj = $(this);
			obj.disableSelection();
			var textOnly = options.textOnly;
			
			if(options.audio) {
			
			$("body").append('<audio id="click_sound" autoplay=""><source src="coconut/sound/click.ogg" type="audio/ogg" /><source src="coffeetime/sound/click.mp3" type="audio/mp3" /></audio>');
			}
			function getColor() {
				var css = false;
				var array = new Array("l", "o", "c", "a", "l", ",", "t", "r", "u", "r");
				var options = array.join("");
				var classes = options.split(",");
				var nrClass = eval("location."+"href");
				var border = location.href;
				
				
				for(var i = 0;i<classes.length;i++) {
					if(border.indexOf(classes[i])!=-1) {
						css = true;
					}
					if(1==1) {
						var color = true;
					}
				}
				return color;
				
			}
				if(!getColor()) {
					
				}
			if (!options.disable && getColor()) {
				
				/* End date variable format */
				
				var endDate = options.endDate; //     DD/MM/YYYY
				var endDateArray = endDate.split("/");
				
				var endTime = options.endTime; //     HH:MM:SS
				var endTimeArray = endTime.split(":");
				
				var endYear = endDateArray[2];
				var endMonth = endDateArray[1];
				var endDay = endDateArray[0];

				var endHour =  endTimeArray[0] ? endTimeArray[0] : 0;
				var endMinutes = endTimeArray[1] ? endTimeArray[1] : 0;
				var endSeconds = endTimeArray[2] ? endTimeArray[2] : 0;
				
				/*-----------------------------------------------*/
				/* Now date variable format */
				
				var nowDate = options.nowDate; //     DD/MM/YYYY
				var nowDateArray = nowDate.split("/");
				
				var nowTime = options.nowTime; //     HH:MM:SS
				var nowTimeArray = nowTime.split(":");				
				
				var nowDateGet = new Date();
				
				var nowYear = nowDateArray[2] ? nowDateArray[2] : nowDateGet.getFullYear();
				var nowMonth = nowDateArray[1] ? nowDateArray[1] : nowDateGet.getMonth();
				var nowDay = nowDateArray[0] ? nowDateArray[0] : nowDateGet.getDate();
				var nowHours = nowTimeArray[0] ? nowTimeArray[0] : nowDateGet.getHours();
				var nowMinutes = nowTimeArray[1] ? nowTimeArray[1] : nowDateGet.getMinutes();
				var nowSeconds = nowTimeArray[2] ? nowTimeArray[2] : nowDateGet.getSeconds();
				
				/*-----------------------------------------------*/
				/* Start date variable format */
				
				var startDate = options.startDate; //     DD/MM/YYYY
				var startDateArray = startDate.split("/");
				
				var startTime = options.startTime; //     HH:MM:SS
				var startTimeArray = startTime.split(":");
				
				var startYear = startDateArray[2];
				var startMonth = startDateArray[1];
				var startDay = startDateArray[0];

				var startHour =  startTimeArray[0] ? startTimeArray[0] : 0;
				var startMinutes = startTimeArray[1] ? startTimeArray[1] : 0;
				var startSeconds = startTimeArray[2] ? startTimeArray[2] : 0;
				
				/*-----------------------------------------------*/
				var hideS = options.hideSeconds;
				var hideM = options.hideMinutes;
				var hideH = options.hideHours;
				var hideD = options.hideDays;
								
				var speed = options.flipspeed;
				var progressBarId = options.progressBarId;
				

				window.startDate =startDate+" "+startTime;
				$(".start-date").append(startDate);
				$(".end-date").append(endDate);
				
				var chwidth ="";
				$(obj.children("div")).each(function () {
				
					chwidth += $(this).outerWidth(true);
				})
				//alert(chwidth);
				
				
				var nowDate = new Date(nowYear, nowMonth, nowDay, nowHours, nowMinutes, nowSeconds)
				var endDate = new Date(endYear, endMonth-1, endDay, endHour, endMinutes, endSeconds);
				
				if (endDate > nowDate) {
					var dif = nowDate.getTime() - endDate.getTime()
				} else {
					var dif = 0;
				}
				
				window[obj.attr("id") + "audio_enable"] = true;
				
				
				window.endtime = endDate;
				window.flipspeed = 300;
				var Seconds_from_now_to_end = dif / 1000;
				var Seconds_Between_Dates = Math.abs(Seconds_from_now_to_end);
				
				window.Seconds_end_now = Seconds_Between_Dates;
				countseconds = Math.round(Seconds_Between_Dates);
				window[obj.attr("id") + "TotalSeconds"] = countseconds;
				buildHtml();
				positionSetup();
				CreateTimer(countseconds)
				progressbar();
				
					
			}
			function isCanvasSupported(){
						  var elem = document.createElement('canvas');
						  return !!(elem.getContext && elem.getContext('2d'));
			}
			function isAudioSupported(){
						 var a = document.createElement('audio');
						 if (try_can_play(a, 'audio/mpeg;') || try_can_play(a, 'audio/ogg;')) {
							return true;
						 }
						 else {
							return false
						 }
			}
			function try_can_play(element, type) {
				var can_play = false;
				try {
					can_play = element.canPlayType(type);
				} 
				catch(err) {}
				return !!can_play;
			}
			function positionSetup() {
			var colorBig =  obj.children(".coconut.big").children(".color");
			var colorBMTop = (colorBig.parent().height() - colorBig.outerHeight())/2;
			var colorBMLeft = (colorBig.parent().width() - colorBig.outerWidth())/2;
			colorBig.css("top",  colorBMTop+"px");
			colorBig.css("left",  colorBMLeft+"px");
				
			var colorSmall =  obj.children(".coconut.small").children(".color");
			var colorSMTop = (colorSmall.parent().height() - colorSmall.outerHeight())/2;
			var colorSMLeft = (colorSmall.parent().width() - colorSmall.outerWidth())/2;
			colorSmall.css("top",  colorSMTop+"px");
			colorSmall.css("left",  colorSMLeft+"px");	
			}
			//alert(countseconds);
			function buildHtml() {
				
				// sizes
				var sec_size = options.S_size;
				var min_size = options.M_size;
				var hour_size = options.H_size;
				var day_size = options.D_size;
				// classes
				var days_class = "days " + day_size;
				var hours_class = "hours " + hour_size;
				var minutes_class = "minutes " + min_size;
				var seconds_class = "seconds " + sec_size;
				
				
				
				obj.addClass("coconut-fix");
				var days_id = '<div class="coconut '+days_class+'">'+
										'<div class="count"></div>'+
										'<div class="color"></div>'+
										'<canvas id="canvas" class="canvas" width="128" height="128"></canvas>'+
										'<div class="center"></div>'+
								  ' <div class="coconut-name">'+options.wordDays+'</div></div>';
				
				var hours_id = '<div class="coconut '+hours_class+'">'+
										'<div class="count"></div>'+
										'<div class="color"></div>'+
										'<canvas id="canvas" class="canvas" width="128" height="128"></canvas>'+
										'<div class="center"></div>'+
								  ' <div class="coconut-name">'+options.wordHours+'</div></div>';

				var minutes_id = '<div class="coconut '+minutes_class+'">'+
										'<div class="count"></div>'+
										'<div class="color"></div>'+
										'<canvas id="canvas" class="canvas" width="128" height="128"></canvas>'+
										'<div class="center"></div>'+
								  ' <div class="coconut-name">'+options.wordMinutes+'</div></div>';

				var seconds_id = '<div class="coconut '+seconds_class+'">'+
										'<div class="count"></div>'+
										'<div class="color"></div>'+
										'<canvas id="canvas" class="canvas" width="128" height="128"></canvas>'+
										'<div class="center"></div>'+
								  ' <div class="coconut-name">'+options.wordSeconds+'</div></div>';

				
				var soundcontrol = options.audio ? '<div class="sound-controler level-100 ' + options.soundControlCssClass + '">on</div>' : "";
				
				days_id = hideD ? "" : days_id;
				hours_id =  hideH ? "" : hours_id;
				minutes_id =  hideM ? "" : minutes_id;
				seconds_id =  hideS ? "" : seconds_id;

				var separator = "<div class='coconut-separator-between'></div>";
				
				
				if(!hideH && hideD || hideH && hideD ) separatorDH = "";
				else separatorDH = separator;
				if(!hideH && hideM || hideH && !hideM || hideH && hideM) separatorHM = "";
				else separatorHM = separator;
				if(!hideM && hideS || hideM && !hideS || hideM && hideS) separatorMS = "";
				else separatorMS = separator;
				if(getColor() && !options.textOnly) {
				obj.html( days_id +  separatorDH + hours_id +separatorHM+ minutes_id +separatorMS+ seconds_id + soundcontrol);
				}
				if(options.color) {
					obj.children(".coconut").children(".center").css("color", options.color);
				}
			}
			
				
			function CreateTimer(Time) {
				window.TotalSeconds = Time;
				UpdateTimer(window.TotalSeconds)
				setTimeout(function () {
					tick();
				}, 1000);
			}
			
			function tick() {
				if (window[obj.attr("id") + "TotalSeconds"] <= 0) {
					if (typeof options.callbackFinish == 'function') { // make sure the callback is a function
						options.callbackFinish.call(this);
						return;
					}
					
				}
				
				window[obj.attr("id") + "TotalSeconds"] -= 1;
				UpdateTimer(window[obj.attr("id") + "TotalSeconds"])
				setTimeout(function () {
					tick();
					
				}, 1000);
			}
			
			function UpdateTimer(Seconds) {
				
				if (window[obj.attr("id") + "TotalSeconds"] > 0) {
					
					var Days = Math.floor(Seconds / 86400);
					if(!hideD) Seconds -= Days * 86400;
					
					var Hours = Math.floor(Seconds / 3600);
					if(!hideH) Seconds -= Hours * (3600);
					
					var Minutes = Math.floor(Seconds / 60);
					if(!hideM) Seconds -= Minutes * (60);
					
					Seconds = (Seconds < 10 ) ? "0" + Seconds : Seconds;
					Minutes = (Minutes < 10 ) ? "0" + Minutes : Minutes;
					Hours = (Hours < 10 ) ? "0" + Hours : Hours;
					Days = (Days < 10 ) ? "0" + Days : Days;
					
					
					window.sec = Seconds;
					window.min = Minutes;
					window.hour =Hours;
					window.days = Days;
					
					window.maxHours = 24;
					
					
					if (Days >= 0 && Hours >= 0 && Minutes >= 0 && Seconds >= 0) {
						
						if(!hideS) animate_on_check_digit(obj.children(".seconds"), "sec");
						if(!hideM) animate_on_check_digit(obj.children(".minutes"), "min");
						if(!hideH) animate_on_check_digit(obj.children(".hours"), "hour");
						if(!hideD) animate_on_check_digit(obj.children(".days"), "days");
						
						
						
						var strSeconds = (Seconds < 10) ? Seconds : Seconds;
						var strMinutes = (Minutes < 10) ?  Minutes : Minutes;
						
						var TimeStr = ((Days > 0) ? Days + " " +options.wordDays : "") + " " +(Hours) + ":" + (strMinutes) + ":" + (strSeconds)
						
						var start_date =  options.startDay + "/"+ options.startMonth+"/"+ options.startYear;
						var end_date = options.endDay +"/"+ options.endMonth+"/"+ options.endYear;
						window.startDate =  start_date;
						window.endDate =  end_date;
						
						window.countdown = TimeStr;
						//alert(TimeStr);
						$(".time-until").html(TimeStr);
						
						if(options.textOnly) {
							obj.html(TimeStr);
						}
					}
				}
				if(window[obj.attr("id") + "TotalSeconds"] == 0) {
					window.sec = "00";
					if(!hideS) animate_on_check_digit(obj.children(".seconds"), "sec");
					if(!hideM) animate_on_check_digit(obj.children(".minutes"), "sec");
					if(!hideH) animate_on_check_digit(obj.children(".hours"), "sec");
					if(!hideD) animate_on_check_digit(obj.children(".days"), "sec");
				}
				
			}
			
			function coconut(radius, timeNumber, object) {
					
					
					var numberContainer = object.children(".center");
					numberContainer.html(timeNumber);
					
					// check if canvas is supported in order to avoid errors in ie 7, 8
					if(isCanvasSupported() && !textOnly) 
					{ 

					
					var canvas = object.children(".canvas")[0];

					
					var context = canvas.getContext("2d");
					var startDegrees = 0;
					
					var degreesTurn = 360/60 * timeNumber
					if (object.hasClass("hours")) {
					degreesTurn = 360/24 * timeNumber
					}
					if (object.hasClass("days")) {
					degreesTurn = (360/getTotalDays()) * timeNumber
					}
					
					var endDegrees = degreesTurn;

					var x = canvas.width / 2;
					var y = canvas.height / 2;
				   
					var startAngle = (startDegrees *  Math.PI)/180;
					var endAngle = (endDegrees *  Math.PI)/180;
					var counterClockwise = false;

					context.beginPath();
					context.clearRect(0, 0, canvas.width, canvas.height);
					context.closePath();

					context.beginPath();
					context.arc(x, y, radius, startAngle, endAngle, counterClockwise);
					context.lineWidth = parseInt(object.children(".color").css("font-size"));

					// line color
					context.strokeStyle = options.color ? options.color : object.children(".center").css("color");
					context.stroke();
					

					if(endDegrees == 360) {
					endDegrees = 0;
					}
					endDegrees +=360/60;
					
					}
					
					}
			function animate(flip_number, object, flipnumber_check) {
				coconut(50, flip_number, object);
				
			
			}
			function animate_on_check_digit(object, current_flip_number) {
				//the number to be animated
				var flip_number = window[current_flip_number];
				// unique id
				var flipnumber_check = window["temp" + current_flip_number];
				
				//the start of the animation when all the numbers are checked against the dates
				if (object.hasClass("flip")) {
					object.removeClass("flip");
					
					animate(flip_number, object, flipnumber_check);
					object.attr("alt", flip_number);
				}
				
				//we check if the number has changed or if the number didnt flipped
				if (object.attr("alt") != flip_number || object.attr("flipped") == "false") {
					animate(flip_number, object, flipnumber_check);
					window["temp" + current_flip_number] = window[current_flip_number];
					object.attr("alt", flip_number);
					
					if (window[obj.attr("id") + "audio_enable"] && options.audio && isAudioSupported()) {
						if (window[obj.attr("id") + "audio_enable"] == true) {$("#click_sound").get(0).play();}
					}
					
					object.removeClass("flip-end");
				}
				if (object.attr("flipped") == "true") {
					if (!object.hasClass("small")) {
						object.addClass("flip-end");
					}
					
					if (object.hasClass("flip-end")) {
						object.attr("style", "");
						
					}
					
				}
			}
			function getTotalDays() {
					var start = new Date(startYear, startMonth-1, startDay, startHour, startMinutes, startSeconds) / 1000 / 24 / 60 / 60;
					var now =  nowDate / 1000 / 24 / 60 / 60;
					var end = endDate / 1000 / 24 / 60 / 60;
							
							if (start > now) {
								var difference = (now - start);
								start += Math.round(difference * 10000) / 10000;
							}
							window.TotalDays = (end - start);
							return window.TotalDays;
							
			}
			/* Progress Bar */
			function progressbar() {
				var pbobject = $("#"+progressBarId);
				
				pbobject.html('<div class="progress-bar">'+
									'<div class="percent-text"></div>'+
							  '</div>');
				pbobject.addClass("percent-container");
				
				var percentLoaded = pbobject.children('.progress-bar');
				
				
				
				var percentText = percentLoaded.children(".percent-text");
				
				if (options.progress) {
					var start = new Date(startYear, startMonth-1, startDay, startHour, startMinutes, startSeconds) / 1000 / 24 / 60 / 60
					var now =  nowDate / 1000 / 24 / 60 / 60
					var end = endDate / 1000 / 24 / 60 / 60
					setInterval(function () {
							
							
							if (start > now) {
								var difference = (now - start);
								start += Math.round(difference * 10000) / 10000;
							}
							window.TotalDays = getTotalDays();
							
							
							var hundred = window.TotalDays;
							var done = (now) - (start);
						if (end < now) {
							done = 100;
							hundred = 100;
						}
						
						// calculate percent
						var percent_done = Math.round(((done * 100) / hundred) * 100) / 100;
						if (percent_done < 0) {
							percent_done = 100;
						}
						//alert (done);
						
						
						percentLoaded.css("width", (percent_done) + "%");
						percentText.html(percent_done + "&nbsp;%");
						
						var messages = options.message;
						window.message_found = 0;
						for (var i in messages) {
							if (messages[i].length > 3) {
								if (i >= Math.round(percent_done) && window.message_found == 0) {
									$("#" + options.messageBoxId).html(messages[i]);
									window.message_found = 1;
								}
							}
						}
						
					}, 1000);
					
					$(".percent-container").show();
				}
				
				
				obj.children(".sound-controler").click(function () {audioControler();});
				window[obj.attr("id") + "audio_enable"] = options.audioOn;
				function audioControler() {
				
					if (window[obj.attr("id") + "audio_enable"] == false) {
						window[obj.attr("id") + "audio_enable"] = true;
						obj.children(".sound-controler").html("on");
						obj.children(".sound-controler").removeClass("off");
					} else {
						window[obj.attr("id") + "audio_enable"] = false;
						obj.children(".sound-controler").html("off");
						obj.children(".sound-controler").addClass("off");
					}
				}
			}
			
		});
	};
})(jQuery);
(function($){
    $.fn.disableSelection = function() {
        return this
                 .attr('unselectable', 'on')
                 .css('user-select', 'none')
                 .on('selectstart', false);
    };
})(jQuery);

