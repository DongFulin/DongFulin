(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pagesC-shop-shopGoods"],{"0977":function(t,i,e){"use strict";var s;e.d(i,"b",(function(){return n})),e.d(i,"c",(function(){return a})),e.d(i,"a",(function(){return s}));var n=function(){var t=this,i=t.$createElement,s=t._self._c||i;return s("v-uni-view",{staticClass:"index_class"},[s("v-uni-view",{staticClass:"header-filter"},[s("v-uni-view",{staticClass:"items ",class:[1==t.showIndex?"filter-active":""],on:{click:function(i){arguments[0]=i=t.$handleEvent(i),t.searchIndex(1,"zonghe")}}},[t._v("综合排序")]),s("v-uni-view",{staticClass:"items",class:[2==t.showIndex?"filter-active":""],on:{click:function(i){arguments[0]=i=t.$handleEvent(i),t.searchIndex(2,"deal_num")}}},[t._v("销量优先")]),s("v-uni-view",{staticClass:"items money_al",class:[3===t.showIndex?"filter-active":""],on:{click:function(i){arguments[0]=i=t.$handleEvent(i),t.searchIndex(3,"praise_lv")}}},[s("v-uni-text",[t._v("价格")]),s("v-uni-view",{staticClass:"over"},[s("i",{staticClass:"iconfont icon_eb15",class:{"ac-color":1===t.filteAl}}),s("i",{staticClass:"iconfont icon_eb14",class:{"ac-color":2===t.filteAl}})])],1),s("v-uni-view",{staticClass:"items",class:[4==t.showIndex?"filter-active":""],on:{click:function(i){arguments[0]=i=t.$handleEvent(i),t.searchIndex(4,"new")}}},[t._v("新品")]),s("v-uni-view",{on:{click:function(i){arguments[0]=i=t.$handleEvent(i),t.getback.apply(void 0,arguments)}}},[t._v("分类")])],1),s("v-uni-view",{staticClass:"type-fliter"},[s("v-uni-view",{staticClass:"r-list",staticStyle:{"padding-top":"88upx"}},t._l(t.goodsList,(function(i,n){return s("v-uni-view",{key:n,staticClass:"r-items",attrs:{"hover-class":"item-active-hover"},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.getnav("/pagesC/goods/goodsDetails?id="+i.id)}}},[s("v-uni-image",{attrs:{src:i.thumb_url}}),s("v-uni-text",{staticStyle:{"text-align":"left"}},[t._v(t._s(i.goods_name))]),s("v-uni-view",{staticClass:"r-money"},[s("v-uni-text",[t._v("¥"+t._s(i.zs_price))])],1),s("v-uni-view",{staticClass:"r-bottom"},[i.coupon?s("v-uni-image",{attrs:{src:e("20e3")}}):t._e(),1===i.is_activity?s("v-uni-text",[t._v("秒杀")]):t._e(),2===i.is_activity?s("v-uni-text",[t._v("团购")]):t._e(),1===i.leixing?s("v-uni-text",[t._v("自营")]):t._e()],1)],1)})),1),t.isshow?s("v-uni-view",{staticClass:"depot"},[s("v-uni-image",{staticClass:"img",attrs:{src:t.$imgGoodsNullUrl}}),s("v-uni-view",{staticClass:"tps",staticStyle:{"margin-top":"15upx"}},[t._v("暂无商品")])],1):t._e(),s("loadMore",{attrs:{loadingType:t.loadingType}})],1)],1)},a=[]},"1b92":function(t,i,e){"use strict";var s=e("54f1"),n=e.n(s);n.a},"20e3":function(t,i){t.exports="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAAA6BAMAAADVUMOiAAAAD1BMVEX/RET5Pj76Pz//+fn8i4vmLQf7AAAAAnRSTlMBkeiAX6sAAAFmSURBVHjavZbtjcMgDIbpTdBkggthgpoJMPvPdHzjxkAs9VT/oEh5io39GlBKbbu+sWNTwTYtsEA+tMie6kcG/qpdBh5yUAttBBofR7cCDcbPCGn0KzAjkKavJWgjaNt/pjEmJtOw3MwZ1snLpmEOxshSdFfPLD3WZSbvfwIauJj7GkhzyWu9c9DJZIYTkLUC2nEr9OYyPhlY38yR5urkCcxelFM1zDl4ZK6GmVxj8QxAXD8LqAZ7pnuvCyqSopZtmvYBaHrZSAEHIPZ1yJSDhuqgzxkY1dOTjY1sYE1P+IQ9hzY4v6Rnr1GBo2BwUMjjbcEQlNfJZfZstW/72ShXZUN+upDeTlxTFia8IzLbNe/sgSy5ws9a7DuwnjkMnPXgzdnT5HU9HvkhJQMNdj2uTjPThGBwCRYu1DLUenV9QHaclGFXYC0zNN3MYnS1b53o5hJfcR+C/39fi58K4seH+DkjfSD9AatpRJEPZHykAAAAAElFTkSuQmCC"},"525f":function(t,i,e){var s=e("24fb");i=s(!1),i.push([t.i,".header-filter[data-v-e4ee6d08]{position:fixed!important;width:100%;z-index:999}",""]),t.exports=i},"54f1":function(t,i,e){var s=e("525f");"string"===typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);var n=e("4f06").default;n("bc6f7b5c",s,!0,{sourceMap:!1,shadowMode:!1})},"5e16":function(t,i,e){"use strict";e.r(i);var s=e("0977"),n=e("962d");for(var a in n)"default"!==a&&function(t){e.d(i,t,(function(){return n[t]}))}(a);e("1b92");var o,l=e("f0c5"),c=Object(l["a"])(n["default"],s["b"],s["c"],!1,null,"e4ee6d08",null,!1,s["a"],o);i["default"]=c.exports},"962d":function(t,i,e){"use strict";e.r(i);var s=e("c8f02"),n=e.n(s);for(var a in s)"default"!==a&&function(t){e.d(i,t,(function(){return s[t]}))}(a);i["default"]=n.a},c8f02:function(t,i,e){"use strict";(function(t){var s=e("4ea4");e("99af"),e("4e82"),Object.defineProperty(i,"__esModule",{value:!0}),i.default=void 0;var n=s(e("2909")),a=s(e("5530")),o={},l={onLoad:function(i){t.log(i),o=(0,a.default)((0,a.default)({},i),{},{sort:"zonghe",page:1}),this.getallgoods(o)},data:function(){return{loadingType:0,showIndex:1,filteAl:0,goodsList:[],isshow:!1}},onReachBottom:function(){if(1==this.loadingType||2==this.loadingType)return!1;this.loadingType=1,o.page++,this.getallgoods(o)},methods:{searchIndex:function(t,i){this.showIndex=t,o.sort=i,o.page=1,this.goodsList=[],this.loadingType=0,3===t&&(1===this.filteAl?(this.filteAl=2,o.sort="height_low"):(this.filteAl=1,o.sort="low_height")),this.$loading(),this.getallgoods(o)},getallgoods:function(t){var i=this;this.$http.getallgoods(t).then((function(t){if(200==t.status){if(0==t.data.length)return 0==i.goodsList.length&&(i.isshow=!0),i.loadingType=2,!1;i.goodsList=[].concat((0,n.default)(i.goodsList),(0,n.default)(t.data)),i.loadingType=0,0==i.goodsList.length&&(i.isshow=!0)}}))}}};i.default=l}).call(this,e("5a52")["default"])}}]);