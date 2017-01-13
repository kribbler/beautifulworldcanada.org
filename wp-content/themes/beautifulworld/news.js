jQuery(document).ready(function($) {
	var serve=function(path,width) {
		path=path.split('/');
		var j=path.length-1;
		path[j]='thumb.'+width+'x0.'+path[j];
		return path.join('/');
	};
	$('#galllist img').livequery('click',function() {
		var y=$(this).parents('#fgall:eq(0)');
		$('img:eq(0)',y).attr('src',$(this).data('big'));
		$('#caption',y).text($(this).data('caption'));
	});
	$('#galllist').livequery(function() {
		$(this).bxSlider({
			minSlides: 4,
			maxSlides: 4,
			slideWidth: 180,
			slideMargin: 20,
			pager:false
		});
	});
	$('.ajax').livequery('click',function() {
		var url=$(this).attr('href');
		$.fancybox.showLoading();
		$.ajax({
			url:url,
			success:function(c) {
				$.fancybox.hideLoading();
				c=c[0];
				var t=$('<div>'+c.content+'</div>');
				var i=[];
				var cap=[];
				$('img',t).each(function() {
					var im=$(this).attr('src');
					if (im) {
						i.push(im);
						cap.push($(this).attr('alt'));
					}
				});
				if (i.length==0) {
					alert('No images in the gallery at the moment');
					return;	
				}
				$('img',t).remove();
				$('*',t).each(function() {
					if (!this)
						return;
					var tx=$(this).text().replace(/(^[\r\n\t ]+|[\r\n\t ]+$)/g,'');
					if (tx=='')
						$(this).remove();
				});
				var y=$('<div id="fgall"><div class="text"></div><div class="cont"><div id="caption"></div><img/></div><ul id="galllist"></ul></div>');
				$('img:eq(0)',y).attr('src',serve(i[0],800));
				$('#caption',y).text(cap[0]);
				var ul=$('ul',y);
				for (var n=0,j=i.length;n<j;n++) {
					var li=$('<li><img/></li>');
					$('img',li).attr('src',serve(i[n],180));
					$('img',li).attr('data-big',serve(i[n],800));
					$('img',li).attr('data-caption',cap[n]);
					li.appendTo(ul);
				}
				$('.text',y).append(t);
				$.fancybox({
					content:y,
					width:840,
					autoHeight:true,
					autoSize:false
				});
			},
			error:function() {
				$.fancybox.hideLoading();
			}
		});
		return false;
	});
});