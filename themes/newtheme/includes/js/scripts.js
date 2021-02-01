function updatePreferredServer(sel){
  var preferred = sel.options[sel.selectedIndex].value;
  document.preferred_server_form.preferred_server.value = preferred;
  document.preferred_server_form.submit();
}

function updatePreferredTheme(sel){
  var preferred = sel.options[sel.selectedIndex].value;
  document.preferred_theme_form.preferred_theme.value = preferred;
  document.preferred_theme_form.submit();
}

function updatePreferredLanguage(sel){
  var preferred = sel.options[sel.selectedIndex].value;
  setCookie('language', preferred);
  reload();
}

function updatePreferredTheme(sel){
  var preferred = sel.options[sel.selectedIndex].value;
  document.preferred_theme_form.preferred_theme.value = preferred;
  document.preferred_theme_form.submit();
}

function toggleSearchForm() {
  $('.search-form').slideToggle('fast');
}

function setCookie(key, value) {
  var expires = new Date();
  expires.setTime(expires.getTime() + expires.getTime()); // never expires
  document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
}

function pad(num, size) {
  var s = num+"";
  while (s.length < size) s = "0" + s;
  return s;
}

$(function() {
  var inputs = 'input[type=text],input[type=password],input[type=file]';
  $(inputs).focus(function(){
    $(this).css({
      'background-color': '#f9f5e7',
      'border-color': '#dcd7c7',
      'color': '#726c58'
    });
  });
  $(inputs).blur(function(){
    $(this).css({
      'backgroundColor': '#ffffff',
      'borderColor': '#dddddd',
      'color': '#444444'
    }, 500);
  });
  $('.menuitem a').hover(
    function(){
      $(this).fadeTo(200, 0.85);
      $(this).css('cursor', 'pointer');
    },
    function(){
      $(this).fadeTo(150, 1.00);
      $(this).css('cursor', 'normal');
    }
  );

  // In: js/flux.datefields.js
  processDateFields();


  $('#woe-flags').slick({
    dots: false,
    speed: 300,
    autoplay: true,
    //autoplay: false,
    autoplaySpeed: 3000,
    pauseOnFocus: false,
    pauseOnHover: false,
    fade: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false
  });

  var filter = 0, count = $('#btn-news li').length;

  $('#news-list-link li').on('click', function(){
    $('#news-list-link li').each(function(c, el){;
      $(el).removeClass('active');
    });

    var c = $(this).attr("class");
    var o = "";
    switch(c) {
      case 'btn-all': o = ""; break;
      case 'btn-news': o = ".ppn-news"; break;
      case 'btn-events': o = ".ppn-events"; break;
      case 'btn-updates': o = ".ppn-updates"; break;
    }

    $('#news-list-box #news-list').fadeOut({
      duration: 'fast',
      complete: function(){
        $('#news-list-box #news-list .ppn-content').hide();
        $('#news-list-box #news-list .ppn-content'+o).show();
        $('#news-list-box #news-list').fadeIn('fast');

        $('#news-list-link li.'+c).addClass('active');
      },
    });
  });
});