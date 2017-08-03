var ximen = {
 $:function(o){ return document.getElementById(o); },
 getStyle:function(o) { return o.currentStyle||document.defaultView.getComputedStyle(o,null); },
 getOffset:function(o) {
  var t = o.offsetTop,h = o.offsetHeight;
  while(o = o.offsetParent) { t += o.offsetTop; }
  return { top:t, height:h };
 },
 bind:function(o,eType,fn) {
  if(o.addEventListener) { o.addEventListener(eType,fn,false); }
  else if(o.attachEvent) { o.attachEvent("on" + eType,fn); }
  else { o["on" + eType] = fn; }
 },
 unbind:function(o,eType,fn) {
  if(o.removeEventListener) { o.removeEventListener(eType,fn,false); }
  else if(o.detachEvent) { o.detachEvent("on" + eType,fn); }
  else { o["on" + eType] = fn; }
 },
 stopPropagate:function(e) {
  if(e && e.stopPropagation) { e.stopPropagation(); } 
  else { window.event.cancelBubble = true; }
  return false;
 },
 stopDefault:function(e) {
  e = e || window.event;
  e.stopPropagation && (e.preventDefault(),e.stopPropagation()) || (e.cancelBubble = true,e.returnValue = false);
 }
};
(function(){
 var myScrollDown,myScrollUp,scrollBarMouseDown,scrollBarMouseUp,relY,
  out = ximen.$("out"),
  content = ximen.$("content"),
  scrollBar = ximen.$("scrollBar"),
  scrollBarTop = ximen.$("scrollBarTop"),
  scrollBarHandle = ximen.$("scrollBarHandle"),
  scrollBarBottom = ximen.$("scrollBarBottom"),
  scrollBarUpHeight = parseInt(ximen.getStyle(scrollBarTop).height),
  scrollBarBottomHeight = parseInt(ximen.getStyle(scrollBarBottom).height),
  contentScrollHeight = content.scrollHeight,//将content.scrollHeight赋一次值,解决IE6下scrollHeight需调用两次的bug
  scrollBarHandleHeight = parseInt(content.offsetHeight/content.scrollHeight * (scrollBar.offsetHeight - scrollBarUpHeight - scrollBarBottomHeight)),
  setScrollBarHandle = function() {//当内容超多时设置拖拽条子的最小高度
   scrollBarHandle.style.top = scrollBarUpHeight + "px";
   if(scrollBarHandleHeight > 15) { scrollBarHandle.style.height = scrollBarHandleHeight + "px"; }
   else { scrollBarHandleHeight = 15; scrollBarHandle.style.height = "15px"; }
  },
  clearAllInterval = function() { clearInterval(myScrollDown); clearInterval(myScrollUp); clearInterval(scrollBarMouseDown); },
  forMousemove = function(e) {
   var e = e || window.event;
   content.scrollTop = (e.clientY - relY - scrollBarUpHeight)/(scrollBar.offsetHeight - scrollBarHandleHeight - scrollBarUpHeight - scrollBarBottomHeight)*(content.scrollHeight - content.offsetHeight);
  },
  forMouseDown = function(event){
   var et = event.target || event.srcElement;
   relY = event.clientY - et.offsetTop;
   ximen.bind(document,"mousemove",forMousemove);
  },
  scrollDir = function(e) {
   var e = e || window.event,eDir;     //设置滚轮事件,e.wheelDelta与e.detail分别兼容IE、W3C，根据返回值的正负来判断滚动方向
   if(e.wheelDelta) { eDir = e.wheelDelta/120; }
   else if(e.detail) { eDir = -e.detail/3; }
   if(eDir > 0) { content.scrollTop -= 80; } //步长设80像素a比较接近window滚动条的滚动速度
   else { content.scrollTop += 80; }
   ximen.stopDefault(e);
  },
  scrollBarClick = function(e) {
   var e = e || window.event,
    mStep = scrollBar.offsetHeight,
    documentScrollTop = document.documentElement.scrollTop,
    hOffset = ximen.getOffset(scrollBarHandle);
   if(documentScrollTop + e.clientY < hOffset.top) { scrollBarMouseDown = setInterval(function(){ content.scrollTop -= 15; },10); }
   else if(documentScrollTop + e.clientY > hOffset.top + hOffset.height) { scrollBarMouseDown = setInterval(function(){ content.scrollTop += 15; },10); }
  };
 setScrollBarHandle();
 ximen.bind(content,"scroll",function(){
  scrollBarHandle.style.top = content.scrollTop/(content.scrollHeight - content.offsetHeight) * (scrollBar.offsetHeight - scrollBarHandleHeight - scrollBarUpHeight - scrollBarBottomHeight) + scrollBarUpHeight + "px";
 });
 ximen.bind(scrollBarBottom,"mousedown",function(){ myScrollDown = setInterval(function(){ content.scrollTop += 15; },10); });
 ximen.bind(scrollBarTop,"mousedown",function(){ myScrollUp = setInterval(function(){ content.scrollTop -= 15; },10); });
 ximen.bind(scrollBarBottom,"mouseup",clearAllInterval);
 ximen.bind(scrollBarBottom,"mouseout",clearAllInterval);
 ximen.bind(scrollBarTop,"mouseup",clearAllInterval);
 ximen.bind(scrollBarTop,"mouseout",clearAllInterval);
 ximen.bind(scrollBarHandle,"mousedown",forMouseDown);
 ximen.bind(document,"mouseup",function(){
  ximen.unbind(document,"mousemove",forMousemove);
  ximen.unbind(scrollBarHandle,"mousemove",forMousemove);
 });
 ximen.bind(out,"selectstart",function(){ return false; });
 ximen.bind(out,"select",function(){ document.selection.empty(); });
 ximen.bind(out,"mousewheel",scrollDir);
 ximen.bind(out,"DOMMouseScroll",scrollDir);
 ximen.bind(scrollBar,"mousedown",scrollBarClick);
 ximen.bind(scrollBar,"mouseup",clearAllInterval);
 ximen.bind(scrollBarTop,"click",function(event){ ximen.stopPropagate(event); });
 ximen.bind(scrollBarTop,"mousedown",function(){ scrollBarTop.className = "scroll_bar_top_a"; });
 ximen.bind(scrollBarTop,"mouseup",function(){ scrollBarTop.className = "scroll_bar_top"; });
 ximen.bind(scrollBarTop,"mouseout",function(){ scrollBarTop.className = "scroll_bar_top"; });
 ximen.bind(scrollBarBottom,"click",function(event){ ximen.stopPropagate(event); });
 ximen.bind(scrollBarBottom,"mousedown",function(){ scrollBarBottom.className = "scroll_bar_bottom_a"; });
 ximen.bind(scrollBarBottom,"mouseup",function(){ scrollBarBottom.className = "scroll_bar_bottom"; });
 ximen.bind(scrollBarBottom,"mouseout",function(){ scrollBarBottom.className = "scroll_bar_bottom"; });
})();