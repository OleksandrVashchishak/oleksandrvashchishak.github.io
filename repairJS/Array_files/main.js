let popup = document.getElementById('popup');
 popup.style.display = 'flex';
document.getElementById('popup-close').addEventListener("click", function(){
    popup.style.display = 'none'
});
 setTimeout(function(){popup.style.display = 'flex'}, 30000);