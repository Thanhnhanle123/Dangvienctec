function avtShow(){
  var avtShow = document.getElementById("avt_show");
  avtShow.style.opacity = 1;
  avtShow.style.zIndex = 1;
  setTimeout(function(){
    avtShow.style.opacity = 0;
    avtShow.style.zIndex = 0;
  },2000);
}

$(function(){
  $(document).on('click','.avt',avtShow);
});
