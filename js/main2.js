$(document).ready(function() {
    /*===========================================================================================================
     ===========================================================|Menu|===========================================
     ==========================================================================================================*/

	 $('.slider-services-mob').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        centerMode: true,
        variableWidth: true
    });


    $('.btn-nav').click(function () {
        $('.nav-menu').css({'left':'0', 'z-index':'10000'});
        $('.block-menu').css({'z-index':'9999', 'opacity':'1'});
    });
    $('.close-nav').click(function () {
        $('.nav-menu').css({'left':'-550px'});
        $('.block-menu').css({'z-index':'-1', 'opacity':'0'});
    });
    $('.block-menu').click(function () {
        $('.nav-menu').css({'left':'-550px'});
        $('.block-menu').css({'z-index':'-1', 'opacity':'0'});
    });
    $('.nav-menu li a').click(function () {
        $('.nav-menu').css({'left':'-550px'});
        $('.block-menu').css({'z-index':'-1', 'opacity':'0'});
    });
    $('.nav-menu .link-popup').click(function () {
        $('.nav-menu').css({'left':'-550px'});
        $('.block-menu').css({'z-index':'-1', 'opacity':'0'});
    });
    $(".drop-down-link").hover(
        function () {
            $('.drop-down').slideToggle(0);
        }, function () {
            $('.drop-down').slideToggle(0);
        });


    var winPos;
    $(window).scroll(function() {
            winPos = $(window).scrollTop();
            if (winPos >= 100) {
                $('.nav-lend-loc').css({'top':'0', 'z-index':'1000', 'transition':'.5s'});
            }
            else {
                $('.nav-lend-loc').css({'top':'-50px', 'z-index':'-1', 'transition':'.5s'});
            }
       });
    /*===========================================================================================================
     ===========================================================|Scroll|============================================
     ===========================================================================================================*/
    $('a.nav-link-1').click(function(){
        var el = $(this).attr('href');
        $('body').animate({
            scrollTop: $(el).offset().top-50}, 500);
        return false;
    });
    $('a.nav-link-2').click(function(){
        var el = $(this).attr('href');
        $('body').animate({
            scrollTop: $(el).offset().top-50}, 1000);
        return false;
    });
    $('a.nav-link-3').click(function(){
        var el = $(this).attr('href');
        $('body').animate({
            scrollTop: $(el).offset().top-50}, 1500);
        return false;
    });
    $('a.nav-link-4').click(function(){
        var el = $(this).attr('href');
        $('body').animate({
            scrollTop: $(el).offset().top-20}, 2000);
        return false;
    });
    $('a.nav-link-5').click(function(){
        var el = $(this).attr('href');
        $('body').animate({
            scrollTop: $(el).offset().top+20}, 2500);
        return false;
    });
    /*===========================================================================================================
     ===========================================================|Phone hover|====================================
     ==========================================================================================================*/
    $(".phone").hover(
        function () {
            $('.block-phone-hover').slideToggle(0);
        }, function () {
            $('.block-phone-hover').slideToggle(0);
        });
    /*===========================================================================================================
     ===========================================================|Slider services|=================================
     ===========================================================================================================*/
    $('.slick-slide.slick-active a div').css({'display':'block','color':'#fff'});
    $('.slick-active:first a div').css({'display':'none'});
    $('.slick-active:last a div').css({'display':'none'});

	function showHideSlideDiv() {
		$('.slick-slide a div').css({'display':'none'});
        $('.slick-slide.slick-active a div').css({'display':'block','color':'#fff'});
	}
	showHideSlideDiv();
    $('.slick-next').click(showHideSlideDiv);
    $('.slick-prev').click(showHideSlideDiv);
    /*============================================================================================================
     ===========================================================|Slider services mob|=============================
     ===========================================================================================================*/
    $('.slider-doc-mob').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        centerMode: true,
        variableWidth: true
    });
    $('.sertificat-slide').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        centerMode: true,
        variableWidth: true
    });
    $('.slide-1').click(function () {
        location.href = "lazernaya-epilyasia.html";
    });
    $('.slide-2').click(function () {
        location.href = "lechenie-akne.html";
    });
    $('.slide-3').click(function () {
        location.href = "lechenie-rezecea.html";
    });
    $('.slide-4').click(function () {
        location.href = "permanentnyi-makiyag.html";
    });
    $('.slide-5').click(function () {
        location.href = "fotoomologenie.html";
    });
    $('.slide-6').click(function () {
        location.href = "ydalenie-pigmentnyh.html";
    });
    $('.slide-7').click(function () {
        location.href = "ydalenie-cocydictoy-cetki.html";
    });
    $('.slide-8').click(function () {
        location.href = "ydalenie-taty-i-tatyaga.html";
    });
    $('.slide-9').click(function () {
        location.href = "ELOS-epilyasia-pyshkovih-volos.html";
    });
    $('.slide-10').click(function () {
        location.href = "RF-lifting.html";
    });
    /*============================================================================================================
     ============================================================|Slider technology|===============================
     ============================================================================================================*/
    $('.slider-doc').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1
    });
    $('.slide-show-mob-sal').slick();
    /*============================================================================================================
     ============================================================|Slider technology|===============================
     ============================================================================================================*/
    $('.slider-review').slick();
    /*============================================================================================================
     ============================================================|Ackordeon|=======================================
     ============================================================================================================*/
    $('.ackordeon_body>article').not(':first-of-type').hide();

    $('.ackordeon_body>h4').click(function() {

        var findArticle = $(this).next();
        var findWrapper = $(this).closest('.ackordeon_body');
        if (findArticle.is(':visible')) {
            findArticle.slideUp('fast');
        }
        else {
            findWrapper.find('>article').slideUp('fast');
            findArticle.slideDown('fast');
        }
    });
    /*============================================================================================================
     ============================================================|modal|===========================================
     ============================================================================================================*/
    $('[data-toggle="modal"]').click(function(){
        var target = $(this).data('target');
        $(".js_feedback-3").find("input").removeClass("error");
        $(".js_feedback-3 input.js_name-2,.js_feedback-3 input.js_phone-2").val("");
        var title = $(this).data("title");
        $(target).find(".screen_title").html(title);
        $(target).find(".js_input_title").val(title);
    });
    /*modal title*/

    /*=============================================================================================================
     ===========================================================|Constructor|=======================================
     =============================================================================================================*/
    $("path").hover(
        function () {
            id_p = $(this).attr("id");
            data_target = $("div."+id_p).attr("data-target");
            data_toggle = $("div."+id_p).attr("data-toggle");
            $("hr."+id_p).css({'opacity':'1'});
            $("div."+id_p).css({'background':'#fff','border':'3px solid #fdb02a'});
            $("div."+id_p+" p").css({'background':'#fff','color':'#282828','font-size':'13px'});
            $("div."+id_p+" div.right p .skidon").css({'text-decoration':'line-through'});
            //$("div."+id_p+" div.right p .zacherk").text(data_target);
            $("div."+id_p+" .doted-line").css({'opacity':'0'});
            //c_p = $("."+id_p).attr("class");

            //alert(id_p/*+", "+c_p*/);
        }, function () {
            $("hr."+id_p).css({'opacity':'0'});
            $("div."+id_p).css({'background':'#F9FDFF','border':'3px solid #F9FDFF'});
            $("div."+id_p+" p").css({'background':'#F9FDFF','color':'#282828', 'font-size':'13px'});
            $("div."+id_p+" div.right p .skidon").css({'text-decoration':'line-through'});
            //$("div."+id_p+" div.right p .zacherk").text(" ");
            $("div."+id_p+" .doted-line").css({'opacity':'1'});
        });

    $(".price").hover(
        function () {
            var dti_p = $(this).attr("data-title");
            var dt_target = $("div."+dti_p).attr("data-target");
            var dt_toggle = $("div."+dti_p).attr("data-toggle");
            $("hr."+dti_p).css({'opacity':'1'});
            $("div."+dti_p).css({'background':'#F9FDFF','border':'3px solid #fdb02a'});
            $("div."+dti_p+" p").css({'background':'#F9FDFF','color':'#282828','font-size':'13px'});
            $("div."+dti_p+" div.right p .skidon").css({'text-decoration':'line-through'});
            //$("div."+dti_p+" div.right p .zacherk").text(dt_target);
            $("div."+dti_p+" .doted-line").css({'opacity':'0'});
            $("#"+dti_p).addClass("hovers");
        }, function () {
            var dti_p = $(this).attr("data-title");
            $("hr."+dti_p).css({'opacity':'0'});
            $("div."+dti_p).css({'background':'#F9FDFF','border':'3px solid #F9FDFF'});
            $("div."+dti_p+" p").css({'background':'#F9FDFF','color':'#282828', 'font-size':'13px'});
            $("div."+dti_p+" div.right p .skidon").css({'text-decoration':'line-through'});
            //$("div."+dti_p+" div.right p .zacherk").text(" ");
            $("div."+dti_p+" .doted-line").css({'opacity':'1'});
            $("#"+dti_p).removeClass("hovers");
        });
        pol = $('.lb').attr("data-target");
        chasti =  $('.lb_').attr("data-target");

    $('.lb').click(function () {

        pol = $(this).attr("data-target");

        if (pol == "devushka")
        {
            $('.wumen').css({'display':'block'});
            $('.men').css({'display':'none'});
        }
        if (pol == "paren")
        {
            $('.wumen').css({'display':'none'});
            $('.men').css({'display':'block'});
        }
    });
    $('.lb_').click(function () {

        chasti = $(this).attr("data-target");

        if (chasti == "lico")
        {
            $('#part-1-const').removeClass('active-cons');
            $('#part-2-const').addClass('active-cons');
            $('#part-3-const').removeClass('active-cons');
            $('#part-4-const').addClass('active-cons');
        }
        if (chasti == "telo")
        {
            $('#part-1-const').addClass('active-cons');
            $('#part-2-const').removeClass('active-cons');
            $('#part-3-const').addClass('active-cons');
            $('#part-4-const').removeClass('active-cons');

        }
    });
	/*===========================================================================================================
	===========================================================|Slider robot|====================================
	===========================================================================================================*/
    $('.slider-works').slick();

	/*============================================================================================================
	 ===========================================================|Slider studio|===================================
	 ===========================================================================================================*/
	var slideIndex = 1;
	showSlides(slideIndex);

	function plusSlides(n) {
		showSlides(slideIndex += n);
	}

	function currentSlide(n) {
		showSlides(slideIndex = n);
	}



	window.initCallBackForm = function() {
		var fieldNameName = '';
		var fieldNamePhone = '';
		var fieldNameTime = '';
		$.ajax({
			url: 'https://silkepil.com.ua/callback/add?sourceType=ajax',
			method: "GET",
			dataType: "html",
			success: function(data) {
				var $oldForm = $('.js_orderCallOldForm');
				$oldForm.html(data);
				fieldNameName = $oldForm.find('input:eq(0)').attr('name');
				fieldNamePhone = $oldForm.find('input:eq(1)').attr('name');
				fieldNameTime = $oldForm.find('select:first').attr('name');
			}
		});
		var $form = $('.js_orderCallForm');
		$form.submit(function() {
			var postData = {};
			postData[fieldNameName] = $('.js_orderCallForm').find('input[name=name]').val();
			postData[fieldNamePhone] = $('.js_orderCallForm').find('input[name=phone]').val();
			postData[fieldNameTime] = 'any';
			$.ajax({
				url: $form.attr('action'),
				method: "POST",
				data: postData,
				dataType: "json",
				success: function(data) {
					if(data.error) {
						$(".js_name-2").parents('.form_box').addClass("form_box_error");
						$(".js_phone-2").parents('.form_box').addClass("form_box_error");
						return false;
					}
					alert('Мы обязательно вам перезвоним!');
					$('.js_modal_form-3 .modal_close').click();
				}
			});
			return false;
		});

	};

	window.initCallBackForm();

	function showSlides(n) {
        var i;
        var slides =document.getElementsByClassName("my-Slides");
        var dots = document.getElementsByClassName("dot");

        if (n > slides.length)
        {
            slideIndex = 1
        }

        if (n < 1)
        {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++)
        {
            slides[i].style.display = "none";
        }
        for ( i = 0; i < dots.length; i++)
        {
            dots[i].className = dots[i].className.replace(" active","");
        }
        if (slides[slideIndex-1]) {
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }
    }

    window.plusSlides = plusSlides;
    window.currentSlide = currentSlide;
    window.showSlides = showSlides;

});