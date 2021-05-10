function Tornasu(){
    setTimeout(  
       function(){
          $("html, body").animate({ scrollTop: 0}, "slow")
       },290
    );
}

const filters = {
    username : function (input){
        const re = /^[a-zA-Z]+.*$/;
        return re.test(input.value);
    },
    password : function(input) {
        const re = /^[a-zA-Z]+.*$/;
        return re.test(input.value);
    },
    required : function(input){
        return input.value != null && input.value != "" && input.value.length != 0;
    },
    maxlength : function(input, max){
        return input.value.length <= max;
    },
    minlength : function(input, min){
        return input.value.length >= min;
    },
    file_required: function(input){
        return input.files.length != 0;
    }
};
function removeError(input){
    input.classList.add('error')
    if(input.dataset.errorMessage)
    {
        document.getElementById(input.id).innerHTML = "<p>" + input.dataset.errorMessage + "</p>";
    }
}
function eliminaErrori(){
    var errors = document.getElementsByClassName("error");
    while(0 < errors.length) errors[0].remove();
}
function mostraErrori(input){
    var label = document.querySelector("label[for=%s]".replace(/%s/, input.id));
    if(label !== null && label.getElementsByClassName("error").length === 0) {
        var error = document.createElement("strong");
        error.className = "error";
        error.setAttribute("role", "alert");
        error.setAttribute("aria-live", "polite");
        error.appendChild(document.createTextNode(" - " +label.getAttribute("data-error-msg")));
        label.appendChild(error);
    }
}
function validateInput(input, valid){
    if(input.dataset.rules){
        let rules = input.dataset.rules.split('|');
        rules.forEach(r => {
            let params = [];
            if(r.includes(':')){
                let tmp = r.split(':');
                r = tmp[0];
                params = tmp[1].split(',');
            }
            if(filters[r] && filters[r](input, ...params)==false){
                mostraErrori(input);
                valid=false;
            } 
        })
    }
    return valid
}
var input;
function validation() {
    for(let form of document.getElementsByTagName('form')){
        eliminaErrori();
        let inputs = [...form.getElementsByTagName('input'), ...form.getElementsByTagName('textarea'),];
        let valid=true;
        for(let input of inputs){
            valid=validateInput(input, valid);
        }
        return valid;
    }
};