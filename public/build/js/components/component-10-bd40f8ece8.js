webpackJsonp([10],{33:function(t,i,r){"use strict";i["default"]={props:{username:{type:String,required:!0},initials:{type:String},backgroundColor:{type:String},color:{type:String},size:{type:Number,"default":50},src:{type:String},rounded:{type:Boolean,"default":!0},lighten:{type:Number,"default":80}},data:function(){return{backgroundColors:["#F44336","#FF4081","#9C27B0","#673AB7","#3F51B5","#2196F3","#03A9F4","#00BCD4","#009688","#4CAF50","#8BC34A","#CDDC39","#FFC107","#FF9800","#FF5722","#795548","#9E9E9E","#607D8B"]}},mounted:function(){this.$emit("avatar-initials",this.username,this.userInitial)},computed:{background:function(){return this.backgroundColor||this.randomBackgroundColor(this.username.length,this.backgroundColors)},fontColor:function(){return this.color||this.lightenColor(this.background,this.lighten)},isImage:function(){return void 0!==this.src},style:function e(){var e={width:this.size+"px",height:this.size+"px",borderRadius:this.rounded?"50%":0,textAlign:"center",verticalAlign:"middle"},t={background:"url("+this.src+") no-repeat",backgroundSize:this.size+"px "+this.size+"px",backgroundOrigin:"content-box"},i={backgroundColor:this.background,font:Math.floor(this.size/2.5)+"px/100px Helvetica, Arial, sans-serif",fontWeight:"bold",color:this.fontColor,lineHeight:this.size+Math.floor(this.size/20)+"px"},r=this.isImage?t:i;return Object.assign(e,r),e},userInitial:function(){var t=this.initials||this.initial(this.username);return t}},methods:{initial:function(t){for(var i=t.split(/[ -]/),r="",e=0;e<i.length;e++)r+=i[e].charAt(0);return r.length>3&&r.search(/[A-Z]/)!==-1&&(r=r.replace(/[a-z]+/g,"")),r=r.substr(0,3).toUpperCase()},randomBackgroundColor:function(t,i){return i[t%i.length]},lightenColor:function(t,i){var r=!1;"#"===t[0]&&(t=t.slice(1),r=!0);var e=parseInt(t,16),n=(e>>16)+i;n>255?n=255:n<0&&(n=0);var o=(e>>8&255)+i;o>255?o=255:o<0&&(o=0);var s=(255&e)+i;return s>255?s=255:s<0&&(s=0),(r?"#":"")+(s|o<<8|n<<16).toString(16)}}}},7:function(t,i,r){var e,n;e=r(33);var o=r(73);n=e=e||{},"object"!=typeof e["default"]&&"function"!=typeof e["default"]||(n=e=e["default"]),"function"==typeof n&&(n=n.options),n.render=o.render,n.staticRenderFns=o.staticRenderFns,t.exports=e},73:function(t,i){t.exports={render:function(){var t=this;return t._h("div",[t._h("div",{staticClass:"avatar",style:t.style},[this.src?t._e():t._h("span",[t._s(t.userInitial)])])])},staticRenderFns:[]}}});