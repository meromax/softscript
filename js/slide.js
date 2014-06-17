(function($) {

	$.fn.easySlider = function(options){
	  
		// default configuration properties
		var defaults = {			
			prevId: 		'prevBtn',
			prevText: 		'Previous',
			nextId: 		'nextBtn',	
			nextText: 		'Next',
			controlsShow:	true,
			controlsBefore:	'',
			controlsAfter:	'',	
			controlsFade:	true,
			firstId: 		'firstBtn',
			firstText: 		'First',
			firstShow:		false,
			lastId: 		'lastBtn',	
			lastText: 		'Last',
			lastShow:		false,				
			vertical:		false,
			speed: 			200,
			auto:			false,
			pause:			2000,
			continuous:		false
		}; 
		
		var options = $.extend(defaults, options);  
				
		this.each(function() {  
			var obj = $(this); 				
			var s = $("li", obj).length;
			var w = $("li", obj).width(); 
			var h = $("li", obj).height(); 
			obj.width(w); 
			obj.height(h); 
			obj.css("overflow","hidden");
			var ts = s-1;
			var t = 0;
			$("ul", obj).css('width',s*w);			
			if(!options.vertical) $("li", obj).css('float','left');
			
			if(options.controlsShow){
				var html = options.controlsBefore;
				if(options.firstShow) html += '<span id="'+ options.firstId +'"><a href=\"javascript:void(0);\">'+ options.firstText +'</a></span>';
				html += ' <span id="'+ options.prevId +'"><a class="png" href=\"javascript:void(0);\">'+ options.prevText +'</a></span>';
				html += ' <span id="'+ options.nextId +'"><a class="png" href=\"javascript:void(0);\">'+ options.nextText +'</a></span>';
				if(options.lastShow) html += ' <span id="'+ options.lastId +'"><a href=\"javascript:void(0);\">'+ options.lastText +'</a></span>';
				html += options.controlsAfter;						
				$(obj).append(html);										
			};
	
			$("a","#"+options.nextId).click(function(){		
				animate("next",true);
			});
			$("a","#"+options.prevId).click(function(){		
				animate("prev",true);				
			});	
			$("a","#"+options.firstId).click(function(){		
				animate("first",true);
			});
			$("a","#"+options.lastId).click(function(){
				animate("last",true);
			});
			
			function animate(dir,clicked){
				var ot = t;				
				switch(dir){
					case "next":
						t = (ot>=ts) ? (options.continuous ? 0 : ts) : t+1;						
						break; 
					case "prev":
						t = (t<=0) ? (options.continuous ? ts : 0) : t-1;
						break; 
					case "first":
						t = 0;
						break; 
					case "last":
						t = ts;
						break; 
					default:
						break; 
				};	
				
				var diff = Math.abs(ot-t);
				var speed = diff*options.speed;						
				if(!options.vertical) {
					p = (t*w*-1);
					$("ul",obj).animate(
						{ marginLeft: p }, 
						speed
					);				
				} else {
					p = (t*h*-1);
					$("ul",obj).animate(
						{ marginTop: p }, 
						speed
					);					
				};
				
				if(!options.continuous && options.controlsFade){					
					if(t==ts){
						$("a","#"+options.nextId).hide();
						$("a","#"+options.lastId).hide();
					} else {
						$("a","#"+options.nextId).show();
						$("a","#"+options.lastId).show();					
					};
					if(t==0){
						$("a","#"+options.prevId).hide();
						$("a","#"+options.firstId).hide();
					} else {
						$("a","#"+options.prevId).show();
						$("a","#"+options.firstId).show();
					};					
				};				
				
				if(clicked) clearTimeout(timeout);
				if(options.auto && dir=="next" && !clicked){;
					timeout = setTimeout(function(){
						animate("next",false);
					},diff*options.speed+options.pause);
				};
				
			};
			// init
			var timeout;
			if(options.auto){;
				timeout = setTimeout(function(){
					animate("next",false);
				},options.pause);
			};		
		
			if(!options.continuous && options.controlsFade){					
				$("a","#"+options.prevId).hide();
				$("a","#"+options.firstId).hide();				
			};				
			
		});
	  
	};

})(jQuery);


