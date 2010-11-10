// date format
// -----------
xcDateFormat="yyyy-mm-dd";


// css conf
// --------
xcCSSPanel="panel";

xcCSSHeadBlock="row_head";
xcCSSHead="head";

xcCSSArrowMonthPrev=["arrow_prev", "arrow_prev_over", "arrow_prev_down"];
xcCSSArrowMonthNext=["arrow_next", "arrow_next_over", "arrow_next_down"];

xcCSSArrowYearPrev=["arrow_prev", "arrow_prev_over", "arrow_prev_down"];
xcCSSArrowYearNext=["arrow_next", "arrow_next_over", "arrow_next_down"];

xcCSSWeekdayBlock="row_week";
xcCSSWeekday="weekday";

xcCSSDayBlock="row_day";
xcCSSDay=["day", "day_over", "day_down", "day_disabled"];
xcCSSDayCurrent=["day_current", "", ""]; // on-over-down
xcCSSDaySpecial=["day_special", "day_over", "day_down", "day_disabled"];
xcCSSDayOther=["day_other", "day_other_over", "day_down", "day_disabled"];
xcCSSDayOtherCurrent=["day_other_current", "", ""];
xcCSSDayOtherSpecial=["", "", "", ""];   // on-over-down-off
xcCSSDayEmpty="day_empty";

xcCSSVersion="2.9";

xcCSSFootBlock="row_foot";
xcCSSFootToday=["foot", "foot_over", "foot_down"];
xcCSSFootClear=["foot", "foot_over", "foot_down"];
xcCSSFootBack=["foot", "foot_over", "foot_down"];
//xcCSSFootClose=["foot", "foot_over", "foot_down",'foot_close'];
xcCSSFootClose=["foot_close", "foot_over", "foot_down"];
xcCSSFootReset=["foot", "foot_over", "foot_down"];
xcCSSFootOther=[];


