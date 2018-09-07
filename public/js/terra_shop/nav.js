var login = (function(){
    
    var loginPanel = document.querySelector('.loginPanel');
    var loginBtn = document.querySelector('.login');
    var close = document.querySelector('.loginPanel i');
    
    //bind event
    loginBtn.onclick = toggleLoginPanel;
    close.onclick = toggleLoginPanel;
    
    
    function toggleLoginPanel(){
        var start_end = ["-20rem", "7rem"]
        
        if(loginPanel.style.top == start_end[1]){
            // loginPanel.style.display = "none";
            loginPanel.style.top = start_end[0];
        }else{
            // loginPanel.style.display = "block"
            loginPanel.style.top = start_end[1];
        }
    }
})();