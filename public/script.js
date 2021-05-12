function Tornasu(){
    setTimeout(  
       function(){
          $("html, body").animate({ scrollTop: 0}, "slow")
       },290
    );
}

const validators = {
    username : function(input) {
        const user = /^[a-zA-Z0-9_-]{3,16}$/;
        return user.test(input.value);
    },
    password : function(input) {
        const psw = /^[a-zA-Z0-9_-]{6,18}$/;
        return psw.test(input.value);
    },
    pattern1 : function(input) {
        const expr = /^[a-zA-Z0-9]+.*$/;
        return expr.test(input.value);
    },
    pattern2 : function(input) {
        const expr = /^[a-zA-Z]+.*$/;
        return expr.test(input.value);
    },
    required : function(input){
        return input.value != null && input.value != "" && input.value.length != 0;
    },
    maxlength : function(input){
        const max = input.getAttribute("maxlength");
        return input.value.length <= max;
    },
    minlength : function(input){
        const min = input.getAttribute("minlength");
        return input.value.length >= min;
    },
    file_required: function(input){
        return input.files.length != 0;
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
function validate(input, valid){
    if(input.dataset.rules){
        var rules = input.dataset.rules.split(',');
        rules.forEach(r => {
            if(validators[r] && !validators[r](input)){
                mostraErrori(input);
                valid=false;
            } 
        })
    }
    return valid
}
var input;
function validation() {
    for(var form of document.getElementsByTagName('form')){
        eliminaErrori();
        var inputs = [...form.getElementsByTagName('input'), ...form.getElementsByTagName('textarea'),];
        var valid=true;
        for(var input of inputs){
            valid=validate(input, valid);
        }
        return valid;
    }
}