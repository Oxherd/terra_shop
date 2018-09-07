var toggleForm = (function(){
    
    //button
    var addC = document.querySelector('.addCategory');
    var renameC = document.querySelector('.renameCategory');
    var deleteC = document.querySelector('.deleteCategory');
    
    //form
    var createF = document.querySelector('header .create');
    var updateF = document.querySelector('header .update');
    var destroyF = document.querySelector('header .destroy');
    
    var currentBtn = addC;
    var currentForm = createF;
    
    //bind event
    addC.onclick = toggleForm(createF);
    renameC.onclick = toggleForm(updateF);
    deleteC.onclick = toggleForm(destroyF);
    
    init();
    
    function init(){
        currentBtn.classList.toggle('select');
        currentForm.style.display = "block";
    }
        
    function toggleForm(form){
        return function(){
            
            //for button style
            currentBtn.classList.toggle('select');
            currentBtn = this;
            
            //for form style
            currentForm.style.display = "none";
            currentForm = form;
            
            init();
        }
        
    }
    
})();

var renameControl = (function(){
    
    var form = document.querySelector('header .update');
    var select = form.querySelector('select');
    
    //bind event
    select.onchange = changeFormAction;
    
    function changeFormAction(){
        form.action = select.value;
    }
    
})();

var deleteControl = (function(){
    
    var form = document.querySelector('header .destroy');
    var select = form.querySelector('select');
    var deleteBtn = form.querySelector('button');
    var confirmStr = "It will also delete all of his related objects, are you sure?";
    
    //bind event
    select.onchange = changeFormAction;
    deleteBtn.onclick = function(event){ confirmMessage(event); }
    
    function changeFormAction(){
        form.action = select.value;
    }
    
    function confirmMessage(event){
        if(!confirm(confirmStr)){
            event.preventDefault();
        }
        
    }
    
})();