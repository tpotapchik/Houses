//Плавающая
function q2w3_sidebar(e){function t(){}function f(t){var n=t.offset_top-t.fixed_margin_top;var s=i-e.margin_bottom;var o;if(e.width_inherit)o="inherit";else o=t.obj.css("width");var u=false;var a=false;var f=false;jQuery(window).on("scroll."+e.sidebar,function(e){var i=jQuery(this).scrollTop();if(i+t.fixed_margin_bottom>=s){if(!a){t.obj.css("position","fixed");t.obj.css("top","");t.obj.css("width",o);if(jQuery("#"+t.clone_id).length<=0)t.obj.before(t.clone);a=true;u=false;f=false}t.obj.css("bottom",i+r+t.next_widgets_height-s)}else if(i>=n){if(!u){t.obj.css("position","fixed");t.obj.css("top",t.fixed_margin_top);t.obj.css("bottom","");t.obj.css("width",o);if(jQuery("#"+t.clone_id).length<=0)t.obj.before(t.clone);u=true;a=false;f=false}}else{if(!f){t.obj.css("position","");t.obj.css("top","");t.obj.css("width","");if(jQuery("#"+t.clone_id).length>0)jQuery("#"+t.clone_id).remove();f=true;u=false;a=false}}}).trigger("scroll."+e.sidebar);jQuery(window).on("resize",function(){if(jQuery(window).width()<=e.screen_max_width){jQuery(window).off("load scroll."+e.sidebar);t.obj.css("position","");t.obj.css("top","");t.obj.css("width","");t.obj.css("margin","");t.obj.css("padding","");if(jQuery("#"+t.clone_id).length>0)jQuery("#"+t.clone_id).remove();f=true;u=false;a=false}}).trigger("resize")}if(!e.widgets)return false;if(e.widgets.length<1)return false;if(!e.sidebar)e.sidebar="q2w3-default-sidebar";var n=new Array;var r=jQuery(window).height();var i=jQuery(document).height();var s=e.margin_top;jQuery(".q2w3-widget-clone-"+e.sidebar).remove();for(var o=0;o<e.widgets.length;o++){widget_obj=jQuery("#"+e.widgets[o]);widget_obj.css("position","");if(widget_obj.attr("id")){n[o]=new t;n[o].obj=widget_obj;n[o].clone=widget_obj.clone();n[o].clone.children().remove();n[o].clone_id=widget_obj.attr("id")+"_clone";n[o].clone.addClass("q2w3-widget-clone-"+e.sidebar);n[o].clone.attr("id",n[o].clone_id);n[o].clone.css("height",widget_obj.height());n[o].clone.css("visibility","hidden");n[o].offset_top=widget_obj.offset().top;n[o].fixed_margin_top=s;n[o].height=widget_obj.outerHeight(true);n[o].fixed_margin_bottom=s+n[o].height;s+=n[o].height}else{n[o]=false}}var u=0;var a;for(var o=n.length-1;o>=0;o--){if(n[o]){n[o].next_widgets_height=u;n[o].fixed_margin_bottom+=u;u+=n[o].height;if(!a){a=widget_obj.parent();a.css("height","");a.height(a.height())}}}jQuery(window).off("load scroll."+e.sidebar);for(var o=0;o<n.length;o++){if(n[o])f(n[o])}}

jQuery(document).ready(function(){
    var q2w3_sidebar_1_options = { "margin_top" : 0, "margin_bottom" : 10, "screen_max_width" : 0, "width_inherit" : false, "widgets" : ['fixed-widget'] };
    q2w3_sidebar(q2w3_sidebar_1_options);
    setInterval(function () { q2w3_sidebar(q2w3_sidebar_1_options); }, 1500);
});