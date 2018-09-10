var addTagToItem = (function(){
    
    var form = document.querySelector('.itemShow .tag .add');
    var submit = document.querySelector('.itemShow .tag .add button');
    var select = document.querySelector('.itemShow .tag .add select');
    
    submit.onclick = function(event){
        event.preventDefault();
        toggleSelect();
    }
    select.onchange = changeActionAndSubmit;
    
    function toggleSelect(){
        select.style.display = select.style.display != 'inline-block' ? 'inline-block' : 'none';
    }
    
    function changeActionAndSubmit(){
        form.action = select.value;
        
        form.submit();
    }
    
})();