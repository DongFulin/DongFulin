(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pagesB-my-signin"],{"3b1e":function(t,e,n){"use strict";(function(t){var a=n("4ea4");n("ac1f"),n("1276"),Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var i=a(n("8269")),r={data:function(){return{height:"",show1:!0,data:"",signInfo:{},valueStatus:0}},components:{graceDate:i.default},onShow:function(){this.getSignInfo()},methods:{changeDate1:function(e,n,a){if(t.log(n),void 0==n)return!1;this.data=n;e.split("-"),n.split("-");if(e==n){var i=this.data.split("-"),r={type:0,date:i[i.length-1]};this.dosign(r)}},typesignin:function(t){var e={type:1,days:t};this.dosign(e)},getSignInfo:function(){var t=this;this.$http.getSignInfo().then((function(e){200===e.status&&(t.signInfo=e.data,t.statusMath(t))}))},dosign:function(t){var e=this;this.$http.getdosign(t).then((function(t){200==t.status&&(e.$toast(t.mess),e.getSignInfo())}))}},created:function(){}};e.default=r}).call(this,n("5a52")["default"])},"3ba7":function(t,e,n){var a=n("24fb");e=a(!1),e.push([t.i,".grace-date[data-v-f3e8920c]{position:fixed;z-index:10;vertical-align:top;left:0;top:0;width:%?730?%;padding:%?10?%;height:100%;background:#fff}.grace-date-header[data-v-f3e8920c]{display:flex;justify-content:center}.grace-date-header-btn[data-v-f3e8920c]{font-size:%?38?%;line-height:%?88?%;padding:0 20px}.grace-date-header-date[data-v-f3e8920c]{line-height:%?88?%;font-size:%?32?%;font-weight:700}.grace-date-week[data-v-f3e8920c]{height:auto;width:%?702?%;overflow:hidden;display:flex;flex-wrap:nowrap;margin:0 auto}.grace-date-week uni-view[data-v-f3e8920c]{width:%?96?%;height:%?80?%;font-size:%?32?%;line-height:%?80?%;text-align:center;margin:%?2?%}.grace-date-days[data-v-f3e8920c]{padding:%?10?% 0;width:%?702?%;display:flex;flex-wrap:wrap;margin:0 auto}.grace-date-days .items[data-v-f3e8920c]{width:%?96?%;text-align:center;height:%?96?%;line-height:%?96?%;margin:%?2?%;background:#f1f2f3;font-size:%?30?%}.grace-date-days .current[data-v-f3e8920c]{background:#00b26a}.grace-date-days .current uni-view[data-v-f3e8920c]{color:#fff}.grace-date-day[data-v-f3e8920c]{height:%?30?%;line-height:%?30?%;margin-top:%?30?%;justify-content:center}.grace-date-nl[data-v-f3e8920c]{height:%?22?%;line-height:%?22?%;color:#888;font-size:%?18?%;justify-content:center}.grace-date-time-title[data-v-f3e8920c]{margin-top:15px;line-height:2em;text-align:center}.grace-date-time[data-v-f3e8920c]{width:80%;margin:8px 10%;display:flex;flex-wrap:nowrap}.grace-date-time .timer[data-v-f3e8920c]{width:50%;height:40px;border-top:1px solid #f0f0f0;border-bottom:1px solid #f0f0f0}.grace-date-time .timer uni-picker[data-v-f3e8920c]{width:100%;height:40px;line-height:40px;text-align:center}.grace-date-time .timer-spliter[data-v-f3e8920c]{width:30px;flex-shrink:0;text-align:center;line-height:40px;font-size:20px}.grace-date-btn[data-v-f3e8920c]{width:80%;margin:0 10%;margin-top:20px;text-align:center;line-height:46px}",""]),t.exports=e},"3d1c":function(t,e,n){"use strict";n.r(e);var a=n("3b1e"),i=n.n(a);for(var r in a)"default"!==r&&function(t){n.d(e,t,(function(){return a[t]}))}(r);e["default"]=i.a},"4de2":function(t,e,n){"use strict";var a=n("f4dd"),i=n.n(a);i.a},"57d3":function(t,e,n){"use strict";n.r(e);var a=n("729e"),i=n.n(a);for(var r in a)"default"!==r&&function(t){n.d(e,t,(function(){return a[t]}))}(r);e["default"]=i.a},"57fd":function(t,e,n){var a=n("c0a2");"string"===typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);var i=n("4f06").default;i("d6405d8c",a,!0,{sourceMap:!1,shadowMode:!1})},"729e":function(t,e,n){"use strict";(function(t){n("a9e3"),n("e25e"),n("ac1f"),n("1276"),Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var a,i,r,s=new Array(100),c=new Array(12),o="一二三四五六七八九十";function u(t,e){return t>>e&1}function d(){var t,e,n,o;r=3!=arguments.length?new Date:new Date(arguments[0],arguments[1],arguments[2]);var d=!1,f=r.getYear();for(f<1900&&(f+=1900),t=365*(f-1921)+Math.floor((f-1921)/4)+c[r.getMonth()]+r.getDate()-38,r.getYear()%4==0&&r.getMonth()>1&&t++,e=0;;e++){for(o=s[e]<4095?11:12,n=o;n>=0;n--){if(t<=29+u(s[e],n)){d=!0;break}t=t-29-u(s[e],n)}if(d)break}1921+e,a=o-n+1,i=t,12==o&&(a==Math.floor(s[e]/65536)+1&&(a=1-a),a>Math.floor(s[e]/65536)+1&&a--)}function f(){var t="";return t+=i<11?"初":i<20?"十":i<30?"廿":"三十",i%10==0&&10!=i||(t+=o.charAt((i-1)%10)),t}function l(t,e,n){return t<1921||t>2020?"":(e=parseInt(e)>0?e-1:11,d(t,e,n),f())}s=new Array(2635,333387,1701,1748,267701,694,2391,133423,1175,396438,3402,3749,331177,1453,694,201326,2350,465197,3221,3402,400202,2901,1386,267611,605,2349,137515,2709,464533,1738,2901,330421,1242,2651,199255,1323,529706,3733,1706,398762,2741,1206,267438,2647,1318,204070,3477,461653,1386,2413,330077,1197,2637,268877,3365,531109,2900,2922,398042,2395,1179,267415,2635,661067,1701,1748,398772,2742,2391,330031,1175,1611,200010,3749,527717,1452,2742,332397,2350,3222,268949,3402,3493,133973,1386,464219,605,2349,334123,2709,2890,267946,2773,592565,1210,2651,395863,1323,2707,265877),c[0]=0,c[1]=31,c[2]=59,c[3]=90,c[4]=120,c[5]=151,c[6]=181,c[7]=212,c[8]=243,c[9]=273,c[10]=304,c[11]=334;var h={name:"graceCountd",props:{show:{type:Boolean,default:!1},currentHour:{type:Number,default:0},currenMinute:{type:Number,default:0},isTime:{type:Boolean,default:!0},sing_arr:{type:Array,default:function(){return[]}}},data:function(){return{weeks:["一","二","三","四","五","六","日"],cYear:2016,cMonth:6,days:[],currentDay:"2016",hours:[],minutes:[],currentHourD:0,currenMinuteD:0,valueStatus:0}},computed:{},methods:{gracClick:function(t,e){t&&!e&&this.chooseDate(t)},isSing:function(){for(var t=0;t<this.sing_arr.length;t++)for(var e=0;e<this.days.length;e++)this.sing_arr[t]==this.cYear+"-"+this.cMonth+"-"+this.days[e].date&&(this.days[e].isselect=!0);this.statusMath(this)},hourChange:function(t){var e=t.detail.value;this.currentHourD=e},minuteChange:function(t){var e=t.detail.value;this.currenMinuteD=e},getDaysInOneMonth:function(t,e){var n=new Date;return n.setFullYear(t),n.setMonth(e),n.setDate(0),n.getDate()},getDay:function(t,e,n){var a=new Date;return a.setFullYear(t),a.setMonth(e),a.setDate(n),a.getDay()},prevMonth:function(){var t=this.cMonth-1,e=this.cYear;t<1&&(t=12,e-=1),this.changeMonth(e,t),this.isSing()},nextMonth:function(){var t=this.cMonth+1,e=this.cYear;t>12&&(t=1,e+=1),this.changeMonth(e,t),this.isSing()},changeMonth:function(t,e){for(var n=[],a=this.getDaysInOneMonth(t,e),i=this.getDay(t,e-1,0),r=0,s=0-i;s<a;s++)s>=0?(n[r]={date:s+1,nl:""},n[r].nl=l(t,e,s+1)):n[r]="",r++;this.days=n,this.cYear=t,this.cMonth=e},chooseDate:function(e){t.log(this.currentDay);var n=this.currentDay.split("-"),a=n[0]+"-"+this.cMonth+"-"+e;this.$emit("changeDate",this.currentDay,a,this.days)},submit:function(){var t=this.currentDay.split("-");t[1]<10&&(t[1]="0"+t[1]),t[2]<10&&(t[2]="0"+t[2]),this.$emit("changeDate",t[0]+"-"+t[1]+"-"+t[2]+" "+this.hours[this.currentHourD]+":"+this.minutes[this.currenMinuteD])}},created:function(){var t=new Date,e=t.getFullYear(),n=t.getMonth()+1,a=e+"-"+n+"-"+t.getDate();this.cYear=e,this.cMonth=n,this.currentDay=a,this.changeMonth(e,n);for(var i=0;i<=23;i++){var r=i<10?"0"+i:i+"";this.hours.push(r)}for(i=0;i<=59;i++){var s=i<10?"0"+i:i+"";this.minutes.push(s)}this.currentHourD=this.currentHour,this.currenMinuteD=this.currenMinute,this.isSing()},watch:{sing_arr:function(t){this.sing_arr=t,this.isSing()}}};e.default=h}).call(this,n("5a52")["default"])},8269:function(t,e,n){"use strict";n.r(e);var a=n("e04f"),i=n("57d3");for(var r in i)"default"!==r&&function(t){n.d(e,t,(function(){return i[t]}))}(r);n("4de2");var s,c=n("f0c5"),o=Object(c["a"])(i["default"],a["b"],a["c"],!1,null,"f3e8920c",null,!1,a["a"],s);e["default"]=o.exports},"82be":function(t,e,n){"use strict";var a=n("57fd"),i=n.n(a);i.a},"93f1":function(t,e,n){"use strict";var a;n.d(e,"b",(function(){return i})),n.d(e,"c",(function(){return r})),n.d(e,"a",(function(){return a}));var i=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("v-uni-view",{staticClass:"index_class"},[n("v-uni-view",{staticClass:"signin"},[n("div",{staticClass:"signin_top"},[n("v-uni-view",{staticClass:"top_btn"},[n("i",{}),t._v(t._s(t.signInfo.today?"今日已签到":"今日未签到"))]),n("span",[t._v("已连续签到"+t._s(t.signInfo.continuous)+"天，总签到"+t._s(t.signInfo.total)+"天")])],1),n("div",{staticClass:"sing_date",style:"height:"+t.height},[n("div",{staticClass:"sing_mask"},[n("graceDate",{attrs:{show:t.show1,isTime:!1,sing_arr:t.signInfo.sign_list},on:{changeDate:function(e){arguments[0]=e=t.$handleEvent(e),t.changeDate1.apply(void 0,arguments)}}}),n("v-uni-view",{staticClass:"tsp"},[n("span"),n("v-uni-text",{attrs:{href:"javascript:;"},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.getnav("/pagesB/my/record")}}},[t._v("签到记录")])],1)],1)]),n("div",{staticClass:"steps"},[n("div",{staticClass:"ad_til"},[t._v("连续签到有礼")]),n("div",{staticClass:"ad_pil"},[t._v("每日签到领积分")]),n("div",{staticClass:"date_step al"},t._l(t.signInfo.guize,(function(e,a){return n("div",{key:a,on:{click:function(n){arguments[0]=n=t.$handleEvent(n),t.typesignin(e.today)}}},[n("span",[n("i",{staticClass:"iconfont icon_e7c3"})]),n("span",[t._v(t._s(e.today)+"天")]),n("div",{staticClass:"date_title"},[t._v("领取"),n("br"),t._v(t._s(e.num)+"积分")])])})),0)])])],1)},r=[]},c0a2:function(t,e,n){var a=n("24fb");e=a(!1),e.push([t.i,'@charset "UTF-8";\n/**\n  * @Description: WoShop\n  * @Author: Parker\n  * @Copyright: 武汉一一零七科技有限公司©版权所有\n  * @Link: www.wo-shop.net\n  * @Contact: QQ:2487937004\n  * =======================================================================================\n  * 这里是uni-app内置的常用样式变量\n  * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量\n  * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\n  *\n */\n/**\n  * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\n  *\n  * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件\n */\n/* 颜色变量 */\n/* 行为相关颜色 */\n/* 文字基本颜色 */\n/* 背景颜色 */\n/* 边框颜色 */\n/* 尺寸变量 */\n/* 文字尺寸 */\n/* 图片尺寸 */\n/* Border Radius */\n/* 水平间距 */\n/* 垂直间距 */\n/* 透明度 */\n/* 文章场景相关 */@font-face{font-family:webfont;font-display:swap;src:url(//at.alicdn.com/t/webfont_li5p20ilokm.eot);\n  /* IE9*/src:url(//at.alicdn.com/t/webfont_li5p20ilokm.eot#iefix) format("embedded-opentype"),url(//at.alicdn.com/t/webfont_li5p20ilokm.woff2) format("woff2"),url(//at.alicdn.com/t/webfont_li5p20ilokm.woff) format("woff"),url(//at.alicdn.com/t/webfont_li5p20ilokm.ttf) format("truetype"),url(//at.alicdn.com/t/webfont_li5p20ilokm.svg#Alibaba-PuHuiTi-Regular) format("svg")\n  /* iOS 4.1- */}.textEllipsis[data-v-175ab841]{overflow:hidden;white-space:nowrap;text-overflow:ellipsis}.liveStatus[data-v-175ab841]{position:absolute;top:%?8?%;left:%?10?%;z-index:99;background-color:rgba(0,0,0,.6);display:flex;justify-content:center;align-items:center;flex-wrap:wrap;flex-direction:row;border-radius:100px;padding-right:%?16?%}.liveAn[data-v-175ab841]{display:flex;justify-content:center;align-items:center;flex-wrap:wrap;flex-direction:row;background-image:linear-gradient(90deg,#ffa468,#fa3f3f);width:%?28?%;height:%?24?%;border-radius:100px;padding:%?4?% %?8?%;margin-right:%?8?%;border-top-right-radius:%?20?%}.seeNum[data-v-175ab841]{font-size:%?24?%;color:#fff;line-height:%?24?%}.al[data-v-175ab841]{display:flex;justify-content:space-between}',""]),t.exports=e},e04f:function(t,e,n){"use strict";var a;n.d(e,"b",(function(){return i})),n.d(e,"c",(function(){return r})),n.d(e,"a",(function(){return a}));var i=function(){var t=this,e=t.$createElement,n=t._self._c||e;return t.show?n("v-uni-view",{staticClass:"grace-date"},[n("v-uni-view",{staticClass:"grace-date-header"},[n("v-uni-view",{staticClass:"grace-date-header-btn",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.prevMonth.apply(void 0,arguments)}}},[n("v-uni-text",{staticClass:"grace-iconfont icon-arrow-left"})],1),n("v-uni-view",{staticClass:"grace-date-header-date"},[t._v(t._s(t.cYear)+"年"+t._s(t.cMonth)+"月")]),n("v-uni-view",{staticClass:"grace-date-header-btn",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.nextMonth.apply(void 0,arguments)}}},[n("v-uni-text",{staticClass:"grace-iconfont icon-arrow-right"})],1)],1),n("v-uni-view",{staticClass:"grace-date-week"},t._l(t.weeks,(function(e,a){return n("v-uni-view",{key:a},[t._v(t._s(e))])})),1),n("v-uni-view",{staticClass:"grace-date-days"},t._l(t.days,(function(e,a){return n("v-uni-view",{key:a,class:["items",t.currentDay==t.cYear+"-"+t.cMonth+"-"+e.date?"current":"",e.isselect?"current":""],style:{background:""==e?"none":""},attrs:{"data-date":t.cYear+"-"+t.cMonth+"-"+e.date},on:{click:function(n){arguments[0]=n=t.$handleEvent(n),t.gracClick(e.date,e.isselect)}}},[n("v-uni-view",{staticClass:"grace-date-day"},[t._v(t._s(e.date?e.date:""))]),n("v-uni-view",{staticClass:"grace-date-nl"},[t._v(t._s(e.nl?e.nl:""))])],1)})),1),t.isTime?n("v-uni-view",[n("v-uni-view",{staticClass:"grace-date-time-title"},[t._v("时间")]),n("v-uni-view",{staticClass:"grace-date-time"},[n("v-uni-view",{staticClass:"timer"},[n("v-uni-picker",{attrs:{mode:"selector",range:t.hours},on:{change:function(e){arguments[0]=e=t.$handleEvent(e),t.hourChange.apply(void 0,arguments)}}},[n("v-uni-view",[t._v(t._s(t.hours[t.currentHourD]))])],1)],1),n("v-uni-view",{staticClass:"timer-spliter"},[t._v(":")]),n("v-uni-view",{staticClass:"timer"},[n("v-uni-picker",{attrs:{mode:"selector",range:t.minutes},on:{change:function(e){arguments[0]=e=t.$handleEvent(e),t.minuteChange.apply(void 0,arguments)}}},[n("v-uni-view",[t._v(t._s(t.minutes[t.currenMinuteD]))])],1)],1)],1),n("v-uni-view",{staticClass:"grace-date-btn"},[n("v-uni-button",{attrs:{type:"primary"},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.submit.apply(void 0,arguments)}}},[t._v("确定")])],1)],1):t._e()],1):t._e()},r=[]},e536:function(t,e,n){"use strict";n.r(e);var a=n("93f1"),i=n("3d1c");for(var r in i)"default"!==r&&function(t){n.d(e,t,(function(){return i[t]}))}(r);n("82be");var s,c=n("f0c5"),o=Object(c["a"])(i["default"],a["b"],a["c"],!1,null,"175ab841",null,!1,a["a"],s);e["default"]=o.exports},f4dd:function(t,e,n){var a=n("3ba7");"string"===typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);var i=n("4f06").default;i("60b739ae",a,!0,{sourceMap:!1,shadowMode:!1})}}]);