var renameCategory = (function(){
    
    var select = document.querySelector('header select');
    var updateForm = document.querySelector('header .update');
    
    select.onchange = changeFormAction;
    
    function changeFormAction(){
        updateForm.action = select.value;
    }
    
})();