var renameClassification = (function(){
    
    var renameBtns = document.querySelectorAll('.sidebar .rename');
    var spans = document.querySelectorAll('.sidebar span');
    var renameFields = document.querySelectorAll('.sidebar .group');
    var cancels = document.querySelectorAll('.sidebar .cancel')
    
    //bind event
    renameBtns.forEach(function(btn, index){
        
        btn.onclick = toggleRenameField(index);
        
    });
    
    cancels.forEach(function(btn, index){
        
        btn.onclick = toggleRenameField(index);
        
    });
    
    
    function toggleRenameField(index){
        
        return function(){
            renameBtns[index].style.display = renameBtns[index].style.display != "none" ? "none" : "inline-block";
            
            spans[index].style.display = spans[index].style.display != "none" ? "none" : "inline-block";
        
            renameFields[index].style.display = renameFields[index].style.display != "inline-block" ? "inline-block" : "none";
        }
    }
    
})();