$.fn.infiniteCarousel = function (pager_type, hide_controlls) {

    function repeat(str, num) {
        return new Array( num + 1 ).join( str );
    }
  
    return this.each(function () {


		var $wrapper = $('.wrapper', this).css('overflow', 'hidden'),
            $slider = $wrapper.find('> ul'),
            $items = $slider.find('> li'),
            $single = $items.filter(':first'),
            singleWidth = $single.outerWidth(),
			      visible = Math.ceil($wrapper.innerWidth() / singleWidth),
            currentPage = 1,
			      cSpeed = 3000,
            pages = Math.ceil($items.length); 
            
		var myInterval;
		
		// 1. If items is less then the visible items, abort the carousel
		if ( pages <= visible ) {
		  return false;
		}

    // 2. Top and tail the list with 'visible' number of items, top has the last section, and tail has the first
    $items.filter(':first').before($items.slice(- visible).clone().addClass('cloned'));
    $items.filter(':last').after($items.slice(0, visible).clone().addClass('cloned'));
    $items = $slider.find('> li'); // reselect
        
    // 3. Set the left position to the first 'real' item
    $wrapper.scrollLeft(singleWidth * visible);
    
    // 4. paging function
    function gotoPage(page) {
			
			controllerID = page -1;
			$(".carouselController").removeClass("carouselControllerCurrent");				
			if (page > pages )
			{
        $(".carouselController").eq(0).addClass("carouselControllerCurrent");			
			}
			else if(page == 0)
			{
        $(".carouselController").eq(pages-1).addClass("carouselControllerCurrent");
			}
			else 
			{
			 $(".carouselController").eq(controllerID).addClass("carouselControllerCurrent");
			}
			
			
      var dir = page < currentPage ? -1 : 1;
      var n = Math.abs(currentPage - page);
      var left = singleWidth * dir * n;
          
      //$wrapper.filter(':not(:animated)').css('border', '1px solid red');
      
            $wrapper.filter(':not(:animated)').animate({
                scrollLeft : '+=' + left
            }, cSpeed, function () {
                if (page == 0) {
                    $wrapper.scrollLeft(singleWidth * (pages+(visible-1)));
                    page = pages;
                } else if (page > pages) {
                    $wrapper.scrollLeft(singleWidth * visible);
                    // reset back to start position
                    page = 1;
                } 

                currentPage = page;
            });                
            
            return false;
        }
		
   function triggerTimer() {			
		myInterval = setInterval( function () { return gotoNextPage() },17000);	
	 }
	 
	 function clearTimer() {
		if ( myInterval !== undefined) {
		clearInterval(myInterval);		
		}

	 }
	 
	 function gotoNextPage() {
     gotoPage(currentPage + 1);
	 }
	 
	 if (!hide_controlls)
	 {
    $wrapper.after('<span class="prevBtn"><a href="javascript:void(0);" class="png">Previous</a></span>');
    $wrapper.after('<span class="nextBtn"><a href="javascript:void(0);" class="png">Next</a></span>');
    
    //$wrapper.after('<span id="playBtn"><a href=\"javascript:void(0);\"><img border="0" src="images/play.png" /></a></span>');
    //$wrapper.after('<span id="pauseBtn"><a href=\"javascript:void(0);\"><img border="0" src="images/pause.png" /></a></span>');
	  
		
		$('#pauseBtn').click(function () {
		  clearTimer();
		  $('#pauseBtn').fadeOut(250);
		  $('#playBtn').fadeIn(250);
		});
		
		
		$('#playBtn').click(function () {
		  triggerTimer();
		  $('#playBtn').fadeOut(250);
		  $('#pauseBtn').fadeIn(250);
		});
	 }
		
		
		if (pager_type == "pager")
		{
			numOfPages = $(".infiniteCarousel li").not('.cloned').length;			
			for (var p=0; p<numOfPages; p++){
				$(".carouselControllerContainer").append('<a href="javascript:void(0);" class="carouselController">&nbsp;</a>');
			}
			$(".carouselController").eq(0).addClass("carouselControllerCurrent");
			cSpeed = 3000;
			triggerTimer();			
		}

		
    // 5. Bind to the forward and back buttons
    $('.prevBtn', this).click(function () {
	      clearTimer();
        return gotoPage(currentPage - 1);  
	
    });
    
    $('.nextBtn', this).click(function () {
	      clearTimer();
        return gotoPage(currentPage + 1);
    });
		
        // bind controlls to paging function
		$('.carouselController', this).click(function () {
            gotoPageNum = $(".carouselController").index(this) + 1;
			clearTimer();
			return gotoPage(gotoPageNum);
			
        });
		
        // create a public interface to move to a specific page
        $(this).bind('goto', function (event, page) {
			      clearTimer();
            gotoPage(page);
        });
    });  
};


function infiniteSlider(hide_controlls) 
{
	if ($(".infiniteCarousel").length > 0) 
	{
		jQuery.easing.def = "easeOutCubic";
		if ($(".startCarousel").length > 0) 
		{
			$('.startCarousel').infiniteCarousel("pager", hide_controlls);
		}
		else
		{
			$('.infiniteCarousel').infiniteCarousel("none", hide_controlls);			
		}
	}
}