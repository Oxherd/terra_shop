var carousel = (function(){
    
    var imgs = document.querySelectorAll('.carousel ul li');
    var prevBtn = document.querySelector('.carousel .prev');
    var nextBtn = document.querySelector('.carousel .next');
    var pause = document.querySelector('.carousel .autoCarousel');
    
    var carouseling = 0;
    var currentIndex = 0;
    var globalStep = 0.5;
    var autoplay = true;
    
    prevBtn.onclick = prev;
    nextBtn.onclick = next;
    pause.onclick = pasueAutoplay;
    
    init();
    
    function init(){
        imgs[currentIndex].style.left = "0";
        
        //autoplay
        setInterval(function(){
            
            if(autoplay && carouseling == 0){
                next();
            }
            
        }, 5000);
    }
    
    function prev(){
        
        if(carouseling == 0){
            move(imgs[currentIndex], 0, globalStep, "100%");
        
            currentIndex = currentIndex - 1 < 0 ? imgs.length - 1 : currentIndex - 1;
            
            move(imgs[currentIndex], -100, globalStep, "0%");
        }
       
    }
    
    function next(){
        if(carouseling == 0){
            move(imgs[currentIndex], 0, -globalStep, "-100%");
            
            currentIndex = currentIndex + 1 == imgs.length ? 0 : currentIndex + 1;
            
            move(imgs[currentIndex], 100, -globalStep, "0%");
        }
        
    }
    
    function pasueAutoplay(){
        autoplay = !autoplay;
        pause.classList.toggle('pause');
    }
    
    function move(img, start, step, end){
        
        var i = start;
        
        carouseling++;
        
        var intervelIndex = setInterval(function(){
            // console.log(i);
            if(img.style.left == end){
                clearInterval(intervelIndex);
                carouseling--;
            }
            
            i += step;
            
            img.style.left = i + "%";
            
        }, 1);
    }
    
})();