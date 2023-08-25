window.onmouseover = function() {
    document.querySelector(".menu-opener").addEventListener("click", function(){
        if (document.querySelector(".menu-c nav").style.display == 'flex') {
            document.querySelector(".menu-c nav").style.display = 'none';
        } else {
            document.querySelector(".menu-c nav").style.display = 'flex';
        }
    });
    window.addEventListener('resize', function(){
        if (window.innerWidth > 800){
            document.querySelector(".menu-c nav").style.display = 'flex';
        } else {
            document.querySelector(".menu-c nav").style.display = 'none';
        }
    });
};