if (document.querySelector('.offcanvas') !== null) {

  // mobile only class

  mobileActions();
  $(window).resize(function () {
    mobileActions();
  });

  function mobileActions() {
    if (window.innerWidth < bpDesktop) {
      master.addClass('mobile-actions');
    } else {
      master.removeClass('mobile-actions');
    }
  }

  // multi level mobile menu

  $(document).on('click', '.mobile-actions .menu-item-has-children > a', function (e) {
    var cloneItemContent = $(this).html();
    var cloneItemLink = $(this).attr('href');
    var parentLink = $(this).closest('.sub-show').children('a').find('.title').text();
    if (parentLink) {
      str = parentLink
    } else {
      str = 'Back'
    }
    $(this).parent().addClass('sub-show').siblings().addClass('sub-hide');
    $(this).parent().find('.sub-menu').children('.added-item').remove();
    $(this).parent().find('.sub-menu').prepend('<li class="back-level added-item"><a href="#"><span>' + str + '</span></a></li><li class="link-clone added-item"><a href="' + cloneItemLink + '">' + cloneItemContent + '</a></li>');
    $(this).closest('nav').siblings('nav').addClass('sub-hide');
    e.preventDefault();
  });

  $(document).on('click', '.mobile-actions .back-level > a', function (e) {
    $(this).closest('.menu-item-has-children').removeClass('sub-show').siblings().removeClass('sub-hide');
    $(this).closest('nav').siblings('nav').removeClass('sub-hide');
    e.preventDefault();
  });

}