// layout conf
// -----------
xcMonthNames=["Janyary", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
xcMonthShortNames=["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
//xcMonthNames=["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
//xcMonthShortNames=["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
xcMonthPrefix="";
xcMonthSuffix="";

xcYearDigits=["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
xcYearPrefix="";
xcYearSuffix="";

xcHeadSeparator=" ";   // separator string between year and month
xcHeadTagOrder=1;      // 1: month/year, 0: year/month
xcHeadTagAdjustment=1; // 1: 100% width, 0: actual width

xcArrowMonth=["&#139;", "&#155;"];
xcArrowYear=["&#171;", "&#187;"];
xcArrowSwitch=[1, 1];  // [year, month] 1:on, 0:off
xcArrowPosition=0;     // 0:in head block, 1:in foot block

// names for days
xcWeekdayNames=["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
xcWeekdayShortNames=["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];
xcWeekdayDisplay=["S", "M", "T", "W", "T", "F", "S", "S"];

// foot links
//xcFootTags=["Today", "Clear", "Back", "Close", "Reset", "_Today_", "_Back_", "_Reset_"];
xcFootTags=["Today", "Clear", "Back", "Close", "Reset", "_Today_", "_Back_", "_Reset_"];
xcFootTagSwitch=[1, 0, 0, 2, 0, 0, 0, 0]; // [today, clear, back, close, reset, _today_, _back_, _reset_] non-zero:display order, 0:off
xcFootTagAdjustment=0;                    // 1: % width, 0: actual width

// customized foot links
xcFootButtons=[];
xcFootButtonSwitch=[];
xcFootButtonLinks=[];

// easy workaround for grid style
xcGridWidth=0;         // used as cellspacing

// others
xcBaseZIndex=100;      // z-index for calendar layers
xcMultiCalendar=0;     // 1:multi-calendar, 0:single-calendar
xcShowCurrentDate=1;   // 1:highlight current date/today, 0:no highlight
xcWeekStart=0;         // 0:Sunday, 1:Monday
xcAutoHide=0;          // 0: no auto hide, non-zero:auto hide interval in ms
xcStickyMode=0;        // 0:non-sticky, 1:sticky
xcShowPrevNextMonth=1; // 0:not show, 1: show

// day contents
xcDayContents=["&nbsp;", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"];
xcDayContentsDisabled=xcDayContents;
xcDayContentsCurrent=xcDayContents;


// mod conf
// --------
xcModPath="../script/";
xcMods=[{"order": 0,  "mod": "Month/Year List",   "script": "mod_list.js"},
        {"order": 0,  "mod": "Date Range",        "script": "mod_date.js"},
        {"order": 0,  "mod": "Special Days",      "script": "mod_days.js"},
        {"order": 0,  "mod": "Date Info",         "script": "mod_info.js"},
        {"order": 0,  "mod": "Journal",           "script": "mod_journal.js"},
        {"order": 0,  "mod": "Date Link",         "script": "mod_link.js"},
        {"order": 0,  "mod": "Long Date Format",  "script": "mod_long.js"},
        {"order": 0,  "mod": "Tiles",             "script": "mod_tiles.js"},
        {"order": 0,  "mod": "Date Tips",         "script": "mod_tips.js"},
        {"order": 0,  "mod": "Time",              "script": "mod_time.js"}];

// Month/Year List Mod
xcCSSMonthYearList="list";

xcMonthListFormat="Month"; // Month, MONTH, Mon, Mon, mm
xcYearListRange=5;
xcYearListPrevRange="&#171;&nbsp;";
xcYearListNextRange="&nbsp;&#187;"

// Date Link Mod & Journal Mod
xcLinkBasePath="";
xcLinkTargetWindow="_blank";
xcLinkTargetWindowPara="location=1,menubar=1,resizable=1,scrollbars=1,status=1,titlebar=1,toolbar=1";

// Journal Mod
xcLinkPrefix="";
xcLinkSuffix=".html";
xcLinkDateFormat="yyyymmdd";

// Date Tips Mod
xcDateTipTiming=1000;
xcDateTipBoxTitleSwitch=1; // 1: show title, 0:don't show
xcDateTipBoxPosition=6;    // 0:date top, 3:date right, 6:date bottom, 9:date left
xcDateTipBoxAlign=1;       // 0:left, 1:center, 2:right, for position of 0 and 6
xcDateTipBoxValign=0;      // 0:top, 1:middle, 2:bottom, for position of 3 and 9
xcDateTipBoxOffsetX=0;
xcDateTipBoxOffsetY=6;
xcCSSDateTipBoxTitle="tip_title";
xcCSSDateTipBox="tip_box";

// Time Mod
// xcHours=["00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11",
//          "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23"];     // full list of hours
// xcHours=["00", "03", "06", "09", "12", "15", "18", "21"];                             // simplified
xcHours=["00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];  // for AM/PM setting
//xcMinutes=["00", "01", "02", "03", "04", "05", "06", "07", "08", "09",
//           "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", 
//           "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", 
//           "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", 
//           "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", 
//           "50", "51", "52", "53", "54", "55", "56", "57", "58", "59"];                // full list of minutes
xcMinutes=["00", "05", "10", "15", "20", "25", "30", "35", "40", "45", "50", "55"];      // simplified
//xcSeconds=["00", "01", "02", "03", "04", "05", "06", "07", "08", "09",
//           "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", 
//           "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", 
//           "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", 
//           "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", 
//           "50", "51", "52", "53", "54", "55", "56", "57", "58", "59"];                // full list of seconds
xcSeconds=["00", "05", "10", "15", "20", "25", "30", "35", "40", "45", "50", "55"];      // simplified
xcAMPM=["AM", "PM"];       // to be used when "am" presents in date format
xcTimeBlockOrder=1;        // foot link order for time block
xcCSSTimeBlock=["","",""]; // CSS classes for the block of select lists, ["mouse-out", "mouse-over", "mouse-down"]
xcCSSTimeList="time_list"; // CSS class for the select list

// Popup-Window Version
xcWindowWidth=215;
xcWindowHeight=195;
xcWindowTemplate="../script/xc2_template.html"


// tooltips
xc_Today_is="Сегодня: ";
xc_Clear_the_date_input="Clear the date input";
xc_Scroll_to="Scroll to ";
xc_Close_the_calendar="<span style='color:#FF0000; font-weight:bold;'>Close calendar</span>";
xc_Pick_the_default_date_of="Pick the default date of ";
xc_Today="Сегодня";
xc_Scroll_to_this_date="Scroll to this date";
xc_Pick_the_default_date="Pick the default date";
/****************************************************************************/
/****************************************************************************/
/****************************************************************************/
/****************************************************************************/

// --------------------------------------
var xcCalCopyright="";
var xcCalHome="";
var xcCopyrightDisplay="";
var xcShowCopyright=0;
// --------------------------------------

var xcCore=1;
var xc_ax=new Array(),xc_fd=new Array(),xc_eg={};
var xc_bg=xc_df=xc_bs=null;
var xc_dy=null;
var xc_dl=xc_dm=xc_du=0;
var xc_fy=-1;
var xc_dt=null;
var xc_ca=["","100%","50%","33%","25%","20%"];
var xc_fk=" CELLPADDING='0' CELLSPACING='0' BORDER='0'>";
var xc_fl=" CELLPADDING='0' CELLSPACING='0' BORDER='0' ALIGN='CENTER'>";
var xc_fm=" CELLPADDING='0' CELLSPACING='"+xcGridWidth+"' BORDER='0' ALIGN='CENTER'>";
var xc_fo="<TABLE"+xc_fk;
var xc_fp="<TABLE"+xc_fl;
var xc_fq="<TABLE WIDTH='100%'"+xc_fl;
var xc_fr="<TABLE WIDTH='100%'"+xc_fm;
var xc_fn="</TABLE>";
var xc_fi="<TR VALIGN='TOP'>";
var xc_fj="<TR ALIGN='CENTER' VALIGN='MIDDLE'>";
var xc_fh="</TR>";
var xcCSSOpen='this.className="';
var xcCSSClose='"';
var xc_fs=/TR|TBODY|THEAD|TFOOT|TABLE/i;
var xc_da="yyyymmdd";
var xc_bv="E",xc_ef="R",xc_am="1",xc_ds="0";
var xcNav=navigator.userAgent.toLowerCase();
var xcVer=parseInt(navigator.appVersion);
var xcIsMac=(xcNav.indexOf("mac")!=-1);
var xcIsOpera=(xcNav.indexOf("opera")!=-1);
var xcIsSafari=(xcNav.indexOf("safari")!=-1);
var xcIsKon=(xcNav.indexOf("konqueror")!=-1);
var xcIsIE=(!xcIsOpera&&!xcIsKon&&xcNav.indexOf("msie")!=-1);
var xcIsIE4=(xcIsIE&&xcNav.indexOf("msie 4")!=-1);
var xcIsIE5=(xcIsIE&&!xcIsIE4);
var xcIsIE55=(xcIsIE&&xcNav.indexOf("msie 5.5")!=-1);
var xcIsIE6=(xcIsIE&&xcNav.indexOf("msie 6")!=-1);
var xcIsIE55up=(xcIsIE55||xcIsIE6);
var xcIsIEMac=xcIsIE&&xcIsMac;
var xcIsN4=(xcNav.indexOf('mozilla')!=-1&&xcNav.search(/msie|gecko|opera|spoofer|compatible|webtv|hotjava/)==-1);
var xcIsN6=(xcNav.indexOf("gecko")!=-1&&!xcIsSafari);
var xcIsO7=(xcIsOpera&&xcNav.search(/opera[\s\/]+(\d+)/)!=-1?parseFloat(RegExp.$1)>=7:false);
var xcIsK3=(xcIsKon&&xcVer>=3);
var xcCalSafe=(xcIsN6||xcIsIE5||xcIsK3||xcIsO7||xcIsSafari)&&!xcIsN4&&!xcIsIE4;
var ab=new Array(),ac=new Array(),ad=new Array();
var ae=new Array(),af=new Array(),ag=new Array();

function xc_ga(){return true};
function xc_en(){setTimeout("xc_dn()",100)};
function xc_dn()
{
	for(var i=0;i<xc_ax.length;i++)
	{
		var du=xc_ax[i];
		if(du.gr.style.visibility=="visible"&&du.hl!=2)
		{
			var l=xc_cj(du.gs);
			if(l!=null)
			{
				xc_dp(du.gr,du.dx+xc_cm(l),du.dy+xc_cn(l))
			}else{
				xc_cv(i)
				}
		}
	};
	xc_dy()
};
function xc_fv(e)
{
	if(xcIsIE||xcIsK3||xcIsOpera)
	{
		xc_dl=event.clientX+(xcIsK3?0:(document.documentElement?document.documentElement.scrollLeft:document.body.scrollLeft));
		xc_dm=event.clientY+(xcIsK3?0:(document.documentElement?document.documentElement.scrollTop:document.body.scrollTop))
	}else{
		xc_dl=e.pageX;xc_dm=e.pageY
		};
	if(xc_dt)
	{
		xc_dt(e)
	}
};
function xc_fz()
{
	if(xc_fy<0)
	{
		xc_fy=document.getElementsByTagName("SELECT").length+document.getElementsByTagName("OBJECT").length+document.getElementsByTagName("APPLET").length+document.getElementsByTagName("EMBED").length
	};
	return(xc_fy>0)
};
function xc_cj(id)
{
	return id==""?null:document.getElementById(id)
};
function xc_cm(l,gk)
{
	if(xcIsIEMac)
	{
		if(xc_fs.test(l.tagName))
		{
			gk=1
		};
		var x=l.offsetLeft;
		if(l.tagName=="TD"&&typeof(gk)=="undefined")
		{
			x+=xc_cm(l.parentElement,1)
		}else if(l.offsetParent)
			{
				x+=xc_cm(l.offsetParent,gk)
			}else{
				x+=isNaN(parseInt(document.body.style.marginLeft))?parseInt(document.body.leftMargin):parseInt(document.body.style.marginLeft)
				};
		return x
	}else{
		return l.offsetLeft+(l.offsetParent?xc_cm(l.offsetParent):0)
		}
};
function xc_cn(l,gk)
{
	if(xcIsIEMac)
	{
		if(xc_fs.test(l.tagName))
		{
			gk=1
		};
		var x=l.offsetTop;
		if(l.tagName=="TD"&&typeof(gk)=="undefined")
		{
			x+=xc_cn(l.parentElement,1)
		}else if(l.offsetParent)
			{
				x+=xc_cn(l.offsetParent,gk)
			}else{
				x+=isNaN(parseInt(document.body.style.marginTop))?parseInt(document.body.topMargin):parseInt(document.body.style.marginTop)
				};
		return x
	}else{
		return l.offsetTop+(l.offsetParent?xc_cn(l.offsetParent):0)
		}
};
function xc_gd(l,cp)
{
	l.innerHTML=cp
};
function xc_dp(l,x,y)
{
	l.style.top=y+"px";
	l.style.left=x+"px"
};
function xc_do(l,x,y)
{
	l.style.top=(parseInt(l.style.top)+y)+"px";
	l.style.left=(parseInt(l.style.left)+x)+"px"
};
function xc_ez(l)
{
	l.style.visibility="visible"
};
function xc_cw(l)
{
	l.style.visibility="hidden"
};
function xc_db()
{
	var l=document.createElement("DIV");
	with(l.style)
	{
//		position="absolute";
//		visibility="hidden";
//		left="-1000px";
//		top="-1000px";
		
		position="absolute";
		visibility="hidden";
		left="-1000px";
		top="-1000px";
		zIndex=++xcBaseZIndex
	};
	if(xcIsIE&&!xcIsMac)
	{
		document.body.insertBefore(l,document.body.firstChild)
	}else{
		document.body.appendChild(l)
		};
	l.gy=null;
	if(xcIsIE55up&&xc_fz()&&!xcIsMac)
	{
		l.gy=document.createElement("IFRAME");
		l.gy.src="javascript:false";
		with(l.gy.style)
		{
			position="absolute";
			visibility="hidden";
			left="-1000px";
			top="-1000px";
			width="20px";
			height="20px";
			zIndex=l.style.zIndex-1;
			filter="progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0)"
		};
		document.body.insertBefore(l.gy,l);
		l.gy.iz=false
	};
	return l
};
function xc_cd(n)
{
	return((n<10)?"0":"")+n
};
function xc_bt(y,m,d)
{
	return xcWeekdayShortNames[(new Date(y,m,d)).getDay()]
};
function xc_cp()
{
	var ho={};
	for(var i=0;i<xcMonthShortNames.length;i++)
	{
		ho[xcMonthShortNames[i].toLowerCase()]=i
	};
	return ho
};
function xc_de(mon)
{
	if(xc_df==null)
	{
		xc_df=xc_cp()
	};
	return xc_df[mon.toLowerCase()]||0
};
function xc_cg()
{
	var ev={};
	for(var i=0;i<xcWeekdayShortNames.length-1;i++)
	{
		ev[xcWeekdayShortNames[i].toLowerCase()]=i
	};
	return ev
};
function xc_br(day)
{
	if(xc_bs==null){xc_bs=xc_cg()
};
return xc_bs[day.toLowerCase()]||0};
function xc_ft(ji,style,fp,title){return "<"+ji+" "+fp+" "+(title?"TITLE='"+title.replace(/'/g,'&#39;')+"' ":"")+(style?"CLASS='"+style+"'":"")+">"};
function xc_be(style,fp,title){return xc_ft("DIV",style,fp||"",title||"")};var xc_bd="</DIV>";
function xcDIV(style,cp,fp,title)
{
	return xc_be(style,fp||"",title||"")+cp+xc_bd
};
function xc_fg(style,cp,width,fp,title)
{
	return "<TD"+(width!=""?" WIDTH='"+width+"'":"")+">"+xcDIV(style,cp,fp||"",title||"")+"</TD>"
};
function xc_fc(a,b){return a.order-b.order};
function xc_ck(y,m,d){return y+xc_cd(m+1)+xc_cd(d)};
function xc_bx(gx){return xc_ax[gx]};
function xc_cb(it,jk,ir,fe,gs,dx,dy,hl){var du=null;for(var i=0;i<xc_ax.length;i++){if(xc_ax[i].kd||xc_ax[i].jk==jk&&jk!=null||xcMultiCalendar==0&&xc_ax[i].hl==1){du=xc_ax[i];du.kd=false;break}};if(du==null){du=new xc_av(xc_ax.length);xc_ax[xc_ax.length]=du}else{du.iv()};du.cn=xc_eg[it]||{};du.jk=jk||null;du.ir=ir||jk;du.fe=fe||"";du.gs=gs||"";du.dx=dx||0;du.dy=dy||0;du.hl=hl;return du};
function xc_eh(it,hj,bd,value,hl){if(typeof(xc_eg[it])=="undefined"){xc_eg[it]={}};if(typeof(xc_eg[it][hj])=="undefined"){xc_eg[it][hj]={}};if(hl==0){xc_eg[it][hj][bd]=value}else if(hl==1){if(typeof(xc_eg[it][hj][bd])=="undefined"){xc_eg[it][hj][bd]=new Array()};xc_eg[it][hj][bd][xc_eg[it][hj][bd].length]=value}else if(hl==2){if(typeof(xc_eg[it][hj][bd])=="undefined"){xc_eg[it][hj][bd]=""};xc_eg[it][hj][bd]+=value}};
function aj(f){var ec=f||xcDateFormat;ec=ec.replace(/\\/g,'\\\\');ec=ec.replace(/\//g,'\\\/');ec=ec.replace(/\[/g,'\\\[');ec=ec.replace(/\]/g,'\\\]');ec=ec.replace(/\(/g,'\\\(');ec=ec.replace(/\)/g,'\\\)');ec=ec.replace(/\{/g,'\\\{');ec=ec.replace(/\}/g,'\\\}');ec=ec.replace(/\</g,'\\\<');ec=ec.replace(/\>/g,'\\\>');ec=ec.replace(/\|/g,'\\\|');ec=ec.replace(/\*/g,'\\\*');ec=ec.replace(/\?/g,'\\\?');ec=ec.replace(/\+/g,'\\\+');ec=ec.replace(/\^/g,'\\\^');ec=ec.replace(/\$/g,'\\\$');ec=ec.replace(/dd/gi,'\\d\\d');ec=ec.replace(/mm/gi,'\\d\\d');ec=ec.replace(/yyyy/gi,'\\d\\d\\d\\d');ec=ec.replace(/yy/gi,'\\d\\d');ec=ec.replace(/day/gi,'\\w\\w\\w');ec=ec.replace(/mon/gi,'\\w\\w\\w');ec=ec.replace(/hr/gi,'\\d\\d');ec=ec.replace(/mi/gi,'\\d\\d');ec=ec.replace(/ss/gi,'\\d\\d');ec=ec.replace(/am/gi,'\\w\\w');return ec};
function xc_ce(f){if(xc_bg==null){xc_bg=new RegExp('^'+aj(f)+'$')};return xc_bg};
function xc_cs(date,ec){var y,m,d,aa=ec||xcDateFormat;var ki=aa.search(/yyyy/i);var he=aa.search(/mm/i);var hd=aa.search(/mon/i);var dw=aa.search(/dd/i);y=date.substring(ki,ki+4)-0;if(he!=-1){m=date.substring(he,he+2)-1}else{m=xc_de(date.substring(hd,hd+3))-0};d=date.substring(dw,dw+2)-0;return new Array(y,m,d)};
function xc_cf(y,m,d,ec){var aa=ec||xcDateFormat;aa=aa.replace(/yyyy/i,y);aa=aa.replace(/mm/i,xc_cd(m+1));aa=aa.replace(/MON/,xcMonthShortNames[m].toUpperCase());aa=aa.replace(/mon/i,xcMonthShortNames[m]);aa=aa.replace(/dd/i,xc_cd(d));aa=aa.replace(/DAY/,xc_bt(y,m,d).toUpperCase());aa=aa.replace(/day/i,xc_bt(y,m,d));return aa};
function xc_fw(date,ed,ee){if(date==""){return ""};var hw=xc_cs(date,ed);return xc_cf(hw[0],hw[1],hw[2],ee)};
function xc_ct(y){var kl=y+"";return xcYearDigits[kl.charAt(0)]+xcYearDigits[kl.charAt(1)]+xcYearDigits[kl.charAt(2)]+xcYearDigits[kl.charAt(3)]};
function xc_av(gx){this.gx=gx;this.jk=null;this.ir=null;this.fe="";this.gs="";this.dx=0;this.dy=0;this.hl=1;this.js=0;this.kj=0;this.month=0;this.date="";this.kd=false;this.ha="";this.ch=0;this.cf=0;this.cd=0;this.ce=0;this.cg=0;this.fh=null;this.gr=xc_db();this.gr.bj=this;if(xcIsIE55up&&!xcIsMac){this.gr.onmouseenter=xc_ek;this.gr.onmouseleave=xc_ev}else{this.gr.onmouseover=xc_ek;this.gr.onmouseout=xc_ev};this.cn={};this.ge=xc_cc;this.iy=xc_ey;this.bh=xc_ak;this.aq=xc_ag;this.ci=xc_ba;this.ej=xc_bj;this.ek=xc_bk;this.ja=xc_fe;this.hr=xc_dk;this.hq=xc_dj;this.cl=xc_dh;this.iv=xc_el;this.iu=xc_ej;this.cj=xc_bb;this.gd=xcGet;this.bf=xc_ai;this.ao=xc_ae;this.kb=xc_fx;this.bi=xc_al;this.ar=xc_ah;this.ix=xc_eo;this.bg=xc_aj;this.ap=xc_af;this.bw=xc_aw;this.bm=xc_aq;this.bz=xc_az();this.br=xc_at;this.by=xc_ay;this.bv=xc_au;this.bk=xc_ao;this.bl=xc_ap;this.eq=xc_bq;this.bq=xc_as;this.bp=xc_ar;this.am=xc_ab;this.an=xc_ac};
function xc_cc(hj,bd){return typeof(this.cn[hj])!="undefined"?this.cn[hj][bd]||null:null};
function xc_bj(){return false};
function xc_bk(date){return false};
function xc_fe(){var gj=null;for(var i=0;i<xc_fd.length;i++){gj=xc_fd[i](this);if(gj){break}};return gj};
function xc_ba(ff){};
function xc_dk(){return ""};
function xc_dj(){return ""};
function xc_dh(){return ["",1]};
function xc_ak(){};
function xc_ag(){};
function xc_ey(){var dx=this.dx,dy=this.dy,l=xc_cj(this.gs);var dv="",ia=null,bx=xc_ce(),bo="";if(l!=null){dx+=xc_cm(l);dy+=xc_cn(l)}else{dx+=xc_dl;dy+=xc_dm};this.bf();bo=this.ao(this.gd()||this.fe);if(this.ha==""){this.ha=bo?bo:getCurrentDate()};if(bo!=""&&bx.test(bo)){var iq=xc_cs(bo);ia=new Date(iq[0],iq[1],iq[2])}else{ia=new Date()};dv=xc_ck(ia.getFullYear(),ia.getMonth(),ia.getDate());this.kj=ia.getFullYear();this.month=ia.getMonth();this.ci(0);if(this.kj!=ia.getFullYear()||this.month!=ia.getMonth()){ia=new Date(this.kj,this.month,1);dv=""};if(this.hl==2){this.fh=l;l.innerHTML=this.br()+this.bk(dv)+this.bq()}else{var h=this.gr;xc_dp(h,dx,dy);xc_gd(h,this.br()+this.bk(dv)+this.bq());h.style.zIndex=++xcBaseZIndex;if(h.gy){if(!h.gy.iz){h.gy.style.width=h.offsetWidth+"px";h.gy.style.height=h.offsetHeight+"px";h.gy.iz=true};xc_dp(h.gy,dx,dy);h.gy.style.zIndex=h.style.zIndex-1};this.bh();if(h.gy){xc_ez(h.gy)};xc_ez(h);this.aq()}};
function xc_el(){this.cj();this.jk=null;this.ir=null;this.fe="";this.gs="";this.dx=0;this.dy=0;this.hl=1;this.kj=0;this.month=0;this.date="";this.kd=false;this.ha="";this.ch=0;this.cf=0;this.cd=0;this.ce=0;this.cg=0;this.cn={}};
function xc_ej(){this.cj();this.kd=true};
function xc_bb(){if(this.js){clearTimeout(this.js);this.js=0}};
function xc_aj(){};
function xc_af(){};
function xc_eo(){var date=new Date(this.kj,this.month,1);var dv="",ak=null,bx=xc_ce(),bo="";this.bf();bo=this.ao(this.gd()||this.ha||this.fe);if(bo!=""&&bx.test(bo)){var iq=xc_cs(bo);ak=new Date(iq[0],iq[1],iq[2])}else{ak=new Date()};dv=xc_ck(ak.getFullYear(),ak.getMonth(),ak.getDate());this.bg();if(this.hl==2){this.fh.innerHTML=this.br()+this.bk(dv)+this.bq()}else{xc_gd(this.gr,this.br()+this.bk(dv)+this.bq());xc_ez(this.gr)};this.ap()};
function xc_ai(){beforeGetDateValue(this.ir,this.jk,this.gx)};
function xc_ae(date){return afterGetDateValue(this.ir,this.jk,date,this.gx)};
function xc_ch(fq){return fq?getDateValue(fq):""};
function xcGet(){return xc_ch(this.ir)||xc_ch(this.jk)};
function xc_al(date){return beforeSetDateValue(this.ir,this.jk,date,this.gx)};
function xc_ah(date){afterSetDateValue(this.ir,this.jk,date,this.gx)};
function xc_fx(date){if(this.jk){setDateValue(this.jk,date)}};
function xc_bq(style,cp,width,fp){return xc_fg(style,cp,width,fp)};
function xc_ab(){return ""};
function xc_ac(){return ""};
function xc_aw(){return xc_fo+xc_fi+"<TD>"+this.am()+xc_be(xcCSSPanel)+(xcIsIEMac?xc_fo+xc_fi+"<TD>":"")};
function xc_aq(){return(xcIsIEMac?"</TD>"+xc_fh+xc_fn:"")+xc_bd+this.an()+"</TD>"+xc_fh+xc_fn};
function xc_ev(){if(xcAutoHide&&this.bj.hl==1){this.bj.js=setTimeout("xc_cv("+this.bj.gx+")",xcAutoHide)}};
function xc_ek(){if(xcAutoHide){this.bj.cj()}};
function xc_di(df,dc,de,fo,fm,fn){var s="";if(df||fo){s+=(xcIsIE55up&&!xcIsMac)?" onmouseenter='":" onmouseover='";if(df){s+=xcCSSOpen+df+xcCSSClose+";"};if(fo){s+=fo};s+="' "};if(dc){s+=" onmousedown='"+xcCSSOpen+dc+xcCSSClose+"' "};if(fm){s+=" onclick='"+fm+"' "};if(de||fn){s+=(xcIsIE55up&&!xcIsMac)?" onmouseleave='":" onmouseout='";if(de){s+=xcCSSOpen+de+xcCSSClose+";"};if(de){s+=fn};s+="' "};return s};
function xc_an(gx){var ij="xc_dr("+gx+",-1)",hv="xc_dr("+gx+",1)";var ig="xc_dq("+gx+",-1)",hs="xc_dq("+gx+",1)";var bc="",bb="";if(xcArrowSwitch[0]==1){var az=xcCSSArrowYearPrev,ay=xcCSSArrowYearNext;bc=xc_fg(az[0],xcArrowYear[0],"",xc_di(az[1],az[2],az[0],"",ij,""));bb=xc_fg(ay[0],xcArrowYear[1],"",xc_di(ay[1],ay[2],ay[0],"",hv,""))};if(xcArrowSwitch[1]==1){var ax=xcCSSArrowMonthPrev,aw=xcCSSArrowMonthNext;bc+=xc_fg(ax[0],xcArrowMonth[0],"",xc_di(ax[1],ax[2],ax[0],"",ig,""));bb=xc_fg(aw[0],xcArrowMonth[1],"",xc_di(aw[1],aw[2],aw[0],"",hs,""))+bb};return [bc,bb]};
function xc_au(){var yy=xcYearPrefix+xc_ct(this.kj)+xcYearSuffix,mm=xcMonthPrefix+xcMonthNames[this.month]+xcMonthSuffix;return xc_fg(xcCSSHead,xcHeadTagOrder==1?mm+xcHeadSeparator+yy:yy+xcHeadSeparator+mm,xcHeadTagAdjustment==1?"100%":"")};
function xc_ay(){var ba=["",""];if(xcArrowPosition==0){ba=xc_an(this.gx)};s=xc_be(xcCSSHeadBlock)+(xcHeadTagAdjustment==1?xc_fq:xc_fp)+xc_fj;s+=ba[0];s+=this.bv();s+=ba[1];s+=xc_fh+xc_fn+xc_bd;return s};
function xc_az(){var s=xc_be(xcCSSWeekdayBlock)+xc_fr+xc_fi;for(var i=xcWeekStart;i<xcWeekStart+7;i++){s+=xc_fg(xcCSSWeekday,xcWeekdayDisplay[i],"")};s+=xc_fh+xc_fn+xc_bd;return s};
function xc_at(){return this.bw()+this.by()+this.bz};
function xc_ap(hl,dv){var s="",gx=this.gx;if(hl==xc_ef){var bn='this.title="'+xcCalCopyright+'"';var bt='window.open("'+xcCalHome+'")';s=this.eq(ac["on"],xcCopyrightDisplay,"",xc_di(ac["hy"],ac["fj"],ac["on"],bn,bt,""))}else if(hl==xc_bv){s=this.eq(xcCSSDayEmpty,xcDayContents[0],"")}else{var ej=this.ej(),cw=this.ja();var fo=this.hr(),fn=this.hq(),ah=this.cl();var fm=ah[0]+(ah[1]?"xc_ed("+gx+",\""+this.date+"\");":"");var ca=null,cb=null,cc=null,cd=null;if(ej){cd=hl==xc_am?ab:ae;if(cw){ca=cw[1].split(":");cb=hl==xc_am?ca[0]:ca[1];cc=hl==xc_am?ad:ag;s=this.eq(cb||cc["hx"]||cd["hx"]||ab["hx"],xcDayContentsDisabled[this.cd],"")}else{s=this.eq(cd["hx"]||ab["hx"],xcDayContentsDisabled[this.cd],"")}}else if(dv==this.date&&xcShowCurrentDate){cc=hl==xc_am?ac:af;cd=ac;s=this.eq(cc["on"]||cd["on"],xcDayContentsCurrent[this.cd],"",xc_di(cc["hy"]||cd["hy"],cc["fj"]||cd["fj"],cc["on"]||cd["on"],fo,fm,fn))}else if(cw){ca=cw[0].split(":");cb=hl==xc_am?ca[0]:ca[1];cc=hl==xc_am?ad:ag;cd=hl==xc_am?ab:ae;s=this.eq(cb||cc["on"]||cd["on"],xcDayContents[this.cd],"",xc_di(cc["hy"]||cd["hy"],cc["fj"]||cd["fj"],cb||cc["on"]||cd["on"],fo,fm,fn))}else{cc=hl==xc_am?ab:ae;cd=ab;s=this.eq(cc["on"]||cd["on"],xcDayContents[this.cd],"",xc_di(cc["hy"]||cd["hy"],cc["fj"]||cd["fj"],cc["on"]||cd["on"],fo,fm,fn))}};return s};
function xc_ao(dv){var dayOffset=0,er=1,fs=(new Date(this.kj,this.month,1)).getDay();var jl=new Date(this.kj,this.month+1,0),hb=jl.getDate();var ig=new Date(this.kj,this.month,0),ii=ig.getFullYear(),ih=ig.getMonth(),ic=ig.getDate();var hs=new Date(this.kj,this.month+1,1),hu=hs.getFullYear(),ht=hs.getMonth();if(xcWeekStart>0&&fs==0){fs=7};var s=xc_be(xcCSSDayBlock)+xc_fr;for(var i=0;i<6;i++){this.cg=i;s+=xc_fi;for(var j=xcWeekStart;j<xcWeekStart+7;j++){this.ce=j;this.date="";if(i==5&&j==xcWeekStart+6&&xcShowCopyright){s+=this.bl(xc_ef)}else if(i*7+j<fs||er>hb){if(xcShowPrevNextMonth&&i*7+j<fs){dayOffset=i*7+j-fs+1;this.ch=ii;this.cf=ih;this.cd=ic+dayOffset;this.date=xc_ck(this.ch,this.cf,this.cd);s+=this.bl(xc_ds,dv)}else if(xcShowPrevNextMonth&&er>hb){this.ch=hu;this.cf=ht;this.cd=(er++)-hb;this.date=xc_ck(this.ch,this.cf,this.cd);s+=this.bl(xc_ds,dv)}else{s+=this.bl(xc_bv)}}else{this.ch=this.kj;this.cf=this.month;this.cd=er++;this.date=xc_ck(this.ch,this.cf,this.cd);s+=this.bl(xc_am,dv)}};s+=xc_fh};s+=xc_fn+xc_bd;return s};
function xc_ar(){var s="",fz=0,gb=xcCSSFootToday,fu=xcCSSFootClear,ft=xcCSSFootBack,fv=xcCSSFootClose,fy=xcCSSFootReset;var ga=xcFootTagSwitch.concat(xcFootButtonSwitch);for(var i=0;i<ga.length;i++){if(ga[i]){fz++}};if(fz>0){var gx=this.gx,jy=gf(new Date()),fe=gf(toJSDate(this.fe)),ha=gf(toJSDate(this.ha));var jz="xc_ed("+gx+",\""+xc_fw(getCurrentDate(),xcDateFormat,xc_da)+"\")",ck="xc_bc("+gx+")",be="xc_es("+gx+")",cm="xc_cv("+gx+")",iw="xc_em("+gx+")";var ai=[{"order":ga[0],"fg":xcFootTags[0],"cb":jz,"ka":xc_Today_is+jy,"ds":gb[0],"dt":gb[1],"dr":gb[2]},{"order":ga[1],"fg":xcFootTags[1],"cb":ck,"ka":xc_Clear_the_date_input,"ds":fu[0],"dt":fu[1],"dr":fu[2]},{"order":ga[2],"fg":xcFootTags[2],"cb":be,"ka":xc_Scroll_to+ha,"ds":ft[0],"dt":ft[1],"dr":ft[2]},{"order":ga[3],"fg":xcFootTags[3],"cb":cm,"ka":xc_Close_the_calendar,"ds":fv[0],"dt":fv[1],"dr":fv[2]},{"order":ga[4],"fg":xcFootTags[4],"cb":iw,"ka":xc_Pick_the_default_date_of+fe,"ds":fy[0],"dt":fy[1],"dr":fy[2]},{"order":ga[5],"fg":jy,"cb":jz,"ka":xc_Today,"ds":gb[0],"dt":gb[1],"dr":gb[2]},{"order":ga[6],"fg":ha,"cb":be,"ka":xc_Scroll_to_this_date,"ds":ft[0],"dt":ft[1],"dr":ft[2]},{"order":ga[7],"fg":fe,"cb":iw,"ka":xc_Pick_the_default_date,"ds":fy[0],"dt":fy[1],"dr":fy[2]}];for(var i=0;i<xcFootButtonSwitch.length;i++){ai[ai.length] ={"order":xcFootButtonSwitch[i],"fg":typeof(xcFootButtons[i])=="function"?xcFootButtons[i](this.jk,this.ir,this.fe,this.ha,this.gx):xcFootButtons[i],"cb":xcFootButtonLinks[i]==null?"":"xc_bz("+gx+","+i+")","ka":"","ds":xcCSSFootOther[i][0],"dt":xcCSSFootOther[i][1],"dr":xcCSSFootOther[i][2]}};var fx=ai.sort(xc_fc);var ba=["",""];if(xcArrowPosition==1){ba=xc_an(gx)};w=xcFootTagAdjustment==1?xc_ca[fz>5?5:fz]:"";s+=xc_be(xcCSSFootBlock)+(xcFootTagAdjustment==0?xc_fp:xc_fq)+xc_fj;s+=ba[0];for(var i=0;i<fx.length;i++){if(fx[i].order!=0){s+=xc_fg(fx[i].ds,fx[i].fg,w,xc_di(fx[i].dt,fx[i].dr,fx[i].ds,"",fx[i].cb,""),fx[i].ka)}};s+=ba[1];s+=xc_fh+xc_fn+xc_bd};return s};
function xc_as(){return this.bp()+this.bm()};
function xc_dr(gx,dy){var du=xc_bx(gx);du.kj+=dy;du.ci(dy);du.ix()};
function xc_dq(gx,dm){var du=xc_bx(gx);du.month+=dm;if(du.month<0){du.month=11;du.kj--};if(du.month>11){du.month=0;du.kj++};du.ci(dm);du.ix()};
function xc_bc(gx){var du=xc_bx(gx);du.bi("");du.kb("");du.ar("");du.ha="";if(du.hl==1&&!xcStickyMode){xc_cv(gx)}else{du.ix()}};
function xc_ed(gx,date){var du=xc_bx(gx);var eo=xc_cs(date,xc_da);du.kj=eo[0];du.month=eo[1];if(du.ek(date)){du.ix();return};var bo=du.bi(xc_fw(date,xc_da,xcDateFormat));du.kb(bo);du.ar(bo);du.ha=bo;if(du.hl==1&&!xcStickyMode){xc_cv(gx)}else{du.ix()}};
function xc_es(gx){var du=xc_bx(gx),d=xc_cs(du.ha||getCurrentDate());du.kj=d[0];du.month=d[1];du.ix()};
function xc_em(gx){var du=xc_bx(gx),d=xc_cs(xc_ce().test(du.fe)?du.fe:getCurrentDate());du.kj=d[0];du.month=d[1];xc_ed(gx,xc_ck(d[0],d[1],d[2]))};
function xc_cv(gx){var du=xc_bx(gx),h=du.gr;if(du.hl==1){if(h.gy){xc_cw(h.gy)};xc_cw(h);du.iu()}};
function xc_bz(gx,i){var du=xc_bx(gx),fw=xcFootButtonLinks[i];fw(du.jk,du.ir,du.fe,du.ha,gx);if(du.hl==1&&!xcStickyMode){xc_cv(gx)}else{du.ix()}};
function showCalendar(it,jk,ir,fe,gs,dx,dy,hl)
{
	if(!xcCalSafe)
	{
		return
	};
	if(!xc_du)
	{
		xc_du=1;
		xc_dy=window.onresize?window.onresize:xc_ga;
		window.onresize=xc_en
	};
	var du=xc_cb(it,jk,ir,fe,gs,dx,dy,hl);
	du.iy()
};
function hideCalendars()
{
	for(var i=0;i<xc_ax.length;i++)
	{
		if(!xc_ax[i].kd&&xc_ax[i].hl==1)
		{
			xc_ax[i].iv();xc_cv(i)
		}
	}
};
function toCalendarDate(date)
{
	return xc_cf(date.getFullYear(),date.getMonth(),date.getDate())
};
var toCalDate=toCalendarDate;
function toJSDate(date){var bx=xc_ce();if(bx.test(date)){var d=xc_cs(date);return(new Date(d[0],d[1],d[2]))}else{return(new Date())}};
function getCurrentDate(){return toCalendarDate(new Date())};
function gf(date){return date.getFullYear()+"-"+xc_cd(date.getMonth()+1)+"-"+xc_cd(date.getDate())};
function checkDate(date){if(date){var bx=xc_ce();if(bx.test(date)){return 0}else{return 1}}else{return 2}};
function compareDates(dz,ea){var bx=xc_ce();var d1=getDateNumbers(bx.test(dz)?dz:getCurrentDate()).join("");var d2=getDateNumbers(bx.test(ea)?ea:getCurrentDate()).join("");return(d1==d2?0:d1>d2?1:-1)};
function getDateNumbers(date){var bx=xc_ce();if(bx.test(date)){var d=xc_cs(date);return new Array(xc_cd(d[0]),xc_cd(d[1]+1),xc_cd(d[2]))}else{return new Array("","","")}};var getNumbers=getDateNumbers;
function beforeGetDateValue(ir,jk,gx){};
function afterGetDateValue(ir,jk,date,gx){return date};
function getDateValue(fq){return fq.value};
function beforeSetDateValue(ir,jk,date,gx){return date};
function afterSetDateValue(ir,jk,date,gx){};
function setDateValue(fq,date){fq.value=date};
function xc_ei(){if(xcIsN6){document.captureEvents(Event.MOUSEMOVE)};if(document.onmousemove){xc_dt=document.onmousemove};document.onmousemove=xc_fv};if(xcCalSafe){xc_ex();xc_ei();var hk=xcMods.sort(xc_fc);for(var i=0;i<hk.length;i++){if(hk[i].order!=0){document.write("<scr"+"ipt language='javascript' src='"+xcModPath+hk[i].script+"' type='text/javascript'><\/scr"+"ipt>")}}};
function xc_ex(){var ex=xcCSSDay,es=xcCSSDayCurrent,ey=xcCSSDayOther,fb=xcCSSDaySpecial;ab["on"]=ex[0];ab["hy"]=ex[1];ab["fj"]=ex[2];ab["hx"]=ex[3];ac["on"]=es[0];ac["hy"]=es[1];ac["fj"]=es[2];if(typeof(xcCSSVersion)=="undefined"){ad["on"]=fb[0];ad["hy"]="";ad["fj"]="";ad["hx"]=fb[1];ae["on"]=ey[0];ae["hy"]=ex[1];ae["fj"]=ex[2];ae["hx"]=ey[1];af["on"]=es[0];af["hy"]="";af["fj"]="";ag["on"]="";ag["hy"]="";ag["fj"]="";ag["hx"]=""}else if(xcCSSVersion=="2.9"){var ez=xcCSSDayOtherCurrent,fa=xcCSSDayOtherSpecial;ad["on"]=fb[0];ad["hy"]=fb[1];ad["fj"]=fb[2];ad["hx"]=fb[3];ae["on"]=ey[0];ae["hy"]=ey[1];ae["fj"]=ey[2];ae["hx"]=ey[3];af["on"]=ez[0];af["hy"]=ez[1];af["fj"]=ez[2];ag["on"]=fa[0];ag["hy"]=fa[1];ag["fj"]=fa[2];ag["hx"]=fa[3]}};
/****************************************************************************/
/****************************************************************************/
/****************************************************************************/
/****************************************************************************/
var date_interval=5;

function dateOffset(date,n) {
  var d=toJSDate(date||"");
  d.setTime(d.getTime()+86400000*n);
  return toCalendarDate(d);
}

function beforeSetDateValue(ref_field, target_field, date) {
  if (date!="") {
    var startDate=document.forms[0]["start_date"];
    var endDate=document.forms[0]["end_date"];

    if (target_field==endDate &&
        checkDate(getDateValue(startDate))==0 &&
        compareDates(dateOffset(getDateValue(startDate), date_interval), date)>0) {
      date=getDateValue(endDate);
      alert("End Date should be at least "+date_interval+" days later, please select again.");
    }
  }

  return date;
}

function afterSetDateValue(ref_field, target_field, date) {
  if (date!="") {
    var startDate=document.forms[0]["start_date"];
    var endDate=document.forms[0]["end_date"];

    if (target_field==startDate &&
        checkDate(getDateValue(endDate))==0 &&
        compareDates(dateOffset(date, date_interval), getDateValue(endDate))>0) {
      setDateValue(endDate, dateOffset(date, date_interval));
      alert("End Date was too early, and it's reset to "+date_interval+" days after Start Date.");
    }
  }
}

function checkForm() {
  var startDate=document.forms[0]["start_date"];
  var endDate=document.forms[0]["end_date"];

  if (checkDate(getDateValue(startDate))!=0) {
    alert("Please select a Start Date.");
  }
  else if (checkDate(getDateValue(endDate))!=0) {
    alert("Please select an End Date.");
  }
  else if (compareDates(dateOffset(getDateValue(startDate), date_interval), getDateValue(endDate))>0) {
    alert("End Date should be at least "+date_interval+" days after Start Date.");
  }
  else {
    alert("Dates are good.");
  }
}