function Tornasu(){
   setTimeout(  
      function(){
         $("html, body").animate({ scrollTop: 0}, "slow")
      },290
   );
}

var inputNuovoForm = [{
   "query": "input[type=text]",
   "validators": [validateRequired, validateLength, validateInput]
   }, {
   "query": "input[type=file]",
   "validators": [validateRequired, validateImageFile]
   }, {
   "query": "textarea",
   "validators": [validateRequired, validateLength, validateInput]
}  ]

var inputLoginAdmin = [{
      "query": "input[type=text], input[type=password]",
      "validators": [validateRequired, validateLength, validateInput]
}  ]

function validateForm (){
eliminaErrori();
var form, checks
var isLogin = document.getElementById('login') !== null;
form = isLogin ? document.forms['login'] : document.forms['form'];
checks = isLogin ? inputLoginAdmin : inputNuovoForm;
return checks.map((check) => validate(check, form)).reduce((previous, current) => previous && current);
}

function validate(check, form){
const inputs = Array.from(form.querySelectorAll(check.query));
const wrong_inputs = inputs.filter((input) => !checkInput(input, check.validators));
wrong_inputs.forEach(input => mostraErrori(input));
return wrong_inputs.length === 0;
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

function eliminaErrori(){
var errors = document.getElementsByClassName("error");
while(0 < errors.length) errors[0].remove();
}

function checkInput(input, validators){
return validators.reduce((previousValidity, validator) => previousValidity && validator(input),true);
}

function validateLength(input){
const min = input.getAttribute("minlength");
const max = input.getAttribute("maxlength");
return ((min === null) || (input.value.length >= min))
&& ((max === null) || (input.value.length <= max));
}

function validateImageFile(input) {
const files = input.files;
return ((files.length === 1)
  && files[0].type.startsWith("image/")
  && files[0].size < 1000000) 
|| (files.length === 0);
}

function validateRequired(input) {
return input.hasAttribute("required")? input.value != "" : true;
}

function validateInput(input) {
   const pattern = input.getAttribute("pattern");
   return pattern.test(input.value);
}